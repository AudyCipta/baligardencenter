<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../public/img/Logo Potme Farm.jpg">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<?php
		if ($host == "dashboard") { $tittle = "Dashboard"; $access="admin";}
		else if ($host == "dataproduk") { $tittle = "Data Produk"; $access="admin";}
		else if ($host == "jenisproduk") { $tittle = "Jenis Produk"; $access="admin";}
		else if ($host == "tambahproduk") { $tittle = "Tambah Produk"; $access="admin";}
		else if ($host == "datapelanggan") { $tittle = "Data Pelanggan"; $access="admin";}
		else if ($host == "datainstruktor") { $tittle = "Data Instruktor"; $access="admin";}
		else if ($host == "tambahpelanggan") { $tittle = "Tambah Pelanggan"; $access="admin";}
		else if ($host == "tambahinstruktor") { $tittle = "Tambah Instruktor"; $access="admin";}
		else if ($host == "datapaketkursus") { $tittle = "Data Paket Kursus"; $access="admin";}
		else if ($host == "tambahpaketkursus") { $tittle = "Tambah Paket Kursus"; $access="admin";}
		else if ($host == "pesananpaketkursus") { $tittle = "Pesan Paket Kursus"; $access="admin";}
		else if ($host == "404notfound") { $tittle = "404 Not found"; $access="public";}
		else if ($host == "home") { $tittle = "Home"; $access="public";}
		else if ($host == "transaksiproduk") { $tittle = "Transaksi Produk"; $access="admin";}
		else if ($host == "printtransaksiproduk") { $tittle = "Print Transaksi Produk"; $access="noguest";}
		else if ($host == "tagihan") { $tittle = "Tagihan"; $access="noguest";}
		else if ($host == "pembayaran") { $tittle = "Pembayaran"; $access="noguest";}
		else if ($host == "toko") { $tittle = "Toko"; $access="public";}
		else if ($host == "register") { $tittle = "Register"; $access="public";}
		else if ($host == "edituser") { $tittle = "Edit User"; $access="public";}
		else if ($host == "tambahadmin") { $tittle = "Tambah Admin"; $access="admin";}
		else if ($host == "dataadmin") { $tittle = "Data Admin"; $access="admin";}
		else if ($host == "pesanpaketkursusadmin") { $tittle = "Pesan Paket Kursus"; $access="admin";}
		else if ($host == "lupapassword") { $tittle = "Lupa Password"; $access="pubilc";}
		else if ($host == "expedisi") { $tittle = "Expedisi"; $access="admin";}
		else if ($host == "tambahartikel") { $tittle = "Tambah Artikel"; $access="admin";}
		else if ($host == "dataartikel") { $tittle = "Data Artikel"; $access="admin";}
		else if ($host == "editartikel") { $tittle = "Edit Artikel"; $access="admin";}

		if ($access == "admin") {
			if ($_COOKIE['Level'] != "1") {
				header('Location:../index.php');
				return false;
			}
		}
		else if($access == "noguest") {
			if (empty($_COOKIE['KodeUser'])) {
				header('Location:../home.php?notif=MAQ517');
				return false;
			}
		}
		else if($access == "nouser") {
			if ($_COOKIE['Level'] != 3 && $_COOKIE['Level'] != 2) {
				header('Location:../home.php?notif=MAQ517');
				return false;
			}
		}
	?>

	<title>Bali Garden Center | <?php echo $tittle ?></title>

	<link rel="icon" type="" href="../public/img/favicon.png">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../public/vendor/font-awesome/css/all.css">

	<link rel="stylesheet" href="../public/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../public/css/adminlte.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="../public/vendor/datatables/dataTables.bootstrap4.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="../public/css/main.css">
  <!-- SweetAlert -->
  <script type="text/javascript" src="../public/js/sweetalert.min.js"></script>

  <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

    <link href="../public/vendor/flag-icon/assets/docs.css" rel="stylesheet">
    <link href="../public/vendor/flag-icon/css/flag-icon.css" rel="stylesheet">
	
	<?php
		include '../process/process.php';
		$process = new start();
	?>
</head>