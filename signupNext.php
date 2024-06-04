	<form onsubmit="return regActivation(); return chekIng();" id="regFinForm" action="signupFinish.php" method="POST">
<?php 
@session_start();
include "config.php";
include "inc/head.php";
include "inc/javascript.php";





@$name = @$_POST['name'];
@$lastname = @$_POST['lastname'];
@$username = @$_POST['regUsername'];
@$password = @$_POST['regPassword'];
@$birthDay = @$_POST['birth_year']."-".@$_POST['birth_mounth']."-".@$_POST['birth_day'];
@$phoneNumber = @$_POST['regPhone'];


echo "<input type='hidden' name='s2_name' id='s2_name' value='".@$name."'>";
echo "<input type='hidden' name='s2_lastname' id='s2_lastname' value='".@$lastname."'>";
echo "<input type='hidden' name='s2_username' id='s2_username' value='".@$username."'>";
echo "<input type='hidden' name='s2_password' id='s2_password' value='".@$password."'>";
echo "<input type='hidden' name='s2_birthDay' id='s2_birthDay' value='".@$birthDay."'>";
echo "<input type='hidden' name='s2_phoneNumber' id='s2_phoneNumber' value='".@$phoneNumber."'>";

?>
<div id="signupPopUp" class="signupPopUp"  style="display:block;">
	<div class="loginBarTitle"><?=@$text_signup_now?></div>
		<div id="regiLine" class="regiLine">
	<p><?=@$TextAcceptRegSms?></p>
	<p>
		<center>
		<iframe id="siteRuls" src="<?=@$doamin?>/inc/site-rules.php" style="border:none;"></iframe>
		<p>
		<input type="checkbox" id="rule1" name="rule" onchange="chekIng()" value="acceptRule" disabled> <?=@$IAcceptedRuleText?>
			<p>
		<input type="checkbox" id="rule2" name="rule" onchange="chekIng()" value="acceptRule" disabled> <?php
					@$data_of_birth =@$birthDay;
			@$date_v=@$data_of_birth;
			@$day_v = @$date_v[8].@$date_v[9];
			@$mount_v  = @$date_v[5].@$date_v[6];
			@$year_v = @$date_v[0].@$date_v[1].@$date_v[2].@$date_v[3];

			  $birthDate = @$mount_v."/".@$day_v."/".@$year_v;
			  $birthDate = explode("/", $birthDate);
			  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			    ? ((date("Y") - $birthDate[2]) - 1)
			    : (date("Y") - $birthDate[2]));

			  if(@$age < 21){
			  	echo @$IAcceptedRuleText3;
			  }else{
			  	echo @$IAcceptedRuleText2;
			  }

	?><p>

	<input type="text" name="actIvateSMS" id="actIvateSMS" class="loginInputs" placeholder="<?=@$textsixcode?>" pattern="[0-9]*" inputmode="numeric" maxlength="4"  required />

	<p>
		     <div id="errorMessageStep2" class="errorMessage"></div>
			<button id="regButton" class="regButton" onclick="regActivation()" disabled><?=@$textAccept?></button>

</center>
</div>
</div>
<?php
$url="https://api.dexatel.com/v1/templates";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER,  array(
			  "Content-Type: application/json",
      	"X-Dexatel-Key: edc8fc545016a4fa210dbecf2d5e07ca"    
   ));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	//curl_setopt($ch, CURLOPT_POSTFIELDS, array('name: verification','text: Hi, your verification code is {code}','channel: SMS'));
	$result = curl_exec($ch);

	@$id = strstr($result,'"id":"');
	@$id = strstr($id,'","account_id"',true);
	@$id = str_ireplace('"id":"','',$id);

	@$phone='374'.@$_POST['regPhone'];
	@$data = array('data' => array('sender'=>'Madridista','phone'=>$phone,'template' => $id,'code_length'=> '4'));
	$data_string = json_encode($data);

	@$url1='https://api.dexatel.com/v1/verifications';
	$ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $url1);
	curl_setopt($ch1, CURLOPT_HTTPHEADER,  array(
			  "Content-Type: application/json",
			  "filter: countries",
      	"X-Dexatel-Key: edc8fc545016a4fa210dbecf2d5e07ca"    
   ));
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($ch1, CURLOPT_POSTFIELDS, $data_string);
	$result1 = curl_exec($ch1);

    @$activatioCode = strstr($result1,'"code":"');
    @$activatioCode = strstr($activatioCode,'","create_date',true);
    @$activatioCode = str_ireplace('"code":"','',@$activatioCode);
echo "<input type='hidden' name='s2_activatioCode' id='s2_activatioCode' value='".@$activatioCode."'>";
?>
	</form>
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