<?php
include '../config.php';

$No_Pengiriman = $_GET['No_Pengiriman'];

// Check if the request is an AJAX call to update "Terbilang"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_terbilang'])) {
    $No_Pengiriman = $_POST['No_Pengiriman'];
    $Terbilang = $_POST['Terbilang'];

    $updateQuery = "UPDATE pengiriman SET Terbilang = '$Terbilang' WHERE No_Pengiriman = '$No_Pengiriman'";
    if (mysqli_query($db, $updateQuery)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($db);
    }
    exit;
}

// Fetch the main faktur details
$query = mysqli_query($db, "SELECT * FROM pengiriman n, datadiripengirim p, datadiripenerima d WHERE n.Kd_Pengirim = p.Kd_Pengirim AND n.Kd_Penerima = d.Kd_Penerima AND No_Pengiriman = '$No_Pengiriman'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Faktur</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/pengirimanibrahim/assets/navbar.php'; ?>
<div class="container mt-5">
    <h3 class="text-center mb-4">Pengiriman Detail</h3>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">DETAIL: <?php echo $data['No_Pengiriman']; ?></h4>
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-secondary me-2" href="pengirimanlihat1.php">Kembali</a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>No Pengiriman</td>
                            <td><?php echo $data['No_Pengiriman']; ?></td>
                        </tr>
                        <tr>
                            <td>Kemasan</td>
                            <td><?php echo $data['Kemasan']; ?></td>
                        </tr>
                        <tr>
                            <td>Diskon</td>
                            <td id="Diskon"><?php echo $data['Diskon']; ?></td>
                        </tr>
                        <tr>
                            <td>Sub Total</td>
                            <td id="sub_total"><?php echo ($data['Sub_Total']); ?></td>
                        </tr>
                        <tr>
                            <td>Ongkos Kirim</td>
                            <td id="ongkos_kirim"><?php echo ($data['Sub_Total']); ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><?php echo $data['Keterangan']; ?></td>
                        </tr>
                        <tr>
                            <td>Lain-lain</td>
                            <td><?php echo $data['Lain_lain']; ?></td>
                        </tr>
                        <tr>
                            <td>Isi Diperiksa</td>
                            <td><?php echo $data['Isi_Diperiksa']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <td>Penjemputan</td>
                            <td><?php echo $data['Penjemputan']; ?></td>
                        </tr>
                        <tr>
                            <td>Terbilang</td>
                            <td id="Terbilang"><?php echo $data['Terbilang']; ?></td>
                        </tr>
                        <tr>
                            <td>Operan</td>
                            <td><?php echo $data['Operan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tgl Berangkat</td>
                            <td><?php echo $data['Tgl_Berangkat']; ?></td>
                        </tr>
                        <tr>
                            <td>Penerusan</td>
                            <td><?php echo $data['Penerusan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tgl Diterima</td>
                            <td><?php echo $data['Tgl_Diterima']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pengirim</td>
                            <td><?php echo $data['Nama_Pengirim']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Penerima</td>
                            <td><?php echo $data['Nama_Penerima']; ?></td>
                        </tr>
                        <tr>
                            <td>Service</td>
                            <td><?php echo $data['Service']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">TABEL DETAIL</h4>
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-primary me-2" href="pengirimandetailtambah.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Tambah</a>
                <a class="btn btn-primary" href="pengirimancetak.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Cetak</a>
            </div>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Keterangan Isi Pengiriman</th>
                        <th>Berat</th>
                        <th>Banyaknya</th>
                        <th>Harga/Kg</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    $totalharga = 0;
                    $detailQuery = mysqli_query($db, "SELECT j.ID_JenisPengiriman, j.KeteranganIsiPengiriman, d.Banyaknya, j.Harga_Kg, d.Berat
                                                        FROM detailpengiriman d
                                                        JOIN jeniskiriman j ON j.ID_JenisPengiriman = d.ID_JenisPengiriman
                                                        WHERE d.No_Pengiriman = '$No_Pengiriman'");

                    if (!$detailQuery) {
                        echo "<tr><td colspan='7'>Error: " . mysqli_error($db) . "</td></tr>";
                    } else {
                        while ($detailData = mysqli_fetch_array($detailQuery)) {
                            $harga = floatval($detailData['Harga_Kg']);
                            $JumlahBarang = intval($detailData['Banyaknya']);
                            $Berat = floatval($detailData['Berat']);
                            $subtotal = $harga * $JumlahBarang * ($Berat > 0 ? $Berat : 1); // Menggunakan 1 sebagai faktor jika Berat adalah 0
                            $totalharga += $subtotal;
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($index++); ?></td>
                                <td><?php echo $detailData['KeteranganIsiPengiriman']; ?></td>
                                <td><?php echo $detailData['Berat']; ?></td>
                                <td><?php echo $detailData['Banyaknya']; ?></td>
                                <td><?php echo $detailData['Harga_Kg']; ?></td>
                                <td><?php echo number_format($subtotal, 2); ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="pengirimandetailhapus.php?No_Pengiriman=<?php echo $No_Pengiriman; ?>&ID_JenisPengiriman=<?php echo $detailData['ID_JenisPengiriman']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                                    <a class="btn btn-warning btn-sm" href="pengirimandetailedit.php?No_Pengiriman=<?php echo $No_Pengiriman; ?>&ID_JenisPengiriman=<?php echo $detailData['ID_JenisPengiriman']; ?>">Edit</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }

                    // Calculate the discounted price and set Ongkos Kirim to the discounted Sub Total
                    $diskon = floatval($data['Diskon']);
                    $subTotalAfterDiscount = $totalharga * (1 - $diskon / 100);
                    $ongkosKirim = $subTotalAfterDiscount;
                    $terbilang = ""; // Placeholder, will be filled by JavaScript

                    // Update the total price, Ongkos Kirim, and Terbilang in the faktur table
                    $updateFakturQuery = "UPDATE pengiriman SET Sub_Total = '$subTotalAfterDiscount', Ongkos_Kirim = '$ongkosKirim' WHERE No_Pengiriman = '$No_Pengiriman'";
                    mysqli_query($db, $updateFakturQuery);
                    ?>
                    <tr>
                        <td colspan="5">Sub Total</td>
                        <td><?php echo number_format($totalharga, 2); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5">Sub Total Setelah Diskon</td>
                        <td><?php echo number_format($subTotalAfterDiscount, 2); ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
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

document.addEventListener("DOMContentLoaded", function() {
    let subTotalAfterDiscount = parseFloat(document.getElementById('sub_total').innerText);
    let ongkosKirim = parseFloat(document.getElementById('ongkos_kirim').innerText);
    
    let subTotalWholeNumber = Math.floor(subTotalAfterDiscount);
    let terbilangSubTotal = convertToWords(subTotalWholeNumber) + " Rupiah"; 
    
    let terbilangText =  terbilangSubTotal;
    document.getElementById("Terbilang").innerText = terbilangText;

    // Send the terbilang value to the server to update the database
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("update_terbilang=1&No_Pengiriman=<?php echo $No_Pengiriman; ?>&Terbilang=" + encodeURIComponent(terbilangText));
});
</script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
