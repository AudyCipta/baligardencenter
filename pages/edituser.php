<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "edituser";
  include'../layouts/head.php';
?>
<style>
  body{
    background-color: #ddd;
  }
</style>
<body class="hold-transition sidebar-mini">
<?php include '../layouts/notif.php'; ?>

<div class="wrapper col-md-4" style="margin: auto;padding-bottom: 20px;background-color: #fff;">
<?php
  $KodeUser = $_COOKIE['KodeUser'];
  $sql = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodeUser'");
  $res = mysqli_fetch_array($sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="verticalAlign1">
    <div class="verticalAlign2">
      <form method="post" action="../process/handler.php?action=edituser" enctype="multipart/form-data">

                  <div class="col-12" style="padding:10px;"> 
                  <h2>Edit User</h2><br>
                  <div class="inputBox" align="center" style="padding: 20px;">
                    <input type="file" class="none" name="Foto" id="FotoUser" accept=".png, .jpg, .jpeg" onchange="readURL(this)">
                    <img onclick="$('#FotoUser').click()" src="../public/img/profile/<?php echo $res['Foto'] ?>" width="50%" height="50%" alt="" style="cursor: pointer;" id="valuePicture1">
                    <div style="position: absolute;top: 0px;left: 0px;width: 100%;height: 100%;">
                      <div class="verticalAlign1" align="center">
                        <div class="verticalAlign2" align="center" style="cursor: pointer;"onclick="$('#FotoUser').click()">
                          <!-- <span onclick="$('#FotoUser').click()" id="AddPictureSymbol" style="font-size: 60px;color: #ccc;cursor: pointer;"><b>+</b></span> -->
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="inputBox" id="NamalEngkapBox">
                      <label for="NamaLengkap" class="inputBoxLabel inputBoxLabel2"><i class="fa fa-user"></i> Nama Lengkap</label>
                      <input type="text" id="NamaLengkap" name="NamaLengkap" onblur="formAni('NamalEngkapBox')" onfocus="formAni2('NamalEngkapBox')" class="form form-control" required autocomplete="off" value="<?= $res['NamaLengkap'] ?>">
                    </div><br>
                    <div class="inputBox" id="AlamatBox">
                      <label for="Alamat" class="inputBoxLabel inputBoxLabel2"><i class="fa fa-home"></i> Alamat</label>
                      <input type="text" id="Alamat" name="Alamat" onblur="formAni('AlamatBox')" onfocus="formAni2('AlamatBox')" class="form form-control" required autocomplete="off" value="<?= $res['Alamat'] ?>">
                    </div><br>
                    <div class="inputBox" id="TelpBox">
                      <label for="Telp" class="inputBoxLabel inputBoxLabel2"><i class="fa fa-phone"></i> Telp</label>
                      <input type="text" id="Telp" name="Telp" onblur="formAni('TelpBox')" onfocus="formAni2('TelpBox')" class="form form-control" required autocomplete="off" value="<?= $res['Telp'] ?>">
                    </div><br>
                    <div class="inputBox" id="EmailBox">
                      <label for="Email" class="inputBoxLabel inputBoxLabel2"><i class="fa fa-envelope"></i> Email</label>
                      <input type="text" id="Email" name="Email" onblur="formAni('EmailBox')" onfocus="formAni2('EmailBox')" class="form form-control" required autocomplete="off" value="<?= $res['Email'] ?>">
                    </div>
                  <br>
                  <input type="hidden" name="KodeUser" value="<?= $_COOKIE['KodeUser'] ?>">
                  <input type="hidden" name="Username" value="<?= $_COOKIE['Username'] ?>">
                  <div class="col-12 left buttonDiv" style="padding:0px;padding-right: 0px;padding-bottom: 0px;" align="right">
                    <button class="col-sm-12 btn btn-success" style="margin:2px;" type="submit" name="submit">Simpan</button>
                    <button class="col-sm-12 btn btn-warning" style="margin:2px;" type="button" data-toggle="modal" data-target="#ModalGantiPassword">Ganti Password</button>
                    <a href="home.php"><button class="btn col-sm-12 btn-danger" style="margin:2px;" type="button">Kembali</button></a>
                  </div>
      </form> 
    </div>
  </div>
</div>

<div id="ModalGantiPassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Ganti Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="../process/handler.php?action=gantipassworduser" method="post">
        <div class="modal-body">
          <div class="inputBox" id="password1Box">
            <label for="passwordBaru" class="inputBoxLabel"><i class="fa fa-lock"></i> Password Baru</label>
            <input type="password" id="passwordBaru" name="password1" onblur="formAni('password1Box')" onfocus="formAni2('password1Box')" class="form form-control" required autocomplete="off" >
          </div>
          <br>
          <div class="inputBox" id="password2Box">
            <label for="KonfirmasiPass" class="inputBoxLabel"><i class="fa fa-lock"></i> Konfirmasi Password</label>
            <input type="password" id="KonfirmasiPass" name="password2" onblur="formAni('password2Box')" onfocus="formAni2('password2Box')" class="form form-control" required autocomplete="off" >
          </div>
        </div>
        <input type="hidden" name="KodeUser" value="<?= $_COOKIE['KodeUser'] ?>">
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-default">Update</button>
          <a href="jenisproduk.php"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button></a>
        </div>
      </form>
    </div>

  </div>
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
