<?php
include '../config.php';
ob_start();

// Fetch the data to be edited
if (isset($_GET['No_Pengiriman'])) {
    $No_Pengiriman = $_GET['No_Pengiriman'];
    $query = mysqli_query($db, "SELECT * FROM pengiriman WHERE No_Pengiriman = '$No_Pengiriman'");
    $data = mysqli_fetch_array($query);
} else {
    // Redirect if no No_Pengiriman is set
    header("Location: pengirimanlihat1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Pengiriman</title>
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
    <h3>Pengiriman</h3>
    <form action="" method="post" class="bg-light p-4 rounded shadow-sm">
        <h4 class="text-center text-secondary mb-3">FORM UBAH Pengiriman</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="No_Pengiriman" class="form-label">No Pengiriman</label>
                <input type="text" class="form-control" name="No_Pengiriman" value="<?php echo $data['No_Pengiriman'];?>" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Kd_Pengirim" class="form-label">Nama Pengirim</label>
                <select name="Kd_Pengirim" class="form-select">
                    <?php
                    $query_pengirim = mysqli_query($db, "SELECT * FROM DataDiriPengirim");
                    while ($pengirim = mysqli_fetch_array($query_pengirim)) {
                        $selected = ($data['Kd_Pengirim'] == $pengirim['Kd_Pengirim']) ? 'selected' : '';
                        echo "<option value='{$pengirim['Kd_Pengirim']}' $selected>{$pengirim['Nama_Pengirim']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Tgl_Berangkat" class="form-label">Tanggal Berangkat</label>
                <input type="date" class="form-control" name="Tgl_Berangkat" value="<?php echo $data['Tgl_Berangkat'];?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Kd_Penerima" class="form-label">Nama Penerima</label>
                <select name="Kd_Penerima" class="form-select">
                    <?php
                    $query_penerima = mysqli_query($db, "SELECT * FROM DataDiriPenerima");
                    while ($penerima = mysqli_fetch_array($query_penerima)) {
                        $selected = ($data['Kd_Penerima'] == $penerima['Kd_Penerima']) ? 'selected' : '';
                        echo "<option value='{$penerima['Kd_Penerima']}' $selected>{$penerima['Nama_Penerima']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Tgl_Diterima" class="form-label">Tanggal Diterima</label>
                <input type="date" class="form-control" name="Tgl_Diterima" value="<?php echo $data['Tgl_Diterima'];?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Kemasan" class="form-label">Kemasan</label>
                <input type="text" class="form-control" name="Kemasan" value="<?php echo $data['Kemasan'];?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="Keterangan" rows="5"><?php echo $data['Keterangan']; ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Lain_lain" class="form-label">Lain-lain</label>
                <input type="text" class="form-control" name="Lain_lain" value="<?php echo $data['Lain_lain'];?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Penjemputan" class="form-label">Penjemputan</label>
                <input type="text" class="form-control" name="Penjemputan" value="<?php echo $data['Penjemputan'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Operan" class="form-label">Operan</label>
                <input type="text" class="form-control" name="Operan" value="<?php echo $data['Operan'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Diskon" class="form-label">Diskon</label>
                <input type="text" class="form-control" id="Diskon" name="Diskon" value="<?php echo $data['Diskon'];?>" oninput="updateTerbilang()">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Penerusan" class="form-label">Penerusan</label>
                <input type="text" class="form-control" name="Penerusan" value="<?php echo $data['Penerusan'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="Service" class="form-label">Service</label>
                <select name="Service" class="form-select">
                    <option value="STS" <?php echo ($data['Service'] == 'STS') ? 'selected' : ''; ?>>STS</option>
                    <option value="NOSTS" <?php echo ($data['Service'] == 'NOSTS') ? 'selected' : ''; ?>>NOSTS</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Isi_Diperiksa" class="form-label">Isi Diperiksa</label>
                <select name="Isi_Diperiksa" class="form-select">
                    <option value="YA" <?php echo ($data['Isi_Diperiksa'] == 'YA') ? 'selected' : ''; ?>>YA</option>
                    <option value="TIDAK" <?php echo ($data['Isi_Diperiksa'] == 'TIDAK') ? 'selected' : ''; ?>>TIDAK</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" name="proses" class="btn btn-primary">Ubah Pengiriman</button>
            <a href="pengirimanlihat1.php" class="btn btn-secondary">Kembali</a>
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
<script>
  function convertToWords(num) {
    const angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
    let Terbilang = "";
    if (num < 12) {
        Terbilang = angka[num];
    } else if (num < 20) {
        Terbilang = angka[num - 10] + " Belas";
    } else if (num < 100) {
        Terbilang = angka[Math.floor(num / 10)] + " Puluh " + angka[num % 10];
    } else if (num < 200) {
        Terbilang = "Seratus " + convertToWords(num - 100);
    } else if (num < 1000) {
        Terbilang = angka[Math.floor(num / 100)] + " Ratus " + convertToWords(num % 100);
    } else if (num < 2000) {
        Terbilang = "Seribu " + convertToWords(num - 1000);
    } else if (num < 1000000) {
        Terbilang = convertToWords(Math.floor(num / 1000)) + " Ribu " + convertToWords(num % 1000);
    } else if (num < 1000000000) {
        Terbilang = convertToWords(Math.floor(num / 1000000)) + " Juta " + convertToWords(num % 1000000);
    }
    return Terbilang;
}

function updateTerbilang() {
    const diskon = parseFloat(document.getElementById('Diskon').value) || 0;
    const ongkosKirim = parseFloat(document.getElementById('Ongkos_Kirim').value) || 0;
    
    document.getElementById('Sub_Total').value = ongkosKirim;

    const total = ongkosKirim * (1 - diskon / 100);
    document.getElementById('Terbilang').value = convertToWords(total) + " Rupiah";
}
</script>
</body>
</html>

<?php
if (isset($_POST['proses'])) {
    $Kemasan = $_POST['Kemasan'];
    $Diskon = $_POST['Diskon'];
    $Sub_Total = $_POST['Sub_Total'];
    $Ongkos_Kirim = $_POST['Ongkos_Kirim'];
    $Keterangan = $_POST['Keterangan'];
    $Lain_lain = $_POST['Lain_lain'];
    $Penjemputan = $_POST['Penjemputan'];
    $Terbilang = $_POST['Terbilang'];
    $Operan = $_POST['Operan'];
    $Tgl_Berangkat = $_POST['Tgl_Berangkat'];
    $Penerusan = $_POST['Penerusan'];
    $Tgl_Diterima = $_POST['Tgl_Diterima'];
    $Kd_Pengirim = $_POST['Kd_Pengirim'];
    $Kd_Penerima = $_POST['Kd_Penerima'];
    $Service = $_POST['Service'];
    $Isi_Diperiksa = $_POST['Isi_Diperiksa'];

    mysqli_query($db, "UPDATE pengiriman SET 
        Kemasan='$Kemasan', 
        Diskon='$Diskon', 
        Sub_Total='$Sub_Total', 
        Ongkos_Kirim='$Ongkos_Kirim', 
        Keterangan='$Keterangan', 
        Lain_lain='$Lain_lain', 
        Penjemputan='$Penjemputan', 
        Terbilang='$Terbilang', 
        Operan='$Operan', 
        Tgl_Berangkat='$Tgl_Berangkat', 
        Penerusan='$Penerusan', 
        Tgl_Diterima='$Tgl_Diterima', 
        Kd_Pengirim='$Kd_Pengirim', 
        Kd_Penerima='$Kd_Penerima', 
        Service='$Service',
        Isi_Diperiksa='$Isi_Diperiksa' 
        WHERE No_Pengiriman='$No_Pengiriman'");
    
    header("Location: pengirimanlihat1.php");
    exit();
    ob_end_flush();
}
?>
