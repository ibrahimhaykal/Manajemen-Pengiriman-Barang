<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Kecamatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form tambah data Kecamatan -->
        <form action="" method="post">
          <div class="mb-3">
            <label for="Kd_Kecamatan" class="form-label">Kode Kecamatan</label>
            <input type="text" class="form-control" id="Kd_Kecamatan" name="Kd_Kecamatan">
          </div>
          <div class="mb-3">
            <label for="Nama_Kecamatan" class="form-label">Nama Kecamatan</label>
            <input type="text" class="form-control" id="Nama_Kecamatan" name="Nama_Kecamatan">
          </div>
          <div class="mb-3">
            <label for="Kd_Kabupaten" class="form-label">Nama Kabupaten/Kota</label>
            <select class="form-select" id="Kd_Kabupaten" name="Kd_Kabupaten">
                <option value="">--Pilih--</option>
                <?php
                include '../config.php';
                $query = mysqli_query($db, "SELECT * FROM kabupatenkota");
                while ($data = mysqli_fetch_array($query)) {
                  echo "<option value='".$data['Kd_Kabupaten']."'>".$data['Nama_Kabupaten']."</option>";
                }
                ?>
              </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success" name="proses">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['proses'])){
    include '../config.php';
  
    $Kd_Kecamatan = $_POST['Kd_Kecamatan'];
    $Nama_Kecamatan = $_POST['Nama_Kecamatan'];
    $Kd_Kabupaten = $_POST['Kd_Kabupaten'];

    
    mysqli_query($db, "INSERT INTO kecamatan (Kd_Kecamatan, Kd_Kabupaten, Nama_Kecamatan) VALUES('$Kd_Kecamatan', '$Kd_Kabupaten', '$Nama_Kecamatan')");
    
    // Redirect to 'kecamatanlihat.php' with the newly inserted 'Kd_Kecamatan'
    echo "<script>window.location.href = 'kecamatanlihat1.php?Kd_Kecamatan=".$Kd_Kecamatan."';</script>";
}
?>