<?php
/**
 * File: admin_dashboard.php
 * Fungsi: Dashboard admin untuk mengelola data laporan
 */
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}

include 'connection.php';

// Proses hapus laporan jika ada request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // Ambil nama file gambar sebelum dihapus
    $sql_get_image = "SELECT gambar FROM reports WHERE id = $delete_id";
    $result_image = mysqli_query($conn, $sql_get_image);
    if ($row_image = mysqli_fetch_assoc($result_image)) {
        if ($row_image['gambar'] && file_exists('uploads/' . $row_image['gambar'])) {
            unlink('uploads/' . $row_image['gambar']);
        }
    }
    
    // Hapus dari database
    $sql_delete = "DELETE FROM reports WHERE id = $delete_id";
    if (mysqli_query($conn, $sql_delete)) {
        $success_message = "Laporan berhasil dihapus!";
    } else {
        $error_message = "Gagal menghapus laporan!";
    }
}

// Query untuk mengambil semua laporan
$sql = "SELECT * FROM reports ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Query untuk statistik
$sql_stats = "SELECT 
    COUNT(*) as total_reports,
    COUNT(DISTINCT lokasi) as unique_locations,
    COUNT(CASE WHEN DATE(created_at) = CURDATE() THEN 1 END) as today_reports
    FROM reports";
$result_stats = mysqli_query($conn, $sql_stats);
$stats = mysqli_fetch_assoc($result_stats);

