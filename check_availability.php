<?php 
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["user"])) {
	$username= $_POST["user"];
	if (filter_var($username, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
	$sql = "SELECT username FROM member WHERE username='$username'";
	$query = mysqli_query($koneksidb,$sql);
	if(mysqli_num_rows($query)>0){
		echo "<span style='color:red'> Username sudah terdaftar.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
		echo "<span style='color:green'> Username bisa untuk mendaftar.</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
	}
}

?>
