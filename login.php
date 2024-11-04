<!-- nyobain -->
<?php
// Memulai session untuk login dan konek ke database
session_start();
require 'connection.php';

// Input data username dan passsword yang di tampung pada variable '$username' dan '$password'
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Cek data user berdasarkan username
  $result = mysqli_query($connection, "SELECT * FROM tb_admin WHERE username='$username'");

  // Periksa apakah ada hasil yang ditemukan
  $cek = mysqli_num_rows($result);

  if ($cek == 1) {
    $row = mysqli_fetch_assoc($result);

    // jika password sesuai
    if ($password === $row['password']) { 
      // Simpan username dalam session
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
      exit();
    } else {
      $err = "Password salah.";
      echo $err;
    }
  } else {
    $err = "Username tidak ditemukan.";
    echo $err;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href= "style.css" rel="stylesheet">  
    <link rel="stylesheet" href="./asets/fontawesome/css/all.min.css">
</head>
<body class="log">
  
    
    <!-- awal form login -->
  <div class="content-section">
        <div class="container">
            <div class="card mx-auto p-1" style="width: 300px;">
                <div class="card-body">
                    <div class="row">
                      <div class ="title login" style="text-align:center"> 
                        <h2><strong>Bening Laundry</strong></h2>
    
                        <form method="POST">
                          <div class="mb-3">
                            <label for="txt_username"><i class="fa-solid fa-user"></i>Username</label>
                            <input type="username" class="form-control" placeholder="username" name="username" required>
                          </div>
                          <div class="mb-3">
                            <label for="txt_password"><i class="fa-solid fa-lock"></i>Password</label>
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                          </div>
                          <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                          </div>
                        </form>

                      </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
<!-- akhir form login -->
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>