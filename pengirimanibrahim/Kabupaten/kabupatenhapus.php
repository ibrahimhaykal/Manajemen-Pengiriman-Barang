<?php
// include database connection file
include '../config.php';
 
// Get id from URL to delete that user
if (isset($_GET['Kd_Kabupaten'])) {
    $Kd_Kabupaten = $_GET['Kd_Kabupaten'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($db, "DELETE FROM kabupatenkota WHERE Kd_Kabupaten = '$Kd_Kabupaten'");
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location: kabupatenlihat1.php");
}
?>