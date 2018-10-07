<?php
session_start();
if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '/toko_jam/admin'</script>";
	}
else {
	header('Location: /toko_jam/user.php');
	
}

?>