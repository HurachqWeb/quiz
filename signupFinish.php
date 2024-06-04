<?php 
session_start();
include "config.php";
include "inc/head.php";
include "inc/javascript.php";

//@$activatioCode = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
@$activatioCode = @$_POST['s2_activatioCode'];
@$name = @$_POST['s2_name'];
@$lastname = @$_POST['s2_lastname'];
@$username = @$_POST['s2_username'];
@$password = @$_POST['s2_password'];
@$birthDay = @$_POST['s2_birthDay'];
@$phoneNumber = @$_POST['s2_phoneNumber'];

@$qr_check = "select id from users where username='".@$username."'";
@$rs_check = mysqli_query($db,$qr_check);
@$kl_check = mysqli_num_rows($rs_check);
if(@$kl_check == 0)
{@$qr="insert into users (id,reg_date,name,last_name,username,birthday,password,phone_number,activation_code) values(null,'".date('Y-m-d H:i:s',$time)."','".@$name."','".@$lastname."','".@$username."','".@$birthDay."','".MD5(@$password)."','".@$phoneNumber."','".@$activatioCode."')";
mysqli_query($db,$qr);}

@$qr_signin = "select id from users where username='".@$username."' and password='".MD5(@$password)."'";
@$rs_signin = mysqli_query($db,$qr_signin);
@$rw_signin = mysqli_fetch_array($rs_signin);
if(@$rw_signin['id'] > 0)
{
	@$_SESSION['user_id']=@$rw_signin['id'];
}
?>
<div id="signupPopUp" class="signupPopUp"  style="display:block;">
	<div class="loginBarTitle"><?=@$text_signup_now?></div>
		<div id="regiLine" class="regiLine">
<center>
		<p><?=@$thankYouForRegistration?></p>
		<button class="loginButton" onclick="location.href='index.php?page=profile'"><?=@$text_login_text?></button>
</center>
</div>
</div>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DSXNY3LFVD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DSXNY3LFVD');
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPQXDXNV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>