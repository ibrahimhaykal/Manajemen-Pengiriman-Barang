<!DOCTYPE html>
<html>
<head>
    <title>Klinik Melyan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h3 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table th {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: 1px solid #ccc;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .edit,
        .hapus,
        .kembali {
            padding: 7.5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .edit:hover,
        .hapus:hover,
        .kembali:hover {
            background-color: #555;
        }

        .edit {
            margin-right: 5px;
        }

        .kembali {
            margin-top: 1px;
        }

        .kembali:hover {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>
<body>
<?php
include '../config.php';

$No_Pengiriman = $_GET['No_Pengiriman'];

// Fetch the main data
$query = mysqli_query($db, "SELECT * FROM pengiriman n, datadiripengirim p, datadiripenerima d WHERE n.Kd_Pengirim = p.Kd_Pengirim AND n.Kd_Penerima = d.Kd_Penerima AND No_Pengiriman = '$No_Pengiriman'");

if (!$query) {
    die("Query error: " . mysqli_error($db));
}

$data = mysqli_fetch_array($query);

if (!$data) {
    die("No data found for No_Pengiriman: " . htmlspecialchars($No_Pengiriman));
}
?>
<h3> KLINIK MELYAN </h3>

<form action="" method="post">
    <h4>DETAIL NOTA: <?php echo htmlspecialchars($data['No_Pengiriman']); ?></h4>
    <a class="kembali" href="pengirimanlihat1.php">Kembali</a>
    <table>
        <tr>
            <td>Kode Nota</td>
            <td><?php echo htmlspecialchars($data['No_Pengiriman']); ?></td>
        </tr>
        <tr>
            <td>Nama Pengirim</td>
            <td><?php echo htmlspecialchars($data['Nama_Pengirim']); ?></td>
        </tr>
        <tr>
            <td>Nama Penerima</td>
            <td><?php echo htmlspecialchars($data['Nama_Penerima']); ?></td>
        </tr>
        <tr>
            <td>Tanggal Diterima</td>
            <td><?php echo htmlspecialchars($data['Tgl_Diterima']); ?></td>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td><?php echo htmlspecialchars($data['Sub_Total']); ?></td>
        </tr>
    </table>

    <h4>TABEL DETAIL NOTA</h4>
    <a class="kembali" href="notadetailtambah.php?No_Pengiriman=<?php echo htmlspecialchars($data['No_Pengiriman']); ?>">Tambah</a> |
    <a class="hapus" href="notacetak.php?No_Pengiriman=<?php echo htmlspecialchars($data['No_Pengiriman']); ?>">Cetak</a>
    <table>
        <tr style="background-color: green; color: white;">
            <th><center>No</center></th>
            <th><center>Keterangan Isi Pengiriman</center></th>
            <th><center>Berat</center></th>
            <th><center>Banyaknya</center></th>
            <th><center>Subtotal</center></th>
            <th><center>Aksi</center></th>
        </tr>
        <?php
        $index = 1;

        // Fetch the detail data
        $detailQuery = mysqli_query($db, "SELECT O.KeteranganIsiPengiriman, DN.Banyaknya, DN.Berat, N.No_Pengiriman, DN.ID_JenisPengiriman 
                                          FROM pengiriman N 
                                          JOIN detailpengiriman DN ON N.No_Pengiriman = DN.No_Pengiriman 
                                          JOIN jeniskiriman O ON DN.ID_JenisPengiriman = O.ID_JenisPengiriman 
                                          WHERE N.No_Pengiriman = '$No_Pengiriman'");

        if (!$detailQuery) {
            die("Detail query error: " . mysqli_error($db));
        }

        while ($detail = mysqli_fetch_array($detailQuery)) {
            $subtotal = $detail['Banyaknya'] * $detail['Berat'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($index++); ?></td>
                <td><?php echo htmlspecialchars($detail['KeteranganIsiPengiriman']); ?></td>
                <td><?php echo htmlspecialchars($detail['Berat']); ?></td>
                <td><?php echo htmlspecialchars($detail['Banyaknya']); ?></td>
                <td><?php echo htmlspecialchars($subtotal); ?></td>
                <td>
                    <a class="hapus" href="notadetailhapus.php?No_Pengiriman=<?php echo htmlspecialchars($detail['No_Pengiriman']); ?>&ID_JenisPengiriman=<?php echo htmlspecialchars($detail['ID_JenisPengiriman']); ?>" onclick="return confirm('Yakin hapus?')">Hapus</a> |
                    <a class="edit" href="notadetailedit.php?No_Pengiriman=<?php echo htmlspecialchars($detail['No_Pengiriman']); ?>&ID_JenisPengiriman=<?php echo htmlspecialchars($detail['ID_JenisPengiriman']); ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4" align="center"><strong>TOTAL HARGA</strong></td>
            <td><?php echo htmlspecialchars($data['Sub_Total']); ?></td>
            <td></td>
        </tr>
    </table>
</form>
</body>
</html>
