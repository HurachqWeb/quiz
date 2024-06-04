<?php 
include "config.php";
include "premession.php";
if(@$profile_type == "global_admin")
{
	@$date = date('Y-m-d H:i:s',$time);
	@$user=@$_POST['user_id'];
	@$title=@$_POST['title'];
	@$text = @$_POST['text_desc'];
	@$qr = "insert into messages value(null,'".@$date."','".@$user."','admin','".@$user."','".@$title."','".@$text."','new')";
	@$qr2 = "insert into messages value(null,'".@$date."','admin','admin','".@$user."','".@$title."','".@$text."','new')";
	mysqli_query($db,$qr);
	mysqli_query($db,$qr2);

	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".@$domain."index.php?page=messages&box=outbox'>";
}
?>
