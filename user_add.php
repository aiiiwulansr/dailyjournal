<?php include "koneksi.php"; ?>

<div class="card shadow border-0">
<div class="card-header text-white fw-semibold" style="background:#ff9fcf;">
👩‍💻 Tambah User
</div>
<div class="card-body">

<form method="post" enctype="multipart/form-data">
<div class="mb-3">
<label class="fw-semibold">Username</label>
<input type="text" name="username" class="form-control rounded-pill" required>
</div>

<div class="mb-3">
<label class="fw-semibold">Password</label>
<input type="password" name="password" class="form-control rounded-pill" required>
</div>

<div class="mb-3">
<label class="fw-semibold">Foto</label>
<input type="file" name="foto" class="form-control rounded-pill" required>
</div>

<button name="simpan" class="btn text-white rounded-pill px-4" style="background:#ff8ccf;">
<i class="bi bi-person-plus"></i> Simpan
</button>
<a href="admin.php?page=user" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
</form>

</div>
</div>

<?php
if(isset($_POST['simpan'])){
 $username=$_POST['username'];
 $password=md5($_POST['password']);
 $foto=$_FILES['foto']['name'];

 move_uploaded_file($_FILES['foto']['tmp_name'],"img/".$foto);
 mysqli_query($conn,"INSERT INTO user(username,password,foto) VALUES('$username','$password','$foto')");

 echo "<script>alert('User berhasil ditambah');location='admin.php?page=user';</script>";
}
?>
