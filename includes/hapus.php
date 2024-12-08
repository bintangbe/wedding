<?php
//panggil file koneksi.php yang sudah anda buat
include "config.php";

$id_trx=$_GET['id_trx'];   //ambil parameter GET id  dan buat variabel
//gunakan parameter get untuk menghapus data berdasarkan id produk
$hapus = mysqli_query($koneksidb, "DELETE FROM transaksi where id_trx='$id_trx'");
if($hapus){ //jika berhasil
    echo "<script>alert('Pesanan Berhasil Dibatalkan');document.location='../riwayatsewa.php'</script>";
}else{  //jika gagal
    echo "<script>alert('Pesanan Gagal Dibatalkan, Coba ulangi lagi');document.location='../riwayatsewa.php'</script>";
}
?>