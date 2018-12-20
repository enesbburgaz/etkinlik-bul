<head>
  <meta charset="utf-8">
</head>

<?php
include('../baglan.php');
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'tr_TR.UTF-8');

      function baglanbot($url){
        $ch = curl_init(); 
        $timeout = "5"; 
        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_HEADER,false); 
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout); 
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($ch,CURLOPT_REFERER,"http://www.google.com.tr"); 
        curl_setopt($ch,CURLOPT_USERAGENT,$agent); 
        $data = curl_exec($ch); 
        curl_close($ch); 
        return $data;
        }
            $baglan = baglanbot("http://ajanda.ibu.edu.tr/?cat=1819");
            $bbaslik='@<ul class="hfeed posts-quick">(.*?)</ul>@si';
            preg_match_all($bbaslik, $baglan, $link);
            preg_match_all('@<li class="(.*)">(.*?)</li>@si', $link[1][0], $resim);
            preg_match_all('@<abbr class="published">(.*?) yayınlandı</abbr>@si', $resim[0][0], $yayintarihh);
            preg_match_all('@<a href="(.*?)" rel="bookmark">(.*?)</a>@si', $resim[0][0], $yenilink);
            preg_match_all('@<img width="200" height="110" src="(.*?)" class="section-thumb wp-post-image" alt="(.*?)" title="(.*?)" />@si', $resim[0][0], $resimlinkk);
            $resimlink = $resimlinkk[1];
            $baslik = $yenilink[2];
            $yayintarih = $yayintarihh[1];
            $etlink = $yenilink[1];
            $aciklama = $resimlinkk[2];

	       function replace_tr($text) {
	       $search= array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran','Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');
	       $replace= array('January','February','March','April','May','June','July','August','September','October','November','December'); 
	       $new_text = str_replace($search,$replace,$text);
	       return $new_text;  
	     	 }
	     	 for ($i=0; $i <20 ; $i++) { 
	     	 	 if (empty($baslik[$i])) {
              $baslik[$i]='Etkinlik';
              }
	     	 }



        function resim_indir($link,$univ_adi){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $dosya=curl_exec($ch);
        curl_close($ch);
         
        $dosya_adi=explode("/",$link);
        $dosya_adi=array_reverse($dosya_adi);
        $dosya_adi=$dosya_adi[0];
        $dosya_adi= $dosya_adi;

        $fp = fopen("../etkinlik_resimleri/$univ_adi/" . $dosya_adi,'w');
        fwrite($fp, $dosya);
        fclose($fp);
        return $dosya_adi;

        }
        $univ_adi="abantizzetbaysaluniv";
        
               
        echo resim_indir($resimlink,$univ_adi); 
             /*print_r($resimlinkk[1][0]);*/
	     	 


 ?>