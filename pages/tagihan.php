<!DOCTYPE html>
<html lang="en">
<?php
	$host = "tagihan";
	include'../layouts/head2.php';
?>
<style type="text/css">
	body{
		overflow: hidden;
		/*overflow-y: hidden;*/
		min-height: 100vh;
	}
	table *{
		/*font-family: courier new;*/
	}
	.left{
		float: left;
	}
	.nt-text{
		margin-top: 20px;
	}
	.nt-text *{
		font-weight: bold;	
	}
	.nt-text i{
		font-weight: normal;	
		color: lime;
	}
	.nt-info{
		padding-left: 40px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.table2 td{
		padding: 5px;
	}
</style>
<body class="bg-light">

	<!-- Header -->
	<?php
		include'../layouts/notif.php';
	?>
				
				<button class="btn btn-xs btn-info" onclick="window.print()" style="position: fixed;bottom: 10px;left: 10px;z-index: 99;"><i class="fa fa-print"></i> Print</button>
				<!-- Main Content -->
				<?php
					error_reporting(1);
					$nt = $_GET['nt'];
					if (!empty($nt)){
						$sqlz = mysqli_query($process->cnt,"SELECT KodePelanggan FROM tbtransaksiproduk WHERE NoTransaksi = '$nt' AND StatusTransaksi = 'Sudah Order'");
						$resz = mysqli_fetch_array($sqlz);
						$KodeUser = $resz[0];
						if (!$sqlz||!$resz) {
							header('Location:404notfound.php');
						}
						if ($_COOKIE['KodeUser'] != $KodeUser && $_COOKIE['Level'] != '1') {
							header('Location:404notfound.php');
						}
					}
					else{
						header('Location:404notfound.php');
					}
					$KodeUser = $_COOKIE['KodeUser'];
                    $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' AND KodePelanggan = '$KodeUser' ORDER BY NoTransaksi DESC");
                    $no = 0;
                    $sementara = "";  
                    $link = "";  
                    while($res = mysqli_fetch_array($sql)){
                      $time1 = date($res['TglOrder']);
                      $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
                      $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
                      $time3 = date($process->ThisFullDate);

                      if ( $time3 != $time2 && $time3 != $time4){
						header('Location:404notfound.php');
                      	return false;
                      }
                    }
				?>
				<!-- <div class="row" style="margin-top: 100px;width: 100%;padding: 20px;margin-left: 0px;">
						<table id="example1" class="table table-bordered" style="background-color: #fff;">

		                  <?php
		                    $no=0;
		                    $nox=0;
		                    $NoTransaksix = [];
		                    $sementara = '';
		                    $sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' AND KodePelanggan = '$KodeUser' AND NoTransaksi = '$nt' ORDER BY KodePelanggan");
		                    while ($resx = mysqli_fetch_array($sqlx)) {
		                      $nox++;
		                      if ($sementara == $resx[0]) {

		                      }
		                      else{

		                        $NoTransaksix[$nox] = $resx[0];   
		                        $sementara = $resx[0];
		                      
		                        $no++;
		                        $totalhargaa=0;
		                        echo "
		                        	<tr style='position:relative;'>
			                        	<td>
				                			<small>No. Transaksi :</small><br>
				                			<b>$NoTransaksix[$nox]</b>
				                		</td>
				                		<td align='left' style='vertical-align: middle;position:relative;' colspan='3'>
				                			<span style='font-size: 20px;'><b>P O T M E F A R M</b></span>
				                			<div style='position:absolute;right:0px;top:0px;font-size:12px;font-family:arial;padding-right:10px;' align='right'>
				                				<small style='font-size:12px;margin:0px;'>Jalan Raya Sesetan Gang Taman Sari II No 27, Denpasar Selatan, Bali-80223</small><br>
				                				<small style='font-size:12px;margin:0px;'>081398610805</small><br>
				                				<small style='font-size:12px;margin:0px;'>potmefarm@gmail.com</small><br>
				                			</div>
				                		</td>
				                	</tr>
				                	<tr>
				                		<td>Tanggal Order</td>";
		                        $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$no]'");
		                        $res = mysqli_fetch_array($sql);
		                          $KodeUser = $res['KodePelanggan'];
		                          $sql1 = mysqli_query($process->cnt,"SELECT NamaLengkap,Alamat,Telp FROM tbuser WHERE KodeUser = '$KodeUser'");
		                          $res1 = mysqli_fetch_array($sql1);
		                          $no++;
		                          echo "
				                		<td colspan='3'>".$res['TglOrder']."</td>
				                	</tr>
	                          		<tr>
				                		<td>Nama Pelanggan</td>
				                		<td colspan='3'>".$res1[0]."</td>
				                	</tr>
	                          		<tr>
				                		<td>Alamat</td>
				                		<td colspan='3'>".$res1[1]."</td>
				                	</tr>
	                          		<tr>
				                		<td>Telp</td>
				                		<td colspan='3'>".$res1[2]."</td>
				                	</tr>";
				                	if ($res['KodeExpedisi'] != 0) {
				                		echo "
						                	<tr>
												<td align='center'><b>Tanggal Expedisi</b></td>
												<td align='center'><b>NO Resi</b></td>
												<td align='center'><b>Nama Expedisi</b></td>
												<td align='center'><b>Harga</b></td>
						                	</tr>
						                	<tr>
												<td align='center'>".$res['TglOrder']."</td>
												<td></td>
												<td align='center'>";
												$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbexpedisi WHERE KodeExpedisi = '".$res['KodeExpedisi']."';");
												$resx = mysqli_fetch_array($sqlx);
										echo $resx['NamaExpedisi']."</td>
											<td align='right'><span style='float:left;'>RP.</span> ".number_format($resx['Harga'])."</td>
					                	</tr>";
				                	}
				                	echo "
				                	<tr>

				                	</tr>
				                	<tr>
				                		<td align='center'><b>Status</b></td>
				                		<td align='center'><b>Nama Produk</b></td>
				                		<td align='center'><b>Jumlah</b></td>
				                		<td align='center'><b>Harga</b></td>
				                	</tr>
		                          ";
		                            $sql2 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
		                            $nos = 0;
		                            while($res2 = mysqli_fetch_array($sql2)){
										$KodeProduk = $res2['KodeProduk'];
										$sql2a = mysqli_query($process->cnt,"SELECT NamaProduk,Satuan FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
										$res2a = mysqli_fetch_array($sql2a);
										$nos++;
										echo "<tr>";
										if ($nos == 1) {
											$sql2b = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
											$res2b = mysqli_num_rows($sql2b);
											if ($res2['StatusTransaksi'] == 'Sudah Order') {
												$color1 = 'red';
											}

											else if ($res2['StatusTransaksi'] == 'Sudah Transfer') {
												$color1 = 'blue';
											}

											else if ($res2['StatusTransaksi'] == 'Sudah Lunas') {
												$color1 = 'limegreen';
											}
											echo "
												<td rowspan='$res2b' align='center' style='vertical-align:middle;color:$color1;text-transform:uppercase;'>
													".$res2['StatusTransaksi'].
												"</td>
											";
										}
		                              echo "
					                		<td>* ".$res2a[0]."</td>
					                		<td align='center'>".number_format($res2['Jumlah'])." ".$res2a[1]."</td>
					                		<td align='right'><span style='float:left'>RP</span>&nbsp; ".number_format($res2['TotalHarga'])."</td>
					                	</tr>
		                              ";
		                            }
		                          echo "
		                          <tr>
		                          	<td colspan='2'></td>
		                          	<td align='center'><b>Subtotal</b></td>
		                            <td align='right'><span style='float:left'>RP</span>&nbsp; " ;
		                            $sql3 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
		                            while($res3 = mysqli_fetch_array($sql3)){
		                              $totalhargaa = $res3['TotalHarga'] + $totalhargaa;
		                            }
		                            	echo number_format($totalhargaa)."</td>
		                            </tr>
		                            <tr>
		                          	<td colspan='2'></td>
		                          	<td align='center'><b>Expedisi</b></td>
		                            <td align='right'><span style='float:left'>RP</span>&nbsp; " ;
		                            
										$sqlx = mysqli_query($process->cnt,"SELECT * FROM tbexpedisi WHERE KodeExpedisi = '".$res['KodeExpedisi']."';");
										$resx = mysqli_fetch_array($sqlx);
		                            	echo number_format($resx['Harga'])."</td>
		                            </tr>
		                            <tr>
		                          	<td colspan='2'></td>
		                          	<td align='center'><b>Total</b></td>
		                            <td align='right'><span style='float:left'>RP</span>&nbsp; " ;
		                            $sql3 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
		                            $totalhargaa = 0;
		                            $NoTransaksiz = $NoTransaksix[$nox];
		                            while($res3 = mysqli_fetch_array($sql3)){
		                              $totalhargaa = $res3['TotalHarga'] + $totalhargaa;
		                            }
		                            $totalhargaa += $resx['Harga'];
		                            	echo number_format($totalhargaa)."</td>
		                            </tr>
									<form action='../process/handler.php?action=hapustransaksiproduk2' method='post'>
			                            <input type='hidden' name='NoTransaksi' value='".$NoTransaksix[$nox]."'>
			                            <button type='button' onclick='wantDelete(`confirmDelete1`)' class='none btn btn-danger' id='hapustransaksibtn' style='display:none;'><i class='fa fa-trash'></i>Hapus Transaksi</button>
			                            <button type='submit' name='submit' class='none' id='confirmDelete1'></button>
			                          </form>
		                          ";
		                      } 
		                    }
		                  ?>
		                	
		                	
		              	</table>
						<?php  	
							$nt = $_GET['nt'];
							$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$nt'");
							$res = mysqli_fetch_array($sql);
							if ($res['KodeExpedisi'] != 0) {
								?>
		              	<p align="justify">
		              		Silahkan melakukan pembayaran transaksi dengan salah satu cara di bawah ini.<br><br>
		              		* Transfer Bank ke Rekening Bank Mandiri : <b>1450010592745</b> Atas nama An I Gde Wikarga<br>
		              		* Transfer Melalui OVO, Gopay, Dana ke <b>085935123068</b>.<br>
		              		<br>
		              		Proses Transaksi Pembayaran Sesuai Tanggal Yang Tertera Nota Order. Jika Melewati Batas Tanggal Tersebut (
		              		<?php  
		              			$sqlz = mysqli_query($process->cnt,"SELECT TglOrder FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksiz'");
		              			$resz = mysqli_fetch_array($sqlz);
		              			$dat1 = date($resz[0]);
			                    $dat2 = date('Y-m-d',strtotime('+2 days', strtotime($dat1)));

			                    echo $dat2;
		              		?> ), Maka Transaksi atau Pesanan Akan Dihapus.<br>
		              		<br>
		              		Terima Kasih, Admin.
		              	</p>
								<?php
							}
							else{
								?>
				              	<p align="justify">
				              		Silahkan melakukan pembayaran transaksi dengan cara di bawah ini.<br><br> 
		              				1.) <i>Screen Shot</i> halaman ini atau bisa juga print halaman ini dengan ekstensi pdf dengan cara klik tombol print pada bagian pojok kiri bawah.<br>
		              				2.) Kunjungi toko kami ( Jalan Raya Sesetan Gang Taman Sari II no 27, Denpasar Selatan, Bali ).<br>
		              				3.) Lalu lunaskan transaksi dengan cara bayar ke karyawan potmefarm.<br><br>Proses Transaksi Pembayaran akan dihapus / dibatalkan jika melewati batas tanggal tersebut (
				              		<?php  
				              			$sqlz = mysqli_query($process->cnt,"SELECT TglOrder FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksiz'");
				              			$resz = mysqli_fetch_array($sqlz);
				              			$dat1 = date($resz[0]);
					                    $dat2 = date('Y-m-d',strtotime('+2 days', strtotime($dat1)));

					                    echo $dat2;
				              		?> ) yaitu 2 hari setelah melakukan transaksi<br>
				              		<br>
				              		Terima Kasih, Admin.
				              	</p>
								<?php
							}
						?>
				</div> -->
				<div class="row">
					<div class="container">
						<div class="verticalAlign1">
							<div class="verticalAlign2" align="center">
								<div class="">
									<a href="home.php"><img src="../public/img/Logo Potme Farm.png" width="100px" alt=""></a>
								</div>
								<div class="">
									<small style='font-size:12px;margin:0px;'>Jalan Raya Sesetan Gang Taman Sari II No 27, Denpasar Selatan, Bali-80223</small><br>
	                				<small style='font-size:12px;margin:0px;'>081398610805</small><br>
	                				<small style='font-size:12px;margin:0px;'>potmefarm@gmail.com</small><br>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php  
					$sql_tran = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$nt'");
					$res_tran = mysqli_fetch_array($sql_tran);

					$KodePelanggan = $res_tran['KodePelanggan'];
					$sql_user = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodePelanggan'");
					$res_user = mysqli_fetch_array($sql_user);

					$KodeExpedisi = $res_tran['KodeExpedisi'];
					if ($KodeExpedisi != 0) {
						$sql_expdsi = mysqli_query($process->cnt,"SELECT * FROM tbexpedisi WHERE KodeExpedisi = '$KodeExpedisi'");
						$res_expdsi = mysqli_fetch_array($sql_expdsi);

						$Expedisi = $res_expdsi['NamaExpedisi'];
					}
					else{
						$Expedisi = 'Tanpa Expedisi';
					}
				?>
				<div class="row">
					<div class="container">
						<div class="nt-text col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<i class="fa fa-clipboard"></i> &nbsp; No. Transaksi
								</div>
							</div>
						</div>
						<div class="nt-info col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<?= $nt ?>
								</div>
							</div>
						</div>
						<div class="nt-text col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<i class="fa fa-calendar"></i> &nbsp; Tanggal Order
								</div>
							</div>
						</div>
						<div class="nt-info col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<?= $res_tran['TglOrder'] ?>
								</div>
							</div>
						</div>
						<div class="nt-text col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<i class="fa fa-home"></i> &nbsp; Alamat Pengiriman
								</div>
							</div>
						</div>
						<div class="nt-info col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<?= $res_user['NamaLengkap'] ?>, <?= $res_user['Telp'] ?><br>
									<?= $res_user['Alamat'] ?>
								</div>
							</div>
						</div>
						<div class="nt-text col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<i class="fa fa-truck"></i> &nbsp; Expedisi Pengiriman
								</div>
							</div>
						</div>
						<div class="nt-info col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<?= $Expedisi ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="container">
						<div class="col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<i class="fa fa-user" style="color: lime"></i> &nbsp; <b>Pembeli</b><br><br>
									<img src="../public/img/profile/<?= $res_user['Foto'] ?>" alt="" width="50px"> &nbsp; <?= $res_user['NamaLengkap'] ?> ( <?= $res_user['Username'] ?> )
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="container">
						<div class="nt-text col-sm-12">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<i class="fa fa-dollar"></i> &nbsp; Informasi Pembayaran
								</div>
							</div>
						</div>
						<div class="nt-info col-sm-12" style="overflow: auto;">
							<div class="verticalAlign1">
								<div class="verticlaAlign2">
									<table class="table">
										<tr>
											<td>No.</td>
											<td colspan="2">Produk</td>
											<td style="min-width: 120px;" align="right">Harga Satuan</td>
											<td align="right">Jumlah</td>
											<td align="right">Subtotal</td>
										</tr>
											<?php  
												$number = 1;
												$subtotal = 0;
												$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$nt'");
												while($res = mysqli_fetch_array($sql)){
													$KodeProduk = $res['KodeProduk'];
													$sql_produk = mysqli_query($process->cnt,"SELECT * FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
													$res_produk = mysqli_fetch_array($sql_produk);
													?>
														<tr>
															<td><?= $number ?></td>
															<td><img src="../public/img/produk/<?= $res_produk['Foto'] ?>" alt="" width='70px'></td>
															<td style="min-width: 200px;padding-left: 0px;"><?= $res_produk['NamaProduk'] ?></td>
															<td align="right"><?= number_format($res_produk['Harga']) ?></td>
															<td align="right"><?= $res['Jumlah'] ?></td>
															<td align="right"><?= number_format($res_produk['Harga'] * $res['Jumlah']) ?></td>
														</tr>
													<?php
													$subtotal += $res['Jumlah'] * $res_produk['Harga'];
													$number++;
												}
											?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<div class="nt-info col-sm-12" style="overflow: auto;" align="right">
							<div class="verticalAlign1" align="right">
								<div class="verticlaAlign2" align="right">
									<table class="table2">
										<tr>
											<td align="right">Total Pesanan</td>
											<td align="right">:</td>
											<td align="right"><?= number_format($subtotal) ?></td>
										</tr>
										<tr>
											<td align="right">Expedisi</td>
											<td align="right">:</td>
											<td align="right"><?= number_format($res_expdsi['Harga']) ?></td>
										</tr>
										<tr>
											<td align="right">Total Harga</td>
											<td align="right">:</td>
											<td align="right"><h4><?= number_format($res_expdsi['Harga'] + $subtotal) ?></h4></td>
										</tr>
									</table>
									<br>
										<?php  	
											$nt = $_GET['nt'];
											$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$nt'");
											$res = mysqli_fetch_array($sql);
											if ($res['KodeExpedisi'] != 0) {
												?>
													<a href="pembayaran.php?nt=<?= $_GET['nt']; ?>"><button class="btn btn-xs btn-success" title='Bayar'>Konfirmasi Order</button></a>
												<?php
											}
											else{
												?>
													<p align="justify">
									              		Silahkan melakukan pembayaran transaksi dengan cara di bawah ini.<br><br> 
							              				1.) <i>Screen Shot</i> halaman ini atau bisa juga print halaman ini dengan ekstensi pdf dengan cara klik tombol print pada bagian pojok kiri bawah.<br>
							              				2.) Kunjungi toko kami ( Jalan Raya Sesetan Gang Taman Sari II no 27, Denpasar Selatan, Bali ).<br>
							              				3.) Lalu lunaskan transaksi dengan cara bayar ke karyawan Potme Farm.<br><br>Proses Transaksi Pembayaran akan dihapus / dibatalkan jika melewati batas tanggal tersebut (
									              		<?php  
									              			$sqlz = mysqli_query($process->cnt,"SELECT TglOrder FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksiz'");
									              			$resz = mysqli_fetch_array($sqlz);
									              			$dat1 = date($resz[0]);
										                    $dat2 = date('Y-m-d',strtotime('+2 days', strtotime($dat1)));

										                    echo $dat2;
									              		?> ) yaitu 2 hari setelah melakukan transaksi<br>
									              		<br>
									              		Terima Kasih, Admin.
									              	</p>
									              	<br><br>
												<?php
											}
										?>
								</div>
							</div>
						</div>
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
