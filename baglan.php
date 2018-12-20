<?php
	$username="root";
	$password="";
	$sunucu="localhost";
	$database="etkinlik_bul";

try {
     $db = new PDO("mysql:host=$sunucu; dbname=$database; charset=utf8", "$username", "$password");
} 
catch ( PDOException $e ){
     print $e->getMessage();
}

?>