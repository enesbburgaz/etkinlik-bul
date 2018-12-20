<?php
        include 'botunbasi.php';

              $baglan = baglanbot("http://www.agu.edu.tr/etkinlikler/");
              preg_match_all('@<a  href="(.*?)">(.*?)</a>@si',$baglan,$etkinlik_adi);
              $eetkinlik_adi=$etkinlik_adi[2];
              preg_match_all('@li><span class="summary-subtitle">&nbsp;Yer:</span>(.*?)</li>@si',$baglan,$etkinlik_bilgi);
              $eetkinlik_bilgi=$etkinlik_bilgi[1];
              preg_match_all('@<li><span class="summary-subtitle">&nbsp;Baş. Tarihi:</span>(.*?)</li>@si',$baglan,$etkinlik_tarih);
              $eetkinlik_tarih=$etkinlik_tarih[1];
              preg_match_all('@<a  href="(.*?)">(.*?)</a>@si',$baglan,$etkinlik_link);
              $eetkinlik_link=$etkinlik_link[1];

              $univ_adi="abdullahguluniv";

              $say=count($etkinlik_link[1]);
              for ($i=0; $i<$say; $i++) { 
              $degistir="http://www.agu.edu.tr".$etkinlik_link[1][$i];
              $link =str_replace(" ", "%20", $degistir);
              $git=file_get_contents($link);
              preg_match_all('@<p><img alt="" src="(.*?)" style="(.*?)" /></p>@si',$git,$etkinlik_resim);
              if (empty($etkinlik_resim[0])){
                $etkinlik_resim[1][0]='http://www.agu.edu.tr/site/tpl/microsites/agu/images/logo.png';
              }
              $eetkinlik_resim=$etkinlik_resim[1][0];

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
              $eetkinlik_link[$i]='http://www.agu.edu.tr/etkinlikler/';
              }

              $dosya_ismi=resim_indir($eetkinlik_resim,$univ_adi);

                $query = $db->prepare("INSERT INTO etkinlikler SET
                      etkinlik_adi = ?,
                      etkinlik_bilgi = ?,
                      etkinlik_tarih = STR_TO_DATE(?,'%d.%m.%Y'),
                      etkinlik_resim = ?,
                      etkinlik_link =  ?,
                      euniversite_id= 2,
                      esehir_id=38
                      ");
                       $insert = $query->execute(array(
                         $yeniad=ltrim($eetkinlik_adi[$i]),
                         $eetkinlik_bilgi[$i],
                         $eetkinlik_tarih[$i],
                         $eetkinlik_resim="etkinlik_resimleri/$univ_adi/$dosya_ismi",
                         $tamlink='http://www.agu.edu.tr'.$eetkinlik_link[$i]
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
