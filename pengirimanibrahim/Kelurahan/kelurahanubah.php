<?php
include '../config.php';

// Fetch the data to be edited
if (isset($_GET['Kd_Kelurahan'])) {
    $Kd_Kelurahan = $_GET['Kd_Kelurahan'];
    $query = mysqli_query($db, "SELECT * FROM kelurahan WHERE Kd_Kelurahan = '$Kd_Kelurahan'");
    $data = mysqli_fetch_array($query);
} else {
    // Redirect if no Kd_Kelurahan is set
    header("Location: kelurahanlihat.php");
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

        input[type="text"], select {
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
    <h3>Data Kelurahan</h3>
    <form action="" method="post">
        <h4>FORM UBAH Data Kelurahan</h4>
        <table>
            <tr>
                <td>Kode Kelurahan</td>
                <td><input type="text" name="Kd_Kelurahan" value="<?php echo $data['Kd_Kelurahan'];?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Kelurahan</td>
                <td><input type="text" name="Nama_Kelurahan" value="<?php echo $data['Nama_Kelurahan'];?>"></td>
            </tr>
            <tr>
                <td>Nama Kecamatan</td>
                <td>
                    <select name="Kd_Kecamatan">
                        <?php
                        $ambilkecamatan = mysqli_query($db, "SELECT * FROM kecamatan");
                        while ($kecamatan = mysqli_fetch_array($ambilkecamatan)) {
                            $selected = ($data['Kd_Kecamatan'] == $kecamatan['Kd_Kecamatan']) ? 'selected' : '';
                            echo "<option value='{$kecamatan['Kd_Kecamatan']}' $selected>{$kecamatan['Nama_Kecamatan']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="proses" value="Ubah Data Kelurahan">
                    <a class="kembali" href="kelurahanlihat.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if (isset($_POST['proses'])) {
    $Nama_Kelurahan = $_POST['Nama_Kelurahan'];
    $Kd_Kecamatan = $_POST['Kd_Kecamatan'];

    mysqli_query($db, "UPDATE kelurahan SET 
        Nama_Kelurahan='$Nama_Kelurahan', 
        Kd_Kecamatan='$Kd_Kecamatan' 
        WHERE Kd_Kelurahan='$Kd_Kelurahan'");
    
    header("Location: kelurahanlihat.php");
    exit();
}
?>
