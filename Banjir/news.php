<!doctype html>
<html lang="id">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita Terkini - Sistem Informasi Bencana Banjir</title>
  <style>
        body {
            box-sizing: border-box;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }

        body {
            font-family: "Vend Sans", sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .logo {
  width: 50px;  /* ubah sesuai kebutuhan */
  height: 50px;
  object-fit: contain;
}

        /* Navigation */
        .navbar {
    background: linear-gradient(135deg, #667eea 0%, #2E5077 100%);
    color: white;
    padding: 1rem 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-brand {
    font-family: "Montserrat", sans-serif;
    font-weight: 600;
    letter-spacing: 1px;    
    font-size: 1.3rem;
    margin-left: -33rem;
}

.nav-menu {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-menu a {
    color: white;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    transition: background 0.3s;
}

.nav-menu a:hover,
.nav-menu a.active {
    background: rgba(255,255,255,0.2);
}

        /* Hero Section */
        .news-hero {
            background-image: url('uploads/banjir.avif');
background-size: cover;
            color: black;
            padding: 7rem 0;
            text-align: center;
        }

        .news-hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            font-family: "Knewave", system-ui;
        }

        .news-hero p {
            font-size: 1.3rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            font-weight: bold;
        }

        /* Breaking News */
        .breaking-news {
            background: #e74c3c;
            color: white;
            padding: 1rem 0;
            overflow: hidden;
        }

        .breaking-header {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .breaking-label {
            background: rgba(255,255,255,0.2);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
            white-space: nowrap;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .breaking-ticker {
            flex: 1;
            overflow: hidden;
        }

        .breaking-ticker span {
            display: inline-block;
            animation: ticker 40s linear infinite;
            white-space: nowrap;
            font-weight: 500;
        }

        @keyframes ticker {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        /* Main Content */
        .news-content {
            padding: 3rem 0;
        }

        .news-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
        }

        .main-news h2 {
            color: #2c3e50;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #3498db;
            font-size: 2rem;
        }

        /* Featured News */
        .featured-news {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 3rem;
            transition: transform 0.3s;
        }

        .featured-news:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .news-image {
            width: 100%;
            height: 350px;
            position: relative;
            overflow: hidden;
        }


        .news-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.3) 100%);
        }

        .news-content-text {
            padding: 2.5rem;
        }

        .news-category {
            background: #e74c3c;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .featured-news h3 {
            color: #2c3e50;
            margin: 1.5rem 0;
            font-size: 1.8rem;
            line-height: 1.3;
            font-weight: 700;
        }

        .news-excerpt {
            color: #7f8c8d;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .news-meta {
            display: flex;
            gap: 2rem;
            font-size: 0.95rem;
            color: #95a5a6;
            padding-top: 1rem;
            border-top: 1px solid #ecf0f1;
        }

        /* News Grid */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #f39c12, #e67e22);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
        }

        .card-image.flood { background: linear-gradient(45deg, #3498db, #2980b9); }
        .card-image.emergency { background: linear-gradient(45deg, #e74c3c, #c0392b); }
        .card-image.weather { background: linear-gradient(45deg, #9b59b6, #8e44ad); }
        .card-image.infrastructure { background: linear-gradient(45deg, #27ae60, #229954); }
        .card-image.social { background: linear-gradient(45deg, #f39c12, #e67e22); }

        .card-content {
            padding: 2rem;
        }

        .card-category {
            background: #3498db;
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .card-category.emergency { background: #e74c3c; }
        .card-category.weather { background: #9b59b6; }
        .card-category.infrastructure { background: #27ae60; }
        .card-category.social { background: #f39c12; }

        .news-card h4 {
            color: #2c3e50;
            margin: 1rem 0;
            font-size: 1.2rem;
            line-height: 1.4;
            font-weight: 600;
        }

        .news-card p {
            color: #7f8c8d;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #95a5a6;
            padding-top: 1rem;
            border-top: 1px solid #ecf0f1;
        }

        .news-time {
            font-weight: 600;
            color: #e74c3c;
        }

        /* Sidebar */
        .news-sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .sidebar-widget {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            transition: transform 0.3s;
        }

        .sidebar-widget:hover {
            transform: translateY(-3px);
        }

        .sidebar-widget h3 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.8rem;
            border-bottom: 2px solid #ecf0f1;
            font-size: 1.3rem;
            font-weight: 700;
        }

        /* Weather Widget */
        .weather-widget {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            color: white;
        }

        .weather-widget h3 {
            color: white;
            border-bottom-color: rgba(255,255,255,0.3);
        }

        .weather-current {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
        }

        .weather-icon {
            font-size: 3.5rem;
        }

        .weather-info h4 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .weather-desc {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .weather-forecast {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .forecast-day {
            text-align: center;
            padding: 1rem;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
        }

        .forecast-day .day {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .forecast-day .icon {
            font-size: 1.5rem;
            margin: 0.5rem 0;
        }

        /* Emergency Contacts */
        .emergency-widget {
            background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);
            color: white;
        }

        .emergency-widget h3 {
            color: white;
            border-bottom-color: rgba(255,255,255,0.3);
        }

        .contact-grid {
            display: grid;
            gap: 1rem;
        }

        .contact-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            transition: background 0.3s;
        }

        .contact-item:hover {
            background: rgba(255,255,255,0.2);
        }

        .contact-name {
            font-weight: 600;
        }

        .contact-number {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            background: rgba(255,255,255,0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        /* Tips Widget */
        .tips-widget {
            background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
            color: white;
        }

        .tips-widget h3 {
            color: white;
            border-bottom-color: rgba(255,255,255,0.3);
        }

        .tips-list {
            list-style: none;
        }

        .tips-list li {
            padding: 1rem;
            margin-bottom: 0.8rem;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            position: relative;
            padding-left: 3rem;
            line-height: 1.5;
        }

        .tips-list li::before {
            content: "✓";
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            color: #00b894;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        /* Statistics Widget */
        .stats-widget .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #3498db;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 3% auto;
            padding: 0;
            border-radius: 15px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .modal-header {
            padding: 2rem;
            border-bottom: 1px solid #ecf0f1;
            position: relative;
        }

        .modal-close {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
            font-size: 2rem;
            cursor: pointer;
            color: #95a5a6;
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: #e74c3c;
        }

        .modal-body {
            padding: 2rem;
            line-height: 1.8;
        }

        .modal-body h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .modal-body p {
            margin-bottom: 1.5rem;
            color: #555;
        }


 .hero-video {
    position: relative;
    width: 100%;
    height: 420px;              /* bisa kamu ubah */
    overflow: hidden;
}

.hero-video-file {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(65%);
}

.hero-video-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
}

.hero-video-overlay h1 {
    font-size: 3rem;
    font-family: "Poppins", sans-serif;
    font-weight: 700;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
}

.hero-video-overlay p {
    font-size: 1.3rem;
    font-family: "Poppins", sans-serif;
    font-weight: 500;
    text-shadow: 1px 1px 5px rgba(0,0,0,0.7);
    margin-top: 10px;
}

@media (max-width: 768px) {
    .hero-video {
        height: 260px;
    }
    .hero-video-overlay h1 {
        font-size: 1.7rem;
    }
    .hero-video-overlay p {
        font-size: 1rem;
    }
}

        /* Responsive Design */
        @media (max-width: 768px) {
            .news-layout {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .news-hero h1 {
                font-size: 2.2rem;
            }

            .news-hero p {
                font-size: 1.1rem;
            }

            .breaking-header {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }

            .nav-menu {
                flex-direction: column;
                gap: 0.5rem;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .weather-current {
                flex-direction: column;
                text-align: center;
            }

            .weather-forecast {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .contact-item {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 0.5rem;
            }

            .news-hero {
                padding: 2rem 0;
            }

            .news-hero h1 {
                font-size: 1.8rem;
            }

            .sidebar-widget,
            .news-card,
            .featured-news {
                margin: 0 0.5rem;
            }

            .news-content-text,
            .card-content,
            .sidebar-widget {
                padding: 1.5rem;
            }
        }
    </style>
  <style>@view-transition { navigation: auto; }</style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">

  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body><!-- Navigation -->
  <nav class="navbar">
   <div class="container">
   <img src="uploads/logobanjir.png" alt="" class="logo">
    <div class="nav-brand">
    Info Banjir
    </div>
    <ul class="nav-menu">
     <li><a href="index.html">Beranda</a></li>
     <li><a href="report.php">Lapor</a></li>
     <li><a href="news.php" class="active">Berita</a></li>
     <li><a href="admin_login.php">Admin</a></li>
     <li><a href="info.html">Info</a></li>
    </ul>
   </div>
  </nav><!-- Hero Section -->
  <section class="hero-video">
    <video autoplay muted loop playsinline class="hero-video-file">
        <source src="uploads/video.mp4" type="video/mp4">
        Browser Anda tidak mendukung video.
    </video>

    <div class="hero-video-overlay">
        <h1>Berita & Informasi Terkini</h1>
        <p>Update terbaru seputar kondisi banjir di Indonesia</p>
    </div>
</section>
<!-- Breaking News -->
  <section class="breaking-news">
   <div class="container">
    <div class="breaking-header"><span class="breaking-label">🚨 BREAKING NEWS</span>
     <div class="breaking-ticker"><span id="breakingText">BMKG: Waspada Curah Hujan Ekstrem di Jabodetabek • Status Siaga Banjir Jakarta • 15 Titik Genangan Dilaporkan • Tim SAR Siaga 24 Jam</span>
     </div>
    </div>
   </div>
  </section><!-- Main Content -->
  <section class="news-content">
   <div class="container">
    <div class="news-layout"><!-- Main News -->
     <main class="main-news">
      <h2>Berita Utama</h2><!-- Featured News -->
      <article class="featured-news" onclick="openModal('modal1')">
       <div class="news-image">
    <img src="uploads/picture1.jpg" style="width:100%; height:100%; object-fit:cover;">
</div>
       <div class="news-content-text"><span class="news-category">PERINGATAN DINI</span>
        <h3>BMKG: Waspada Curah Hujan Ekstrem di Jabodetabek Hingga Akhir Januari</h3>
        <p class="news-excerpt">Badan Meteorologi, Klimatologi, dan Geofisika (BMKG) mengeluarkan peringatan dini curah hujan dengan intensitas sedang hingga lebat yang berpotensi menyebabkan banjir di wilayah Jakarta, Bogor, Depok, Tangerang, dan Bekasi. Masyarakat diminta untuk selalu waspada dan mempersiapkan diri menghadapi kemungkinan banjir, terutama di daerah-daerah yang rawan genangan.</p>
        <div class="news-meta"><span class="news-date">📅 <span id="currentDate"></span> WIB</span> <span class="news-author">👤 BMKG Indonesia</span>
        </div>
       </div>
      </article><!-- News Grid -->
      <div class="news-grid">
       <article class="news-card" onclick="openModal('modal2')">
        <div class="card-image">
            <img src="uploads/foto1.jpg" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="card-content"><span class="card-category emergency">TANGGAP DARURAT</span>
         <h4>Banjir Jakarta: 13.000 Jiwa Mengungsi, 5 Orang Meninggal</h4>
         <p>Banjir yang melanda Jakarta sejak Selasa (1/1/2020) telah menyebabkan 13.000 jiwa mengungsi dan 5 orang meninggal dunia. BPBD DKI Jakarta terus melakukan evakuasi warga dari daerah terdampak.</p>
        <div class="card-meta">
            <a href="https://tirto.id/penyebab-banjir-jakarta-2020-dan-daftar-jumlah-korban-meninggal-ep9p" class="news-time">Baca selengkapnya</a>
            <span>📍 Jakarta Timur</span>
        </div>
        </div>
       </article>
       <article class="news-card" onclick="openModal('modal3')">
        <div class="card-image">
            <img src="uploads/foto2.jpg" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="card-content"><span class="card-category infrastructure">INFRASTRUKTUR</span>
         <h4>Normalisasi Kali Ciliwung Capai 80%, Diharapkan Kurangi Banjir</h4>
         <p>Proyek normalisasi Kali Ciliwung yang dimulai tahun 2017 kini telah mencapai 80%. Pemprov DKI optimis proyek ini dapat mengurangi risiko banjir di Jakarta hingga 40%.</p>
         <div class="card-meta">
            <a href="https://sda.pu.go.id/post/detail/normalisasi_sungai_ciliwung_diharapkan_atasi_masalah_banjir_dki_jakarta" class="news-time">Baca selengkapnya</a>
            <span>📍 Ciliwung</span>
        </div>
        </div>
       </article>
       <article class="news-card" onclick="openModal('modal4')">
        <div class="card-image">
            <img src="uploads/foto3.jpg" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="card-content"><span class="card-category social">BANTUAN SOSIAL</span>
         <h4>Pemprov DKI Salurkan 10.000 Paket Bantuan untuk Korban Banjir</h4>
         <p>Gubernur DKI Jakarta menyalurkan 10.000 paket bantuan berupa makanan siap saji, air bersih, dan perlengkapan darurat untuk korban banjir di 5 wilayah Jakarta.</p>
         <div class="card-meta">
            <a href="https://dinsos.jakarta.go.id/berita/dinsos-dki-jakarta-salurkan-bantuan-untuk-warga-terdampak-banjir-dan-tanah-longsor-di-jakarta-selatan" class="news-time">Baca selengkapnya</a>
            <span>📍 Jakarta</span>
        </div>
        </div>
       </article>
       <article class="news-card" onclick="openModal('modal5')">
        <div class="card-image">
            <img src="uploads/foto4.jpg" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="card-content"><span class="card-category weather">CUACA</span>
         <h4>Intensitas Hujan di Bogor Capai 150mm/jam, Tertinggi Tahun Ini</h4>
         <p>Stasiun meteorologi Dramaga Bogor mencatat intensitas hujan mencapai 150mm per jam, tertinggi sepanjang tahun 2024. Beberapa wilayah Bogor mengalami genangan hingga 1 meter.</p>
         <div class="card-meta">
            <a href="https://www.kompas.id/artikel/bogor-diprediksi-masih-dilanda-hujan-lebat-warga-diimbau-waspadai-potensi-bencana?utm_source=facebook&utm_medium=post&utm_campaign=soc_hariankompas_metro-auto_traffic" class="news-time">Baca selengkapnya</a>
            <span>📍 Bogor</span>
        </div>
        </div>
       </article>
       <article class="news-card" onclick="openModal('modal6')">
        <div class="card-image">
            <img src="uploads/foto5.jpg" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="card-content"><span class="card-category">BANJIR BANDANG</span>
         <h4>Banjir Bandang Sukabumi: 2 Tewas, 15 Rumah Hanyut</h4>
         <p>Banjir bandang yang terjadi di Kabupaten Sukabumi akibat luapan Sungai Cimandiri menyebabkan 2 orang tewas dan 15 rumah hanyut terbawa arus.</p>
        <div class="card-meta">
            <a href="https://www.bnpb.go.id/index.php/berita/-update-dua-warga-hanyut-saat-banjir-bandang-sukabumi-ditemukan-meninggal-dunia" class="news-time">Baca selengkapnya</a>
            <span>📍 Sukabumi</span>
        </div>
        </div>
       </article>
       <article class="news-card" onclick="openModal('modal7')">
        <div class="card-image">
            <img src="uploads/foto6.jpeg" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="card-content"><span class="card-category emergency">PERINGATAN</span>
         <h4>Bendungan Katulampa Siaga 3, Warga Bantaran Kali Diminta Waspada</h4>
         <p>Bendungan Katulampa di Bogor berada dalam status Siaga 3 dengan ketinggian air 80 cm. Warga yang tinggal di bantaran Kali Ciliwung diminta untuk waspada.</p>
        <div class="card-meta">
            <a href="https://www.metrotvnews.com/read/kpLCaPwO-bendungan-katulampa-siaga-3-warga-jakarta-diminta-waspada-potensi-banjir" class="news-time">Baca selengkapnya</a>
            <span>📍 Bogor</span>
        </div>
        </div>
       </article>
      </div>
     </main><!-- Sidebar -->
     <aside class="news-sidebar"><!-- Weather Widget -->
      <div class="sidebar-widget weather-widget">
       <h3>🌤️ Prakiraan Cuaca</h3>
       <div class="weather-current">
        <div class="weather-icon">
         ⛈️
        </div>
        <div class="weather-info">
         <h4>28°C</h4>
         <div class="weather-desc">
          Hujan Lebat
         </div>
         <div>
          Jakarta Pusat
         </div>
        </div>
       </div>
       <div class="weather-forecast">
        <div class="forecast-day">
         <div class="day">
          Besok
         </div>
         <div class="icon">
          🌧️
         </div>
         <div>
          26°C
         </div>
        </div>
        <div class="forecast-day">
         <div class="day">
          Lusa
         </div>
         <div class="icon">
          ⛅
         </div>
         <div>
          29°C
         </div>
        </div>
        <div class="forecast-day">
         <div class="day">
          Minggu
         </div>
         <div class="icon">
          ☀️
         </div>
         <div>
          31°C
         </div>
        </div>
       </div>
      </div><!-- Emergency Contacts -->
      <div class="sidebar-widget emergency-widget">
       <h3>🚨 Kontak Darurat</h3>
       <div class="contact-grid">
        <div class="contact-item"><span class="contact-name">BPBD DKI Jakarta</span> <span class="contact-number">021-2921-0119</span>
        </div>
        <div class="contact-item"><span class="contact-name">Damkar Jakarta</span> <span class="contact-number">113</span>
        </div>
        <div class="contact-item"><span class="contact-name">Polda Metro Jaya</span> <span class="contact-number">110</span>
        </div>
        <div class="contact-item"><span class="contact-name">Ambulans</span> <span class="contact-number">118 / 119</span>
        </div>
        <div class="contact-item"><span class="contact-name">SAR Nasional</span> <span class="contact-number">115</span>
        </div>
       </div>
      </div><!-- Statistics -->
      <div class="sidebar-widget stats-widget">
       <h3>📊 Statistik Banjir</h3>
       <div class="stats-grid">
        <div class="stat-item">
         <div class="stat-number">
          47
         </div>
         <div class="stat-label">
          Titik Banjir Aktif
         </div>
        </div>
        <div class="stat-item">
         <div class="stat-number">
          13.2K
         </div>
         <div class="stat-label">
          Jiwa Terdampak
         </div>
        </div>
        <div class="stat-item">
         <div class="stat-number">
          25
         </div>
         <div class="stat-label">
          Posko Darurat
         </div>
        </div>
        <div class="stat-item">
         <div class="stat-number">
          150mm
         </div>
         <div class="stat-label">
          Curah Hujan/Jam
         </div>
        </div>
       </div>
      </div><!-- Safety Tips -->
      <div class="sidebar-widget tips-widget">
       <h3>💡 Tips Keselamatan</h3>
       <ul class="tips-list">
        <li>Hindari berjalan di genangan air yang dalam</li>
        <li>Matikan listrik jika air masuk rumah</li>
        <li>Siapkan tas darurat berisi dokumen penting</li>
        <li>Pantau informasi dari sumber resmi</li>
        <li>Jangan panik dan ikuti arahan petugas</li>
        <li>Simpan nomor darurat di ponsel</li>
       </ul>
      </div>
     </aside>
    </div>
   </div>
  </section><!-- Modals -->
  <div id="modal1" class="modal">
   <div class="modal-content">
    <div class="modal-header">
     <h3>BMKG: Waspada Curah Hujan Ekstrem di Jabodetabek</h3><span class="modal-close">×</span>
    </div>
    <div class="modal-body">
     <p><strong>Jakarta</strong> - Badan Meteorologi, Klimatologi, dan Geofisika (BMKG) mengeluarkan peringatan dini curah hujan dengan intensitas sedang hingga lebat yang berpotensi menyebabkan banjir di wilayah Jakarta, Bogor, Depok, Tangerang, dan Bekasi hingga akhir Januari 2024.</p>
     <p>Kepala BMKG, Dwikorita Karnawati, menjelaskan bahwa kondisi cuaca ekstrem ini disebabkan oleh fenomena La Nina yang masih berlangsung, ditambah dengan adanya siklon tropis di Samudra Hindia yang mempengaruhi pola cuaca di Indonesia.</p>
     <p>"Kami meminta masyarakat untuk selalu waspada, terutama yang tinggal di daerah rawan banjir seperti bantaran sungai dan daerah rendah," ujar Dwikorita dalam konferensi pers di Jakarta, Selasa (23/1/2024).</p>
     <p>BMKG juga meminta masyarakat untuk:</p>
     <ul>
      <li>Memantau informasi cuaca terkini melalui aplikasi resmi BMKG</li>
      <li>Menyiapkan rencana evakuasi jika tinggal di daerah rawan banjir</li>
      <li>Menghindari aktivitas di luar ruangan saat hujan lebat</li>
      <li>Mewaspadai potensi banjir bandang di daerah hulu sungai</li>
     </ul>
     <p>Sementara itu, Pemprov DKI Jakarta telah menyiapkan 100 pompa air portabel dan 50 posko darurat untuk mengantisipasi banjir yang mungkin terjadi.</p>
    </div>
   </div>
  </div>
  <div id="modal2" class="modal">
   <div class="modal-content">
    <div class="modal-header">
     <h3>Banjir Jakarta: 13.000 Jiwa Mengungsi, 5 Orang Meninggal</h3><span class="modal-close">×</span>
    </div>
    <div class="modal-body">
     <p><strong>Jakarta</strong> - Banjir yang melanda Jakarta sejak Selasa (1/1/2020) dini hari telah menyebabkan 13.000 jiwa mengungsi dan 5 orang meninggal dunia. Ketinggian air di beberapa wilayah mencapai 1,5 hingga 2 meter.</p>
     <p>Kepala BPBD DKI Jakarta, Sabdo Kurnianto, melaporkan bahwa korban jiwa terdiri dari 3 orang dewasa dan 2 anak-anak yang tewas akibat terseret arus banjir dan tertimpa pohon tumbang.</p>
     <p>"Kami terus melakukan evakuasi warga dari daerah terdampak. Saat ini tersedia 200 posko pengungsian dengan kapasitas 50.000 orang," kata Sabdo.</p>
     <p>Wilayah terparah meliputi:</p>
     <ul>
      <li>Kampung Melayu - ketinggian air 2 meter</li>
      <li>Cawang - ketinggian air 1,8 meter</li>
      <li>Kemang - ketinggian air 1,5 meter</li>
      <li>Kelapa Gading - ketinggian air 1,2 meter</li>
      <li>Pluit - ketinggian air 1 meter</li>
     </ul>
     <p>Gubernur DKI Jakarta telah menetapkan status tanggap darurat banjir dan meminta bantuan TNI-Polri untuk mempercepat proses evakuasi dan distribusi bantuan.</p>
    </div>
   </div>
  </div><!-- Additional modals for other news items -->
  <div id="modal3" class="modal">
   <div class="modal-content">
    <div class="modal-header">
     <h3>Normalisasi Kali Ciliwung Capai 80%</h3><span class="modal-close">×</span>
    </div>
    <div class="modal-body">
     <p><strong>Jakarta</strong> - Proyek normalisasi Kali Ciliwung yang dimulai tahun 2017 kini telah mencapai 80% dari target keseluruhan. Pemprov DKI Jakarta optimis proyek senilai Rp 3,8 triliun ini dapat mengurangi risiko banjir di Jakarta hingga 40%.</p>
     <p>Kepala Dinas Sumber Daya Air DKI Jakarta menjelaskan bahwa normalisasi meliputi pelebaran sungai dari 20-30 meter menjadi 50-60 meter, pendalaman dari 2-3 meter menjadi 7-8 meter, dan pembangunan tanggul setinggi 3-4 meter.</p>
     <p>Progres yang telah diselesaikan:</p>
     <ul>
      <li>Segmen Manggarai-Istiqlal: 100%</li>
      <li>Segmen Istiqlal-Karet: 95%</li>
      <li>Segmen Karet-Harmoni: 85%</li>
      <li>Segmen Harmoni-Ancol: 60%</li>
     </ul>
     <p>Proyek ini diharapkan selesai pada akhir 2024 dan akan dilanjutkan dengan normalisasi 13 sungai lainnya di Jakarta.</p>
    </div>
   </div>
  </div>
  <div id="modal4" class="modal">
   <div class="modal-content">
    <div class="modal-header">
     <h3>Pemprov DKI Salurkan 10.000 Paket Bantuan</h3><span class="modal-close">×</span>
    </div>
    <div class="modal-body">
     <p><strong>Jakarta</strong> - Gubernur DKI Jakarta menyalurkan 10.000 paket bantuan berupa makanan siap saji, air bersih, dan perlengkapan darurat untuk korban banjir di 5 wilayah Jakarta.</p>
     <p>Bantuan disalurkan melalui 50 posko yang tersebar di Jakarta Pusat, Jakarta Timur, Jakarta Selatan, Jakarta Barat, dan Jakarta Utara.</p>
     <p>Setiap paket bantuan berisi:</p>
     <ul>
      <li>10 kotak nasi siap saji</li>
      <li>24 botol air mineral 600ml</li>
      <li>Selimut dan pakaian darurat</li>
      <li>Obat-obatan dasar</li>
      <li>Perlengkapan kebersihan</li>
     </ul>
     <p>Selain itu, Pemprov DKI juga menyediakan dapur umum di 25 lokasi dengan kapasitas 5.000 porsi makanan per hari.</p>
    </div>
   </div>
  </div>
  <div id="modal5" class="modal">
   <div class="modal-content">
    <div class="modal-header">
     <h3>Intensitas Hujan di Bogor Capai 150mm/jam</h3><span class="modal-close">×</span>
    </div>
    <div class="modal-body">
     <p><strong>Bogor</strong> - Stasiun meteorologi Dramaga Bogor mencatat intensitas hujan mencapai 150mm per jam pada Selasa (23/1/2024) sore, tertinggi sepanjang tahun 2024. Beberapa wilayah Bogor mengalami genangan hingga 1 meter.</p>
     <p>Kepala Stasiun Meteorologi Dramaga menjelaskan bahwa hujan ekstrem ini disebabkan oleh pertemuan massa udara dingin dari selatan dengan massa udara panas dari utara, yang diperkuat oleh topografi pegunungan Bogor.</p>
     <p>Wilayah terdampak meliputi:</p>
     <ul>
      <li>Kecamatan Bogor Tengah: genangan 80cm</li>
      <li>Kecamatan Bogor Timur: genangan 1 meter</li>
      <li>Kecamatan Tanah Sareal: genangan 60cm</li>
      <li>Kecamatan Bogor Selatan: genangan 70cm</li>
     </ul>
     <p>BPBD Kota Bogor telah mengerahkan 20 pompa air portabel dan membuka 15 posko pengungsian untuk menampung warga terdampak.</p>
    </div>
   </div>
  </div>
  <div id="modal6" class="modal">
   <div class="modal-content">
    <div class="modal-header">
     <h3>Banjir Bandang Sukabumi: 2 Tewas, 15 Rumah Hanyut</h3><span class="modal-close">×</span>
    </div>
    <div class="modal-body">
     <p><strong>Sukabumi</strong> - Banjir bandang yang terjadi di Kabupaten Sukabumi pada Senin (22/1/2024) malam akibat luapan Sungai Cimandiri menyebabkan 2 orang tewas dan 15 rumah hanyut terbawa arus.</p>
     <p>Kepala BPBD Kabupaten Sukabumi melaporkan bahwa banjir bandang terjadi sekitar pukul 22.00 WIB setelah hujan deras mengguyur wilayah hulu selama 6 jam berturut-turut.</p>
     <p>Korban tewas adalah:</p>
     <ul>
      <li>Seorang pria berusia 45 tahun yang terseret arus</li>
      <li>Seorang anak perempuan berusia 8 tahun yang tertimpa reruntuhan</li>
     </ul>
     <p>Saat ini tim SAR masih melakukan pencarian terhadap 3 orang yang dilaporkan hilang. Sebanyak 150 jiwa telah dievakuasi ke posko pengungsian di Balai Desa Cimandiri.</p>
     <p>Pemerintah Kabupaten Sukabumi telah menetapkan status tanggap darurat selama 14 hari dan mengalokasikan dana darurat Rp 2 miliar untuk penanganan bencana.</p>
    </div>
   </div>
  </div>
  <div id="modal7" class="modal">
   <div class="modal-content">
    <div class="modal-header">
     <h3>Bendungan Katulampa Siaga 3</h3><span class="modal-close">×</span>
    </div>
    <div class="modal-body">
     <p><strong>Bogor</strong> - Bendungan Katulampa di Bogor berada dalam status Siaga 3 dengan ketinggian air mencapai 80 cm pada Senin (22/1/2024) pagi. Warga yang tinggal di bantaran Kali Ciliwung diminta untuk waspada.</p>
     <p>Kepala UPT Bendungan Katulampa menjelaskan bahwa status Siaga 3 diberlakukan ketika ketinggian air mencapai 80-149 cm. Jika mencapai 150 cm, status akan dinaikkan menjadi Siaga 2.</p>
     <p>Tingkat kewaspadaan bendungan:</p>
     <ul>
      <li>Normal: 0-79 cm</li>
      <li>Siaga 3: 80-149 cm</li>
      <li>Siaga 2: 150-199 cm</li>
      <li>Siaga 1: 200+ cm</li>
     </ul>
     <p>Petugas terus memantau ketinggian air setiap 15 menit dan akan segera menginformasikan kepada BPBD DKI Jakarta jika terjadi kenaikan status siaga.</p>
     <p>Masyarakat dapat memantau status bendungan secara real-time melalui website resmi BBWS Ciliwung-Cisadane atau aplikasi mobile "Info Bendungan".</p>
    </div>
   </div>
  </div><!-- Footer -->
  <footer class="footer">
   <div class="container">
    <p>© 2025 Sistem Informasi Bencana Banjir. Dibuat untuk kepentingan pendidikan.</p>
   </div>
  </footer>
  <script>
        // Update current date
        function updateCurrentDate() {
            const now = new Date();
            const options = {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            const dateString = now.toLocaleDateString('id-ID', options);
            document.getElementById('currentDate').textContent = dateString;
        }

        // Breaking news ticker rotation
        function rotateBreakingNews() {
            const breakingTexts = [
                'BMKG: Waspada Curah Hujan Ekstrem di Jabodetabek • Status Siaga Banjir Jakarta • 15 Titik Genangan Dilaporkan • Tim SAR Siaga 24 Jam',
                'Update Terkini: 13.000 Jiwa Mengungsi • 25 Posko Darurat Dibuka • Bantuan Logistik Terus Disalurkan • Normalisasi Sungai Dipercepat',
                'Peringatan BMKG: Intensitas Hujan 150mm/jam • Bendungan Katulampa Siaga 3 • Warga Bantaran Sungai Diminta Waspada • Evakuasi Mandiri Dianjurkan'
            ];
            
            let currentIndex = 0;
            const breakingElement = document.getElementById('breakingText');
            
            setInterval(() => {
                currentIndex = (currentIndex + 1) % breakingTexts.length;
                breakingElement.textContent = breakingTexts[currentIndex];
            }, 15000); // Change every 15 seconds
        }

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            updateCurrentDate();
            rotateBreakingNews();
            
            // Update date every minute
            setInterval(updateCurrentDate, 60000);
            
            // Modal event listeners
            const modals = document.querySelectorAll('.modal');
            const closeButtons = document.querySelectorAll('.modal-close');
            
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    closeModal(modal);
                });
            });
            
            // Close modal when clicking outside
            modals.forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal(modal);
                    }
                });
            });
            
            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    modals.forEach(modal => {
                        if (modal.style.display === 'block') {
                            closeModal(modal);
                        }
                    });
                }
            });
        });

        // Auto-update statistics (simulated)
        function updateStats() {
            const stats = [
                { element: document.querySelector('.stat-item:nth-child(1) .stat-number'), min: 40, max: 55 },
                { element: document.querySelector('.stat-item:nth-child(2) .stat-number'), min: 12000, max: 15000 },
                { element: document.querySelector('.stat-item:nth-child(3) .stat-number'), min: 20, max: 30 },
                { element: document.querySelector('.stat-item:nth-child(4) .stat-number'), min: 120, max: 180 }
            ];
            
            stats.forEach(stat => {
                if (stat.element) {
                    const currentValue = parseInt(stat.element.textContent.replace(/[^\d]/g, ''));
                    const variation = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                    let newValue = currentValue + variation;
                    
                    // Keep within bounds
                    newValue = Math.max(stat.min, Math.min(stat.max, newValue));
                    
                    // Format number
                    if (newValue >= 1000) {
                        stat.element.textContent = (newValue / 1000).toFixed(1) + 'K';
                    } else {
                        stat.element.textContent = newValue;
                    }
                }
            });
        }
        
        // Update stats every 30 seconds
        setInterval(updateStats, 30000);
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'99be489865c6df74',t:'MTc2MjcwMTUxNS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>