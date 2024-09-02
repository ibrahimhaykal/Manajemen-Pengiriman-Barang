<?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "Select*from nota where kodenota = '$_GET[kodenota]'");
            $data = mysqli_fetch_array($query);
            
                ?>
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
    <h4>FORM DETAIL NOTA : <?php echo $data['kodenota'];?></h4>

    <tr>
        <td> Kode Nota </td>
        <td> <input type="text" name="kodenota" value="<?php echo $data['kodenota'];?>" readonly> </td>
    </tr>

        <tr>
        <td> 
        Kode Obat
        <td><select name="kodeobat" style="width:170px;">
        <option value="">--Pilih--</option>
        <?php
        include '../koneksi.php';
        $query=mysqli_query($conn, "SELECT * FROM obat");
        while ($data = mysqli_fetch_array($query)) {
            echo "<option value='$data[kodeobat]' data-harga='$data[tarifsatuan]'>$data[kodeobat] - $data[namaobat] - $data[tarifsatuan]</option>";
        }
        ?>
            
            
        </td>
        </select>
        </td></tr>
        

    <tr>
        <td> Kuantitas </td>
        <td> <input type="number" name="qty"> </td>
    </tr>
    <tr>
    
        <td> Subtotal </td>
        <td> <input type="number" name="subtotal" readonly> </td>
    </tr>

    <tr>
        <td><a class="kembali" href="nota.php">Kembali</a></td>
        <td><input type="submit" name="proses" value="Simpan DetailNota"> </td>
    </tr>
</form>
<script>
            // Ambil elemen-elemen yang diperlukan
            var selectBarang = document.querySelector("select[name='kodeobat']");
            var inputqty = document.querySelector("input[name='qty']");
            var inputTotal = document.querySelector("input[name='subtotal']");

            // Fungsi untuk menghitung total
            function hitungTotal() {
                var harga = selectBarang.options[selectBarang.selectedIndex].getAttribute("data-harga");
                var qty = inputqty.value;
                var total = harga * qty;
                inputTotal.value = total;
            }

            // Panggil fungsi hitungTotal saat nilai input berubah
            selectBarang.addEventListener("change", hitungTotal);
            inputqty.addEventListener("input", hitungTotal);

            
        </script>
</table>
</html>
<?php   
    include '../koneksi.php';
    $kodenota = $_GET['kodenota'];
    $query_total = "SELECT totalharga FROM nota WHERE kodenota = '$kodenota'";
    $result_total = mysqli_query($conn, $query_total);
    $row_total = mysqli_fetch_assoc($result_total);
    $total_sebelumnya = $row_total['totalharga'];


if (isset($_POST['proses'])){
    
    
    $kodenota = $_POST['kodenota'];
    $kodeobat = $_POST['kodeobat'];
    $qty = $_POST['qty'];
    $subtotal = $_POST['subtotal'];
    
    $query_insert = "INSERT INTO detailnota VALUES('$kodenota','$kodeobat','$qty','$subtotal')";
    $result_insert = mysqli_query($conn, $query_insert);

        
        
        if ($result_insert) {
            // Mengupdate nilai total
            $total = $total_sebelumnya += $subtotal;
            $query_update_total = "UPDATE nota SET totalharga = '$total' WHERE kodenota = '$kodenota'";
            $result_update_total = mysqli_query($conn, $query_update_total);
        
        header("Location: notadetail.php?kodenota=$kodenota");
        exit;
    }

    
}
?>