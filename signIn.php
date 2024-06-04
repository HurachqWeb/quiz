<?php 
session_start();
include "config.php";
@$username = @$_POST['username'];
@$password = @$_POST['password'];

echo @$_POST['rm'];
@$qr_signin = "select id from users where username='".@$username."' and password='".MD5(@$password)."'";
@$rs_signin = mysqli_query($db,$qr_signin);
@$rw_signin = mysqli_fetch_array($rs_signin);
if(@$rw_signin['id'] > 0)
{
	if(@$_POST['rm'] == "remember")
	{
		setcookie("user_id", $rw_signin['id'], time()+60*60*24*365, "/");
	}
	else
	{
		@$_SESSION['user_id']=@$rw_signin['id'];
	}
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".@$domain."'>";
}
else {
	//echo @$TextSignInDetilesIsWrong;
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".@$domain."index.php?error=true'>";
}
?>
