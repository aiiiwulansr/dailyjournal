<?php include "koneksi.php"; ?>

<div class="card shadow border-0">
<div class="card-header text-white fw-semibold" style="background:#ff9fcf;">
➕ Tambah Gallery
</div>
<div class="card-body">

<form method="post" enctype="multipart/form-data">
<div class="mb-3">
<label class="fw-semibold">Judul</label>
<input type="text" name="judul" class="form-control rounded-pill" required>
</div>

<div class="mb-3">
<label class="fw-semibold">Gambar</label>
<input type="file" name="gambar" class="form-control rounded-pill" required>
</div>

<button name="simpan" class="btn text-white rounded-pill px-4" style="background:#ff8ccf;">
<i class="bi bi-save"></i> Simpan
</button>
<a href="admin.php?page=gallery" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
</form>

</div>
</div>

<?php
if(isset($_POST['simpan'])){
 $judul=$_POST['judul'];
 $gambar=$_FILES['gambar']['name'];
 move_uploaded_file($_FILES['gambar']['tmp_name'],"img/".$gambar);
 mysqli_query($conn,"INSERT INTO gallery(judul,gambar) VALUES('$judul','$gambar')");
 echo "<script>alert('Gallery berhasil ditambah');location='admin.php?page=gallery';</script>";
}
?>
