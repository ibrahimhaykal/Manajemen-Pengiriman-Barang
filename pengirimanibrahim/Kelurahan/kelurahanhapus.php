<?php
// include database connection file
include '../config.php';

// Get id from URL to delete that user
if (isset($_GET['Kd_Kelurahan'])) {
    $Kd_Kelurahan = $_GET['Kd_Kelurahan'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($db, "DELETE FROM kelurahan WHERE Kd_Kelurahan = '$Kd_Kelurahan'");
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location: kelurahanlihat1.php");
}
?>
