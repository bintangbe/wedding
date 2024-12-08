<?php 
session_start();
include('includes/config.php');
include('includes/format_rupiah.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title><?php echo $pagedesc;?></title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="shortcut icon" href="admin/img/newicon.jpeg">

</head>
<body>

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Daftar Paket Dekorasi</h1>
      </div>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="section-padding gray-bg">
  <div class="container">
	<?php 
	$sql1 = "SELECT * FROM paket ORDER BY nama_paket";
	$query1 = mysqli_query($koneksidb,$sql1);
	if(mysqli_num_rows($query1)>0){
	while($results = mysqli_fetch_array($query1))
	{ 
	 ?>
	<div class="col-list-3">
		<div class="paket-list">
			<div class="paket-info-box"> <a href="paket_detail.php?id=<?php echo htmlentities($results['id_paket']);?>"><img src="admin/gallery/<?php echo htmlentities($results['foto_paket']);?>" class="img-responsive" alt="image"></a></div>
			<div class="paket-title-m">
				<h6><a href="paket_detail.php?id=<?php echo htmlentities($results['id_paket']);?>" align='center'><?php echo htmlentities($results['nama_paket']);?></a></h6>
				<br><span class="price"><?php echo htmlentities(format_rupiah($results['harga']));?> /Pack</span> 
			</div>
		<div class="inventory_info_m">
			<p><?php echo substr($results['ket_paket'],0,75);?></p>
		</div>
		</div>
	</div>
<?php }
	   } ?>
    </div>
</section>

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>