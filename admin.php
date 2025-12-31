<?php
session_start();
include "koneksi.php";

// cek login
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Daily Journal | Admin</title>

    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
       html, body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
    margin: 0;
}

section {
    flex: 1;
}

footer {
    position: relative;
    width: 100%;
}

    </style>
</head>

<body>

    <!-- navbar -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="background-color:#ff8ccf">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="admin.php">My Daily Journal</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin.php?page=dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin.php?page=article">Article</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" data-bs-toggle="dropdown">
                        <?= $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<section class="p-5">
    <div class="container">

        <?php
        $page = $_GET['page'] ?? 'dashboard';

        echo '<h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">'
            . ucfirst($page) .
            '</h4>';

        $file = $page . ".php";

        if (file_exists($file)) {
            include $file;
        } else {
            echo "<div class='alert alert-danger mt-3'>Halaman tidak ditemukan</div>";
        }
        ?>

    </div>
</section>

<!-- FOOTER -->
 
<footer class="text-center text-white py-3 mt-4" style="background-color:#ff9fcf;">
    <p class="mb-1 fw-semibold">🌸 Blooming Flower Journal 🌸</p>
    <p class="mb-0" style="font-size:14px; opacity:0.9;">© 2025 | Aesthetic Garden of Stories & Blossoms 💗</p>
    <div>
        <a href="https://www.instagram.com/udinusofficial"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
        <a href="https://twitter.com/udinusofficial"><i class="bi bi-twitter h2 p-2 text-dark"></i></a>
        <a href="https://wa.me/+62812685577"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
    </div>
    <div>Aprilyani Nur Safitri &copy; 2023</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
