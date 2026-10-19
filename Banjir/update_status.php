<?php
/**
 * File: update_report_status.php
 * Fungsi: Memproses update status laporan banjir
 */
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

include 'connection.php'; // Asumsikan file koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $report_id = isset($_POST['report_id']) ? intval($_POST['report_id']) : 0;
    $new_status = isset($_POST['new_status']) ? trim($_POST['new_status']) : '';

    if ($report_id > 0 && !empty($new_status)) {
        // Sanitasi input
        $new_status_safe = mysqli_real_escape_string($conn, $new_status);
        
        // Query UPDATE
        $sql_update = "UPDATE reports SET status = '$new_status_safe' WHERE id = $report_id";
        
        if (mysqli_query($conn, $sql_update)) {
            // Redirect kembali ke dashboard dengan pesan sukses
            header('Location: admin_dashboard.php?status_updated=success');
            exit();
        } else {
            // Redirect kembali ke dashboard dengan pesan error
            header('Location: admin_dashboard.php?status_updated=error');
            exit();
        }
    } else {
        // Input tidak valid
        header('Location: admin_dashboard.php?status_updated=invalid');
        exit();
    }
} else {
    // Akses langsung tidak diizinkan
    header('Location: admin_dashboard.php');
    exit();
}
?>