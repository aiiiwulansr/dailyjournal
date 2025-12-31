<script>
$(document).ready(function(){
    load_data(1);

    function load_data(hlm){
        $.ajax({
            url : "article_data.php",
            method : "POST",
            data : { hlm: hlm },
            success : function(data){
                $('#article_data').html(data);
            }
        });
    }

    $(document).on('click', '.halaman', function(){
        var hlm = $(this).attr("id");
        load_data(hlm);
    });
});
</script>

<?php
include "koneksi.php";
include "upload_foto.php";

$username = $_SESSION['username'] ?? 'admin';
date_default_timezone_set('Asia/Jakarta');
?>

<div class="container mt-3">

    <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Article
    </button>

    <!-- DATA AJAX -->
    <div class="table-responsive" id="article_data"></div>

</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="aksi" value="tambah">

                <div class="modal-header">
                    <h5>Tambah Article</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
                    <textarea name="isi" class="form-control mb-2" placeholder="Isi" required></textarea>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
/* =========================
   SIMPAN & UPDATE
========================= */
if (isset($_POST['aksi']) && ($_POST['aksi'] == 'tambah' || $_POST['aksi'] == 'edit')) {

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date("Y-m-d H:i:s");
    $gambar = '';

    if (!empty($_FILES['gambar']['name'])) {
        $upload = upload_foto($_FILES['gambar']);
        if ($upload['status']) {
            $gambar = $upload['message'];
        }
    }

    if ($_POST['aksi'] == 'edit') {
        $id = $_POST['id'];

        if ($gambar == '') {
            $gambar = $_POST['gambar_lama'];
        } else if ($_POST['gambar_lama'] && file_exists("img/".$_POST['gambar_lama'])) {
            unlink("img/".$_POST['gambar_lama']);
        }

        $stmt = $conn->prepare(
            "UPDATE article SET judul=?, isi=?, gambar=?, tanggal=?, username=? WHERE id=?"
        );
        $stmt->bind_param("sssssi", $judul, $isi, $gambar, $tanggal, $username, $id);

    } else {
        $stmt = $conn->prepare(
            "INSERT INTO article (judul, isi, gambar, tanggal, username) VALUES (?,?,?,?,?)"
        );
        $stmt->bind_param("sssss", $judul, $isi, $gambar, $tanggal, $username);
    }

    $stmt->execute();
    echo "<script>alert('Data berhasil disimpan');location='admin.php?page=article';</script>";
}

/* =========================
   HAPUS DATA
========================= */
if (isset($_POST['aksi']) && $_POST['aksi'] == 'hapus') {

    if ($_POST['gambar'] && file_exists("img/".$_POST['gambar'])) {
        unlink("img/".$_POST['gambar']);
    }

    $stmt = $conn->prepare("DELETE FROM article WHERE id=?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();

    echo "<script>alert('Data berhasil dihapus');location='admin.php?page=article';</script>";
}
?>
