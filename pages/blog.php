<!DOCTYPE html>
<html lang="en">
<?php
	$host="blog";
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
	#imgartikel{
		height:500px;
	}
	@media screen and (max-width: 720px){
		#imgartikel{
			height: 200px;
		}
	}
	blockquote{
		border-left: 5px solid #CCC;
		padding-top: 12px;
		padding-left: 20px;
		padding-bottom: 3px;
		margin-left: 30px;
		font-style: italic;
	}
</style>
<body>
	<?php  
		$KodeArtikel = $_GET['a'];
		$sqlz = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE KodeArtikel = '$KodeArtikel'");
		$resz = mysqli_num_rows($sqlz);
		if ($resz == 0) {
			header('Location:404notfound.php');
			return false;
		}
	?>
<div class="super_container">

	<!-- Header -->

	<?php include'../layouts/header.php';include'../layouts/notif.php';
		include'../layouts/WA-kami.php'; ?>

	<div class="container single_product_container">
		
		<div style="padding:20px 0px;position: relative;">
			<form action="artikel.php">
				<input type="text" name="s" class="form form-control" placeholder="Cari Artikel">
				<button class="btn btn-info" style="position: absolute;border-radius: 0px;right: 0px;top: 20px;"><i class="fa fa-search"></i></button>
			</form>
		</div>
		
		<div class="row">
		<?php
			error_reporting(0);
			$a = $_GET['a'];
			$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE KodeArtikel = '$a' ORDER BY TglPost DESC");
			$res = mysqli_fetch_array($sql);
		?>
			<div class="col-lg-9" style="width: 100%;position: relative;padding-bottom: 20px;">
					<div id="imgartikel" align="center" style="width: 100%;background: url('../public/img/artikel/<?= $res['Foto'] ?>') center center;background-size: cover;">
					</div>
				<div class="" style="padding: 30px;background-color: #fff;">
					<h2><?= $res['JudulArtikel'] ?></h2>
					<small style="color: #777;font-family: courier new;"><br><i class="fa fa-calendar"> &nbsp;<?= $res['TglPost'] ?></i> | <i class="fa fa-user"></i> 
						<?php 
							$Uploader = $res['Uploader'];
							$no = 0;
							$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$Uploader'");
							$resx = mysqli_fetch_array($sqlx);
							echo (!empty($resx['Username'])) ? $resx['Username'] : 'Unknown';
						?> | <?php $Kategori = ['','Tips & Trik','Bunga','Sayur','Buah','Lifestyle']; echo $Kategori[$res['Kategori']]; ?>
					</small><br>
					<br>
					<div align="justify"><?= $res['IsiArtikel'] ?></div><br>
					<span class="right">Halaman 1 dari 1</span>
					<br>
				</div>
			</div>
			<div class="col-lg-3" style="width: 100%;position: relative;background-color: #fff;height: 800px;">
				<br>
					<h4>Baca Juga</h4>
					<?php
						error_reporting(0);
						$a = $_GET['a'];
						$nox = 0;
						$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE KodeArtikel <> '$a' ORDER BY rand() DESC LIMIT 2");
						while ($res = mysqli_fetch_array($sql)) {
					?>
					<div class="col-lg-12" style="width: 100%;position: relative;padding-top: 20px;padding-bottom: 20px;">
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
					?>
			</div>
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
