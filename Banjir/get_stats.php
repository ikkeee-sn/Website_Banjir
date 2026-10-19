<?php
/**
 * File: get_stats.php
 * Fungsi: Mengambil statistik untuk dashboard
 */
include 'connection.php';

// Hitung total laporan
$sql_total = "SELECT COUNT(*) as total FROM reports";
$result_total = mysqli_query($conn, $sql_total);
$total = mysqli_fetch_assoc($result_total)['total'];

// Hitung jumlah wilayah unik
$sql_areas = "SELECT COUNT(DISTINCT lokasi) as areas FROM reports";
$result_areas = mysqli_query($conn, $sql_areas);
$areas = mysqli_fetch_assoc($result_areas)['areas'];

// Tentukan status bahaya berdasarkan jumlah laporan
$status = 'Aman';
if ($total >= 10) {
    $status = 'Siaga';
} elseif ($total >= 5) {
    $status = 'Waspada';
}

// Return data dalam format JSON
header('Content-Type: application/json');
echo json_encode([
    'total' => $total,
    'areas' => $areas,
    'status' => $status
]);
?>