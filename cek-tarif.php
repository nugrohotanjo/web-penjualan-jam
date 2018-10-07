
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>SEPATU-KU.com</title>
<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>

<div id="page"><div id="page2">
	<div id="header">
			<h1><a href="index.php"><img src="images/toko-online.png" width="47" height="46"> M&M Collections </a></h1>
			<div class="description"> Pusat Sepatu Murah - Berkualitas.</div>
	</div>
	
	<div id="menulinks">
		<a class="active" href="index.php"><span>Home</span></a>
		<a href="cara_pembayaran.php"><span>Cara Pembayaran</span></a>
		<a href="testi.php"><span>Testimoni</span></a>
        <a href="info.php"><span>Tentang Kami</span></a>
        
	</div>
	
	
	<div id="mainarea">
	  <div id="produk">
	    <h1 class="Judul">&nbsp;        </h1>
	    <h1 class="Judul">
	      <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="550" height="97">
	        <param name="movie" value="banner.swf">
	        <param name="quality" value="high">
	        <param name="wmode" value="opaque">
	        <param name="swfversion" value="9.0.45.0">
	        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
	        <param name="expressinstall" value="Scripts/expressInstall.swf">
	        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
	        <!--[if !IE]>-->
	        <object type="application/x-shockwave-flash" data="banner.swf" width="550" height="97">
	          <!--<![endif]-->
	          <param name="quality" value="high">
	          <param name="wmode" value="opaque">
	          <param name="swfversion" value="9.0.45.0">
	          <param name="expressinstall" value="Scripts/expressInstall.swf">
	          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
	          <div>
	            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
	            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
              </div>
	          <!--[if !IE]>-->
            </object>
	        <!--<![endif]-->
          </object>
        </h1>
	   [ paste disini ]
      </div>
	</div>
    
    
    
    
    <p>
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="243" height="116">
        <param name="movie" value="jam.swf">
        <param name="quality" value="high">
        <param name="wmode" value="opaque">
        <param name="swfversion" value="9.0.45.0">
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="Scripts/expressInstall.swf">
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="jam.swf" width="243" height="116">
          <!--<![endif]-->
          <param name="quality" value="high">
          <param name="wmode" value="opaque">
          <param name="swfversion" value="9.0.45.0">
          <param name="expressinstall" value="Scripts/expressInstall.swf">
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object>
    </p>
    <div id="kanan">
    <div id="cart">
	  <h2>
	    Keranjang Anda :</h2>
	  <p>
  <?php include "cart2.php"; ?>
  <br class="clearfloat" />
	    <a href="cart.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/shopping-cart-icon.png',1)"><img src="images/Cart-icon.png" alt="Cek Keranjang" width="48" height="48" id="Image6"></a></p>
    </div>
    <table width="215" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="215"><hr></td>
      </tr>
  </table>
    <h2>Daftar Merk :</h2>
    <div id="kategori">
      <div id="navigation">
        <?php 
							$kat = mysql_query("SELECT nama_merk, merk.id_merk from merk join produk on produk.id_merk=merk.id_merk group by nama_merk");
							while($list=mysql_fetch_array($kat)){
								echo"<li><a href='product.php?cat=$list[id_merk]'>$list[nama_merk]</a></li>";
							}
						?>
      </div>
    </div>
    <div id="info">
	  <table width="210" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td><hr></td>
	      </tr>
	    </table>
	  <h2>INFO</h2>
	  <p>Disamping adalah catatan transaksi</p>
	  <p>pemesanan anda.</p>
	  <p>Keranjang belanja ini merupakan</p>
	  <p>akumulasi harga produk dan total</p>
	  <p>harga keseluruhan.</p>
	  <p>Pastikan ada mencatat jumlah total </p>
	  <p>untuk kemudian melakukan transfer</p>
	  <p>ke rekening kami.</p>
	  <p>&nbsp;</p>
	  <hr>
	  <p>Terima kasih</p>
	  <p>&nbsp;</p>
	  <p><strong>Owner</strong></p>
	</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </div>
	
    
	<div id="footer">
		<a href="http://www.free-css-templates.com/">Designed by <a href="https://web.facebook.com/profile.php?id=100007188136084">Maman Mulyadi | BSI Karawang 2015</a>, Thanks to Web Design UK
	</div>


</div></div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>

</html>