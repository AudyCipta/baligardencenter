<?php
    include"process.php";
    $process = new start();
    $action = $_GET['action'];
    
    if ($action=="login") {
        $process->login();
    }
    else if ($action=="logout") {
        $process->logout();
    }
    else if ($action=="tambahjenisproduk") {
        $process->tambahjenisproduk();
    }
    else if ($action=="editjenisproduk") {
        $process->editjenisproduk();
    }
    else if ($action=="hapusjenisproduk") {
        $process->hapusjenisproduk();
    }
    else if ($action=="tambahproduk") {
        $process->tambahproduk();
    }
    else if ($action=="editproduk") {
        $process->editproduk();
    }
    else if ($action=="hapusproduk") {
        $process->hapusproduk();
    }
    else if ($action=="tambahpelanggan") {
        $process->tambahpelanggan();
    }
    else if ($action=="editpelanggan") {
        $process->editpelanggan();
    }
    else if ($action=="hapuspelanggan") {
        $process->hapuspelanggan();
    }
    else if ($action=="tambahinstruktor") {
        $process->tambahinstruktor();
    }
    else if ($action=="editinstruktor") {
        $process->editinstruktor();
    }
    else if ($action=="hapusinstruktor") {
        $process->hapusinstruktor();
    }
    else if ($action=="changeStatusUser") {
        $process->changeStatusUser();
    }
    else if ($action=="tambahpaketkursus") {
        $process->tambahpaketkursus();
    }
    else if ($action=="editpaketkursus") {
        $process->editpaketkursus();
    }
    else if ($action=="hapuspaketkursus") {
        $process->hapuspaketkursus();
    }
    else if ($action=="gantipassworduser") {
        $process->gantipassworduser();
    }
    else if ($action=="tambahtransaksiproduk") {
        $process->tambahtransaksiproduk();
    }
    else if ($action=="hapustransaksiproduk") {
        $process->hapustransaksiproduk();
    }
    else if ($action=="checkouttransaksiproduk") {
        $process->checkouttransaksiproduk();
    }
    else if ($action=="terimatransaksiproduk") {
        $process->terimatransaksiproduk();
    }
    else if ($action=="hapustransaksiproduk2") {
        $process->hapustransaksiproduk2();
    }
    else if ($action=="tambahpembayaran") {
        $process->tambahpembayaran();
    }
    else if ($action=="terimapembayaran") {
        $process->terimapembayaran();
    }
    else if ($action=="hapuspembayaran") {
        $process->hapuspembayaran();
    }
    else if ($action=="register") {
        $process->register();
    }
    else if ($action=="edituser") {
        $process->edituser();
    }
    else if ($action=="tambahadmin") {
        $process->tambahadmin();
    }
    else if ($action=="editadmin") {
        $process->editadmin();
    }
    else if ($action=="hapusadmin") {
        $process->hapusadmin();
    }
    else if ($action=="pesanpaketkursus") {
        $process->pesanpaketkursus();
    }
    else if ($action=="tambahpembayarankursus") {
        $process->tambahpembayarankursus();
    }
    else if ($action=="terimapembayarankursus") {
        $process->terimapembayarankursus();
    }
    else if ($action=="hapuspesankursus2") {
        $process->hapuspesankursus2();
    }
    else if ($action=="hapuspesankursus") {
        $process->hapuspesankursus();
    }
    else if ($action=="tambahexpedisi") {
        $process->tambahexpedisi();
    }
    else if ($action=="editexpedisi") {
        $process->editexpedisi();
    }
    else if ($action=="hapusexpedisi") {
        $process->hapusexpedisi();
    }
    else if ($action=="tambahartikel") {
        $process->tambahartikel();
    }
    else if ($action=="editartikel") {
        $process->editartikel();
    }
    else if ($action=="hapusartikel") {
        $process->hapusartikel();
    }
?>
