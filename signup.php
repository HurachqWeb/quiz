<?php 
@session_start();
include "config.php";
include "inc/head.php";
include "inc/javascript.php";
?>
<div id="signupPopUp" class="signupPopUp" style="display:block">
	<div id="regiLine" class="regiLine">
		<div class="loginBarTitle"><?=@$text_signup_now?></div>
		<form  onsubmit="return signUpPoUpNext()" id="regform" action="signupNext.php" method="POST">
			<center>
			<input type="text" name="name" id="name" class="loginInputs block" placeholder="<?=@$text_name?>" maxlength="32">
			<input type="text" name="lastname" id="lastname" class="loginInputs block" placeholder="<?=@$text_lastname?>" maxlength="32">
			<p>
				<span class="passwordRuleText"><?=@$username_rule?></span><br>
				<span id="errorMessageRgUsername" class="errorMessage"></span>
			<input type="text" name="regUsername" id="regUsername" class="loginInputs block" placeholder="<?=@$text_username?>" maxlength="16" onkeyup="cehckingUsername()">
			
			<p>
				<span class="passwordRuleText">Ծննդյան ամսաթիվը</span><br>
			<select name="birth_day"  id="birth_day" class="loginInputs selectorMobi" style="width:30%;">
				<option value="">Օր</option>
				<?php
					for(@$d=1;$d<=31;$d++){
						if($d<=9){
							@$day="0".$d;
						}else{
							@$day=$d;
						}
						echo "<option value=\"".@$day."\">".@$day."</option>";
					}
				?>
			</select>
			<select onsubmit="" id="birth_mounth" name="birth_mounth" class="loginInputs selectorMobi" style="width:30%;">
				<option value="">Ամիս</option>
				<option value="01">հունվար</option>
				<option value="02">փետրվար</option>
				<option value="03">մարտ</option>
				<option value="04">ապրիլ</option>
				<option value="05">մայիս</option>
				<option value="06">հունիս</option>
				<option value="07">հուլիս</option>
				<option value="08">օգոստոս</option>
				<option value="09">սեպտեմբեր</option>
				<option value="10">հոկտեմբեր</option>
				<option value="11">նոյեմբեր</option>
				<option value="12">դեկտեմբեր</option>
			</select>
			<select id="birth_year" name="birth_year" class="loginInputs selectorMobi" style="width:30%;">
				<option value="">Տարի</option>
				<?php 
					for($s=1;$s<=70;$s++){
						@$yr=date('Y')-10;
						@$year = $yr-$s;
						echo "<option value=\"".@$year."\">".@$year."</option>";
					}
				?>
			</select>
			<!--<input type="text" name="birthDate" id="birthDate" class="loginInputs" onfocus="this.type='date'" onblur="this.type='text'" placeholder="<?=@$text_birthday?>">-->
			<p>	
				<span class="passwordRuleText"><?=@$passwords_rule?></span><br>
			<input type="password" name="regPassword" id="regPassword" class="loginInputs block" placeholder="<?=@$text_password_now?>" maxlength="16" onkeyup="cehckingPassword(event)"  onkeypress="checkPassOfPreg(event)">
			<input type="password" name="regPasswordR" id="regPasswordR" class="loginInputs block" placeholder="<?=@$text_password_replay?>"  maxlength="16" onkeyup="cehckingPasswordReplay()">
				<span id="errorMessageRg" class="errorMessage"></span>
				
				<br>
				<span class="passwordRuleText"><?=@$phone_rule?></span><p>
					<span id="errorMessageRgPhoneNumber" class="errorMessage"></span>
					<span id="errorMessageRgPhoneNumber2" class="errorMessage"></span>
			<input type="telephone" name="regPhone" id="regPhone" class="loginInputs" placeholder="<?=@$text_mark_you_phone?>" pattern="[0-9]*" inputmode="numeric" maxlength="8"  onkeyup="cehckingPhone()" onkeypress="checkPhoneSignUp(event)">
			<button class="regButton" onclick="signUpPoUpNext()"><?=@$text_signup_now?></button>
		</form>
		</center>
	</div>
	<div style="height:40px;width:100%"></div>
</div>
<script>
	var ddd = setInterval(cehckingPhone,100);
	var dd2 = setInterval(cehckingUsername,100);
</script>
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