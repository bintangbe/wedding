<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

if(strlen($_SESSION['ulogin'])==0){ 
	header('location:index.php');
}else{
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
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="shortcut icon" href="admin/img/newicon.jpeg">
</head>
<body>
        
<!--Header-->
<?php include('includes/header.php');?>

<?php
$username=$_SESSION['ulogin'];  
$sql1 	= "SELECT transaksi.*, paket.*, member.* FROM transaksi, paket, member WHERE transaksi.id_paket=paket.id_paket 
			AND transaksi.username=member.username AND transaksi.username='$username'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$durasi = $result['durasi'];
$totalsewa = $durasi*$harga;
$tglmulai = strtotime($result['tgl_mulai']);
$jmlhari  = 86400*1;
$tgl	  = $tglmulai-$jmlhari;
$tglhasil = date("Y-m-d",$tgl);
?>
<section class="user_profile inner_pages">
<center><h3>Riwayat Sewa</h3></center>
	<div class="container">
	<div class = "table-responsive">
	<table class="table table-striped table-bordered">
	<thead>
		<tr>    
		<b>*Silahkan ke menu opsi detail pesanan pada tabel dibawah ini untuk melihat informasi pembayaran. </b>
			<th width="5" align="center">No</th>
			<th width="10">Kode Sewa</th>		
			<th width="20">Paket</th>
			<th width="10">Tgl. Pesanan</th>
			<th width="10">Tanggal Sewa</th>
			<th width="5">Alamat Pemasangan</th>
			<th width="10">Biaya</th>
			<th width="10">Status</th>
			<th width="5">Opsi</th>
		</tr>
	</thead>
	<?php
	$username=$_SESSION['ulogin'];  
	$sql1 	= "SELECT transaksi.*, paket.*, member.* FROM transaksi, paket, member WHERE transaksi.id_paket=paket.id_paket 
			   AND transaksi.username=member.username AND transaksi.username='$username' ORDER BY transaksi.tgl_trx DESC";
	$query1 = mysqli_query($koneksidb,$sql1);
	if(mysqli_num_rows($query1)!=0){
		while($result = mysqli_fetch_array($query1)){
			$harga	= $result['harga'];
			$tglmulai = strtotime($result['tgl_take']);
			$jmlhari  = 86400*1;
			$tgl	  = $tglmulai-$jmlhari;
			$tglhasil = date("Y-m-d",$tgl);
			$nomor++;
		?>
			<tr>
				<td align="center"><?php echo $nomor; ?></td>
				<td><?php echo $result['id_trx']; ?></td>
				<td><?php echo $result['nama_paket']; ?></td>
				<td><?php echo IndonesiaTgl($result['tgl_trx']); ?></td>
				<td><?php echo IndonesiaTgl($result['tgl_take']); ?></td>
				<td><?php echo $result['almt_psng']; ?></td>
				<td><?php echo format_rupiah($result['harga']); ?></td>
				<td><?php echo $result['stt_trx']; ?></td>
				<td align="center">
				<?php 
					if($result['stt_trx']=="Sudah Dibayar"||$result['stt_trx']=="Selesai"){
					?>
					<a href="booking_detail.php?kode=<?php echo $result['id_trx'];?>" class="btn btn-success btn-xs">Detail Pesanan</a>
					<?php 
						if($result['ubah_tgl']==0){
					?>
						<br><br><a href="booking_tgl.php?kode=<?php echo $result['id_trx'];?>" class="btn btn-primary btn-xs">Ubah Tanggal</a>
					<?php
						}else{
						}
					}else{
					?>
					<a href="booking_detail.php?kode=<?php echo $result['id_trx'];?>" class="btn btn-success btn-xs">Detail Pesanan</a> <br><br>
					<a href="includes/hapus.php?id_trx=<?php echo $result['id_trx'];?>"  class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin mau batalkan pesanan ini ?')">Batal Pesanan</a>
					<?php }?>
				</td>
			</tr>
		<?php } ?>
		
	<?php
	}else{
	?>
		<tr>
			<td colspan="11" align="center"><b>Belum ada riwayat booking.</b></td>
		</tr>
<?php }?>
	</table>
	</div>
</div>
</section>

<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 

</body>
</html>
<?php } ?>