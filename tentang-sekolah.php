<?php include 'header.php'; ?>

<!-- Hero Banner -->
<div style="background: linear-gradient(135deg, #1a4a0f 0%, #25671E 100%); padding: 52px 0 40px; text-align: center;">
    <h2 style="color:#fff; font-size:2rem; font-weight:700; margin-bottom:8px;">Tentang Sekolah</h2>
    <p style="color:rgba(255,255,255,0.75); font-size:1rem;">Mengenal lebih dekat SMP Kusuma Bangsa</p>
</div>

<!-- Tentang Sekolah -->
<div class="section section-light" style="padding: 60px 0;">
    <div class="container">
        <div class="row align-center">
            <div class="col-6 text-left">
                <h3 style="font-size:1.6rem; color:#25671E; margin-bottom:16px;">
                    <i class="fa fa-school" style="margin-right:8px;"></i> Profil Sekolah
                </h3>
                <div class="detail-card">
                    <p style="line-height:1.9; color:#555;">
                        <?= !empty($d->tentang_sekolah) ? $d->tentang_sekolah : 'Informasi tentang sekolah belum tersedia. Silakan lengkapi data di panel admin.' ?>
                    </p>
                </div>
            </div>
            <div class="col-6 text-center">
                <?php if(!empty($d->foto_sekolah)): ?>
                    <img src="uploads/identitas/<?= $d->foto_sekolah ?>" class="detail-image" style="max-height:340px; object-fit:cover;">
                <?php else: ?>
                    <div class="profile-placeholder" style="width:100%; height:260px; border-radius:18px; background: linear-gradient(135deg,#e8f5e2,#c8e6be); display:flex; align-items:center; justify-content:center; flex-direction:column; gap:12px;">
                        <i class="fa fa-building-columns" style="font-size:48px; color:#25671E; opacity:.5;"></i>
                        <span style="color:#25671E; font-weight:600; opacity:.6;">Foto Sekolah</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Visi & Misi -->
