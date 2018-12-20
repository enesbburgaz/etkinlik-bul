<?php 
include 'baglan.php';

if (isset($_POST['iletisimgonder'])) {

					$query = $db->prepare("INSERT INTO iletisim SET
                      iletisim_ad = ?,
                      iletisim_email = ?,
                      iletisim_konu = ?,
                      iletisim_mesaj = ?
                      ");
                       $insert = $query->execute(array(
                         $isim =$_POST['isim'],
                         $email=$_POST['email'],
                         $konu=$_POST['konu'],
                         $mesaj=$_POST['mesaj']
                     ));
                       if ( $insert ){
   							 $last_id = $db->lastInsertId();

    						echo "Mesaj gönderildi";
							}
							else{
								echo "Mesaj gönderme başarısız.";
							}
						}
?>
