<?php
include '../config.php';
ob_start();

// Fetch the data to be edited
if (isset($_GET['Kd_Kabupaten'])) {
    $Kd_Kabupaten = $_GET['Kd_Kabupaten'];
    $query = mysqli_query($db, "SELECT * FROM kabupatenkota WHERE Kd_Kabupaten = '$Kd_Kabupaten'");
    $data = mysqli_fetch_array($query);
} else {
    // Redirect if no Kd_Kabupaten is set
    header("Location: kabupatenlihat1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kabupaten/Kota</title>
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
    <h3>Ubah Kabupaten/Kota</h3>
    <div class="form-container">
        <form action="" method="post">
            <h4 class="text-center text-secondary mb-3">FORM UBAH KABUPATEN/KOTA</h4>
            <div class="mb-3">
                <label for="Kd_Kabupaten" class="form-label">Kode Kabupaten</label>
                <input type="text" class="form-control" name="Kd_Kabupaten" id="Kd_Kabupaten" value="<?php echo $data['Kd_Kabupaten']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="Nama_Kabupaten" class="form-label">Nama Kabupaten</label>
                <input type="text" class="form-control" name="Nama_Kabupaten" id="Nama_Kabupaten" value="<?php echo $data['Nama_Kabupaten']; ?>">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="proses" class="btn btn-success">Ubah Kabupaten/Kota</button>
                <a href="kabupatenlihat1.php" class="btn btn-danger">Batal</a>
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
    $Kd_Kabupaten = $_POST['Kd_Kabupaten'];
    $Nama_Kabupaten = $_POST['Nama_Kabupaten'];

    mysqli_query($db, "UPDATE kabupatenkota SET Nama_Kabupaten='$Nama_Kabupaten' WHERE Kd_Kabupaten='$Kd_Kabupaten'");
    header("Location: kabupatenlihat1.php");
    exit();
    ob_end_flush();
}
?>
