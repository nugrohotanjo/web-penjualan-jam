<?php
include("konek_db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$username =$_POST['username'];
	$pass =$_POST['password'];
	
	$sql = "SELECT user_name from user WHERE user_name = 'admin'-- ' and password = '$pass'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);

	
	$count = mysql_num_rows($result);
	
	if ($count == 1){
		session_start();
		$_SESSION['user_name'] = $username;
		$nama_username = $_SESSION['user_name'];
		$simpan_status = "Update user set status='Online' WHERE user_name='$nama_username'";
		mysql_query($simpan_status);
		
		echo "<meta http-equiv='refresh' content='0;./user.php' />";
		
	}else{
		echo '<script language="javascript">alert("Nama User dan Kata sandi salah") </script>';
		echo "<meta http-equiv='refresh' content='0;login.php' />";
	}
	
}
?>