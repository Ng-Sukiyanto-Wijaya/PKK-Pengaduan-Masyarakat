<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Pengaduan Masyarakat</title>
	<link rel="shortcut icon" href="https://cepatpilih.com/image/logo.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

</head>
<body style="background: url(img/); background-size: cover;">

	<div class="container">
<style>
	.registration {
		padding: 50px; 
		width: 40%; 
		margin: 0 auto; 
		margin-top: 10%; 
		display: none;
	}

	.login {
		padding: 50px; 
		width: 40%; 
		margin: 0 auto; 
		margin-top: 10%;
	}

	.signup label {
		color: #009579;
		cursor: pointer;
	}

	.signup label:hover {
		text-decoration: underline;
	}
</style>
<div class="card login" id="login">
<h3 style="text-align: center;" class="red-text">Login!</h3>
	<form method="POST">
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
		</div>
		<input type="submit" name="login" value="login" class="btn red" style="width: 100%;">
	</form>
	<div class="signup">
		<span class="signup">
			Belum punya akun?
			<label onclick="registrasi()">Daftar</label>
		</span>
	</div>
</div>
<div class="card registration" id="registration">
<h3 style="text-align: center;" class="red-text">Registrasi Masyarakat</h3>
	<form method="POST">
		<div class="input_field">
			<label for="nik">NIK</label>
			<input id="nik" type="number" name="nik" required>
		</div>
		<div class="input_field">
			<label for="nama">Nama</label>
			<input id="nama" type="text" name="nama" required>
		</div>
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
		</div>
		<div class="input_field">
			<label for="telp">Telp</label>
			<input id="telp" type="number" name="telp" required>
		</div>
		<input type="submit" name="register" value="register" class="btn orange" style="width: 100%;">
	</form>
	<span class="signup">
			Sudah punya akun?
			<label onclick="login()">Login</label>
	</span>
</div>
<script type="text/javascript">
  var x = document.getElementById("login");
  var y = document.getElementById("registration");

	function registrasi() {
    x.style.display = "none";
    y.style.display = "block";

}
	function login() {
    x.style.display = "block";
    y.style.display = "none";

}
</script>
<?php 
	include 'conn/koneksi.php';
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='masyarakat';
			header('location:masyarakat/');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:index.php');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('Gagal Login Sob')</script>";
		}

	}
	if(isset($_POST['register'])){
		$password = md5($_POST['password']);
        error_reporting(0);
		$query=mysqli_query($koneksi,"INSERT INTO masyarakat VALUES ('".$_POST['nik']."','".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."')");
		if($query){
			echo "<script>alert('Data Tesimpan')</script>";
			echo "<script>location='location:index.php?p=registrasi';</script>";
		}
	}
 ?>

	</div>
</body>
</html>