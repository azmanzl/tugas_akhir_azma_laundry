<?php
// ada 4 variable
$hostname = 'localhost'; //menyimpan nama host tempat server database berada
$user = 'root'; //nama pengguna untuk masuk ke database
$password = ''; //kata sandi untuk pengguna
$db_name = 'db_laundry'; //nama basis data yang akan di akses
$connection = mysqli_connect($hostname, $user, $password, $db_name);

// if($connection){
//     echo 'Koneksi berhasil';
// }
// $res = mysqli_query($connection, "SELECT * FROM tb_pelanggan");
// var_dump($connection);

function myquery($query){ //buat looping get data
    global $connection;
    $res = mysqli_query($connection, $query);
    $returns = [];

    while($data = mysqli_fetch_assoc($res)){
       $returns[] = $data;
    }

    return $returns;
}

?>