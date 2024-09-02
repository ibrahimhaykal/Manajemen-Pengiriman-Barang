<?php
// Mendapatkan nama file dari URL saat ini
$current_page = basename($_SERVER['PHP_SELF']);

// Kemudian, Anda bisa menambahkan kelas 'active' pada item menu sesuai dengan halaman yang sedang dibuka
?>
<link rel="stylesheet" href="/pengirimanibrahim/style/navbar.css" />
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/pengirimanibrahim/img/logo.png.png" alt="Logo" class="logo-img d-inline-block align-top" />
    </a>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link <?php if($current_page == 'index.php') echo 'active'; ?>" href="/pengirimanibrahim/index.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php if($current_page != 'index.php') echo 'active'; ?>" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Transaksi </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/pengirimanibrahim/DataDiriPengirim/datadiripengirimlihat1.php">Data Diri Pengirim</a></li>
            <li><a class="dropdown-item" href="/pengirimanibrahim/DataDiriPenerima/datadiripenerimalihat1.php">Data Diri Penerima</a></li>
            <li><a class="dropdown-item" href="/pengirimanibrahim/JenisKiriman/jeniskirimanlihat1.php">Jenis Kiriman</a></li>
            <li><a class="dropdown-item" href="/pengirimanibrahim/Kabupaten/kabupatenlihat1.php">Kabupaten/Kota</a></li>
            <li><a class="dropdown-item" href="/pengirimanibrahim/Kecamatan/kecamatanlihat1.php">Kecamatan</a></li>
            <li><a class="dropdown-item" href="/pengirimanibrahim/Kelurahan/kelurahanlihat1.php">Kelurahan</a></li>
            <li><a class="dropdown-item" href="/pengirimanibrahim/Pengiriman/pengirimanlihat1.php">Pengiriman</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pengirimanibrahim/login.php">Logout</a>
          <img src="/pengirimanibrahim/img/Logout.png" alt="Logout Icon" class="logout-icon" />
        </li>
      </ul>
    </div>
    <div class="navbar-text" style="margin-left: auto">
      <span style="margin-right: 30px">Hi! Haykal</span>
      <img src="/pengirimanibrahim/img/Ellipse 1.png" alt="Profile" width="40" height="40" class="rounded-circle" />
    </div>
  </div>
</nav>
