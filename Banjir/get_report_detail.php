<?php
/**
 * File: get_report_detail.php
 * Fungsi: Mengambil detail laporan untuk modal
 */
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

include 'connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql = "SELECT * FROM reports WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $report = mysqli_fetch_assoc($result);
        
        // Format tanggal dan waktu
        $report['tanggal_formatted'] = date('d F Y', strtotime($report['tanggal']));
        $report['waktu_formatted'] = date('H:i', strtotime($report['waktu']));
        
        echo json_encode(['success' => true, 'report' => $report]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Report not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID not provided']);
}
?>