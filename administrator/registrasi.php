<?php
SESSION_START();
    if ($_SESSION['level'] != 'admin') {
        header('Location:../logout.php');
    }


if(isset($_POST['registrasi'])){

    include '../lib/database.php';


$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];
$level = $_POST['level'];

$query = "INSERT INTO petugas (nama_petugas,username, password, telp, level) VALUE('$nama_petugas', '$username', '$password', '$telp', '$level');";
$execQuery = mysqli_query($koneksi, $query);
if ($execQuery) {
    echo '<script> alert("data berhasil Disimpan")</script>';
    header('Location:../administrator/index.php');
} else {
    echo '<script> alert("data ada yang salah")</script>';
}
// var_dump($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="nama_petugas" placeholder="Nama Asli Anda" required>
        <input type="text" name="username" placeholder="Username Anda" required>
        <input type="password" name="password" placeholder="Password Anda" required>
        <input type="text" name="telp" placeholder="Nomor Telepon Anda" required>
        <select name="level">
            <option value="petugas">Petugas</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="registrasi" value="registrasi">
    </form>
</body>
</html>