<?php
@session_start();
include "config.php";

@$profile = @$_SESSION['user_id'];
if(!@$profile)
{
	@$profile = @$_COOKIE['user_id'];
}
include "inc/head.php";
echo "<body>";

include "inc/javascript.php";
if(!$profile or $profile == 0)
{
	include "inc/start.php";
}
else
{
	 if(@$profile == 203){
	 	@$_SESSION['user_id']='0';
			setcookie("user_id", "0", time()-60*60*24*15, "/");
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".@$domain."'>";
			exit;
	 }
	@$qr_profile = "select id, activation_status from users where id='".@$profile."'";
	@$rs_profile = mysqli_query($db, $qr_profile);
	@$rw_profile = mysqli_fetch_array($rs_profile);
	if(@$rw_profile['activation_status'] == "blocked"){
		include "inc/head.php";
		include "inc/header.php";
			if(@$_GET['page']=="messages"){
					include "inc/messages.php";
				}
			else{
			include "blockeduser.php";
			}
		include "inc/footer.php";
	}
	else{
			include "inc/header.php";
			if(!@$_GET['page'])
			{
			include "inc/pager.php";
			}
			else{
				if(@$_GET['page']=="quiz"){
					include "inc/quiz.php";
				}
				if(@$_GET['page']=="profile"){
					include "inc/profile.php";
				}
				if(@$_GET['page']=="messages"){
					include "inc/messages.php";
				}
			}
				include "inc/footer.php";
	}
}
?>

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
<?php
echo "</body> 
</html>";
?>