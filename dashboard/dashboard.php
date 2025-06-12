<?php

require "../functions.php";

$art = query("SELECT * FROM art");


if (isset($_POST["cari"])) {
    $art = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Daftar Mahasiswa</h1>

                <form action="" method="post">

                    <input type="text" name="keyword" size="40" autofocus placeholder="Masukan Pencarian" autocomplete="">
                    <button type="submit" name="cari">Cari!</button>

                </form>

                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($art as $seni) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $seni['judul'] ?></td>
                            <td><?= $seni['gambar'] ?></td>
                            <td><?= $seni['deskripsi'] ?></td>
                            <td>
                                <a href="ubah.php?id= <?= $seni["id"] ?>" <button type="button" class="btn btn-danger"><i class="bi bi-pencil-square"></i></a></button> ||
                                <a href="hapus.php?id= <?= $seni["id"]; ?>"><button type="button" class="btn btn-warning"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>