<div class="section" style="background:#f4f9f3; padding: 60px 0;">
    <div class="container">

        <div class="section-header text-center" style="margin-bottom:44px;">
            <h3 style="font-size:1.8rem; color:#1a4a0f; font-weight:700;">Visi &amp; Misi</h3>
            <p style="color:#666; margin-top:8px;">Arah dan tujuan yang kami pegang dalam mendidik generasi bangsa</p>
        </div>

        <div class="row" style="align-items: stretch;">

            <!-- Card Visi -->
            <div class="col-6" style="margin-bottom:0;">
                <div style="background: linear-gradient(135deg, #25671E 0%, #1a4a0f 100%);
                            border-radius: 24px; padding: 40px 36px; height: 100%; box-sizing:border-box;
                            box-shadow: 0 20px 50px rgba(37,103,30,0.25); color:#fff; position:relative; overflow:hidden;">
                    <!-- Decorative circle -->
                    <div style="position:absolute; top:-30px; right:-30px; width:150px; height:150px;
                                border-radius:50%; background:rgba(255,255,255,0.07);"></div>
                    <div style="position:absolute; bottom:-40px; left:-20px; width:120px; height:120px;
                                border-radius:50%; background:rgba(255,255,255,0.05);"></div>

                    <div style="position:relative; z-index:1;">
                        <div style="width:60px; height:60px; background:rgba(255,255,255,0.15);
                                    border-radius:16px; display:flex; align-items:center; justify-content:center;
                                    margin-bottom:20px; font-size:28px;">
                            🎯
                        </div>
                        <h4 style="font-size:1.5rem; font-weight:700; margin-bottom:16px; color:#fff; letter-spacing:.5px;">
                            Visi
                        </h4>
                        <div style="width:40px; height:3px; background:rgba(255,255,255,0.5); border-radius:2px; margin-bottom:20px;"></div>
                        <p style="color:rgba(255,255,255,0.88); line-height:1.9; font-size:15px;">
                            <?= !empty($d->visi) ? nl2br(htmlspecialchars($d->visi)) : 'Visi sekolah belum diisi. Silakan lengkapi di panel admin &rarr; Identitas Sekolah.' ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card Misi -->
            <div class="col-6" style="margin-bottom:0;">
                <div style="background: #fff; border-radius: 24px; padding: 40px 36px; height: 100%; box-sizing:border-box;
                            box-shadow: 0 20px 50px rgba(0,0,0,0.08); border-left: 5px solid #25671E; position:relative; overflow:hidden;">
                    <!-- Decorative -->
                    <div style="position:absolute; top:-20px; right:-20px; width:120px; height:120px;
                                border-radius:50%; background:#f0fae8;"></div>

                    <div style="position:relative; z-index:1;">
                        <div style="width:60px; height:60px; background:#e8f5e2;
                                    border-radius:16px; display:flex; align-items:center; justify-content:center;
                                    margin-bottom:20px; font-size:28px;">
                            🚀
                        </div>
                        <h4 style="font-size:1.5rem; font-weight:700; margin-bottom:16px; color:#25671E; letter-spacing:.5px;">
                            Misi
                        </h4>
                        <div style="width:40px; height:3px; background:#25671E; border-radius:2px; margin-bottom:20px;"></div>
                        <?php
                        if(!empty($d->misi)):
                            $poin_misi = array_filter(array_map('trim', explode("\n", $d->misi)));
                            if(count($poin_misi) > 1):
                        ?>
                        <ul style="padding-left:0; list-style:none; display:flex; flex-direction:column; gap:12px;">
                            <?php $no = 1; foreach($poin_misi as $poin): ?>
                            <li style="display:flex; align-items:flex-start; gap:12px; color:#444; line-height:1.7; font-size:15px;">
                                <span style="min-width:26px; height:26px; background:#e8f5e2; border-radius:50%; display:flex;
                                             align-items:center; justify-content:center; color:#25671E; font-weight:700; font-size:12px; margin-top:1px;"><?= $no++ ?></span>
                                <?= htmlspecialchars($poin) ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        <p style="color:#444; line-height:1.9; font-size:15px;"><?= nl2br(htmlspecialchars($d->misi)) ?></p>
                        <?php endif; else: ?>
                        <p style="color:#aaa; font-style:italic; font-size:15px;">Misi sekolah belum diisi. Silakan lengkapi di panel admin &rarr; Identitas Sekolah.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
    // Ambil data statistik guru dari pengaturan
    $guru_laki      = intval($d->jumlah_guru_laki ?? 0);
    $guru_perempuan = intval($d->jumlah_guru_perempuan ?? 0);
    $total_guru     = $guru_laki + $guru_perempuan;
?>

