<html xmlns="http://www.w3.org/1999/xhtml">



<!-- start of grid-->

	<link href="<?=$this->config->item('base_url');?>public/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?=$this->config->item('base_url');?>public/css/flexigrid.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?=$this->config->item('base_url');?>public/js/jquery.pack.js"></script>
	<script type="text/javascript" src="<?=$this->config->item('base_url');?>public/js/flexigrid.pack.js"></script>
	
	
	
	<?php
	echo $js_grid;
	?>
	<script type='text/javascript'>
			function test(com,grid)
			{
				if (com=='Tambah')
				{
					window.location.href="<?php echo $this->config->item('base_url')?>index.php/peserta/peserta/form_peserta";
					return false; 
				
				}
				
				else {
					return false;
				}           
			} 
	</script>
	<table id="flex1" style="display:none"></table>