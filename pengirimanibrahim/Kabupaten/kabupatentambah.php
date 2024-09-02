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
<h3> KABUPATEN/KOTA </h3>

<form action="" method="post">
<table>
    <h4>FORM KABUPATEN/KOTA</h4>
    <tr>
        <td> Kode Kabupaten </td>
        <td> <input type="text" name="Kd_Kabupaten"> </td>
    </tr>
    <tr>
        <td> Nama Kabupaten </td>
        <td> <input type="text" name="Nama_Kabupaten"> </td>
    </tr>
    <tr>
        <td><a class="kembali" href="kabupatenlihat.php">Kembali</a></td>
        <td><input type="submit" name="proses" value="Simpan"> </td>
    </tr>

</table>

</form>
</html>
<?php

if (isset($_POST['proses'])){
    include '../config.php';
  
    $Kd_Kabupaten = $_POST['Kd_Kabupaten'];
    $Nama_Kabupaten = $_POST['Nama_Kabupaten'];
    
    mysqli_query($db, "INSERT INTO kabupatenkota VALUES('$Kd_Kabupaten','$Nama_Kabupaten')");
    header("location:kabupatenlihat.php");
}
?>