<!-- Section Data Guru -->
<div style="background: #1a4a0f; padding: 64px 0;">
    <div class="container">

        <div class="section-header text-center" style="margin-bottom:44px;">
            <h3 style="font-size:1.8rem; color:#fff; font-weight:700;">Data Tenaga Pendidik</h3>
            <p style="color:rgba(255,255,255,0.65); margin-top:8px;">Statistik guru dan tenaga pengajar SMP Kusuma Bangsa</p>
        </div>

        <div class="row" style="justify-content:center; align-items:stretch; gap:0;">

            <!-- Card Total Guru -->
            <div class="col-4" style="margin-bottom:0;">
                <div style="background: linear-gradient(145deg, #fff 0%, #f0fae8 100%);
                            border-radius: 24px; padding: 44px 32px; text-align:center; height:100%; box-sizing:border-box;
                            box-shadow: 0 24px 60px rgba(0,0,0,0.25); position:relative; overflow:hidden;">
                    <!-- decorative bg number -->
                    <div style="position:absolute; bottom:-20px; right:-10px; font-size:120px; font-weight:900;
                                color:rgba(37,103,30,0.06); line-height:1; user-select:none;"><?= $total_guru ?></div>
                    <div style="position:relative; z-index:1;">
                        <div style="width:72px; height:72px; background:linear-gradient(135deg,#25671E,#1a4a0f);
                                    border-radius:20px; display:flex; align-items:center; justify-content:center;
                                    margin:0 auto 20px; font-size:30px; box-shadow:0 8px 24px rgba(37,103,30,0.35);">
                            <i class="fa fa-users" style="color:#fff;"></i>
                        </div>
                        <div style="font-size:3.5rem; font-weight:800; color:#1a4a0f; line-height:1;"><?= $total_guru ?></div>
                        <div style="font-size:1rem; font-weight:600; color:#555; margin-top:8px;">Total Guru</div>
                        <div style="font-size:13px; color:#888; margin-top:4px;">Seluruh tenaga pendidik</div>
                    </div>
                </div>
            </div>

            <!-- Card Guru Laki-laki -->
            <div class="col-4" style="margin-bottom:0;">
                <div style="background: linear-gradient(145deg, #e3f2fd 0%, #bbdefb 100%);
                            border-radius: 24px; padding: 44px 32px; text-align:center; height:100%; box-sizing:border-box;
                            box-shadow: 0 24px 60px rgba(0,0,0,0.2); position:relative; overflow:hidden;
                            border-top: 5px solid #1565c0;">
                    <div style="position:absolute; bottom:-20px; right:-10px; font-size:120px; font-weight:900;
                                color:rgba(21,101,192,0.07); line-height:1; user-select:none;"><?= $guru_laki ?></div>
                    <div style="position:relative; z-index:1;">
                        <div style="width:72px; height:72px; background:linear-gradient(135deg,#1565c0,#0d47a1);
                                    border-radius:20px; display:flex; align-items:center; justify-content:center;
                                    margin:0 auto 20px; font-size:30px; box-shadow:0 8px 24px rgba(21,101,192,0.35);">
                            <i class="fa fa-mars" style="color:#fff;"></i>
                        </div>
                        <div style="font-size:3.5rem; font-weight:800; color:#0d47a1; line-height:1;"><?= $guru_laki ?></div>
                        <div style="font-size:1rem; font-weight:600; color:#1565c0; margin-top:8px;">Guru Laki-laki</div>
                        <div style="font-size:13px; color:#1976d2; margin-top:4px;">
                            <?= $total_guru > 0 ? round($guru_laki/$total_guru*100) : 0 ?>% dari total guru
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Guru Perempuan -->
            <div class="col-4" style="margin-bottom:0;">
                <div style="background: linear-gradient(145deg, #fce4ec 0%, #f8bbd0 100%);
                            border-radius: 24px; padding: 44px 32px; text-align:center; height:100%; box-sizing:border-box;
                            box-shadow: 0 24px 60px rgba(0,0,0,0.2); position:relative; overflow:hidden;
                            border-top: 5px solid #ad1457;">
                    <div style="position:absolute; bottom:-20px; right:-10px; font-size:120px; font-weight:900;
                                color:rgba(173,20,87,0.07); line-height:1; user-select:none;"><?= $guru_perempuan ?></div>
                    <div style="position:relative; z-index:1;">
                        <div style="width:72px; height:72px; background:linear-gradient(135deg,#ad1457,#880e4f);
                                    border-radius:20px; display:flex; align-items:center; justify-content:center;
                                    margin:0 auto 20px; font-size:30px; box-shadow:0 8px 24px rgba(173,20,87,0.35);">
                            <i class="fa fa-venus" style="color:#fff;"></i>
                        </div>
                        <div style="font-size:3.5rem; font-weight:800; color:#880e4f; line-height:1;"><?= $guru_perempuan ?></div>
                        <div style="font-size:1rem; font-weight:600; color:#ad1457; margin-top:8px;">Guru Perempuan</div>
                        <div style="font-size:13px; color:#c2185b; margin-top:4px;">
                            <?= $total_guru > 0 ? round($guru_perempuan/$total_guru*100) : 0 ?>% dari total guru
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
