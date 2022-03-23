<!DOCTYPE html>
<html lang="en">
<?php
	$host = "paketkursus";
	include'../layouts/head2.php';
?>
<style type="text/css">
	@media screen and (max-width: 1000px){
		.sidebar{
			display: none;
		}
	}
</style>
<body>

<div class="super_container">

	<!-- Header -->
	<?php
		include'../layouts/header.php';
		include'../layouts/notif.php';
		include'../layouts/WA-kami.php';

		$p = $_GET['p'];
		if (strlen($p) <= 0) {
			$p = "?p=1";
			if (!empty($_GET['s'])) {
				$s = "&s=".$_GET['s'];
			}
			if (!empty($_GET['k'])) {
				$k = "&k=".$_GET['k'];
			}
			$href = $p.$s.$k;
			echo "
				<script>document.location='".$href."'</script>
			";
		}
	?>

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<div style="padding: 20px;"></div>

				<!-- Sidebar -->

				<div class="sidebar" style="overflow: hidden;border-right: 1px #eee solid;">
					<div class="sidebar_section">
						<div class="sidebar_title" style="margin-top: 10px;">
							<h5>Paket Kursus</h5>
						</div>
						<p align="justify">Kami menyediakan sistem paket kursus untuk mengajar anda jika belum memahami bagaimana cara berkebun dengan baik dan benar dengan harga yang terjangkau.</p>
						<p align="justify">Paket kursus ini sangat berguna untuk anda jika belum memahami cara berkebun dan ingin berkebun dengan baik. Kita sudah menyiapkan beberapa lokasi yang bisa anda pilih sesuai dengan keinginan anda. </p>
					</div>
				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<div style="padding: 10px;padding-right: 0px;">
									<div style="position: relative;">
										<form action="">
											<input type="text" style="color: black;" class="form form-control left" id="formpencarian" placeholder="Pencarian.." name="s" onfocus="pencarianForm()" autocomplete="off">
											<button class="btn btn-info" style="position: absolute;right: 0px;"><i class="fa fa-search"></i></button>
										</form>
									</div>
								</div><br>
								<?php  
									$s = $_GET['s'];
									if (!empty($s)) {
										echo "<br><div class='container'>Hasil pencarian '".$s."'</div>";
									}
								?>
								<?php
									$s = $_GET['s'];

									if (strlen($s) > 0) {
										$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus WHERE NamaPaket LIKE '%$s%' ORDER BY KodePaket DESC");
									}
									else{
										$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus ORDER BY KodePaket DESC");
									}
									$nox = 0;
									$page_total = 0;
									while ($res = mysqli_fetch_array($sql)) {
										if ($nox % 8 == 0) {
											$page_total++;
										}
										$nox++;
									}
									$display1 = '';
									if ($page_total == 0) {
										$display1 = 'none';
									}
								?>
								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top <?= $display1 ?>" style="padding: 10px;">
									
									<div class="pages d-flex flex-row align-items-center">
										<?php
											if ($p > 1) {
												if ( !empty($_GET['p'] && count($_GET) == 1 )) {
													$next = $p - 1;
													$href = "?p=".$next;
												}
												else if (empty($_GET['p'] && count($_GET) != 0)) {
													$next = $p - 1;
													$href = "&p=".$next;
												}
												else if (!empty($_GET['p'] && count($_GET) > 0)) {
													$next = $p - 1;
													$s = "";
													$k = "";
													if (!empty($_GET['s'])) {
														$s = "&s=".$_GET['s'];
													}
													$href = "?p=".$next.$s;
												}
												echo "
													<div id='next_page' class='page_next' style='margin-right: 20px;margin-left: 0px;'><a href='".$href."'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></a></div>
												";
											}
										?>
										<div class='page_total' style="margin-right: 10px;">
											<span><?= $p ?></span>
										</div>
										<?php
											$s = $_GET['s'];

											if (strlen($s) > 0) {
												$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus WHERE NamaPaket LIKE '%$s%' ORDER BY KodePaket DESC");
											}
											else{
												$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus ORDER BY KodePaket DESC");
											}
											$nox = 0;
											$page_total = 0;
											while ($res = mysqli_fetch_array($sql)) {
												if ($nox % 8 == 0) {
													$page_total++;
												}
												$nox++;
											}
											if ($p > $page_total && $page_total != 0 || $p == 0) {
												$p = "?p=1";
											if (!empty($_GET['s'])) {
												$s = "&s=".$_GET['s'];
											}
											$href = $p.$s;
											echo "
												<script>document.location='".$href."'</script>
											";
											}
										?>
										<div class="page_total"><span style='margin-right: 20px;'>of</span><?= $page_total ?></div>
										<?php
											if ($p < $page_total) {
												if ( !empty($_GET['p'] && count($_GET) == 1 )) {
													$next = $p + 1;
													$href = "?p=".$next;
												}
												else if (empty($_GET['p'] && count($_GET) != 0)) {
													$next = $p + 1;
													$href = "&p=".$next;
												}
												else if (!empty($_GET['p'] && count($_GET) > 0)) {
													$next = $p + 1;
													$s = "";
													$k = "";
													if (!empty($_GET['s'])) {
														$s = "&s=".$_GET['s'];
													}
													$href = "?p=".$next.$s;
												}
												echo "
													<div id='next_page' class='page_next'><a href='".$href."'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></a></div>
												";
											}
										?>
									</div>

								</div>

								<!-- Product Grid -->

								<div class="product-grid">

									<!-- Product 1 -->
									<?php
										$s = $_GET['s'];
										$k = $_GET['k'];

										if (!empty($s) && strlen($s) > 0) {
											$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus WHERE NamaPaket LIKE '%$s%' ORDER BY KodePaket DESC");
										}
										else{
											$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus ORDER BY KodePaket DESC");
										}
										$no = 0;
										while($res = mysqli_fetch_array($sql)){
											$no++;
											if ($no <= ($p * 8) && $no > (($p * 8) - 8)) {
												echo" 
													<div class='product-item' style='padding:0px;'>
														<div class='product discount product_filter' align='center'>
															<div class='product_image'>
																<a href='pesanpaketkursus.php?p=".$res['KodePaket']."'><img src='../public/img/paketkursus/".$res['Foto']."' alt=''></a>
															</div>
															<div class='product_info' style='padding:5px;' align='center'>
																<h6 class='product_name'><a href='pesanpaketkursus.php?p=".$res['KodePaket']."'>".$res['NamaPaket']."</a></h6>
																<div class='product_price'>IDR ".number_format($res['Harga'])."</div>
															</div>
														</div>
														<div class='red_button add_to_cart_button' id='pesanpaketbutton' style='width:100%;padding:0px;margin:0px;'>
															<a href='pesanpaketkursus.php?p=".$res['KodePaket']."' style='font-size:12px;'>Pesan Paket</a>
														</div>
													</div>
												";
											}
										}
										if ($no == 0) {
											echo "
												<center>Paket tidak ditemukan.</center>
											";
										}
									?>
								</div>
								
								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top <?= $display1 ?>" style="padding: 10px;">
									
									<div class="pages d-flex flex-row align-items-center">
										<?php
											if ($p > 1) {
												if ( !empty($_GET['p'] && count($_GET) == 1 )) {
													$next = $p - 1;
													$href = "?p=".$next;
												}
												else if (empty($_GET['p'] && count($_GET) != 0)) {
													$next = $p - 1;
													$href = "&p=".$next;
												}
												else if (!empty($_GET['p'] && count($_GET) > 0)) {
													$next = $p - 1;
													$s = "";
													$k = "";
													if (!empty($_GET['s'])) {
														$s = "&s=".$_GET['s'];
													}
													$href = "?p=".$next.$s;
												}
												echo "
													<div id='next_page' class='page_next' style='margin-right: 20px;margin-left: 0px;'><a href='".$href."'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></a></div>
												";
											}
										?>
										<div class='page_total' style="margin-right: 10px;">
											<span><?= $p ?></span>
										</div>
										<?php
											$s = $_GET['s'];

											if (strlen($s) > 0) {
												$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus WHERE NamaPaket LIKE '%$s%' ORDER BY KodePaket DESC");
											}
											else{
												$sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus ORDER BY KodePaket DESC");
											}
											$nox = 0;
											$page_total = 0;
											while ($res = mysqli_fetch_array($sql)) {
												if ($nox % 8 == 0) {
													$page_total++;
												}
												$nox++;
											}
											if ($p > $page_total && $page_total != 0 || $p == 0) {
												$p = "?p=1";
											if (!empty($_GET['s'])) {
												$s = "&s=".$_GET['s'];
											}
											$href = $p.$s;
											echo "
												<script>document.location='".$href."'</script>
											";
											}
										?>
										<div class="page_total"><span style='margin-right: 20px;'>of</span><?= $page_total ?></div>
										<?php
											if ($p < $page_total) {
												if ( !empty($_GET['p'] && count($_GET) == 1 )) {
													$next = $p + 1;
													$href = "?p=".$next;
												}
												else if (empty($_GET['p'] && count($_GET) != 0)) {
													$next = $p + 1;
													$href = "&p=".$next;
												}
												else if (!empty($_GET['p'] && count($_GET) > 0)) {
													$next = $p + 1;
													$s = "";
													$k = "";
													if (!empty($_GET['s'])) {
														$s = "&s=".$_GET['s'];
													}
													$href = "?p=".$next.$s;
												}
												echo "
													<div id='next_page' class='page_next'><a href='".$href."'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></a></div>
												";
											}
										?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	
	<?php include'../layouts/footer.php'; ?>

</div>

<script src="../public/js/jquery-3.2.1.min.js"></script>
<script src="../public/css/bootstrap4/popper.js"></script>
<script src="../public/css/bootstrap4/bootstrap.min.js"></script>
<script src="../public/vendor/Isotope/isotope.pkgd.min.js"></script>
<script src="../public/vendor/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../public/vendor/easing/easing.js"></script>
<script src="../public/vendor/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../public/js/categories_custom.js"></script>
</body>

</html>
