<?php
include '../config.php';
$query = mysqli_query($db, "SELECT * FROM jeniskiriman WHERE ID_JenisPengiriman = '$_GET[ID_JenisPengiriman]'");
$data = mysqli_fetch_array($query);
?>

<html>
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

    input[type="text"] {
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
<form action="" method="post">
<table>
    <h4>FORM UBAH JENIS KIRIMAN</h4>
    <tr>
        <td>ID Jenis Kiriman</td>
        <td><input type="text" name="ID_JenisPengiriman" value="<?php echo $data['ID_JenisPengiriman']; ?>" readonly></td>
    </tr>

    <tr>
        <td>Keterangan Isi Kiriman</td>
        <td><input type="text" name="KeteranganIsiPengiriman" value="<?php echo $data['KeteranganIsiPengiriman']; ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="proses" value="Ubah Jenis Kiriman">|<a class="kembali" href="jeniskirimanlihat.php">kembali</a></td>
    </tr>
</form>
</table>

</html>

<?php
if (isset($_POST['proses'])){
    include '../config.php';
    $ID_JenisPengiriman = $_POST['ID_JenisPengiriman'];
    $KeteranganIsiPengiriman = $_POST['KeteranganIsiPengiriman'];

    mysqli_query($db, "UPDATE jeniskiriman SET KeteranganIsiPengiriman='$KeteranganIsiPengiriman' WHERE ID_JenisPengiriman='$ID_JenisPengiriman'");
    header("location:jeniskirimanlihat.php");
}
?>
