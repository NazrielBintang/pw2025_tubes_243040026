<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login/logincommunity.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

$art = query("SELECT * FROM art WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        header("Location: ../community/community.php");
        exit;
    } else {
        $gagal = "Data gagal ditambahkan";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="ubah.css">
    <link rel="stylesheet" href="tambah.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="form">
            <div class="tittle">
                <h1>Ubah Data</h1>
            </div>

            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $art['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $art['gambar']; ?>">

                <label for="juduk">
                    Input Judul :
                </label>
                <input type="text" name="judul" id="judul" required value="<?= $art['judul']; ?>">

                <label for="gambar">
                    Input Gambar :
                </label>
                <img src="dashboard/img/<?= $art["gambar"]; ?>" alt="">
                <input type="file" name="gambar" id="gambar" required>

                <label for="deskrpsi">
                    Input Deskripsi :
                </label>
                <input type="text" name="deskripsi" id="deskripsi" required value=" <?= $art['deskripsi']; ?>">

                <button type="submit" name="submit">Ubah Data</button>

                <div class="keterangan">
                    <div class="berhasil">
                        <?php
                        if (isset($berhasil)) {
                            echo $berhasil;
                        }
                        ?>
                    </div>
                    <div class="gagal">
                        <?php
                        if (isset($gagal)) {
                            echo $gagal;
                        }
                        ?>
                    </div>
                </div>


        </div>

    </div>


    </form>

</body>

</html>