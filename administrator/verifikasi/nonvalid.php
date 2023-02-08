<?php
SESSION_START();
include '../../lib/database.php';
if (($_SESSION['level']!= 'admin') AND ($_SESSION['level'] != 'petugas')) {
    header('Location:../logout.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Non Valid</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>#</th>
            <th>Nama Pengadu</th>
            <th>Tanggal Pengaduan</th>
            <th>Foto Penunjang</th>
            <th>Isi Aduan</th>
            <th>Status</th>
            <th>verifikasi</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</1td>
                <td>1</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
</body>
</html>