<?php
include '../config.php';

$no_pengiriman = $_GET['No_Pengiriman'];

// Prepare the combined query to fetch all data in one go
$query = "
    SELECT 
        pengiriman.*,
        pengirim.Nama_Pengirim, pengirim.Alamat_Pengirim, pengirim.No_Telp_Pengirim,
        penerima.Nama_Penerima, penerima.Alamat_Penerima, penerima.No_Telp_Penerima,
        kp.Nama_Kelurahan AS pengirim_kelurahan, kp2.Nama_Kelurahan AS penerima_kelurahan,
        kecp.Nama_Kecamatan AS pengirim_kecamatan, kecp2.Nama_Kecamatan AS penerima_kecamatan,
        kabp.Nama_Kabupaten AS pengirim_kabupaten, kabp2.Nama_Kabupaten AS penerima_kabupaten,
        detail.*, jeniskiriman.*
    FROM pengiriman
    JOIN datadiripengirim AS pengirim ON pengiriman.Kd_Pengirim = pengirim.Kd_Pengirim
    JOIN kelurahan AS kp ON pengirim.Kd_Kelurahan = kp.Kd_Kelurahan
    JOIN kecamatan AS kecp ON kp.Kd_Kecamatan = kecp.Kd_Kecamatan
    JOIN kabupatenkota AS kabp ON kecp.Kd_Kabupaten = kabp.Kd_Kabupaten
    JOIN datadiripenerima AS penerima ON pengiriman.Kd_Penerima = penerima.Kd_Penerima
    JOIN kelurahan AS kp2 ON penerima.Kd_Kelurahan = kp2.Kd_Kelurahan
    JOIN kecamatan AS kecp2 ON kp2.Kd_Kecamatan = kecp2.Kd_Kecamatan
    JOIN kabupatenkota AS kabp2 ON kecp2.Kd_Kabupaten = kabp2.Kd_Kabupaten
    JOIN detailpengiriman AS detail ON detail.No_Pengiriman = pengiriman.No_Pengiriman
    JOIN jeniskiriman ON detail.Id_JenisPengiriman = jeniskiriman.Id_JenisPengiriman
    WHERE pengiriman.No_Pengiriman = ?
";

// Prepare and execute the statement
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, 's', $no_pengiriman);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Error fetching data: " . mysqli_error($db));
}

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Extracting the data for rendering
$pengiriman = $data[0];
$pengirim = $pengiriman; // Pengirim data is already joined
$penerima = $pengiriman; // Penerima data is already joined
$details = $data; // Detail data as an array

$total_biaya = 0;
$total_berat = 0;
$total_banyaknya = 0;

foreach ($details as $detail) {
    $total_biaya += $detail['Jumlah'];
    $total_berat += $detail['Berat'];
    $total_banyaknya += $detail['Banyaknya'];
}

