<html>
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
<h3> KLINIK MELYAN </h3>

<form action="" method="post">
<table>
    <h4>FORM NOTA</h4>
    <tr>
        <td> Kode Nota </td>
        <td> <input type="text" name="kodenota"> </td>
    </tr>

    <tr>
        <td> Tanggal Nota </td>
        <td> <input type="date" name="tglnota"> </td>
    </tr>

        <tr><td> 
        Nama Pasien
        <td><select name="kodepasien" style="width:170px;">
        <option value="">--Pilih--</option>
        <?php
        include '../koneksi.php';
        $query=mysqli_query($conn, "SELECT * FROM pasien");
        while ($data = mysqli_fetch_array($query)) {
        ?>
          
            <option value="<?php echo $data['kodepasien'];?>" >
            <?php echo $data['namapasien'];?></option>
        <?php
        }
        ?></td>
        </select>
        </td></tr>

        <tr>
        <td> 
        Nama Dokter
        <td><select name="kodedokter" style="width:170px;">
        <option value="">--Pilih--</option>
        <?php
        include '../koneksi.php';
        $query=mysqli_query($conn, "SELECT * FROM dokter");
       
        while ($data = mysqli_fetch_array($query)) {
        ?>
            
            <option value="<?php echo $data['kodedokter'];?>" >
            <?php echo $data['namadokter'];?></option>
        <?php
        }
        ?></td>
        </select>
        </td></tr>

    <tr>
        <td><a class="kembali" href="nota.php">Kembali</a></td>
        <td><input type="submit" name="proses" value="Simpan Nota"> </td>
    </tr>
</form>
</table>
</html>
<?php

if (isset($_POST['proses'])){
    include '../koneksi.php';
  
    $kodenota = $_POST['kodenota'];
    $kodedokter = $_POST['kodedokter'];
    $kodepasien = $_POST['kodepasien'];
    $tglnota = $_POST['tglnota'];

    
    
    mysqli_query($conn, "INSERT INTO nota VALUES('$kodenota','$tglnota','$kodepasien','$kodedokter',NULL)");
    
        // Gunakan nilai $kodenota untuk keperluan selanjutnya
        echo "<script>window.location.href = 'notadetail.php?kodenota=".$kodenota."';</script>";

    
}
?>