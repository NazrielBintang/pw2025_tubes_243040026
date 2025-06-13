<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login/logincommunity.php");
}

require "../functions.php";



$jumlahDataPerhalaman = 3;

$jumlahData = count(query("SELECT * FROM art"));

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

$halamanAktif = (isset($_GET["halaman"]) && $_GET["halaman"] > 0) ? intval($_GET["halaman"]) : 1;

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$art = query("SELECT * FROM art LIMIT $awalData, $jumlahDataPerhalaman");


if (isset($_POST["cari"])) {
    $art = cari($_POST["keyword"]);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>SuperCell</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="community.css">
</head>

<header>
    <nav>
        <div class="logo">
            <img src="img/NavLogo.jpg" width="200" height="50" alt="">
        </div>

        <ul>
            <li><a href="../index/Game.php">Home</a></li>
            <li><a href="#skills">Community</a></li>
            <li><a href="#about">About Us</a></li>
        </ul>


        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SuperCell</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="Game.css">
</head>

<style>
    .kotak {
        height: auto;
    }

    .karya {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }

    .card {
        width: 18rem;
        border: solid;
        margin: 0 0 20px 20px;
        border-radius: 20px;
        padding: 20px;
        height: 95%;
    }

    .card img {
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        margin-top: 20px;
        text-align: left;
    }

    .card-title {
        font-size: 25px;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 15px;
        font-weight: 350;
        margin-bottom: 10px;
        overflow: hidden;
    }


    .overlay {
        width: 0;
        height: 0;
        overflow: hidden;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: rgba(0, 0, 0, 0);
        z-index: 9999;
        transition: .8s;
        text-align: center;
        padding: 100px 0;
    }

    .overlay:target {
        width: auto;
        height: auto;
        bottom: 0;
        right: 0;
        background: rgba(0, 0, 0, .7);
        border-radius: 20px;
    }

    .overlay img {
        height: 100%;

    }

    .overlay:target img {
        animation: zoomDanFade 1s;
    }

    .overlay .close {
        position: absolute;
        top: 60px;
        left: 50%;
        margin-left: -18px;
        color: white;
        text-decoration: none;
        background-color: black;
        border: 1px solid white;
        line-height: 20px;
        padding: 5px;
        opacity: 0;
    }

    .overlay:target .close {
        animation: slidedownfade .5s .5s forwards;
    }

    .pagination {
        font-size: 20px;
        width: 10px;
        height: 25px;
        margin: 20px;
        display: flex;

    }


    .cari {
        text-align: left;
        margin-left: 25px;
        margin-bottom: 20px;
        font-size: 30px;
    }

    /* Animation */

    @keyframes zoomDanFade {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }

    }

    @keyframes slidedownfade {
        0% {
            opacity: 0;
            margin-top: -20px
        }

        100% {
            opacity: 1;
            margin-top: 0;
        }
    }
</style>

<body style="height: auto;">
    <header>
        <nav>
            <div class="logo">
                <img src="img/NavLogo.png" width="200" height="50" alt="">
            </div>

            <ul>
                <li><a href="../index/Gameuser.php">Home</a></li>
                <li><a href="">Community</a></li>
            </ul>

            <div class="logologin">
                <a href="login/logout.php" style="font-size: 35px;color: black;"><i class="bi bi-box-arrow-left"></i></a>
            </div>


            <div class="menu-toggle">
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="art">
            <div class="descart">
                <h3>Membuat konten untuk game favorit Anda</h3>
                <h4>Buat konten terbaik untuk game Supercell agar berkesempatan melihatnya dalam game.
            </div>
        </div>

        <div class="kotak">
            <div class="tittle">
                <h3 style="text-align: center;">
                    Buat Karyamu!!!
                </h3>
            </div>
            <div class="pagination">
                <?php if ($halamanAktif > 1) : ?>

                <?php endif; ?>

                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>

                    <?php if ($i == $halamanAktif) : ?>

                        <a href="?halaman=<?= $i ?>" class="page-item" style="margin-left: 15px; color: red;margin-right: 10px;"><?= $i; ?></a>

                    <?php else : ?>

                        <a href="?halaman=<?= $i ?>"><?= $i; ?></a>

                    <?php endif; ?>

                <?php endfor; ?>

                <?php if ($halamanAktif < $jumlahHalaman) : ?>

                <?php endif; ?>

            </div>


            <div class="cari">
                <form action="" method="post">
                    <input type="text" name="keyword" style="font-size: 20px;" size="40" autofocus placeholder="Masukan Pencarian" autocomplete="">
                    <button type="submit" name="cari">Cari!</button>
                </form>
            </div>

            <div class="karya">
                <?php $i = 1; ?>
                <?php foreach ($art as $seni) : ?>
                    <div class="card">
                        <a href="#karya<?= $i ?>"><img src="../dashboard/img/<?= $seni['gambar'] ?>" style="width: 100%; max-height: 200px; object-fit: cover;" alt=""></a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $seni['judul'] ?></h5>
                            <p class="card-text"><?= $seni['deskripsi'] ?></p>

                        </div>
                    </div>
                <?php $i++;
                endforeach; ?>
            </div>

            <?php $j = 1; ?>
            <?php foreach ($art as $seni) : ?>
                <div class="overlay" id="karya<?= $j ?>">
                    <a href="#!" class="close">close</a>
                    <img src="../dashboard/img/<?= $seni['gambar'] ?>" style="width: 80%; max-height: 100%; object-fit: contain;" alt="">
                </div>
            <?php $j++;
            endforeach; ?>
        </div>


        <div class="tambah">
            <a href="../tambah/tambah.php"><i class="bi bi-plus-circle-fill"></i></a>
        </div>

        <div class="download">
            <div class="logodownload">
                <div class="logodownload1">
                    <a href="https://apps.apple.com/us/app/clash-of-clans/id529479190"><img src="img/appstore.png" alt=""></a>
                </div>
                <div class="logodownload2">
                    <a href="https://play.google.com/store/apps/details?id=com.supercell.clashofclans&referrer=mat_click_id%3Df6890da7bad79ed3290aa334b12d358d-20141216-1681&pli=1"><img src="img/playstore.png" alt=""></a>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="atas">
                <div class="logososmed" style="color: blue;">
                    <div class="youtube"><a href="https://www.youtube.com/@ClashOfClans"><i class="bi bi-youtube"></i></a></div>
                    <div class="instagram"><a href="https://www.instagram.com/supercell/"><i class="bi bi-instagram"></i></div></a>
                    <div class="twitter"><a href="https://x.com/supercell"><i class="bi bi-twitter"></i></a></div>
                    <div class="tiktok"><a href="https://www.tiktok.com/@clashofclans"><i class="bi bi-tiktok"></i></a></div>
                </div>

                <div class="logofooter">
                    <img src="img/LogoFooter.png" alt="" width="50" height="50">
                </div>
            </div>


            <div class="garis"></div>
            <div class="lokasi" style="color: wheat;margin: 20px 35px;">
                <h6>Supercell</h6>
                <h6>OyJätkäsaarenlaituri</h6>
                <h6>100180</h6>
                <h6>HelsinkiFinland</h6>
            </div>
        </div>
    </div>


</body>

</html>