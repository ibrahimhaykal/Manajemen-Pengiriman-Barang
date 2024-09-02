<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Pengiriman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form tambah data pengiriman -->
        <form action="" method="post">
          <div class="mb-3">
            <label for="no_pengiriman" class="form-label">No. Pengiriman</label>
            <input type="text" class="form-control" name="No_Pengiriman" id="no_pengiriman">
          </div>
          <div class="row">
            <div class="col">
              <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
              <input type="date" class="form-control" name="Tgl_Berangkat" id="tanggal_berangkat">
            </div>
            <div class="col">
              <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
              <input type="date" class="form-control" name="Tgl_Diterima" id="tanggal_diterima">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="pengirim" class="form-label">Pengirim</label>
              <select class="form-select" name="Kd_Pengirim" id="pengirim">
                <option value="">--Pilih--</option>
                <?php
                include '../config.php';
                $query = mysqli_query($db, "SELECT * FROM DataDiriPengirim");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?php echo $data['Kd_Pengirim']; ?>">
                    <?php echo $data['Nama_Pengirim']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col">
              <label for="penerima" class="form-label">Penerima</label>
              <select class="form-select" name="Kd_Penerima" id="penerima">
                <option value="">--Pilih--</option>
                <?php
                $query = mysqli_query($db, "SELECT * FROM DataDiriPenerima");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?php echo $data['Kd_Penerima']; ?>">
                    <?php echo $data['Nama_Penerima']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="service" class="form-label">Service</label>
              <select class="form-select" name="Service" id="service">
                <option value="STS">STS</option>
                <option value="NOSTS">NOSTS</option>
              </select>
              <label for="Isi_Diperiksa" class="form-label">Isi Diperiksa</label>
              <select class="form-select" name="Isi_Diperiksa" id="Isi_Diperiksa">
                <option value="YA">YA</option>
                <option value="TIDAK">TIDAK</option>
              </select>
            </div>
            <div class="col">
              <label for="kemasan" class="form-label">Kemasan</label>
              <input type="text" class="form-control" name="Kemasan" id="kemasan">
            </div>
          </div>
          <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="number" class="form-control" name="Diskon" id="diskon" oninput="updateTerbilang()">
          </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" name="Keterangan" id="keterangan"></textarea>
          </div>
          <div class="mb-3">
            <label for="lain_lain" class="form-label">Lain - Lain</label>
            <textarea class="form-control" name="Lain_lain" id="lain_lain"></textarea>
          </div>
          <div class="row">
            <div class="col">
              <label for="penjemputan" class="form-label">Penjemputan</label>
              <input type="text" class="form-control" name="Penjemputan" id="penjemputan">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="operan" class="form-label">Operan</label>
              <input type="text" class="form-control" name="Operan" id="operan">
            </div>
            <div class="col">
              <label for="penerusan" class="form-label">Penerusan</label>
              <input type="text" class="form-control" name="Penerusan" id="penerusan">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="proses" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
function convertToWords(num) {
    const angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
    let Terbilang = "";
    if (num < 12) {
        Terbilang = angka[num];
    } else if (num < 20) {
        Terbilang = angka[num - 10] + " Belas";
    } else if (num < 100) {
        Terbilang = angka[Math.floor(num / 10)] + " Puluh " + angka[num % 10];
    } else if (num < 200) {
        Terbilang = "Seratus " + convertToWords(num - 100);
    } else if (num < 1000) {
        Terbilang = angka[Math.floor(num / 100)] + " Ratus " + convertToWords(num % 100);
    } else if (num < 2000) {
        Terbilang = "Seribu " + convertToWords(num - 1000);
    } else if (num < 1000000) {
        Terbilang = convertToWords(Math.floor(num / 1000)) + " Ribu " + convertToWords(num % 1000);
    } else if (num < 1000000000) {
        Terbilang = convertToWords(Math.floor(num / 1000000)) + " Juta " + convertToWords(num % 1000000);
    }
    return Terbilang;
}

function updateTerbilang() {
    const diskon = parseFloat(document.getElementById('diskon').value) || 0;
    const ongkosKirim = parseFloat(document.getElementById('ongkos_kirim').value) || 0;
    
    document.getElementById('sub_total').value = ongkosKirim;

    const total = ongkosKirim * (1 - diskon / 100);
    document.getElementById('Terbilang').value = convertToWords(total) + " Rupiah";
}

</script>
<?php
if (isset($_POST['proses'])){
    include '../config.php';

    $No_Pengiriman = $_POST['No_Pengiriman'];
    $Kemasan = $_POST['Kemasan'];
    $Diskon = $_POST['Diskon'];
    $Sub_Total = $_POST['Sub_Total'];
    $Ongkos_Kirim = $_POST['Ongkos_Kirim'];
    $Keterangan = $_POST['Keterangan'];
    $Lain_lain = $_POST['Lain_lain'];
    $Penjemputan = $_POST['Penjemputan'];
    $Terbilang = $_POST['Terbilang']; // Memperbaiki pengambilan nilai Terbilang dari form
    $Operan = $_POST['Operan'];
    $Tgl_Berangkat = $_POST['Tgl_Berangkat'];
    $Penerusan = $_POST['Penerusan'];
    $Tgl_Diterima = $_POST['Tgl_Diterima'];
    $Kd_Pengirim = $_POST['Kd_Pengirim'];
    $Kd_Penerima = $_POST['Kd_Penerima'];
    $Service = $_POST['Service'];
    $Isi_Diperiksa = $_POST['Isi_Diperiksa'];

    $query = "INSERT INTO pengiriman (No_Pengiriman, Kemasan, Diskon, Sub_Total, Ongkos_Kirim, Keterangan, Lain_lain, Penjemputan, Terbilang, Operan, Tgl_Berangkat, Penerusan, Tgl_Diterima, Kd_Pengirim, Kd_Penerima, Service, Isi_Diperiksa) 
              VALUES ('$No_Pengiriman', '$Kemasan', '$Diskon', '$Sub_Total', '$Ongkos_Kirim', '$Keterangan', '$Lain_lain', '$Penjemputan', '$Terbilang', '$Operan', '$Tgl_Berangkat', '$Penerusan', '$Tgl_Diterima', '$Kd_Pengirim', '$Kd_Penerima', '$Service', '$Isi_Diperiksa')";

    if (mysqli_query($db, $query)) {
        echo "<script>window.location.href = 'pengirimandetail.php?No_Pengiriman=".$No_Pengiriman."';</script>";
    }
}
?>

