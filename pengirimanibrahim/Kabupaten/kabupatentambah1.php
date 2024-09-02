<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Pengiriman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="Kd_Kabupaten" class="form-label">ID Jenis Kiriman</label>
                            <input type="text" class="form-control" name="Kd_Kabupaten" id="Kd_Kabupaten">
                        </div>
                        <div class="mb-3">
                            <label for="Nama_Kabupaten" class="form-label">Keterangan Isi Pengiriman</label>
                            <input type="text" class="form-control" name="Nama_Kabupaten" id="Nama_Kabupaten">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="proses" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
if (isset($_POST['proses'])){
    include '../config.php';
  
    $Kd_Kabupaten = $_POST['Kd_Kabupaten'];
    $Nama_Kabupaten = $_POST['Nama_Kabupaten'];
    
    mysqli_query($db, "INSERT INTO kabupatenkota VALUES('$Kd_Kabupaten','$Nama_Kabupaten')");
    if (mysqli_query($db, $query)) {
        echo "<script>window.location.href = 'kabupatenlihat1.php?Kd_Kabupaten=".$Kd_Kabupaten."';</script>";
      }
}
?>