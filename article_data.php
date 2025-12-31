<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include "koneksi.php";

           $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
            $limit = 3;
            $limit_start = ($hlm - 1) * $limit;
            $no = $limit_start + 1;

            $sql = "SELECT * FROM article ORDER BY tanggal DESC LIMIT $limit_start, $limit";
            $hasil = $conn->query($sql);

            while ($row = $hasil->fetch_assoc()):
                ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <strong><?= htmlspecialchars($row['judul']) ?></strong><br>
                        <?= $row['tanggal'] ?><br>
                        oleh: <?= $row['username'] ?>
                    </td>
                    <td><?= nl2br(htmlspecialchars($row['isi'])) ?></td>
                    <td>
                        <?php if ($row['gambar'] && file_exists("img/" . $row['gambar'])): ?>
                            <img src="img/<?= $row['gambar'] ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="badge bg-success" data-bs-toggle="modal"
                            data-bs-target="#edit<?= $row['id'] ?>">Edit</span>
                        <span class="badge bg-danger" data-bs-toggle="modal"
                            data-bs-target="#hapus<?= $row['id'] ?>">Hapus</span>
                <!-- MODAL EDIT -->
                <div class="modal fade" id="edit<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" enctype="multipart/form-data" action="admin.php?page=article">
                                <div class="modal-header">
                                    <h5>Edit Article</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="aksi" value="edit">
                                    <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">

                                    <input type="text" name="judul" class="form-control mb-2" value="<?= $row['judul'] ?>"
                                        required>
                                    <textarea name="isi" class="form-control mb-2" required><?= $row['isi'] ?></textarea>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- MODAL HAPUS -->
                <div class="modal fade" id="hapus<?= $row['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="admin.php?page=article">
                                <div class="modal-body">
                                    Yakin hapus <b><?= $row['judul'] ?></b>?
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="gambar" value="<?= $row['gambar'] ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>


            <?php endwhile; ?>

        </tbody>
    </table>

    <?php
    $sql1 = "SELECT * FROM article";
    $hasil1 = $conn->query($sql1);
    $total_records = $hasil1->num_rows;
    ?>
    <p>Total article : <?php echo $total_records; ?></p>
    <nav class="mb-2">
        <ul class="pagination justify-content-end">
            <?php
            $jumlah_page = ceil($total_records / $limit);
            $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
            $start_number = ($hlm > $jumlah_number) ? $hlm - $jumlah_number : 1;
            $end_number = ($hlm < ($jumlah_page - $jumlah_number)) ? $hlm + $jumlah_number : $jumlah_page;

            if ($hlm == 1) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            } else {
                $link_prev = ($hlm > 1) ? $hlm - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="' . $link_prev . '"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            }

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($hlm == $i) ? ' active' : '';
                echo '<li class="page-item halaman ' . $link_active . '" id="' . $i . '"><a class="page-link" href="#">' . $i . '</a></li>';
            }

            if ($hlm == $jumlah_page) {
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
            } else {
                $link_next = ($hlm < $jumlah_page) ? $hlm + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="' . $link_next . '"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="' . $jumlah_page . '"><a class="page-link" href="#">Last</a></li>';
            }
            ?>
        </ul>
    </nav>