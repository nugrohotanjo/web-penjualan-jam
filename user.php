<?php 
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = 'login.php'</script>";
	}
	 
?>


<html>
<head>
	<title>User Page</title>
	<link	rel="stylesheet"	type="text/css" href="style/styleuser.css"/>
</head>
<body bgcolor="#f9f9f9">
	<div id = "header">
		<div class = "header1">
			<a href= "/toko_jam" target="_BLANK"><img src="images/header1.png"/></a>
		</div>
		<div class = "header-samping">
			<ul>
				<li><a target = "_blank" href="https://dashboard.tawk.to/">Chatting</a></li>
				<li>Login Sebagai <font color="red"><i> &nbsp; <?= $_SESSION['user_name']; ?></i></font></li>
			</ul>
		</div>
	</div>
	<div id = "menu">
		<div class = "menu1">
			<ul>
				<li><a href="user.php">Dashboard</a></li>
				<li><a href="admin/tambah-pengguna.php">Tambah Pengguna</a></li>
				<li><a href="admin/daftar-pengguna.php">Daftar Pengguna</a></li>
				<li><a href="admin/penjualan.php">Daftar Penjualan</a></li>
				<li><a href="admin/konfirmasi.php">Daftar Konfirmasi</a></li>
				<li><a href="admin/daftar-barang.php">Daftar Barang</a></li>
				<li><a href="admin/tambah-barang.php">Tambah Barang</a></li>
				<li><a href="admin/daftar-testimoni.php">Daftar Testimoni</a></li>
				<li><a href="admin/info.php">Update Info</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div class = "menu2">
			<div class = "isi">
			Halo <?php echo strtoupper($_SESSION['user_name']); ?><br><br>
			Selamat Datang di Panel Admin </div>
		</div>
	
</body>
</html>