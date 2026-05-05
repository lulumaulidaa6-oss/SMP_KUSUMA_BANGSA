<?php
    session_start();
    include '../koneksi.php';
    global $conn;
    if(!isset($_SESSION['status_login'])){
        echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu'</script>";
    }
    date_default_timezone_set("Asia/Jakarta");

    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    if($identitas){
        $d = mysqli_fetch_object($identitas);
    }
    if(empty($d)){
        $d = (object) [
            'id' => 1,
            'nama' => 'SMP Kusuma Bangsa',
            'favicon' => '',
            'logo' => '',
            'foto_sekolah' => '',
            'nama_kepsek' => 'Kepala Sekolah',
            'sambutan_kepsek' => 'Selamat datang di website resmi SMP Kusuma Bangsa.',
            'email' => '',
            'telepon' => '',
            'alamat' => '',
            'google_maps' => '',
            'tentang_sekolah' => '',
            'foto_kepsek' => ''
        ];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
        <title> Panel Admin - <?= $d->nama ?></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.tiny.cloud/1/d2ox7tu2mwfp6x55s6kcle1l233rq0zz7jzhd8m5g5k30fsw/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
            <script>
            tinymce.init({
                selector: 'textarea'
            });
            </script>
    </head>

    <body class="bg-light">

        <!-- navbar -->
         <div class="navbar">

            <div class="container">

                <!-- navbar brand -->
                 <h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama ?></h2>

                 <!-- hamburger button -->
                 <button class="hamburger-admin" id="hamburgerAdmin">
                     <span></span>
                     <span></span>
                     <span></span>
                 </button>

                 <!-- navbar menu -->
                <ul class="nav-menu float-left" id="navMenu">
                    <li><a href="index.php">Dashboard</a></li>

                    <?php if($_SESSION['ulevel'] == 'super_admin') { ?>

                        <li><a href="pengguna.php">Pengguna</a></li>

                    <?php }elseif($_SESSION['ulevel'] == 'admin'){ ?>

                            <li><a href="galeri.php">Galeri</a></li>
                            <li><a href="informasi.php">Informasi</a></li>
                            <li>
                                <a href="#">Pengaturan <i class="fa-solid fa-caret-down"></i></a>

                                <!-- sub menu -->
                                <ul class="dropdown">
                                  <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                                    <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                                     <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
                                 </ul>
                            </li>

                    <?php } ?>

                    <li>
                        <a href="#"><?= $_SESSION['uname'] ?> (<?=$_SESSION['ulevel'] ?>) <i class="fa-solid fa-caret-down"></i></a>
                    
                        <!-- sub menu -->
                         <ul class="dropdown">
                            <li><a href="ubah-password.php">Ubah Password</a></li>
                            <li><a href="logout.php">Keluar</a></li>
                        </ul>
                    </li>
                </ul>

                    <div class="clearfix"></div>
                </div> 

            </div> 
        </div>

    <script>
        // Hamburger Menu Toggle for Admin
        const hamburgerAdmin = document.getElementById('hamburgerAdmin');
        const navMenu = document.getElementById('navMenu');

        hamburgerAdmin.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            hamburgerAdmin.classList.toggle('active');
        });

        // Close menu when a link is clicked
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
                hamburgerAdmin.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.navbar')) {
                navMenu.classList.remove('active');
                hamburgerAdmin.classList.remove('active');
            }
        });
    </script>