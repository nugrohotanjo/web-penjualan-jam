<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	$a = $_POST['nama'];
	$b = $_POST['katasandi'];
	$c = $_POST['ulangi'];

	
	$sql = mysql_query ("select * from user where user_name = '$a'");
	$row = mysql_num_rows ($sql);
	
	if($row == 1) {		
		header("Refresh:0; url=tambah-pengguna.php");
		echo "<script type='text/javascript'> alert('Pengguna Sudah Ada ,Ulangi lagi') </script>";
	}
	else{
		$perintah = "insert into user values('$a','$b','$c')";
		$simpan = mysql_query($perintah);
		if($simpan){
			header("Refresh:0; url=tambah-pengguna.php");
			echo "<script type='text/javascript'> alert('Pengguna Telah Tersimpan') </script>";
			}
		else{
			header("Refresh:0; url=tambah-pengguna.php");
			echo "<script type='text/javascript'> alert('Pengguna Gagal Tersimpan') </script>";
		}
	}
?>