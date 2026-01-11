<?php
include "koneksi.php";
$id=$_GET['id'];
$data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM gallery WHERE id='$id'"));
?>

<div class="card shadow border-0">
<div class="card-header text-white fw-semibold" style="background:#ff9fcf;">
✏️ Edit Gallery
</div>
<div class="card-body">

<form method="post" enctype="multipart/form-data">
<div class="mb-3">
<label class="fw-semibold">Judul</label>
<input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control rounded-pill">
</div>

<div class="mb-3">
<label class="fw-semibold">Gambar Baru</label>
<input type="file" name="gambar" class="form-control rounded-pill">
</div>

<button name="update" class="btn btn-warning rounded-pill px-4">Update</button>
<a href="admin.php?page=gallery" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
</form>

</div>
</div>

<?php
if(isset($_POST['update'])){
 $judul=$_POST['judul'];

 if($_FILES['gambar']['name']!=""){
  $gambar=$_FILES['gambar']['name'];
  move_uploaded_file($_FILES['gambar']['tmp_name'],"img/".$gambar);
  mysqli_query($conn,"UPDATE gallery SET judul='$judul',gambar='$gambar' WHERE id='$id'");
 }else{
  mysqli_query($conn,"UPDATE gallery SET judul='$judul' WHERE id='$id'");
 }

 echo "<script>alert('Gallery diupdate');location='admin.php?page=gallery';</script>";
}
?>
