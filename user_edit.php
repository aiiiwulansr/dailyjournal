<?php
include "koneksi.php";
$id=$_GET['id'];
$data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE id='$id'"));
?>

<div class="card shadow border-0">
<div class="card-header text-white fw-semibold" style="background:#ff9fcf;">
✏️ Edit User
</div>
<div class="card-body">

<form method="post" enctype="multipart/form-data">
<div class="mb-3">
<label class="fw-semibold">Username</label>
<input type="text" name="username" value="<?= $data['username'] ?>" class="form-control rounded-pill">
</div>

<div class="mb-3">
<label class="fw-semibold">Password (opsional)</label>
<input type="password" name="password" class="form-control rounded-pill">
</div>

<div class="mb-3">
<label class="fw-semibold">Foto Baru</label>
<input type="file" name="foto" class="form-control rounded-pill">
</div>

<button name="update" class="btn btn-warning rounded-pill px-4">Update</button>
<a href="admin.php?page=user" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
</form>

</div>
</div>

<?php
if(isset($_POST['update'])){
 $username=$_POST['username'];

 if($_POST['password']!=""){
  $password=md5($_POST['password']);
  mysqli_query($conn,"UPDATE user SET username='$username',password='$password' WHERE id='$id'");
 }else{
  mysqli_query($conn,"UPDATE user SET username='$username' WHERE id='$id'");
 }

 if($_FILES['foto']['name']!=""){
  $foto=$_FILES['foto']['name'];
  move_uploaded_file($_FILES['foto']['tmp_name'],"img/".$foto);
  mysqli_query($conn,"UPDATE user SET foto='$foto' WHERE id='$id'");
 }

 echo "<script>alert('User diupdate');location='admin.php?page=user';</script>";
}
?>
