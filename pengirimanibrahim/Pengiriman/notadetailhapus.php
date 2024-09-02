<?php
// include database connection file
include '../koneksi.php';
 
// Get id from URL to delete that user
if (isset($_GET['kodenota'])) {
    $kodenota=$_GET['kodenota'];
}

if (isset($_GET['kodeobat'])) {
    $kodeobat=$_GET['kodeobat'];
}

 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM detailnota
WHERE kodenota = '$kodenota' AND kodeobat = '$kodeobat'");
 
// Calculate new total price after deletion
$query = "SELECT SUM(subtotal) AS total FROM detailnota WHERE kodenota = '$kodenota'";
$totalResult = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($totalResult);
$totalHargaBaru = $row['total'];

// Update total price in nota table
mysqli_query($conn, "UPDATE nota SET totalharga = '$totalHargaBaru' WHERE kodenota = '$kodenota'");

// After delete redirect to Home, so that latest user list will be displayed.
if(isset($_GET['kodenota'])){
    $kodenota = $_GET['kodenota'];
    // Gunakan nilai $kodenota untuk keperluan selanjutnya
    header("Location: notadetail.php?kodenota=$kodenota");
}
?>