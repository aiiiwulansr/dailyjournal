<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web jenis-jenis bunga </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ======================================= */
        /* 1. GLOBAL & THEME SWITCHING (DARK MODE) */
        /* ======================================= */
        * {
            transition: background-color 0.4s, color 0.4s;
        }
        body {
            background-color: #fff0f6;
            color: #333;
            scroll-behavior: smooth;
            /* Perlu menambahkan link font Poppins di <head> jika ingin digunakan */
            font-family: 'Poppins', sans-serif;
        }

        /* Dark Mode Global */
        body.dark-mode {
            background-color: #2b1f2b;
            color: #fbe4ef;
        }
        body.dark-mode .navbar,
        body.dark-mode footer {
            background-color: #4a2d4a !important;
        }
        body.dark-mode section {
            background: #3a223a !important;
        }
        body.dark-mode .card {
            background-color: #5b3b5b !important;
            color: #ffe6f0 !important;
        }
        body.dark-mode .table {
            background-color: #5b3b5b;
            color: #ffe6f0;
        }
        body.dark-mode #clock-container {
            color: #fbe4ef;
        }
        

        /* ======================================= */
        /* 2. NAVBAR & HEADER */
        /* ======================================= */
        .navbar {
            background-color: #ff8ccf;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .nav-home { background-color: #ff8ccf !important; }
        .nav-article { background-color: #ff6fb0 !important; }
        .nav-gallery { background-color: #ff4d94 !important; }
        .nav-profile { background-color: #ff99cc !important; }
        .nav-jadwal { background-color: #ffb3d9 !important; }
        
        .nav-link { color: white !important; font-weight: 500; }
        .nav-link.active { text-decoration: underline; font-weight: bold; }
        .theme-toggle {
            border: none;
            background: transparent;
            color: white;
            font-size: 22px;
            cursor: pointer;
        }
        
        /* Jam & Tanggal */
        #clock-container {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
            color: #333;
        }

        /* ======================================= */
        /* 3. SECTIONS & GENERAL STYLES */
        /* ======================================= */
        section {
            border-radius: 12px;
            padding: 50px 20px;
            margin-top: 20px;
        }
        /* Mode Terang Latar Belakang */
        #home { background: linear-gradient(135deg, #ffd6eb 0%, #ffe6f2 100%); }
        #article, #gallery { background: #ffeaf5; }

        .btn-pink {
            background-color: #ff69b4; color: white; border: none; transition: 0.3s;
        }
        .btn-pink:hover { background-color: #ff4d94; }
        .btn-article {
            background-color: #ff4d94; color: white; border: none; transition: 0.3s;
        }
        .btn-article:hover { background-color: #d63384; }

        .home-img, .profile-img {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Card Umum */
        .card {
            border: none;
            transition: 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* ======================================= */
        /* 4. GALLERY STYLES */
        /* ======================================= */
       .gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    height: 240px;
    box-shadow: 0 6px 15px rgba(255,105,180,0.35);
}

.gallery-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s ease;
}

.gallery-item:hover .gallery-img {
    transform: scale(1.1);
    filter: brightness(75%);
}

.gallery-overlay {
    position: absolute;
    inset: 0;
    background: rgba(255,105,180,0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: 0.4s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-overlay span {
    color: white;
    font-size: 20px;
    font-weight: 600;
    text-shadow: 0 2px 6px rgba(0,0,0,0.4);
}


        /* ======================================= */
        /* 5. PROFILE STYLES (INLINE CSS DIPINDAHKAN) */
        /* ======================================= */
        #profile {
            background: #ffe6f5;
            border-radius: 25px;
            padding: 50px 30px;
        }
        #profile .profile-title {
            color: #d63384;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .profile-pic-container {
            width: 210px; 
            height: 210px; 
            margin: auto; 
            border-radius: 50%; 
            overflow: hidden; 
            border: 4px solid #ffb3d9; 
            box-shadow: 0 8px 18px rgba(255,105,180,0.35);
        }
        .profile-pic-container img {
            width:100%; 
            height:100%; 
            object-fit:cover;
        }
        .profile-quote {
            color:#c2185b; 
            font-size:14px; 
            font-style:italic;
        }
        .profile-card {
            background: white; 
            border-radius: 20px; 
            padding: 25px; 
            border: 2px solid #ffb3d9; 
            box-shadow: 0 6px 15px rgba(255,105,180,0.25);
        }
        .profile-card h4 {
            color:#d63384; 
            font-weight:700; 
            margin-bottom: 10px;
        }
        .profile-card ul {
            list-style:none; 
            padding-left:0; 
            color:#6a1b9a; 
            font-size:16px;
        }
        .profile-card a {
            color:#d63384; 
            font-weight:500; 
            text-decoration:none;
            overflow-wrap: break-word; /* Menambahkan properti ini */
        }
        .profile-card .closing-quote {
            margin-top:10px; 
            font-style:italic; 
            text-align:center; 
            color:#c2185b;
        }

        /* Dark Mode untuk Profil */
        body.dark-mode #profile {
            background: #3a223a !important;
        }
        body.dark-mode .profile-pic-container {
            border: 4px solid #ff6fb0;
            box-shadow: 0 8px 18px rgba(255,105,180,0.6) !important;
        }
        body.dark-mode .profile-card {
            background: #5b3b5b !important;
            border-color: #ff6fb0 !important;
            box-shadow: 0 6px 15px rgba(255,105,180,0.4) !important;
        }
        body.dark-mode .profile-card h4,
        body.dark-mode .profile-card ul li,
        body.dark-mode .profile-card ul,
        body.dark-mode .profile-card .closing-quote,
        body.dark-mode .profile-quote {
            color: #ffe6f0 !important;
        }
        body.dark-mode .profile-card a {
            color: #ffb3d9 !important;
        }


        /* ======================================= */
        /* 6. JADWAL STYLES (INLINE CSS DIPINDAHKAN) */
        /* ======================================= */
        /* ===== JADWAL TABLE ===== */
/* WRAPPER biar jarak rapat */
.jadwal-wrapper {
    gap: 14px;
}

/* CARD */
.jadwal-card {
    background: #fff5fa;
    border-radius: 14px;
    width: 230px;
    box-shadow: 0 6px 14px rgba(255,182,193,0.35);
    transition: all 0.3s ease;
}

.jadwal-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 26px rgba(255,105,180,0.45);
}

/* HEADER HARI */
.jadwal-header {
    background: linear-gradient(135deg, #ffb3d9, #ffd6eb);
    text-align: center;
    padding: 10px;
    font-weight: 700;
    font-size: 0.95rem;
    color: #7a1c4d;
}

/* ISI */
.jadwal-card ul {
    list-style: none;
    padding: 12px;
    margin: 0;
}

.jadwal-card ul li {
    background: #ffffff;
    border-radius: 10px;
    padding: 8px;
    margin-bottom: 6px;
    font-size: 0.8rem;
    box-shadow: 0 2px 6px rgba(255,182,193,0.25);
}

/* ===== DARK MODE ===== */
body.dark-mode .jadwal-card {
    background: #4a2d4a;
    box-shadow: 0 6px 18px rgba(255,105,180,0.4);
}

body.dark-mode .jadwal-header {
    background: linear-gradient(135deg, #ff6fb0, #ff99cc);
    color: #2b1f2b;
}

body.dark-mode .jadwal-card ul li {
    background: #5b3b5b;
    color: #ffe6f0;
}
        /* ======================================= */
        /* 7. FOOTER */
        /* ======================================= */
        footer { 
            background-color: #ff8ccf;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm nav-home" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#">DUNIA FLORA</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="menu" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#article">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="#gallery">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#profile">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#jadwal">Jadwal</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>

                <li class="nav-item">
                    <button id="themeToggle" class="theme-toggle">🌙</button>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <section id="home" class="container shadow-sm">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="https://i.pinimg.com/736x/a9/c2/25/a9c225ecd6faf1aa791998881577268e.jpg" class="img-fluid home-img" alt="Kampus UDINUS">
                <div id="clock-container">
                    <div id="date"></div>
                    <div id="clock"></div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-danger mb-3">Tentang BUNGA</h2>
                <p><b>"Blooming Love: Kisah & Makna di Balik Bunga"</b> Sejak dahulu kala, bunga telah menjadi bahasa universal yang melampaui batas budaya dan kata-kata. 
                    Dari keindahan kelopaknya yang lembut hingga aroma semerbaknya yang memikat, bunga memiliki kemampuan unik untuk menyampaikan berbagai emosi, pesan, dan makna yang mendalam..</p>
                <a href="https://uprint.id/blog/bunga/?utm_source=chatgpt.com" target="_blank" class="btn btn-pink">Baca selengkapnya</a>
            </div>
        </div>
    </section>

    <!-- article begin -->
<section id="article" class="container shadow-sm mt-4">
        <h2 class="text-center mb-4 profile-title">
            ✨🌸 Article 🌸✨
        </h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->
<section id="gallery" class="container shadow-sm mt-4">
    <h2 class="text-center mb-4 profile-title">
        ✨🌸 Gallery 🌸✨
    </h2>

    <div class="row g-4">

        <div class="col-md-4 col-sm-6">
            <div class="gallery-item">
                <img src="https://i.pinimg.com/736x/8f/a9/26/8fa926ac368e98f2312c1a36ce49cf31.jpg" class="gallery-img">
                <div class="gallery-overlay"><span>Bunga Lily</span></div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="gallery-item">
                <img src="https://i.pinimg.com/1200x/48/85/de/4885debd1dbe3989de83a94527c52082.jpg" class="gallery-img">
                <div class="gallery-overlay"><span>Bunga Lavender</span></div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="gallery-item">
                <img src="https://i.pinimg.com/1200x/ea/d5/89/ead5898d5fcb80c65f4392f063ece887.jpg" class="gallery-img">
                <div class="gallery-overlay"><span>Bunga Matahari</span></div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="gallery-item">
                <img src="https://i.pinimg.com/1200x/18/f0/27/18f02771d981a84caa549347b7e56bbd.jpg" class="gallery-img">
                <div class="gallery-overlay"><span>Bunga Kamboja</span></div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="gallery-item">
                <img src="https://i.pinimg.com/736x/6e/f2/24/6ef2243922917dbb9e8633be6279561e.jpg" class="gallery-img">
                <div class="gallery-overlay"><span>Bunga Sakura</span></div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="gallery-item">
                <img src="https://i.pinimg.com/1200x/9f/ef/f4/9feff4d87cc823ed1af26fc2b37b9fd8.jpg" class="gallery-img">
                <div class="gallery-overlay"><span>Bunga Anggrek</span></div>
            </div>
        </div>

    </div>
</section>

    <section id="profile" class="container shadow-sm mt-4">
        <h2 class="text-center mb-4 profile-title">
            ✨🌸 Profil 🌸✨
        </h2>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <div class="profile-pic-container">
                    <img src="img/photoWULAN.jpeg" alt="Foto photoWULAN">
                </div>
                <p class="mt-3 profile-quote">💗 "Be kind, stay soft, and keep growing." 💗</p>
            </div>

            <div class="col-md-6">
                <div class="profile-card">
                    <h4>👋 Hai, aku Wahyu Wulansari!</h4>

                    <ul>
                        <li>🎓 <b>NIM:</b> A11.2024.16067</li>
                        <li>💻 <b>Prodi:</b> Teknik Informatika - S1</li>
                        <li>🏫 <b>Fakultas:</b> Ilmu Komputer</li>
                        <li>📅 <b>Semester:</b> Ganjil 2025/2026</li>
                        <li>👩‍🏫 <b>Dosen Wali:</b> Ardytha Luthfiarta, M.Kom</li>
                        <li>📧 <b>Email:</b> 
                            <a href="111202416067.mhs.dinus.ac.id">
                                111202416067.mhs.dinus.ac.id
                            </a>
                        </li>
                    </ul>

                    <p class="closing-quote">
                        💗 Semangat terus ya versi terbaik diri kita 💗
                    </p>
                </div>
            </div>
        </div>
    </section>

   <section id="jadwal" class="container mt-4">
    <h2 class="text-center mb-4 profile-title">✨🌸 Jadwal Kuliah 🌸✨</h2>

    <div class="d-flex flex-wrap justify-content-center jadwal-wrapper">

        <div class="jadwal-card">
            <div class="jadwal-header">🌸 Senin</div>
            <ul>
                <li><b>RPL</b><br>09.30 – 12.00<br><small>H.5.7</small></li>
                <li><b>Logika Informatika</b><br>12.30 – 15.00<br><small>H.5.3</small></li>
                <li><b>PKN</b><br>16.20 – 18.00<br><small>Kulino</small></li>
            </ul>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-header">🌸 Selasa</div>
            <ul>
                <li><b>Basis Data</b><br>07.00 – 08.40<br><small>D.2.K</small></li>
            </ul>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-header">🌸 Rabu</div>
            <ul>
                <li><b>Basis Data</b><br>08.40 – 10.20<br><small>H.5.6</small></li>
                <li><b>Web</b><br>10.20 – 12.00<br><small>D.2.J</small></li>
            </ul>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-header">🌸 Kamis</div>
            <ul>
                <li><b>Probabilitas</b><br>09.30 – 12.00<br><small>H.3.8</small></li>
            </ul>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-header">🌸 Jumat</div>
            <ul>
                <li><b>Sistem Operasi</b><br>12.30 – 15.00<br><small>H.5.3</small></li>
            </ul>
        </div>

        <div class="jadwal-card">
            <div class="jadwal-header">🌸 Sabtu</div>
            <ul>
                <li><i>Libur / Tidak Ada Jadwal</i></li>
            </ul>
        </div>

    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Jam & tanggal
        function tampilWaktu() {
            const now = new Date();
            document.getElementById("clock").textContent = now.toLocaleTimeString("id-ID");
            document.getElementById("date").textContent = now.toLocaleDateString("id-ID", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        }

        setInterval(tampilWaktu, 1000);
        tampilWaktu();

        // Mode gelap
        const themeToggle = document.getElementById("themeToggle");
        themeToggle.addEventListener("click", () => {
            document.body.classList.toggle("dark-mode");
            themeToggle.textContent = document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
        });

        // Navbar warna otomatis saat scroll
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-link");
        const navbar = document.getElementById("mainNav");

        window.addEventListener("scroll", () => {
            let current = "";
            sections.forEach(sec => {
                // Memberi sedikit offset agar navbar berubah sebelum benar-benar sampai di section
                if (window.scrollY >= sec.offsetTop - 150) current = sec.id;
            });
            
            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href").includes(current)) link.classList.add("active");
            });

            // Mengubah warna navbar sesuai section yang aktif
            navbar.className = "navbar navbar-expand-lg navbar-dark shadow-sm " + 
                (current === "article" ? "nav-article" : 
                current === "gallery" ? "nav-gallery" : 
                current === "profile" ? "nav-profile" : 
                current === "jadwal" ? "nav-jadwal" : "nav-home");
        });
    </script>
</body>
</html>
