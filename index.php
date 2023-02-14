<!-- LOGIN MASYARAKAT -->

<?php

//deklarasikan session start
SESSION_START();

if (isset($_SESSION['id'])) {
    if($_SESSION['level'] == 'masyarakat') {
        header ('Locatoin:./masyarakat/menulis_pengaduan.php');
    } elseif (($_SESSION['level'] == 'admin') OR ($_SESSION['level'] == 'petugas')) {
        header('Locatoin:./administrator/verifikasi/nonvalid.php');
    } else {
        header('Locatoin:./logout.php');
    }
}



// melakukan Query dari username dan password yang didapatkan di form (html) ke mysql
if(isset($_POST['login'])) {

/*melakukan konseksi ke database*/
include './lib/database.php';

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password';";
$execQuery = mysqli_query($koneksi, $query);

$getData = mysqli_fetch_all($execQuery, MYSQLI_ASSOC);
$numRows = mysqli_num_rows($execQuery);

if ($numRows == 1) {
    foreach ($getData as $data) {
        $_SESSION['id'] = $data['nik'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = 'masyarakat';
    }
    header('Location:masyarakat/menulis_pengaduan.php');
} else {
    echo '<script> alert("data Anda Salah")</script>';
}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <h2>Login Masyarakat</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>