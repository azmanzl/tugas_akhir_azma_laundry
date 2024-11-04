<?php
require 'function.php';

$id_transaksi = $_GET['id'];
$data_transaksi = myquery("SELECT * FROM tb_transaksi WHERE id_transaksi = $id_transaksi");
$datas= myquery("SELECT * FROM tb_pelanggan");

// update data
if(isset($_POST['submit_update_transaksi'])){
  global $connection;

  $id_transaksi = $_POST['id_transaksi'];
  $idpelanggan = $_POST['select_pelanggan'];
  $tglmasuk = $_POST['txt_tgl_masuk'];
  $tglselesai = $_POST['txt_tgl_selesai'];
  $berat = $_POST['txt_berat'];
  $harga = $_POST['txt_harga'];
  $status = $_POST['txt_status'];
  $biayatotal = $_POST['txt_biaya_total'];

  $query = "UPDATE tb_transaksi SET
  id_pelanggan_trans = '$idpelanggan',
  tgl_transaksi_masuk = '$tglmasuk',
  tgl_transaksi_selesai = '$tglselesai',
  transaksi_berat = '$berat',
  transaksi_harga = '$harga',
  transaksi_status = '$status',
  biaya_total = '$biayatotal'
  WHERE id_transaksi = $id_transaksi
  ";

  mysqli_query($connection, $query);
  $cek = mysqli_affected_rows($connection);
  //Jika true
  if($cek > 0){
    echo "<script> alert('Data berhasil diubah');
    document.location.href = 'data_transaksi.php';
    </script>";
  }else{
    echo "<script> alert('Data gagal diubah');
    </script>";
  }
} 
?>

<!-- // // insert data
// if(isset($_POST['submit_insert_transaksi'])){
//   $query_insert = "INSERT INTO tb_transaksi
//   VALUE ('', '$nama', '$notelp', '$alamat')";

//   $res = mysqli_query($connection, $query_insert);

//   if($res){
//     // jika berhasil
//     header("Location: data_transaksi.php");
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
    <title>Form Edit Transaksi</title>
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
               
                    <h3 class="mt-3 mb-2">Form Edit Transaksi</h3>
                    <a href="./data_transaksi.php" class="d-bloc mb-4">Kembali</a>

                    <?php if(isset($err)): ?>
                    <p><?=  $err; ?></p>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body edit">

                            <form method="POST">
                                  <input type="hidden" value="<?= $id_transaksi?>" name="id_transaksi" />
                                  <div class="mb-4">
                                    <label>Pelanggan</label>
                                    <select class="form-select" name="select_pelanggan" required>
                                      <!-- ini yang baru -->
                                      <option value="">Pilih Pelanggan</option>
                                      <?php foreach ($datas as $dat): ?>
                                        <?php 
                                          $select = '';
                                          if($data_transaksi[0]['id_pelanggan_trans'] == $dat['id_pelanggan']){
                                            $select = 'selected';
                                          }
                                        ?>
                                        <option value="<?= $dat['id_pelanggan'] ?>" <?= $select?>>
                                          <?= $dat['nama_pelanggan'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                  <!-- <div class="mb-4">
                                    <label>Pelanggan</label>
                                    <input type="text" class="form-control" name="select_pelanggan" placeholder="Masukkan nama"
                                    autocomplete="off" value="<?= $data_transaksi[0]['id_pelanggan_trans']?>"/>
                                </div> -->
                                <div class="mb-4">
                                    <label>Tanggal Masuk</label>
                                    <input type="text" class="form-control" name="txt_tgl_masuk" placeholder="Masukkan tanggal"
                                    autocomplete="off" value="<?= $data_transaksi[0]['tgl_transaksi_masuk']?>"/>
                                </div>
                                <div class="mb-4">
                                    <label>Tanggal Selesai</label>
                                    <input type="text" class="form-control" name="txt_tgl_selesai" placeholder="Masukkan tanggal"
                                    autocomplete="off" value="<?= $data_transaksi[0]['tgl_transaksi_selesai']?>"/>
                                </div>
                                <div class="mb-4">
                                    <label>Berat</label>
                                    <input type="number" id="txtBerat" name="txt_berat" class="form-control"
                                    placeholder="0" autocomplete="off" value="<?= $data_transaksi[0]['transaksi_berat'] ?>" onchange="calculate()" />
                                </div>
                                <div class="mb-4">
                                    <label>Harga</label>
                                    <input type="number" id="txtHarga" name="txt_harga" class="form-control"
                                    placeholder="0" autocomplete="off" min="1" value="<?= $data_transaksi[0]['transaksi_harga'] ?>" onchange="calculate()" />
                                </div>
                                <div class="mb-4">
                                    <label>Total</label>
                                    <h3>Rp <span id="biayaTotal">0</span></h3>
                                    <input type="hidden" name="txt_biaya_total" id="txtBiayaTotal" />
                                </div>

                                <select class="form-select" name="txt_status" aria-label="Default select example" required>
                                  <option selected>Status</option>
                                  <!-- bikin kondisi kalau true akan muncul status yg sesuai -->
                                  <option value="Antrian" <?= ($data_transaksi[0]['transaksi_status'] === 'Antrian' ? 'selected' : '') ?>>Antrian</option>
                                  <option value="Proses"  <?= ($data_transaksi[0]['transaksi_status'] === 'Proses' ? 'selected' : '') ?>>Proses</option>
                                  <option value="Selesai"  <?= ($data_transaksi[0]['transaksi_status'] === 'Selesai' ? 'selected' : '') ?>>Selesai</option>
                                </select>

                                <!-- <div class="dropdown">
                                    <button class="btn btn-secondary` dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Status
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">antrian</a></li>
                                        <li><a class="dropdown-item" href="#">proses</a></li>
                                        <li><a class="dropdown-item" href="#">selesai</a></li>
                                    </ul>
                                </div> -->
                                <br>
                                <div>
                                  <button type="submit" class="btn btn-primary" name="submit_update_transaksi">Simpan Perubahan</button>
                                </div>
                            </form>

                        </div>
                    </div>

            </div>
        </div>
    </div>
<!-- Akhir Form Edit -->

<!-- Perhitungan Harga -->
<script>
  function calculate(){
    let beratVal = document.getElementById('txtHarga').value;
    let hargaVal = document.getElementById('txtBerat').value;
    let result = beratVal * hargaVal;
    document.getElementById('biayaTotal').innerHTML = result;
    document.getElementById('txtBiayaTotal').value = result;
  }

  window.onload = calculate();
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>