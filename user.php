<?php
include "koneksi.php";

$limit = 5;
$hal = $_GET['hal'] ?? 1;
$start = ($hal-1)*$limit;

$data = mysqli_query($conn,"SELECT * FROM user ORDER BY id DESC LIMIT $start,$limit");
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user"));
$pages = ceil($total/$limit);
?>

<div class="card shadow border-0">
<div class="card-header text-white fw-semibold" style="background:#ff9fcf;">
👩‍💻 Manajemen User
</div>

<div class="card-body">

<a href="admin.php?page=user_add" class="btn btn-sm mb-3 text-white" style="background:#ff8ccf;">
<i class="bi bi-person-plus"></i> Tambah User
</a>

<div class="table-responsive">
<table class="table table-hover align-middle text-center">
<thead style="background:#ffe0ef;">
<tr>
<th>No</th>
<th>Username</th>
<th>Foto</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1+$start; while($d=mysqli_fetch_array($data)){ ?>
<tr>
<td><?= $no++ ?></td>
<td class="fw-semibold"><?= $d['username'] ?></td>
<td>
<img src="img/<?= $d['foto'] ?>" width="70" class="rounded-circle shadow-sm">
</td>
<td>
<a href="admin.php?page=user_edit&id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">
<i class="bi bi-pencil"></i>
</a>
<a href="admin.php?page=user_delete&id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Hapus user ini?')">
<i class="bi bi-trash"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<div class="text-center mt-3">
<?php for($i=1;$i<=$pages;$i++){ ?>
<a href="admin.php?page=user&hal=<?= $i ?>"
class="btn btn-outline-danger btn-sm <?= ($hal==$i?'active':'') ?>">
<?= $i ?>
</a>
<?php } ?>
</div>

</div>
</div>
