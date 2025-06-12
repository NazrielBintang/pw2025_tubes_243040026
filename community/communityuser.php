<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login/logincommunity.php");
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

    <link rel="stylesheet" href="communityuser.css">
</head>

<header>
    <nav>
        <div class="logo">
            <img src="img/NavLogo.png" width="50" height="50" alt="">
        </div>

        <ul>
            <li><a href="../index/Gameuser.php">Home</a></li>
            <li><a href="#skills">Community</a></li>

            <li>
                <div class="logologin">
                    <h2><a href="../logout.php"><i class="bi bi-box-arrow-left"></i></a></h2>
                </div>
            </li>
        </ul>


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
            <h3>
                Create
            </h3>
        </div>
    </div>
    <div class="tambah">
        <a href="../tambah/tambah.php"><i class="bi bi-plus-circle-fill"></i></a>
    </div>
</div>

<div class="download">
    <div class="logodownload">
        <div class="logodownload1">
            <a href="https://apps.apple.com/us/app/clash-of-clans/id529479190"><img src="img/appstore.png" alt=""></a>
        </div>
        <div class="logodownload2">
            <a href="https://play.google.com/store/apps/details?id=com.supercell.clashofclans&referrer=mat_click_id%3Df6890da7bad79ed3290aa334b12d358d-20141216-1681&pli=1"><img src="img/playstore.png" alt=""></a>
        </div>
        <div class="karakter">
            <img src="img/downloadkarakter.png" alt="">
        </div>
    </div>
</div>

<div class="footer">
    <div class="atas">
        <div class="logososmed">
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
    <div class="lokasi">
        <h6>Supercell</h6>
        <h6>OyJätkäsaarenlaituri</h6>
        <h6>100180</h6>
        <h6>HelsinkiFinland</h6>
    </div>
</div>
</div>


</body>

</html>