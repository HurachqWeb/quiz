<?php
@session_start();
include "config.php";

@$profile = @$_SESSION['user_id'];
if(!@$profile)
{
	@$profile = @$_COOKIE['user_id'];
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
		include "inc/head.php";
		echo "<body>";
		include "inc/javascript.php";
		include "inc/header.php";
		?>
		<div class="siteBody">
			<div class="siteLeft">
				<div class="siteLeftIn" style="background-color:#ffffff;">
					<h1>ԴՐՈՒՅԹՆԵՐ ԵՎ ՊԱՅՄԱՆՆԵՐ<h1>
		<?php include "inc/site-rules.php"; ?>
		</div>
		</div>
		</div>
<?php
		include "inc/footer.php";
}
echo "</body> 
</html>";
?>