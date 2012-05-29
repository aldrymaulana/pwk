<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

$this->load->helper('html'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu Kiri</title>

<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>

<div style="float:left" > <!--This is the first division of left-->
  <div id="firstpane" class="menu_list"> <!--Code for menu starts here-->
		
        <p class="menu_head"><?= anchor(site_url('admin/home'),'Home'); ?></p>	

        <p class="menu_head">Pengelolaan Pengguna</p>
        <div class="menu_body">
                <?= anchor(site_url('admin/user/form'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Tambah Pengguna'); ?>
                <?= anchor(site_url('admin/user'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Daftar Pengguna'); ?>
        </div>				

        <p class="menu_head">Artikel</p>
        <div class="menu_body">
                <?= anchor(site_url('admin/artikel/form'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Tambah Artikel'); ?>
                <?= anchor(site_url('admin/artikel'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Daftar Artikel'); ?>
        </div>

        <p class="menu_head">Dosen</p>
        <div class="menu_body">
                <?= anchor(site_url('admin/upload_foto_dosen/form'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Tambah Biodata Dosen'); ?>
                <?= anchor(site_url('admin/upload_foto_dosen/form'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Daftar Biodata Dosen'); ?>
        </div>
        
        <p class="menu_head">Pengelolaan Foto</p>
        <div class="menu_body">
                <?= anchor(site_url('admin/foto/form'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Tambah Foto'); ?>
                <?= anchor(site_url('admin/foto'),img(array('src'=>'images/main/77.png','border'=>'0','alt'=>'')).' Daftar Foto'); ?>
        </div>

        <p class="menu_head"><?= anchor(site_url('login/logout'),'Keluar'); ?></p>	



	   
  </div>  <!--Code for menu ends here-->
</div>

</body>
</html>
