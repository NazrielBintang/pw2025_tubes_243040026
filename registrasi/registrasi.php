<?php

require '../functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo
        "<script>
        alert('Registrasi Berhasil');
        document.location.href = '../community/login/logincommunity.php';
        </script>";
    } else {
        "<script>
        alert('Registrasi Gagal');
        document.location.href = 'registrasi.php';
        </script>";
    }
}

?>




<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Login Admin
    </title>
    <link rel="stylesheet" href="registrasi.css">
</head>

<body>
    <div class="container">
        <img alt="Placeholder logo image" class="logo" src="img/LogoLogin.png" />
        <h2 class="title">
            Sign Up
        </h2>
        <form method="post">
            <div class="form-group">
                <label for="username">
                    Username:
                </label>
                <input id="username" name="username" type="text" />
            </div>
            <div class="form-group">
                <label for="password">
                    Password:
                </label>
                <input id="password" name="password" type="password" />
            </div>
            <div class="form-group">
                <label for="password2">
                    Confirm Password:
                </label>
                <input id="password2" name="password2" type="password" />
            </div>

            <button class="submit-btn" type="submit" name="register">
                Login
            </button>
        </form>
        <?php if (isset($error)): ?>
            <p class="text-danger mb-4"><?= $error; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>