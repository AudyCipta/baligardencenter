<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "tambahartikel";
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
            <h1 class="m-0 text-dark">Tambah Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Artikel</li>
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
              <h3 class="card-title">Form Tambah Artikel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="../process/handler.php?action=tambahartikel" enctype="multipart/form-data">
                <div class="col-lg-6 col-md-6 col-sm-12 left" style="padding:10px;">
                  <div class="inputBox">
                    <input type="file" class="none" name="Foto" id="FotoArtikel" accept=".png, .jpg, .jpeg" onchange="readURL(this)">
                    <img onclick="$('#FotoArtikel').click()" src="../public/img/white.jpg" width="100%" height="100%" alt="" style="border: 5px #ccc solid;cursor: pointer;" id="valuePicture1">
                    <div style="position: absolute;top: 0px;left: 0px;width: 100%;height: 100%;">
                      <div class="verticalAlign1" align="center">
                        <div class="verticalAlign2" align="center" style="cursor: pointer;"onclick="$('#FotoArtikel').click()">
                          <span onclick="$('#FotoArtikel').click()" id="AddPictureSymbol" style="font-size: 60px;color: #ccc;cursor: pointer;"><b>+</b></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 left" style="padding:10px;"> 
                  <div class="inputBox" id="JudulArtikelBox">
                    <label for="JudulArtikel" class="inputBoxLabel">Judul Artikel</label>
                    <input type="text" id="JudulArtikel" name="JudulArtikel" onblur="formAni('JudulArtikelBox')" onfocus="formAni2('JudulArtikelBox')" class="form form-control symbol-protection3" required autocomplete="off">
                  </div><br>
                  <div class="inputBox" id="KategoriBox">
                    <select name="Kategori" id="Kategori" class="form form-control">
                      <option value="" selected="on" disabled="on" class="none">Pilih Kategori</option>
                      <option value="1">Tips & Trik</option>
                      <option value="2">Bunga</option>
                      <option value="3">Sayur</option>
                      <option value="4">Buah</option>
                      <option value="5">Lifestyle</option>
                    </select>
                  </div><br>
                  <div class="inputBox" id="IsiArtikelBox">
                    <label for="IsiArtikel" class="inputBoxLabel inputBoxLabel2">Isi Artikel</label>
                    <textarea type="text" id="IsiArtikel" name="IsiArtikel" onblur="formAni('IsiArtikelBox')" onfocus="formAni2('IsiArtikelBox')" class="form form-control ckeditor" required></textarea>
                  </div><br>
                  <button class="btn btn-success col-12" type="submit" name="submit">Simpan</button>
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
            <input type="text" id="NamaJenis2" name="NamaJenis" onblur="formAni('NamaJenisBox2')" onfocus="formAni2('NamaJenisBox2')" class="form form-control symbol-protection1" required autocomplete="off" value="<?php echo $NamaJenis ?>">
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

   $('.symbol-protection1').on('keypress',function (e) {
        var txt = String.fromCharCode(e.which);
        if (txt.match(/[ ]/)) {
            var fieldID = $(this).attr("id");
            var vall = $('#'+fieldID).val();
            var val2 = $('#'+fieldID).val().length;
            if (val2 != 16) {
                $('#'+fieldID).val(vall+"_");   
            }
        }
        if (!txt.match(/[A-Za-z0-9_]/)) {
            return false;
        }
    });
    $('.symbol-protection2').on('keypress',function (e) {
        var txt = String.fromCharCode(e.which);
        if (txt.keyCode == 13) {
            
        }
        else if (!txt.match(/[A-Za-z0-9]/)) {
            return false;
        }
    });
    $('.symbol-protection1').on('drop',function (e) {
        return false;
    });
    $('.symbol-protection2').on('drop',function (e) {
        return false;
    });
    $('.symbol-protection3').on('drop',function (e) {
        return false;
    });
    $('.symbol-protection3').on('keypress',function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[A-Za-z0-9@ ]/)) {
            return false;
        }
    });
    $('.number_only').on('keypress',function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[0-9]/)) {
            return false;
        }
    });
    $('.symbol-protection1').on('paste',function (e) {
        var txt = String.fromCharCode(e.which);
        if (txt.match(/[ ]/)) {
            var fieldID = $(this).attr("id");
            var vall = $('#'+fieldID).val();
            var val2 = $('#'+fieldID).val().length;
            if (val2 != 16) {
                $('#'+fieldID).val(vall+"_");   
            }

        }
        if (!txt.match(/[A-Za-z0-9_]/)) {
            return false;
        }
    });
    $('.symbol-protection2').on('paste',function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[A-Za-z0-9]/)) {
            return false;
        }
    });
    $('.symbol-protection3').on('paste',function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[A-Za-z0-9@ ]/)) {
            return false;
        }
    });
</script>
<script>
        CKEDITOR.replace( '.ckeditor' );
</script>
</body>
</html>
