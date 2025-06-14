<?php

require '../../functions.php';

session_start();

$conn = koneksi();

if ( isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash("sha224", $row["username"]) ) {
        $_SESSION["login"] = true;
    }
}

if ( isset($_SESSION["login"]) ) {
    header("Location: ../communityuser.php");
    exit;

}

$conn = koneksi();

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;

            if (isset($_POST["remember"])) {
                setcookie("id", $row["id"], time() + 60);
                setcookie("key", hash("sha224", $row["username"]), time() + 60);
            }

            if ($username == 'admin') {

            header("Location: ../../dashboard/dashboard.php");
            exit; 
        } else {

                header("Location: ../communityuser.php");
                exit;
            }

        }
    }

    $error = true;
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
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <img alt="Placeholder logo image" class="logo" src="img/LogoLogin.png" />
        <h2 class="title">
            Login
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
            <div class="form-box">
                <input id="remember" name="remember" type="checkbox" />
                <label for="remember">
                    Remember Me
                </label>
            </div>
            <button class="submit-btn" type="submit" name="submit">
                Login
            </button>
        </form>

        <div class="registrasi" align="center">
            <div class="ket" style="font-size: 20px;">
                <h5>Belum Punya Akun?</h5>
            </div>
            <div class="tombolreg" style="font-size: 21px;">
                <a href="../../registrasi/registrasi.php">
                    <h6>registrasi</h6>
                </a>
            </div>
        </div>
    </div>
</body>

</html>