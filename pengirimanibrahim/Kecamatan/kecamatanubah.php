<?php
include '../config.php';

// Fetch the data to be edited
if (isset($_GET['Kd_Kecamatan'])) {
    $Kd_Kecamatan = $_GET['Kd_Kecamatan'];
    $query = mysqli_query($db, "SELECT * FROM kecamatan WHERE Kd_Kecamatan = '$Kd_Kecamatan'");
    $data = mysqli_fetch_array($query);
} else {
    // Redirect if no Kd_Kecamatan is set
    header("Location: kecamatanlihat.php");
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
    <h3>Data Kecamatan</h3>
    <form action="" method="post">
        <h4>FORM UBAH Data Kecamatan</h4>
        <table>
            <tr>
                <td>Kode Kecamatan</td>
                <td><input type="text" name="Kd_Kecamatan" value="<?php echo $data['Kd_Kecamatan'];?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Kecamatan</td>
                <td><input type="text" name="Nama_Kecamatan" value="<?php echo $data['Nama_Kecamatan'];?>"></td>
            </tr>
            <tr>
                <td>Nama Kabupaten</td>
                <td>
                    <select name="Kd_Kabupaten">
                        <?php
                        $ambilkabupaten = mysqli_query($db, "SELECT * FROM kabupatenkota");
                        while ($kabupaten = mysqli_fetch_array($ambilkabupaten)) {
                            $selected = ($data['Kd_Kabupaten'] == $kabupaten['Kd_Kabupaten']) ? 'selected' : '';
                            echo "<option value='{$kabupaten['Kd_Kabupaten']}' $selected>{$kabupaten['Nama_Kabupaten']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="proses" value="Ubah Data Kecamatan">
                    <a class="kembali" href="kecamatanlihat.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if (isset($_POST['proses'])) {
    $Nama_Kecamatan = $_POST['Nama_Kecamatan'];
    $Kd_Kabupaten = $_POST['Kd_Kabupaten'];

    mysqli_query($db, "UPDATE kecamatan SET 
        Nama_Kecamatan='$Nama_Kecamatan', 
        Kd_Kabupaten='$Kd_Kabupaten' 
        WHERE Kd_Kecamatan='$Kd_Kecamatan'");
    
    header("Location: kecamatanlihat.php");
    exit();
}
?>
