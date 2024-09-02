<?php
include '../config.php';

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
    <h3>Data Diri Penerima</h3>
    <form action="" method="post">
        <h4>FORM UBAH Data Diri Penerima</h4>
        <table>
            <tr>
                <td>Kode Penerima</td>
                <td><input type="text" name="Kd_Penerima" value="<?php echo $data['Kd_Penerima'];?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Penerima</td>
                <td><input type="text" name="Nama_Penerima" value="<?php echo $data['Nama_Penerima'];?>"></td>
            </tr>
            <tr>
                <td>Alamat Penerima</td>
                <td><input type="text" name="Alamat_Penerima" value="<?php echo $data['Alamat_Penerima'];?>"></td>
            </tr>
            <tr>
                <td>No. Telp Penerima</td>
                <td><input type="text" name="No_Telp_Penerima" value="<?php echo $data['No_Telp_Penerima'];?>"></td>
            </tr>
            <tr>
                <td>Nama Kelurahan</td>
                <td>
                    <select name="Kd_Kelurahan">
                        <?php
                        $ambilkelurahan = mysqli_query($db, "SELECT * FROM kelurahan");
                        while ($kelurahan = mysqli_fetch_array($ambilkelurahan)) {
                            $selected = ($data['Kd_Kelurahan'] == $kelurahan['Kd_Kelurahan']) ? 'selected' : '';
                            echo "<option value='{$kelurahan['Kd_Kelurahan']}' $selected>{$kelurahan['Nama_Kelurahan']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="proses" value="Ubah Data Diri Penerima">
                    <a class="kembali" href="datadiripenerimalihat.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if (isset($_POST['proses'])) {
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
    
    header("Location: datadiripenerimalihat.php");
    exit();
}
?>
