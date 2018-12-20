<?php
    include 'botunbasi.php';
    include 'tarihcevir.php';

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


              $univ_adi="abantizzetbaysaluniv";

        
                      $say=count($resimlink);
                      for ($i=0; $i <$say ; $i++) { 
                      $time = strtotime(replace_tr($yayintarihh[1][$i]));
                      $newformat = date('Y-m-d',$time);
                      if ($newformat=='1970-01-01') {
                      $newformat='0000-00-00';
                      }
                      if (empty($baslik[$i])) {
                      $baslik[$i]='Etkinlik';
                      }
                      if (empty($aciklama[$i])) {
                      $aciklama[$i]='Daha fazlası için siteyi ziyaret edin.';
                      }
                      if (empty($resimlink[$i])) {
                      $resimlink[$i]='http://www.ibu.edu.tr/template/contents/ibu_8258991.png';
                      }
                      if (empty($etlink[$i])) {
                      $etlink[$i]='http://ajanda.ibu.edu.tr/?cat=1819';
                      }

                      $dosya_ismi=resim_indir($resimlink[$i],$univ_adi);

                      $query = $db->prepare("INSERT INTO etkinlikler SET
                      etkinlik_adi = ?,
                      etkinlik_bilgi = ?,
                      etkinlik_tarih = ?,
                      etkinlik_resim = ?,
                      etkinlik_link =  ?,
                      euniversite_id= 1,
                      esehir_id=14
                      ");
                       $insert = $query->execute(array(
                         $baslik[$i],
                         $aciklama[$i],
                         $newformat,
                         $resimlink[$i]="etkinlik_resimleri/$univ_adi/$dosya_ismi",
                         $etlink[$i]
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
