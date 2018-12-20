<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" type="text/css" href="iletisim/iletisimmain.css">
      <meta charset="utf-8">
      <link rel="stylesheet" href="main.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

     <script language="javascript">
       function kontrol(){ var k;
        k=document.getElementById('isim').value;
        if(k==""){
         alert("Lütfen isim kısmını doldurun.");
         return false;
          } 
      k=document.getElementById('email').value;
       if(k==""){ 
       alert("Lütfen email kısmını doldurun.");
        return false; 
    	}
    	k=document.getElementById('konu').value;
       if(k==""){
         alert("Lütfen konu kısmını doldurun.");
         return false;
          } 
      k=document.getElementById('mesaj').value;
       if(k==""){ 
       alert("Lütfen mesaj kısmını doldurun.");
        return false; 
    }
}
function ePostaKont(eposta)
{
    var duzenli = new RegExp(/^[a-z]{1}[\d\w\.-]+@[\d\w-]{3,}\.[\w]{2,3}(\.\w{2})?$/);
    return duzenli.test(eposta);
}
function kontrolemail()
{
    var giris = document.getElementById('email');
    if(ePostaKont(giris.value))
        giris.style.backgroundColor = "white";
    else{
        giris.style.backgroundColor = "#F0D0D0";
    	alert("Lütfen Doğru Bir E-posta Adresi Giriniz.");
    	  giris.value="";
    	return false;
    }
} 

</script>
</head>

<body>

<?php include 'header.php' ?>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(img/iletisimbaslik.png);">
				<span>İLETİŞİM</span>
			</div>

			<form class="contact100-form validate-form"  method="post" action="" onSubmit="return kontrol()">

				<div class="wrap-input100 validate-input">
					<input id="isim" class="input100" type="text" name="isim" placeholder="İsim">
					<span class="focus-input100"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input">
					<input id="email" class="input100" type="text" name="email" placeholder="Email" onblur="kontrolemail()">
					<span class="focus-input100"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input">
					<input id="konu" class="input100" type="text" name="konu" placeholder="Konu">
					<span class="focus-input100"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input">
					<textarea id="mesaj" class="input100" name="mesaj" placeholder="Mesaj..."></textarea>
					<span class="focus-input100"></span>
					</label>
				</div>

				<div class="container-contact100-form-btn">
					<input class="contact100-form-btn" type="submit" name="iletisimgonder" value="GÖNDER" title="GÖNDER">
				</div>
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
					                         $isim =trim($_POST['isim']),
					                         $email=trim($_POST['email']),
					                         $konu=trim($_POST['konu']),
					                         $mesaj=trim($_POST['mesaj'])
					                     ));
					                       if ( $insert ){
					   							 $last_id = $db->lastInsertId();

					    						echo "<script>
													alert('Mesaj gönderildi');
													</script>";
												}
												else{
													echo "<script>
													alert('Mesaj gönderilemedi');
													</script>";
												}
											}
					?>
			</form>
		</div>
	</div>

<?php include 'footer.php' ?>
</body>
</html>








