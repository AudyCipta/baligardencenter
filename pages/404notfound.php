<!DOCTYPE html>
<html lang="en">
<?php 
  $host = "404notfound";
  include'../layouts/head.php';
?>
<style>
  table td{
    font-size: 12px;
  }
</style>
<body>
<div style="height:100vh;">
	<div class="verticalAlign1" align="center">
		<div class="verticalAlign2" align="center">
			<img src="../public/img/favicon.png">
			<br><br>
			<h1 style="font-size: 35px;"><font color="limegreen">404</font> Not Found</h1>
			<br>
			* Halaman website tidak ditemukan.<br><br>
			* Pastikan alamat website tidak salah.<br><br>
			* Pilih tujuan anda dengan memilih tombol dibawah.<br><br>
			<button onclick="self.history.back()" class="btn btn-sm btn-info">Sebelumnya</button>
			<a href="home.php"><button class="btn btn-sm btn-success">Halaman Utama</button></a>
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
</script>
</body>
</html>
