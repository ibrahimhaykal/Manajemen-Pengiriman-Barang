<!DOCTYPE html>
<html>
<head>
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

        table td, table th {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="text"], input[type="date"], select {
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
    <h3> PENGIRIMAN </h3>

    <form action="" method="post">
        <table>
            <h4>FORM PENGIRIMAN</h4>
            <tr>
                <td> No Pengiriman </td>
                <td> <input type="text" name="No_Pengiriman"> </td>
            </tr>
            <tr>
                <td> Kemasan </td>
                <td> <input type="text" name="Kemasan"> </td>
            </tr>
            <tr>
                <td> Diskon </td>
                <td> <input type="text" name="Diskon"> </td>
            </tr>
            <tr>
                <td> Sub Total </td>
                <td> <input type="text" name="Sub_Total"> </td>
            </tr>
            <tr>
                <td> Ongkos Kirim </td>
                <td> <input type="text" name="Ongkos_Kirim"> </td>
            </tr>
            <tr>
                <td> Keterangan </td>
                <td> <input type="text" name="Keterangan"> </td>
            </tr>
            <tr>
                <td> Lain-lain </td>
                <td> <input type="text" name="Lain_lain"> </td>
            </tr>
            <tr>
                <td> Penjemputan </td>
                <td> <input type="text" name="Penjemputan"> </td>
            </tr>
            <tr>
                <td> Terbilang </td>
                <td> <input type="text" name="Terbilang"> </td>
            </tr>
            <tr>
                <td> Operan </td>
                <td> <input type="text" name="Operan"> </td>
            </tr>
            <tr>
                <td> Tgl Berangkat </td>
                <td> <input type="date" name="Tgl_Berangkat"> </td>
            </tr>
            <tr>
                <td> Penerusan </td>
                <td> <input type="text" name="Penerusan"> </td>
            </tr>
            <tr>
                <td> Tgl Diterima </td>
                <td> <input type="date" name="Tgl_Diterima"> </td>
            </tr>
            <tr>
                <td> Kode Pengirim </td>
                <td>
                    <select name="Kd_Pengirim" style="width:170px;">
                        <option value="">--Pilih--</option>
                        <?php
                        include '../config.php';
                        $query = mysqli_query($db, "SELECT * FROM DataDiriPengirim");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['Kd_Pengirim']; ?>">
                                <?php echo $data['Nama_Pengirim']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Kode Penerima </td>
                <td>
                    <select name="Kd_Penerima" style="width:170px;">
                        <option value="">--Pilih--</option>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM DataDiriPenerima");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['Kd_Penerima']; ?>">
                                <?php echo $data['Nama_Penerima']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Service </td>
                <td>
                    <select name="Service" style="width:170px;">
                        <option value="STS">STS</option>
                        <option value="NOSTS">NOSTS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><a class="kembali" href="pengirimanlihat.php">Kembali</a></td>
                <td><input type="submit" name="proses" value="Simpan"> </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if (isset($_POST['proses'])){
    include '../config.php';
  
    $No_Pengiriman = $_POST['No_Pengiriman'];
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

    $query = "INSERT INTO pengiriman (No_Pengiriman, Kemasan, Diskon, Sub_Total, Ongkos_Kirim, Keterangan, Lain_lain, Penjemputan, Terbilang, Operan, Tgl_Berangkat, Penerusan, Tgl_Diterima, Kd_Pengirim, Kd_Penerima, Service) 
              VALUES ('$No_Pengiriman', '$Kemasan', '$Diskon', '$Sub_Total', '$Ongkos_Kirim', '$Keterangan', '$Lain_lain', '$Penjemputan', '$Terbilang', '$Operan', '$Tgl_Berangkat', '$Penerusan', '$Tgl_Diterima', '$Kd_Pengirim', '$Kd_Penerima', '$Service')";

    if (mysqli_query($db, $query)) {
        echo "<script>window.location.href = 'pengirimanlihat.php?No_Pengiriman=".$No_Pengiriman."';</script>";
    }
}
?>