<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM gallery WHERE id='$id'");

echo "<script>alert('Data berhasil dihapus');location='admin.php?page=gallery';</script>";
?>
