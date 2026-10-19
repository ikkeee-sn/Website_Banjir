<?php
/**
 * File: admin_logout.php
 * Fungsi: Logout admin dan hapus session
 */
session_start();

// Hapus semua session
session_unset();
session_destroy();

// Redirect ke halaman login
header('Location: admin_login.php');
exit();
?>