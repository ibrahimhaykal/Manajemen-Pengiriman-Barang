<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Kd_Pengirim = $_POST['Kd_Pengirim'];

    // Sanitize the input to prevent SQL injection
    $Kd_Pengirim = mysqli_real_escape_string($db, $Kd_Pengirim);

    // Prepare the delete query
    $query = "DELETE FROM datadiripengirim WHERE Kd_Pengirim = '$Kd_Pengirim'";

    // Execute the query
    if (mysqli_query($db, $query)) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus: " . mysqli_error($db) . "');</script>";
    }
}
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location: datadiripengirimlihat1.php");
    exit;
?>
