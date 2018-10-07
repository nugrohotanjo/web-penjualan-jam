<?php
require "konek_db.php";

		$tampil = "select * from barang order by kd_brg";
		$query = mysql_query ($tampil) or die ("Gagal".mysql_error());
		$jumlah = mysql_num_rows ($query);
		session_start();
?>


<html>
<head>
	<title>Bayar</title>
	<link	rel="stylesheet"	type="text/css" href="style/style.css"/>
</head>
<body bgcolor="#9bc535">

<?php
	require "head.php";
?>	

<div id = "sitecontainer-bayar">
		<div class = "menu-kiri">
		<?php
	require"sidebar.php";
?>
		
	<div class = "detail-bayar">
	<h2 style = "margin:10px;  ">Bayar &raquo; Data Pengiriman</h2>
	<center><hr width = "98%"></center>
	<h4 style = "margin:10px;  ">Silahkan isi data pengiriman barang / produk di bawah ini:</h4>
	<form action = "proses-selesai.php" method = "POST">
		<input style = "margin:10px;" type = "text" class = "inputan" name = "nama" placeholder = "Nama Lengkap"  required><br>
		<input style = "margin:10px;" type = "text" class = "inputan" name = "notlpn" placeholder = "No Telepon"  required><br>
		<?php require "get-provinsi.php"; ?><br>
		<select name='kota' id="kota" onclick="getKota()" style = 'margin:10px;width:250px;' class = 'inputan' required>
		<option value='' disabled selected>Pilih Kota Anda</option>
		</select>
		<br>
		<select name='courier' id="courier" onclick="getCost()" style = 'margin:10px;width:250px;' class = 'inputan' required>
		<option value='' disabled selected>Pilih Kurir</option>
		</select>
		<br>
		<span id="harga">
			
		</span>
		<textarea style = "margin:10px;" rows = "4" class = "inputan" cols = "35" name = "alamat" placeholder = "Alamat Lengkap" required></textarea><br><br>
		<textarea style = "margin:10px;margin-top:-10px;" rows = "4" class = "inputan" cols = "35" name = "keterangan" placeholder = "Keterangan" ></textarea><br>
		<span style = "margin:10px;">Total : <?= $_SESSION['harga']; ?></span>+ Rp. <span id="harga_kurir"></span><br>
		<input style = "margin:10px;margin-top:10px;" type = "submit" name="selesai" class = "tombol" value="Selesai"  />
	</form>	
	<p id="cur"></p>
	<?php
		// require "lihat-produk-lain.php"
	?> 

	</div>
	
</div>

<?php

	include "footer.php";

?>

<script type="text/javascript">

	function getProvinsi(){
    $('#provinsi').change(function() {
      var data = $(this).val();

      $.ajax({
        type: "GET",
        url: "get-kota.php",
        data: {id: data},
        success: function(data){
           $("#kota").html(data);
        }
      });

    });
  }

 	function getKota(){
    $('#kota').change(function() {
    	var option = '<option value="" disabled selected>Pilih Kurir Anda</option><option value="jne">JNE</option><option value="tiki">Tiki</option><option value="pos">POS</option>';
      $('#courier').html(option);
    });
  }

  function getCost(){
  	$('#courier').change(function(){

  		var tujuan = $('#kota :selected').val();
  		var kurir  = $('#courier :selected').val();

  		$.ajax({
	        type: "GET",
	        url: "get-cost.php",
	        data: {tujuan: tujuan, kurir: kurir},
	        success: function(data){
	           $("#harga").html(data);
	        }
      	});



  	});
  }

  function getKurir(){

  	$('input[type=radio][name=kurir]').change(function() {
  		$('#harga_kurir').html(this.value);
	});

  	// $('#data_kurir').change(function(){
  	// 	var harga_kurir = $('#data_kurir input[type=radio] :checked').val();
  	// 	$('#harga_kurir').html(harga_kurir);
  	// });

  	
  }
  
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



</body>
</html>