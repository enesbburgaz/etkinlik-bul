<?php
include '../baglan.php';
include 'resimindir.php';
set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'tr_TR.UTF-8');


      function baglanbot($url){
        $ch = curl_init(); 
        $timeout = "5"; 
        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_HEADER,false); 
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout); 
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($ch,CURLOPT_REFERER,"http://www.google.com.tr"); 
        curl_setopt($ch,CURLOPT_USERAGENT,$agent); 
        $data = curl_exec($ch); 
        curl_close($ch); 
        return $data;
        }
