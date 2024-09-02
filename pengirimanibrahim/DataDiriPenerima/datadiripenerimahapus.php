<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Kd_Penerima = $_POST['Kd_Penerima'];

    // Sanitize the input to prevent SQL injection
    $Kd_Penerima = mysqli_real_escape_string($db, $Kd_Penerima);

    // Prepare the delete query
    $query = "DELETE FROM datadiripenerima WHERE Kd_Penerima = '$Kd_Penerima'";

    // Execute the query
    if (mysqli_query($db, $query)) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus: " . mysqli_error($db) . "');</script>";
    }
}
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location: datadiripenerimalihat1.php");
    exit;
?>