// Query untuk mengambil semua laporan - TAMBAHKAN kolom status
$sql = "SELECT *, COALESCE(status, 'Belum Ditangani') as status FROM reports ORDER BY created_at DESC"; 
// COALESCE digunakan untuk memastikan nilai default 'Belum Ditangani' jika kolom status baru
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem Informasi Bencana Banjir</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&family=Knewave&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigasi Admin -->
    <nav class="navbar navbar-admin">
        <div class="container">
            <div class="nav-brand">🔐 Admin Panel</div>
            <div class="nav-admin-info">
                <span>Selamat datang, <?php echo htmlspecialchars($_SESSION['admin_nama']); ?></span>
                <a href="admin_logout.php" class="btn btn-logout">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Admin Dashboard -->
    <section class="admin-dashboard">
        <div class="container">
            <div class="dashboard-header">
                <h1>Dashboard Administrator</h1>
                <p>Kelola data laporan banjir dari masyarakat</p>
            </div>

            <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
            <?php endif; ?>

            <?php if (isset($error_message)): ?>
            <div class="alert alert-error">
                <?php echo $error_message; ?>
            </div>
            <?php endif; ?>

            <!-- Statistik Admin -->
            <div class="admin-stats">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">📊</div>
                        <h3><?php echo $stats['total_reports']; ?></h3>
                        <p>Total Laporan</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">📍</div>
                        <h3><?php echo $stats['unique_locations']; ?></h3>
                        <p>Lokasi Unik</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">📅</div>
                        <h3><?php echo $stats['today_reports']; ?></h3>
                        <p>Laporan Hari Ini</p>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Laporan -->
            <div class="admin-table-section">
                <div class="table-header">
                    <h2>Data Laporan Banjir</h2>
                    <div class="table-actions">
                        <input type="text" id="adminSearchInput" placeholder="Cari laporan..." class="search-input">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pelapor</th>
                                <th>Lokasi</th>
                                <th>Koordinat</th>
                                <th>Tanggal/Waktu</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="adminTableBody">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Tentukan kelas CSS untuk status
                                    $status_class = ($row['status'] == 'Sudah Ditangani') ? 'status-success' : 'status-pending';
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['lokasi']) . "</td>";
                                    echo "<td>";
                                    if ($row['latitude'] && $row['longitude']) {
                                        echo $row['latitude'] . ", " . $row['longitude'];
                                    } else {
                                        echo "<span class='no-coord'>Tidak ada</span>";
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    echo date('d/m/Y', strtotime($row['tanggal'])) . "<br>";
                                    echo "<small>" . date('H:i', strtotime($row['waktu'])) . "</small>";
                                    echo "</td>";
                                    echo "<td class='desc-cell'>" . htmlspecialchars(substr($row['deskripsi'], 0, 80)) . "...</td>";
                                    echo "<td>";
                                    if ($row['gambar']) {
                                        echo "<a href='uploads/" . $row['gambar'] . "' target='_blank' class='btn-view-small'>Lihat</a>";
                                    } else {
                                        echo "<span class='no-image'>Tidak ada</span>";
                                    }
                                    echo "</td>";
                                    // KOLOM STATUS
                                    echo "<td><span class='status-badge " . $status_class . "'>" . $row['status'] . "</span></td>"; 
                                    // KOLOM STATUS
                                    echo "<td class='action-buttons'>";
                                    // Ganti tombol Lihat Detail jadi tombol EDIT/UPDATE STATUS
                                    echo "<button onclick='openUpdateModal(" . $row['id'] . ", \"" . $row['status'] . "\")' class='btn-action btn-edit' title='Update Status'>✏️</button>";
                                    echo "<button onclick='deleteReport(" . $row['id'] . ")' class='btn-action btn-delete' title='Hapus'>🗑️</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='no-data'>Belum ada laporan</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Detail Laporan -->
    <div id="reportModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalContent">
                <!-- Content akan diisi via JavaScript -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Sistem Informasi Bencana Banjir - Admin Panel</p>
        </div>
    </footer>

<div id="updateStatusModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeUpdateModal()">&times;</span>
            <div id="updateModalContent">
                <h2>Update Status Laporan</h2>
                <form id="statusUpdateForm" method="POST" action="update_status.php"> <input type="hidden" name="report_id" id="modalReportId">
                    <div class="form-group">
                        <label for="new_status">Pilih Status Baru:</label>
                        <select name="new_status" id="modalNewStatus" required>
                            <option value="Belum Ditangani">Belum Ditangani</option>
                            <option value="Sudah Ditangani">Sudah Ditangani</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Status</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi pencarian
        document.getElementById('adminSearchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#adminTableBody tr');
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });

        // Fungsi hapus laporan
        function deleteReport(id) {
            if (confirm('Apakah Anda yakin ingin menghapus laporan ini?')) {
                window.location.href = 'admin_dashboard.php?delete_id=' + id;
            }
        }

        // Fungsi lihat detail laporan
        function viewReport(id) {
            fetch('get_report_detail.php?id=' + id)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const report = data.report;
                        const modalContent = `
                            <h2>Detail Laporan #${report.id}</h2>
                            <div class="report-detail">
                                <p><strong>Nama Pelapor:</strong> ${report.nama}</p>
                                <p><strong>Lokasi:</strong> ${report.lokasi}</p>
                                <p><strong>Koordinat:</strong> ${report.latitude || 'Tidak ada'}, ${report.longitude || 'Tidak ada'}</p>
                                <p><strong>Tanggal:</strong> ${report.tanggal_formatted}</p>
                                <p><strong>Waktu:</strong> ${report.waktu_formatted}</p>
                                <p><strong>Deskripsi:</strong></p>
                                <div class="description-box">${report.deskripsi}</div>
                                ${report.gambar ? `<p><strong>Foto:</strong></p><img src="uploads/${report.gambar}" alt="Foto laporan" class="report-image">` : '<p><em>Tidak ada foto</em></p>'}
                            </div>
                        `;
                        document.getElementById('modalContent').innerHTML = modalContent;
                        document.getElementById('reportModal').style.display = 'block';
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Modal controls
        document.querySelector('.close').onclick = function() {
            document.getElementById('reportModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('reportModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // FUNGSI BARU: Membuka Modal Update Status
        function openUpdateModal(id, currentStatus) {
            document.getElementById('modalReportId').value = id;
            document.getElementById('modalNewStatus').value = currentStatus;
            document.getElementById('updateStatusModal').style.display = 'block';
        }

        // FUNGSI BARU: Menutup Modal Update Status
        function closeUpdateModal() {
            document.getElementById('updateStatusModal').style.display = 'none';
        }

        // Kontrol Modal
        window.onclick = function(event) {
            const updateModal = document.getElementById('updateStatusModal');
            if (event.target == updateModal) {
                updateModal.style.display = 'none';
            }
        }
    </script>
</body>
</html>