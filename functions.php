<?php

function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', 'Nazriel3080', 'pw2025_tubes_243040026');
    return $conn;
}

function query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{

    $conn = koneksi();

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $judul = htmlspecialchars($data["judul"]);

    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $query = "INSERT INTO art (gambar, judul, deskripsi)
    VALUES
    ('$gambar', '$judul', '$deskripsi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('pilih gambar')
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda pilih bukan gambar')
        </script>";
        return false;
    }

    if ($ukuranFile > 10000000) {
        echo "<script>
        alert('terlalu gede')
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../dashboard/img/' . $namaFileBaru);

    return $namaFileBaru;
}



function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM art WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();

    $id = $data["id"];

    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $query = "UPDATE art SET 
                gambar = '$gambar',
                judul = '$judul',
                deskripsi = '$deskripsi'
                WHERE id = $id
                ";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * art 
                WHERE
                gambar = '$keyword',
                judul = '$keyword',
                deskripsi = '$keyword'
                ";

    return query($query);
}

function registrasi($data)
{

    $conn = koneksi();

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password !== $password2) {
        "<script>
            alert('Password Tidak Sesuai');
            document.location.href = 'registrasi.php';
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username Sudah Ada Yang Pakai');
                document.location.href = 'registrasi.php';
            </script>";
        return false;
    }


    mysqli_query($conn, "INSERT INTO users (username, password, gambar, deskripsi) VALUES ('$username', '$password', '', '')");

    mysqli_affected_rows($conn);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
            alert('Registrasi Berhasil!');
            document.location.href = '../login/login.php'; 
        </script>";
        return true;
    } else {
        echo "<script>
            alert('Registrasi Gagal!');
            document.location.href = 'registrasi.php';
        </script>";
        return false;
    }

    function login($data)
    {
        $conn = koneksi();

        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);

        if ($username == 'admin' && $password == 'admin123') {

            header("Location: dashboard/dashboard.php");
            exit;
        } else {
            return [
                'error' => true,
                'pesan' => 'username / password salah'
            ];
        }
    }
}
