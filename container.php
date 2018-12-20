
		<?php
      if ($kategoriler==0 && $universiteler==0 && $sehirler==0) {
        $query = $db->query("SELECT *,date_format(etkinlik_tarih,'%d/%c/%Y') as tarih FROM etkinlikler join ara_universiteler on euniversite_id=universite_id ORDER BY etkinlik_tarih DESC LIMIT 36", PDO::FETCH_ASSOC);
          if ($query->rowCount()){
            foreach( $query as $row ){?>
            <div class="etkinlikkutusu">
            <div class="etkinlikkutusuresim"><img src="<?php echo $row['etkinlik_resim']; ?>" name="resim" alt=""/></div>
            <div class="etkinlikkutusubaslık"><h3 name="univadi"><?php echo $row['universite_adi']; ?></h3></div>
            <div class="etkinlikkutusutarih"><h5 name="tarih"><?php echo $row['tarih']; ?></h5></div>
            <div class="etkinlikkutusubilgi"><p name="etadi"><?php echo $row['etkinlik_adi']; ?></p></div>
      </div>
<?php 
      }
    }
  }?>
  <?php 
  
          $query = $db->query("SELECT *,date_format(etkinlik_tarih,'%d/%c/%Y') as tarih FROM etkinlikler inner join ara_universiteler on euniversite_id=universite_id ORDER BY etkinlik_tarih DESC", PDO::FETCH_ASSOC);
          if ($query->rowCount()){
              foreach( $query as $row ){
                if ($kategoriler==$row['ekategori_id'] || $universiteler==$row['euniversite_id'] || $sehirler==$row['esehir_id']) {
   ?>
            <div class="etkinlikkutusu">
            <div class="etkinlikkutusuresim"><img src="<?php echo $row['etkinlik_resim']; ?>" alt=""/></div>
            <div class="etkinlikkutusubaslık"><h3><?php echo $row['universite_adi']; ?></h3></div>
            <div class="etkinlikkutusutarih"><h5><?php echo $row['tarih']; ?></h5></div>
			      <div class="etkinlikkutusubilgi"><p><?php echo $row['etkinlik_adi']; ?></p></div>
			</div>
			    <?php
             } 
            }
           }
           ?>
		
