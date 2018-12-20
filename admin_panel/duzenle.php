<?php

include 'header.php'; 
include 'sidebar.php';
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Düzenle</h1>


 
   
                                <table border="1" width="1050" align="center">
                                    <caption>Kayıtları Düzenleme</caption>
                                        <tr>
                                            <th>#</th>
                                             <th>ID</th>
                                            <th>Üniversite ID</th>
                                            <th>Şehir ID</th>
                                            <th>Kategori ID</th>
                                            <th>Etkinlik Adı</th>
                                            <th>Etkinlik Bilgisi</th>
                                            <th>Etkinlik Tarihi</th>
                                            <th>Etkinlik Resimi</th>
                                            <th>Etkinlik Linki</th>
                                        </tr>

                                    <?php 
                                    $query = $db->query("SELECT * FROM etkinlikler inner join ara_universiteler on euniversite_id=universite_id", PDO::FETCH_ASSOC);
                                     if ($query->rowCount()){
                                         foreach( $query as $row ){
                                            ?>
                                            <tr>
                                           <td><input type="checkbox" value="" /></td>
                                            <td name="etkinlik_id"><?php echo $row['etkinlik_id']; ?></td> 
                                            <td name="euniversite_id"><?php echo $row['euniversite_id']; ?></td>
                                            <td name="esehir_id"><?php echo $row['esehir_id']; ?></td>
                                            <td name="ekategori_id"><?php echo $row['ekategori_id']; ?></td>
                                            <td name="etkinlik_adi"><?php echo $row['etkinlik_adi']; ?></td>
                                            <td name="etkinlik_bilgi"><?php echo $row['etkinlik_bilgi']; ?></td>
                                            <td name="etkinlik_tarih"><?php echo $row['etkinlik_tarih']; ?></td>
                                            <td name="etkinlik_resim"><?php echo $row['etkinlik_resim']; ?></td>
                                            <td name="etkinlik_link"><?php echo $row['etkinlik_link']; ?></td>
                                        </tr>
                                         <?php
                                             } 
                                         }
                                        ?>

                                </table>                            
                       
                    <div class="dbutonlar">
                                <button type="button" class="btn btn-success">Ekle</button>
                                <button type="button" class="btn btn-warning">Düzenle</button>
                                <button type="button" class="btn btn-danger">Sil</button>
                                </div>
                    </div>
                </div>           
            </div>
        </div>

<?php include 'footer.php'; ?>

