<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql = "SELECT * FROM admin WHERE UserName='$email' AND Password='$password'";
$query = mysqli_query($koneksidb,$sql);
$results = mysqli_fetch_array($query);
if(mysqli_num_rows($query)>0){
	$_SESSION['alogin']=$_POST['username'];
	$_SESSION['id']=$results['id'];
	echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
	echo "<script>alert('Email atau Password Salah!');</script>";
}
}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $pagedesc;?></title>
	<link rel="shortcut icon" href="img/newicon.png">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="login-page bk-img" style="background-image: url(img/login.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
				<center><img class="mt-4x"src="img/logo.png" alt="logo" width="200" height="150"></center>
					<div class="col-md-6 col-md-offset-3">
					<h1 class="text-center text-bold mt-1x" style="color:black">PT. BINTANG MAESTRO</h1><br>
							<div class="col-md-8 col-md-offset-2">
								<form method="post">
									<label for="" style="color:black;" class="text-uppercase text-sm">Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">
									<label for="" style="color:black;" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									<button class="btn btn-warning btn-block" name="login" type="submit" style="font-size: 15px; font-family: Roboto, Helvetica Neue";>LOGIN</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>