<?php

include 'header.php'; 
include 'sidebar.php';
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SİTE AYARLARI</h1>

                       		 <form action="" method="POST">


					<div class="col-md-6">
                        <div class="col-md-9">
                        	<label>Site Başlığı</label>
                            <input class="form-control" type="text" name="site_title" value="<?php echo $ayarlar['site_title']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="col-md-9">
                        	<label>Ana Logo Yolu</label>
                            <input class="form-control" type="text" name="header_logo" value="<?php echo $ayarlar['header_logo']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>1.Kategori Adı</label>
                            <input class="form-control" type="text" name="header_kategori" value="<?php echo $ayarlar['header_kategori']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>1.Kategori Seçmelisinin Adı</label>
                            <input class="form-control" type="text" name="header_kategori_ic" value="<?php echo $ayarlar['header_kategori_ic']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                              <div class="col-md-9">
                        	<label>2.Kategori Adı</label>
                            <input class="form-control" type="text" name="header_univ" value="<?php echo $ayarlar['header_univ']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>2.Kategori Seçmelisinin Adı</label>
                            <input class="form-control" type="text" name="header_univ_ic" value="<?php echo $ayarlar['header_univ_ic']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                              <div class="col-md-9">
                        	<label>3.Kategori Adı</label>
                            <input class="form-control" type="text" name="header_sehir" value="<?php echo $ayarlar['header_sehir']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>3.Kategori Seçmelisinin Adı</label>
                            <input class="form-control" type="text" name="header_sehir_ic" value="<?php echo $ayarlar['header_sehir_ic']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="col-md-9">
                        	<label>Buton Adı</label>
                            <input class="form-control" type="text" name="header_button" value="<?php echo $ayarlar['header_button']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                    	                    <hr>
                    </div>

                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>Footer Logo Yolu</label>
                            <input class="form-control" type="text" name="footer_logo" value="<?php echo $ayarlar['footer_logo']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>Telif Açıklaması</label>
                            <input class="form-control" type="text" name="footer_telif" value="<?php echo $ayarlar['footer_telif']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                              <div class="col-md-9">
                        	<label>1.Sayfa Adı</label>
                            <input class="form-control" type="text" name="footer_anasayfa" value="<?php echo $ayarlar['footer_anasayfa']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>2.Sayfa Adı</label>
                            <input class="form-control" type="text" name="footer_hakkimizda" value="<?php echo $ayarlar['footer_hakkimizda']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                              <div class="col-md-9">
                        	<label>3.Sayfa Adı</label>
                            <input class="form-control" type="text" name="footer_iletisim" value="<?php echo $ayarlar['footer_iletisim']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>Facebook Linki</label>
                            <input class="form-control" type="text" name="footer_facebook" value="<?php echo $ayarlar['footer_facebook']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>Twitter Linki</label>
                            <input class="form-control" type="text" name="footer_twitter" value="<?php echo $ayarlar['footer_twitter']; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                             <div class="col-md-9">
                        	<label>İnstagram Linki</label>
                            <input class="form-control" type="text" name="footer_instagram" value="<?php echo $ayarlar['footer_instagram']; ?>"/>
                            <br>
                        </div>
                    </div>
                    	</form>
                        </div>
                             <div class="panel-body">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Kaydet
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Başlık</h4>
                                        </div>
                                        <div class="modal-body">
                                            Emin misin?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Çıkış</button>
                                            <button type="button" class="btn btn-primary">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>           
            </div>
        </div>

<?php include 'footer.php'; ?>