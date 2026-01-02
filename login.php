<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['username'])) {
    header("location:admin.php");
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = md5($_POST['pass']);

    $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $hasil = $stmt->get_result();
    $row = $hasil->fetch_assoc();

    if ($row) {
        $_SESSION['username'] = $row['username'];
        header("location:admin.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | My Daily Journal</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #f8d7da;
            height: 100vh;
        }
        .login-card{
            width: 380px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .btn-login{
            background-color: #dc3545;
            color: white;
        }
        .btn-login:hover{
            background-color: #bb2d3b;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card login-card p-4">
    <div class="text-center mb-3">
        <h5>Welcome to My Daily Journal</h5>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <input type="text" name="user" class="form-control" placeholder="Username" required>
        </div>

        <div class="mb-3">
            <input type="password" name="pass" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>
    </form>
</div>

</body>
</html>
