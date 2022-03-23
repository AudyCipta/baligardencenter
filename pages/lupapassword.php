<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "lupapassword";
  include'../layouts/head.php';
?>
<body class="hold-transition sidebar-mini">
<?php 
  include '../layouts/notif.php'; 
    include'../layouts/WA-kami.php';
  if (isset($_POST['lanjut1'])) {
    extract($_POST);
    if (!empty($_POST)) {
      $sql = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Username = '$Username' AND Level = 3");
      $res = mysqli_num_rows($sql);

      if ($res != 0) {
        $box[1] = 'none';
        $box[3] = 'none';
        $box[2] = '';
      }
      else{
        $box[2] = 'none';
        $box[3] = 'none';
        $box[1] = '';
        echo "<script>alert('User tidak ditemukan!');</script>";
      }
    }
  }
  else if (isset($_POST['lanjut2'])) {
    extract($_POST);
    $sql = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Username = '$Username' AND Level = 3 AND SecurityAnswer = '$SecurityAnswer'");
    $res = mysqli_num_rows($sql);
    if ($res > 0) {
      $box[1] = 'none';
      $box[2] = 'none';
      $box[3] = '';
    }
    else{
      $box[2] = 'none';
      $box[3] = 'none';
      $box[1] = ''; 
      echo "<script>alert('Maaf anda tidak diperbolehkan untuk mengakses akun ini!')</script>";
    }
  }
  else if (isset($_POST['lanjut3'])) {
    extract($_POST);
    if (!empty($_POST)) {
        $Password = md5($Password);
        $sqlx = mysqli_query($process->cnt,"UPDATE tbuser SET Password = '$Password' WHERE Username = '$Username'");
        $sql1 = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Username = '$Username'");
        $res1 = mysqli_fetch_array($sql1);
        if (!$sql1 || !$res1) {
            header("location:../pages/home.php?notif=MLA910");
        }
        else{
          setcookie('KodeUser', $res1['KodeUser'], time() + (86400 * 30), "/");
          setcookie('Username', $res1['Username'], time() + (86400 * 30), "/");
          setcookie('Password', $res1['Password'], time() + (86400 * 30), "/");
          setcookie('NamaLengkap', $res1['NamaLengkap'], time() + (86400 * 30), "/");
          setcookie('Alamat', $res1['Alamat'], time() + (86400 * 30), "/");
          setcookie('Telp', $res1['Telp'], time() + (86400 * 30), "/");
          setcookie('Email', $res1['Email'], time() + (86400 * 30), "/");
          setcookie('Foto', $res1['Foto'], time() + (86400 * 30), "/");
          setcookie('Level', $res1['Level'], time() + (86400 * 30), "/");
          setcookie('StatusUser', $res1['StatusUser'], time() + (86400 * 30), "/");
          setcookie('SecurityQuestion', $res1['SecurityQuestion'], time() + (86400 * 30), "/");
          setcookie('SecurityAnswer', $res1['SecurityAnswer'], time() + (86400 * 30), "/");

          header('Location:../pages/home.php');
        }
      }
    }
  else{
    $box[2] = 'none';
    $box[3] = 'none';
    $box[1] = '';
  }
?>

<div class="wrapper col-md-6" style="margin: auto;">
          <div class="col-12 <?= $box[1] ?>" style="padding:50px;"> 
            <form method="post" action="" enctype="multipart/form-data">
            <h2>Lupa Password</h2><br><hr><br>
            <p align="justify" style="font-size: 14px;">
              &nbsp;&nbsp;&nbsp;&nbsp;Jika anda sudah lupa password user anda, yang perlu dilakukan adalah masukkan username anda dan sistem akan mencari user anda, lalu anda bisa menggunakan kembali user anda dengan cara menjawab pertanyaan yang sudah dibuat oleh user saat anda melakukan register.
            </p>
            <p>
              Langkah pertama adalah masukkan username anda.
            </p>
            <div class="inputBox" id="UsernameBox">
              <label for="Username" class="inputBoxLabel">Username</label>
              <input id="Username" name="Username" onblur="formAni('UsernameBox')" onfocus="formAni2('UsernameBox')" class="form form-control" required autocomplete="off">
            </div><br>
            <div class="col-12 left buttonDiv" style="padding:10px;padding-right: 0px;padding-bottom: 0px;" align="right">
              <button class="btn btn-success" type="submit" name="lanjut1">Lanjut</button>
            </div>
            </form> 
          </div>
          <div class="col-12 <?= $box[2] ?>" style="padding:50px;"> 
            <form method="post" action="" enctype="multipart/form-data">
            <h2>Lupa Password</h2><br><hr><br>
              <h6>
                <?php 
                  $Username = $_POST['Username'];
                  $sql = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Username = '$Username' AND Level = 3");
                  $res = mysqli_fetch_array($sql);
                  $SQa = $res['SecurityQuestion'];
                  $SQb = ['','Siapa nama ibu anda?','Siapa nama teman kecil anda?','Berapa no telp pertama anda?','Dimana tempat lahir anda?','Lagu apa yang anda senangi?'];
                  echo $SQb[$SQa];
                ?>
              </h6><br>
              <div class="inputBox" id="SABox">
                <label for="SecurityAnswer" class="inputBoxLabel">Jawaban</label>
                <textarea id="SecurityAnswer" name="SecurityAnswer" onblur="formAni('SABox')" onfocus="formAni2('SABox')" class="form form-control" required autocomplete="off"></textarea>
              </div><br>
              <input type="hidden" name="Username" value="<?= $Username ?>">
            <div class="col-12 left buttonDiv" style="padding:10px;padding-right: 0px;padding-bottom: 0px;" align="right">
              <button class="btn btn-success" type="submit" name="lanjut2">Lanjut</button>
            </div>
          </form>
          </div>
          <div class="col-12 <?= $box[3] ?>" style="padding:50px;"> 
            <form method="post" action="" enctype="multipart/form-data">
            <h2>Lupa Password</h2><br><hr><br>
              <div class="inputBox" id="PasswordBox" style="position: relative;">
                <label for="Password2" class="inputBoxLabel">Password Baru</label>
                <input id="Password2" name="Password" type="password" onblur="formAni('PasswordBox')" onfocus="formAni2('PasswordBox')" class="form form-control" required autocomplete="off">
            <i class="fa fa-eye" id="passwordeye" style="position: absolute;right: 15px;top: 12px;font-size: 16px;color: #aaa;cursor: pointer;`" onclick="showPassword('passwordeye')"></i>
              </div><br>
              <input type="hidden" name="Username" value="<?= $Username ?>">
            <div class="col-12 left buttonDiv" style="padding:10px;padding-right: 0px;padding-bottom: 0px;" align="right">
              <button class="btn btn-success" type="submit" name="lanjut3">Simpan</button>
            </div>
          </form>
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

  <script>
    function showPassword(x){
      $('#'+x).toggleClass('fa-eye-slash');
      var z = $('#Password2').attr('type');
      if (z == 'text') {
        $('#Password2').attr('type','password');
      }
      else if (z == 'password') {
        $('#Password2').attr('type','text');
      }
    }
  </script>
</body>
</html>
