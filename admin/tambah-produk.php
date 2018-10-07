<?php

	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}

	require "../konek_db.php";
	
	$nama = $_POST['nama-barang'];
	$harga = $_POST['harga-barang'];
	$jumlah = $_POST['jumlah-barang'];
	$nama_gambar = $_FILES['gambar']['name'];
	$ukuran_gambar = $_FILES['gambar']['size'];
	$tipe_gambar = $_FILES['gambar']['type'];
	$tmp_gambar = $_FILES['gambar']['tmp_name'];
	
	$random = (rand()%1000000);
	$tanggal = date("dmy");
	$jam = date("his");
	$path = "../gambar-produk/".$random.$tanggal.$jam.$nama_gambar;
	$gambar = $random.$tanggal.$jam.$nama_gambar;
	
	

	
	if($tipe_gambar == "image/jpeg" || $tipe_gambar == "image/png") {
		if($ukuran_file <= 1000000){
			if(move_uploaded_file($tmp_gambar, $path)){
				$perintah = "insert into barang values('','$nama','$harga','$jumlah','$gambar','$ukuran_gambar','$tipe_gambar')";
				$simpan = mysql_query($perintah);
				if($simpan){
						header("Refresh:0; url=tambah-barang.php");
						echo "<script type='text/javascript'> alert('Barang Telah Tersimpan') </script>";
				}
				else{
						header("Refresh:0; url=tambah-barang.php");
						echo "<script type='text/javascript'> alert('Barang Gagal Tersimpan') </script>";
				}
				
		
			}
			else{
				echo "Maaf, Ada Kesalahan Saat Mencoba Mengupload";
				
			}
		}
		else{
			echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
			}
	}
	else {
		echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
	}

?>