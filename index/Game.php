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

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/NavLogo.jpg" width="50" height="50" alt="">
            </div>

            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="../community/community.php">Community</a></li>
            </ul>

            <div class="logologin">
                <a href="login/loginindex.php"><img src="img/NavLogin.png" alt="" width="150" height="50"></a>
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
        <div class="gambar">
            <img src="img/COC.jpeg" alt="">
        </div>

        <div class="desc">
            <div class="descgambar">
                <img src="img/Desc.png" alt="" width="600" height="400">
            </div>
            <div class="teks">
                <h1>PIMPIN PASUKAN UNTUK MERAIH KEMENANGAN!!!</h1>
                <h4>Jawab panggilan si kumis! Bergabunglah dalam pertikaian internasional yang disebut Clash of Clans. Sesuaikan desa Anda, bangun pasukan, dan hancurkan lawan Anda. Suka menggunakan persahabatan untuk menakut-nakuti musuh Anda? Bergabunglah dengan Klan, atau bangun warisan Clash dengan menciptakan warisan Anda sendiri. Pilihan ada di tangan Anda dalam komunitas Barbarian yang beranggotakan jutaan orang ini. Unduh gratis dan teruslah Clash, Chief!</h4>
            </div>
        </div>

        <div class="news">
            <div class="newstittle">
                <h1>News</h1>
            </div>

            <div class="newsgrid">
                <div class="newspoto1">
                    <img src="img/newslogo1.png" alt="" width="500" height="270">
                    <h3>CLASH OF CLANS</h3>
                    <h4>Dark Days Are Upon Us!</h4>
                </div>
                <div class="newspoto2">
                    <img src="img/newslogo2.png" alt="" width="500" height="270">
                    <h3>CLASH OF CLANS</h3>
                    <h4>Mini Spotlight Event: Super Yeti!</h4>
                </div>
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
            <div class="logososmed">
                <div class="youtube"><a href="https://www.youtube.com/@ClashOfClans"><i class="bi bi-youtube"></i></a></div>
                <div class="instagram"><a href="https://www.instagram.com/supercell/"><i class="bi bi-instagram"></i></div></a>
                <div class="twitter"><a href="https://x.com/supercell"><i class="bi bi-twitter"></i></a></div>
                <div class="tiktok"><a href="https://www.tiktok.com/@clashofclans"><i class="bi bi-tiktok"></i></a></div>
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

    <script>
        const menuToggle = document.querySelector('.menu-toggle input')
        const nav = document.querySelector('nav ul')

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>


</body>

</html>