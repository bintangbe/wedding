<?php
session_start();
error_reporting(0);
include('includes/config.php');
$fname=$_POST['fullname'];
$username=$_POST['username'];
$email=$_POST['email']; 
$alamat=$_POST['alamat']; 
$pass = $_POST['pass'];
$telpon = $_POST['telp'];
$conf = $_POST['conf'];
if($conf!=$pass){
	echo "<script>alert('Password tidak sama!');</script>";
	echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";	
	
}else{
	$sqlcek = "SELECT username FROM member WHERE username='$username'";
	$querycek = mysqli_query($koneksidb,$sqlcek);
		if(mysqli_num_rows($querycek)>0){
			echo "<script>alert('Username sudah terdaftar, silahkan gunakan username lain!');</script>";
			echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";	
		}else{
			$password=md5($_POST['pass']);
			$sql1="INSERT INTO member(nama_user, email, username, password, telp, alamat) VALUES('$fname', '$email', '$username', '$password', '$telpon', '$alamat')";
			$lastInsertId = mysqli_query($koneksidb, $sql1);
				if($lastInsertId){
					echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>";
					echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
				}else {
					echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
					echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
				}
}	
}			
?>