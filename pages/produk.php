<!DOCTYPE html>
<html lang="en">
<?php
	$host="produk";
	include '../layouts/head2.php';
?>
<style>
	*::-webkit-inner-spin-button, 
	*::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	}
</style>
<body>

		<?php
			error_reporting(0);
			$p = $_GET['p'];
			$sql = mysqli_query($process->cnt,"SELECT * FROM tbproduk WHERE KodeProduk = '$p'");
			$res = mysqli_fetch_array($sql);
			$count = count($res);

			if (empty($p) || $count == 0) {
				echo "<script>alert('Produk Tidak Ditemukan !')</script>";
				echo "<script>document.location='toko.php'</script>";
				return false;
			}
		?>
<div class="super_container">

	<!-- Header -->

	<?php include'../layouts/header.php';include'../layouts/notif.php'; ?>

	<div class="container single_product_container">
		
		<div style="padding: 20px;"></div>
		

		<?php
			error_reporting(0);
			$p = $_GET['p'];
			$sql = mysqli_query($process->cnt,"SELECT * FROM tbproduk WHERE KodeProduk = '$p'");
			$res = mysqli_fetch_array($sql);
		?>
		<input type="hidden" id="KodeProduk" value="<?= $res['KodeProduk'].",".$res['Stok'] ?>">

		<div class="row col-12">
			<div class="col-lg-6">
				<img class="" height="auto" width="100%" src="../public/img/produk/<?php echo $res['Foto'] ?>">	
			</div>
			<div class="col-lg-6">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?= $res['NamaProduk'] ?></h2>
						<p align="justify"><?= substr($res['Keterangan'],0,100) ?> ...</p>
					</div>
					<div class="product_price" style="margin-top: 20px;">RP <?= number_format($res['Harga']) ?><small>/<?= $res['Satuan'] ?></small></div><br><br>
						<h5><i class="fas fa-boxes"></i>&nbsp; Stok barang = <?= number_format($res['Stok'])." ".$res['Satuan'] ?> </h5>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Jumlah:</span>
						<div class="quantity_selector" style="width: auto;">
							<span class="unselectable minuss" onclick="plusminusJumlah('minus')" style="border-radius: 0%;margin-left: 10px;cursor: pointer;font-weight: bold;"><i class="fa fa-minus"></i></span>
								<input class="" onkeyup="JumlahKeyup()" onchange="JumlahKeyup()" type="number" id="Jumlah" value="1" style="text-align: center;border: 0px;">
							<span class="unselectable pluss" onclick="plusminusJumlah('plus')" style="border-radius: 0%;margin-right: 10px;cursor: pointer;font-weight: bold;"><i class="fa fa-plus"></i></span>
						</div>
					</div>
					<div style="width: 100%;padding: 0px;margin-top: 20px;" class="col-12">
						<form action="../process/handler.php?action=tambahtransaksiproduk" method="post">
							<input type="hidden" name="KodeProduk2" value="<?= $res['KodeProduk'] ?>">
							<input type="hidden" name="KodePelanggan" value="<?= $_COOKIE['KodeUser'] ?>">
							<input type="hidden" name="Jumlah" id="Joemlah" value='1'>
                    		 <input type="date" name="TglOrder" value="<?= $process->ThisYear ?>-<?= $process->ThisMonth ?>-<?= $process->ThisDate ?>" id="Tanggal" name="Tanggal" class="none" required autocomplete="off" readonly>
                    		 <?php
                    		 	if ($res['Stok'] > 0) {
	                    		 	if (empty($_COOKIE['Level'])) {
	                    		 		echo "
	                    		 			<button  data-toggle='modal' data-target='#ModalLogin' type='button' name='button' class='btn btn-danger col-12'>Masukkan Keranjang</button>
	                    		 		";
	                    		 	}
	                    		 	else if ($_COOKIE['Level'] == 1) {
	                    		 		echo "
	                    		 			<button onclick='alert(`Admin tidak diperbolehkan untuk berbelanja`)' type='button' name='button' class='btn btn-danger col-12'>Masukkan Keranjang</button>
	                    		 		";
	                    		 	}
	                		 		else{
			            				echo "
											<button type='submit' name='submit' class='btn btn-danger col-12'>Masukkan keranjang</button>
				            				";	
	                		 		}
                    		 	}
                    		 	else{
                    		 		echo "<button type='button' name='button' class='btn  col-12' disabled title='Stok Habis'>Stok habis</button>";
                    		 	}
                    		 ?>
						</form>
					</div>
	                <!-- <div class="col-md-12 left" align="left" style="padding: 0px;">
	                  <div class="inputBox col-md-6 numberonly" id="JumlahBox" style="padding: 0;" align="center">
	                    <div class="left unselectable" style="cursor: pointer;padding: 10px;" onclick="plusminusJumlah('minus')" align="center">
	                      <div class="verticalAlign1">
	                        <div class="verticalAlign2">
	                          <i class="fa fa-minus-circle" style="font-size: 30px;"></i>  
	                        </div>
	                      </div>
	                    </div>
	                    <input type="text" id="Jumlah" name="Jumlah" class="form form-jumlah left" autocomplete="off" style="text-align: center;padding: 10px;width: 48%;" value="1" >
	                    <div class="left unselectable" style="cursor: pointer;padding: 10px;" onclick="plusminusJumlah('plus')" align="center">
	                      <i class="fa fa-plus-circle" style="font-size: 30px;"></i>  
	                    </div>
	                  </div>
	                  <br>
	                </div> -->
				</div>
			</div>
		</div>

	</div>

	<!-- Tabs -->

	<div class="tabs_section_container">

		<div class="container">
			<div class="row" style="margin-top: 50px;">
				<div class="col">

					<?= $res['Keterangan'] ?>

				</div>
			</div>
		</div>

	</div>


	<?php include'../layouts/footer.php'; ?>
	
