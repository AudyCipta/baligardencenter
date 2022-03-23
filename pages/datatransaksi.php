<!DOCTYPE html>
<html lang="en">
<?php
	$host = "datatransaksi";
	include'../layouts/head2.php';
?>
<style type="text/css">
	body{
		overflow: hidden;
	}
	.keranjangtd{
		font-size: 20px;
		height: 0px;
		padding: 0px;
		padding-left: 20px;
	}
	.keranjangtd2{
		font-size: 12px;
	}
	.keranjangtd .span{
		padding: 0px;
	}
	@media screen and (max-width: 768px){
		.keranjangtd{
			font-size: 10px;
		}
		.keranjangtd2{
			font-size: 6px;
		}
		.keranjangtd small{
			display: none;
		}
	}
	.keranjangtdImg{
		width: 20%;
	}
	.rtb{
		display: none;
	}
	@media screen and (max-width: 768px){
		.nrtb{
			display: none;
		}
		.rtb{
			display: unset;
		}
		.keranjangtdImg{
			width: 20%;
		}
		.keranjangItemInfo *{
			font-size: 10px;
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
	?>

	<div class="container product_section_container" style="overflow: auto;">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Main Content -->
					<div class="row" style="margin-top: 50px;">
						<div class="col">
							<?php
								$st = $_GET['st'];
								$KodeUser = $_COOKIE['KodeUser'];
								if ($st == 0) {
									$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' ORDER BY NoTransaksi DESC");
								}
								else if ($st == 1) {
									$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = 'Sudah Order' ORDER BY NoTransaksi DESC");
								}
								else if ($st == 2) {
									$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = 'Sudah Transfer' ORDER BY NoTransaksi DESC");
								}
								else if ($st == 3) {
									$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = 'Sudah Lunas' ORDER BY NoTransaksi DESC");
								}
								else{
									echo "<script>document.location='datatransaksi.php?st=0';</script>";
								}
								$sementara = "";
								$count = 0;
								while($res = mysqli_fetch_array($sql))
								{
									if ($sementara != $res['NoTransaksi']) {
										$sementara = $res['NoTransaksi'];
										$count++;
									}
								}
							?>
							<h4>Data Transaksi Saya</h4>
							<h5>( 
								<?php  
									$sta = ['Semua','Sudah Order','Sudah Transfer','Sudah Lunas'];
									if (empty($st)) {
										echo "Semua";
									}
									else{
										echo $sta[$st];
									}
								?> )
							</h5>
						</div>
					</div>
						<hr>

					<div class="row">
						<div class="col">
							<?php 
								$sql1 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi <> '' ORDER BY NoTransaksi DESC");
								$sementara = "";
								$count1 = 0;
								while($res1 = mysqli_fetch_array($sql1))
								{
									if ($sementara != $res1['NoTransaksi']) {
										$sementara = $res1['NoTransaksi'];
										$count1++;
									}
								}

								$sql2 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi='Sudah Order' ORDER BY NoTransaksi DESC");
								$sementara = "";
								$count2 = 0;
								while($res2 = mysqli_fetch_array($sql2))
								{
									if ($sementara != $res2['NoTransaksi']) {
										$sementara = $res2['NoTransaksi'];
										$count2++;
									}
								}

								$sql3 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi='Sudah Transfer' ORDER BY NoTransaksi DESC");
								$sementara = "";
								$count3 = 0;
								while($res3 = mysqli_fetch_array($sql3))
								{
									if ($sementara != $res3['NoTransaksi']) {
										$sementara = $res3['NoTransaksi'];
										$count3++;
									}
								}

								$sql4 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi='Sudah Lunas' ORDER BY NoTransaksi DESC");
								$sementara = "";
								$count4 = 0;
								while($res4 = mysqli_fetch_array($sql4))
								{
									if ($sementara != $res4['NoTransaksi']) {
										$sementara = $res4['NoTransaksi'];
										$count4++;
									}
								}

							?>
							<a href="datapesanankursus.php"><button class="btn btn-warning" style="margin: 2px;">Data Pesanan Kursus</button></a>
							<a href="?st=0"><button class="btn btn-info" style="margin: 2px;">Semua ( <?= $count1 ?> )</button></a>
							<a href="?st=1"><button class="btn btn-info" style="margin: 2px;">Sudah Order ( <?= $count2 ?> )</button></a>
							<a href="?st=2"><button class="btn btn-info" style="margin: 2px;">Sudah Transfer ( <?= $count3 ?> )</button></a>
							<a href="?st=3"><button class="btn btn-info" style="margin: 2px;">Sudah Lunas ( <?= $count4 ?> )</button></a>
						</div>
					</div>
						<hr>
					<div class="row" style="margin-top: 50px;overflow: auto;">
						<div class="col">
							<?php
								if ($count == 0) {
									?>
							Data Kosong.<br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
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
<?php
									include'../layouts/footer2.php';
									return false;
								}
							?>
							<table id="example1" class="table table-bordered table-striped">
				                <thead>
				                <tr>
				                  <th>No</th>
				                  <th>No Transaksi</th>
				                  <th>Pelanggan</th>
				                  <th>Produk</th>
				                  <th>Total Harga</th>
				                  <th>Tgl Order</th>
				                  <th>Status Transaksi</th>
				                  <th>Lihat</th>
				                </tr>
				                </thead>
				                <tbody>
				                  <?php
				                    $no=0;
				                    $nox=0;
				                    $NoTransaksix = [];
				                    $sementara = '';
				                    $KodeUser = $_COOKIE['KodeUser'];
				                    $st = $_GET['st'];
				                    if ($st == 0) {
										$sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi <> '' ORDER BY KodePelanggan DESC");
				                    }
									else if ($st == 1) {
										$sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = 'Sudah Order' ORDER BY KodePelanggan DESC");
									}
									else if ($st == 2) {
										$sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = 'Sudah Transfer' ORDER BY KodePelanggan DESC");
									}
									else if ($st == 3) {
										$sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = 'Sudah Lunas' ORDER BY KodePelanggan DESC");
									}
				                    while ($resx = mysqli_fetch_array($sqlx)) {
				                      if ($sementara != $resx[0]) {
				                  		$nox++;
				                        $NoTransaksix[$nox] = $resx[0];   
				                        $sementara = $resx[0];
				                      
				                        $no++;
				                        $totalhargaa=0;
				                        $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$no]'");
				                        $res = mysqli_fetch_array($sql);
				                        echo "
				                          <tr>
				                            <td>".$no."</td>
				                            <td width='200px'>".$res['NoTransaksi']."</td>
				                        ";
				                          $KodeUser = $_COOKIE['KodeUser'];
				                          $sql1 = mysqli_query($process->cnt,"SELECT NamaLengkap FROM tbuser WHERE KodeUser = '$KodeUser'");
				                          $res1 = mysqli_fetch_array($sql1);
				                          echo "
				                            <td style='min-width:150px;'>".$res1[0]."</td>
				                            <td style='min-width:350px;'>";
				                            $sql2 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
				                            while($res2 = mysqli_fetch_array($sql2)){
				                              $KodeProduk = $res2['KodeProduk'];
				                              $sql2a = mysqli_query($process->cnt,"SELECT NamaProduk,Satuan FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
				                              $res2a = mysqli_fetch_array($sql2a);
				                              echo "
				                                * ".$res2a[0]." <small style='color:#666;'>( ".number_format($res2['Jumlah'])." ".$res2a[1]." )</small><br>
				                              ";
				                            }
				                          echo "
				                            </td>
				                            <td align='right' style='min-width:120px;'><span style='float:left'>RP</span>&nbsp;" ;
				                            $sql3 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
				                            while($res3 = mysqli_fetch_array($sql3)){
				                              $totalhargaa = $res3['TotalHarga'] + $totalhargaa;
				                            }
				                            $confirmDelete = "confirmDelete".$no;
				                            if ($res['StatusTransaksi'] == 'Sudah Order') {
				                            	$href = 'tagihan';
				                            }
				                            else{
				                            	$href = 'viewtransaksi' ;
				                            }
				                            echo "".number_format($totalhargaa)."</td>
				                            <td>".$res['TglOrder']."</td>
				                            <td style='min-width:120px;'>".$res['StatusTransaksi']."</td>
				                            <td><a href='".$href.".php?nt=".$res['NoTransaksi']."'><button class='btn btn-info' style='border-radius:50%;'><i class='fa fa-eye'></i></button></a></td>
				                            </tr>
				                          ";

				                      	}
				                  	} 
				                ?>
				                </tbody>
				                <tfoot>
				                <tr>
				                  <th>No</th>
				                  <th>No Transaksi</th>
				                  <th>Pelanggan</th>
				                  <th>Produk</th>
				                  <th>Total Harga</th>
				                  <th>Tgl Order</th>
				                  <th>Status Transaksi</th>
				                  <th>Lihat</th>
				                </tr>
				                </tfoot>
				              </table>
						</div>
					</div>

			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php include '../layouts/footer1.php'; ?>

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

	<script src="../public/js/footer-script.js"></script>
</html>
