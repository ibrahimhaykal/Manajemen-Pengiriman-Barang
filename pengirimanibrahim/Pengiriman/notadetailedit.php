<?php
    include '../config.php';
    $query = mysqli_query($db, "SELECT * FROM nota WHERE kodenota = '$_GET[kodenota]'");
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
<h3>KLINIK MELYAN</h3>

<form action="" method="post">
    <table>
        <h4>FORM DETAIL NOTA: <?php echo $data['kodenota']; ?></h4>

        <tr>
            <td>Kode Nota</td>
            <td><input type="text" name="kodenota" value="<?php echo $data['kodenota']; ?>" readonly></td>
        </tr>

        <tr>
            <td>
                Kode Obat
                <td>
                    <select name="kodeobat" style="width:170px;">
                        <option value="">--Pilih--</option>
                        <?php
                            include '../config.php';
                            $query = mysqli_query($db, "SELECT * FROM obat");
                            while ($obat = mysqli_fetch_array($query)) {
                                echo "<option value='$obat[kodeobat]' data-harga='$obat[tarifsatuan]'>$obat[kodeobat] - $obat[namaobat] - $obat[tarifsatuan]</option>";
                            }
                        ?>
                    </select>
                </td>
            </td>
        </tr>

        <tr>
            <td>Kuantitas</td>
            <td><input type="number" name="qty"></td>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td><input type="number" name="subtotal" readonly></td>
        </tr>

        <tr>
            <td><a class="kembali" href="nota.php">Kembali</a></td>
            <td><input type="submit" name="proses" value="Simpan Detail Nota"></td>
        </tr>
    </table>
</form>
<script>
    // Ambil elemen-elemen yang diperlukan
    var selectBarang = document.querySelector("select[name='kodeobat']");
    var inputQty = document.querySelector("input[name='qty']");
    var inputTotal = document.querySelector("input[name='subtotal']");

    // Fungsi untuk menghitung total
    function hitungTotal() {
        var harga = selectBarang.options[selectBarang.selectedIndex].getAttribute("data-harga");
        var qty = inputQty.value;
        var total = harga * qty;
        inputTotal.value = total;
    }

    // Panggil fungsi hitungTotal saat nilai input berubah
    selectBarang.addEventListener("change", hitungTotal);
    inputQty.addEventListener("input", hitungTotal);
</script>
</html>

<?php
    include '../config.php';
    $kodenota = $_GET['kodenota'];
    $queryTotal = "SELECT totalharga FROM nota WHERE kodenota = '$kodenota'";
    $resultTotal = mysqli_query($db, $queryTotal);
    $rowTotal = mysqli_fetch_assoc($resultTotal);
    $totalSebelumnya = $rowTotal['totalharga'];

    if (isset($_POST['proses'])) {
        $kodenota = $_POST['kodenota'];
        $kodeobat = $_POST['kodeobat'];
        $qty = $_POST['qty'];
        $subtotal = $_POST['subtotal'];

        $queryInsert = "UPDATE detailnota SET qty='$qty', subtotal='$subtotal' WHERE kodenota='$kodenota' AND kodeobat='$kodeobat'";
        $resultInsert = mysqli_query($db, $queryInsert);

        if ($resultInsert) {
            // Mengupdate nilai total
            $total = $totalSebelumnya += $subtotal;
            $queryUpdateTotal="UPDATE nota SET totalharga=(SELECT SUM(subtotal) FROM detailnota WHERE kodenota='$kodenota')";
            $resultUpdateTotal = mysqli_query($db, $queryUpdateTotal);

            header("Location: notadetail.php?kodenota=$kodenota");
            exit;
        }
    }
?>
