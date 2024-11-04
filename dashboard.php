<?php
session_start();

// tar klo dah bisa login, tambahin jadi !isset
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

require 'connection.php';
// menghitung total antrian
$queryAntrian = "SELECT COUNT(*) AS total_antrian FROM tb_transaksi
WHERE transaksi_status = 'Antrian'";
$resAntrian = mysqli_query($connection, $queryAntrian);
$rowAntrian = mysqli_fetch_assoc($resAntrian);
$totalAntrian = $rowAntrian['total_antrian'];

// menghitung total proses
$queryAntrian = "SELECT COUNT(*) AS total_proses FROM tb_transaksi
WHERE transaksi_status = 'Proses'";
$resAntrian = mysqli_query($connection, $queryAntrian);
$rowAntrian = mysqli_fetch_assoc($resAntrian);
$totalProses = $rowAntrian['total_proses'];

// menghitung total selesai
$queryAntrian = "SELECT COUNT(*) AS total_selesai FROM tb_transaksi
WHERE transaksi_status = 'Selesai'";
$resAntrian = mysqli_query($connection, $queryAntrian);
$rowAntrian = mysqli_fetch_assoc($resAntrian);
$totalSelesai = $rowAntrian['total_selesai'];

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
          <ul class="dropdown-menu custom">
            <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->

<!-- dashboard content -->
 <br>
<h1><strong>Dashboard</strong></h1>
<h4>Hi Admin, Welcome in Dashboard!</h4>

<!-- Awal card data -->
<div class="container mt-5">
  <div class="row">
    <!-- Card Total Antrian -->
    <div class="col-md-4 mb-4">
      <div class="card dashboard" style="height: 250px;">
        <div class="card-body">
          <div class="card-icon">
          <i class="fa-solid fa-clipboard-list"></i>
          </div>
          <h5 class="card-title">Total Antrian</h5>
          <p class="card-text display-6"><?php echo $totalAntrian; ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4" >
      <div class="card dashboard" style="height: 250px;">
        <div class="card-body">
          <div class="card-icon">
          <i class="fa-solid fa-soap"></i>
          </div>
          <h5 class="card-title">Total Proses</h5>
          <p class="card-text display-6"><?php echo $totalProses; ?></p></p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card dashboard" style="height: 250px;">
        <div class="card-body">
          <div class="card-icon">
            <i class="fa-solid fa-bag-shopping"></i>
          </div>
          <h5 class="card-title">Total Selesai</h5>
          <p class="card-text display-6"><?php echo $totalSelesai; ?></p>
        </div>
      </div>
    </div>
 <!-- Akhir card data -->
 <!-- akhir content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>