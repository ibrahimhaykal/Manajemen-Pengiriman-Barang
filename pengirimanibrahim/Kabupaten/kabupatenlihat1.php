<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lihat Menu Kabupaten/Kota</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
  </head>
<body>
<?php include '../config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/pengirimanibrahim/assets/navbar.php'; ?>
    <section class="container mt-5">
        <h2 class="mb-4">Data Kabupaten/Kota</h2>
        <div class="d-flex justify-content-between align-items-center">
        <button type="button" class="btn mb-3" style="color: #FFFFFF; background-color: #002480;" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah<img src="/pengirimanibrahim/img/add.png" width="20" height="20" style="margin-left: 10px;" ></img></button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Kode Kabupaten</th>
                <th scope="col">Nama Kabupaten</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
// Query to fetch data from the database for Kabupaten/Kota
$query = "SELECT * FROM kabupatenkota";

$result = mysqli_query($db, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($db));
}

// Displaying data in the table
while ($data = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $data['Kd_Kabupaten']; ?></td>
        <td><?php echo $data['Nama_Kabupaten']; ?></td>
        <td>
            <div class="action-buttons" style="display: flex; gap: 5px;">
                <a class="btn btn-success btn-sm" href="kabupatenubah.php?Kd_Kabupaten=<?php echo $data['Kd_Kabupaten'];?>" >Edit</a>
                <a class="btn btn-danger btn-sm" href="kabupatenhapus.php?Kd_Kabupaten=<?php echo $data['Kd_Kabupaten']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>		
            </div>
        </td>
    </tr>
    <?php
}
?>
   <!-- Modal Tambah -->
 <?php include 'kabupatentambah1.php'; ?>
            </tbody>
          </table>
        </div>
      </section>            
    <!-- Bootstrap Bundle with Popper !-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
