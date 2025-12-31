<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['username'])) {
    header("location:admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = md5($_POST['pass']);

    // FIX QUERY DI SINI
    $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $hasil = $stmt->get_result();
    $row = $hasil->fetch_array(MYSQLI_ASSOC);

    if (!empty($row)) {
        $_SESSION['username'] = $row['username'];
        header("location:admin.php");
        exit();
    } else {
        header("location:login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Login My Daily Journal</h2>
<form method="post" action="">
    Username : <input type="text" name="user"><br><br>
    Password : <input type="password" name="pass"><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
