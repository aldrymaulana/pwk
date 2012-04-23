<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

$this->load->helper('html'); ?>


<!-- JavaScript -->
<script type="text/javascript" src="<?= base_url() ?>js/wufoo.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url')?>js/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
			forced_root_block : 'p',
			mode : "textareas",
			//skin : "o2k7",
			 theme : "advanced",
			theme_advanced_toolbar_location : "top",
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,undo,redo,|,link,unlink,anchor,image",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : ""
			});
		</script>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/form/form.css" media="screen, tv, projection" title="Default" />


<div id="container">
<fieldset class="fieldset">
<legend class="legend">





		| Halaman Tambah Artikel|</legend>

<div style="border:solid thin #BBBBBB; height:350px; background-color:#F9F9F9; -moz-border-radius: 5px;  padding-top:10px; padding-bottom:0.3px; margin-right:100px; margin-left:100px;">
<table width="847" border="0" bordercolor="#F0F0F0">
  <tr>
    <td width="905" height="20">
        <form id="form1" name="form1" method="post" action="<?=base_url()?>index.php/admin/artikel/add">
          <div align="center">
            <table width="850" border="0">
              <tr>
                <td width="80">Judul Berita</td>
                <td width="208"><input name="judul" type="text" size="50" /></td>
                      	         </td>
              </tr>
                <tr >
                  <td ></td>
                  <td width="208" height="270"><textarea name="isi" style="width:100%;height:100%"/></textarea></td>
                </tr>
                
              <tr>
                <td height="28">&nbsp;</td>
                <td>
                  <div align="left">
                    <input type="submit" name="Submit" value="Simpan" />
                    </div></td>
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
