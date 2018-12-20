<?php
session_start();
if(!empty($_SESSION['admin_adi'])){
header("location:index.php");
}
require "../baglan.php";

if(isset($_POST['login'])){
$user = $_POST['admin_adi'];
$pass =$_POST['admin_sifresi'];

if(empty($user) || empty($pass)) {
    $message= "Lütfen boş alan bırakmayınız.";
}
 else {
    $sql = "SELECT admin_adi,admin_sifresi FROM adminpaneli WHERE admin_adi=? AND 
  admin_sifresi=?";
    $query = $db->prepare($sql);
    $query->execute(array($user,$pass));
    $row = $query->fetch(PDO::FETCH_BOTH);

    if($query->rowCount() > 0) {
        $_SESSION['admin_adi'] = $user;
        header("location:index.php");
    } else {
        $message= "Kullanıcı Adı veya Şifre hatalı.";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <meta charset="utf-8">
  <title>Admin Paneli</title>
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>

<body>
  <div class="login-card">
      <div class="logo">
    <img src="../img/logo.png" alt="logo">
  </div>  
  <form action="" method="post">
    <input type="text" name="admin_adi" placeholder="Kullanıcı Adı">
    <input type="password" name="admin_sifresi" placeholder="Şifre">
    <input type="submit" name="login" class="login login-submit" value="Giriş">
    <?php
  if(isset($message)) {
      echo $message;
  }
?>
  </form>
</div>
</body>
</html>