<?php 
	session_start();
	include '../conn/koneksi.php';
	if(!isset($_SESSION['username'])){
		header('location:../index.php');
	}
	elseif($_SESSION['data']['level'] != "admin"){
		header('location:../index.php');
	}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">  
  </head>
<body style="background: url(Image/PM.png); background-size: cover;">
 <style>
    .navbar {
    font-size: 30px;
    padding-top: 2rem !important;
    padding-bottom: 2rem !important;
    top: 0;
    left: 0;
    box-shadow: 0 5px 10px rgba(0,0,0,0,1);  
    }

    .collapse navbar-collapse {
      .left{text-align: left;} 
    }

 </style>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-success bg-success-subtle py-3 fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Laporan Pengaduan Masyarakat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <center>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengaduan.php">Pengaduan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="respon.php">Respon</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="laporan.php">Laporan</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user.php">User</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" waves-effect href="../pkk-pengaduan/login.php" dropdown-item href="#">Logout</a></li>
          </ul>
        </li>
        <div class="divider"></div>
      </li>
      </ul>
      </div>
    </div>
  </div>
</nav>
  </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
