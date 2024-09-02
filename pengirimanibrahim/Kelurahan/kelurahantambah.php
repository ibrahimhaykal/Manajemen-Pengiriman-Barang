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
    <h3> KELURAHAN </h3>

    <form action="" method="post">
        <table>
            <h4>FORM KELURAHAN</h4>
            <tr>
                <td> Kode Kelurahan </td>
                <td> <input type="text" name="Kd_Kelurahan"> </td>
            </tr>

            <tr>
                <td> Nama Kelurahan </td>
                <td> <input type="text" name="Nama_Kelurahan"> </td>
            </tr>
            <tr>
                <td> Kecamatan </td>
                <td>
                    <select name="Kd_Kecamatan" style="width:170px;">
                        <option value="">--Pilih--</option>
                        <?php
                        include '../config.php';
                        $query = mysqli_query($db, "SELECT * FROM kecamatan");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $data['Kd_Kecamatan']; ?>">
                                <?php echo $data['Nama_Kecamatan']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><a class="kembali" href="kelurahanlihat.php">Kembali</a></td>
                <td><input type="submit" name="proses" value="Simpan"> </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
if (isset($_POST['proses'])){
    include '../config.php';
  
    $Kd_Kelurahan = $_POST['Kd_Kelurahan'];
    $Kd_Kecamatan = $_POST['Kd_Kecamatan'];
    $Nama_Kelurahan = $_POST['Nama_Kelurahan'];
    
    mysqli_query($db, "INSERT INTO kelurahan (Kd_Kelurahan, Kd_Kecamatan, Nama_Kelurahan) VALUES('$Kd_Kelurahan', '$Kd_Kecamatan', '$Nama_Kelurahan')");
    
    // Redirect to 'kelurahanlihat.php' with the newly inserted 'Kd_Kelurahan'
    echo "<script>window.location.href = 'kelurahanlihat.php?Kd_Kelurahan=".$Kd_Kelurahan."';</script>";
}
?>
