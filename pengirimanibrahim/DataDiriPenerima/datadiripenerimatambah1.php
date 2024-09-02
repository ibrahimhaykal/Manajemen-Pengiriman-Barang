<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Penerima</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form tambah data penerima -->
        <form action="" method="post">
          <div class="mb-3">
            <label for="Kd_Penerima" class="form-label">Kode Penerima</label>
            <input type="text" class="form-control" id="Kd_Penerima" name="Kd_Penerima">
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
              <label for="Nama_Penerima" class="form-label">Nama Penerima</label>
              <input type="text" class="form-control" id="Nama_Penerima" name="Nama_Penerima">
            </div>
          </div>
          <div class="mb-3">
            <label for="Alamat_Penerima" class="form-label">Alamat Penerima</label>
            <textarea class="form-control" id="Alamat_Penerima" name="Alamat_Penerima"></textarea>
          </div>
          <div class="mb-3">
            <label for="No_Telp_Penerima" class="form-label">No. Telp Penerima</label>
            <input type="tel" class="form-control" id="No_Telp_Penerima" name="No_Telp_Penerima">
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
  
    $Kd_Penerima = $_POST['Kd_Penerima'];
    $Kd_Kelurahan = $_POST['Kd_Kelurahan'];
    $Nama_Penerima = $_POST['Nama_Penerima'];
    $Alamat_Penerima = $_POST['Alamat_Penerima'];
    $No_Telp_Penerima = $_POST['No_Telp_Penerima'];
    
    mysqli_query($db, "INSERT INTO datadiripenerima (Kd_Penerima, Kd_Kelurahan, Nama_Penerima, Alamat_Penerima, No_Telp_Penerima) VALUES('$Kd_Penerima', '$Kd_Kelurahan', '$Nama_Penerima', '$Alamat_Penerima', '$No_Telp_Penerima')");
    
    // Gunakan nilai $kodenota untuk keperluan selanjutnya
    echo "<script>window.location.href = 'datadiripenerimalihat1.php?Kd_Penerima=".$Kd_Penerima."';</script>";
}
?>
