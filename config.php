<?php


session_start();
ob_start();

$user_name = 'root';
$database = 'toko-jam';
$host_name = 'localhost';

$konek = mysql_connect($host_name, $user_name) or die ('Koneksi Gagal!');

if($konek){
	mysql_select_db($database) or die ("Database Tidak ditemukan");
}
?>