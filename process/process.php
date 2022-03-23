<?php
    class start
    {
        public $cnt;

        function __construct(){
  			$this->cnt = mysqli_connect("localhost","root","","db_potmefarm");    
  			if (!$this->cnt) {
  				echo "<script>alert('Error Connecting Database !');</script>";
                return false;
  			}

                date_default_timezone_set("singapore");
                $this->ThisFullTime = date("H").":".date("i").":".date("s");
                $this->ThisHours = date("H");
                $this->ThisMinutes = date("i");
                $this->ThisSeconds = date("s");
                $this->ThisFullDate = date("Y")."-".date("m")."-".date("d");
                $this->ThisDate = date("d");
                $this->ThisMonth = date("m");
                $this->ThisYear = date("Y");
                $this->ThisDay = date("l");

            if (!empty($_COOKIE['Username'])) {
                $kod = $_COOKIE['KodeUser'];
                $sql = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$kod'");
                $res = mysqli_fetch_array($sql);

                if (!$sql || !$res) {
                    header("location:../pages/home.php?notif=MLA910");
                    return false;
                }
                // if (
                //     $_COOKIE['Username'] != $res['Username'] ||
                //     $_COOKIE['Password'] != $res['Password'] ||
                //     $_COOKIE['NamaLengkap'] != $res['NamaLengkap'] ||
                //     $_COOKIE['Alamat'] != $res['Alamat'] ||
                //     $_COOKIE['Telp'] != $res['Telp'] ||
                //     $_COOKIE['Email'] != $res['Email'] ||
                //     $_COOKIE['Foto'] != $res['Foto'] ||
                //     $_COOKIE['Level'] != $res['Level']
                // ) {
                //     if ($access != "public") {
                //         # code...
                //         setcookie('KodeUser', $res['KodeUser'], time() - 86400, "/");
                //         setcookie('Username', $res['Username'], time() - 86400, "/");
                //         setcookie('Password', $res['Password'], time() - 86400, "/");
                //         setcookie('NamaLengkap', $res['NamaLengkap'], time() - 86400, "/");
                //         setcookie('Alamat', $res['Alamat'], time() - 86400, "/");
                //         setcookie('Telp', $res['Telp'], time() - 86400, "/");
                //         setcookie('Email', $res['Email'], time() - 86400, "/");
                //         setcookie('Foto', $res['Foto'], time() - 86400, "/");
                //         setcookie('Level', $res['Level'], time() - 86400, "/");
                //         setcookie('StatusUser', $res['StatusUser'], time() - 86400, "/");
                //         header("location:../pages/home.php?notif=MLA910");
                //     }
                // }
            }
        }


 
        // Akun User



        function login(){
            if (isset($_POST['submit'])) {
            	extract($_POST);
                $Password = md5($Password);
                $sql = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE Username = '$Username'");
                $res = mysqli_fetch_array($sql);
                $sql1 = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE Username = '$Username'");
                $res1 = mysqli_num_rows($sql1);
                if ($sql && $res && $res1 > 0) {
                    if ($Password != $res['Password']) {
                        header("location:../pages/home.php?notif=MLP002");
                        return false;   
                    }

                    setcookie('KodeUser', $res['KodeUser'], time() + 86400, "/");
                    setcookie('Username', $res['Username'], time() + 86400, "/");
                    setcookie('Password', $res['Password'], time() + 86400, "/");
                    setcookie('NamaLengkap', $res['NamaLengkap'], time() + 86400, "/");
                    setcookie('Alamat', $res['Alamat'], time() + 86400, "/");
                    setcookie('Telp', $res['Telp'], time() + 86400, "/");
                    setcookie('Email', $res['Email'], time() + 86400, "/");
                    setcookie('Foto', $res['Foto'], time() + 86400, "/");
                    setcookie('Level', $res['Level'], time() + 86400, "/");
                    setcookie('StatusUser', $res['StatusUser'], time() + 86400, "/");
                    setcookie('SecurityQuestion', $res['SecurityQuestion'], time() + 86400, "/");
                    setcookie('SecurityAnswer', $res['SecurityAnswer'], time() + 86400, "/");

                    if ($res['Level'] == "1") {
                       header('Location:../pages/dashboard.php');
                    }
                    else{
                       header('Location:../pages/home.php');
                    }
                }
                else{
                    header("location:../pages/home.php?notif=MLP001");
                }
            }
        }

        function logout()
        {
			setcookie('KodeUser', $res['KodeUser'], time() - 86400, "/");
			setcookie('Username', $res['Username'], time() - 86400, "/");
			setcookie('Password', $res['Password'], time() - 86400, "/");
			setcookie('NamaLengkap', $res['NamaLengkap'], time() - 86400, "/");
			setcookie('Alamat', $res['Alamat'], time() - 86400, "/");
			setcookie('Telp', $res['Telp'], time() - 86400, "/");
			setcookie('Email', $res['Email'], time() - 86400, "/");
			setcookie('Foto', $res['Foto'], time() - 86400, "/");
			setcookie('Level', $res['Level'], time() - 86400, "/");
			setcookie('StatusUser', $res['StatusUser'], time() - 86400, "/");
            setcookie('SecurityQuestion', $res['SecurityQuestion'], time() - 86400, "/");
            setcookie('SecurityAnswer', $res['SecurityAnswer'], time() - 86400, "/");


			header('Location:../pages/home.php');
        }


        function register()
        {

            if (isset($_POST['submit'])) {
                    extract($_POST);
                    $sql = mysqli_query($this->cnt,"SELECT Username FROM tbuser");
                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                    while ($res=mysqli_fetch_array($sql)) {
                        if ($Username == $res[0]) {
                            header("Location:../pages/register?notif=MAJ982");
                            return false;
                        }
                    }
                    if (empty($_FILES['Foto']['name'])) {
                        $Password = md5($Password);
                        $sql = mysqli_query($this->cnt,"INSERT INTO tbuser VALUES (null,'$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','unknown.png','3','','$SecurityQuestion','$SecurityAnswer')");
                        echo $sql;
                        $location1 = "../pages/register.php";
                        $location2 = "../pages/home.php";
                        $getvar1   = "?notif=MLA910";
                        $getvar2   = "?notif=MMX795";

                        $sql2 = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE Username = '$Username'");
                        $res2 = mysqli_fetch_array($sql2);

                        setcookie('KodeUser', $res2['KodeUser'], time() + 86400, "/");
                        setcookie('Username', $res2['Username'], time() + 86400, "/");
                        setcookie('Password', $res2['Password'], time() + 86400, "/");
                        setcookie('NamaLengkap', $res2['NamaLengkap'], time() + 86400, "/");
                        setcookie('Alamat', $res2['Alamat'], time() + 86400, "/");
                        setcookie('Telp', $res2['Telp'], time() + 86400, "/");
                        setcookie('Email', $res2['Email'], time() + 86400, "/");
                        setcookie('Foto', $res2['Foto'], time() + 86400, "/");
                        setcookie('Level', $res2['Level'], time() + 86400, "/");
                        setcookie('StatusUser', $res2['StatusUser'], time() + 86400, "/");
                        setcookie('SecurityQuestion', $res['SecurityQuestion'], time() + 86400, "/");
                        setcookie('SecurityAnswer', $res['SecurityAnswer'], time() + 86400, "/");

                        (!$sql || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        return false;
                    }
                }
        }
        function edituser()
        {

            if (isset($_POST['submit'])) {
                extract($_POST);
                if (!empty($KodeUser)) {
                    $KodeUser = $_COOKIE['KodeUser'];
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodeUser'");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { $x++; }
                    if ($x == 0) {
                        header("Location:../pages/home.php?notif=MLA910");
                        return false;
                    }
                }
                else{
                        header("Location:../pages/home.php?notif=MLA910");
                    return false;
                }
                if (!empty($_FILES['Foto']['name'])) {
                    $target_dir = "../public/img/profile/";
                    $userfile_name = $_FILES['Foto']['name'];
                    $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                    $target_file = $target_dir . basename($_POST['Username'].".".$userfile_extn);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                        $uploadOk = 1;
                    } else {
                        echo "<script>console.log('File is not an image.');</script>";
                        header("Location:../pages/edituser.php?notif=MLA910");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                        header("Location:../pages/edituser.php?notif=MLA910");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                        header("Location:../pages/edituser.php?notif=MKS819");
                        return false;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

                            extract($_POST);
                            $Foto = $Username.".".$userfile_extn;

                            $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email',Foto = '$Foto' WHERE KodeUser = '$KodeUser'");

                            $sql2 = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodeUser'");
                            $res2 = mysqli_fetch_array($sql2);

                            setcookie('NamaLengkap', $res['NamaLengkap'], time() - 86400, "/");
                            setcookie('Alamat', $res['Alamat'], time() - 86400, "/");
                            setcookie('Telp', $res['Telp'], time() - 86400, "/");
                            setcookie('Email', $res['Email'], time() - 86400, "/");
                            setcookie('Foto', $res['Foto'], time() - 86400, "/");

                            setcookie('NamaLengkap', $res2['NamaLengkap'], time() + 86400, "/");
                            setcookie('Alamat', $res2['Alamat'], time() + 86400, "/");
                            setcookie('Telp', $res2['Telp'], time() + 86400, "/");
                            setcookie('Email', $res2['Email'], time() + 86400, "/");
                            setcookie('Foto', $res2['Foto'], time() + 86400, "/");

                            $location1 = "../pages/edituser.php";
                            $location2 = "../pages/home.php";
                            $getvar1   = "?notif=MLA910";
                            $getvar2   = "?notif=MWY617";

                            (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                else{
                    extract($_POST);

                    setcookie('NamaLengkap', $res['NamaLengkap'], time() - 86400, "/");
                    setcookie('Alamat', $res['Alamat'], time() - 86400, "/");
                    setcookie('Telp', $res['Telp'], time() - 86400, "/");
                    setcookie('Email', $res['Email'], time() - 86400, "/");

                    setcookie('NamaLengkap', $res2['NamaLengkap'], time() + 86400, "/");
                    setcookie('Alamat', $res2['Alamat'], time() + 86400, "/");
                    setcookie('Telp', $res2['Telp'], time() + 86400, "/");
                    setcookie('Email', $res2['Email'], time() + 86400, "/");

                    $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email' WHERE KodeUser = '$KodeUser'");   
                    $location1 = "../pages/edituser.php";
                    $location2 = "../pages/home.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MWY617";

                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                }
            }
        }

 

        // Jenis Produk



        function tambahjenisproduk(){
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (empty($NamaJenis) || empty($Keterangan)) {
                    header("location:../pages/jenisproduk.php?notif=MLA910");
                    return false;
            	}
                $sql = mysqli_query($this->cnt,"INSERT INTO tbjenisproduk VALUES (null,'$NamaJenis','$Keterangan')");

                $location1 = "../pages/jenisproduk.php";
                $location2 = "../pages/jenisproduk.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MMX795";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function editjenisproduk(){
            	extract($_POST);
            	if (!empty($KodeJenis)) {
            		$sql = mysqli_query($this->cnt,"SELECT * FROM tbjenisproduk WHERE KodeJenis = '$KodeJenis'");
            		$x = 0;
            		while ($res = mysqli_fetch_array($sql)) { $x++; }
            		if ($x == 0) {
            			return false;
            		}
            	}
            	else{
            		return false;
            	}
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (empty($KodeJenis) || empty($NamaJenis) || empty($Keterangan)) {
                    header("location:../pages/jenisproduk.php?notif=MLA910");
                    return false;
            	}
                $sql = mysqli_query($this->cnt,"UPDATE tbjenisproduk SET NamaJenis = '$NamaJenis', Keterangan = '$Keterangan' WHERE KodeJenis = '$KodeJenis' ");
                
                $location1 = "../pages/jenisproduk.php";
                $location2 = "../pages/jenisproduk.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MWY617";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function hapusjenisproduk(){
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (empty($KodeJenis)) {
                    header("location:../pages/jenisproduk.php?notif=MLA910");
                    return false;
            	}
                $sql = mysqli_query($this->cnt,"DELETE FROM tbjenisproduk WHERE KodeJenis = '$KodeJenis'");

                $location1 = "../pages/jenisproduk.php";
                $location2 = "../pages/jenisproduk.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }



        // Produk



        function tambahproduk()
        {

            if (isset($_POST['submit'])) {
                $target_dir = "../public/img/produk/";
                $userfile_name = $_FILES['Foto']['name'];
                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                $target_file = $target_dir . basename($_POST['NamaProduk'].".".$userfile_extn);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                if($check !== false) {
                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                    header("Location:../pages/tambahproduk.php");
                    $uploadOk = 1;
                } else {
                    echo "<script>console.log('File is not an image.');</script>";
                    header("Location:../pages/tambahproduk.php");
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                    header("Location:../pages/tambahproduk.php");
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                    header("Location:../pages/tambahproduk.php?notif=MKS819");
                    return false;
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

                        extract($_POST);
                        $Foto = $NamaProduk.".".$userfile_extn;

                        $sql = mysqli_query($this->cnt,"INSERT INTO tbproduk VALUES (null,'$KodeJenis','$NamaProduk','$Satuan','$Harga','$Stok','$Foto','$Keterangan')");

		                $location1 = "../pages/dataproduk.php";
		                $location2 = "../pages/dataproduk.php";
		                $getvar1   = "?notif=MLA910";
		                $getvar2   = "?notif=MMX795";

		                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }

        function editproduk()
        {

            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (!empty($KodeProduk)) {
            		$sql = mysqli_query($this->cnt,"SELECT * FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
            		$x = 0;
            		while ($res = mysqli_fetch_array($sql)) { $x++; }
            		if ($x == 0) {
            			return false;
            		}
            	}
            	else{
            		return false;
            	}
            	if (!empty($_FILES['Foto']['name'])) {
	                $target_dir = "../public/img/produk/";
	                $userfile_name = $_FILES['Foto']['name'];
	                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
	                $target_file = $target_dir . basename($_POST['NamaProduk'].".".$userfile_extn);
	                $uploadOk = 1;
	                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	                // Check if image file is a actual image or fake image
	                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
	                if($check !== false) {
	                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
	                    header("Location:../pages/dataproduk.php?notif=MLA910");
	                    $uploadOk = 1;
	                } else {
	                    echo "<script>console.log('File is not an image.');</script>";
	                    header("Location:../pages/dataproduk.php?notif=MLA910");
	                    $uploadOk = 0;
	                }
	                // Allow certain file formats
	                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
	                    header("Location:../pages/dataproduk.php?notif=MLA910");
	                    $uploadOk = 0;
	                }
	                // Check if $uploadOk is set to 0 by an error
	                if ($uploadOk == 0) {
	                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
	                    header("Location:../pages/dataproduk.php?notif=MKS819");
                        return false;
	                // if everything is ok, try to upload file
	                } else {
	                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

	                        extract($_POST);
	                        $Foto = $NamaProduk.".".$userfile_extn;

		                    $sql = mysqli_query($this->cnt,"UPDATE tbproduk SET KodeJenis = '$KodeJenis',NamaProduk = '$NamaProduk',Satuan = '$Satuan',Harga = '$Harga',Stok = '$Stok',Foto = '$Foto',Keterangan = '$Keterangan' WHERE KodeProduk = '$KodeProduk'");

			                $location1 = "../pages/dataproduk.php";
			                $location2 = "../pages/dataproduk.php";
			                $getvar1   = "?notif=MLA910";
			                $getvar2   = "?notif=MWY617";

			                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

	                    } else {
	                        echo "Sorry, there was an error uploading your file.";
	                    }
	                }
            	}
            	else{
                    extract($_POST);

                    $sql = mysqli_query($this->cnt,"UPDATE tbproduk SET KodeJenis = '$KodeJenis',NamaProduk = '$NamaProduk',Satuan = '$Satuan',Harga = '$Harga',Stok = '$Stok',Keterangan = '$Keterangan' WHERE KodeProduk = '$KodeProduk'");

	                $location1 = "../pages/dataproduk.php";
	                $location2 = "../pages/dataproduk.php";
	                $getvar1   = "?notif=MLA910";
	                $getvar2   = "?notif=MWY617";

	                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            	}
            }
        }

        function hapusproduk()
        {
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (empty($KodeProduk)) {
                    header("location:../pages/dataproduk.php?notif=MLA910");
                    return false;
            	}
                $sql = mysqli_query($this->cnt,"DELETE FROM tbproduk WHERE KodeProduk = '$KodeProduk'");

                $location1 = "../pages/dataproduk.php";
                $location2 = "../pages/dataproduk.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }



        // Pelanggan



        function tambahpelanggan()
        {

            if (isset($_POST['submit'])) {
                    extract($_POST);
                    $sql = mysqli_query($this->cnt,"SELECT Username FROM tbuser");
                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                    while ($res=mysqli_fetch_array($sql)) {
                        if ($Username == $res[0]) {
                            header("Location:../pages/tambahpelanggan?notif=MAJ982");
                            return false;
                        }
                    }
                    if (empty($_FILES['Foto']['name'])) {
                        $Password = md5($Password);
                        $sql = mysqli_query($this->cnt,"INSERT INTO tbuser VALUES (null,'$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','unknown.png','3','')");

                        $location1 = "../pages/datapelanggan.php";
                        $location2 = "../pages/datapelanggan.php";
                        $getvar1   = "?notif=MLA910";
                        $getvar2   = "?notif=MMX795";

                        (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        return false;
                    }

	                $target_dir = "../public/img/profile/";
	                $userfile_name = $_FILES['Foto']['name'];
	                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
	                $target_file = $target_dir . basename($_POST['Username'].".".$userfile_extn);
	                $uploadOk = 1;
	                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	                // Check if image file is a actual image or fake image
	                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
	                if($check !== false) {
	                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
	                    header("Location:../pages/tambahpelanggan.php");
	                    $uploadOk = 1;
	                } else {
	                    echo "<script>console.log('File is not an image.');</script>";
	                    header("Location:../pages/tambahpelanggan.php");
	                    $uploadOk = 0;
	                }
	                // Allow certain file formats
	                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
	                    header("Location:../pages/tambahpelanggan.php");
	                    $uploadOk = 0;
	                }
	                // Check if $uploadOk is set to 0 by an error
	                if ($uploadOk == 0) {
	                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
	                    header("Location:../pages/tambahpelanggan.php?notif=MKS819");
                        return false;
	                // if everything is ok, try to upload file
	                } else {
	                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
                            extract($_POST);
                            $Foto = $Username.".".$userfile_extn;
                            $Password = md5($Password);
                            $sql = mysqli_query($this->cnt,"INSERT INTO tbuser VALUES (null,'$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','$Foto','3','')");

                            $location1 = "../pages/datapelanggan.php";
                            $location2 = "../pages/datapelanggan.php";
                            $getvar1   = "?notif=MLA910";
                            $getvar2   = "?notif=MMX795";

                            (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

	                    } else {
	                        echo "Sorry, there was an error uploading your file.";
	                    }
	                }
            	}
        }


        function editpelanggan()
        {

            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (!empty($KodeUser)) {
            		$sql = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodeUser'");
            		$x = 0;
            		while ($res = mysqli_fetch_array($sql)) { $x++; }
            		if ($x == 0) {
            			return false;
            		}
            	}
            	else{
            		return false;
            	}
            	if (!empty($_FILES['Foto']['name'])) {
	                $target_dir = "../public/img/profile/";
	                $userfile_name = $_FILES['Foto']['name'];
	                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
	                $target_file = $target_dir . basename($_POST['Username'].".".$userfile_extn);
	                $uploadOk = 1;
	                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	                // Check if image file is a actual image or fake image
	                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
	                if($check !== false) {
	                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
	                    header("Location:../pages/datapelanggan.php?notif=MLA910");
	                    $uploadOk = 1;
	                } else {
	                    echo "<script>console.log('File is not an image.');</script>";
	                    header("Location:../pages/datapelanggan.php?notif=MLA910");
	                    $uploadOk = 0;
	                }
	                // Allow certain file formats
	                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
	                    header("Location:../pages/datapelanggan.php?notif=MLA910");
	                    $uploadOk = 0;
	                }
	                // Check if $uploadOk is set to 0 by an error
	                if ($uploadOk == 0) {
	                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
	                    header("Location:../pages/datapelanggan.php?notif=MKS819");
                        return false;
	                // if everything is ok, try to upload file
	                } else {
	                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

	                        extract($_POST);
	                        $Foto = $Username.".".$userfile_extn;

		                    $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email',Foto = '$Foto' WHERE KodeUser = '$KodeUser'");

			                $location1 = "../pages/datapelanggan.php";
			                $location2 = "../pages/datapelanggan.php";
			                $getvar1   = "?notif=MLA910";
			                $getvar2   = "?notif=MWY617";

			                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

	                    } else {
	                        echo "Sorry, there was an error uploading your file.";
	                    }
	                }
            	}
            	else{
                    extract($_POST);

                    $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email' WHERE KodeUser = '$KodeUser'");	
	                $location1 = "../pages/datapelanggan.php";
	                $location2 = "../pages/datapelanggan.php";
	                $getvar1   = "?notif=MLA910";
	                $getvar2   = "?notif=MWY617";

	                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            	}
            }
        }


        function hapuspelanggan(){
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (empty($KodeUser)) {
                    header("location:../pages/datapelanggan.php?notif=MLA910");
                    return false;
            	}
                $sql = mysqli_query($this->cnt,"DELETE FROM tbuser WHERE KodeUser = '$KodeUser'");

                $location1 = "../pages/datapelanggan.php";
                $location2 = "../pages/datapelanggan.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        // Admin

        function tambahadmin()
        {

            if (isset($_POST['submit'])) {
                    extract($_POST);
                    $sql = mysqli_query($this->cnt,"SELECT Username FROM tbuser");
                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                    while ($res=mysqli_fetch_array($sql)) {
                        if ($Username == $res[0]) {
                            header("Location:../pages/tambahadmin?notif=MAJ982");
                            return false;
                        }
                    }
                    if (empty($_FILES['Foto']['name'])) {
                        $Password = md5($Password);
                        $sql = mysqli_query($this->cnt,"INSERT INTO tbuser VALUES (null,'$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','unknown.png','1','','$SecurityQuestion','$SecurityAnswer')");

                        $location1 = "../pages/dataadmin.php";
                        $location2 = "../pages/dataadmin.php";
                        $getvar1   = "?notif=MLA910";
                        $getvar2   = "?notif=MMX795";

                        (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        return false;
                    }

                    $target_dir = "../public/img/profile/";
                    $userfile_name = $_FILES['Foto']['name'];
                    $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                    $target_file = $target_dir . basename($_POST['Username'].".".$userfile_extn);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                        header("Location:../pages/tambahadmin.php");
                        $uploadOk = 1;
                    } else {
                        echo "<script>console.log('File is not an image.');</script>";
                        header("Location:../pages/tambahadmin.php");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                        header("Location:../pages/tambahadmin.php");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                        header("Location:../pages/tambahadmin.php?notif=MKS819");
                        return false;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
                            extract($_POST);
                            $Foto = $Username.".".$userfile_extn;
                            $Password = md5($Password);
                            $sql = mysqli_query($this->cnt,"INSERT INTO tbuser VALUES (null,'$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','$Foto','1','')");

                            $location1 = "../pages/dataadmin.php";
                            $location2 = "../pages/dataadmin.php";
                            $getvar1   = "?notif=MLA910";
                            $getvar2   = "?notif=MMX795";

                            (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
        }


        function editadmin()
        {

            if (isset($_POST['submit'])) {
                extract($_POST);
                if (!empty($KodeUser)) {
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodeUser'");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { $x++; }
                    if ($x == 0) {
                        header("Location:../pages/dataadmin.php?notif=MLA910");
                        return false;
                    }
                }
                else{
                    header("Location:../pages/dataadmin.php?notif=MLA910");
                    return false;
                }
                if (!empty($_FILES['Foto']['name'])) {
                    $target_dir = "../public/img/profile/";
                    $userfile_name = $_FILES['Foto']['name'];
                    $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                    $target_file = $target_dir . basename($_POST['Username'].".".$userfile_extn);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                        header("Location:../pages/dataadmin.php?notif=MLA910");
                        $uploadOk = 1;
                    } else {
                        echo "<script>console.log('File is not an image.');</script>";
                        header("Location:../pages/dataadmin.php?notif=MLA910");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                        header("Location:../pages/dataadmin.php?notif=MLA910");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                        header("Location:../pages/dataadmin.php?notif=MKS819");
                        return false;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

                            extract($_POST);
                            $Foto = $Username.".".$userfile_extn;

                            $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email',Foto = '$Foto' WHERE KodeUser = '$KodeUser'");
                            $test = "no-test";
                            if ($KodeUser == $_COOKIE['KodeUser']) {

                                setcookie('NamaLengkap', $res['NamaLengkap'], time() - 86400, "/");
                                setcookie('Alamat', $res['Alamat'], time() - 86400, "/");
                                setcookie('Telp', $res['Telp'], time() - 86400, "/");
                                setcookie('Email', $res['Email'], time() - 86400, "/");
                                setcookie('Foto', $res['Foto'], time() - 86400, "/");

                                setcookie('NamaLengkap', $NamaLengkap, time() + 86400, "/");
                                setcookie('Alamat', $Alamat, time() + 86400, "/");
                                setcookie('Telp', $Telp, time() + 86400, "/");
                                setcookie('Email', $Email, time() + 86400, "/");
                                setcookie('Foto', $Foto, time() + 86400, "/");      
                            }

                            $location1 = "../pages/dataadmin.php";
                            $location2 = "../pages/dataadmin.php";
                            $getvar1   = "?notif=MLA910";
                            $getvar2   = "?notif=MWY617";

                            (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                else{
                    extract($_POST);

                    $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email' WHERE KodeUser = '$KodeUser'");

                    if ($KodeUser == $_COOKIE['KodeUser']) {
                                
                        setcookie('NamaLengkap', $res['NamaLengkap'], time() - 86400, "/");
                        setcookie('Alamat', $res['Alamat'], time() - 86400, "/");
                        setcookie('Telp', $res['Telp'], time() - 86400, "/");
                        setcookie('Email', $res['Email'], time() - 86400, "/");
                        setcookie('Foto', $res['Foto'], time() - 86400, "/");

                        setcookie('NamaLengkap', $NamaLengkap, time() + 86400, "/");
                        setcookie('Alamat', $Alamat, time() + 86400, "/");
                        setcookie('Telp', $Telp, time() + 86400, "/");
                        setcookie('Email', $Email, time() + 86400, "/");
                    }

                    $location1 = "../pages/dataadmin.php";
                    $location2 = "../pages/dataadmin.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MWY617";

                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                }
            }
        }


        function hapusadmin(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty($KodeUser)) {
                    header("location:../pages/dataadmin.php?notif=MLA910");
                    return false;
                }
                $sql = mysqli_query($this->cnt,"DELETE FROM tbuser WHERE KodeUser = '$KodeUser'");

                $location1 = "../pages/dataadmin.php";
                $location2 = "../pages/dataadmin.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }


        // Instruktor



        function tambahinstruktor()
        {

            if (isset($_POST['submit'])) {
                    extract($_POST);
                    $sql = mysqli_query($this->cnt,"SELECT Username FROM tbuser");
                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                    while ($res=mysqli_fetch_array($sql)) {
                        if ($Username == $res[0]) {
                            header("Location:../pages/tambahpelanggan?notif=MAJ982");
                            return false;
                        }
                    }

                    if (empty($_FILES['Foto']['name'])) {
                        $Password = md5($Password);
                        $sql = mysqli_query($this->cnt,"INSERT INTO tbuser VALUES (null,'$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','unknown.png','2','Ready','','')");

                        $location1 = "../pages/datainstruktor.php";
                        $location2 = "../pages/datainstruktor.php";
                        $getvar1   = "?notif=MLA910";
                        $getvar2   = "?notif=MMX795";

                        (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        return false;
                    }

	                $target_dir = "../public/img/profile/";
	                $userfile_name = $_FILES['Foto']['name'];
	                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
	                $target_file = $target_dir . basename($_POST['Username'].".".$userfile_extn);
	                $uploadOk = 1;
	                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	                // Check if image file is a actual image or fake image
	                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
	                if($check !== false) {
	                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
	                    $uploadOk = 1;
	                } else {
	                    echo "<script>console.log('File is not an image.');</script>";
	                    header("Location:../pages/tambahinstruktor.php?notif=MLA910&1");
	                    $uploadOk = 0;
	                }
	                // Allow certain file formats
	                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
	                    header("Location:../pages/tambahinstruktor.php?notif=MLA910&2");
	                    $uploadOk = 0;
	                }
	                // Check if $uploadOk is set to 0 by an error
	                if ($uploadOk == 0) {
	                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
	                    header("Location:../pages/tambahinstruktor.php?notif=MKS819");
                        return false;
	                // if everything is ok, try to upload file
	                } else {
	                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

	                        extract($_POST);
	                        $Foto = $Username.".".$userfile_extn;
	                        $Password = md5($Password);
	                        $sql = mysqli_query($this->cnt,"INSERT INTO tbuser VALUES (null,'$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Email','$Foto','2','Ready')");

			                $location1 = "../pages/datainstruktor.php";
			                $location2 = "../pages/datainstruktor.php";
			                $getvar1   = "?notif=MLA910";
			                $getvar2   = "?notif=MMX795";

			                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

	                    } else {
	                        echo "Sorry, there was an error uploading your file.";
	                    }
	                }
            }
        }


        function editinstruktor()
        {

            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (!empty($KodeUser)) {
            		$sql = mysqli_query($this->cnt,"SELECT * FROM tbuser WHERE KodeUser = '$KodeUser'");
            		$x = 0;
            		while ($res = mysqli_fetch_array($sql)) { $x++; }
            		if ($x == 0) {
            			return false;
            		}
            	}
            	else{
            		return false;
            	}
            	if (!empty($_FILES['Foto']['name'])) {
	                $target_dir = "../public/img/profile/";
	                $userfile_name = $_FILES['Foto']['name'];
	                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
	                $target_file = $target_dir . basename($_POST['Username'].".".$userfile_extn);
	                $uploadOk = 1;
	                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	                // Check if image file is a actual image or fake image
	                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
	                if($check !== false) {
	                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
	                    header("Location:../pages/datainstruktor.php?notif=MLA910");
	                    $uploadOk = 1;
	                } else {
	                    echo "<script>console.log('File is not an image.');</script>";
	                    header("Location:../pages/datainstruktor.php?notif=MLA910");
	                    $uploadOk = 0;
	                }
	                // Allow certain file formats
	                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
	                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
	                    header("Location:../pages/datainstruktor.php?notif=MLA910");
	                    $uploadOk = 0;
	                }
	                // Check if $uploadOk is set to 0 by an error
	                if ($uploadOk == 0) {
	                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
	                    header("Location:../pages/datainstruktor.php?notif=MKS819");
                        return false;
	                // if everything is ok, try to upload file
	                } else {
	                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

	                        $Foto = $Username.".".$userfile_extn;

		                    $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email',Foto = '$Foto' WHERE KodeUser = '$KodeUser'");

			                $location1 = "../pages/datainstruktor.php";
			                $location2 = "../pages/datainstruktor.php";
			                $getvar1   = "?notif=MLA910";
			                $getvar2   = "?notif=MWY617";

			                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

	                    } else {
	                        echo "Sorry, there was an error uploading your file.";
	                    }
	                }
            	}
            	else{
                    extract($_POST);

                    $sql = mysqli_query($this->cnt,"UPDATE tbuser SET NamaLengkap = '$NamaLengkap',Alamat = '$Alamat',Telp = '$Telp',Email = '$Email' WHERE KodeUser = '$KodeUser'");	
	                $location1 = "../pages/datainstruktor.php";
	                $location2 = "../pages/datainstruktor.php";
	                $getvar1   = "?notif=MLA910";
	                $getvar2   = "?notif=MWY617";

	                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            	}
            }
        }


        function hapusinstruktor(){
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (empty($KodeUser)) {
                    header("location:../pages/datainstruktor.php?notif=MLA910");
                    return false;
            	}
                $sql = mysqli_query($this->cnt,"DELETE FROM tbuser WHERE KodeUser = '$KodeUser'");

                $location1 = "../pages/datainstruktor.php";
                $location2 = "../pages/datainstruktor.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function changeStatusUser()
        {
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (empty($KodeUser)) {
                    header("location:../pages/datainstruktor.php?notif=MLA910");
                    return false;
            	}
            	if ($StatusUser == "Ready") {
            		$result = "Sibuk";
            	}
            	else if ($StatusUser == "Sibuk") {
            		$result = "Ready";
            	}
            	else{
                    header("location:../pages/datainstruktor.php?notif=MLA910");
                    return false;
            	}
                $sql = mysqli_query($this->cnt,"UPDATE tbuser SET StatusUser = '$result' WHERE KodeUser = '$KodeUser'");

                $location1 = "../pages/datainstruktor.php";
                $location2 = "../pages/datainstruktor.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }


        function tambahpaketkursus(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                $sql = mysqli_query($this->cnt,"SELECT NamaPaket FROM tbpaketkursus");
                while ($res=mysqli_fetch_array($sql)) {
                    if ($NamaPaket == $res[0]) {
                        header("Location:../pages/tambahpaketkursus.php?notif=MAJ983");
                        return false;
                    }
                }
                if (empty($_FILES)) {
                    header("Location:../pages/tambahpaketkursus.php?notif=MAJ984");
                }
                $target_dir = "../public/img/paketkursus/";
                $userfile_name = $_FILES['Foto']['name'];
                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                $target_file = $target_dir . basename($_POST['NamaPaket'].".".$userfile_extn);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                if($check !== false) {
                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                    header("Location:../pages/tambahpaketkursus.php");
                    $uploadOk = 1;
                } else {
                    echo "<script>console.log('File is not an image.');</script>";
                    header("Location:../pages/tambahpaketkursus.php");
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                    header("Location:../pages/tambahpaketkursus.php");
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                    header("Location:../pages/tambahpaketkursus.php?notif=MKS819");
                    return false;
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
                        extract($_POST);
                        if (empty($_POST)) {
                            header("location:../pages/tambahpaketkursus.php?notif=MLA910");
                            return false;
                        }
                        $Foto = $NamaPaket.".".$userfile_extn;
                        $sql = mysqli_query($this->cnt,"INSERT INTO tbpaketkursus VALUES (null,'$NamaPaket','$Harga','$Durasi','$Keterangan','$Foto')");

                        $location1 = "../pages/tambahpaketkursus.php";
                        $location2 = "../pages/datapaketkursus.php";
                        $getvar1   = "?notif=MLA910";
                        $getvar2   = "?notif=MMX795";

                        (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

            	
            }
        }

        function editpaketkursus(){
            if (isset($_POST['submit'])) {
            	extract($_POST);
            	if (!empty($KodePaket)) {
            		$sql = mysqli_query($this->cnt,"SELECT * FROM tbpaketkursus WHERE KodePaket = '$KodePaket'");
            		$x = 0;
            		while ($res = mysqli_fetch_array($sql)) { $x++; }
            		if ($x == 0) {
            			header("Location:datapaketkursus.php?notif=MLA910");
            			return false;
            		}
            	}
            	else{
        			header("Location:../pages/datapaketkursus.php?notif=MLA910");	
            		return false;
            	}

                if (empty($_FILES['Foto']['name'])) {
                    $sql = mysqli_query($this->cnt,"UPDATE tbpaketkursus SET NamaPaket = '$NamaPaket', Harga = '$Harga', Durasi = '$Durasi', Keterangan = '$Keterangan' WHERE KodePaket = '$KodePaket' ");
                    $location1 = "../pages/datapaketkursus.php";
                    $location2 = "../pages/datapaketkursus.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MWY617";

                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                    return false;
                }
                else{
                    $target_dir = "../public/img/paketkursus/";
                    $userfile_name = $_FILES['Foto']['name'];
                    $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                    $target_file = $target_dir . basename($_POST['NamaPaket'].".".$userfile_extn);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                        header("Location:../pages/tambahpaketkursus.php");
                        $uploadOk = 1;
                    } else {
                        echo "<script>console.log('File is not an image.');</script>";
                        header("Location:../pages/tambahpaketkursus.php");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                        header("Location:../pages/tambahpaketkursus.php");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                        header("Location:../pages/tambahpaketkursus.php&notif=MKS819");
                        return false;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
                            extract($_POST);
                            if (empty($_POST)) {
                                header("location:../pages/tambahpaketkursus.php?notif=MLA910");
                                return false;
                            }
                            $Foto = $NamaPaket.".".$userfile_extn;                    
                            $sql = mysqli_query($this->cnt,"UPDATE tbpaketkursus SET NamaPaket = '$NamaPaket', Harga = '$Harga', Durasi = '$Durasi', Keterangan = '$Keterangan' , Foto = '$Foto' WHERE KodePaket = '$KodePaket' ");
                            $location1 = "../pages/datapaketkursus.php";
                            $location2 = "../pages/datapaketkursus.php";
                            $getvar1   = "?notif=MLA910";
                            $getvar2   = "?notif=MWY617";


                            (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                
            }
        }

        function hapuspaketkursus(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty($KodePaket)) {
                    header("location:../pages/tambahpaketkursus.php?notif=MLA910");
                    return false;
                }
                $sql = mysqli_query($this->cnt,"DELETE FROM tbpaketkursus WHERE KodePaket = '$KodePaket'");

                $location1 = "../pages/tambahpaketkursus.php";
                $location2 = "../pages/datapaketkursus.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function gantipassworduser(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if ($password1 != $password2) {  
                    if (empty($from) || empty($to)) {
                        header("Location:../pages/edituser.php?notif=MAQ667");
                        return false;
                    }
                    else {
                        if ($from == 'Admin' && $to == 'Pelanggan') {
                            header("Location:../pages/editpelanggan.php?notif=MAQ667&KodeUser='$KodeUser'");
                        }
                        else if ($from == 'Admin' && $to == 'Instruktor') {
                            header("Location:../pages/editinstruktor.php?notif=MAQ667&KodeUser='$KodeUser'");
                        }
                        else if ($from == 'Admin' && $to == 'Admin') {
                            header("Location:../pages/editadmin.php?notif=MAQ667&KodeUser='$KodeUser'");
                        }
                        return false;
                    }
                }
                $Password = md5($password1);
                $sql = mysqli_query($this->cnt,"UPDATE tbuser SET Password = '$Password' WHERE KodeUser = '$KodeUser'");
                if (empty($from) || empty($to)) {
                    $location1 = "../pages/edituser.php";
                    $location2 = "../pages/home.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MWY617";
                }
                else {
                    if ($from == 'Admin' && $to == 'Pelanggan') {
                        $location1 = "../pages/editpelanggan.php";
                        $location2 = "../pages/datapelanggan.php";
                        $getvar1   = "?notif=MLA910&KodeUser=".$KodeUser;
                        $getvar2   = "?notif=MWY617";
                    }
                    else if ($from == 'Admin' && $to == 'Instruktor') {
                        $location1 = "../pages/editinstruktor.php";
                        $location2 = "../pages/datainstruktor.php";
                        $getvar1   = "?notif=MLA910&KodeUser=".$KodeUser;
                        $getvar2   = "?notif=MWY617";
                    }
                    else if ($from == 'Admin' && $to == 'Admin') {
                        $location1 = "../pages/editadmin.php";
                        $location2 = "../pages/dataadmin.php";
                        $getvar1   = "?notif=MLA910&KodeUser=".$KodeUser;
                        $getvar2   = "?notif=MWY617";
                    }
                }

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }


        function tambahtransaksiproduk(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty(extract($_POST))) {
                    header("location:../pages/transaksiproduk.php?notif=MLA910");
                    return false;
                }

                $sqlz = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE KodePelanggan = '$KodePelanggan' AND StatusKursus = 'Sudah Order'");
                $resz = mysqli_num_rows($sqlz);
                if ($resz > 0) {
                    $sql = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE StatusKursus = 'Sudah Order' AND KodePelanggan = '$KodePelanggans' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      $time1 = date($res['TglOrder']);
                      $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
                      $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
                      $time3 = date($process->ThisFullDate);

                      if ( $time3 == $time2 || $time3 == $time4){
                        header("location:../pages/produk.php?p=$KodeProduk2&notif=MTE728");
                        return false;
                      }
                    }
                }

                $booleans = true;
                $booleana = true;
                $booleanb = true;

                $KodePelanggans = $_POST['KodePelanggan'];
                $sqlx = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodePelanggans' AND StatusTransaksi = 'Sudah Order'");
                while ($resx = mysqli_fetch_array($sqlx)) {
                    $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' AND KodePelanggan = '$KodePelanggans' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      $time1 = date($res['TglOrder']);
                      $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
                      $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
                      $time3 = date($process->ThisFullDate);

                      if ( $time3 == $time2 || $time3 == $time4){
                        $booleans = false;
                      }
                    }
                }
                $sqly = mysqli_query($this->cnt,"SELECT Stok FROM tbproduk WHERE KodeProduk = '$KodeProduk2'");
                $resy = mysqli_fetch_array($sqly);
                if ($Jumlah > $resy['Stok']) {
                    $booleanb = false;
                }
                $sqlz = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodePelanggans' AND KodeProduk = '$KodeProduk2' AND StatusTransaksi=''");
                while ($resz = mysqli_fetch_array($sqlz)) {
                    $TotalJumlah = $Jumlah + $resz['Jumlah'];
                    $sqlza = mysqli_query($this->cnt,"UPDATE tbtransaksiproduk SET Jumlah = '$TotalJumlah'");
                     if ($_COOKIE['Level'] == 1) {
                        header("location:../pages/transaksiproduk.php?notif=MMX795");
                    }
                    else{
                        header("location:../pages/produk.php?p=$KodeProduk2&notif=MMX795");
                    }
                    $sql1 = mysqli_query($this->cnt,"SELECT Stok,Harga FROM tbproduk WHERE KodeProduk = '$KodeProduk2'");
                    $res1 = mysqli_fetch_array($sql1);

                    $Stoks = $res1['Stok'] - $Jumlah;
                    $sql2 = mysqli_query($this->cnt,"UPDATE tbproduk SET Stok = '$Stoks' WHERE KodeProduk = '$KodeProduk2'");

                    $TotalHargaa = $res1['Harga'] * $TotalJumlah;
                    $sql2 = mysqli_query($this->cnt,"UPDATE tbtransaksiproduk SET TotalHarga = '$TotalHargaa' WHERE KodePelanggan = '$KodePelanggans' AND KodeProduk = '$KodeProduk2' AND StatusTransaksi=''");
                    return false;
                }
                if ($booleans == false) { 
                    if ($_COOKIE['Level'] == 1) {
                        header("location:../pages/transaksiproduk.php?notif=MTE728");
                    }
                    else{
                        header("location:../pages/produk.php?p=$KodeProduk2&notif=MTE728");
                    }
                    return false;
                }
                if ($booleanb == false) { 
                    if ($_COOKIE['Level'] == 1) {
                        header("location:../pages/transaksiproduk.php?notif=MLA910");
                    }
                    else{
                        header("location:../pages/produk.php?p=$KodeProduk2&notif=MLA910");
                    }
                    return false;
                }

                if (!empty($Jumlah)) {
                    $sql1 = mysqli_query($this->cnt,"SELECT * FROM tbproduk WHERE KodeProduk = '$KodeProduk2'");
                    $res1 = mysqli_fetch_array($sql1);
                    $TotalHarga2 = $Jumlah * $res1['Harga'];
                }
                $sql1 = mysqli_query($this->cnt,"SELECT Stok FROM tbproduk WHERE KodeProduk = '$KodeProduk2'");
                $res1 = mysqli_fetch_array($sql1);

                $Stoks = $res1['Stok'] - $Jumlah;
                $sql2 = mysqli_query($this->cnt,"UPDATE tbproduk SET Stok = '$Stoks' WHERE KodeProduk = '$KodeProduk2'");

                $sql = mysqli_query($this->cnt,"INSERT INTO tbtransaksiproduk VALUES (null,'','$KodePelanggan','$KodeProduk2','','$Jumlah','$TotalHarga2','$TglOrder','','$StatusTransaksi')");
                // $sql = false;

                if ($_COOKIE['Level'] == 1) {
                    $location1 = "../pages/transaksiproduk.php";
                    $location2 = "../pages/transaksiproduk.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MMX795";
                }
                else{
                    $location1 = "../pages/produk.php?p=$KodeProduk2";
                    $location2 = "../pages/produk.php?p=$KodeProduk2";
                    $getvar1   = "&notif=MLA910";
                    $getvar2   = "&notif=MMX795&".$Stoks; 
                }
                

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
         }
     }
        function hapustransaksiproduk(){
            if (isset($_POST['submit'])) {
                extract($_POST);

                $sqlx = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodeTransaksi = '$KodeTransaksi' AND StatusTransaksi <> 'Sudah Lunas'");
                while ($resx = mysqli_fetch_array($sqlx)) {
                    extract($resx);
                    $sql1 = mysqli_query($this->cnt,"SELECT Stok FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
                    $res1 = mysqli_fetch_array($sql1);

                    $Stok = 0;
                    $Stok = $res1['Stok'] + $Jumlah;
                    $sql2 = mysqli_query($this->cnt,"UPDATE tbproduk SET Stok = '$Stok' WHERE KodeProduk = '$KodeProduk'");
                }

                if (empty($KodeTransaksi)) {
                    header("location:../pages/transaksiproduk.php?notif=MLA910");
                    return false;
                }
                $sql = mysqli_query($this->cnt,"DELETE FROM tbtransaksiproduk WHERE KodeTransaksi = '$KodeTransaksi'");
                $sqlx = mysqli_query($this->cnt,"SELECT NoTransaksi,JenisTransaksi FROM tbtransaksiproduk WHERE KodeTransaksi");
                $resx = mysqli_fetch_array($sqlx);
                if ($resx[$JenisTransaksi] != '' ) {
                    $NoTransaksi = $resx[0];
                    $sql2 = mysqli_query($this->cnt,"DELETE FROM tbpembayaran WHERE NoTransaksi = '$NoTransaksi'");
                }
                else{
                    $sql2 = true;
                }

                if($_COOKIE['Level'] == 1){
                    $location1 = "../pages/transaksiproduk.php";
                    $location2 = "../pages/transaksiproduk.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";
                }
                else{
                    $location1 = "../pages/keranjang.php";
                    $location2 = "../pages/keranjang.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";   
                }

                (!$sql || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }


        function checkouttransaksiproduk(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (!empty($KodePelanggan)) {
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodePelanggan' AND StatusTransaksi = '' ");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { $x++; }
                    if ($x == 0) {
                        header("Location:keranjang.php?notif=MLA910");
                        return false;
                    }
                }
                else{
                    header("Location:../pages/keranjang.php?notif=MLA910");   
                    return false;
                }  

                $var1 = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
                $var2 = substr(str_shuffle($var1),0,5);

                $NoTransaksi = $this->ThisYear.$this->ThisMonth.$this->ThisDate.$var2;
                
                if ($KodeExpedisi == 'tanpaex') {
                    $KodeExpedisi = '';
                }
                $sqlx = mysqli_query($this->cnt,"SELECT * FROM tbpesankursus WHERE KodePelanggan = '$KodePelanggan' AND StatusKursus = 'Sudah Order'");
                $resx = mysqli_num_rows($sqlx);
                if ($resx > 0) {
                    header("location:../pages/keranjang.php?notif=MTE728");
                    return false;
                }

                $sql = mysqli_query($this->cnt,"UPDATE tbtransaksiproduk SET StatusTransaksi = 'Sudah Order', NoTransaksi = '$NoTransaksi', KodeExpedisi = '$KodeExpedisi' WHERE KodePelanggan = '$KodePelanggan' AND StatusTransaksi = '' ");
                
                $location1 = "../pages/keranjang.php";
                $location2 = "../pages/keranjang.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MMX795&";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function terimatransaksiproduk(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (!empty($NoTransaksi)) {
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksi'");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { 
                        $x++; 
                    }
                        if ($x == 0) {
                            header("Location:transaksiproduk.php?notif=MLA910");
                        return false;
                    }   

                }
                else{
                    header("Location:../pages/transaksiproduk.php?notif=MLA910");   
                    return false;
                }  
                
                $sql = mysqli_query($this->cnt,"UPDATE tbtransaksiproduk SET StatusTransaksi = 'Sudah Lunas', JenisTransaksi = 'Manual' WHERE NoTransaksi = '$NoTransaksi' ");
                
                $location1 = "../pages/transaksiproduk.php";
                $location2 = "../pages/transaksiproduk.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MWY617";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }


        function hapustransaksiproduk2(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                $sqlx = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksi' AND StatusTransaksi <>'Sudah Lunas'");
                while ($resx = mysqli_fetch_array($sqlx)) {
                    extract($resx);
                    $sql1 = mysqli_query($this->cnt,"SELECT Stok FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
                    $res1 = mysqli_fetch_array($sql1);

                    $Stok = 0;
                    $Stok = $res1['Stok'] + $Jumlah;
                    $sql2 = mysqli_query($this->cnt,"UPDATE tbproduk SET Stok = '$Stok' WHERE KodeProduk = '$KodeProduk'");
                }

                if (empty($NoTransaksi)) {
                    if($_COOKIE['Level'] == 1){
                        $location1 = "../pages/transaksiproduk.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    else{
                        $location1 = "../pages/keranjang.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    header("location:".$location1.$getvar1);
                    return false;
                }
                $sql = mysqli_query($this->cnt,"DELETE FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksi'");

                if($_COOKIE['Level'] == 1){
                    $location1 = "../pages/transaksiproduk.php";
                    $location2 = "../pages/transaksiproduk.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";
                }
                else{
                    $location1 = "../pages/keranjang.php";
                    $location2 = "../pages/keranjang.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";   
                }

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }
        function hapuspesankursus2(){
            if (isset($_POST['submit'])) {
                extract($_POST);

                if (empty($NoTransaksi)) {
                    if($_COOKIE['Level'] == 1){
                        $location1 = "../pages/pesanpaketkursusadmin.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    else{
                        $location1 = "../pages/datapesanankursus.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    header("location:".$location1.$getvar1);
                    return false;
                }
                $sql1 = mysqli_query($this->cnt,"DELETE FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksi'");
                $sql2 = mysqli_query($this->cnt,"DELETE FROM tbpembayarankursus WHERE NoTransaksi = '$NoTransaksi'");
                $sqlx = mysqli_query($this->cnt,"SELECT KodeInstruktor FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksi'");
                $resx = mysqli_fetch_array($sqlx);
                extract($resx);
                $sql3 = mysqli_query($this->cnt,"UPDATE tbuser SET StatusUser = 'Ready' WHERE KodeUser = '$KodeInstruktor'");

                if($_COOKIE['Level'] == 1){
                    $location1 = "../pages/pesanpaketkursusadmin.php";
                    $location2 = "../pages/pesanpaketkursusadmin.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376&".$NoTransaksi;
                }
                else{
                    $location1 = "../pages/datapesanankursus.php";
                    $location2 = "../pages/datapesanankursus.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";   
                }

                (!$sql1 || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }
        
        function tambahpembayaran()
        {

            if (isset($_POST['submit'])) {
                    extract($_POST);
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksi'");
                    $hargaa = 0;
                    $x = 0;
                    while($res = mysqli_fetch_array($sql)){
                        $hargaa += $res['TotalHarga'];
                        $KodeExpedisi = $res['KodeExpedisi'];
                        $x++;
                    }
                    $sqlx = mysqli_query($this->cnt,"SELECT * FROM tbexpedisi WHERE KodeExpedisi = '$KodeExpedisi'");
                    $resx = mysqli_fetch_array($sqlx);
                    $hargaa += $resx['Harga'];

                    if ($x == 0) {
                        header('Location:../pages/pembayaran.php?notif=MLA910&nt='.$NoTransaksi);
                        return false;
                    }
                    if ($hargaa > $JumlahPembayaran) {
                        header('Location:../pages/pembayaran.php?notif=MDB827&nt='.$NoTransaksi);
                        return false;
                    }

                    $target_dir = "../public/img/pembayaran/";
                    $userfile_name = $_FILES['Foto']['name'];
                    $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                    $target_file = $target_dir . basename($_POST['NoTransaksi'].".".$userfile_extn);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                        $uploadOk = 1;
                    } else {
                        echo "<script>console.log('File is not an image.');</script>";
                        header("Location:../pages/pembayaran.php?notif=MLA910&nt=$NoTransaksi&2");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                        header("Location:../pages/pembayaran.php?notif=MLA910&nt=$NoTransaksi&3");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                        header("Location:../pages/pembayaran.php?notif=MKS819&nt=$NoTransaksi");
                        return false;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

                            extract($_POST);
                            $Foto = $NoTransaksi.".".$userfile_extn;
                            $sql = mysqli_query($this->cnt,"INSERT INTO tbpembayaran VALUES (null,'$NoTransaksi','$NoRek','$AtasNama','$NamaBank','$JumlahPembayaran','$Foto','$TglPembayaran','Sudah Transfer')");
                            $sql2 = mysqli_query($this->cnt,"UPDATE tbtransaksiproduk SET StatusTransaksi = 'Sudah Transfer',JenisTransaksi = 'Online' WHERE NoTransaksi = '$NoTransaksi'");
                            $location1 = "../pages/datatransaksi.php";
                            $location2 = "../pages/datatransaksi.php";
                            $getvar1   = "?notif=MLA910&st=0";
                            $getvar2   = "?notif=MMX795&st=0";

                            (!$sql || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
            }
        }
        
        function tambahpembayarankursus()
        {

            if (isset($_POST['submit'])) {
                    extract($_POST);
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksi'");
                    $hargaa = 0;
                    $x = 0;
                    while($res = mysqli_fetch_array($sql)){
                        $hargaa += $res['TotalHarga'];
                        $x++;
                    }

                    if ($x == 0) {
                        if ($_COOKIE['Level'] == 1) {
                            header('Location:../pages/pesanpaketkursusadmin.php?notif=MLA910');   
                            return false;
                        }
                        header('Location:../pages/pembayarankursus.php?notif=MLA910&nt='.$NoTransaksi.'&'.$hargaa);
                        return false;
                    }
                    if ($hargaa > $JumlahPembayaran) {
                        if ($_COOKIE['Level'] == 1) {
                            header('Location:../pages/pesanpaketkursusadmin.php?notif=MDB827');   
                            return false;
                        }
                        header('Location:../pages/pembayarankursus.php?notif=MDB827&nt='.$NoTransaksi);
                        return false;
                    }

                    $target_dir = "../public/img/pembayaran/";
                    $userfile_name = $_FILES['Foto']['name'];
                    $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                    $target_file = $target_dir . basename($_POST['NoTransaksi'].".".$userfile_extn);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                        $uploadOk = 1;
                    } else {
                        echo "<script>console.log('File is not an image.');</script>";
                        header("Location:../pages/pembayarankursus.php?notif=MLA910&nt=$NoTransaksi&2");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                        header("Location:../pages/pembayarankursus.php?notif=MLA910&nt=$NoTransaksi&3");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                        header("Location:../pages/pembayarankursus.php?notif=MKS819&nt=$NoTransaksi&4");
                        return false;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

                            extract($_POST);
                            $Foto = $NoTransaksi.".".$userfile_extn;
                            $sql = mysqli_query($this->cnt,"INSERT INTO tbpembayarankursus VALUES (null,'$NoTransaksi','$NoRek','$AtasNama','$NamaBank','$JumlahPembayaran','$Foto','$TglPembayaran','Sudah Transfer')");
                            $sql2 = mysqli_query($this->cnt,"UPDATE tbpesankursus SET StatusKursus = 'Sudah Transfer' WHERE NoTransaksi = '$NoTransaksi'");
                            if ($_COOKIE['Level'] == 1) {
                                $location1 = "../pages/pesanpaketkursusadmin.php";
                                $location2 = "../pages/pesanpaketkursusadmin.php";
                                $getvar1   = "?notif=MLA910";
                                $getvar2   = "?notif=MMX795";
                            }
                            else{
                                $location1 = "../pages/datapesanankursus.php";
                                $location2 = "../pages/datapesanankursus.php";
                                $getvar1   = "?notif=MLA910&st=0";
                                $getvar2   = "?notif=MMX795&st=0";
                            }

                            (!$sql || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
            }
        }

        function terimapembayaran(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (!empty($NoTransaksi)) {
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksi'");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { 
                        $x++; 
                    }
                        if ($x == 0) {
                            header("Location:transaksiproduk.php?notif=MLA910");
                        return false;
                    }   

                }
                else{
                    header("Location:../pages/transaksiproduk.php?notif=MLA910");   
                    return false;
                }  
                
                $sql = mysqli_query($this->cnt,"UPDATE tbtransaksiproduk SET StatusTransaksi = 'Sudah Lunas' WHERE NoTransaksi = '$NoTransaksi' ");
                
                $sql2 = mysqli_query($this->cnt,"UPDATE tbpembayaran SET StatusPembayaran = 'Sudah Lunas' WHERE NoTransaksi = '$NoTransaksi' ");
                
                $location1 = "../pages/transaksiproduk.php";
                $location2 = "../pages/transaksiproduk.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MWY617";

                (!$sql || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }


        function hapuspembayaran(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                $sqlx = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksi'");
                while ($resx = mysqli_fetch_array($sqlx)) {
                    extract($resx);
                    $sql1 = mysqli_query($this->cnt,"SELECT Stok FROM tbproduk WHERE KodeProduk = '$KodeProduk'");
                    $res1 = mysqli_fetch_array($sql1);

                    $Stok = 0;
                    $Stok = $res1['Stok'] + $Jumlah;
                    $sql2 = mysqli_query($this->cnt,"UPDATE tbproduk SET Stok = '$Stok' WHERE KodeProduk = '$KodeProduk'");
                }

                if (empty($NoTransaksi)) {
                    if($_COOKIE['Level'] == 1){
                        $location1 = "../pages/transaksiproduk.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    else{
                        $location1 = "../pages/keranjang.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    header("location:".$location1.$getvar1);
                    return false;
                }
                $sql = mysqli_query($this->cnt,"DELETE FROM tbtransaksiproduk WHERE NoTransaksi = '$NoTransaksi'");
                $sql2 = mysqli_query($this->cnt,"DELETE FROM tbpembayaran WHERE NoTransaksi = '$NoTransaksi'");

                if($_COOKIE['Level'] == 1){
                    $location1 = "../pages/transaksiproduk.php";
                    $location2 = "../pages/transaksiproduk.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";
                }
                else{
                    $location1 = "../pages/keranjang.php";
                    $location2 = "../pages/keranjang.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";   
                }

                (!$sql || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function pesanpaketkursus()
        {
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty(extract($_POST))) {
                    header("location:../pages/pesanpaketkursus.php?notif=MLA910&p=".$KodePaket);
                    return false;
                }
                if ($_COOKIE['Level'] != 1) {
                    $KodePelanggan = $_COOKIE['KodeUser'];
                }
                $sqlz = mysqli_query($this->cnt,"SELECT * FROM tbtransaksiproduk WHERE KodePelanggan = '$KodePelanggan' AND StatusTransaksi = 'Sudah Order'");
                $resz = mysqli_num_rows($sqlz);
                if ($resz > 0) {
                    $sql = mysqli_query($process->cnt,"SELECT * FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' AND KodePelanggan = '$KodePelanggans' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      $time1 = date($res['TglOrder']);
                      $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
                      $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
                      $time3 = date($process->ThisFullDate);

                      if ( $time3 == $time2 || $time3 == $time4){
                        header("location:../pages/pesanpaketkursus.php?notif=MTE728&p=".$KodePaket);
                        return false;
                      }
                    }
                }
                $sql2 = mysqli_query($this->cnt,"SELECT * FROM tbpesankursus WHERE KodePelanggan = '$KodePelanggan' AND StatusKursus = 'Sudah Order'");
                $res2 = mysqli_num_rows($sql2);
                if ($res2 > 0) {$sql = mysqli_query($process->cnt,"SELECT * FROM tbpesankursus WHERE StatusKursus = 'Sudah Order' AND KodePelanggan = '$KodePelanggans' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      $time1 = date($res['TglOrder']);
                      $time2 = date('Y-m-d',strtotime('+0 days', strtotime($time1)));
                      $time4 = date('Y-m-d',strtotime('+1 days', strtotime($time1)));
                      $time3 = date($process->ThisFullDate);

                      if ( $time3 == $time2 || $time3 == $time4){
                        header("location:../pages/pesanpaketkursus.php?notif=MXY622&p=".$KodePaket);
                        return false;
                      }
                    }
                }


                $var1 = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
                $var2 = substr(str_shuffle($var1),0,5);

                $NoTransaksi = $this->ThisYear.$this->ThisMonth.$this->ThisDate.$var2;

                $sql3 = mysqli_query($this->cnt,"SELECT Harga,Durasi FROM tbpaketkursus WHERE KodePaket = '$KodePaket'");
                $res3 = mysqli_fetch_array($sql3);
                $TotalHarga = $res3['Harga'] * ( $Durasi / $res3['Durasi'] );
                $sql4 = mysqli_query($this->cnt,"UPDATE tbuser SET StatusUser = 'Sibuk' WHERE KodeUser = '$KodeInstruktor'");
                $sql = mysqli_query($this->cnt,"INSERT INTO tbpesankursus VALUES (null,'$KodePelanggan','$NoTransaksi','$KodePaket','$Lokasi','$Durasi','$TotalHarga','$TglOrder','Sudah Order','$KodeInstruktor')");

                if ($_COOKIE['Level'] == 1) {
                    $location1 = "../pages/pesanpaketkursusadmin.php";
                    $location2 = "../pages/pesanpaketkursusadmin.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MMX795";
                }
                else{
                    $location1 = "../pages/pesanpaketkursus.php";
                    $location2 = "../pages/pesanpaketkursus.php";
                    $getvar1   = "?notif=MLA910&p=".$KodePaket;
                    $getvar2   = "?notif=MMX795&p=".$KodePaket; 
                }
                
                (!$sql && !$sql4) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);   
            }
        }   
        function hapuspesankursus(){
            if (isset($_POST['submit'])) {
                extract($_POST);

                if (empty($NoTransaksi)) {
                    if($_COOKIE['Level'] == 1){
                        $location1 = "../pages/pesanpaketkursusadmin.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    else{
                        $location1 = "../pages/pesanpaketkursus.php";
                        $getvar1   = "?notif=MLA910";
                    }
                    header("location:".$location1.$getvar1);
                    return false;
                }
                $sql1 = mysqli_query($this->cnt,"DELETE FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksi'");
                $sql2 = mysqli_query($this->cnt,"DELETE FROM tbpembayarankursus WHERE NoTransaksi = '$NoTransaksi'");
                $sqlx = mysqli_query($this->cnt,"SELECT KodeInstruktor FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksi'");
                $resx = mysqli_fetch_array($sqlx);
                extract($resx);
                $sql3 = mysqli_query($this->cnt,"UPDATE tbuser SET StatusUser = 'Ready' WHERE KodeUser = '$KodeInstruktor'");

                if($_COOKIE['Level'] == 1){
                    $location1 = "../pages/pesanpaketkursusadmin.php";
                    $location2 = "../pages/pesanpaketkursusadmin.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";
                }
                else{
                    $location1 = "../pages/pesanpaketkursus.php";
                    $location2 = "../pages/pesanpaketkursus.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MGT376";   
                }

                (!$sql1 || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function terimapembayarankursus(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (!empty($NoTransaksi)) {
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbpesankursus WHERE NoTransaksi = '$NoTransaksi'");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { 
                        $x++; 
                    }
                        if ($x == 0) {
                            header("Location:pesanpaketkursusadmin.php?notif=MLA910");
                        return false;
                    }   

                }
                else{
                    header("Location:../pages/pesanpaketkursusadmin.php?notif=MLA910");   
                    return false;
                }  
                
                $sql = mysqli_query($this->cnt,"UPDATE tbpesankursus SET StatusKursus = 'Sudah Lunas' WHERE NoTransaksi = '$NoTransaksi' ");
                
                $sql2 = mysqli_query($this->cnt,"UPDATE tbpembayarankursus SET StatusPembayaran = 'Sudah Lunas' WHERE NoTransaksi = '$NoTransaksi' ");
                
                $location1 = "../pages/pesanpaketkursusadmin.php";
                $location2 = "../pages/pesanpaketkursusadmin.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MWY617";

                (!$sql || !$sql2) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

         function tambahexpedisi(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty($_POST)) {
                    header("location:../pages/expedisi.php?notif=MLA910");
                    return false;
                }
                $sql = mysqli_query($this->cnt,"INSERT INTO tbexpedisi VALUES (null,'$NamaExpedisi','$Wilayah','$Harga','$EstimasiWaktu','$Keterangan')");

                $location1 = "../pages/expedisi.php";
                $location2 = "../pages/expedisi.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MMX795";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function editexpedisi(){
                extract($_POST);
                if (!empty($KodeExpedisi)) {
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbexpedisi WHERE KodeExpedisi = '$KodeExpedisi'");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { $x++; }
                    if ($x == 0) {
                        header("Location:../pages/dataexpedisi.php?notif=MLA910");
                        return false;
                    }
                }
                else{
                    header("Location:../pages/dataexpedisi.php?notif=MLA910");
                    return false;
                }
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty($_POST)) {
                    header("location:../pages/expedisi.php?notif=MLA910");
                    return false;
                }
                $sql = mysqli_query($this->cnt,"UPDATE tbexpedisi SET NamaExpedisi = '$NamaExpedisi',Wilayah = '$Wilayah',Harga = '$Harga',EstimasiWaktu = '$EstimasiWaktu', Keterangan = '$Keterangan' WHERE KodeExpedisi = '$KodeExpedisi' ");
                
                $location1 = "../pages/expedisi.php";
                $location2 = "../pages/expedisi.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MWY617";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        function hapusexpedisi(){
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty($KodeExpedisi)) {
                    header("location:../pages/expedisi.php?notif=MLA910");
                    return false;
                }
                $sql = mysqli_query($this->cnt,"DELETE FROM tbexpedisi WHERE KodeExpedisi = '$KodeExpedisi'");

                $location1 = "../pages/expedisi.php";
                $location2 = "../pages/expedisi.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }

        // artikel



        function tambahartikel()
        {

            if (isset($_POST['submit'])) {
                $target_dir = "../public/img/artikel/";
                $userfile_name = $_FILES['Foto']['name'];
                $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                $target_file = $target_dir . basename($_POST['JudulArtikel'].".".$userfile_extn);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                if($check !== false) {
                    echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                    $uploadOk = 1;
                } else {
                    echo "<script>console.log('File is not an image.');</script>";
                    header("Location:../pages/tambahartikel.php?notif=MKS819");
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                    header("Location:../pages/tambahartikel.php?notif=MKS819");
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                    header("Location:../pages/tambahartikel.php?notif=MKS819");
                    return false;
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

                        extract($_POST);
                        $Foto = $JudulArtikel.".".$userfile_extn;
                        $Uploader = $_COOKIE['KodeUser'];
                        $sql = mysqli_query($this->cnt,"INSERT INTO tbartikel VALUES (null,'$JudulArtikel','$Uploader','$Kategori',now(),'$IsiArtikel','$Foto')");

                        $location1 = "../pages/tambahartikel.php";
                        $location2 = "../pages/dataartikel.php";
                        $getvar1   = "?notif=MLA910";
                        $getvar2   = "?notif=MMX795";

                        (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }

        function editartikel()
        {

            if (isset($_POST['submit'])) {
                extract($_POST);
                if (!empty($KodeArtikel)) {
                    $sql = mysqli_query($this->cnt,"SELECT * FROM tbartikel WHERE KodeArtikel = '$KodeArtikel'");
                    $x = 0;
                    while ($res = mysqli_fetch_array($sql)) { $x++; }
                    if ($x == 0) {
                        header("Location:../pages/dataartikel.php?notif=MLA910");
                        return false;
                    }
                }
                else{
                    header("Location:../pages/dataartikel.php?notif=MLA910");
                    return false;
                }
                if (!empty($_FILES['Foto']['name'])) {
                    $target_dir = "../public/img/artikel/";
                    $userfile_name = $_FILES['Foto']['name'];
                    $userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
                    $target_file = $target_dir . basename($_POST['JudulArtikel'].".".$userfile_extn);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "<script>console.log('File is an image - ".$check['mime'].".');</script>";
                        header("Location:../pages/dataartikel.php?notif=MLA910");
                        $uploadOk = 1;
                    } else {
                        echo "<script>console.log('File is not an image.');</script>";
                        header("Location:../pages/dataartikel.php?notif=MLA910");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "<script>console.log('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
                        header("Location:../pages/dataartikel.php?notif=MLA910");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<script>console.log('Sorry, your file was not uploaded.');</script>";
                        header("Location:../pages/dataartikel.php?notif=MKS819");
                        return false;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {

                            extract($_POST);
                            $Foto = $JudulArtikel.".".$userfile_extn;
                            $Uploader = $_COOKIE['KodeUser'];
                            $sql = mysqli_query($this->cnt,"UPDATE tbartikel SET JudulArtikel = '$JudulArtikel',Kategori = '$Kategori',IsiArtikel = '$IsiArtikel',Foto = '$Foto',Uploader = '$Uploader' WHERE KodeArtikel = '$KodeArtikel'");

                            $location1 = "../pages/dataartikel.php";
                            $location2 = "../pages/dataartikel.php";
                            $getvar1   = "?notif=MLA910";
                            $getvar2   = "?notif=MWY617";

                            (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);

                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                else{
                    extract($_POST);
                    $Uploader = $_COOKIE['KodeUser'];
                    $sql = mysqli_query($this->cnt,"UPDATE tbartikel SET JudulArtikel = '$JudulArtikel',Kategori = '$Kategori',Uploader = '$Uploader',IsiArtikel = '$IsiArtikel' WHERE KodeArtikel = '$KodeArtikel'");

                    $location1 = "../pages/dataartikel.php";
                    $location2 = "../pages/dataartikel.php";
                    $getvar1   = "?notif=MLA910";
                    $getvar2   = "?notif=MWY617";

                    (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
                }
            }
        }

        function hapusartikel()
        {
            if (isset($_POST['submit'])) {
                extract($_POST);
                if (empty($KodeArtikel)) {
                    header("location:../pages/dataartikel.php?notif=MLA910");
                    return false;
                }
                $sql = mysqli_query($this->cnt,"DELETE FROM tbartikel WHERE KodeArtikel = '$KodeArtikel'");

                $location1 = "../pages/dataartikel.php";
                $location2 = "../pages/dataartikel.php";
                $getvar1   = "?notif=MLA910";
                $getvar2   = "?notif=MGT376";

                (!$sql) ? header("Location:".$location1.$getvar1) : header("Location:".$location2.$getvar2);
            }
        }



    // Create function above me
    }

?>
