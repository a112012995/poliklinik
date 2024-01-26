<?php
require '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jadwalId = $_POST['jadwalId'];

    // Retrieve the current 'active' status
    $currentStatusQuery = "SELECT active FROM jadwal_periksa WHERE id = '$jadwalId'";
    $currentStatusResult = mysqli_query($mysqli, $currentStatusQuery);

    if ($currentStatusResult) {
        $currentStatus = mysqli_fetch_assoc($currentStatusResult)['active'];

        // Toggle the 'active' status
        $newStatus = $currentStatus ? 0 : 1;

        // Update the 'active' status
        $updateQuery = "UPDATE jadwal_periksa SET active = $newStatus WHERE id = '$jadwalId'";
        mysqli_query($mysqli, $updateQuery);
    }

    // Redirect back to the previous page or wherever needed
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>
