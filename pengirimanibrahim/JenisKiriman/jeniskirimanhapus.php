<?php
// include database connection file
include '../config.php';
 
// Get id from URL to delete that user
if (isset($_GET['ID_JenisPengiriman'])) {
    $ID_JenisPengiriman = $_GET['ID_JenisPengiriman'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($db, "DELETE FROM jeniskiriman WHERE ID_JenisPengiriman = '$ID_JenisPengiriman'");
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location: jeniskirimanlihat1.php");
}
?>