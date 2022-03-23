<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "transaksiproduk";
  include'../layouts/head.php';
?>
<style>
  table td{
    font-size: 12px;
  }
</style>
<body class="hold-transition sidebar-mini">
<?php include '../layouts/notif.php'; ?>
<div class="wrapper">
  <!-- Navbar -->
  <?php include'../layouts/adminNavbar.php'; ?>
  <!-- /.navbar -->

  <?php include '../layouts/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="overflow: auto;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaksi Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 10px;">
          <div class="card"style="width: 100%">
            <div class="card-header">
              <h3 class="card-title">Form Transaksi Produk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="../process/handler.php?action=tambahtransaksiproduk" enctype="multipart/form-data">
                <div class=" col-sm-12 left"> 
                  <div class="inputBox" id="KodePelangganBox">
                    <select name="KodePelanggan" class="form form-control" id="" required>
                      <option value="" class="none" selected disabled>Pilih pelanggan</option>
                      <?php
                        $sql = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Level = '3'");
                        while ($res = mysqli_fetch_array($sql)) {
                          echo "
                            <option value='".$res['KodeUser']."'>".$res['NamaLengkap']."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div><br>
                  <div class="inputBox" id="KodeProdukBox">
                    <select name="KodeProduk" id="KodeProduk" class="form form-control" id="" onchange="plusminusJumlah()" required>
                      <option value="" class="none" selected disabled>Pilih produk</option>
                      <?php
                        $sql = mysqli_query($process->cnt,"SELECT * FROM tbproduk");
                        while ($res = mysqli_fetch_array($sql)) {
                          echo "
                            <option value='".$res['KodeProduk'].",".$res['Stok'].",".$res['Harga']."'>".$res['NamaProduk']."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div><br>

                  <div class="inputBox" id="tanggalBox">
                    <label for="Tanggal" class="inputBoxLabel inputBoxLabel2">Tanggal</label>
                    <input type="date" name="TglOrder" value="<?= $process->ThisYear ?>-<?= $process->ThisMonth ?>-<?= $process->ThisDate ?>" id="Tanggal" name="Tanggal" class="form form-control" required autocomplete="off" readonly>
                  </div><br>
                
                  Jumlah Barang <small style="color: #666;">( stok = <span id="StokBarang">0</span> )</small><br>
                <div class="col-md-6 left" align="left" style="padding: 0px;">
                  <div class="inputBox col-md-6 numberonly" id="JumlahBox" style="padding: 0;" align="center">
                    <div class="left unselectable" style="cursor: pointer;padding: 10px;" onclick="plusminusJumlah('minus')" align="center">
                      <div class="verticalAlign1">
                        <div class="verticalAlign2">
                          <i class="fa fa-minus-circle" style="font-size: 30px;"></i>  
                        </div>
                      </div>
                    </div>
                    <input type="text" id="Jumlah" name="Jumlah" class="form form-jumlah left" autocomplete="off" style="text-align: center;padding: 10px;width: 48%;" value="0" onfocus="JumlahFocus()" onblur="JumlahBlur()">
                    <div class="left unselectable" style="cursor: pointer;padding: 10px;" onclick="plusminusJumlah('plus')" align="center">
                      <i class="fa fa-plus-circle" style="font-size: 30px;"></i>  
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-md-6 left" align="right">
                  <small>RP</small>&nbsp;<span id="TotalHarga" style="font-size: 30px;">0</span>
                </div>
                <input type="hidden" name="KodeProduk2" id="KodeProduk2">
                <input type="hidden" name="TotalHarga2" id="TotalHarga2">
                <div class="col-12 left buttonDiv" style="padding-right: 0px;padding-bottom: 0px;" align="right">
                  <a href="datapelanggan.php"><button class="btn btn-danger col-sm-12 col-md-2" style="margin-top: 10px;" type="button">Kembali</button></a>
                  <button class="btn btn-success col-sm-12 col-md-2" style="margin-top: 10px;" type="submit" name="submit">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <br>

        </div>
      </div>

      <div class="container-fluid" style="width:1050px;padding: 0px;">
        <div class="row">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Transaksi Produk ( Kadaluarsa )</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table class="example1 table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi</th>
                  <th>Pelanggan</th>
                  <th>Produk</th>
                  <th>Total Harga</th>
                  <th>Tgl Order</th>
                  <th >Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    $nox=0;
                    $NoTransaksix = [];
                    $sementara = '';
                    $sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi,TglOrder FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' ORDER BY KodePelanggan");
                    while ($resx = mysqli_fetch_array($sqlx)) {
                      $time1 = date($resx['TglOrder']);
                      $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
                      $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
                      $time3 = date($process->ThisFullDate);

                      if ($sementara == $resx[0]) {
                        echo "<tr><td>".$time1." ~ ".$time2."</td></tr>";
                      }
                      else{
                        if ( $time3 != $time2 && $time3 != $time4) {
                          $nox++;
                          $NoTransaksix[$nox] = $resx[0];   
                          $sementara = $resx[0];
                        
                          $no++;
                          $totalhargaa=0;
                          echo "
                            <tr>
                              <td>".$no."</td>
                              <td>".$NoTransaksix[$no]."</td>
                          ";
                          $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$no]'");
                          $res = mysqli_fetch_array($sql);
                            $KodeUser = $res['KodePelanggan'];
                            $sql1 = mysqli_query($process->cnt,"SELECT NamaLengkap FROM tbuser WHERE KodeUser = '$KodeUser'");
                            $res1 = mysqli_fetch_array($sql1);
                            echo "
                              <td>".$res1[0]."</td>
                              <td>";
                              $sql2 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                              while($res2 = mysqli_fetch_array($sql2)){
                                $KodeProduk = $res2['KodeProduk'];
                                $sql2a = mysqli_query($process->cnt,"SELECT NamaProduk,Satuan FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
                                $res2a = mysqli_fetch_array($sql2a);
                                echo "
                                  * ".$res2a[0]." ( ".number_format($res2['Jumlah'])." ".$res2a[1]." )<br>
                                ";
                              }
                            echo "
                              </td>
                              <td>RP " ;
                              $sql3 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                              while($res3 = mysqli_fetch_array($sql3)){
                                $totalhargaa = $res3['TotalHarga'] + $totalhargaa;
                              }
                              $confirmDelete = "confirmDelete2".$no;
                              echo "".number_format($totalhargaa)."</td>
                              <td>".$res['TglOrder']."</td>
                              <td align='center'>
                                <form action='../process/handler.php?action=hapustransaksiproduk2' method='post'>
                                  <input type='hidden' name='NoTransaksi' value='".$NoTransaksix[$nox]."'>
                                  <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger' style='border-radius:50%;'  title='Hapus'><i class='fa fa-trash'></i></button>
                                  <button type='submit' name='submit' class='none' id='confirmDelete2".$no."'></button>
                                </form>
                              </td>
                              </tr>
                            ";
                        }

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
                  <th >Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>

      <div class="container-fluid" style="width:1050px;padding: 0px;">
        <div class="row">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Transaksi Produk ( Sudah Order )</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table class="example1 table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi</th>
                  <th>Pelanggan</th>
                  <th>Produk</th>
                  <th>Total Harga</th>
                  <th>Tgl Order</th>
                  <th>Terima</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    $nox=0;
                    $NoTransaksix = [];
                    $sementara = '';
                    $sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi,TglOrder FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' ORDER BY KodePelanggan");
                    while ($resx = mysqli_fetch_array($sqlx)) {
                      $time1 = date($resx['TglOrder']);
                      $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
                      $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
                      $time3 = date($process->ThisFullDate);
                      if ($sementara == $resx[0]) {

                      }
                      else{
                        if ($time3 == $time2 || $time3 == $time4) {
                          $nox++;
                          $NoTransaksix[$nox] = $resx[0];   
                          $sementara = $resx[0];
                        
                          $no++;
                          $totalhargaa=0;
                          echo "
                            <tr>
                              <td>".$no."</td>
                              <td>".$NoTransaksix[$no]."</td>
                          ";
                          $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$no]'");
                          $res = mysqli_fetch_array($sql);
                            $KodeUser = $res['KodePelanggan'];
                            $sql1 = mysqli_query($process->cnt,"SELECT NamaLengkap FROM tbuser WHERE KodeUser = '$KodeUser'");
                            $res1 = mysqli_fetch_array($sql1);
                            echo "
                              <td>".$res1[0]."</td>
                              <td>";
                              $sql2 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                              while($res2 = mysqli_fetch_array($sql2)){
                                $KodeProduk = $res2['KodeProduk'];
                                $sql2a = mysqli_query($process->cnt,"SELECT NamaProduk,Satuan FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
                                $res2a = mysqli_fetch_array($sql2a);
                                echo "
                                  * ".$res2a[0]." ( ".number_format($res2['Jumlah'])." ".$res2a[1]." )<br>
                                ";
                              }
                            echo "
                              </td>
                              <td>RP " ;
                              $sql3 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                              while($res3 = mysqli_fetch_array($sql3)){
                                $totalhargaa = $res3['TotalHarga'] + $totalhargaa;
                              }
                              $confirmDelete = "confirmDelete1".$no;
                              echo "".number_format($totalhargaa)."</td>
                              <td>".$res['TglOrder']."</td>
                              <td align='center'>
                                <form action='../process/handler.php?action=terimatransaksiproduk' method='post'>
                                  <input type='hidden' name='NoTransaksi' value='".$NoTransaksix[$nox]."'>
                                  <button type='submit' name='submit' class='btn btn-success' style='border-radius:50%;'><i class='fa fa-check' title='Terima'></i></button>
                                </form>
                              </td>
                              <td align='center'>
                                <form action='../process/handler.php?action=hapustransaksiproduk2' method='post'>
                                  <input type='hidden' name='NoTransaksi' value='".$NoTransaksix[$nox]."'>
                                  <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger' style='border-radius:50%;'  title='Hapus'><i class='fa fa-trash'></i></button>
                                  <button type='submit' name='submit' class='none' id='confirmDelete1".$no."'></button>
                                </form>
                              </td>
                              </tr>
                            ";
                        } 
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
                  <th>Terima</th>
                  <th>Hapus</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>


      <div class="container-fluid" style="width:1050px;padding: 0px;">
        <div class="row">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Transaksi Produk ( Sudah Transfer )</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>No Transaksi</th>
                  <th>Atas Nama</th>
                  <th>Nama Bank</th>
                  <th>Total Harga</th>
                  <th>Tgl Pembayaran</th>
                  <th>Terima</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    $nox=0;
                    $NoTransaksix = [];
                    $sementara = '';
                    $sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbpembayaran WHERE StatusPembayaran = 'Sudah Transfer' ORDER BY NoTransaksi");
                    while ($resx = mysqli_fetch_array($sqlx)) {
                     
                      if ($sementara == $resx[0]) {

                      }
                      else{
                        $nox++;
                        $NoTransaksix[$nox] = $resx[0];   
                        $sementara = $resx[0];
                      
                        $no++;
                        $totalhargaa=0;
                        $sql = mysqli_query($process->cnt,"SELECT * FROM tbpembayaran WHERE NoTransaksi = '$NoTransaksix[$no]'");
                        $res = mysqli_fetch_array($sql);
                        $confirmDelete = "confirmDelete3".$no;
                        echo "
                          <tr>
                            <td>".$no."</td>
                            <td width='100px' style='min-width: 100px;'><a href='../public/img/pembayaran/".$res['Foto']."' target='_blank'><img src='../public/img/pembayaran/".$res['Foto']."' width='100%'></a></td>
                            <td>".$NoTransaksix[$no]."</td>
                            <td>".$res['AtasNama']."</td>
                            <td>".$res['NamaBank']."</td>
                            <td>RP ".number_format($res['JumlahPembayaran'])."</td>
                            <td>".$res['TglPembayaran']."</td>
                            <td align='center'>
                              <form action='../process/handler.php?action=terimapembayaran' method='post'>
                                <input type='hidden' name='NoTransaksi' value='".$NoTransaksix[$nox]."'>
                                <button type='submit' name='submit' class='btn btn-success' style='border-radius:50%;'><i class='fa fa-check' title='Terima'></i></button>
                              </form>
                              </td>
                              <td align='center'>
                              <form action='../process/handler.php?action=hapuspembayaran' method='post'>
                                <input type='hidden' name='NoTransaksi' value='".$NoTransaksix[$nox]."'>
                                <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger' style='border-radius:50%;'  title='Hapus'><i class='fa fa-trash'></i></button>
                                <button type='submit' name='submit' class='none' id='confirmDelete3".$no."'></button>
                              </form>
                            </td>
                            </tr>
                          ";
                      } 
                    }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>No Transaksi</th>
                  <th>Atas Nama</th>
                  <th>Nama Bank</th>
                  <th>Total Harga</th>
                  <th>Tgl Pembayaran</th>
                  <th>Terima</th>
                  <th>Hapus</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>

      <div class="container-fluid" style="width:1050px;padding: 0px;">
        <div class="row">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Transaksi Produk ( Sudah Lunas )</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <table class="example1 table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Transaksi</th>
                  <th>Pelanggan</th>
                  <th>Produk</th>
                  <th>Total Harga</th>
                  <th>Tgl Order</th>
                  <th>Jenis Transaksi</th>
                  <th >Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    $nox=0;
                    $NoTransaksix = [];
                    $sementara = '';
                    $sqlx = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Lunas' ORDER BY KodePelanggan");
                    while ($resx = mysqli_fetch_array($sqlx)) {
                      if ($sementara == $resx[0]) {

                      }
                      else{
                        $nox++;
                        $NoTransaksix[$nox] = $resx[0];   
                        $sementara = $resx[0];
                      
                        $no++;
                        $totalhargaa=0;
                        echo "
                          <tr>
                            <td>".$no."</td>
                            <td>".$NoTransaksix[$no]."</td>
                        ";
                        $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$no]'");
                        $res = mysqli_fetch_array($sql);
                          $KodeUser = $res['KodePelanggan'];
                          $sql1 = mysqli_query($process->cnt,"SELECT NamaLengkap FROM tbuser WHERE KodeUser = '$KodeUser'");
                          $res1 = mysqli_fetch_array($sql1);
                          echo "
                            <td>".$res1[0]."</td>
                            <td>";
                            $sql2 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                            while($res2 = mysqli_fetch_array($sql2)){
                              $KodeProduk = $res2['KodeProduk'];
                              $sql2a = mysqli_query($process->cnt,"SELECT NamaProduk,Satuan FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
                              $res2a = mysqli_fetch_array($sql2a);
                              echo "
                                * ".$res2a[0]." ( ".number_format($res2['Jumlah'])." ".$res2a[1]." )<br>
                              ";
                            }
                          echo "
                            </td>
                            <td>RP " ;
                            $sql3 = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksix[$nox]'");
                            while($res3 = mysqli_fetch_array($sql3)){
                              $totalhargaa = $res3['TotalHarga'] + $totalhargaa;
                            }
                            $confirmDelete = "confirmDelete4".$no;
                            echo "".number_format($totalhargaa)."</td>
                            <td>".$res['TglOrder']."</td>
                            <td>".$res['JenisTransaksi']."</td>
                            <td align='center'>
                              <form action='../process/handler.php?action=hapustransaksiproduk2' method='post'>
                                <input type='hidden' name='NoTransaksi' value='".$NoTransaksix[$nox]."'>
                                <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger' style='border-radius:50%;'  title='Hapus'><i class='fa fa-trash'></i></button>
                                <button type='submit' name='submit' class='none' id='confirmDelete4".$no."'></button>
                              </form>
                            </td>
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
                  <th>Jenis Transaksi</th>
                  <th >Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>

  </div>
<?php
  error_reporting(0);
  $updateId = $_GET['updateId'];
  if (!empty($updateId)) {
    $sql = mysqli_query($process->cnt,"SELECT * FROM tbjenisproduk WHERE KodeJenis = '$updateId'");
    $x = 0;
    while($res = mysqli_fetch_array($sql)){
      $x++;
      $KodeJenis = $res['KodeJenis'];
      $NamaJenis = $res['NamaJenis'];
      $Keterangan = $res['Keterangan'];
    }
    if ($x != 0) {
      echo '<div id="ModalEditJenis" class="modal fade show" role="dialog" style="padding-right: 17px;display: block;">';
    }
    else{
      echo '<div id="ModalEditJenis" class="modal fade" role="dialog">';
    }
  }
  else{
    echo '<div id="ModalEditJenis" class="modal fade" role="dialog">';
  }
?>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Edit Jenis Modal</h4>
        <a href="jenisproduk.php"><button type="button" class="close" data-dismiss="modal">&times;</button></a>
      </div>
      <form action="../process/handler.php?action=editjenisproduk" method="post">
        <div class="modal-body">
          <div class="inputBox" id="NamaJenisBox2">
            <label for="NamaJenis2" class="inputBoxLabel inputBoxLabel2">Nama Jenis</label>
            <input type="text" id="NamaJenis2" name="NamaJenis" onblur="formAni('NamaJenisBox2')" onfocus="formAni2('NamaJenisBox2')" class="form form-control" required autocomplete="off" value="<?php echo $NamaJenis ?>">
          </div>
          <br>
          <div class="inputBox" id="KeteranganBox2">
            <label for="Keterangan2" class="inputBoxLabel inputBoxLabel2">Keterangan</label>
            <input type="text" id="Keterangan2" name="Keterangan" onblur="formAni('KeteranganBox2')" onfocus="formAni2('KeteranganBox2')" class="form form-control" required autocomplete="off" value="<?php echo $Keterangan ?>">
          </div>
        </div>
        <input type="hidden" name="KodeJenis" value="<?php echo $KodeJenis ?>">
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-default">Update</button>
          <a href="jenisproduk.php"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button></a>
        </div>
      </form>
    </div>

  </div>
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include'../layouts/footer.php' ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../public/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../public/js/demo.js"></script>
<script src="../public/js/footer-script.js"></script>

<!-- DataTables -->
<script src="../public/vendor/datatables/jquery.dataTables.js"></script>

<script>
  $(function () {
    $(".example1").DataTable();
    $('.example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

    setTimeout(function () {
      var wwww = $('#KodeProduk').val();
      if (wwww == null) {
        return false;
      }
        $('#Jumlah').val(1);
        var jumlah = $('#Jumlah').val();
        var var1 = wwww.split(',')[2];
        var var1 = parseInt(var1);
        var jumlah = parseInt(jumlah);
        var total = var1*jumlah;
        $('#TotalHarga2').val(total); 
        var var1 =  var1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('#TotalHarga').html(var1);
        var var2 = wwww.split(',')[1];
        var var2 = parseInt(var2);
        $('#StokBarang').html(var2);
        
    }, 0);

    function plusminusJumlah(x){


      var z = $('#KodeProduk').val();
      // var z = 'r1';

      // inputval = z.replace(/[a-zA-Z:]/g, "");

      if (z == null) {
        alert('Pilih produk terlebih dahulu !');
        return false;
      }

      str1 = z.split(',')[1];
      str2 = z.split(',')[0];


      if (x == "plus") {
        var z = $('#Jumlah').val();
        if (z == str1) {
          var wwww = $('#KodeProduk').val();
          var var2 = wwww.split(',')[1];
          var var2 = parseInt(var2);

          alert('Maaf, tidak bisa memesan jumlah barang lebih dari stok ('+var2+')');
          return false;
        }
        else{
          
          z++;
          var www = $('#KodeProduk').val();

          var jumlah = $('#Jumlah').val();
          var var1 = www.split(',')[2];
          var var1 = parseInt(var1);
          var jumlah = parseInt(jumlah);
          var total = var1*jumlah;

          var var2 = z;
          var var2 = parseInt(var2);

          var total = var1 * var2;
          $('#TotalHarga2').val(total);
          total =  total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

          $('#TotalHarga').html(total);
          $('#Jumlah').val(z);
        }
      }else if (x == "minus") {
        var z = $('#Jumlah').val();
        if (z <= 1) {
          return false;
        }
        z--;
        var www = $('#KodeProduk').val();

        var jumlah = $('#Jumlah').val();
        var var1 = www.split(',')[2];
        var var1 = parseInt(var1);
        var jumlah = parseInt(jumlah);
        var total = var1*jumlah;

        var var2 = z;
        var var2 = parseInt(var2);

        var total = var1 * var2;
        $('#TotalHarga2').val(total); 
        total =  total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        $('#TotalHarga').html(total);
        var c = $('#KodeProduk').val();
        $('#Jumlah').val(z);
      }
      else{
        var wwww = $('#KodeProduk').val();
        var jumlah = 1;
        var var1 = wwww.split(',')[2];
        var var1 = parseInt(var1);
        var jumlah = parseInt(jumlah);
        var total = var1*jumlah;
        $('#TotalHarga2').val(total); 
        var var1 = var1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('#TotalHarga').html(var1);
        var var2 = wwww.split(',')[1];
        var var2 = parseInt(var2);
        $('#StokBarang').html(var2);
        var var3 = wwww.split(',')[0];
        var var3 = parseInt(var3);
        $('#KodeProduk2').val(var3);

        $('#Jumlah').val(1);
      }
    }

    $('#Jumlah').on('keyup',function () {
      
      var z = $('#KodeProduk').val();
      // var z = 'r1';

      // inputval = z.replace(/[a-zA-Z:]/g, "");

      if (z == null) {
        alert('Pilih produk terlebih dahulu !');
        $('#Jumlah').val(1);
        return false;
      }else if($('#Jumlah').val() <= 0){
        $('#Jumlah').val(1);
      }

      str1 = z.split(',')[1];

      var x = $('#Jumlah');
      str2 = z.split(',')[0];
      str1 = parseInt(str1);
      var c = parseInt(x.val());
      if (c<=str1) {
      }
      else if(c>str1){
          var wwww = $('#KodeProduk').val();
          var var2 = wwww.split(',')[1];
          var var2 = parseInt(var2);

          alert('Maaf, tidak bisa memesan jumlah barang lebih dari stok ('+var2+')');
        x.val(str1);
      }
      var z = $('#KodeProduk').val();

      var str1 = z.split(',')[2];
      var str1 = parseInt(str1);
      var jumlah = $('#Jumlah').val();
        var var1 = z.split(',')[2];
        var var1 = parseInt(var1);
        var jumlah = parseInt(jumlah);
        var total = var1*jumlah;
        $('#TotalHarga2').val(total);  

      var str2 = $('#Jumlah').val();
      var str2 = parseInt(str2);

      var total = str1 * str2;
        total =  total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        
      $('#TotalHarga').html(total);
    })

    function JumlahBlur() {
      var x = $('#Jumlah').val();
      if (x == "") {
        $('#Jumlah').val(1);
      }
    }
    function JumlahFocus() {
      var x = $('#Jumlah').val();
      if (x == 0) {
        $('#Jumlah').val(null);
      }
    }

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



</body>
</html>
