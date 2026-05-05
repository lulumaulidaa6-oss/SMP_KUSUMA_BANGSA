<?php include 'header.php'; ?>
        <div class="section section-light">
            <div class="container">
                <div class="section-header text-center">
                    <h3>Detail Informasi</h3>
                </div>
                <?php
                    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
                    if(empty($id)){
                        echo '<div class="alert alert-error text-center">Informasi tidak ditemukan.</div>';
                    } else {
                        $informasi = mysqli_query($conn, "SELECT informasi.*, pengguna.nama AS author FROM informasi LEFT JOIN pengguna ON pengguna.id = informasi.uid WHERE informasi.id = '$id' LIMIT 1");
                        if(!$informasi || mysqli_num_rows($informasi) == 0){
                            echo '<div class="alert alert-error text-center">Informasi tidak ditemukan.</div>';
                        } else {
                            $p = mysqli_fetch_object($informasi);
                ?>
                <div class="detail-card">
                    <h3><?= !empty($p->Judul) ? $p->Judul : 'Informasi tanpa judul' ?></h3>
                    <small>Dibuat pada <?= date('d/m/Y', strtotime($p->created_at)) ?>, oleh <?= !empty($p->author) ? $p->author : 'Admin' ?></small>
                    <?php if(!empty($p->Gambar)): ?>
                        <img src="uploads/informasi/<?= $p->Gambar ?>" class="detail-image">
                    <?php endif; ?>
                    <div class="detail-content">
                        <?= !empty($p->Keterangan) ? $p->Keterangan : '<p>Tidak ada isi informasi.</p>' ?>
                    </div>
                </div>
                <?php }
                    }
                ?>
            </div>
        </div>
<?php include 'footer.php'; ?>