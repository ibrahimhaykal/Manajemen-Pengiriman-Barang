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
    <h3> DATA DIRI PENGIRIM </h3>

    <form action="" method="post">
        <table>
            <h4>FORM DATA DIRI PENGIRIM</h4>
            <tr>
                <td> Kode Pengirim </td>
                <td> <input type="text" name="Kd_Pengirim"> </td>
            </tr>

            <tr>
                <td> Nama Pengirim </td>
                <td> <input type="text" name="Nama_Pengirim"> </td>
            </tr>
            <tr>
                <td> Alamat Pengirim </td>
                <td> <input type="text" name="Alamat_Pengirim"> </td>
            </tr>
            <tr>
                <td> No.Telp Pengirim </td>
                <td> <input type="text" name="No_Telp_Pengirim"> </td>
            </tr>
            <tr>
                <td> Kelurahan </td>
                <td>
                    <select name="Kd_Kelurahan" style="width:170px;">
                        <option value="">--Pilih--</option>
                        <?php
                        include '../config.php';
                        $query = mysqli_query($db, "SELECT * FROM kelurahan");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['Kd_Kelurahan']; ?>">
                                <?php echo $data['Nama_Kelurahan']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><a class="kembali" href="datadiripengirimlihat.php">Kembali</a></td>
                <td><input type="submit" name="proses" value="Simpan Data Diri"> </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if (isset($_POST['proses'])){
    include '../config.php';
  
    $Kd_Pengirim = $_POST['Kd_Pengirim'];
    $Kd_Kelurahan = $_POST['Kd_Kelurahan'];
    $Nama_Pengirim = $_POST['Nama_Pengirim'];
    $Alamat_Pengirim = $_POST['Alamat_Pengirim'];
    $No_Telp_Pengirim = $_POST['No_Telp_Pengirim'];
    
    mysqli_query($db, "INSERT INTO datadiripengirim (Kd_Pengirim, Kd_Kelurahan, Nama_Pengirim, Alamat_Pengirim, No_Telp_Pengirim) VALUES('$Kd_Pengirim', '$Kd_Kelurahan', '$Nama_Pengirim', '$Alamat_Pengirim', '$No_Telp_Pengirim')");
    
    // Gunakan nilai $kodenota untuk keperluan selanjutnya
    echo "<script>window.location.href = 'datadiripengirimlihat.php?Kd_Pengirim=".$Kd_Pengirim."';</script>";
}
?>
