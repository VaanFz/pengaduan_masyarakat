<?php
if(isset($_POST['registrasi'])){

    include '../lib/database.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];

$query = "INSERT INTO masyarakat (nik, nama,username, password, telp) VALUE('$nik', '$nama', '$username', '$password', '$telp');";
$execQuery = mysqli_query($koneksi, $query);
if ($execQuery) {
    echo '<script> alert("data berhasil Disimpan")</script>';
    header('Location:../index.php');
} else {
    echo '<script> alert("data ada yang salah")</script>';
}
var_dump($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Masyarakat</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="nik" placeholder="Nomor Induk Kepundukan" required>
        <input type="text" name="nama" placeholder="Nama Asli Anda" required>
        <input type="text" name="username" placeholder="Username Anda" required>
        <input type="password" name="password" placeholder="Password Anda" required>
        <input type="text" name="telp" placeholder="Nomor Telepon Anda" required>
        <input type="submit" name="registrasi" value="registrasi">
    </form>
</body>
</html>