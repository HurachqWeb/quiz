<?php 
@session_start();
include "config.php";
include "inc/head.php";
include "inc/javascript.php";
?>
<div id="signupPopUp" class="signupPopUp" style="display:block">
	<div id="regiLine" class="regiLine">
		<div class="loginBarTitle">ԳԱՂՏՆԱԲԱՌԻ ՎԵՐԱԿԱՆԳՆՈՒՄ</div>
		<form  onsubmit="return resetPassword()" id="restPassForm" action="reset-password-next.php" method="POST">
			<center>
			<input type="text" name="email_phone" id="email_phone" class="loginInputs" placeholder="Հեռ. կամ Էլ-փոստ" maxlength="32" onkeyup="checkValue(this.value)">
			<p style="font-size:11px;color:green">Հեռախոսահամարը պետք է լինի հետևյալ ձևաչափով, եթե Ձեր համարն է՝ 099123456, ապա անհրաժեշտ է լրցանել՝ 99123456</p>
			<div id="errorMessageRg" class="errorMessage"></div>
			<button id="regButton" class="regButton" onclick="resetPassword()" >ՎԵՐԱԿԱՆԳՆԵԼ</button>
		</form>
		</center>
	</div>
	<div id="demo"></div>
	<div style="height:40px;width:100%"></div>
</div>
<script type="text/javascript">
	function checkValue(val){
		const http = new XMLHttpRequest();
			let urlThe = "<?=@$domain?>/func/checkingResetVal.php"; 
			var date = "v="+val;           
    		http.open("POST", urlThe,true);
    		http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    		http.send(date);
    		http.onload = () => document.getElementById("errorMessageRg").innerHTML=http.responseText;
	}
</script>
<script type="text/javascript">
	function resetPassword(){
		var string = document.getElementById("email_phone").value;
		if(string == null || string =="" || string ==" "){
			return false;
		}
		else {
			var st = document.getElementById("errorMessageRg").innerHTML;
			if(st == null || st==""){
				document.getElementById("restPassForm").submit();
			}
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