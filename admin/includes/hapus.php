<?php
//panggil file koneksi.php yang sudah anda buat
include "config.php";

$id_user=$_GET['id_user'];   //ambil parameter GET id  dan buat variabel
//gunakan parameter get untuk menghapus data berdasarkan id produk
$hapus = mysqli_query($koneksidb, "DELETE FROM member where id_user='$id_user'");
if($hapus){ //jika berhasil
    echo "<script>alert('Member Berhasil Dihapus');document.location='../reg-users.php'</script>";
}else{  //jika gagal
    echo "<script>alert('Member Gagal Dihapus, Coba ulangi lagi');document.location='../reg-users.php'</script>";
}
?>