</div>
<script>

    function plusminusJumlah(x){


      var z = $('#KodeProduk').val();

      str1 = z.split(',')[1];
      str2 = z.split(',')[0];


      if (x == "plus") {
        var z = $('#Jumlah').val();
        var z = parseInt(z);
        if (z < 1 || z >= str1) {
          var wwww = $('#KodeProduk').val();
          var var2 = wwww.split(',')[1];
          var var2 = parseInt(var2);

          alert('Maaf, stok tidak mencukupi');
          return false;
        }
        else{
          
          z++;
          var www = $('#KodeProduk').val();
          $('#Jumlah').val(z);
          $('#Joemlah').val(z);
        }
      }else if (x == "minus") {
        var z = $('#Jumlah').val();
        var z = parseInt(z);
        if (z <= 1 || z > str1) {
	        $('#Jumlah').val(1);
	        $('#Joemlah').val(1);
          return false;
        }
        z--;
        $('#Jumlah').val(z);
        $('#Joemlah').val(z);
      }
      else if (x == "plus2") {
        var z = $('#Jumlah').val();
          
			z = parseInt(z) + 10;
			var www = $('#KodeProduk').val();
			if (z < 1 || z >= str1) {
				var wwww = $('#KodeProduk').val();
				var var2 = wwww.split(',')[1];
				var var2 = parseInt(var2);

			    alert('Maaf, stok tidak mencukupi');

				$('#Jumlah').val(1);
        		$('#Joemlah').val(1);
		        return false;
		    }
			$('#Jumlah').val(z);
        	$('#Joemlah').val(z);
      }else if (x == "minus2") {
        var z = $('#Jumlah').val();
        var z = parseInt(z);
        if (z <= 1 || z >= str1) {
	        $('#Jumlah').val(1);
	        $('#Joemlah').val(1);
          return false;
        }
        z -= 10;
        if (z < 1) {
        	$('#Jumlah').val(1);
        	return false;
        }
        $('#Jumlah').val(z);
        $('#Joemlah').val(z);
      }
      else{
        $('#Jumlah').val(1);
      }
    }
    function JumlahKeyup() {	

		var z = $('#KodeProduk').val();

		str1 = z.split(',')[1];
		str2 = z.split(',')[0];

    	var Jumlah = parseInt($('#Jumlah').val());
    	if (Jumlah > str1) {
			alert('Maaf, stok tidak mencukupi');
    		$('#Jumlah').val(1);
    		$('#Joemlah').val(1);
    		return false;
    	}
    	if (Jumlah < 1 ) {
    		$('#Jumlah').val(1);
    		$('#Joemlah').val(1);	
    		return false;
    	}
		$('#Joemlah').val(Jumlah);	
    }
</script>
<script src="../public/js/jquery-3.2.1.min.js"></script>
<script src="../public/css/bootstrap4/popper.js"></script>
<script src="../public/css/bootstrap4/bootstrap.min.js"></script>
<script src="../public/vendor/Isotope/isotope.pkgd.min.js"></script>
<script src="../public/vendor/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../public/vendor/easing/easing.js"></script>
<script src="../public/vendor/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../public/js/single_custom.js"></script>
<script src="../public/js/footer-script.js"></script>
</body>

</html>
