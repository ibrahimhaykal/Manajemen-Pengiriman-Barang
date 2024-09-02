<?php
include '../config.php';

$No_Pengiriman = $_GET['No_Pengiriman'];
$ID_JenisPengiriman = $_GET['ID_JenisPengiriman'];

// Fetch the main pengiriman details
$query_pengiriman = mysqli_query($db, "SELECT * FROM pengiriman WHERE No_Pengiriman = '$No_Pengiriman'");
$data_pengiriman = mysqli_fetch_array($query_pengiriman);

// Fetch the specific detailpengiriman to be edited
$query_detail = mysqli_query($db, "SELECT * FROM detailpengiriman WHERE No_Pengiriman = '$No_Pengiriman' AND ID_JenisPengiriman = '$ID_JenisPengiriman'");
$data_detail = mysqli_fetch_array($query_detail);
?>

<?php
if (isset($_POST['proses'])) {
    $No_Pengiriman = $_POST['No_Pengiriman'];
    $ID_JenisPengiriman = $_POST['ID_JenisPengiriman'];
    $Berat = $_POST['Berat'];
    $Banyaknya = $_POST['Banyaknya'];
    $Jumlah = $_POST['Jumlah'];

    // Update the detailpengiriman table
    $query_update = "UPDATE detailpengiriman SET Berat = '$Berat', Banyaknya = '$Banyaknya', Jumlah = '$Jumlah' WHERE No_Pengiriman = '$No_Pengiriman' AND ID_JenisPengiriman = '$ID_JenisPengiriman'";
    $result_update = mysqli_query($db, $query_update);

    if ($result_update) {
        // Recalculate the Sub_Total in the pengiriman table
        $query_total = "SELECT SUM(Jumlah) AS Sub_Total FROM detailpengiriman WHERE No_Pengiriman = '$No_Pengiriman'";
        $result_total = mysqli_query($db, $query_total);
        $row_total = mysqli_fetch_assoc($result_total);
        $total_baru = $row_total['Sub_Total'];

        $query_update_total = "UPDATE pengiriman SET Sub_Total = '$total_baru' WHERE No_Pengiriman = '$No_Pengiriman'";
        $result_update_total = mysqli_query($db, $query_update_total);

        if ($result_update_total) {
            header("Location: pengirimandetail.php?No_Pengiriman=$No_Pengiriman");
            exit;
        } else {
            echo "Error updating total: " . mysqli_error($db);
        }
    } else {
        echo "Error updating detail: " . mysqli_error($db);
    }
}
$query = mysqli_query($db, "SELECT * FROM pengiriman n, datadiripengirim p, datadiripenerima d WHERE n.Kd_Pengirim = p.Kd_Pengirim AND n.Kd_Penerima = d.Kd_Penerima AND No_Pengiriman = '$No_Pengiriman'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Detail Pengiriman</title>
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
                <h4 class="mb-0">Form Edit Detail Pengiriman: <?php echo $data_pengiriman['No_Pengiriman']; ?></h4>
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
                            <td id="sub_total"oninput="updateTerbilang()"><?php echo $data['Sub_Total']; ?></td>
                        </tr>
                        <tr>
                            <td>Ongkos Kirim</td>
                            <td id="ongkos_kirim"oninput="updateTerbilang()"><?php echo $data['Ongkos_Kirim']; ?></td>
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
                            <td id="Terbilang"oninput="updateTerbilang()"><?php echo $data['Terbilang']; ?></td>
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
                        <input type="text" class="form-control" id="No_Pengiriman" name="No_Pengiriman" value="<?php echo $data_pengiriman['No_Pengiriman']; ?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="ID_JenisPengiriman" class="col-sm-2 col-form-label">Jenis Pengiriman</label>
                    <div class="col-sm-10">
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM jeniskiriman");
                        $selected_shipping = '';
                        while ($jenis = mysqli_fetch_array($query)) {
                            if ($jenis['ID_JenisPengiriman'] == $data_detail['ID_JenisPengiriman']) {
                                $selected_shipping = "{$jenis['ID_JenisPengiriman']} - {$jenis['KeteranganIsiPengiriman']} - {$jenis['Harga_Kg']}";
                                $harga_selected = $jenis['Harga_Kg'];
                                break;
                            }
                        }
                        ?>
                        <input type="text" class="form-control" value="<?php echo $selected_shipping; ?>" readonly>
                        <input type="hidden" name="ID_JenisPengiriman" value="<?php echo $data_detail['ID_JenisPengiriman']; ?>">
                        <input type="hidden" id="hargaSelected" value="<?php echo $harga_selected; ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Berat" class="col-sm-2 col-form-label">Berat (Kg)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Berat" name="Berat" value="<?php echo $data_detail['Berat']; ?>" step="0.01"oninput="updateTerbilang()">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="Banyaknya" class="col-sm-2 col-form-label">Kuantitas</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Banyaknya" name="Banyaknya" value="<?php echo $data_detail['Banyaknya']; ?>"oninput="updateTerbilang()">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="Jumlah" class="col-sm-2 col-form-label">Jumlah Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Jumlah" name="Jumlah" value="<?php echo $data_detail['Jumlah']; ?>" oninput="updateTerbilang()"readonly>
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
    var inputBerat = document.querySelector("input[name='Berat']");
    var inputBanyaknya = document.querySelector("input[name='Banyaknya']");
    var inputJumlah = document.querySelector("input[name='Jumlah']");
    var hargaSelected = document.getElementById('hargaSelected').value;

    function hitungJumlah() {
        var Berat = parseFloat(inputBerat.value) || 0;
        var Banyaknya = parseInt(inputBanyaknya.value) || 0;
        var Jumlah = hargaSelected * Berat * Banyaknya;
        inputJumlah.value = Jumlah;
    }

    inputBerat.addEventListener("input", hitungJumlah);
    inputBanyaknya.addEventListener("input", hitungJumlah);

    document.addEventListener("DOMContentLoaded", hitungJumlah);
</script>
</body>
</html>
