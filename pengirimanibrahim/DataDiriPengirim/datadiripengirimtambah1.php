<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Pengirim</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form tambah data Pengirim -->
        <form action="" method="post">
          <div class="mb-3">
            <label for="Kd_Pengirim" class="form-label">Kode Pengirim</label>
            <input type="text" class="form-control" id="Kd_Pengirim" name="Kd_Pengirim">
          </div>
          <div class="row">
            <div class="col">
              <label for="Kd_Kelurahan" class="form-label">Kelurahan</label>
              <select class="form-select" id="Kd_Kelurahan" name="Kd_Kelurahan">
                <option value="">--Pilih--</option>
                <?php
                include '../config.php';
                $query = mysqli_query($db, "SELECT * FROM kelurahan");
                while ($data = mysqli_fetch_array($query)) {
                  echo "<option value='".$data['Kd_Kelurahan']."'>".$data['Nama_Kelurahan']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="col">
              <label for="Nama_Pengirim" class="form-label">Nama Pengirim</label>
              <input type="text" class="form-control" id="Nama_Pengirim" name="Nama_Pengirim">
            </div>
          </div>
          <div class="mb-3">
            <label for="Alamat_Pengirim" class="form-label">Alamat Pengirim</label>
            <textarea class="form-control" id="Alamat_Pengirim" name="Alamat_Pengirim"></textarea>
          </div>
          <div class="mb-3">
            <label for="No_Telp_Pengirim" class="form-label">No. Telp Pengirim</label>
            <input type="tel" class="form-control" id="No_Telp_Pengirim" name="No_Telp_Pengirim">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
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
    echo "<script>window.location.href = 'datadiripengirimlihat1.php?Kd_Pengirim=".$Kd_Pengirim."';</script>";
}
?>
