<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/pengirimanibrahim/style/menu.css" />
  </head>
  <body>
    <?php include 'assets/totaldata.php';?>
    <?php include 'assets/navbar.php'; ?>
    <section class="container mt-3">
      <div class="row">
        <div class="col-12 dashboard-title">
          <img src="/pengirimanibrahim/img/Dashboard.png" alt="Dashboard Icon" class="dashboard-icon" />
          Dashboard
        </div>
      </div>
    </section>
    <section class="container mt-3">
      <div class="d-flex justify-content-between">
        <!-- Menggunakan flexbox untuk menyusun secara horizontal -->
        <div class="card-outer1">
          <!-- Kolom untuk card pertama -->
          <div class="card-inner">
            <div class="row align-items-center">
              <div class="col-3 icon-rectangle1">
                <img src="/pengirimanibrahim/img/Delivery.png" alt="Icon" class="icon-menu1" />
              </div>
              <div class="col-6">
                <div class="data-text-tittle1">
                  Data <br />
                  Pengiriman
                </div>
                <!-- Data Pengiriman -->
                <div class="data-text1"><?php echo $data_pengiriman['total_pengiriman']; ?></div>
              </div>
            </div>
            <div class="row button-container1">
              <div class="col-12 d-flex justify-content-center">
              <button class="button button-view-details1">
                <a href="/pengirimanibrahim/Pengiriman/pengirimanlihat1.php" class="view-details-link1">
                  <span class="view-details-text1">View Details</span>
                  <img src="/pengirimanibrahim/img/View More-1.png" alt="Icon" class="icon-view-more1" />
                </a>
              </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-outer2">
          <!-- Kolom untuk card kedua -->
          <div class="card-inner">
            <div class="row align-items-center">
              <div class="col-3 icon-rectangle2">
                <img src="/pengirimanibrahim/img/Person-1.png" alt="Icon" class="icon-menu2" />
              </div>
              <div class="col-6">
                <div class="data-text-tittle2">
                  Data Diri <br />
                  Pengirim
                </div>
                <!-- Data Diri Pengirim -->
                <div class="data-text2"><?php echo $data_pengirim['total_pengirim']; ?></div>
              </div>
            </div>
            <div class="row button-container2">
              <div class="col-12 d-flex justify-content-center">
              <button class="button button-view-details2">
                <a href="/pengirimanibrahim/DataDiriPengirim/datadiripengirimlihat1.php" class="view-details-link2">
                  <span class="view-details-text7">View Details</span>
                  <img src="/pengirimanibrahim/img/View More-1.png" alt="Icon" class="icon-view-more2" />
                </a>
              </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-outer3">
          <!-- Kolom untuk card ketiga -->
          <div class="card-inner">
            <div class="row align-items-center">
              <div class="col-3 icon-rectangle3">
                <img src="/pengirimanibrahim/img/Person-1.png" alt="Icon" class="icon-menu3" />
              </div>
              <div class="col-6">
                <div class="data-text-tittle7">Data Diri Penerima</div>
                <!-- Data Diri Penerima -->
                <div class="data-text3"><?php echo $data_penerima['total_penerima']; ?></div>
              </div>
            </div>
            <div class="row button-container3">
              <div class="col-12 d-flex justify-content-center">
              <button class="button button-view-details3">
                <a href="/pengirimanibrahim/DataDiriPenerima/datadiripenerimalihat1.php" class="view-details-link3">
                  <span class="view-details-text3">View Details</span>
                  <img src="/pengirimanibrahim/img/View More-1.png" alt="Icon" class="icon-view-more3" />
                </a>
              </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container mt-4">
      <div class="d-flex justify-content-between">
        <!-- Menggunakan flexbox untuk menyusun secara horizontal -->
        <div class="card-outer4 mt-4">
          <!-- Kolom untuk card keempat -->
          <div class="card-inner">
            <div class="row align-items-center">
              <div class="col-3 icon-rectangle4">
                <img src="/pengirimanibrahim/img/Successful Delivery.png" alt="Icon" class="icon-menu4" />
              </div>
              <div class="col-6">
                <div class="data-text-tittle7">Data Jenis Kiriman</div>
                <!-- Data Jenis Kiriman -->
              <div class="data-text4"><?php echo $data_jenis_kiriman['total_jenis_kiriman']; ?></div>
              </div>
            </div>
            <div class="row button-container4">
              <div class="col-12 d-flex justify-content-center">
              <button class="button button-view-details4">
                  <a href="/pengirimanibrahim/JenisKiriman/jeniskirimanlihat1.php" class="view-details-link4">
                    <span class="view-details-text4">View Details</span>
                    <img src="/pengirimanibrahim/img/View More-1.png" alt="Icon" class="icon-view-more4" />
                  </a>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-outer5 mt-4">
          <!-- Kolom untuk card kelima -->
          <div class="card-inner">
            <div class="row align-items-center">
              <div class="col-3 icon-rectangle5">
                <img src="/pengirimanibrahim/img/City Buildings-1.png" alt="Icon" class="icon-menu5" />
              </div>
              <div class="col-6">
                <div class="data-text-tittle7">Data Kabupaten/Kota</div>
                <!-- Data Kabupaten/Kota -->
                <div class="data-text5"><?php echo $data_kabupaten['total_kabupaten']; ?></div>
              </div>
            </div>
            <div class="row button-container5">
              <div class="col-12 d-flex justify-content-center">
              <button class="button button-view-details5">
                  <a href="/pengirimanibrahim/Kabupaten/kabupatenlihat1.php" class="view-details-link5">
                    <span class="view-details-text5">View Details</span>
                    <img src="/pengirimanibrahim/img/View More-1.png" alt="Icon" class="icon-view-more5" />
                  </a>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-outer6 mt-4">
          <!-- Kolom untuk card keenam -->
          <div class="card-inner">
            <div class="row align-items-center">
              <div class="col-3 icon-rectangle6"><img src="/pengirimanibrahim/img/Downtown.png" alt="Icon" class="icon-menu6" /></div>
              <div class="col-6">
                <div class="data-text-tittle7">Data <br />Kecamatan</div>
                <!-- Data Kecamatan -->
                <div class="data-text6"><?php echo $data_kecamatan['total_kecamatan']; ?></div>
              </div>
            </div>
            <div class="row button-container6">
              <div class="col-12 d-flex justify-content-center">
              <button class="button button-view-details6">
                  <a href="/pengirimanibrahim/Kecamatan/kecamatanlihat1.php" class="view-details-link6">
                    <span class="view-details-text6">View Details</span>
                    <img src="/pengirimanibrahim/img/View More-1.png" alt="Icon" class="icon-view-more6" />
                  </a>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container mt-4">
      <div class="d-flex justify-content-between">
        <!-- Menggunakan flexbox untuk menyusun secara horizontal -->
        <div class="card-outer7 mt-4">
          <!-- Kolom untuk card ketujuh -->
          <div class="card-inner">
            <div class="row align-items-center">
              <div class="col-3 icon-rectangle7">
                <img src="/pengirimanibrahim/img/City Buildings(2).png" alt="Icon" class="icon-menu7" />
              </div>
              <div class="col-6">
                <div class="data-text-tittle7">Data Kelurahan</div>
                <!-- Data Kelurahan -->
              <div class="data-text7"><?php echo $data_kelurahan['total_kelurahan']; ?></div>
              </div>
            </div>
            <div class="row button-container7">
              <div class="col-12 d-flex justify-content-center">
              <button class="button button-view-details7">
                <a href="/pengirimanibrahim/Kelurahan/kelurahanlihat1.php" class="view-details-link7">
                  <span class="view-details-text7">View Details</span>
                    <img src="/pengirimanibrahim/img/View More-1.png" alt="Icon" class="icon-view-more7" />
                </a>
               </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer" style="background-color: #e7e7e7; margin-top: 53px; padding: 20px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center" style="font-size: 20px; color: #000; font-weight: 400;">
                    <span>© 2024</span>
                    <a href="https://www.heronaexpress.co.id/lokasi.php#" class="text-link" style="color: red;" target="_blank">Herona Express</a>
                    <span>Copyright Reserved.</span>
                </p>
            </div>
        </div>
    </div>
</footer> 
    <!-- Bootstrap Bundle with Popper !-->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
