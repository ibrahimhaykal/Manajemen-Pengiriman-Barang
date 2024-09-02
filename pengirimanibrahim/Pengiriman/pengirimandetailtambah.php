<?php
include '../config.php';

$No_Pengiriman = $_GET['No_Pengiriman'];

// Fetch the main pengiriman details
$query = mysqli_query($db, "SELECT * FROM pengiriman WHERE No_Pengiriman = '$No_Pengiriman'");
$data = mysqli_fetch_array($query);
?>

<?php   
include '../config.php';

if (isset($_POST['proses'])) {
    $No_Pengiriman = $_POST['No_Pengiriman'];
    $ID_JenisPengiriman = $_POST['ID_JenisPengiriman'];
    $berat = $_POST['berat'];
    $Banyaknya = $_POST['Banyaknya'];
    $Jumlah = $_POST['Jumlah'];

    // Insert ke tabel detailpengiriman
    $query_insert = "INSERT INTO detailpengiriman (No_Pengiriman, ID_JenisPengiriman, berat, banyaknya, Jumlah) VALUES ('$No_Pengiriman', '$ID_JenisPengiriman', '$berat', '$Banyaknya', '$Jumlah')";
    $result_insert = mysqli_query($db, $query_insert);

    if ($result_insert) {
        // Update nilai Sub_Total di tabel pengiriman
        $query_total = "SELECT Sub_Total FROM pengiriman WHERE No_Pengiriman = '$No_Pengiriman'";
        $result_total = mysqli_query($db, $query_total);
        $row_total = mysqli_fetch_assoc($result_total);
        $total_sebelumnya = $row_total['Sub_Total'];
        $total_baru = $total_sebelumnya + $Jumlah;

        $query_update_total = "UPDATE pengiriman SET Sub_Total = '$total_baru' WHERE No_Pengiriman = '$No_Pengiriman'";
        $result_update_total = mysqli_query($db, $query_update_total);

        if ($result_update_total) {
            header("Location: pengirimandetail.php?No_Pengiriman=$No_Pengiriman");
            exit;
        } else {
            echo "Error updating total: " . mysqli_error($db);
        }
    } else {
        echo "Error inserting detail: " . mysqli_error($db);
    }
}
$query = mysqli_query($db, "SELECT * FROM pengiriman n, datadiripengirim p, datadiripenerima d WHERE n.Kd_Pengirim = p.Kd_Pengirim AND n.Kd_Penerima = d.Kd_Penerima AND No_Pengiriman = '$No_Pengiriman'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengiriman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #343a40;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .form-select, .form-control {
            font-size: 1rem;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/pengirimanibrahim/assets/navbar.php'; ?>
<div class="container">
    <h3 class="text-center mb-4">Herona Express</h3>

    <form action="" method="post">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Form Detail Pengiriman: <?php echo $data['No_Pengiriman']; ?></h4>
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
                            <td><?php echo $data['Diskon']; ?></td>
                        </tr>
                        <tr>
                            <td>Sub Total</td>
                            <td id="sub_total"><?php echo $data['Sub_Total']; ?></td>
                        </tr>
                        <tr>
                            <td>Ongkos Kirim</td>
                            <td id="ongkos_kirim"><?php echo $data['Sub_Total']; ?></td>
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
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="No_Pengiriman" class="col-sm-2 col-form-label">Kode Pengiriman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="No_Pengiriman" name="No_Pengiriman" value="<?php echo $data['No_Pengiriman']; ?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="ID_JenisPengiriman" class="col-sm-2 col-form-label">Jenis Pengiriman</label>
                    <div class="col-sm-10">
                        <select name="ID_JenisPengiriman" id="ID_JenisPengiriman" class="form-select">
                            <option value="">--Pilih--</option>
                            <?php
                            $query = mysqli_query($db, "SELECT * FROM jeniskiriman");
                            while ($jenis = mysqli_fetch_array($query)) {
                                echo "<option value='{$jenis['ID_JenisPengiriman']}' data-harga='{$jenis['Harga_Kg']}'>{$jenis['ID_JenisPengiriman']} - {$jenis['KeteranganIsiPengiriman']} - {$jenis['Harga_Kg']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="berat" class="col-sm-2 col-form-label">Berat (Kg)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="berat" name="berat" step="0.01">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="Banyaknya" class="col-sm-2 col-form-label">Kuantitas</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Banyaknya" name="Banyaknya">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="Jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Jumlah" name="Jumlah" readonly>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="pengirimanlihat1.php">Kembali</a>
                    <input type="submit" name="proses" value="Simpan Detail Pengiriman" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
    // Ambil elemen-elemen yang diperlukan
    var selectBarang = document.querySelector("select[name='ID_JenisPengiriman']");
    var inputBerat = document.querySelector("input[name='berat']");
    var inputBanyaknya = document.querySelector("input[name='Banyaknya']");
    var inputJumlah = document.querySelector("input[name='Jumlah']");

    // Fungsi untuk menghitung Jumlah
    function hitungJumlah() {
        var harga = selectBarang.options[selectBarang.selectedIndex].getAttribute("data-harga");
        var berat = inputBerat.value;
        var banyaknya = inputBanyaknya.value;
        var Jumlah = harga * berat * banyaknya;
        inputJumlah.value = Jumlah;
    }

    // Panggil fungsi hitungJumlah saat nilai input berubah
    selectBarang.addEventListener("change", hitungJumlah);
    inputBerat.addEventListener("input", hitungJumlah);
    inputBanyaknya.addEventListener("input", hitungJumlah);
</script>
</body>
</html>
