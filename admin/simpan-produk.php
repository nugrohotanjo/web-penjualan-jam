<?php
	session_start();
	if(empty($_SESSION['user_name'])){
		echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../login.php'</script>";
	}
	require "../konek_db.php";
	$ukuran_file = 0;
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
	
	
			
if($nama == FALSE || $harga == FALSE || $jumlah == FALSE || $nama_gambar == FALSE || $berat == FALSE || $deskripsi  == FALSE){	
	echo "<script type='text/javascript'> alert('Masih ada data yang kosong') 
	history.back()</script>";
}
Else {

	if($tipe_gambar == "image/jpeg" || $tipe_gambar == "image/png") {		
			
		if($ukuran_file <= 1000000){
			if(move_uploaded_file($tmp_gambar, $path)){
				$perintah = "insert into barang values('','$nama','$harga','$jumlah','$gambar','$ukuran_gambar','$tipe_gambar','$kategori','$stok','','$berat','$tanggal_upload','$deskripsi')";
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
				echo "<script type='text/javascript'> alert('Maaf, Ada Kesalahan Saat Mencoba Mengupload') 
history.back() </script>";				
			}
		}
		else{
			echo "<script type='text/javascript'> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB') 
history.back() </script>";
			}
	}
	else {
		echo "<script type='text/javascript'> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.') 
history.back() </script>";
		
	}
}

?>