<?php
	error_reporting(0);
	$notif = $_GET['notif'];
	if (!empty($notif)) {
		if ($notif == "MLA910") {
			$alert1 = "Terjadi Kesalahan";
			$alert2 = "";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MMX795") {
			$alert1 = "Berhasil Disimpan";
			$alert2 = "";
			$alert3 = "success";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MWY617") {
			$alert1 = "Update Berhasil";
			$alert2 = "";
			$alert3 = "success";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MGT376") {
			$alert1 = "Berhasil Dihapus";
			$alert2 = "";
			$alert3 = "success";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MTE728") {
			$alert1 = "Checkout Gagal !";
			$alert2 = "Lunaskan tagihan sebelumnya untuk melakukan transaksi atau pesanan baru.";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MPE829") {
			$alert1 = "Checkout Gagal !";
			$alert2 = "Barang sudah dimasukkan ke keranjang sebelumnya.";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MAQ517") {
			$alert1 = "Login terlebih dahulu !";
			$alert2 = "";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MDB827") {
			$alert1 = "Transaksi gagal !";
			$alert2 = "Jumlah pembayaran kurang dari total harga transaksi.";
			$alert3 = "warning";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MIQ617") {
			$alert1 = "Pemesanan gagal !";
			$alert2 = "Semua instruktor sedang sibuk.";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MXY622") {
			$alert1 = "Pemesanan gagal !";
			$alert2 = "Silahkan melunasi pemesanan sebelumnya untuk melakukan pemesanan lagi.";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MAJ983") {
			$alert1 = "Gagal ditambah !";
			$alert2 = "Nama paket sudah tersedia.";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MAJ982") {
			$alert1 = "Gagal ditambah !";
			$alert2 = "Username sudah tersedia.";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MAJ984") {
			$alert1 = "Gagal ditambah !";
			$alert2 = "Foto paket masih kosong.";
			$alert3 = "error";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MKS819") {
			$alert1 = "Gagal !";
			$alert2 = "Silahkan pilih gambar yang benar.";
			$alert3 = "warning";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MLP001") {
			$alert1 = "Login Gagal !";
			$alert2 = "Username tidak ditemukan";
			$alert3 = "warning";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MLP002") {
			$alert1 = "Login Gagal !";
			$alert2 = "Password salah";
			$alert3 = "warning";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
		else if ($notif == "MAQ667") {
			$alert1 = "Gagal diganti!";
			$alert2 = "Password tidak cocok dengan konfirmasi password.";
			$alert3 = "warning";

			echo "<script>Swal.fire('".$alert1."','".$alert2."','".$alert3."')</script>";
		}
	}
?>