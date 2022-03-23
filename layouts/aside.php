
  <!-- Main Sidebar Container -->
  <style type="text/css">
    #sidebar-overlay{
      display: none;
    }
  </style>
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="z-index: 1999;">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="../public/img/potmefarm.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BaliGardenCenter</span>
    </a>
    <?php
      $active = [];
      $menuOpen = [];

      // No Menu
      if ($host == "dashboard") { $active[0] = "active"; }
      else if ($host == "expedisi") { $active[14] = "active";}
      // Menu Produk
      else if ($host == "dataproduk") { $active[1] = "active";$menuOpen[0] = "menu-open"; }
      else if ($host == "tambahproduk") { $active[2] = "active";$menuOpen[0] = "menu-open"; }
      else if ($host == "transaksiproduk") { $active[3] = "active";$menuOpen[0] = "menu-open"; }
      // Menu Jenis Produk
      else if ($host == "jenisproduk") { $active[4] = "active";$menuOpen[1] = "menu-open"; }
      // Menu Paket Kursus
      else if ($host == "datapaketkursus") { $active[5] = "active";$menuOpen[2] = "menu-open"; }
      else if ($host == "tambahpaketkursus") { $active[6] = "active";$menuOpen[2] = "menu-open"; }
      else if ($host == "pesanpaketkursusadmin") { $active[7] = "active";$menuOpen[2] = "menu-open"; }
      // Menu User
      else if ($host == "datapelanggan") { $active[8] = "active";$menuOpen[3] = "menu-open"; }
      else if ($host == "tambahpelanggan") { $active[10] = "active";$menuOpen[3] = "menu-open"; }
      else if ($host == "datainstruktor") { $active[9] = "active";$menuOpen[3] = "menu-open"; }
      else if ($host == "tambahinstruktor") { $active[11] = "active";$menuOpen[3] = "menu-open"; }
      else if ($host == "dataadmin") { $active[12] = "active";$menuOpen[3] = "menu-open"; }
      else if ($host == "tambahadmin") { $active[13] = "active";$menuOpen[3] = "menu-open"; }

      else if ($host == "tambahartikel") { $active[15] = "active";$menuOpen[4] = "menu-open"; }
      else if ($host == "editartikel") { $active[16] = "active";$menuOpen[4] = "menu-open"; }
      else if ($host == "dataartikel") { $active[16] = "active";$menuOpen[4] = "menu-open"; }
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../public/img/profile/<?php echo $_COOKIE['Foto'] ?>" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="dashboard.php" class="d-block"><?php echo $_COOKIE['Username'] ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

          <li class="nav-header">
            M E N U
          </li>

          <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php echo $active[0] ?>">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php echo $menuOpen[1] ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-boxes"></i>
              <p>
                Jenis Produk
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="jenisproduk.php" class="nav-link <?php echo $active[4] ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Data Jenis Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo $menuOpen[0] ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-box-open"></i>
              <p>
                Produk
                  <?php  
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' ORDER BY NoTransaksi DESC");
                    $no = 0;
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Transfer' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }

                    if ($no != 0) {
                      echo "<span class='right badge badge-info' style='margin-top:0px;margin-right:17px;float:right;'>".$no."</span>";
                    }
                  ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dataproduk.php" class="nav-link <?php echo $active[1] ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Data Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahproduk.php" class="nav-link <?php echo $active[2] ?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transaksiproduk.php" class="nav-link <?php echo $active[3] ?>">
                  <i class="fa fa-shopping-cart nav-icon"></i>
                  <p>Transaksi Produk</p>
                  <?php  
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Order' ORDER BY NoTransaksi DESC");
                    $no = 0;
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbtransaksiproduk WHERE StatusTransaksi = 'Sudah Transfer' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }

                    if ($no != 0) {
                      echo "<span class='right badge badge-info' style='margin-top:5px;'>".$no."</span>";
                    }
                  ?>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo $menuOpen[2] ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-leaf"></i>
              <p>
                Paket Kursus
                  <?php  
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbpesankursus WHERE StatusKursus = 'Sudah Order' ORDER BY NoTransaksi DESC");
                    $no = 0;
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbpesankursus WHERE StatusKursus = 'Sudah Transfer' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }

                    if ($no != 0) {
                      echo "<span class='right badge badge-info' style='margin-top:0px;margin-right:17px;float:right;'>".$no."</span>";
                    }
                  ?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="datapaketkursus.php" class="nav-link <?php echo $active[5] ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Data Paket Kursus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahpaketkursus.php" class="nav-link <?php echo $active[6] ?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Tambah Paket Kursus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pesanpaketkursusadmin.php" class="nav-link <?php echo $active[7] ?>">
                  <i class="fa fa-shopping-cart nav-icon"></i>
                  <p>Pesan Kursus</p>
                  <?php  
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbpesankursus WHERE StatusKursus = 'Sudah Order' ORDER BY NoTransaksi DESC");
                    $no = 0;
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }
                    $sql = mysqli_query($process->cnt,"SELECT NoTransaksi FROM tbpesankursus WHERE StatusKursus = 'Sudah Transfer' ORDER BY NoTransaksi DESC");
                    $sementara = "";  
                    while($res = mysqli_fetch_array($sql)){
                      if ($sementara != $res[0]) {
                        $sementara = $res[0];
                        $no++;
                      }
                    }

                    if ($no != 0) {
                      echo "<span class='right badge badge-info' style='margin-top:5px;'>".$no."</span>";
                    }
                  ?>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="expedisi.php" class="nav-link <?php echo $active[14] ?>">
              <i class="fa fa-truck nav-icon"></i>
              <p>Expedisi</p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php echo $menuOpen[4] ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Artikel
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dataartikel.php" class="nav-link <?php echo $active[16] ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Data Artikel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahartikel.php" class="nav-link <?php echo $active[15] ?>">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Tambah Artikel</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo $menuOpen[3] ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="datapelanggan.php" class="nav-link <?php echo $active[8] ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Data Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahpelanggan.php" class="nav-link <?php echo $active[10] ?>">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Tambah Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="datainstruktor.php" class="nav-link <?php echo $active[9] ?>">
                  <i class="fa fa-user-tie nav-icon"></i>
                  <p>Data Instruktor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahinstruktor.php" class="nav-link <?php echo $active[11] ?>">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Tambah Instruktor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataadmin.php" class="nav-link <?php echo $active[12] ?>">
                  <i class="fa fa-user-secret nav-icon"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahadmin.php" class="nav-link <?php echo $active[13] ?>">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Tambah Admin</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="table.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Example Header
              </p>
            </a>
          </li>
          <li class="nav-header">E X A M P L E &nbsp; T R E E &nbsp; V I E W</li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Example Tree View
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="vip_list.php" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Example Tree View Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="worker_list.php" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Example Tree View Menu</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
        <br><br><br>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>