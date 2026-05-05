<?php include 'header.php'; ?>
        <div class="section section-light">
            <div class="container">
                <div class="section-header text-center">
                    <h3>Kontak</h3>
                    <p>Hubungi kami untuk informasi lebih lanjut mengenai SMP Kusuma Bangsa.</p>
                </div>
                <div class="row align-center">
                    <div class="col-6 text-left">
                        <div class="contact-card">
                            <p><strong>Alamat:</strong><br><?= !empty($d->alamat) ? $d->alamat : 'Alamat belum diisi.' ?></p>
                            <p><strong>Telepon:</strong><br><?= !empty($d->telepon) ? $d->telepon : 'Telepon belum diisi.' ?></p>
                            <p><strong>Email:</strong><br><?= !empty($d->email) ? $d->email : 'Email belum diisi.' ?></p>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div class="contact-card">
                            <?php if(!empty($d->google_maps)): ?>
                                <div class="box-gmaps">
                                    <iframe src="<?= $d->google_maps ?>" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            <?php else: ?>
                                <p>Google Maps belum diatur. Silakan perbarui informasi kontak di panel admin.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>