<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Jenis Pengiriman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="ID_JenisPengiriman" class="form-label">ID Jenis Kiriman</label>
                            <input type="text" class="form-control" name="ID_JenisPengiriman" id="ID_JenisPengiriman">
                        </div>
                        <div class="mb-3">
                            <label for="KeteranganIsiPengiriman" class="form-label">Keterangan Isi Pengiriman</label>
                            <input type="text" class="form-control" name="KeteranganIsiPengiriman" id="KeteranganIsiPengiriman">
                        </div>
                        <div class="mb-3">
                            <label for="Harga_Kg" class="form-label">Harga/Kg</label>
                            <input type="number" class="form-control" name="Harga_Kg" id="Harga_Kg">
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
  
    $ID_JenisPengiriman = $_POST['ID_JenisPengiriman'];
    $KeteranganIsiPengiriman = $_POST['KeteranganIsiPengiriman'];
    $Harga_Kg = $_POST['Harga_Kg'];
    
    mysqli_query($db, "INSERT INTO jeniskiriman VALUES('$ID_JenisPengiriman','$KeteranganIsiPengiriman','$Harga_Kg')");
    if (mysqli_query($db, $query)) {
        echo "<script>window.location.href = 'jeniskirimanlihat1.php?ID_JenisPengiriman=".$ID_JenisPengiriman."';</script>";
      }
}
?>