<?php
require 'connection.php';
$data = myquery("SELECT id_pelanggan, nama_pelanggan, no_telp_pelanggan, alamat_pelanggan
  FROM tb_pelanggan");
// var_dump($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pelanggan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
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

  <!-- Awal Data -->
  <div class="container">
    <div class="panel">
      <div class="panel-heading col-sm-12">
        <br>
        <h3><strong>Data Pelanggan</strong></h3>
        <br>

        <a href="pelanggan_tambah.php"
          type="button" class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i><strong> Pelanggan Baru</strong></a>
        <br>
        <hr>
        <!-- Untuk menampilkan pesan transaksi -->
        <?php if (isset($_GET['messages'])): ?>
          <p color="red"><?= $_GET['messages']; ?></p>
        <?php endif; ?>

        <table class="table table-borderes table-striped">
          <thead align="center">
            <tr>
              <th scope="col" width="1%">No</th>
              <th scope="col">Nama</th>
              <th scope="col">No Telp</th>
              <th scope="col">Alamat</th>
              <th scope="col" width="15%">OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?> <!--buat nomor -->
            <!-- Looping / pengulangan untuk menampilkan data yang ada pada database -->
            <?php foreach ($data as $row): ?>
              <tr align="center">
                <td><?= $no++; ?></td>
                <td><?= $row['nama_pelanggan'] ?></td>
                <td><?= $row['no_telp_pelanggan'] ?></td>
                <td><?= $row['alamat_pelanggan'] ?></td>
                <td scope="row">
                  <!-- Menampilkan button untuk edit dan delete -->
                  <a href="pelanggan_edit.php?id=<?= $row['id_pelanggan'] ?>" class="btn btn-primary">Edit</a>
                  <a href="function.php?action=delete&id=<?= $row['id_pelanggan'] ?>" class="btn btn-danger"
                    onClick="return confirm('Yakin akan menghapus?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
  <!-- Akhir Data -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>