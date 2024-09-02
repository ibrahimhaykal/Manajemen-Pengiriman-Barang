<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $No_Pengiriman = $_POST['No_Pengiriman'];

    // Sanitize the input to prevent SQL injection
    $No_Pengiriman = mysqli_real_escape_string($db, $No_Pengiriman);

    // Prepare the delete query
    $query = "DELETE FROM Pengiriman WHERE No_Pengiriman = '$No_Pengiriman'";

    // Execute the query
    if (mysqli_query($db, $query)) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href = 'pengirimanlihat1.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus: " . mysqli_error($db) . "'); window.location.href = 'pengirimanlihat1.php';</script>";
    }
} else {
    echo "Invalid request method.";
}
?>
