<?php
// Include database connection file
include '../config.php';

// Get No_Pengiriman and ID_JenisPengiriman from URL to delete the record
if (isset($_GET['No_Pengiriman']) && isset($_GET['ID_JenisPengiriman'])) {
    $No_Pengiriman = $_GET['No_Pengiriman'];
    $ID_JenisPengiriman = $_GET['ID_JenisPengiriman'];

    // Fetch the current Sub_Total from pengiriman table
    $query_total = "SELECT Sub_Total FROM pengiriman WHERE No_Pengiriman = '$No_Pengiriman'";
    $result_total = mysqli_query($db, $query_total);
    if (!$result_total) {
        die("Error fetching current total: " . mysqli_error($db));
    }
    $row_total = mysqli_fetch_assoc($result_total);
    $total_sebelumnya = $row_total['Sub_Total'];

    // Fetch the Jumlah value of the record to be deleted
    $query_detail = "SELECT Jumlah FROM detailpengiriman WHERE No_Pengiriman = '$No_Pengiriman' AND ID_JenisPengiriman = '$ID_JenisPengiriman'";
    $result_detail = mysqli_query($db, $query_detail);
    if (!$result_detail) {
        die("Error fetching detail record: " . mysqli_error($db));
    }
    $row_detail = mysqli_fetch_assoc($result_detail);
    $Jumlah_to_delete = $row_detail['Jumlah'];

    // Calculate the new total price
    $total_baru = $total_sebelumnya - $Jumlah_to_delete;

    // Delete record from detail table based on given No_Pengiriman and ID_JenisPengiriman
    $result = mysqli_query($db, "DELETE FROM detailpengiriman WHERE No_Pengiriman = '$No_Pengiriman' AND ID_JenisPengiriman = '$ID_JenisPengiriman'");
    if (!$result) {
        die("Error deleting record: " . mysqli_error($db));
    }

    // Update total price in pengiriman table
    $updateResult = mysqli_query($db, "UPDATE pengiriman SET Sub_Total = '$total_baru' WHERE No_Pengiriman = '$No_Pengiriman'");
    if (!$updateResult) {
        die("Error updating total price: " . mysqli_error($db));
    }

    // Redirect to pengirimandetail page after deletion
    header("Location: pengirimandetail.php?No_Pengiriman=$No_Pengiriman");
    exit;
} else {
    die("Invalid request");
}
?>
