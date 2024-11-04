<?php
require 'connection.php';

// $data = myquery("SELECT t.tgl_transaksi_masuk, t.tgl_transaksi_selesai, t.transaksi_berat,
// t.transaksi_harga, t.transaksi_status, t.biaya_total, p.nama_pelanggan, p.id_pelanggan
// FROM tb_pelanggan as p
// join tb_transaksi as t
// on p.id_pelanggan = t.id_pelanggan_trans");

$datas= myquery("SELECT * FROM tb_pelanggan"); //ini baru
// var_dump($data);

// insert data
if(isset($_POST['submit_insert_transaksi'])){
  
  //ngambil data dari form
  $idpelanggan = $_POST['select_pelanggan'];
  $tglmasuk = $_POST['txt_tgl_masuk'];
  $tglselesai = $_POST['txt_tgl_selesai'];
  $berat = $_POST['txt_berat'];
  $harga = $_POST['txt_harga'];
  $biayatotal = $_POST['txt_biaya_total'];
  $status = $_POST['txt_status']; //ini baru
 

  $query_insert = "INSERT INTO tb_transaksi (id_pelanggan_trans, tgl_transaksi_masuk,
  tgl_transaksi_selesai, transaksi_berat, transaksi_harga, biaya_total, transaksi_status)
  VALUES ('$idpelanggan', '$tglmasuk', '$tglselesai', '$berat', '$harga', '$biayatotal', '$status')";

  $res = mysqli_query($connection, $query_insert);
  if($res){
    // jika berhasil
    header("Location: data_transaksi.php");
    exit();
  }else{
    // jika error
    $err = "Data gagal di input";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Form Transaksi Baru</title>
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

<!-- Awal Form Tambah -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
               
                    <h3 class="mt-3 mb-2 text-center"><strong>Form Transaksi Baru</strong></h3>
                    <a href="./data_transaksi.php" class="d-bloc mb-4">Kembali</a>

                    <div class="card mt-3">
                        <div class="card-body transaksi">

                            <form method="POST">
                                <div class="mb-4">
                                    <label>Pelanggan</label>
                                    <select class="form-select" name="select_pelanggan" required>
                                      <!-- ini yang baru -->
                                      <option value="">Pilih Pelanggan</option>
                                      <?php foreach ($datas as $dat): ?>
                                        <option value="<?= $dat['id_pelanggan'] ?>">
                                          <?= $dat['nama_pelanggan'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="txt_tgl_masuk" class="form-control" autocomplete="off"/>
                                </div>
                                <div class="mb-4">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" name="txt_tgl_selesai" class="form-control" autocomplete="off"/>
                                </div>
                                <div class="mb-4">
                                    <label>Berat</label>
                                    <input type="number" id="txtBerat" name="txt_berat" class="form-control"
                                    placeholder="0" autocomplete="off" value="<?$data_transaksi[0]['berat'] ?>" onchange="calculate()" />
                                </div>
                                <div class="mb-4">
                                    <label>Harga</label>
                                    <input type="number" id="txtHarga" name="txt_harga" class="form-control"
                                    placeholder="0" autocomplete="off" min="1" value="1" onchange="calculate()" />
                                </div>
                                <div class="mb-4">
                                    <label>Total</label>
                                    <h3>Rp <span id="biayaTotal">0</span></h3>
                                    <input type="hidden" name="txt_biaya_total" id="txtBiayaTotal" />
                                </div>

                                <select class="form-select" name="txt_status" aria-label="Default select example" required>
                                  <option selected>Status</option>
                                  <option value="Antrian">Antrian</option>
                                  <option value="Proses">Proses</option>
                                  <option value="Selesai">Selesai</option>
                                </select>
                               
                                <br>
                                <div class="mb-4">
                                  <button type="submit" class="btn btn-primary" name="submit_insert_transaksi">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>

            </div>
        </div>
    </div>
<!-- Akhir form tambah -->

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