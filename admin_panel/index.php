<?php

include 'header.php'; 
include 'sidebar.php';

session_start();
if(empty($_SESSION['admin_adi'])){
header("location:login.php");
}
?>
  <meta charset="utf-8">
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">ETKİNLİK BUL</h1>
                        <h1 class="page-subhead-line">Etkinlik Bul Admin Paneline Hoş Geldiniz.</h1>

                    </div>
                </div>           
            </div>
        </div>

<?php include 'footer.php'; ?>