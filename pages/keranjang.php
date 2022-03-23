<!DOCTYPE html>
<html lang="en">
<?php
	$host = "keranjang";
	include'../layouts/head2.php';
?>
<style type="text/css">
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
		include'../layouts/notif.php';
		include'../layouts/header.php';
		include'../layouts/WA-kami.php';
	?>
	
	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Main Content -->
					<div class="row" style="margin-top: 50px;">
						<div class="col">
							<?php
								$KodeUser = $_COOKIE['KodeUser'];
								$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = '' ");
								$count = mysqli_num_rows($sql);
							?>
							<h4>Keranjang Saya (<?= $count ?>)</h4>
						</div>
					</div>
						<hr>
					<div class="row" style="margin-top: 50px;">
						<div class="col">
							<!-- <table class="table"> -->
								<?php
									$KodeUser = $_COOKIE['KodeUser'];
									$sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodeUser' AND StatusTransaksi = '' ");
									$no = 0;
									$totaloftotal = 0;
									while ($res = mysqli_fetch_array($sql)) {
										$no++;
                      					$confirmDelete = 'confirmDelete'.$no;
                      					$confirmDeletes = 'confirmDeletes'.$no;
										extract($res);
										$sql1 = mysqli_query($process->cnt,"SELECT * FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
										$res1 = mysqli_fetch_array($sql1);
										extract($res1);
										echo "
											<div class='col-12 left nrtb'>
												<div class='col-md-2 col-sm-1 left'>
													<div class='verticalAlign1'>
														<div class='verticalAlign2'>
															<img src='../public/img/produk/$Foto' width='100%'>
														</div>
													</div>
												</div>
												<div class='col-md-10 col-sm-11 left'>
													<div class='col-12 left'>
														<div class='verticalAlign1'>
															<div class='verticalAlign2'>
																<table class='table'>
																	<tr>
																		<td style='border-top:0px;'>
																			Nama produk
																		</td>
																		<td style='border-top:0px;'>
														 					$NamaProduk
																		</td>
																	</tr>
																	<tr>
																		<td>
																			Jumlah
																		</td>
																		<td>
														 					".number_format($Jumlah)." $Satuan
																		</td>
																	</tr>
																	<tr>
																		<td>
																			Total Harga
																		</td>
																		<td>
														 					RP ".number_format($TotalHarga)."
																		</td>
																	</tr>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div align='right' style='z-index:5;'>
						                            <form action='../process/handler.php?action=hapustransaksiproduk' method='post'>
						                              <input type='hidden' name='KodeTransaksi' value='$KodeTransaksi'>
						                              <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger'  title='Hapus'><i class='fa fa-trash'></i></button>
						                              <button type='submit' name='submit' class='none' id='confirmDelete".$no."'></button>
						                            </form>
												</div>
											<br><hr><br>
											</div>
											<div class='rtb'>
												<table>
													<tr>
												 		<td class='keranjangtdImg' rowspan='3'>
												 			<img src='../public/img/produk/$Foto' width='100%'>
												 		</td>
												 		<td class='keranjangtd'>
												 			".substr($NamaProduk,0,30)."...
												 		</td>
												 	</tr>
												 	<tr>
												 		<td class='keranjangtd'>
												 			".number_format($Jumlah)." $Satuan
												 		</td>
												 	</tr>
												 	<tr>
												 		<td class='keranjangtd'>
												 			RP ".number_format($TotalHarga)."
												 		</td>
												 	</tr>
												</table>
												<div align='right'>
						                            <form action='../process/handler.php?action=hapustransaksiproduk' method='post'>
						                              <input type='hidden' name='KodeTransaksi' value='$KodeTransaksi'>
						                              <button type='button' onclick='wantDelete(`$confirmDeletes`)' class='btn btn-danger'  title='Hapus'><i class='fa fa-trash'></i></button>
						                              <button type='submit' name='submit' class='none' id='confirmDeletes".$no."'></button>
						                            </form>
												</div>
												<hr>
											</div>
										";
										$totaloftotal += $TotalHarga;
									}
									if ($totaloftotal > 0) {
										echo "
											<form action='../process/handler.php?action=checkouttransaksiproduk' method='post'>
												<select name='expedisi1' id='expedisi1' onchange='expedisichange()' class='form form-control' style='color:#000;' required>
													<option value='' selected class='none'>Pilih Expedisi</option>
													<option value='tanpaex,0'>Tanpa Expedisi</option>
													";
													$sqlz = mysqli_query($process->cnt,"SELECT * FROM tbexpedisi");
													while ($resz = mysqli_fetch_array($sqlz)) {
														echo "<option value='".$resz['KodeExpedisi'].",".$resz['Harga']."'>".$resz['NamaExpedisi']."</option>";
													}
										echo "
												</select><br>
												<input type='hidden' name='KodePelanggan' value='".$_COOKIE['KodeUser']."'>
												<input type='hidden' name='KodeExpedisi' id='expedisi' value=''>
												<div align='right'>
													Subtotal : RP. ".number_format($totaloftotal)."<br>
													<input type='hidden' id='subtotal' value='".$totaloftotal."'></input>
													Expedisi : RP. <span id='exharga'>0</span><br>
													Total Harga <h2><small>RP.</small><span id='totaloftotal'>".number_format($totaloftotal)."</span></h2>
													<button type='submit' name='submit' class='btn btn-success btn-md'>Checkout</button>
												</div>
											</form>
											
										";
									}
									else{
										echo "
										<div align='center'>
											Tidak ada barang dalam keranjang.
										</div>
										";
									}
								?>
						
						</div>
					</div>

			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php include '../layouts/footer.php'; ?>	

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
  function expedisichange() {
  	var exval = $('#expedisi1').val();

  	var exkode = exval.split(',')[0];
  	var exhrga = exval.split(',')[1];
    var exhrga1 = exhrga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  	var exhrga2 = parseInt(exhrga);
  	$('#expedisi').val(exkode);
  	$('#exharga').html(exhrga1);
  	var subtotal = $('#subtotal').val();
  	var subtotal = parseInt(subtotal);
  	var totaloftotal = subtotal + exhrga2;
  	var totaloftotal = totaloftotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  	$('#totaloftotal').html(totaloftotal);

  }
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