date_default_timezone_set('Asia/Jakarta');
$waktu_sekarang = date('H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herona Express Shipping Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-custom {
            border: 1px solid #000;
            padding: 5px;
            margin-top: 10px;
            font-size: 10.5px;
        }
        .header {
            text-align: center;
            margin-bottom: 5px;
            position: relative;
        }
        .header img {
            width: 40px;
        }
        .header .logos {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header .logos img {
            margin: 0 3px;
        }
        .header h1 {
            margin: 0;
            color: red;
            font-size: 30px;
            display: inline;
        }
        .header h2 {
            margin: 2px 0;
            font-size: 12px;
        }
        .header h3 {
            margin: 0;
            font-size: 20px;
        }
        .header .no-pengiriman {
            font-size: 20px;
            margin-left: 3px;
            display: inline-block;
        }
        .table-custom th, .table-custom td {
            border: none;
            border-bottom: 1px solid #000;
        }
        .table-custom th {
            border-top: 1px solid #000;
        }
        .signature {
            margin-top: 5px;
            padding-top: 5px;
            border-top: 1px solid #000;
        }
        .footer {
            margin-top: 5px;
            border: 1px solid #000;
            padding: 3px;
            text-align: center;
        }
        .details-column {
            white-space: nowrap;
        }
        .details-row {
            display: flex;
            flex-wrap: wrap;
        }
        .details-row .col-6 {
            padding-right: 5px; /* Add padding to create space between columns */
        }
        .terbilang {
            text-align: left;
        }
        .aligned-numbers {
            display: flex;
            justify-content: space-between;
            margin-top: 2px;
        }
        .aligned-numbers .col {
            text-align: center;
            flex: 1;
        }
        .signature .terbilang-center {
            text-align: center;
        }
        .attribute-label {
            display: inline-block;
            width: 80px;
        }
        .details-column strong {
            display: block;
        }
        .signature-image {
            margin-right:-40px;
            width: 180px; /* Adjust this value to make the image smaller or larger */
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container container-custom">
        <div class="header">
            <div class="logos">
                <img src="../img/logo.png.png" alt="Herona Express Logo">
                <h1>"HERONA EXPRESS"</h1>
                <img src="../img/logoPTKAI.svg" alt="KAI Logo">
            </div>
            <h2>EKSPEDISI MUATAN KERETA API & TRUCK BOX</h2>
            <h3>SURAT PENGIRIMAN <span class="no-pengiriman">No: <?php echo $pengiriman['No_Pengiriman']; ?></span></h3>
        </div>
        <div class="row mb-1">
            <div class="col-6">
                <strong class="attribute-label">PENGIRIM</strong> : <?php echo $pengirim['Nama_Pengirim']; ?><br>
                <strong class="attribute-label">Alamat</strong> : <?php echo $pengirim['Alamat_Pengirim']; ?><br>
                <strong class="attribute-label">Kelurahan</strong> : <?php echo $pengirim['pengirim_kelurahan']; ?><br>
                <strong class="attribute-label">Kecamatan</strong> : <?php echo $pengirim['pengirim_kecamatan']; ?><br>
                <strong class="attribute-label">Kabupaten</strong> : <?php echo $pengirim['pengirim_kabupaten']; ?><br>
                <strong class="attribute-label">Telepon/HP</strong> : <?php echo $pengirim['No_Telp_Pengirim']; ?>
            </div>
            <div class="col-6">
                <strong class="attribute-label">PENERIMA</strong> : <?php echo $penerima['Nama_Penerima']; ?><br>
                <strong class="attribute-label">Alamat</strong> : <?php echo $penerima['Alamat_Penerima']; ?><br>
                <strong class="attribute-label">Kelurahan</strong> : <?php echo $penerima['penerima_kelurahan']; ?><br>
                <strong class="attribute-label">Kecamatan</strong> : <?php echo $penerima['penerima_kecamatan']; ?><br>
                <strong class="attribute-label">Kabupaten</strong> : <?php echo $penerima['penerima_kabupaten']; ?><br>
                <strong class="attribute-label">Telepon/HP</strong> : <?php echo $penerima['No_Telp_Penerima']; ?>
            </div>
        </div>
        <table class="table table-custom">
            <thead>
                <tr>
                    <th>BANYAKNYA</th>
                    <th>KEMASAN</th>
                    <th>ISI KIRIMAN</th>
                    <th>BERAT</th>
                    <th class="details-column">BIAYA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $detail) { ?>
                <tr>
                    <td><?php echo $detail['Banyaknya']; ?></td>
                    <td><?php echo $detail['Kemasan']; ?></td>
                    <td><?php echo $detail['KeteranganIsiPengiriman']; ?></td>
                    <td><?php echo $detail['Berat']; ?></td>
                    <td class="details-column">
                        <div class="details-row">
                            <div class="col-6">
                                <strong class="attribute-label">Ongkos Kirim : </strong> <?php echo number_format($detail['Ongkos_Kirim'], 0, ',', '.'); ?> IDR
                                <strong class="attribute-label">Diskon : </strong> <?php echo $detail['Diskon']; ?>
                                <strong class="attribute-label">Sub Total : </strong> <?php echo number_format($detail['Sub_Total'], 0, ',', '.'); ?> IDR
                                <strong class="attribute-label">Kemasan : </strong> <?php echo $detail['Kemasan']; ?> 
                                <strong class="attribute-label">Penerusan : </strong> <?php echo $detail['Penerusan']; ?>
                                <strong class="attribute-label">Penjemputan : </strong> <?php echo $detail['Penjemputan']; ?>
                                <strong class="attribute-label">Operan : </strong> <?php echo $detail['Operan']; ?>
                                <strong class="attribute-label">Lain-lain : </strong> <?php echo $detail['Lain_lain']; ?>
                            </div>
                            <div class="col-6">
                                <strong class="attribute-label">Isi Diperiksa :</strong> <strong> <?php echo $detail['Isi_Diperiksa']; ?><br></strong> 
                                <strong class="attribute-label">Service :</strong> <strong> <?php echo $detail['Service']; ?><br></strong> 
                                <strong class="attribute-label">Tanggal Berangkat :</strong> <strong> <?php echo $detail['Tgl_Berangkat']; ?><br></strong> 
                                <strong class="attribute-label">Keterangan :</strong> <strong> <?php echo $detail['Keterangan']; ?></strong> 
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="aligned-numbers d-flex">
            <div class="flex-grow-1 text-start"><?php echo $total_banyaknya; ?></div>
            <div class="flex-grow-1 text-center"><?php echo $total_berat; ?></div>
            <div class="flex-grow-1 text-end"><?php echo number_format($detail['Sub_Total'], 0, ',', '.'); ?> IDR</div>
        </div>
        <div class="signature">
            <div class="details-row">
                <div class="col-6">
                    <p class="terbilang"><strong>TERBILANG</strong> : <?php echo ucwords($pengiriman['Terbilang']); ?></p>
                    <p class="terbilang" style="margin-top:-5px">Pengiriman ini diterima dengan baik pada tanggal ................ jam ...............<br>
                    Tandatangan, Nama Lengkap, Stempel Perusahaan</p>
                    <br><br>
                    <p class="terbilang" style="margin-left: 40px; margin-top:-5px;">(.............................................)</p>
                </div>
                <div class="col-6 text-end">
                   <br> MADIUN, <?php echo date('d-m-Y', strtotime($pengiriman['Tgl_Diterima'])); ?> <?php echo $waktu_sekarang; ?><br>
                    <br><br>
                    <img src="../img/signature.png" alt="TandaTangan" class="signature-image">
                    <br>________________________<br>
                    <strong style="margin-right:60px">ARY</strong>
                </div>
            </div>
        </div>
        <div class="footer">
            <p><strong>Ketentuan-Ketentuan yang Perlu Diketahui & Alamat Herona Express Lihat Halaman Belakang</strong></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
