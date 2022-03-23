<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "datapaketkursus";
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
            <h1 class="m-0 text-dark">Data Paket Kursus</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Paket Kursus</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->

    <section class="content">
      <div class="container-fluid" style="width:1050px;">
        <div class="row">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Paket Kursus</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="tambahpaketkursus.php"><button type="button" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Paket Kursus</button></a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Durasi</th>
                  <th>Keterangan</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                    $sql = mysqli_query($process->cnt,"SELECT * FROM tbpaketkursus");
                    while ($res = mysqli_fetch_array($sql)) {
                      $no++;
                      $confirmDelete = 'confirmDelete'.$no;
                      echo "
                        <tr>
                          <td>".$no."</td>
                          <td><img src='../public/img/paketkursus/".$res['Foto']."' width='70px;'></td>
                          <td>".$res['NamaPaket']."</td>
                          <td>RP ".number_format($res['Harga'])."</td>
                          <td>".$res['Durasi']." Jam</td>
                          <td>".substr($res['Keterangan'],0,100)."...</td>
                          <td align='center'>
                            <a href='editpaketkursus.php?KodePaket=".$res['KodePaket']."'>
                              <button class='btn btn-success' data-toggle='modal' style='border-radius:50%;' title='Edit'>
                                <i class='fa fa-pen'></i>
                              </button>
                            </a>
                          </td>
                          <td align='center'>
                            <form action='../process/handler.php?action=hapuspaketkursus' method='post'>
                              <input type='hidden' name='KodePaket' value='".$res['KodePaket']."'>
                              <button type='button' onclick='wantDelete(`$confirmDelete`)' class='btn btn-danger' style='border-radius:50%;'  title='Hapus'><i class='fa fa-trash'></i></button>
                              <button type='submit' name='submit' class='btn btn-danger none' id='confirmDelete".$no."'>Hapus</button>
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
                  <th>Foto</th> 
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Durasi</th>
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
    if (x >= 800) {
      x += 100;
      $('#tabelCF').css('width',x+"px")
    }
    else{
      $('#tabelCF').css('width',"100%");
    }
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
        console.log($('#'+x).click());
        
      }
    })
  };
</script>
</body>
</html>
