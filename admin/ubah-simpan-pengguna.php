<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	
	$a = $_POST['nama'];
	$b = $_POST['katasandi'];	
	$c = $_POST['ulangi-katasandi'];
		
		
	
	$simpan = mysql_query("UPDATE user SET password = '$b',recovery = '$c' WHERE user_name= '$a' ");
	if($simpan){
						echo "<script language='javascript'>alert('Pengguna Telah Di Update'); document.location='daftar-pengguna.php';</script>";
						
				}
?>