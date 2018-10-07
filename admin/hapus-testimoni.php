<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	
	$a = $_GET[kd];
	
	$qry = mysql_query ("delete from testimoni where no_testi='$a'");
	if ($qry){
		header("Refresh:0; url=daftar-testimoni.php");
		echo "<script type='text/javascript'> alert('Testimoni Telah Terhapus') </script>";
	}
		
?>
	