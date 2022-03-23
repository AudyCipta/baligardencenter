<!DOCTYPE html>
<html lang="en">
<?php
	$host="artikel";
	include '../layouts/head2.php';
?>
<style>
	*::-webkit-inner-spin-button, 
	*::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	}
	.super_container{
		background-color: #efefef;
	}
</style>
<body>
<div class="super_container">

	<!-- Header -->

	<?php include'../layouts/header.php';include'../layouts/notif.php';
		include'../layouts/WA-kami.php'; ?>

	<div class="container single_product_container">
		
		<div style="padding:20px 0px;position: relative;">
			<form action="">
				<input type="text" name="s" class="form form-control" placeholder="Cari artikel" autocomplete="off">
				<button class="btn btn-info" style="position: absolute;border-radius: 0px;right: 0px;top: 20px;"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<?php
			$sqlz = mysqli_query($process->cnt,"SELECT * FROM tbartikel");
			$ak0 = 0;$ak1 = 0;$ak2 = 0;$ak3 = 0;$ak4 = 0;$ak5 = 0;
			while ($resz = mysqli_fetch_array($sqlz)) {
				$ak0++;
				if ($resz['Kategori'] == 1) {$ak1++;}
				else if ($resz['Kategori'] == 2) {$ak2++;}
				else if ($resz['Kategori'] == 3) {$ak3++;}
				else if ($resz['Kategori'] == 4) {$ak4++;}
				else if ($resz['Kategori'] == 5) {$ak5++;}
			}
		?>
		<a href="artikel.php"><button style="margin:3px;" class="btn btn-info">Semua ( <?= $ak0 ?> )</button></a>
		<a href="artikel.php?k=1"><button style="margin:3px;" class="btn btn-info">Tips & Trik ( <?= $ak1 ?> )</button></a>
		<a href="artikel.php?k=2"><button style="margin:3px;" class="btn btn-info">Bunga ( <?= $ak2 ?> )</button></a>
		<a href="artikel.php?k=3"><button style="margin:3px;" class="btn btn-info">Sayur ( <?= $ak3 ?> )</button></a>
		<a href="artikel.php?k=4"><button style="margin:3px;" class="btn btn-info">Buah ( <?= $ak4 ?> )</button></a>
		<a href="artikel.php?k=5"><button style="margin:3px;" class="btn btn-info">Lifestyle ( <?= $ak5 ?> )</button></a>
		<br><br>
		<div class="row">
		<?php
			error_reporting(0);
			$s = $_GET['s'];  
			$k = $_GET['k'];
			if (!empty($k)) {
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE Kategori = '$k' ORDER BY TglPost DESC");
			}
			else if(empty($s)){
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel ORDER BY TglPost DESC");
			}
			else{
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE JudulArtikel LIKE '%$s%' ORDER BY TglPost DESC");	
				?>
				<div class='container' style='padding-bottom:20px;'>Hasil dari pencarian "<?= $s ?>"</div>
				<?php
			}
			while($res = mysqli_fetch_array($sql)){
				?>
					<div class="col-lg-4" style="width: 100%;position: relative;padding-bottom: 20px;">
						<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"">
							<div class="" align="center" style="width: 100%;height:150px;background: url('../public/img/artikel/<?= $res['Foto'] ?>') center center;background-size: cover;">
							</div>
						</a>
						<div class="" style="padding: 10px;background-color: #fff;">
							<h5><a href="blog.php?a=<?= $res['KodeArtikel'] ?>"" style="color: #000;"><?= $res['JudulArtikel'] ?></a></h5>
							<small style="color: #777;font-family: courier new;"><i class="fa fa-calendar"> &nbsp;<?= $res['TglPost'] ?></i> | <i class="fa fa-user"></i>  
						<?php 
							$Uploader = $res['Uploader'];
							$no = 0;
							$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$Uploader'");
							$resx = mysqli_fetch_array($sqlx);
							echo (!empty($resx['Username'])) ? $resx['Username'] : 'Unknown';
						?></small><br>
							<?= substr($res['IsiArtikel'], 0,50) ?>...
						</div>
						<div style="padding: 20px 0px;background-color: #fff;">
							<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"><button class="btn btn-info col-12" style="position: absolute;bottom: 0px;border-radius: 0px;">Selengkapnya</button></a>
						</div>
					</div>
				<?php
				$no++;
			}
			if(empty($s)){
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel");
			}
			else{
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE JudulArtikel LIKE '%$s%'");
			}
			$nox = mysqli_num_rows($sql);
			if ($nox == 0 && !empty($_GET['s'])) {
				?>
					<div class='col-lg-12 container' align='center' style="padding-top:20px;padding-bottom:20px;"><h5><i class="fa fa-search"></i> &nbsp;Artikel "<?= $s ?>" tidak ditemukan</h5></div>
					<div class='col-lg-12 container' align='center'><hr></div>
					<div class='col-lg-12 container' style="padding-top:20px;padding-bottom:20px;"><h3>Artikel terbaru</h3></div>
				<?php	
				$s = $_GET['s'];
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel ORDER BY TglPost DESC LIMIT 3");
				$no = 0;
				while($res = mysqli_fetch_array($sql)){
					$no++;
					?>
						<div class="col-lg-4" style="width: 100%;position: relative;padding-bottom: 20px;">
							<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"">
								<div class="" align="center" style="width: 100%;height:150px;background: url('../public/img/artikel/<?= $res['Foto'] ?>') center center;background-size: cover;">
								</div>
							</a>
							<div class="" style="padding: 10px;background-color: #fff;">
								<h5><a href="blog.php?a=<?= $res['KodeArtikel'] ?>"" style="color: #000;"><?= $res['JudulArtikel'] ?></a></h5>
								<small style="color: #777;font-family: courier new;"><i class="fa fa-calendar"> &nbsp;<?= $res['TglPost'] ?></i> | <i class="fa fa-user"></i>  
						<?php 
							$Uploader = $res['Uploader'];
							$no = 0;
							$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$Uploader'");
							$resx = mysqli_fetch_array($sqlx);
							echo (!empty($resx['Username'])) ? $resx['Username'] : 'Unknown';
						?></small><br>
								<?= substr($res['IsiArtikel'], 0,50) ?>...
							</div>
							<div style="padding: 20px 0px;background-color: #fff;">
								<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"><button class="btn btn-info col-12" style="position: absolute;bottom: 0px;border-radius: 0px;">Selengkapnya</button></a>
							</div>
						</div>
					<?php
				}		
			}
			else if($no > 0 && !empty($_GET['s'])){
				?>
					<div class='col-lg-12 container' align='center'><hr></div>
					<div class='col-lg-12 container' style="padding-top:20px;padding-bottom:20px;"><h3>Baca Juga</h3></div>
				<?php	
				$s = $_GET['s'];
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel ORDER BY TglPost DESC LIMIT 3 ");
				$no = 0;
				while($res = mysqli_fetch_array($sql)){
					$no++;
					?>
						<div class="col-lg-4" style="width: 100%;position: relative;padding-bottom: 20px;">
							<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"">
								<div class="" align="center" style="width: 100%;height:150px;background: url('../public/img/artikel/<?= $res['Foto'] ?>') center center;background-size: cover;">
								</div>
							</a>
							<div class="" style="padding: 10px;background-color: #fff;">
								<h5><a href="blog.php?a=<?= $res['KodeArtikel'] ?>"" style="color: #000;"><?= $res['JudulArtikel'] ?></a></h5>
								<small style="color: #777;font-family: courier new;"><i class="fa fa-calendar"> &nbsp;<?= $res['TglPost'] ?></i> | <i class="fa fa-user"></i>  
						<?php 
							$Uploader = $res['Uploader'];
							$no = 0;
							$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$Uploader'");
							$resx = mysqli_fetch_array($sqlx);
							echo (!empty($resx['Username'])) ? $resx['Username'] : 'Unknown';
						?></small><br>
								<?= substr($res['IsiArtikel'], 0,50) ?>...
							</div>
							<div style="padding: 20px 0px;background-color: #fff;">
								<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"><button class="btn btn-info col-12" style="position: absolute;bottom: 0px;border-radius: 0px;">Selengkapnya</button></a>
							</div>
						</div>
					<?php
				}	
			}
			if ($no == 0 && !empty($_GET['k'])) {
				?>
					<div class='col-lg-12 container' align='center' style="padding-top:20px;padding-bottom:20px;"><h5><i class="fa fa-search"></i> &nbsp;Artikel tidak ditemukan</h5></div>
					<div class='col-lg-12 container' align='center'><hr></div>
					<div class='col-lg-12 container' style="padding-top:20px;padding-bottom:20px;"><h3>Artikel terbaru</h3></div>
				<?php	
				$s = $_GET['s'];
				$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel ORDER BY TglPost DESC LIMIT 3");
				$no = 0;
				while($res = mysqli_fetch_array($sql)){
					$no++;
					?>
						<div class="col-lg-4" style="width: 100%;position: relative;padding-bottom: 20px;">
							<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"">
								<div class="" align="center" style="width: 100%;height:150px;background: url('../public/img/artikel/<?= $res['Foto'] ?>') center center;background-size: cover;">
								</div>
							</a>
							<div class="" style="padding: 10px;background-color: #fff;">
								<h5><a href="blog.php?a=<?= $res['KodeArtikel'] ?>"" style="color: #000;"><?= $res['JudulArtikel'] ?></a></h5>
								<small style="color: #777;font-family: courier new;"><i class="fa fa-calendar"> &nbsp;<?= $res['TglPost'] ?></i> | <i class="fa fa-user"></i>  
						<?php 
							$Uploader = $res['Uploader'];
							$no = 0;
							$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$Uploader'");
							$resx = mysqli_fetch_array($sqlx);
							echo (!empty($resx['Username'])) ? $resx['Username'] : 'Unknown';
						?></small><br>
								<?= substr($res['IsiArtikel'], 0,50) ?>...
							</div>
							<div style="padding: 20px 0px;background-color: #fff;">
								<a href="blog.php?a=<?= $res['KodeArtikel'] ?>"><button class="btn btn-info col-12" style="position: absolute;bottom: 0px;border-radius: 0px;">Selengkapnya</button></a>
							</div>
						</div>
					<?php
				}		
			}
		?>
		</div>

	</div>
	
</div>
	<?php include'../layouts/footer.php'; ?>
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
