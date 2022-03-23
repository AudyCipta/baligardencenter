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
		else if ($host == "tagihan") { $tittle = "Tagihan"; $access="noguest";}
		else if ($host == "pembayaran") { $tittle = "Pembayaran"; $access="noguest";}
		else if ($host == "keranjang") { $tittle = "Keranjang"; $access="noguest";}
		else if ($host == "datatransaksi") { $tittle = "Data Transaksi"; $access="noguest";}
		else if ($host == "lihattransaksi") { $tittle = "Lihat Transaksi"; $access="noguest";}
		else if ($host == "toko") { $tittle = "Toko"; $access="public";}
		else if ($host == "produk") { $tittle = "Produk"; $access="public";}
		else if ($host == "paketkursus") { $tittle = "Paket Kursus"; $access="public";}
		else if ($host == "artikel") { $tittle = "Artikel"; $access="public";}
		else if ($host == "blog") { $tittle = "Blog"; $access="public";}

		if ($access == "admin") {
			if ($_COOKIE['Level'] != "1") {
				header('Location:../home.php?notif=MAQ517');
				return false;
			}
		}
		else if($access == "noguest") {
			if (empty($_COOKIE['KodeUser'])) {
				header('Location:../home.php?notif=MAQ517');
				return false;
			}
		}
		else if($access == "public") {
		}
	?>

	<title>Bali Garden Center  | <?php echo $tittle ?></title>

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

	<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <link href="../public/vendor/flag-icon/assets/docs.css" rel="stylesheet">
    <link href="../public/vendor/flag-icon/css/flag-icon.css" rel="stylesheet">
	<!-- SweetAlert -->
	<script type="text/javascript" src="../public/js/sweetalert.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap4/bootstrap.min.css">
	<link href="../public/vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../public/vendor/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../public/vendor/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="../public/vendor/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="../public/css/main_styles.css">
	<link rel="stylesheet" type="text/css" href="../public/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../public/css/single_styles.css">
	<link rel="stylesheet" type="text/css" href="../public/css/single_responsive.css">
	<link rel="stylesheet" type="text/css" href="../public/css/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="../public/css/categories_responsive.css">
	<link rel="stylesheet" type="text/css" href="../public/css/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="../public/css/contact_responsive.css">
	
	<?php
		include '../process/process.php';
		$process = new start();
	?>
</head>