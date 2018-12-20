<?php 
         function replace_tr($text) {
         $search= array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran','Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');
         $replace= array('January','February','March','April','May','June','July','August','September','October','November','December'); 
         $new_text = str_replace($search,$replace,$text);
         return $new_text;  
         }
?>