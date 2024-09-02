<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Kelurahan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form tambah data Kelurahan -->
        <form action="" method="post">
          <div class="mb-3">
            <label for="Kd_Kelurahan" class="form-label">Kode Kelurahan</label>
            <input type="text" class="form-control" id="Kd_Kelurahan" name="Kd_Kelurahan">
          </div>
          <div class="mb-3">
            <label for="Kd_Kecamatan" class="form-label">Kode Kecamatan</label>
            <select class="form-select" id="Kd_Kecamatan" name="Kd_Kecamatan">
                <option value="">--Pilih--</option>
                <?php
                include '../config.php';
                $query = mysqli_query($db, "SELECT * FROM kecamatan");
                while ($data = mysqli_fetch_array($query)) {
                  echo "<option value='".$data['Kd_Kecamatan']."'>".$data['Nama_Kecamatan']."</option>";
                }
                ?>
              </select>
          </div>
          <div class="mb-3">
            <label for="Nama_Kelurahan" class="form-label">Nama Kelurahan</label>
            <input type="text" class="form-control" id="Nama_Kelurahan" name="Nama_Kelurahan">
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
  
    $Kd_Kelurahan = $_POST['Kd_Kelurahan'];
    $Kd_Kecamatan = $_POST['Kd_Kecamatan'];
    $Nama_Kelurahan = $_POST['Nama_Kelurahan'];
    
    mysqli_query($db, "INSERT INTO kelurahan (Kd_Kelurahan, Kd_Kecamatan, Nama_Kelurahan) VALUES('$Kd_Kelurahan', '$Kd_Kecamatan', '$Nama_Kelurahan')");
    
    // Redirect to 'kelurahanlihat.php' with the newly inserted 'Kd_Kelurahan'
    echo "<script>window.location.href = 'kelurahanlihat1.php?Kd_Kelurahan=".$Kd_Kelurahan."';</script>";
}
?>
