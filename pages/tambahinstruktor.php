<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "tambahinstruktor";
  include'../layouts/head.php';
?>
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
            <h1 class="m-0 text-dark">Tambah Instruktor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Instruktor</li>
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
              <h3 class="card-title">Form Tambah Instruktor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="../process/handler.php?action=tambahinstruktor" enctype="multipart/form-data">
                <div class="col-lg-6 col-md-6 col-sm-12 left" style="padding:10px;">
                  <div class="inputBox">
                    <input type="file" class="none" name="Foto" id="FotoUser" accept=".png, .jpg, .jpeg" onchange="readURL(this)">
                    <img onclick="$('#FotoUser').click()" src="../public/img/white.jpg" width="100%" height="100%" alt="" style="cursor: pointer;" id="valuePicture1">
                    <div style="position: absolute;top: 0px;left: 0px;width: 100%;height: 100%;">
                      <div class="verticalAlign1" align="center">
                        <div class="verticalAlign2" align="center" style="cursor: pointer;"onclick="$('#FotoUser').click()">
                          <span onclick="$('#FotoUser').click()" id="AddPictureSymbol" style="font-size: 60px;color: #ccc;cursor: pointer;"><b>+</b></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 left" style="padding:10px;"> 
                  <div class="inputBox" id="NamaPelangganBox">
                    <label for="NamaLengkap" class="inputBoxLabel">Nama Lengkap</label>
                    <input type="text" id="NamaLengkap" name="NamaLengkap" onblur="formAni('NamaPelangganBox')" onfocus="formAni2('NamaPelangganBox')" class="form form-control" required autocomplete="off">
                  </div><br>
                  <div class="inputBox" id="UsernameBox">
                    <label for="Username" class="inputBoxLabel">Username</label>
                    <input type="text" id="Username" name="Username" onblur="formAni('UsernameBox')" onfocus="formAni2('UsernameBox')" class="form form-control" required autocomplete="off">
                  </div><br>
                  <div class="inputBox" id="PasswordBox">
                    <label for="Password" class="inputBoxLabel">Password</label>
                    <input type="password" id="Password" name="Password" onblur="formAni('PasswordBox')" onfocus="formAni2('PasswordBox')" class="form form-control" required autocomplete="off">
                  </div><br>
                  <div class="inputBox" id="AlamatBox">
                    <label for="Alamat" class="inputBoxLabel">Alamat</label>
                    <input type="text" id="Alamat" name="Alamat" onblur="formAni('AlamatBox')" onfocus="formAni2('AlamatBox')" class="form form-control" required autocomplete="off">
                  </div><br>
                  <div class="inputBox" id="TelpBox">
                    <label for="Telp" class="inputBoxLabel">Telp</label>
                    <input type="text" id="Telp" name="Telp" onblur="formAni('TelpBox')" onfocus="formAni2('TelpBox')" class="form form-control" required autocomplete="off">
                  </div><br>
                  <div class="inputBox" id="EmailBox">
                    <label for="Email" class="inputBoxLabel">Email</label>
                    <input type="text" id="Email" name="Email" onblur="formAni('EmailBox')" onfocus="formAni2('EmailBox')" class="form form-control" required autocomplete="off">
                  </div>
                <div class="col-12 left buttonDiv" style="padding:50px;padding-right: 0px;padding-bottom: 0px;" align="right">
                  <a href="datapelanggan.php"><button class="btn btn-danger" type="button">Kembali</button></a>
                  <button class="btn btn-success" type="submit" name="submit">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
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
  function readURL(input) {
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#valuePicture1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $('#AddPictureSymbol').addClass('none');
        }
        else{
            swal('Illegal extension detect !','Make sure the image extension is png, jpg, or jpeg','warning');
            $(this).val(null);
            $('#AddPictureSymbol').removeClass('none');
        }
    };
</script>
</body>
</html>
