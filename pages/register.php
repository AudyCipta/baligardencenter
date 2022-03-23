<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "register";
  include'../layouts/head.php';
?>
<style>
  body{
    background-color: #efefef;
  }
</style>
<body class="hold-transition sidebar-mini">
<?php include '../layouts/notif.php'; ?>

<div class="wrapper col-md-6" style="margin: auto;background-color: #fff">

  <!-- Content Wrapper. Contains page content -->
  <div class="verticalAlign1">
    <div class="verticalAlign2">
      <form method="post" action="../process/handler.php?action=register" enctype="multipart/form-data">

                  <div class="col-12" style="padding:30px;"> 
                  <h2>Register</h2><br>
                    <div class="inputBox" id="NamalEngkapBox">
                      <label for="NamaLengkap" class="inputBoxLabel"><i class="fa fa-user"></i> Nama Lengkap</label>
                      <input type="text" id="NamaLengkap" name="NamaLengkap" onblur="formAni('NamalEngkapBox')" onfocus="formAni2('NamalEngkapBox')" class="form form-control" required autocomplete="off">
                    </div><br>
                    <div class="inputBox" id="UsernameBox">
                      <label for="Username" class="inputBoxLabel"><i class="fa fa-user"></i> Username</label>
                      <input type="text" id="Username" name="Username" onblur="formAni('UsernameBox')" onfocus="formAni2('UsernameBox')" class="form form-control" required autocomplete="off">
                    </div><br>
                    <div class="inputBox" id="PasswordBox">
                      <label for="Password" class="inputBoxLabel"><i class="fa fa-lock"></i> Password</label>
                      <input type="password" id="Password" name="Password" onblur="formAni('PasswordBox')" onfocus="formAni2('PasswordBox')" class="form form-control" required autocomplete="off">
                    </div><br>
                    <div class="inputBox" id="AlamatBox">
                      <label for="Alamat" class="inputBoxLabel"><i class="fa fa-home"></i> Alamat</label>
                      <input type="text" id="Alamat" name="Alamat" onblur="formAni('AlamatBox')" onfocus="formAni2('AlamatBox')" class="form form-control" required autocomplete="off">
                    </div><br>
                    <div class="inputBox" id="TelpBox">
                      <label for="Telp" class="inputBoxLabel"><i class="fa fa-phone"></i> Telp</label>
                      <input type="text" id="Telp" name="Telp" onblur="formAni('TelpBox')" onfocus="formAni2('TelpBox')" class="form form-control" required autocomplete="off">
                    </div><br>
                    <div class="inputBox" id="EmailBox">
                      <label for="Email" class="inputBoxLabel"><i class="fa fa-envelope"></i> Email</label>
                      <input type="text" id="Email" name="Email" onblur="formAni('EmailBox')" onfocus="formAni2('EmailBox')" class="form form-control" required autocomplete="off">
                    </div><br>
                    <small>Pertanyaan dan Jawaban ini akan membantu anda jika anda melupakan password anda.</small><br><br>
                    <div class="inputBox" id="SQBox">
                      <select name="SecurityQuestion" id="" class="form form-control">
                        <option value="" disabled class="none" selected>Pilih pertanyaan</option>
                        <option value="1">Siapa nama ibu anda ?</option>
                        <option value="2">Siapa nama teman kecil anda ?</option>
                        <option value="3">Berapa no telp pertama anda ?</option>
                        <option value="4">Dimana tempat lahir anda ?</option>
                        <option value="5">Lagu apa yang anda senangi ?</option>
                      </select>
                    </div><br>
                    <div class="inputBox" id="SABox">
                      <label for="Security Answer" class="inputBoxLabel">Jawaban</label>
                      <textarea type="text" id="Security Answer" name="SecurityAnswer" onblur="formAni('SABox')" onfocus="formAni2('SABox')" class="form form-control" required autocomplete="off"></textarea>
                    </div>
                  </div>
                  <div class="col-12 left buttonDiv" align="right" style="padding: 25px;padding-top: 0px;">
                    <button class=" col-12 btn btn-success" type="submit" name="submit" style="margin-bottom: 5px;">Simpan</button>
                    <a href="home.php"><button class="btn col-12 btn-danger" type="button" style="margin-bottom: 5px;">Kembali</button></a>
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
