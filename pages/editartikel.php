<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "editartikel";
  include'../layouts/head.php';
?>
<body class="hold-transition sidebar-mini">
<?php include '../layouts/notif.php'; ?>
<?php
  error_reporting(0);
  $KodeArtikel = $_GET['KodeArtikel'];
  if (!empty($KodeArtikel)) {
    $sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE KodeArtikel = '$KodeArtikel'");
    $x = 0;
    while ($res = mysqli_fetch_array($sql)) {
      $x++;
    }
    if ($x == 0) {
      echo "<script>alert('Barang tidak ditemukan')</script>";
      echo "<script>document.location='dataartikel.php'</script>";
      return false;
    }
  }
  else{
    echo "<script>alert('Pilih barang yang akan diubah')</script>";  
    echo "<script>document.location='dataartikel.php'</script>"; 
    return false;
  }
?>
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
            <h1 class="m-0 text-dark">Data Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Artikel</li>
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
        <?php
          $KodeArtikel = $_GET['KodeArtikel'];
          $sql = mysqli_query($process->cnt,"SELECT * FROM tbartikel WHERE KodeArtikel = '$KodeArtikel'");
          $res = mysqli_fetch_array($sql);
        ?>
          <div class="card"style="width: 100%">
            <div class="card-header">
              <h3 class="card-title">Form Edit Artikel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="../process/handler.php?action=editartikel" enctype="multipart/form-data">
                <div class="col-lg-6 col-md-6 col-sm-12 left" style="padding:10px;">
                  <div class="inputBox">
                    <input type="file" class="none" name="Foto" id="FotoArtikel" accept=".png, .jpg, .jpeg" onchange="readURL(this)">
                    <img onclick="$('#FotoArtikel').click()" src="../public/img/artikel/<?php echo $res['Foto'] ?>" width="100%" height="100%" alt="" style="border: 5px #ccc solid;cursor: pointer;" id="valuePicture1">
                    <div style="position: absolute;top: 0px;left: 0px;width: 100%;height: 100%;">
                      <div class="verticalAlign1" align="center">
                        <div class="verticalAlign2" align="center" style="cursor: pointer;"onclick="$('#FotoArtikel').click()">
                          <!-- <span onclick="$('#FotoArtikel').click()" id="AddPictureSymbol" style="font-size: 60px;color: #ccc;cursor: pointer;"><b>+</b></span> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 left" style="padding:10px;"> 
                  <div class="inputBox" id="JudulArtikelBox">
                    <label for="JudulArtikel" class="inputBoxLabel inputBoxLabel2">Judul Artikel</label>
                    <input type="text" id="JudulArtikel" name="JudulArtikel" onblur="formAni('JudulArtikelBox')" onfocus="formAni2('JudulArtikelBox')" class="form form-control" required autocomplete="off" value="<?= $res['JudulArtikel'] ?>">
                  </div><br>
                  <?php  
                    $selected = [];
                    if ($res['Kategori'] == 1) {
                      $selected[1] = 'selected';
                    }
                    else if ($res['Kategori'] == 2) {
                      $selected[2] = 'selected';
                    }
                    else if ($res['Kategori'] == 3) {
                      $selected[3] = 'selected';
                    }
                    else if ($res['Kategori'] == 4) {
                      $selected[4] = 'selected';
                    }
                    else if ($res['Kategori'] == 5) {
                      $selected[5] = 'selected';
                    }
                  ?>
                  <div class="inputBox" id="KategoriBox">
                    <select name="Kategori" id="Kategori" class="form form-control">
                      <option value="1" <?= $selected[1] ?>>Tips & Trik</option>
                      <option value="2" <?= $selected[2] ?>>Bunga</option>
                      <option value="3" <?= $selected[3] ?>>Sayur</option>
                      <option value="4" <?= $selected[4] ?>>Buah</option>
                      <option value="5" <?= $selected[5] ?>>Lifestyle</option>
                    </select>
                  </div><br>
                  <div class="inputBox" id="IsiArtikelBox">
                    <label for="IsiArtikel" class="inputBoxLabel inputBoxLabel2">Isi Artikel</label>
                    <textarea type="text" id="IsiArtikel" name="IsiArtikel" onblur="formAni('IsiArtikelBox')" onfocus="formAni2('IsiArtikelBox')" class="form form-control ckeditor" required><?= $res['IsiArtikel'] ?></textarea>
                  </div><br>
                  <input type="hidden" name="KodeArtikel" value="<?= $res['KodeArtikel'] ?>">
                  <a href="dataartikel.php"><button class="btn btn-danger col-12" type="button"style="margin:2px;">Kembali</button></a>
                  <button class="btn btn-success col-12" type="submit" name="submit"style="margin:2px;">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </section>

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
<script>
        CKEDITOR.replace( '.ckeditor' );
</script>
</body>
</html>
