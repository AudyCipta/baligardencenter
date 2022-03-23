<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "dashboard";
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row dashboardBanner">
          <div align="center" style="width: 100%;margin-top: 80px;">
              <img src="../public/img/profile/<?php echo $_COOKIE['Foto'] ?>"" width="160px;" style="border-radius: 50%;background-color: rgba(0,0,0,0.5);"><br>
              <label style="color: #FFFFFF;font-size: 30px;">Welcome</label><br>
              <a href="home.php"><button class="btn btn-info"><i class="fa fa-home"></i> Home</button></a>&nbsp;&nbsp;
              <a href="../process/handler.php?action=logout"><button class="btn btn-danger"><i class="fa fa-sign-out-alt"></i> Logout</button></a>
          </div>
        </div>
        <br>
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pelanggan</span>
                <?php
                  $sql = mysqli_query($process->cnt,"SELECT * FROM tbuser WHERE Level = '3'");
                  $dat = mysqli_num_rows($sql);
                ?>
                <span class="info-box-number">
                  <small><?php echo $dat ?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-boxes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Produk</span>
                <?php
                  $sql = mysqli_query($process->cnt,"SELECT * FROM tbproduk");
                  $dat = mysqli_num_rows($sql);
                ?>
                <span class="info-box-number">
                  <small><?php echo $dat ?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi Berhasil</span>
                <?php
                  $sql = mysqli_query($process->cnt,"SELECT * FROM tbpembayaran WHERE StatusPembayaran = 'Sudah Lunas'");
                  $dat = mysqli_num_rows($sql);
                ?>
                <span class="info-box-number">
                  <small><?= $dat ?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-clipboard"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pesan Kursus</span>
                <?php
                  $sql = mysqli_query($process->cnt,"SELECT * FROM tbpembayarankursus WHERE StatusPembayaran = 'Sudah Lunas'");
                  $dat = mysqli_num_rows($sql);
                ?>
                <span class="info-box-number">
                  <small><?= $dat ?></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    
  </script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include'../layouts/footer.php'; ?>
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

<!-- PAGE SCRIPTS -->
<script src="../public/js/pages/dashboard2.js"></script>
</body>
</html>
