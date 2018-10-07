<?php
    /*
        file name : get_harga.php
        created by : Om Andriant - member of forumphp.web.id
        edited by : adiputra - member of forumphp.web.id
        source link : http://forumphp.web.id/viewtopic.php?p=37363&highlight=jne#37363
    */
        # ambil data kota asal dan kota tujuan serta berat dari form
        $asal = $_POST['kota_asal'];
        $tujuan = $_POST['kota_tujuan'];
        $berat = $_POST['berat'];
         
        if (!function_exists("curl_init")){
            die('CURL tidak ada');
        }else{
            $chp = curl_init();
            //variable for cookies access
            curl_setopt($chp, CURLOPT_COOKIEJAR, $cookiesjar);    
            //variable for cookies store , same as previous line
            curl_setopt($chp, CURLOPT_COOKIEFILE, $cookiesjar);    
            //simulating user agent - shadow
            curl_setopt($chp, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1"); 
            //ingroring server redirect
            curl_setopt($chp, CURLOPT_FOLLOWLOCATION, 1);
            //accepting returns from server
            curl_setopt($chp, CURLOPT_RETURNTRANSFER, 1);    
             
            // cari kode asal
            $url = "http://www.jne.co.id/tariff.php?q=$asal&limit=20&timestamp=".time();
            curl_setopt($chp, CURLOPT_URL, $url);
            $content = curl_exec($chp);
            if ($content != "")
            {
                $kode = preg_split("%\n%si",$content);
                $kode = trim($kode[0]);
                $kode = explode('|',$kode);
                $koreksikotaasal = $kode[0];
                $kodeasal = $kode[1];
            }
            // cek kode tujuan
            $url = "http://www.jne.co.id/tariff.php?q=$tujuan&limit=20&timestamp=".time();
            curl_setopt($chp, CURLOPT_URL, $url);
            $content = curl_exec($chp);
            if ($content != "")
            {
                $kode = preg_split("%\n%si",$content);
                $kode = trim($kode[0]);
                $kode = explode('|',$kode);
                $koreksikotatujuan = $kode[0];
                $kodetujuan = $kode[1];
            }
            // kalo kode asal dan kode tujuan berhasil ketarik, ambil data
            if ($kodeasal != "" && $kodetujuan != "")
            {
                $url = "http://www.jne.co.id/index.php?mib=tariff&lang=IN"; 
                //$params = 'from=JAKARTA&origin_code=Q0dLMTAwMDBK&to=BANDUNG&destination_code=QkRPMTAwMDBK&weight=1&checktariff=';
                $params = "from=$koreksikotaasal&origin_code=$kodeasal&to=$koreksikotatujuan&destination_code=$kodetujuan&weight=$berat&checktariff=";
                curl_setopt($chp, CURLOPT_REFERER, "http://www.jne.co.id/index.php");
                curl_setopt($chp, CURLOPT_POSTFIELDS,$params);    
                curl_setopt($chp, CURLOPT_URL, $url);
                //open the url with our mentioned variables
                $content = curl_exec($chp);
                if (preg_match('%Nama Layanan.*?Tarif.*?</tr>(.*?)</table>%si', $content,$matches)) {
                    preg_match_all('%<tr.*?><td.*?>(.*?)</td>.*?<td.*?>(.*?)</td><td.*?>Rp. (.*?)</td>.*?</tr>%si', $matches[1], $result, PREG_PATTERN_ORDER);
                    array_shift($result);
                    for ($i=0;$i<count($result);$i++)
                    {
                        echo("Nama Layanan {$result[0][$i]}<br />");
                        echo("Jenis Kiriman {$result[1][$i]}<br />");
                        echo("Berat $berat<br />");
                        echo("Tarif {$result[2][$i]}<br /><br />");
                    }
                }
                else{
                    echo('gagal menarik data');
                }
            }
            else{
                echo('gagal menarik data');
            }
             
            curl_close($chp);
        }
?>