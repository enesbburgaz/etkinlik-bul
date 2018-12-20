  <?php
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
        
        $fp = fopen("../etkinlik_resimleri/$univ_adi/".$dosya_adi,'w');
        fwrite($fp, $dosya);
        fclose($fp);
        return $dosya_adi;
        }
  ?>