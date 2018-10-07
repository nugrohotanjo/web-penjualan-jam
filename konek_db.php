<?php


$user_name = 'root';
$password = '';
$database = 'toko-jam';
$host_name = 'localhost';

$konek = mysql_connect($host_name, $user_name, $password) or die ('Koneksi Gagal!');

if($konek){
	mysql_select_db($database) or die ("Database Tidak ditemukan");

}
?>