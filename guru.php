<?php include 'header.php' ?>

<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Data Guru
            </div>
            <div class="box-body">

                <?php
                    global $conn;
                    // Auto-migrate: tambah kolom jumlah guru jika belum ada
                    mysqli_query($conn, "ALTER TABLE pengaturan ADD COLUMN IF NOT EXISTS jumlah_guru_laki INT DEFAULT 0");
                    mysqli_query($conn, "ALTER TABLE pengaturan ADD COLUMN IF NOT EXISTS jumlah_guru_perempuan INT DEFAULT 0");

                    if(isset($_GET['success'])){
                        echo "<div class='alert alert-success'>".$_GET['success']."</div>";
                    }

                    $laki      = intval($d->jumlah_guru_laki ?? 0);
                    $perempuan = intval($d->jumlah_guru_perempuan ?? 0);
                    $total     = $laki + $perempuan;
                ?>

                <!-- Statistik Ringkas -->
                <div style="display:flex; gap:16px; margin-bottom:32px; flex-wrap:wrap;">
                    <div style="flex:1; min-width:140px; background:linear-gradient(135deg,#25671E,#1a4a0f); color:#fff; border-radius:14px; padding:20px 24px; text-align:center;">
                        <div style="font-size:2.2rem; font-weight:800;"><?= $total ?></div>
                        <div style="font-size:13px; opacity:.85; margin-top:4px;"><i class="fa fa-users"></i> Total Guru</div>
                    </div>
                    <div style="flex:1; min-width:140px; background:linear-gradient(135deg,#1565c0,#0d47a1); color:#fff; border-radius:14px; padding:20px 24px; text-align:center;">
                        <div style="font-size:2.2rem; font-weight:800;"><?= $laki ?></div>
                        <div style="font-size:13px; opacity:.85; margin-top:4px;"><i class="fa fa-mars"></i> Guru Laki-laki</div>
                    </div>
                    <div style="flex:1; min-width:140px; background:linear-gradient(135deg,#ad1457,#880e4f); color:#fff; border-radius:14px; padding:20px 24px; text-align:center;">
                        <div style="font-size:2.2rem; font-weight:800;"><?= $perempuan ?></div>
                        <div style="font-size:13px; opacity:.85; margin-top:4px;"><i class="fa fa-venus"></i> Guru Perempuan</div>
                    </div>
                </div>

                <form action="" method="POST">

                    <div class="form-group">
                        <label><i class="fa fa-mars" style="color:#1565c0;"></i> Jumlah Guru Laki-laki</label>
                        <input type="number" name="jumlah_laki" min="0" class="input-control"
                               value="<?= $laki ?>" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fa fa-venus" style="color:#ad1457;"></i> Jumlah Guru Perempuan</label>
                        <input type="number" name="jumlah_perempuan" min="0" class="input-control"
                               value="<?= $perempuan ?>" required>
                    </div>

                    <input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-green">

                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $jml_laki      = intval($_POST['jumlah_laki']);
                        $jml_perempuan = intval($_POST['jumlah_perempuan']);
                        $currdate      = date('Y-m-d H:i:s');

                        $update = mysqli_query($conn, "UPDATE pengaturan SET
                            jumlah_guru_laki       = '$jml_laki',
                            jumlah_guru_perempuan  = '$jml_perempuan',
                            updated_at             = '$currdate'
                            WHERE id               = '".$d->id."'
                        ");

                        if($update){
                            echo "<script>window.location='guru.php?success=Data guru berhasil disimpan'</script>";
                        }else{
                            echo '<div class="alert alert-error">Gagal menyimpan: '.mysqli_error($conn).'</div>';
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
