<?php 
@session_start();
include "config.php";
include "inc/head.php";
include "inc/javascript.php";
?>
<div id="signupPopUp" class="signupPopUp" style="display:block">
	<div id="regiLine" class="regiLine">
		<div class="loginBarTitle"><?=@$text_signup_now?></div>
		<form id="regform" action="signupNext.php" method="POST">
			<center>
			<input type="text" name="name" id="name" class="loginInputs" placeholder="<?=@$text_name?>" maxlength="32">
			<input type="text" name="lastname" id="lastname" class="loginInputs" placeholder="<?=@$text_lastname?>" maxlength="32">
			<p>
				<span class="passwordRuleText"><?=@$username_rule?></span><br>
			<input type="text" name="regUsername" id="regUsername" class="loginInputs" placeholder="<?=@$text_username?>" maxlength="16" onkeyup="cehckingUsername()">
			<p>
				<span class="passwordRuleText">Ծննդյան ամսաթիվը</span><br>
			<select name="birth_day"  id="birth_day" class="loginInputs" style="width:30%;">
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
			<select id="birth_mounth" name="birth_mounth" class="loginInputs" style="width:30%;">
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
			<select id="birth_year" name="birth_year" class="loginInputs" style="width:30%;">
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
			<input type="password" name="regPassword" id="regPassword" class="loginInputs" placeholder="<?=@$text_password_now?>" maxlength="16" onkeyup="cehckingPassword(event)"  onkeypress="checkPassOfPreg(event)">
			<input type="password" name="regPasswordR" id="regPasswordR" class="loginInputs" placeholder="<?=@$text_password_replay?>"  maxlength="16" onkeyup="cehckingPasswordReplay()">

			<p>
				<div id="errorMessageRg" class="errorMessage"></div>
				<span class="passwordRuleText"><?=@$phone_rule?></span><p>
			+374<input type="telephone" name="regPhone" id="regPhone" class="loginInputs" placeholder="<?=@$text_mark_you_phone?>" pattern="[0-9]*" inputmode="numeric" maxlength="8"  onkeyup="cehckingPhone()" onkeypress="checkPhoneSignUp(event)">
			<button class="regButton" onclick="signUpPoUpNext()"><?=@$text_signup_now?></button>
		</form>
		</center>
	</div>
	<div style="height:40px;width:100%"></div>
</div>