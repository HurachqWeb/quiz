<?php 

$params=array("from"=>"REALMADRID.am","to"=>"37433839833","text"=>"Testig message","channel"=>"sms");

@$apiKey="edc8fc545016a4fa210dbecf2d5e07ca";
$headers = array('X-Dexatel-Key' => @$apiKey,'Content-Type' => 'application/json');
$url="https://api.dexatel.com/v1/templates";
$data ='?name=verification&text=Hi, your verification code is {code}&channel=SMS';


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

	@$phone='37433839833';
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
    echo @$activatioCode;
?>

