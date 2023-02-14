<?php

include '../lib/database.php';
SESSION_START();

if ($_SESSION['level'] != 'masyarakat') {
    header('Location:../logout.php');
}

$id_user = $_SESSION['id'];
$queryShowData = "SELECT * FROM pengaduan where nik = '$id_user'";
$execQueryShowData = mysqli_query($koneksi, $queryShowData);
$getAllData = mysqli_fetch_all($execQueryShowData, MYSQLI_ASSOC);


if(isset($_POST['adukan'])) {
    $laporan = $_POST['laporan'];



    $locationTemp = $_FILES['foto']['tmp_name'];
    $destinationFile = '../assets/img/';

    //servername dibuat localhost jika kalian tidak menggunakan port
    $serverName = 'http://localhost/pengaduan_masyarakat/assets/img/';

    $fileName = str_replace(' ','',$_FILES['foto']['name']);
    $locationUpload = $destinationFile.$fileName;
    move_uploaded_file($locationTemp,$locationUpload);

    $query= "INSERT INTO pengaduan (tgl_pengaduan,nik,isi_laporan,foto,status) 
            VALUE (now(), '$id_user', '$laporan', '$serverName$fileName', NULL);";
    $execQuery = mysqli_query($koneksi, $query);
    var_dump($execQuery);
    if ($execQuery) {
        header ('Location:./menulis_pengaduan.php');
    } else {
        echo '<script>alert("Data aduan ada yang salah")</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aduan</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="foto" required>
        <textarea name="laporan" cols="30" rows="5"></textarea>
        <input type="submit" name="adukan" value="Adukan">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Tangal Aduan</th>
                <th>Foto</th>
                <th>Isi Laporan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $no = 0;
                foreach ($getAllData as $data){
                    $no+=1;
                    if ($data['status'] == NULL) {
                        $status = 'belum valid';
                    } else {
                        $status = $data=['status'];
                    }
                    echo "
                        <tr>
                            <td>$no</td>
                            <td>$data[tgl_pengaduan]</td>
                            <td>
                                <img src = $data[foto] width = 100px height = 100px>
                            </td>
                            <td>$data[isi_laporan]</td>
                            <td>$status</td>
                        </tr>
                    ";
                }
            ?>
            
        </tbody>
    </table>
</body>
</html>