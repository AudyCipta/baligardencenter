<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "expedisi";
  include'../layouts/head.php';
?>
<style type="text/css">
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  z-index: 999;
}
  .modal:target{
    display: block;
  }

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  z-index: 99;
}
 .paginate_button{
  cursor: pointer;
  padding: 5px;
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expedisi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expedisi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content" style="overflow: auto;">
      <div class="container-fluid" style="width: 1050px;">
        <div class="row" style="padding: 10px;">

          <div class="card"style="width: 100%">
            <div class="card-header">
              <h3 class="card-title">Table Expedisi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ModalTambahExpedisi"><i class="fa fa-plus"></i> Tambah Expedisi</button><br><br>
              <table id="example1" class="table table-bordered table-striped" width="auto">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Wilayah</th>
                  <th>Harga</th>
                  <th>Estimasi Waktu</th>
                  <th>Keterangan</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    $sql = mysqli_query($process->cnt,"SELECT * FROM tbexpedisi");
                    while ($res = mysqli_fetch_array($sql)) {
                      $no++;
                      $confirmDelete = "confirmDelete".$no;
                      echo "
                        <tr>
                          <td>".$no."</td>
                          <td>".$res['NamaExpedisi']."</td>
                          <td>".$res['Wilayah']."</td>
                          <td>".$res['Harga']."</td>
                          <td>".$res['EstimasiWaktu']."</td>
                          <td>".$res['Keterangan']."</td>
                          <td align='center'>
                            <a href='?updateId=".$res['KodeExpedisi']."'>
                              <button class='btn btn-success' data-toggle='modal' data-target='#ModalTambahExpedisi' style='border-radius:50%;' title='Edit'>
                                <i class='fa fa-pen'></i>
                              </button>
                            </a>
                          </td>
                          <td align='center'>
                            <form action='../process/handler.php?action=hapusexpedisi' method='post'>
                              <input type='hidden' name='KodeExpedisi' value='".$res['KodeExpedisi']."'>
                              <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger' style='border-radius:50%;'  title='Hapus'><i class='fa fa-trash'></i></button>
                              <button type='submit' name='submit' class='none' id='confirmDelete".$no."'></button>
                            </form>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Wilayah</th>
                  <th>Harga</th>
                  <th>Estimasi Waktu</th>
                  <th>Keterangan</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </section>

  </div>
<div id="ModalTambahExpedisi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Tambah Expedisi Modal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="../process/handler.php?action=tambahexpedisi" method="post">
        <div class="modal-body">
          <div class="inputBox" id="NamaExpedisiBox1">
            <label for="NamaExpedisi1" class="inputBoxLabel">Nama Expedisi</label>
            <input type="text" id="NamaExpedisi1" name="NamaExpedisi" onblur="formAni('NamaExpedisiBox1')" onfocus="formAni2('NamaExpedisiBox1')" class="form form-control" required autocomplete="off">
          </div>
          <br>
          <div class="inputBox" id="WilayahBox">
            <label for="Wilayah" class="inputBoxLabel">Wilayah</label>
            <input type="text" id="Wilayah" name="Wilayah" onblur="formAni('WilayahBox')" onfocus="formAni2('WilayahBox')" class="form form-control" required autocomplete="off">
          </div>
          <br>
          <div class="inputBox" id="HargaBox">
            <label for="Harga" class="inputBoxLabel">Harga</label>
            <input type="number" id="Harga" name="Harga" onblur="formAni('HargaBox')" onfocus="formAni2('HargaBox')" class="form form-control numberonly" required autocomplete="off">
          </div>
          <br>
          <div class="inputBox" id="EstimasiWaktuBox">
            <label for="EstimasiWaktu" class="inputBoxLabel">EstimasiWaktu</label>
            <input type="text" id="EstimasiWaktu" name="EstimasiWaktu" onblur="formAni('EstimasiWaktuBox')" onfocus="formAni2('EstimasiWaktuBox')" class="form form-control" required autocomplete="off">
          </div>
          <br>
          <div class="inputBox" id="KeteranganBox1">
            <label for="Keterangan1" class="inputBoxLabel">Keterangan</label>
            <input type="text" id="Keterangan1" name="Keterangan" onblur="formAni('KeteranganBox1')" onfocus="formAni2('KeteranganBox1')" class="form form-control" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-default">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>

  </div>
</div>
<?php
  error_reporting(0);
  $updateId = $_GET['updateId'];
  if (!empty($updateId)) {
    $sql = mysqli_query($process->cnt,"SELECT * FROM tbexpedisi WHERE KodeExpedisi = '$updateId'");
    $x = 0;
    while($res = mysqli_fetch_array($sql)){
      $x++;
      extract($res);
    }
    if ($x != 0) {
      echo '<div id="ModalEditExpedisi" class="modal fade show" role="dialog" style="padding-right: 17px;display: block;">';
    }
    else{
      echo '<div id="ModalEditExpedisi" class="modal fade" role="dialog">';
    }
  }
  else{
    echo '<div id="ModalEditExpedisi" class="modal fade" role="dialog">';
  }
?>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Edit Expedisi Modal</h4>
        <a href="expedisi.php"><button type="button" class="close" data-dismiss="modal">&times;</button></a>
      </div>
      <form action="../process/handler.php?action=editexpedisi" method="post">
        <div class="modal-body">
          <div class="inputBox" id="NamaExpedisiBox2">
            <label for="NamaExpedisi2" class="inputBoxLabel inputBoxLabel2">Nama Expedisi</label>
            <input type="text" id="NamaExpedisi2" name="NamaExpedisi" onblur="formAni('NamaExpedisiBox2')" onfocus="formAni2('NamaExpedisiBox2')" class="form form-control" required autocomplete="off" value="<?php echo $NamaExpedisi ?>">
          </div>
          <br>
          <div class="inputBox" id="WilayahBox2">
            <label for="Wilayah" class="inputBoxLabel inputBoxLabel2">Wilayah</label>
            <input type="text" id="Wilayah" name="Wilayah" onblur="formAni('WilayahBox2')" onfocus="formAni2('WilayahBox2')" class="form form-control" required autocomplete="off" value="<?php echo $Wilayah ?>">
          </div>
          <br>
          <div class="inputBox" id="HargaBox2">
            <label for="Harga" class="inputBoxLabel inputBoxLabel2">Harga</label>
            <input type="number" id="Harga" name="Harga" onblur="formAni('HargaBox2')" onfocus="formAni2('HargaBox2')" class="form form-control" required autocomplete="off" value="<?php echo $Harga ?>">
          </div>
          <br>
          <div class="inputBox" id="EstimasiWaktuBox2">
            <label for="EstimasiWaktu" class="inputBoxLabel inputBoxLabel2">EstimasiWaktu</label>
            <input type="text" id="EstimasiWaktu" name="EstimasiWaktu" onblur="formAni('EstimasiWaktuBox2')" onfocus="formAni2('EstimasiWaktuBox2')" class="form form-control" required autocomplete="off" value="<?php echo $EstimasiWaktu ?>">
          </div>
          <br>
          <div class="inputBox" id="KeteranganBox2">
            <label for="Keterangan2" class="inputBoxLabel inputBoxLabel2">Keterangan</label>
            <input type="text" id="Keterangan2" name="Keterangan" onblur="formAni('KeteranganBox2')" onfocus="formAni2('KeteranganBox2')" class="form form-control" required autocomplete="off" value="<?php echo $Keterangan ?>">
          </div>
        </div>
        <input type="hidden" name="KodeExpedisi" value="<?php echo $KodeExpedisi ?>">
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-default">Update</button>
          <a href="expedisi.php"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button></a>
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
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

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
