<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
	$tglnow   = date('Y-m-d');
	$tglmulai = strtotime($tglnow);
	$jmlhari  = 86400*1;
	$tglplus  = $tglmulai+$jmlhari;
	$now = date("Y-m-d",$tglplus);

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

<?php 
$kode=$_GET['kode'];
$sql1 	= "SELECT transaksi.*,member.*,paket.* FROM transaksi, member, paket WHERE transaksi.username=member.username
		   AND transaksi.id_paket=paket.id_paket AND transaksi.id_trx='$kode'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$durasi = $result['durasi'];
$totalsewa = $durasi*$harga;
$tglmulai = strtotime($result['tgl_take']);
$jmlhari  = 86400*1;
$tgl	  = $tglmulai-$jmlhari;
$tglhasil = date("Y-m-d",$tgl);
?>
<script type="text/javascript">
function valid()
{
	if(document.sewa.tglbaru.value < document.sewa.now.value){
		alert("Tanggal baru minimal H+1 dari hari ini!");
		return false;
	}

return true;
}
</script>

<section class="user_profile inner_pages">
			<center><h3>Ubah Tanggal Sewa</h3></center>
	<div class="container">
	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
        <form method="post" action="update_tgl.php" name="sewa" onSubmit="return valid();" enctype="multipart/form-data"> 
			<input type="hidden" class="form-control" name="id"  value="<?php echo $kode;?>"required>
            <div class="form-group">
			<label>Kode Pesanan</label>
				<input type="text" class="form-control" name="kode" value="<?php echo $result['id_trx'];?>"readonly>
            </div>
			<input type="hidden" class="form-control" name="vid"  value="<?php echo $vid;?>"required>
            <div class="form-group">
			<label>Paket</label>
				<input type="text" class="form-control" name="paket" value="<?php echo $result['nama_paket'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Tanggal Pesan</label>
				<input type="text" class="form-control" name="fromdate" placeholder="" value="<?php echo IndonesiaTgl($result['tgl_take']);?>"readonly>
				<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>">
            </div>
            <div class="form-group">
			<label>Tanggal Pesan Baru</label>
				<input type="date" class="form-control" name="tglbaru" placeholder="" required>
            </div>
            <div class="form-group">
			<label>Alamat Pemasangan</label>
				<input type="text" class="form-control" name="todate" placeholder="" value="<?php echo $result['almt_psng'];?>"readonly>
            </div>
            <div class="form-group">
			<label>Biaya</label><br/>
				<input type="text" class="form-control" name="total" value="<?php echo format_rupiah($result['harga']);?>"readonly>
            </div>
            <div class="form-group">
			<label>Catatan</label><br/>
				<textarea class="form-control" readonly><?php echo $result['catatan'];?></textarea>
            </div>
			<div class="hr-dashed"></div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="submit">Submit</button>
			</div>
        </form>
		</div>
		</div>
      </div>
</section>

<?php include('includes/footer.php');?>

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