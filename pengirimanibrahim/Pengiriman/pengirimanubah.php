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
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
        }

        h3 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        h4 {
            text-align: center;
            color: #666;
            font-size: 18px;
            margin-bottom: 10px;
        }

        tr {
            line-height: 2;
        }

        td:first-child {
            text-align: right;
            padding-right: 10px;
            color: #666;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .kembali {
            padding: 10px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            font-size: 14px;
        }

        .kembali:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h3>Pengiriman</h3>
    <form action="" method="post">
        <h4>FORM UBAH PENGIRIMAN</h4>
        <table>
            <tr>
                <td>No Pengiriman</td>
                <td><input type="text" name="No_Pengiriman" value="<?php echo $data['No_Pengiriman'];?>" readonly></td>
            </tr>
            <tr>
                <td>Kemasan</td>
                <td><input type="text" name="Kemasan" value="<?php echo $data['Kemasan'];?>"></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td><input type="text" name="Diskon" value="<?php echo $data['Diskon'];?>"></td>
            </tr>
            <tr>
                <td>Sub Total</td>
                <td><input type="text" name="Sub_Total" value="<?php echo $data['Sub_Total'];?>"></td>
            </tr>
            <tr>
                <td>Ongkos Kirim</td>
                <td><input type="text" name="Ongkos_Kirim" value="<?php echo $data['Ongkos_Kirim'];?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="Keterangan" value="<?php echo $data['Keterangan'];?>"></td>
            </tr>
            <tr>
                <td>Lain-lain</td>
                <td><input type="text" name="Lain_lain" value="<?php echo $data['Lain_lain'];?>"></td>
            </tr>
            <tr>
                <td>Penjemputan</td>
                <td><input type="text" name="Penjemputan" value="<?php echo $data['Penjemputan'];?>"></td>
            </tr>
            <tr>
                <td>Terbilang</td>
                <td><input type="text" name="Terbilang" value="<?php echo $data['Terbilang'];?>"></td>
            </tr>
            <tr>
                <td>Operan</td>
                <td><input type="text" name="Operan" value="<?php echo $data['Operan'];?>"></td>
            </tr>
            <tr>
                <td>Tgl Berangkat</td>
                <td><input type="date" name="Tgl_Berangkat" value="<?php echo $data['Tgl_Berangkat'];?>"></td>
            </tr>
            <tr>
                <td>Penerusan</td>
                <td><input type="text" name="Penerusan" value="<?php echo $data['Penerusan'];?>"></td>
            </tr>
            <tr>
                <td>Tgl Diterima</td>
                <td><input type="date" name="Tgl_Diterima" value="<?php echo $data['Tgl_Diterima'];?>"></td>
            </tr>
            <tr>
                <td>Nama Pengirim</td>
                <td>
                    <select name="Kd_Pengirim">
                        <?php
                        $query_pengirim = mysqli_query($db, "SELECT * FROM DataDiriPengirim");
                        while ($pengirim = mysqli_fetch_array($query_pengirim)) {
                            $selected = ($data['Kd_Pengirim'] == $pengirim['Kd_Pengirim']) ? 'selected' : '';
                            echo "<option value='{$pengirim['Kd_Pengirim']}' $selected>{$pengirim['Nama_Pengirim']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Pengirim</td>
                <td>
                    <select name="Kd_Penerima">
                        <?php
                        $query_penerima = mysqli_query($db, "SELECT * FROM DataDiriPenerima");
                        while ($penerima = mysqli_fetch_array($query_penerima)) {
                            $selected = ($data['Kd_Penerima'] == $penerima['Kd_Penerima']) ? 'selected' : '';
                            echo "<option value='{$penerima['Kd_Penerima']}' $selected>{$penerima['Nama_Penerima']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Service</td>
                <td>
                    <select name="Service">
                        <option value="STS" <?php echo ($data['Service'] == 'STS') ? 'selected' : ''; ?>>STS</option>
                        <option value="NOSTS" <?php echo ($data['Service'] == 'NOSTS') ? 'selected' : ''; ?>>NOSTS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="proses" value="Ubah Pengiriman">
                    <a class="kembali" href="pengirimanlihat1.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
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
        Service='$Service' 
        WHERE No_Pengiriman='$No_Pengiriman'");
    
    header("Location: pengirimanlihat1.php");
    exit();
    ob_end_flush();
}
?>

