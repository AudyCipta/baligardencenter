<!DOCTYPE html>
<html lang="en">
<?php
	$host = "pembayaran";
	include'../layouts/head.php';

	$nt = $_GET['nt'];

	$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$nt' AND StatusKursus = 'Sudah Order'");
	$resx = mysqli_num_rows($sqlx);
	($resx == 0) ? header('Location:404notfound.php') : ""; 

	$KodeUser = $_COOKIE['KodeUser'];
	$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE KodePelanggan = '$KodeUser' AND StatusKursus = 'Sudah Order'");
	$resx = mysqli_fetch_array($sqlx);
	$text = "";
	if (!empty($resx)) {
		$text1 = "( <small>No Transaksi Anda : ".$resx['NoTransaksi']."</small> )";
	}
?>
<style>
	.buttonDiv{
		padding: 10px;
		width: 100%;
	}
</style>
<body class="bg-light">
	<?php include'../layouts/notif.php'; ?>
	<div class="super_container">
		<div class="container" style="margin-top: 20px;background-color: #fff;padding: 20px;">
			<form action="../process/handler.php?action=tambahpembayarankursus" method="post" enctype="multipart/form-data">
				<h3>Pembayaran online</h3>
				<hr>
				<input autocomplete="off" type="hidden" class="form form-control" name="NoTransaksi" value="<?= $nt ?>">
				<p>
	          		Silahkan Melakukan Pembayaran Transaksi Melalui Transfer Bank ke Rekening:<br><br>
	          		<img width="10%" src="../public/img/mandiri.jpg" alt=""> Mandiri : <strong>1450010592745</strong>, Atas nama : An I Gde Wikarga<br>
					<img width="10%" src="../public/img/ovo.png" alt=""> OVO : <strong>085935123068</strong><br>
					<img width="10%" src="../public/img/Gopay.jpg" alt=""> GOPAY : <strong>085935123068</strong><br>
					<img width="10%" src="../public/img/dana.png" alt=""> DANA : <strong>085935123068</strong><br>
	          	</p>
				<label><i class="fa fa-university"></i> Nama Bank</label><br>
				<input autocomplete="off" type="text" class="form form-control" name="NamaBank" placeholder="Nama Bank" required><br>
				<label><i class="fa fa-dollar-sign"></i> No Rekening</label><br>
				<input autocomplete="off" type="text" class="form form-control" name="NoRek" placeholder="No Rekening" required><br>
				<label><i class="fa fa-user"></i> Atas Nama</label><br>
				<input autocomplete="off" type="text" class="form form-control" name="AtasNama" placeholder="Atas Nama" required><br>
				<label><i class="fa fa-dollar-sign"></i> Jumlah Pembayaran</label>
				<small>( Total harga dari No Transaksi <?php 
					$sqlz = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE KodePelanggan = '$KodeUser' AND StatusKursus = 'Sudah Order'");
					$text2 = 0;
					while($resz = mysqli_fetch_array($sqlz)){
						$text2 += $resz['TotalHarga'];
						$NoTransaksii = $resz['NoTransaksi'];
					}

					echo $NoTransaksii." adalah RP ".number_format($text2);
				?> )</small><br>
				<strong>Transfer tepat sampai 3 digit terakhir !</strong><br>
				contoh:
				<img src="../public/img/format-transfer.jpg" alt=""><br>
				<br>
				<input autocomplete="off" type="number" class="form form-control numberonly" name="JumlahPembayaran" placeholder="Jumlah Pembayaran" required><br>
				<label>Foto</label><br>
				<input type="file" accept=".png,.jpg,.jpeg" name="Foto" required><br><br>
				<input type="date" name="TglPembayaran" value="<?= $process->ThisYear ?>-<?= $process->ThisMonth ?>-<?= $process->ThisDate ?>" id="Tanggal" name="Tanggal" class="none form form-control" required autocomplete="off" readonly>
				<div class="buttonDiv" align="right">
					<button type="submit" name="submit" class="btn btn-success">Simpan</button>
					<a href="datapesanankursus.php"><button type="button" class="btn btn-danger">Batal</button></a>
				</div>
			</form>
		</div>
	</div>

<script>
  function wantDelete(x) {
    Swal.fire({
      title: 'Apakah anda ingin menghapus data ini ?',
      text: "",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Tidak',
      confirmButtonText: 'Ya'
    }).then((result) => {
      if (result.value) {
        $('#'+x).click();
      }
    })
  };
  $('.numberonly').on('keypress',function (e) {
    var txt = String.fromCharCode(e.which);
    if (!txt.match(/[0-9]/)) {
        return false;
    }
});
</script>
<script src="../public/js/jquery-3.2.1.min.js"></script>
<script src="../public/css/bootstrap4/popper.js"></script>
<script src="../public/css/bootstrap4/bootstrap.min.js"></script>
<script src="../public/vendor/Isotope/isotope.pkgd.min.js"></script>
<script src="../public/vendor/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../public/vendor/easing/easing.js"></script>
<script src="../public/vendor/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../public/js/categories_custom.js"></script>
</body>

	<script src="../public/js/footer-script.js"></script>
</html>
