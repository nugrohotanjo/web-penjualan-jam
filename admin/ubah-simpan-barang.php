<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	
	$kode_produk = $_POST['kodebarang'];
	$nama = $_POST['nama-barang'];
	$harga = $_POST['harga-barang'];
	$jumlah = $_POST['jumlah-barang'];
	$nama_gambar = $_FILES['gambar']['name'];
	$ukuran_gambar = $_FILES['gambar']['size'];
	$tipe_gambar = $_FILES['gambar']['type'];
	$tmp_gambar = $_FILES['gambar']['tmp_name'];
	$kategori = $_POST['kategori'];
	$stok = $_POST['status'];
	$berat = $_POST['berat'];
	$deskripsi = $_POST['deskripsi'];
	$tanggal_upload = date ("d-m-y");
	
	$random = (rand()%1000000);
	$tanggal = date("dmy");
	$jam = date("his");
	$path = "../gambar-produk/".$random.$tanggal.$jam.$nama_gambar;
	$gambar = $random.$tanggal.$jam.$nama_gambar;
	
	if($_FILES['gambar']['name'] == TRUE){
	
		if($tipe_gambar == "image/jpeg" || $tipe_gambar == "image/png") {
		if($ukuran_file <= 1000000){
			if(move_uploaded_file($tmp_gambar, $path)){		
				$perintah = "UPDATE barang SET nama_brg='$nama',harga_barang='$harga',jumlah_brg='$jumlah',nama_gambar='$gambar',ukuran_gambar='$ukuran_gambar',tipe_gambar='$tipe_gambar',kategori='$kategori',stok='$stok',berat='$berat',deskripsi='$deskripsi' WHERE kd_brg='$kode_produk'";
				$simpan = mysql_query($perintah);
		
				if($simpan){
						header("Refresh:0; url=daftar-barang.php");
						echo "<script type='text/javascript'> alert('Barang Telah Terubah') </script>";
				}
				else{
						header("Refresh:0; url=daftar-barang.php");
						echo "<script type='text/javascript'> alert('Barang Gagal Terubah') </script>";
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

	}
	else {
		$perintah = "UPDATE barang SET nama_brg='$nama',harga_barang='$harga',jumlah_brg='$jumlah',kategori='$kategori',stok='$stok',berat='$berat',deskripsi='$deskripsi' WHERE kd_brg='$kode_produk'";
				$simpan = mysql_query($perintah, $konek);
				if($simpan){
						header("Refresh:0; url=daftar-barang.php");
						echo "<script type='text/javascript'> alert('Barang Telah Terubah') </script>";
				}
				else{
						header("Refresh:0; url=ubah-barang.php");
						echo "<script type='text/javascript'> alert('Barang Gagal Terubah') </script>";
				}
	}
	
	
?>