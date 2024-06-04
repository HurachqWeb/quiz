<?php
@session_start();
include "config.php";

@$profile = @$_SESSION['user_id'];
if(!@$profile)
{
	@$profile = @$_COOKIE['user_id'];
}


$fname=$_FILES['avatar']['name'];
if(!$fname){

}
else {
	@$filename = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	@$filename = MD5($filename);
	@$upload_dir = "uploads/avatars";
	@$upload_dir200 = "uploads/avatars/200x200/";
	@$fformat = explode('.', $fname);
	@$cnt = substr_count($fname, '.');
    $fileNameNow = @$filename.".jpg";
	move_uploaded_file($_FILES['avatar']['tmp_name'], "$upload_dir/$fileNameNow");
	@$avatar = $domain."set_image.php?src=https://quiz.realmadrid.am/uploads/avatars/".$fileNameNow."&w=200&h=200&zc=1&a=c&q=70";
	copy(@$avatar,@$upload_dir200.$fileNameNow);
	unlink($upload_dir/$fileNameNow);
	@$qr3="select avatar from users where id='".@$profile."'";
	@$rs3=mysqli_query($db,$qr3);
	@$rw3 = mysqli_fetch_array($rs3);

	@$oldimg = "uploads/avatars/".@$rw3['avatar'];
	unlink(@$oldimg);

	@$qr2="update users set avatar='".$fileNameNow."' where id='".@$profile."'";
	mysqli_query($db,$qr2);
}
@$birthDay=@$_POST['birth_year']."-".@$_POST['birth_mounth']."-".@$_POST['birth_day'];
@$qr = "update users set  email_address='".@$_POST['email_address']."' where id='".@$profile."'";
mysqli_query($db,$qr);
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".@$domain."index.php?page=profile'>";

?>