<?

require "konek_db.php";
$ukuran_file = 0;
$notagihan = $_POST['notagihan'];
$waktutrans = $_POST['waktutrans'];
$jmltrans =  $_POST['jmltrans'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$notlpn = $_POST['notlpn'];
$ket = $_POST['ket'];
$jam_konfir = date("his");
$tgl_konfir = date ("y-m-d");
	
$nama_gambar = $_FILES['gambar']['name'];
$ukuran_gambar = $_FILES['gambar']['size'];
$tipe_gambar = $_FILES['gambar']['type'];
$tmp_gambar = $_FILES['gambar']['tmp_name'];

	$random = (rand()%1000000);
	$tanggal = date("dmy");
	$jam = date("his");
	$path = "gambar-bukti/".$random.$tanggal.$jam.$nama_gambar;
	$gambar = $random.$tanggal.$jam.$nama_gambar;

$panggil ="SELECT no_tagihan from transaksi WHERE no_tagihan ='$notagihan'";
$result = mysql_query($panggil);
$row = mysql_fetch_array($result);
$count = mysql_num_rows($result);

if ($count == 1){	


	
	if($tipe_gambar == "image/jpeg" || $tipe_gambar == "image/png") {		
			
		if($ukuran_file <= 1000000){
			if(move_uploaded_file($tmp_gambar, $path)){
				$perintah = "insert into konfirmasi values('','$notagihan','$waktutrans','$tgl_konfir','$jam_konfir','$jmltrans','$nama','$email','$notlpn','$ket','$gambar','$ukuran_gambar','$tipe_gambar')";
				$simpan = mysql_query($perintah);
				if($simpan){
						header("Refresh:0; url=konfirmasi-pembayaran.php");
						echo "<script type='text/javascript'> alert('konfrimasi Telah Terkirim') </script>";
				}
				else{
						header("Refresh:0; url=konfirmasi-pembayaran.php");
						echo "<script type='text/javascript'> alert('Konfirmasi gagal terkirim') </script>";
				}
				
		
			}
			else{
				echo "<script type='text/javascript'> alert('Maaf, Ada Kesalahan Saat Mencoba Mengupload gambar') 
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
else{
	echo "<script type='text/javascript'> alert('Nomor Tagihan tidak ditemukan, Pastikan memasukan Nomor Tagihan dengan benar') 
			history.back() </script>";
}
?>