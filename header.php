	<?php include 'baglan.php';

  $ayarlar = $db->query('SELECT * FROM ayarlar')->fetch();
  ?>

      <title><?php echo $ayarlar['site_title']; ?></title>

  <header>
		<div class="header"></div>
	<div class="logo">
		<a href="index.php"><img src="<?php echo $ayarlar['header_logo']; ?>" alt="logo" title="Etkinlik Bul"></a>
	</div>
	<div class="arama">
    <div class="tumarama">

<form method="POST" action="index.php">
		<div class="secmeli"><h2 class="baslik"><?php echo $ayarlar['header_kategori']; ?></h2>
  <select title="Kategoriler" name="kategoriler">
    <option value="seciniz"><?php echo $ayarlar['header_kategori_ic']; ?></option> 
     <?php
          $query = $db->query("SELECT * FROM ara_kategoriler", PDO::FETCH_ASSOC);
          if ($query->rowCount()){
              foreach( $query as $row ){
                ?>
                    <option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['kategori_adi']; ?></option>
               <?php
             }
           }
            $kategoriler = $_POST['kategoriler'];?>
  </select>

<h2 class="baslik"><?php echo $ayarlar['header_univ']; ?></h2>
  <select title="Üniversiteler" name="universiteler">
    <option value="seciniz"><?php echo $ayarlar['header_univ_ic']; ?></option>
     <?php
          $query = $db->query("SELECT * FROM ara_universiteler", PDO::FETCH_ASSOC);
          if ($query->rowCount()){
              foreach( $query as $row ){
                ?>
                    <option value="<?php echo $row['universite_id']; ?>"><?php echo $row['universite_adi']; ?></option>
               <?php
             }
           }
            $universiteler = $_POST['universiteler'];?>
  </select>

<h2 class="baslik"><?php echo $ayarlar['header_sehir']; ?></h2>	
  <select title="Şehirler" name="sehirler">
    <option value="seciniz"><?php echo $ayarlar['header_sehir_ic']; ?></option>
     <?php
          $query = $db->query("SELECT * FROM ara_sehirler", PDO::FETCH_ASSOC);
          if ($query->rowCount()){
              foreach( $query as $row ){
                ?>
                    <option value="<?php echo $row['sehir_id']; ?>"><?php echo $row['sehir_adi']; ?></option>
               <?php
             }
           }
            $sehirler = $_POST['sehirler'];?>
  </select>


  <input type="submit" value="<?php echo $ayarlar['header_button']; ?>" title="Bul">
  </form>

		</div>
    </div>
	</div>
</header>