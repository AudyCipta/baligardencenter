<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "datainstruktor";
  include'../layouts/head.php';
?>
<style>
  table td{
    font-size: 12px;
  }
  table th{
    /*font-size: 11px;*/
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
            <h1 class="m-0 text-dark">Data Instruktor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Instruktor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid" id="tabelCF">
        <div class="row">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Instruktor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="tambahinstruktor.php"><button type="button" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Instruktor</button></a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th width="auto">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    $sql = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Level = '2'");
                    while ($res = mysqli_fetch_array($sql)) {
                      $no++;
                      $confirmDelete = 'confirmDelete'.$no;
                      echo "
                        <tr>
                          <td>".$no."</td>
                          <td><img src='../public/img/profile/".$res['Foto']."' width='100%'></td>
                          <td>".$res['NamaLengkap']."</td>
                          <td>".$res['Username']."</td>
                          <td>".$res['Alamat']."</td>
                          <td>".$res['Telp']."</td>
                          <td>".$res['Email']."</td>
                          <td align='center'>".$res['StatusUser']."<br>
                            <form action='../process/handler.php?action=changeStatusUser' method='post'>
                              <input type='hidden' name='KodeUser' value='".$res['KodeUser']."'>
                              <input type='hidden' name='StatusUser' value='".$res['StatusUser']."'>
                              <button type='submit' name='submit' class='btn btn-success btn-sm'>Ganti</button>
                            </form>
                          </td>
                          <td align='center'>
                            <a href='editinstruktor.php?KodeUser=".$res['KodeUser']."'>
                              <button class='btn btn-success' data-toggle='modal' style='border-radius:50%;' title='Edit'>
                                <i class='fa fa-pen'></i>
                              </button>
                            </a>
                            <form action='../process/handler.php?action=hapusinstruktor' method='post'>
                              <input type='hidden' name='KodeUser' value='".$res['KodeUser']."'>
                              <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger' style='border-radius:50%;margin-top:10px;'  title='Hapus'><i class='fa fa-trash'></i></button>
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
                  <th width="70px">Foto</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th width="40px" style="min-width: 40px;">Aksi</th>
                </tr>
                </tfoot>
              </table>
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
  setTimeout(function () {
  	var x = document.getElementById('example1').clientWidth;
  	if (x > 800) {
	  	x += 100;
	  	$('#tabelCF').css('width',x+"px")
  	}
  	console.log(x);
  },0);

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
</script>
</body>
</html>
