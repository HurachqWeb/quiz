<?php 
@session_start();
include "config.php";
include "inc/head.php";
include "inc/javascript.php";

@$string = @$_POST['email_phone'];
@$qr="select id, email_address, phone_number  from users where email_address='".@$string."' or phone_number='".@$string."'";
@$rs=mysqli_query($db,$qr); 
@$kl=mysqli_num_rows($rs);
@$rw=mysqli_fetch_array($rs);

if(@$rw['email_address'] == @$string){
	@$method = "email";
}
if(@$rw['phone_number'] == @$string){
	@$method = "phone";
}
?>
<div id="signupPopUp" class="signupPopUp" style="display:block">
	<div id="regiLine" class="regiLine">
		<div class="loginBarTitle">ԳԱՂՏՆԱԲԱՌԻ ՎԵՐԱԿԱՆԳՆՈՒՄ</div>
		<center>
		<?php 
			if(@$method =="phone")
			{
				?>
					<p style="color:green">Մուտքագրեք ձեր հեռախոսահամարին ստացած քառանիշ թիվը և հաստատեք նոր գաղտնաբառ
					</p> 
					<form onsubmit="return changePassword()" id="changeForm" action="reset-password-finish.php" method="POST">
					<input type="hidden" name="user_id" value="<?=@$rw['id']?>">
					<input type="text" name="4code" id="4code" class="loginInputs" placeholder="Քառանիշ թիվ" maxlength="4" onkeyup="checkCode()"><p>
					<input type="password" name="regPassword" id="regPassword" class="loginInputs" placeholder="<?=@$text_password_now?>" maxlength="16" onkeyup="cehckingPassword(event)"  onkeypress="checkPassOfPreg(event)">
					<p>
					<input type="password" name="regPasswordR" id="regPasswordR" class="loginInputs" placeholder="<?=@$text_password_replay?>"  maxlength="16" onkeyup="cehckingPasswordReplay()">
					<div id="errorMessageRg" class="errorMessage"></div>
					<button id="regButton" class="regButton" onclick="changePassword()" >ՎԵՐԱԿԱՆԳՆԵԼ</button>
					</form>
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

					@$phone='374'.@$string;
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
				echo "<input type='hidden' name='activatioCode' id='activatioCode' value='".@$activatioCode."'>";
			}
			if(@$method =="email")
			{
				?>
					<p style="color:green">Մուտքագրեք ձեր էլ-փոստին ստացած քառանիշ թիվը և հաստատեք նոր գաղտնաբառ։<br><span style="font-size:11px;color:#910000">(Ուշադրություն մեր կողմից ուղարկված էլ-փոստը հնարավոր է նաև հայտնվի Ձեր SPAM / JUNK պանակում, եղեք ուշադիր)</span>
					</p> 
					<form onsubmit="return changePassword()" id="changeForm" action="reset-password-finish.php" method="POST">
					<input type="hidden" name="user_id" value="<?=@$rw['id']?>">
					<input type="text" name="4code" id="4code" class="loginInputs" placeholder="Քառանիշ թիվ" maxlength="4" onkeyup="checkCode()"><p>
					<input type="password" name="regPassword" id="regPassword" class="loginInputs" placeholder="<?=@$text_password_now?>" maxlength="16" onkeyup="cehckingPassword(event)"  onkeypress="checkPassOfPreg(event)">
					<p>
					<input type="password" name="regPasswordR" id="regPasswordR" class="loginInputs" placeholder="<?=@$text_password_replay?>"  maxlength="16" onkeyup="cehckingPasswordReplay()">
					<div id="errorMessageRg" class="errorMessage"></div>
					<button id="regButton" class="regButton" onclick="changePassword()" >ՎԵՐԱԿԱՆԳՆԵԼ</button>
					</form>
				<?php
				@$activatioCode = rand(0,9).rand(0,9).rand(0,9).rand(0,9);

				@$mail_text="<center><table style='450px;border:0px;font-size:14px;'>
					<tr>
						<td style='width:100%;background-color:#00529f;height:60px;'>
						<img src='https://quiz.realmadrid.am/_inside/images/rm_logo.png' style='float:left;height:40px;padding-left:20px'>
	<span style='float:left;margin-left:20px;color:#FFF;font-size:20px;margin-top:5px'>Madridista</span>
						</td>
					</tr>
					<tr>
						<td width='100%' height='250px' valign='center'><center>Գաղտնաբառի հաստատման կոդն է՝ <b>".@$activatioCode."</b></center></td>
					</tr>
				</table></center>";

				$to      = @$rw['email_address'];
				$mailAdmin ='noreply@realmadrid.am';
				$subject = 'Madridista';
				$message = @$mail_text;
					$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From:'.$mailAdmin . "\r\n";

				mail($to, $subject, $message, $headers);

				echo "<input type='hidden' name='activatioCode' id='activatioCode' value='".@$activatioCode."'>";
				 //here mail sending code
				}
		?>
		</center>
	</div>
	<div id="demo"></div>
</div>

<script type="text/javascript">
	function checkCode(){
		var code1 = document.getElementById("4code").value;
		var code2 = document.getElementById("activatioCode").value;
		if(code1.length == 4){
			if(code1 != code2){
				document.getElementById("errorMessageRg").innerHTML="Հաստատման քառանիշ կոդը սխալ է";
			}
			else {
				document.getElementById("errorMessageRg").innerHTML="";
			}
		}
		else{
			if(code1.length > 0 && code1.length < 4){
				document.getElementById("errorMessageRg").innerHTML="Հաստատման կոդը պետք է լինի քառանիշ";
			}
		}
	}
</script>
<script type="text/javascript">
	function changePassword(){
		let cd1=document.getElementById("4code").value;
		let err = document.getElementById("errorMessageRg").innerHTML;
		let psw = document.getElementById("regPassword").value;
		let psw2 = document.getElementById("regPasswordR").value;
		if(cd1 == null || cd1 == "" || cd1 == " "){
			return false;
		}
		if(psw == null || psw == "" || psw == " "){
			return false;
		}
		if(psw != psw2)
		{
			document.getElementById("errorMessageRg").innerHTML="<?=@$TextErrorPasswordWarning?>";
			return false;
		}
		else {
			document.getElementById("errorMessageRg").innerHTML="";
		}
		if(err == null || err == ""){
			document.getElementById("changeForm").submit();
		}
	}
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