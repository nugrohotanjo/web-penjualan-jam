<?php
session_start();
	require "konek_db.php";
		$username = $_SESSION['user_name'];
		$simpan_status = "Update user set status='Offline' WHERE user_name='$username'";
		mysql_query($simpan_status);
session_destroy();

echo "<meta http-equiv='refresh' content='0;login.php' />";

?>