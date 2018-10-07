<html>
<head>
	<title>Halaman Login</title>
	<link	rel="stylesheet"	type="text/css" href="style/style.css"/>
</head>
<body bgcolor = "#9bc535">


<div id = "login">
<div class = "header-login">Login Form</div>

<?php
require "konek_db.php";
?>


<form action="masuk.php" method="POST">
<table class = "tabel" border="0">

<tr><td><b><h3>Username</h3></b></td><td><input class = "inputan-login" type="text" name="username"/></td></tr>
<tr><td><b><h3>Password</h3></b></td><td><input class = "inputan-login" type="password" name="password"/></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="submit" class = "tombol" value="Login"/></td></tr>

</table>

</form>
</div>
</body>
</html>