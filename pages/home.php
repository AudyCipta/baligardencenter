<!DOCTYPE html>
<html lang="en">
<?php 
	$host = "home";
	include'../layouts/head2.php'; 
?>
<style>
	#pencarianDiv{
		padding: 0px 70px;
	}

	@media screen and (max-width: 1000px){
		#pencarianDiv{
			padding: 0px;
		}
	}
</style>

<body>

<div class="super_container">

	<!-- Header -->

	<?php 
		include'../layouts/notif.php';
		include'../layouts/header.php';
		include'../layouts/WA-kami.php';
	?>

	<!-- Slider -->

	<div class="main_slider" style="background:url(../public/img/tomat.jpg) center center fixed;background-size: cover;">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6 style="color: #fff;">Bali Garden Center </h6>
						<h1 style="color: #fff;">Berkebun dengan mudah dan menyenangkan</h1>
						<div class="red_button shop_now_button"><a href="toko.php">Belanja sekarang</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers" id="pencarianDiv">
		<div class="" align="center">
			<div class="row col-12" style="margin-top: 40px;" align="center">
				<div class="col" align="center">
					<div class="" align="center" style="margin-top: 30px;position: relative;">
						<div class="left" id="pencarianForm" style="width: 100%;margin: auto;">
							<div class="verticalAlign1" align="center" style="width: 100%;">
								<div class="verticalAlign2" align="center" style="width: 100%;">
									<div style="position: relative;">
										<form action="toko.php" method="get">
											<input type="text" class="form form-control left" id="formpencarian" placeholder="Pencarian Produk" style="color: black;" name="s" onfocus="pencarianForm()">
											<button class="btn btn-info" style="position: absolute;right: 0px;"><i class="fa fa-search"></i></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blogs -->

	<div class="blogs">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>Artikel</h2>
					</div>
				</div>
			</div>
			<div class="row blogs_container">
				<?php  
					$sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel ORDER BY TglPost DESC LIMIT 3");
					while ($res = mysqli_fetch_array($sql)) {
						?>
							<div class='col-lg-4 blog_item_col'>
								<div class='blog_item'>
									<div class='blog_background' style='background-image:url("../public/img/artikel/<?= $res['Foto'] ?>")'></div>
									<div class='blog_content d-flex flex-column align-items-center justify-content-center text-center'>
										<h4 class='blog_title'><?= $res['JudulArtikel'] ?></h4>
										<span class='blog_meta'>by 
											<?php 
												$Uploader = $res['Uploader'];
												$no = 0;
												$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$Uploader'");
												$resx = mysqli_fetch_array($sqlx);
												echo (!empty($resx['Username'])) ? $resx['Username'] : 'Unknown';
											?> | <?= $res['TglPost'] ?></span>
										<a class='blog_more' href='blog.php?a=<?= $res['KodeArtikel'] ?>'>Selengkapnya</a>
									</div>
								</div>
							</div>
						<?php
					}
				?>
			</div>
		</div>
	</div>

	<!-- Blogs -->
	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-4 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-leaf" aria-hidden="true"></i></div>
						<div class="benefit_content" style="padding-right: 15px;">
							<h6>Go Green</h6>
							<p>Ayo tanam satu pohon di rumah untuk melestarikan lingkungan.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-gratipay" aria-hidden="true"></i></div>
						<div class="benefit_content" style="padding-right: 15px;">
							<h6>Education</h6>
							<p>Belajar berkebun sekarang menjadi lebih mudah dan menyenangkan.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
						<div class="benefit_content" style="padding-right: 15px;">
							<h6>Fun</h6>
							<p>Memberikan pengalaman berkebun yang menyenangkan untuk semua orang.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers" id="terbaruDiv">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Produk Terbaru</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">
							<?php
								$sql = mysqli_query($process->cnt,"SELECT * FROM tbproduk ORDER BY KodeProduk DESC LIMIT 10");
								$no = 0;
								while($res = mysqli_fetch_array($sql)){
									echo "
									<div class='owl-item product_slider_item'>
										<div class='product-item'>
											<div class='product discount'>
												<div class='product_image'>
													<a href='produk.php?p=".$res['KodeProduk']."'><img src='../public/img/produk/".$res['Foto']."' alt='></a>
												</div>
												<div class='favorite favorite_left'></div>
												<div class='product_info'>
													<h6 class='product_name'><a href='produk.php?p=".$res['KodeProduk']."'>".$res['NamaProduk']."</a></h6>
													<div class='product_price'>RP ".number_format($res['Harga'])."</div>
												</div>
											</div>
										</div>
									</div>";
								}
							?>
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Us -->

	<div class="blogs" id="paketkursus">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>Paket Kursus</h2>
					</div>
				</div>
			</div>

		<!-- Contact Us -->

		<div class="row" style="padding-top: 50px;">

			<div class="col-lg-5 contact_col" align="center">
				
				<img src="../public/img/pic_paketkursus.png" alt="">

			</div>
			
			<div class="col-lg-7 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Paket Kursus</h1>
					<p align="justify">Kami menyediakan sistem paket kursus untuk mengajar anda jika belum memahami bagaimana cara berkebun dengan baik dan benar dengan harga yang terjangkau.<br><br>Paket kursus ini sangat berguna untuk anda jika belum memahami cara berkebun dan ingin berkebun dengan baik. Kita sudah menyiapkan beberapa lokasi yang bisa anda pilih sesuai dengan keinginan anda. </p><br>
					<a href="paketkursus.php"><button class="btn btn-success">Pesan sekarang</button></a>
				</div>
			</div>

		</div>
		</div>
	</div>
	<!-- Contact Us -->

	<div class="blogs" style="padding-top: 150px;" id="kontakkami">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>Kontak Kami</h2>
					</div>
				</div>
			</div>

		<!-- Contact Us -->

		<div class="row" style="padding-top: 50px;">
			<div class="col-lg-6 contact_col">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.9970188933903!2d115.21353021439954!3d-8.691831493755169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2411e4aecf961%3A0xc929e1abffd6d29d!2sPotme+Farm!5e0!3m2!1sen!2sid!4v1558859084803!5m2!1sen!2sid" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h1>Hubungi kami</h1>
					<p>Ada banyak cara untuk menghubungi kami. Anda dapat mengirimi kami telepon, menelepon kami atau mengirim email, pilih yang paling cocok untuk Anda.</p>
					<div>
						<p>+6285792619037</p>
						<p>baligarden@gmail.com</p>
					</div>
					<div>
						<p>Buka Jam : 07:00 - 21.00 Setiap hari</p>
						<p>
							Status : 
							<?php
								if ($process->ThisHours >= 7 && $process->ThisHours < 21) {
									echo "Buka";
								}
								else{
									echo "Tutup";
								}
							?>
						</p>
					</div>
				</div>

				<!-- Follow Us -->

				<div class="follow_us_contents">
					<h1>Ikuti Kami</h1>
					<ul class="social d-flex flex-row">
						<li><a href="https://www.facebook.com/potmefarm" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://www.twitter.com/potmefarm" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="https://www.instagram.com/potmefarm" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UCum1K9twEcZz5LBQ-7vYIxA" style="background-color: red"><i class="fa fa-youtube" aria-hidden="true" style="font-size: 20px;" ></i></a></li>
					</ul>
				</div>

			</div>			

		</div>
		</div>
	</div>

	<!-- Footer -->



</div>
	<?php include'../layouts/footer.php'; ?>
<script type="text/javascript">
	function pencarianForm() {
		var heightt = ($('#pencarianDiv').offset().top) - 100;
		$(window).scrollTop(heightt);
	}
</script>

<script src="../public/js/jquery-3.2.1.min.js"></script>
<script src="../public/css/bootstrap4/popper.js"></script>
<script src="../public/css/bootstrap4/bootstrap.min.js"></script>
<script src="../public/vendor/Isotope/isotope.pkgd.min.js"></script>
<script src="../public/vendor/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../public/vendor/easing/easing.js"></script>
<script src="../public/js/custom.js"></script>
</body>

	<script src="../public/js/footer-script.js"></script>
</html>
