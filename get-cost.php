<?php
error_reporting(0);
$curl = curl_init();

$destination  = $_GET['tujuan'];
$courier      = $_GET['kurir'];
$weight       = 300;

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=115&destination=$destination&weight=$weight&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: b9e4d5305b25625d54c7bb77a9302b94"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$hasils = json_decode($response, true);

$jumlah_paket = $hasils['rajaongkir']['results'][0]['costs']; 
$nama_paket   = $hasils['rajaongkir']['results'][0]['costs'];
$harga        = $hasils['rajaongkir']['results'][0]['costs'];

if ($err) {
  echo "Tidak dapat menampilkan harga " . $err;
}else{
  for ($i=0; $i < count($jumlah_paket) ; $i++) { 
      echo "<label style = 'margin:10px;' for='".$nama_paket[$i]['service']."' class='form-control'>".$nama_paket[$i]['service']."</label> | <input id='data_kurir' onclick='getKurir()' class='form-control' type='radio' name='kurir' value='".$harga[$i]['cost'][0]['value']."' required> ".$harga[$i]['cost'][0]['value']."<br>";
  }
}