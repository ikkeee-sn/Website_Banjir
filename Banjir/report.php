<?php
include "connection.php";
$message = "";  


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama      = $_POST['nama'];
    $lokasi    = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $latitude  = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $tanggal = date("Y-m-d");
    $waktu   = date("H:i:s");

    // upload foto
    $fotoName = "";
    if (!empty($_FILES["gambar"]["name"])) {
        $dir = "uploads/";
        $fotoName = time() . "_" . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $dir . $fotoName);
    }

    // INSERT ke tabel "reports"
    $sql = "INSERT INTO reports (nama, lokasi, latitude, longitude, tanggal, waktu, deskripsi, gambar, created_at)
            VALUES ('$nama', '$lokasi', '$latitude', '$longitude', '$tanggal', '$waktu', '$deskripsi', '$fotoName', NOW())";

    if ($conn->query($sql)) {
        echo "<script>alert('Laporan berhasil dikirim'); window.location='index.html';</script>";
    } else {
        echo 'SQL Error: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Banjir - Sistem Informasi Bencana Banjir</title>
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
                <li><a href="report.php" class="active">Lapor</a></li>
                <li><a href="news.php">Berita</a></li>
                <li><a href="admin_login.php">Admin</a></li>
                <li><a href="info.html">Info</a></li>
            </ul>
        </div>
    </nav>

    <!-- Form Section -->
    <section class="form-section">
        <div class="container">
            <div class="form-header">
                <h1>Laporkan Kejadian Banjir</h1>
                <p>Bantu kami memantau situasi banjir dengan melaporkan kejadian di sekitar Anda</p>
            </div>

            <?php if ($message): ?>
            <div class="alert alert-<?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="report.php" enctype="multipart/form-data" class="report-form">
                <div class="form-group">
                    <label for="nama">Nama Pelapor *</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap Anda">
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi Kejadian *</label>
                    <input type="text" id="lokasi" name="lokasi" required placeholder="Masukkan alamat lengkap lokasi banjir">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Kejadian *</label>
                        <input type="date" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu Kejadian *</label>
                        <input type="time" id="waktu" name="waktu" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Kejadian *</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5" required placeholder="Jelaskan kondisi banjir (ketinggian air, dampak, dll)"></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar">Unggah Foto (Opsional)</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">
                    <small>Format: JPG, PNG, GIF (Maks. 5MB)</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                    <button type="reset" class="btn btn-secondary">Reset Form</button>
                </div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                <label>Pilih Lokasi Kejadian Banjir</label>
                <div id="map-laporan" style="height: 250px; margin-bottom: 10px; border-radius: 10px;"></div>
                <small>Klik peta untuk mengganti lokasi kejadian. Jika tidak diklik, sistem memakai lokasi Anda otomatis.</small>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Sistem Informasi Bencana Banjir. Dibuat untuk kepentingan pendidikan.</p>
        </div>
    </footer>

    <script>
        // Set tanggal hari ini sebagai default
        document.getElementById('tanggal').valueAsDate = new Date();
    </script>

    <script>
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(pos) {
        document.getElementById("latitude").value = pos.coords.latitude;
        document.getElementById("longitude").value = pos.coords.longitude;
    }, function(err) {
        alert("Aktifkan lokasi agar koordinat tersimpan.");
    });
}
</script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
let map, marker;

// Inisialisasi peta
map = L.map('map-laporan').setView([-2.5, 118], 5); // Indonesia center

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18
}).addTo(map);


// 1️⃣ AMBIL LOKASI USER DARI GPS
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(pos) {

        const lat = pos.coords.latitude;
        const lng = pos.coords.longitude;

        // Set form
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;

        // Tampilkan marker awal
        marker = L.marker([lat, lng]).addTo(map).bindPopup("Lokasi Anda").openPopup();

        // Zoom ke lokasi user
        map.setView([lat, lng], 12);

    }, function(err){
        console.log("GPS gagal, user harus klik peta.");
    });
}


// 2️⃣ USER BOLEH KLIK PETA UNTUK MENGGANTI KOORDINAT
map.on("click", function(e) {

    const lat = e.latlng.lat;
    const lng = e.latlng.lng;

    // Simpan ke form
    document.getElementById("latitude").value = lat;
    document.getElementById("longitude").value = lng;

    // Hapus marker lama
    if (marker) {
        map.removeLayer(marker);
    }

    // Tambah marker baru
    marker = L.marker([lat, lng]).addTo(map)
        .bindPopup("Lokasi Kejadian")
        .openPopup();
});
</script>
</body>
</html>