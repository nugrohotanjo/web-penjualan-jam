<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	
	$a = $_POST['info1'];
	$b = $_POST['info2'];	
	$c = $_POST['info3'];
	$hot = $_POST['hotline'];
	$bbm = $_POST['bbm'];
	$wa	= $_POST['whatsapp'];
	$norek = $_POST['norek'];
	$nama = $_POST['nama'];
		
	
	$simpan = mysql_query("UPDATE info SET norek = '$norek',atasnama = '$nama',hotline = '$hot',bbm = '$bbm',wa = '$wa',info1 = '$a',info2 = '$b',info3= '$c' ");
	if($simpan){
						echo "<script language='javascript'>alert('Info Telah Di Update'); document.location='info.php';</script>";
						
				}
	else{
		echo "gagal";
	}
?>