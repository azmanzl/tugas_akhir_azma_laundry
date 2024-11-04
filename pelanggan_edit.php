<?php
require 'function.php';

//Mengambil id data pelanggan berdasarkan data yang dipilih
$id_pelanggan = $_GET['id'];

//Melakukan select data pelanggan berdasarkan ID PELANGGAN
$data_pelanggan = myquery("SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan");

// update data
//
if(isset($_POST['submit_update_pelanggan'])){
  global $connection;

  $id_pelanggan = $_POST['id_pelanggan'];
  $nama = $_POST['txt_nama'];
  $notelp = $_POST['txt_notelp'];
  $alamat = $_POST['txt_alamat'];

  $query = "UPDATE tb_pelanggan SET
  nama_pelanggan = '$nama',
  no_telp_pelanggan = '$notelp',
  alamat_pelanggan = '$alamat'
  WHERE id_pelanggan = $id_pelanggan
  ";

  mysqli_query($connection, $query);
  $cek = mysqli_affected_rows($connection);
  //Jika true
  if($cek > 0){
    echo "<script> alert('Data berhasil diubah');
    document.location.href = 'data_pelanggan.php';
    </script>";
  }else{
    echo "<script> alert('Data gagal diubah');
    </script>";
  }
}  
?>


<!-- // insert data
// if(isset($_POST['submit_insert_pelanggan'])){
//   $query_insert = "INSERT INTO tb_pelanggan
//   VALUE ('', '$nama', '$notelp', '$alamat')";

//   $res = mysqli_query($connection, $query_insert);

//   if($res){
//     // jika berhasil
//     header("Location: data_pelanggan.php");
//     exit();
//   }else{
//     // jika error
//     $err = "Data gagal di input";
//   }
// } -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href= "style.css" rel="stylesheet"> 
    <link rel="stylesheet" href="./asets/fontawesome/css/all.min.css">
</head>

<body>
<!-- Awal Navbar -->
<nav class="navbar navbar-expand-lg custom-nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-jug-detergent"></i><strong>Bening Laundry</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">
            <i class="fa-solid fa-house"></i><strong>Beranda</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="data_pelanggan.php">
            <i class="fa-solid fa-person-military-pointing"></i><strong>Data Pelanggan</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="data_transaksi.php">
            <i class="fa-solid fa-hand-holding-dollar"></i><strong>Data Transaksi</strong></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user-tie"></i>
            <strong>Admin Laundry</strong>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->

<!-- Awal Form Edit -->
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
               
                    <h3 class="mt-3 mb-2">Form Edit Pelanggan</h3>
                    <a href="./data_pelanggan.php" class="d-bloc mb-4">Kembali</a>

                    <?php if(isset($err)): ?>
                    <p><?=  $err; ?></p>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body edit">

                            <form method="POST">
                                  <input type="hidden" value="<?= $id_pelanggan?>" name="id_pelanggan" />
                                <div class="mb-4">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="txt_nama" placeholder="Masukkan nama"
                                    autocomplete="off" value="<?= $data_pelanggan[0]['nama_pelanggan']?>"/>
                                </div>
                                <div class="mb-4">
                                    <label>No Telp</label>
                                    <input type="number" class="form-control" name="txt_notelp" placeholder="Masukkan no.hp"
                                    autocomplete="off" value="<?= $data_pelanggan[0]['no_telp_pelanggan']?>"/>
                                </div>
                                <div class="mb-4">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="txt_alamat" placeholder="Masukkan alamat"
                                    autocomplete="off" value="<?= $data_pelanggan[0]['alamat_pelanggan']?>"/>
                                </div>
                               
                                <div>
                                  <button class="btn btn-primary" name="submit_update_pelanggan">Simpan Perubahan</button>
                                </div>
                            </form>

                        </div>
                    </div>

            </div>
        </div>
    </div>
<!-- Akhir Form Edit -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>