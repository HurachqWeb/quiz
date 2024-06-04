<?php 
include "config.php";

@$del1="DELETE FROM winners where quiz_id='".@$_GET['id']."'";
@$del2="DELETE FROM LEADERBOARD where quiz_id='".@$_GET['id']."'";
mysqli_query($db,$del1);
mysqli_query($db,$del2);

@$qr = "select user_id from winners";
@$rs = mysqli_query($db,$qr);
@$kl = mysqli_num_rows($rs);

@$adit_query_winner = "";
for($i=1;$i<=$kl;$i++)
{
	@$rw=mysqli_fetch_array($rs);

	if($i==1){
		@$adit_query_winner .= "where quiz_id='".@$_GET['id']."' and user_id != '".@$rw['user_id']."'";
	}
	else
	{
		@$adit_query_winner .= " and quiz_id='".@$_GET['id']."' and user_id != '".@$rw['user_id']."'";
	}
}

@$qr_1 = "select * from quizes_answers ".@$adit_query_winner." order by points desc, start_sec asc, mil_secs asc, added asc";
@$rs_1 = mysqli_query(@$db,@$qr_1);
@$kl_1 = mysqli_num_rows($rs_1);

@$winner_peoples = "";
for($i=1;$i<=$kl_1;$i++){
	@$rw_1 = mysqli_fetch_array($rs_1);

	if($rw_1['age'] >= 21){
		@$winner_peoples .= @$rw_1['user_id'].",";
	}
}
@$winner = explode(',', @$winner_peoples);


@$qr_winner = "insert into winners values(null,'".@$_GET['id']."','".@$winner[0]."','".@$rw_geting_result['added']."')";
mysqli_query($db,$qr_winner);

@$qr_geting_result = "select * from quizes_answers where user_id ='".@$winner[0]."' and quiz_id='".@$_GET['id']."'  order by points desc, start_sec asc, mil_secs asc, added asc"; 
echo @$qr_geting_result;
@$rs_geting_result = mysqli_query($db,$qr_geting_result);
@$rw_geting_result = mysqli_fetch_array($rs_geting_result);

@$qr_liderboard_w = "insert into LEADERBOARD VALUES(null,'".@$_GET['id']."','".@$winner[0]."','1','".@$rw_geting_result['points']."','".@$rw_geting_result['start_sec']."','".@$rw_geting_result['mil_secs']."','winner','".@$rw_geting_result['added']."')";
mysqli_query($db,@$qr_liderboard_w);

/*


getinig from 2 to 16 positions



*/


@$qr1 = "select user_id from LEADERBOARD where position >= '2' and position <= '16' ";
@$rs1 = mysqli_query($db,$qr1);
@$kl1 = mysqli_num_rows($rs1);
@$add_16 = "";
for($i=1;$i<=$kl1;$i++)
{
	@$rw1=mysqli_fetch_array($rs1);
	@$add_16 .= " and quiz_id='".@$_GET['id']."' and user_id != '".@$rw1['user_id']."'";
}

if(@$adit_query_winner){
@$qr_geting_result = "select * from quizes_answers ".@$adit_query_winner." ".@$add_16." and user_id !='".@$winner[0]."' and quiz_id='".@$_GET['id']."' order by points desc, start_sec asc, mil_secs asc, added asc limit 15"; }
else{
	@$qr_geting_result = "select * from quizes_answers where user_id !='".@$winner[0]."' and quiz_id='".@$_GET['id']."'  order by points desc, start_sec asc, mil_secs asc, added asc"; 
}
@$rs_geting_result = mysqli_query($db,$qr_geting_result);
@$kl_geting_result = mysqli_num_rows($rs_geting_result);
for($d=1;$d<=$kl_geting_result;$d++){
	@$ps=$d+1;
	if($ps <= 16){
		@$prizer="yes";
	}else{
		@$prizer="no";
	}
@$rw_geting_result = mysqli_fetch_array($rs_geting_result);
@$qr_liderboard_p = "insert into LEADERBOARD VALUES(null,'".@$_GET['id']."','".@$rw_geting_result['user_id']."','".@$ps."','".@$rw_geting_result['points']."','".@$rw_geting_result['start_sec']."','".@$rw_geting_result['mil_secs']."','".@$prizer."','".@$rw_geting_result['added']."')";
		mysqli_query($db,@$qr_liderboard_p);
}

@$qr_all_res = "select * from quizes_answers where quiz_id='".@$_GET['id']."' order by points desc, start_sec asc, mil_secs asc, added asc";
@$rs_all_res = mysqli_query($db,$qr_all_res);
@$kl_all_res = mysqli_num_rows($rs_all_res);
for($t=1;$t<=$kl_all_res;$t++){
	@$rw_all_res = 	mysqli_fetch_array($rs_all_res);
	@$qr_ldboard = "select user_id from LEADERBOARD where quiz_id='".@$_GET['id']."' and user_id='".@$rw_all_res['user_id']."'";
	@$rs_ldboard = mysqli_query($db,$qr_ldboard);
	@$kl_ldboard = mysqli_num_rows($rs_ldboard);

	@$qr_get_position = "select position from LEADERBOARD where quiz_id='".@$_GET['id']."' order by position desc";
	@$rs_get_position = mysqli_query($db,$qr_get_position);
	@$rw_get_position = mysqli_fetch_array($rs_get_position);
	@$ps = @$rw_get_position['position']+1;

	if(@$kl_ldboard == 0){
		@$qr_liderboard_p = "insert into LEADERBOARD VALUES(null,'".@$_GET['id']."','".@$rw_all_res['user_id']."','".@$ps."','".@$rw_all_res['points']."','".@$rw_all_res['start_sec']."','".@$rw_all_res['mil_secs']."','no','".@$rw_all_res['added']."')";
		mysqli_query($db,@$qr_liderboard_p);
	}
}

?>