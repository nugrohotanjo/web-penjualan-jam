<?php

$curl = curl_init();

$provinsi = $_GET['id'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$provinsi",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: b9e4d5305b25625d54c7bb77a9302b94"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "Gagal Mengambil daftar Kota";
}else{
  $hasil = json_decode($response, true);

  echo "<option value='' disabled selected>Pilih Kota Anda</option>";
  for($i=0; $i<count($hasil['rajaongkir']['results']); $i++){
    echo "<option value='".$hasil['rajaongkir']['results'][$i]['city_id']."'>".$hasil['rajaongkir']['results'][$i]['city_name']."</option><br/>";
  }

}

?>
