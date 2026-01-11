<?php
include "koneksi.php";

$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM user WHERE id='$id'");

echo "<script>alert('User berhasil dihapus');location='admin.php?page=user';</script>";
?>
