<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Website Program Studi Perencanaan Wilayah Tata & Kota</title>

	<!-- Link CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/flexigrid.css" media="screen, tv, projection" title="Default" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/jquery.css" media="screen, tv, projection" title="Default" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/main.css" media="screen, tv, projection" title="Default" />

	<!-- JAVASCRIPT -->
	<script src="<?php echo base_url(); ?>js/jquery-1.2.6.js" type="text/javascript" language="javascript"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.MultiFile.min.js" type="text/javascript" language="javascript"></script> 
	<script type="text/javascript" src="<?= base_url() ?>js/jquery.js"></script>
	<script type="text/javascript">
		window.addEvent('domready', function(){	
			var accordion2 = new Accordion($$('.toggler'),$$('.element'), {
				show: 5,
				fixedheight: false,
				alwaysHide: true
			});
		});
	</script>
	<script type="text/javascript">
	<!--//---------------------------------+
	//  Developed by Roshan Bhattarai 
	//  Visit http://roshanbh.com.np for this script and more.
	//  This notice MUST stay intact for legal use
	// --------------------------------->
	$(document).ready(function()
	{
		//slides the element with class "menu_body" when paragraph with class "menu_head" is clicked 
		$("#firstpane p.menu_head").click(function()
		{
			$(this).css({backgroundImage:"url(<?= base_url() ?>images/main/bl_head1.png)"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(<?= base_url() ?>images/main/bl_head0.png)"});
		});
	});
	</script>
	<script> 
		var outerLayout, middleLayout, innerLayout; 
		$(document).ready(function () { 
			outerLayout = $('body').layout({ 
				center__paneSelector:	".outer-center" 
			,	west__paneSelector:		".outer-west" 
			,	east__paneSelector:		".outer-east" 
			,	west__size:				174
			,	east__size:				125 
			,	spacing_open:			8 // ALL panes
			,	spacing_closed:			8 // ALL panes
			,	north__spacing_open:	0
			,	south__spacing_open:	0
			,	center__onresize:		"middleLayout.resizeAll" 
			}); 
			middleLayout = $('div.outer-center').layout({ 
				center__paneSelector:	".middle-center" 
			,	west__paneSelector:		".middle-west" 
			,	east__paneSelector:		".middle-east" 
			,	west__size:				100 
			,	east__size:				100 
			,	spacing_open:			8  // ALL panes
			,	spacing_closed:			12 // ALL panes
			,	center__onresize:		"innerLayout.resizeAll" 
			}); 
			innerLayout = $('div.middle-center').layout({ 
				center__paneSelector:	".inner-center" 
			,	west__paneSelector:		".inner-west" 
			,	east__paneSelector:		".inner-east" 
			,	west__size:				75 
			,	east__size:				75 
			,	spacing_open:			8  // ALL panes
			,	spacing_closed:			8  // ALL panes
			,	west__spacing_closed:	12
			,	east__spacing_closed:	12
			}); 
		}); 
	</script> 
	<script type="text/javascript" src="<?= base_url() ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>js/jquery.ui.all.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>js/jquery.layout.js"></script>
	
	<script type="text/javascript" src="<?= base_url() ?>public/js/flexigrid.pack.js"></script>
	<?
		if (isset($added_js)){
			echo $added_js; //attach js flexigrid (jika ada)
		}//end if
	?>
</head>
<body onload="funcOnLoad();">
<div class="ui-layout-north">
	<div id="toppanel">
	<div id="logo"><img src="<?= base_url() ?>images/main/psb_online.png" width="100" height="80" border="0"></img></div>
	<div id="logo_tut"><img src="<?= base_url() ?>images/main/tutwuri.png" width="94" height="80" border="0"></img></div>
	<div id="header1">
			Admin Panel Website Program Studi Perencanaan Wilayah Tata & Kota
		</div>
	</div>
</div> 
<div class="outer-center"><div id="main"><? echo $content;?></div></div> 
<div class="outer-west"><? $this->load->view("admin/menu_kiri");?></div> 
<div class="ui-layout-south">
	<div id="footerpanel">
	<div id="footer">
		<strong>© 2011-2012, PWK ITS</strong>
	</div>
</div> 

</body>
</html>