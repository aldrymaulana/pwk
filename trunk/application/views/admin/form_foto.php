<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

$this->load->helper('html'); ?>



<!-- JavaScript -->
<script type="text/javascript" src="<?= base_url() ?>js/wufoo.js"></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/form/form.css" media="screen, tv, projection" title="Default" />


<div id="container">
<fieldset class="fieldset">
<legend class="legend">

		| Halaman Tambah Artikel|</legend>

<div id="contentform" style="border:solid thin #BBBBBB; height:350px; background-color:#F9F9F9; -moz-border-radius: 5px;  padding-top:10px; padding-bottom:0.3px; margin-right:100px; margin-left:100px;">

<!-- Start value -->
<?
    //Setting Value Jika Prosedur yang dilakukan adalah prosedur input biasa.
	$value = array(
		'id_artikel'			=> "",
		'judul'					=> "",
		'isi'				=> "",
		'act_form'				=> "admin/foto/upload/"
	);
	
	//Setting Value pada form Jika melakukan prosedur Edit terhadap data tertentu.
	if($status == "edit"){
			$value['id_artikel'] = $id_artikel;
			$value['judul'] = $judul;
			$value['isi'] = $isi;
			$value['act_form'] = "admin/artikel/update/".$value['id_artikel'];			
	}//end if
?>
<?= form_open_multipart($value["act_form"]); ?>
<!-- End value -->

<table width="847" border="0" bordercolor="#F0F0F0">
  <tr>
    <td width="905" height="150">
        <form id="form1" name="form1" method="post">
          <div align="center">
            <table width="850" border="0">
            <tr>
                <td width="80">Nama Foto</td>
                <td width="208"><input name="nama_foto" type="text" size="50" value="<?=$value['judul']?>"/></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" name="foto" size="30"/></td>
				<td></td>
			</tr>
			<tr>
				<td height="28">&nbsp;</td>
				<td>
					<div align="left">
					<input type="submit" name="Submit" value="Simpan" />
					</div>
				</td>
			</tr>
            </table>
          </div>
      </form>        
      <p align="center">&nbsp;</p></td></tr>
</table>
</div>
<p>&nbsp;</p>
</fieldset>
</div> 
<p>
  <!--container-->
</p>
<p>&nbsp; </p>
