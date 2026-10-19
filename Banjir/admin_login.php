<?php
/**
 * File: admin_login.php
 * Fungsi: Halaman login untuk administrator sistem
 */
session_start();
include 'connection.php';

$error_message = '';

// Cek jika sudah login, redirect ke dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit();
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Query untuk mencari admin
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);
        
        // Verifikasi password
        if ($password === $admin['password']) {
            // Login berhasil
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_nama'] = $admin['nama_lengkap'];
            
            header('Location: admin_dashboard.php');
            exit();
        } else {
            $error_message = 'Username atau password salah!';
        }
    } else {
        $error_message = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sistem Informasi Bencana Banjir</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&family=Knewave&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigasi -->
    <nav class="navbar">
        <div class="container">
            <img src="uploads/logobanjir.png" alt="" class="logo">
            <div class="nav-brand">Info Banjir</div>
            <ul class="nav-menu">
                <li><a href="index.html">Beranda</a></li>
                <li><a href="report.php">Lapor</a></li>
                <li><a href="news.php">Berita</a></li>
                <li><a href="admin_login.php" class="active">Admin</a></li>
                <li><a href="info.html">Info</a></li>
            </ul>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-header">
                    <h1>Login <br>Administrator</h1>
                    <p>Masuk untuk mengakses panel admin dan data laporan</p>
                </div>

                <?php if ($error_message): ?>
                <div class="alert alert-error">
                    <?php echo $error_message; ?>
                </div>
                <?php endif; ?>

                <form method="POST" action="admin_login.php" class="login-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required placeholder="Masukkan username admin">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Masukkan password">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-full">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Sistem Informasi Bencana Banjir. Dibuat untuk kepentingan pendidikan.</p>
        </div>
    </footer>
</body>
</html>

<!-- -- Database: flood_db
CREATE DATABASE IF NOT EXISTS flood_db;
USE flood_db;

-- Tabel: reports
CREATE TABLE IF NOT EXISTS reports (
id INT AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(100) NOT NULL,
lokasi VARCHAR(255) NOT NULL,
latitude DECIMAL(10, 8) DEFAULT NULL,
longitude DECIMAL(11, 8) DEFAULT NULL,
tanggal DATE NOT NULL,
waktu TIME NOT NULL,
deskripsi TEXT NOT NULL,
gambar VARCHAR(255) DEFAULT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel: admin (untuk login admin)
CREATE TABLE IF NOT EXISTS admin (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
nama_lengkap VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data admin default (password: admin123)
INSERT INTO admin (username, password, nama_lengkap, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator Sistem', 'admin@floodsystem.local'); -->