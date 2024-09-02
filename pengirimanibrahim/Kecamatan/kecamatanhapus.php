<?php
// include database connection file
include '../config.php';

// Get id from URL to delete that user
if (isset($_GET['Kd_Kecamatan'])) {
    $Kd_Kecamatan = $_GET['Kd_Kecamatan'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($db, "DELETE FROM kecamatan WHERE Kd_Kecamatan = '$Kd_Kecamatan'");
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location: kecamatanlihat1.php");
}
?>
