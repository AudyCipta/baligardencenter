<!DOCTYPE html>
<html lang="en">
<?php
  $host = "lihattransaksi";
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
<button class="btn btn-xs btn-info" onclick="window.print()" style="position: fixed;bottom: 10px;left: 10px;z-index: 99;"><i class="fa fa-print"></i> Print</button>
  <!-- Header -->
  <?php
    include'../layouts/notif.php';
  ?>

        <!-- Main Content -->
        <?php
          error_reporting(0);
          $nt = $_GET['nt'];
          if (!empty($nt)){
            $sqlz = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$nt' AND StatusKursus<>'' AND StatusKursus<>'Sudah Order'");
            $resz = mysqli_fetch_array($sqlz);
            $time1 = date($resz['TglOrder']);
            $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
            $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
            $time3 = date($process->ThisFullDate);

            if ( $time3 != $time2 && $time3 != $time4){
              header('Location:404notfound.php');
              return false;
            }

            $KodeUser = $resz['KodePelanggan'];
            if (!$sqlz||!$resz) {
              header('Location:404notfound.php');
              return false;
            }
            if ($_COOKIE['KodeUser'] != $KodeUser && $_COOKIE['Level'] != '1') {
              header('Location:404notfound.php');
              return false;
            }
          }
          else{
            header('Location:404notfound.php');
          }
        ?>
        <!-- <div class="row" style="margin-top: 100px;width: 100%;padding: 20px;margin-left: 0px;">
            <table id="example1" class="table table-bordered" style="background-color: #fff;">

                      <?php
                        $no=0;
                        $nox=0;
                        $NoTransaksix = [];
                        $sementara = '';
                        $sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbpesankursus WHERE NoTransaksi = '$nt' AND KodePelanggan = '$KodeUser' ORDER BY KodePelanggan");
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
                              <tr>
                                <td width='200px'>
                              <small>No. Transaksi :</small><br>
                              <b style='font-size: 20px;'>$NoTransaksix[$nox]</b>
                            </td>
                            <td align='center' style='vertical-align: middle;' colspan='3'>
                              <span style='font-size: 20px;'><b>P O T M E F A R M</b></span>
                            </td>
                          </tr>
                          <tr>
                            <td>Tanggal Order</td>";
                            $sql = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksix[$no]'");
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
                          </tr>
                          <tr>
                            <td align='center'><b>Tanggal Expedisi</b></td>
                            <td align='center'><b>NO Resi</b></td>
                            <td align='center'><b>Nama Expedisi</b></td>
                            <td align='center'><b>Harga</b></td>
                                  </tr>
                                  <tr>
                            <td align='center' colspan='4'>Belum</td>
                          </tr>
                          <tr>
                            <td align='center'><b>Status</b></td>
                            <td align='center' style='min-width:500px;'><b>Nama Paket</b></td>
                            <td style='min-width:100px;' align='center'><b>Jumlah</b></td>
                            <td style='min-width:150px;' align='center'><b>Harga</b></td>
                          </tr>
                              ";
                                $sql2 = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                                $nos = 0;
                                while($res2 = mysqli_fetch_array($sql2)){
                                  $KodePaket = $res2['KodePaket'];
                                  $sql2a = mysqli_query($process->cnt,"SELECT NamaPaket FROM tbpaketkursus WHERE KodePaket = '$KodePaket'");
                                  $res2a = mysqli_fetch_array($sql2a);
                                  $nos++;
                                  echo "<tr>";
                                  if ($nos == 1) {
                                    $sql2b = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                                    $res2b = mysqli_num_rows($sql2b);
                                    if ($res2['StatusKursus'] == 'Sudah Transfer') {
                                      $color1 = 'blue';
                                    }

                                    else if ($res2['StatusKursus'] == 'Sudah Order') {
                                      $color1 = 'red';
                                    }

                                    else if ($res2['StatusKursus'] == 'Sudah Lunas') {
                                      $color1 = 'limegreen';
                                    }
                                    echo "
                                      <td rowspan='$res2b' align='center' style='vertical-align:middle;color:$color1;text-transform:uppercase;'>
                                        ".$res2['StatusKursus'].
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
                                <td colspan='3' align='center'><b style='font-size:20px;'>Total</b></td>
                                <td align='right'><span style='float:left'>RP</span>&nbsp; " ;
                                $sql3 = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                                while($res3 = mysqli_fetch_array($sql3)){
                                  $totalhargaa = $res3['TotalHarga'] + $totalhargaa;
                                }
                                  echo number_format($totalhargaa)."</td>
                                </tr>
                              ";
                          } 
                        }
                      ?>
                      
                      
                    </table>
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
          $sql_tran = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$nt'");
          $res_tran = mysqli_fetch_array($sql_tran);

          $sql_pemb = mysqli_query($process->cnt,"SELECT * FROM tbpembayarankursus WHERE NoTransaksi = '$nt'");
          $res_pemb = mysqli_fetch_array($sql_pemb);

          $KodePelanggan = $res_tran['KodePelanggan'];
          $sql_user = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodePelanggan'");
          $res_user = mysqli_fetch_array($sql_user);
        ?>
        <div class="row">
          <div class="container">
            <div class="col-md-6 left">
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
                    <i class="fa fa-home"></i> &nbsp; Lokasi
                  </div>
                </div>
              </div>
              <div class="nt-info col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <?= $res_tran['Lokasi'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 left">
              <div class="nt-text col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <i class="fa fa-dollar-sign"></i> &nbsp; No. Rekening
                  </div>
                </div>
              </div>
              <div class="nt-info col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <?= $res_pemb['NoRek'] ?>
                  </div>
                </div>
              </div>
              <div class="nt-text col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <i class="fa fa-calendar"></i> &nbsp; Tanggal Pembayaran
                  </div>
                </div>
              </div>
              <div class="nt-info col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <?= $res_pemb['TglPembayaran'] ?>
                  </div>
                </div>
              </div>
              <div class="nt-text col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <i class="fa fa-user"></i> &nbsp; Atas Nama
                  </div>
                </div>
              </div>
              <div class="nt-info col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <?= $res_pemb['AtasNama'] ?>
                  </div>
                </div>
              </div>
              <div class="nt-text col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <i class="fa fa-university"></i> &nbsp; Bank
                  </div>
                </div>
              </div>
              <div class="nt-info col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <?= $res_pemb['NamaBank'] ?>
                  </div>
                </div>
              </div>
              <div class="nt-text col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <i class="fa fa-dollar"></i> &nbsp; Jumlah Pembayaran
                  </div>
                </div>
              </div>
              <div class="nt-info col-sm-12">
                <div class="verticalAlign1">
                  <div class="verticlaAlign2">
                    <?= number_format($res_pemb['JumlahPembayaran']) ?>
                  </div>
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
                      <td colspan="2">Paket Kursus</td>
                      <td style="min-width: 140px;" align="right">Harga</td>
                      <td align="right">Durasi</td>
                      <td align="right">Subtotal</td>
                    </tr>
                      <?php  
                        $number = 1;
                        $subtotal = 0;
                        $sql = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$nt'");
                        while($res = mysqli_fetch_array($sql)){
                          $KodePaket = $res['KodePaket'];
                          $sql_kursus = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus WHERE KodePaket = '$KodePaket'");
                          $res_kursus = mysqli_fetch_array($sql_kursus);
                          ?>
                            <tr>
                              <td><?= $number ?></td>
                              <td style="width: 70px;"><img src="../public/img/paketkursus/<?= $res_kursus['Foto'] ?>" alt="" width='70px'></td>
                              <td style="min-width: 200px;padding-left: 0px;"><?= $res_kursus['NamaPaket'] ?></td>
                              <td align="right"><?= number_format($res_kursus['Harga']) ?> / <?= $res_kursus['Durasi'] ?> Jam</td>
                              <td align="right"><?= $res['Durasi'] ?> Jam</td>
                              <td align="right"><?= number_format($res_kursus['Harga'] * ($res['Durasi'] / $res_kursus['Durasi'])) ?></td>
                            </tr>
                          <?php
                          $subtotal += ($res['Durasi'] / $res_kursus['Durasi']) * $res_kursus['Harga'];
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
                      <td align="right">Total Harga</td>
                      <td align="right">:</td>
                      <td align="right"><h4><?= number_format($subtotal) ?></h4></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br><br>

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
