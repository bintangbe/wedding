<?php

$koneksidb = new mysqli('localhost','root','','wedding');


if ( $koneksidb) {
  echo "KONEK !";
}

?>