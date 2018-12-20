<?php
        include 'botunbasi.php';

        $baglan = baglanbot("http://www.acibadem.edu.tr/etkinlik");
        preg_match_all('@<h2><a href="(.*?)" title="">(.*?)</a> </h2>@si',$baglan,$etkinlik_adi);
        $eetkinlik_adi=$etkinlik_adi[2];
        preg_match_all('@<h2><a href="(.*?)" title="">(.*?)</a> </h2>@si',$baglan,$etkinlik_link);
        $eetkinlik_link=$etkinlik_link[1];
        preg_match_all('@<b> (.*?)</b>@si',$baglan,$etkinlik_tarih);
        $eetkinlik_tarih=$etkinlik_tarih[1];
        preg_match_all('@<p>(.*?)</p>@si',$baglan,$etkinlik_bilgi);
        $eetkinlik_bilgi=$etkinlik_bilgi[1];
        $eetkinlik_resim='http://www.acibadem.edu.tr/assets/images/acu-logo.png';

        $univ_adi="acibademuniv";
        $dosya_ismi=resim_indir($eetkinlik_resim,$univ_adi);

            for ($i=0; $i < 24; $i++) {  
              if (empty($eetkinlik_adi[$i])) {
              $eetkinlik_adi[$i]='Etkinlik';
              }
              if (empty($eetkinlik_bilgi[$i])) {
              $eetkinlik_bilgi[$i]='Daha fazlası için siteyi ziyaret edin.';
              }
              if (empty($eetkinlik_tarih[$i])) {
              $eetkinlik_tarih[$i]='00-00-0000';
              }
              if (empty($eetkinlik_link[$i])) {
              $eetkinlik_link[$i]='http://www.acibadem.edu.tr/etkinlik';
              }  
                      $query = $db->prepare("INSERT INTO etkinlikler SET
                      etkinlik_adi = ?,
                      etkinlik_bilgi = ?,
                      etkinlik_tarih = STR_TO_DATE(?,'%d.%m.%Y'),
                      etkinlik_resim = ?,
                      etkinlik_link =?,
                      euniversite_id= 3,
                      esehir_id=34
                      ");
                       $insert = $query->execute(array(
                         $eetkinlik_adi[$i],
                         $eetkinlik_bilgi[$i],
                         $eetkinlik_tarih[$i],
                         $eetkinlik_resim="etkinlik_resimleri/$univ_adi/$dosya_ismi",
                         $tamlink='http://www.acibadem.edu.tr'.$eetkinlik_link[$i]
                        ));    
                                             
                    }
                        if ($insert) {
                        $last_id = $db->lastInsertId();
                        print "Kayıt işlemi başarılı";
                       }
                        else{
                        print "Kayıt işlemi hatalı";
                       }
?>


    




