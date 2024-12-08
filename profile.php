<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ulogin'])==0){ 
header('location:index.php');
}else{
if(isset($_POST['updateprofile'])){
	$name=$_POST['fullname'];
	$telpon=$_POST['telp'];
  $email= $_POST['email'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$sql="UPDATE member SET nama_user='$name',email='$email', username='$username', telp='$telpon', alamat='$address' WHERE username='$username'";
	$query = mysqli_query($koneksidb,$sql);
	if($query){
	$msg="Profile berhasi diupdate.";
	}else{
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);	}
}
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
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
<script type="text/javascript">
function checkLetter(theform)
{
		pola_nama=/^[a-zA-Z .]*$/;
		if (!pola_nama.test(theform.fullname.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama!');
		theform.fullname.focus();
		return false;
		}
		return (true);
}
 
</script>

</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Profil Anda</h1>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 


<?php 
$username=$_SESSION['ulogin'];
$sql = "SELECT * from member where username='$username'";
$query = mysqli_query($koneksidb,$sql);
while($result=mysqli_fetch_array($query)){
?>
<section class="user_profile inner_pages">
  <div class="container">
	<div class="user_profile_info">
	
		<div class="col-md-12 col-sm-10">
          <?php  
         if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post" name="theform" onSubmit="return checkLetter(this);">
            <div class="form-group">
              <label class="control-label">Nama</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result['nama_user']);?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Username</label>
              <input class="form-control white_bg" name="username" value="<?php echo htmlentities($result['username']);?>" id="username" type="text" readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Alamat Email</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result['email']);?>" name="email" id="email" type="email" required>
            </div>
            <div class="form-group">
              <label class="control-label">Telepon</label>
              <input class="form-control white_bg" name="telp" value="<?php echo htmlentities($result['telp']);?>" id="telp" type="number" min="0" required>
            </div>
            <div class="form-group">
              <label class="control-label">Alamat</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo htmlentities($result['alamat']);?></textarea>
            </div>
<?php } ?>
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Simpan Perubahan <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
		 </div>
	</div>
</div>
</section>
<!--/Profile-setting--> 

<<!--Footer -->
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
<!--/Forgot-password-Form --> 

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
<?php } ?>