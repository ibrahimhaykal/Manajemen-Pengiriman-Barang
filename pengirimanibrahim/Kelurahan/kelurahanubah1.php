<?php
include '../config.php';
ob_start();
// Fetch the data to be edited
if (isset($_GET['Kd_Kelurahan'])) {
    $Kd_Kelurahan = $_GET['Kd_Kelurahan'];
    $query = mysqli_query($db, "SELECT * FROM kelurahan WHERE Kd_Kelurahan = '$Kd_Kelurahan'");
    $data = mysqli_fetch_array($query);
} else {
    // Redirect if no Kd_Kelurahan is set
    header("Location: kelurahanlihat1.php");
    exit(); // Tambahkan exit di sini
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kelurahan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
    <h3>Ubah Kelurahan</h3>
    <div class="form-container">
        <form action="" method="post">
            <h4 class="text-center text-secondary mb-3">FORM UBAH KELURAHAN</h4>
            <div class="mb-3">
                <label for="Kd_Kelurahan" class="form-label">Kode Kelurahan</label>
                <input type="text" class="form-control" name="Kd_Kelurahan" id="Kd_Kelurahan" value="<?php echo $data['Kd_Kelurahan']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="Nama_Kelurahan" class="form-label">Nama Kelurahan</label>
                <input type="text" class="form-control" name="Nama_Kelurahan" id="Nama_Kelurahan" value="<?php echo $data['Nama_Kelurahan']; ?>">
            </div>
            <div class="mb-3">
                <label for="Kd_Kecamatan" class="form-label">Nama Kecamatan</label>
                <select name="Kd_Kecamatan" id="Kd_Kecamatan" class="form-control">
                    <?php
                    $ambilkecamatan = mysqli_query($db, "SELECT * FROM kecamatan");
                    while ($kecamatan = mysqli_fetch_array($ambilkecamatan)) {
                        $selected = ($data['Kd_Kecamatan'] == $kecamatan['Kd_Kecamatan']) ? 'selected' : '';
                        echo "<option value='{$kecamatan['Kd_Kecamatan']}' $selected>{$kecamatan['Nama_Kecamatan']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <button type="submit" name="proses" class="btn btn-success">Ubah Kelurahan</button>
                <a href="kelurahanlihat1.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
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
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
if (isset($_POST['proses'])) {
    $Nama_Kelurahan = $_POST['Nama_Kelurahan'];
    $Kd_Kecamatan = $_POST['Kd_Kecamatan'];

    mysqli_query($db, "UPDATE kelurahan SET 
        Nama_Kelurahan='$Nama_Kelurahan', 
        Kd_Kecamatan='$Kd_Kecamatan' 
        WHERE Kd_Kelurahan='$Kd_Kelurahan'");
    
    header("Location: kelurahanlihat1.php");
    exit(); // Tambahkan exit di sini
    ob_end_flush();
}
?>
