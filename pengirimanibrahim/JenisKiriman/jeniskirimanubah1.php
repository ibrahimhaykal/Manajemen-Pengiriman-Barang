<?php
include '../config.php';
ob_start();

// Fetch the data to be edited
if (isset($_GET['ID_JenisPengiriman'])) {
    $ID_JenisPengiriman = $_GET['ID_JenisPengiriman'];
    $query = mysqli_query($db, "SELECT * FROM jeniskiriman WHERE ID_JenisPengiriman = '$ID_JenisPengiriman'");
    $data = mysqli_fetch_array($query);
} else {
    // Redirect if no ID_JenisPengiriman is set
    header("Location: jeniskirimanlihat1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Jenis Kiriman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
    <style>
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #f1f1f1;
        margin: 0;
    }

    h3 {
        color: #333;
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        max-width: 1000px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
    }

    .form-label {
        font-size: 16px;
        font-weight: bold;
    }

    .form-control {
        font-size: 14px;
        padding: 10px;
        border-radius: 5px;
    }

    .btn {
        font-size: 14px;
        padding: 8px 20px;
        border-radius: 5px;
    }
</style>
</head>
<body>
<?php include '../config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/pengirimanibrahim/assets/navbar.php'; ?>

<section class="container mt-5">
    <h3>Ubah Jenis Kiriman</h3>
    <form action="" method="post" class="bg-light p-4 rounded shadow-sm">
        <h4 class="text-center text-secondary mb-3">FORM UBAH JENIS KIRIMAN</h4>
        <div class="mb-3">
            <label for="id_jenis_pengiriman" class="form-label">ID Jenis Kiriman</label>
            <input type="text" class="form-control" name="ID_JenisPengiriman" id="id_jenis_pengiriman" value="<?php echo $data['ID_JenisPengiriman']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="keterangan_isi_pengiriman" class="form-label">Keterangan Isi Kiriman</label>
            <textarea class="form-control" name="KeteranganIsiPengiriman" id="keterangan_isi_pengiriman"><?php echo $data['KeteranganIsiPengiriman']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="Harga_Kg" class="form-label">Harga/Kg</label>
            <input type="number" step="0.01" class="form-control" name="Harga_Kg" id="Harga_Kg" value="<?php echo $data['Harga_Kg']; ?>">
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" name="proses" class="btn btn-success">Ubah</button>
            <a href="jeniskirimanlihat1.php" class="btn btn-danger">Batal</a>
        </div>
    </form>
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

<?php
if (isset($_POST['proses'])) {
    $ID_JenisPengiriman = $_POST['ID_JenisPengiriman'];
    $KeteranganIsiPengiriman = $_POST['KeteranganIsiPengiriman'];
    $Harga_Kg = $_POST['Harga_Kg'];

    mysqli_query($db, "UPDATE jeniskiriman SET KeteranganIsiPengiriman='$KeteranganIsiPengiriman', Harga_Kg='$Harga_Kg' WHERE ID_JenisPengiriman='$ID_JenisPengiriman'");
    header("Location: jeniskirimanlihat1.php");
    exit();
    ob_end_flush();
}
?>
