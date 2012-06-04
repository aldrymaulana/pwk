<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
<link rel="stylesheet" href="<?=base_url()?>css/login/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="<?=base_url()?>"><img src="<?=base_url()?>images/header_login.PNG" alt="" /></a>
        </div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start falidator ................................................................................. -->
	<script>
		function validateForm()
		{
			if(document.frm.username.value=="")
			{
				alert("Username anda harus diisi");
				document.frm.username.focus();
				return false;
			} 
			else if(document.frm.password.value=="")
			{
				alert("Cek kembali pengisian password anda");
				document.frm.password.value=null;
				document.frm.confirmpassword.value=null;
				document.frm.password.focus();
				return false;
			}
		}
	</script>
	
	
	
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<th colspan="2"><div align="center">Login ke Admin Panel website PWK ITS</div></th>
		</tr>
		<tr>
		<th>&nbsp;</th>
		</tr>
<?
    echo form_open('login/auth');
?>
		<form name="frm" method="post" action="" onsubmit="return validateForm()">
		<tr>
			<th>Username</th>
			<td><input name="username" id="username" type="text" class="login-inp"/></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input name="password" id="password" type="password" class="login-inp" onfocus="this.value=''" value="" /></td>
		</tr>
		
		<tr>
			<th></th>
		    <td><input name="submit" type="submit" class="submit-login" id="submit" value="Login" /></td>
		</tr>
		</form>
		</table>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<p><a href="" class="forgot-pwd"></a></p>
	<p></p>
	
 	</div>
 <!--  end loginbox -->

</div>
<!-- End: login-holder -->
</body>
</html>