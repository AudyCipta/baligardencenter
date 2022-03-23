<!DOCTYPE html>
<html lang="en">
<?php
	$host="produk";
	include '../layouts/head2.php';
?>
<body>

		<?php
			error_reporting(0);
			$p = $_GET['p'];
			$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus WHERE KodePaket = '$p'");
			$res = mysqli_fetch_array($sql);
			$count = count($res);

			if (empty($p) || $count == 0) {
				echo "<script>alert('Paket Kurus Tidak Ditemukan !')</script>";
				echo "<script>document.location='paketkursus.php'</script>";
				return false;
			}
		?>
<div class="super_container">

	<!-- Header -->

	<?php include'../layouts/header.php'; ?>
	<?php include'../layouts/notif.php';
		include'../layouts/WA-kami.php'; ?>

	<div class="container single_product_container">
		<?php
			$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus WHERE KodePaket = '$p'");
			$res = mysqli_fetch_array($sql);
		?>
		<div style="padding: 20px;"></div>
		
		<input type="hidden" name="KodePaket" value="<?= $res['KodePaket'] ?>">
		<div class="row col-12">
			<div class="col-md-6">
				<img class="" height="auto" width="100%" src="../public/img/paketkursus/<?php echo $res['Foto'] ?>">	
			</div>
			<div class="col-md-6">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?= $res['NamaPaket'] ?></h2>
						<p align="justify"></p><p><?= substr($res['Keterangan'],0,200) ?>..</p>
					</div>
					<div class="product_price" style="margin-top: 20px;">RP <?= number_format($res['Harga']) ?><small>/<?= $res['Durasi']." Jam" ?></small></div>
				</div>
				<div style="width: 100%;padding: 0px;margin-top: 20px;" class="col-12">
					<form action="../process/handler.php?action=pesanpaketkursus" method="post">
						<select name="Lokasi" id="" class="form form-control" style="color: black;" required>
							<option value="" selected class="none">Pilih Lokasi</option>
							<option value="Denpasar">Denpasar</option>
							<option value="Badung">Badung</option>
							<option value="Gianyar">Gianyar</option>
						</select><br>
						<select name="KodeInstruktor" class="form form-control" id="" style="color: black;" required>
	                      <?php
	                        $sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Level = '2' AND StatusUser='Ready'");
	                        $no = 0;
	                        while ($resx = mysqli_fetch_array($sqlx)) {
	                          $no++;
	                        }
	                        if ($no == 0) {
	                          echo "
	                            <option value='' disabled selected >Maaf Semua Instruktor Sedang Sibuk</option>
	                          ";
	                        }
	                        else{
	                        	echo '
		                      		<option value="" class="none" selected disabled>Pilih Instruktor</option>
		                      	';
	                        }
	                        $sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Level = '2' AND StatusUser='Ready'");
	                        $no = 0;
	                        while ($resx = mysqli_fetch_array($sqlx)) {
	                          echo "
	                            <option value='".$resx['KodeUser']."'>".$resx['NamaLengkap']."</option>
	                          ";
	                          $no++;
	                        }
	                      ?>
	                    </select><br>
						<select name="Durasi" id="" class="form form-control" style="color: black;" required>
							<option value="" selected class="none">Pilih Durasi</option>
							<?php
								$Durasi = $res['Durasi'];
								while ($Durasi  != 10) {
									echo "<option value='$Durasi'>$Durasi Jam</option>";
									$Durasi += 2;
								}
							?>
						</select><br>
						<br>
						<input type="hidden" name="KodePaket" value="<?= $res['KodePaket'] ?>">
						<input type="hidden" name="KodePelanggan" value="<?= $_COOKIE['KodeUser'] ?>">
	            		<input type="date" name="TglOrder" value="<?= $process->ThisYear ?>-<?= $process->ThisMonth ?>-<?= $process->ThisDate ?>" id="Tanggal" name="Tanggal" class="none" required autocomplete="off" readonly>
	            		<?php
	            			if (empty($_COOKIE['Level'])) {
	            				echo "
									<button onclick='alert(`Login terlebih dahulu`)' type='button' name='button' class='btn btn-danger col-12'>Pesan paket</button>
	            				";
	            			}
	            			else if ($_COOKIE['Level'] == 1) {
	            				echo "
									<button onclick='alert(`Admin tidak diperbolehkan untuk melakukan pemesanan kursus`)' type='button' name='button' class='btn btn-danger col-12'>Pesan paket</button>
	            				";	
	            			}
	            			else{
								echo "
									<button type='submit' name='submit' class='btn btn-danger col-12'>Pesan paket</button>
	            				";
	            			}
	            		?>
					</form>
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
<script src="../public/js/jquery-3.2.1.min.js"></script>
<script src="../public/css/bootstrap4/popper.js"></script>
<script src="../public/css/bootstrap4/bootstrap.min.js"></script>
<script src="../public/vendor/Isotope/isotope.pkgd.min.js"></script>
<script src="../public/vendor/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../public/vendor/easing/easing.js"></script>
<script src="../public/vendor/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../public/js/single_custom.js"></script>
</body>

</html>
