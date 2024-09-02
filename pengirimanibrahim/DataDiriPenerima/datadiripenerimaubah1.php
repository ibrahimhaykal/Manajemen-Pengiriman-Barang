<?php
include '../config.php';
ob_start();

// Fetch the data to be edited
if (isset($_GET['Kd_Penerima'])) {
    $Kd_Penerima = $_GET['Kd_Penerima'];
    $query = mysqli_query($db, "SELECT * FROM datadiripenerima WHERE Kd_Penerima = '$Kd_Penerima'");
    $data = mysqli_fetch_array($query);
} else {
    // Redirect if no Kd_Penerima is set
    header("Location: datadiripenerimalihat.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Diri Penerima</title>
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
    <h3>Ubah Data Diri Penerima</h3>
    <div class="form-container">
        <form action="" method="post">
            <h4 class="text-center text-secondary mb-3">FORM UBAH Data Diri Penerima</h4>
            <div class="row mb-3">
                <div class="col">
                    <label for="Kd_Penerima" class="form-label">Kode Penerima</label>
                    <input type="text" class="form-control" name="Kd_Penerima" id="Kd_Penerima" value="<?php echo $data['Kd_Penerima']; ?>" readonly>
                </div>
                <div class="col">
                    <label for="Nama_Penerima" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" name="Nama_Penerima" id="Nama_Penerima" value="<?php echo $data['Nama_Penerima']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Alamat_Penerima" class="form-label">Alamat Penerima</label>
                    <textarea class="form-control" name="Alamat_Penerima" id="Alamat_Penerima" rows="4"><?php echo $data['Alamat_Penerima']; ?></textarea>
                </div>
                <div class="col">
                    <label for="No_Telp_Penerima" class="form-label">No. Telp Penerima</label>
                    <input type="text" class="form-control" name="No_Telp_Penerima" id="No_Telp_Penerima" value="<?php echo $data['No_Telp_Penerima']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="Kd_Kelurahan" class="form-label">Nama Kelurahan</label>
                    <select name="Kd_Kelurahan" id="Kd_Kelurahan" class="form-control">
                        <?php
                        $ambilkelurahan = mysqli_query($db, "SELECT * FROM kelurahan");
                        while ($kelurahan = mysqli_fetch_array($ambilkelurahan)) {
                            $selected = ($data['Kd_Kelurahan'] == $kelurahan['Kd_Kelurahan']) ? 'selected' : '';
                            echo "<option value='{$kelurahan['Kd_Kelurahan']}' $selected>{$kelurahan['Nama_Kelurahan']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="proses" class="btn btn-success">Ubah Data Diri Penerima</button>
                <a href="datadiripenerimalihat1.php" class="btn btn-danger">Batal</a>
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
    $Kd_Penerima = $_POST['Kd_Penerima'];
    $Nama_Penerima = $_POST['Nama_Penerima'];
    $Alamat_Penerima = $_POST['Alamat_Penerima'];
    $No_Telp_Penerima = $_POST['No_Telp_Penerima'];
    $Kd_Kelurahan = $_POST['Kd_Kelurahan'];

    mysqli_query($db, "UPDATE datadiripenerima SET 
        Nama_Penerima='$Nama_Penerima', 
        Alamat_Penerima='$Alamat_Penerima', 
        No_Telp_Penerima='$No_Telp_Penerima', 
        Kd_Kelurahan='$Kd_Kelurahan' 
        WHERE Kd_Penerima='$Kd_Penerima'");
    
    header("Location: datadiripenerimalihat1.php");
    exit();
    ob_end_flush();
}
?>
