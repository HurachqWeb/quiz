<?php 
@session_start();
include "config.php";
include "inc/head.php";
include "inc/javascript.php";
@$qr = "update users set password='".MD5(@$_POST['regPassword'])."' where id='".@$_POST['user_id']."'";
mysqli_query($db,$qr);

?>
<div id="signupPopUp" class="signupPopUp" style="display:block">
	<div id="regiLine" class="regiLine">
		<div class="loginBarTitle">ԳԱՂՏՆԱԲԱՌԻ ՎԵՐԱԿԱՆԳՆՈՒՄ</div>
		<center>
		 <p style="color:green;font-size:14px"><?=@$passwor_change_finished?></p>
		 <button class="loginButton" onclick="location.href='index.php'"><?=@$text_login_text?></button>
		</center>
	</div>
	<div id="demo"></div>
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