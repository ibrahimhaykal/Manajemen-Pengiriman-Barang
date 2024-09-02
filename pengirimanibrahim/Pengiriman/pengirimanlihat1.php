<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lihat Menu Pengiriman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
  </head>
<body>
  <?php include '../config.php'; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/pengirimanibrahim/assets/navbar.php'; ?>

    <section class="container mt-5">
        <h2 class="mb-4">Data Pengiriman</h2>
        <div class="d-flex justify-content-between align-items-center">
          <button type="button" class="btn mb-3" style="color: #FFFFFF; background-color: #002480;" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah<img src="/pengirimanibrahim/img/add.png" width="20" height="20" style="margin-left: 10px;"></button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No. Pengiriman</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Penerima</th>
                <th scope="col">Tanggal Berangkat</th>
                <th scope="col">Tanggal Diterima</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
            //  SQL query
            $query = "SELECT p.No_Pengiriman, 
                             dp.Nama_Pengirim, 
                             da.Nama_Penerima, 
                             p.Tgl_Berangkat, 
                             p.Tgl_Diterima  
                      FROM Pengiriman p, 
                           DataDiriPengirim dp, 
                           DataDiriPenerima da 
                      WHERE p.Kd_Pengirim = dp.Kd_Pengirim 
                        AND p.Kd_Penerima = da.Kd_Penerima";

            $result = mysqli_query($db, $query);

            if (!$result) {
                die("Query Error: " . mysqli_error($db));
            }

            // Displaying data in the table
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $data['No_Pengiriman']; ?></td>
                    <td><?php echo $data['Nama_Pengirim']; ?></td>
                    <td><?php echo $data['Nama_Penerima']; ?></td>
                    <td><?php echo $data['Tgl_Berangkat']; ?></td>
                    <td><?php echo $data['Tgl_Diterima']; ?></td>
                    <td>
                    <div class="action-buttons" style="display: flex; gap: 5px;">
                    <a class="btn btn-success btn-sm" href="pengirimanubah1.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Edit</a>
                    <form action="pengirimanhapus.php" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
    <input type="hidden" name="No_Pengiriman" value="<?php echo $data['No_Pengiriman']; ?>">
    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>


                    <a class="btn btn-info btn-sm"  href="pengirimandetail.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Detail</a>
                    <a class="btn btn-primary btn-sm"  href="pengirimancetak.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Cetak</a>
                </div>
            </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
          </table>
        </div>
        <!-- Modal Tambah -->
        <?php include 'pengirimantambah1.php'; ?>
      </section>
      <footer class="footer" style="background-color: #e7e7e7; margin-top: 130px; padding: 20px 0;">
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
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
