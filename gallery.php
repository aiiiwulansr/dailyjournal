<?php
include "koneksi.php";

$limit = 3;
$hal = $_GET['hal'] ?? 1;
$start = ($hal-1)*$limit;

$data = mysqli_query($conn,"SELECT * FROM gallery ORDER BY id DESC LIMIT $start,$limit");
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM gallery"));
$pages = ceil($total/$limit);
?>

<div class="card shadow border-0">
<div class="card-header text-white fw-semibold" style="background:#ff9fcf;">
🌸 Manajemen Gallery
</div>

<div class="card-body">

<a href="admin.php?page=gallery_add" class="btn btn-sm mb-3 text-white" style="background:#ff8ccf;">
<i class="bi bi-plus-circle"></i> Tambah Gallery
</a>

<div class="table-responsive">
<table class="table table-hover align-middle text-center">
<thead style="background:#ffe0ef;">
<tr>
<th>No</th>
<th>Judul</th>
<th>Gambar</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1+$start; while($d=mysqli_fetch_array($data)){ ?>
<tr>
<td><?= $no++ ?></td>
<td class="fw-semibold"><?= $d['judul'] ?></td>
<td>
<img src="img/<?= $d['gambar'] ?>" width="110" class="rounded shadow-sm">
</td>
<td><?= date("d M Y", strtotime($d['tanggal'])) ?></td>
<td>
<a href="admin.php?page=gallery_edit&id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">
<i class="bi bi-pencil"></i>
</a>
<a href="admin.php?page=gallery_delete&id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Hapus gallery ini?')">
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
<a href="admin.php?page=gallery&hal=<?= $i ?>"
class="btn btn-outline-danger btn-sm <?= ($hal==$i?'active':'') ?>">
<?= $i ?>
</a>
<?php } ?>
</div>

</div>
</div>

