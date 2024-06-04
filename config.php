<?php

@$hour=date('H');
@$minutes=date('i');
@$secconds=date('s');
@$day=date('d');
@$month=date('m');
@$year=date('Y');
$time=mktime($hour +4,$minutes,$secconds,$month,$day,$year);
$time_one_month_ago=mktime($hour +4,$minutes,$secconds,$month-1,$day,$year);
$now_time=date('H:i:s', $time);
$now_month=date('d.m.Y', $time);


@$art_status_list = array('in-write' => 'Still writing','completed' => 'Completed');

 function timerStop($secondCount){
  @$minute = floor($secondCount/60);
  if(@$minute < 10)
  {
    @$minute_echo = "0".@$minute;
  }else{
    @$minute_echo = @$minute;
  } 
   
  @$second = $secondCount-(@$minute*60);
  if(@$second <= 0)
  {
    @$second_echo = "00";
  }
  else{
    if(@$second < 10){
      @$second_echo = "0".@$second;
    }else{
      @$second_echo = @$second;
    }
  }
  return $minute_echo.":".$second_echo;
}

function dataPrint($date){
  @$newDate = explode(' ', $date);
  @$date =  explode('-',@$newDate[0]);
  @$day = $date[2];
  @$months = array('01'=>"հունվար",'02'=>"փետրվար",'03'=>"մարտ",'04'=>"ապրիլ",'05'=>"մայիս",'06'=>"հունիս",'07'=>"հուլիս",'08'=>"օգոստոս",'09'=>"սեպտեմբեր",'10'=>"հոկտեմբեր",'11'=>"նոյեմբեր",'12'=>"դեկտեմբեր");
  @$month = $date[1];
  @$result ='';

  @$result .= $day." ".@$months[@$month]." - ".$newDate[1];

  return $result;
}


@$text_yes="այո";
@$text_no="ոչ";
@$question_visa="Ունե՞ք Իսպանիայի մուտքի վիզա";
@$text_login_bar_title = "Հաղթի՛ր սիրելի թիմիդ խաղին ներկա գտնվելու ուղևորություն կամ այլ մրցանակներ";
@$text_login_text = "ՄՈՒՏՔ";
@$text_username = "Մուտքագրեք մուտքանունը";
@$text_password_now = "Նշեք Գաղտնաբառը";
@$text_signin_now = "Մուտք";
@$text_signup_now = "Գրանցում";
@$text_name = "Անուն";
@$text_lastname = "Ազգանուն";
@$text_password_replay = "Կրկնել Գաղտնաբառը";
@$passwords_rule="Գաղտնաբառը պետք է լինի ոչ պակաս քան՝ 8 նիշը և ոչ ավելին քան՝ 16 նիշը";
@$text_birthday="Ծննդյան տարեթիվը՝ ԱՄ/ՕՐ/ՏԱՐԻ";
@$username_rule="Մուտքանունը չպետք է լինի՝ 4 նիշից պակաս";
@$phone_rule="Հեռախոսահամարը պետք է լինի հետևյալ ձևաչափով, եթե Ձեր համարն է՝ 099123456, ապա անհրաժեշտ է լրցանել՝ 99123456";
@$text_username_char_warnings="Մուտքանունը պետք է լինի ոչ պակաս քան 4 նիշը";
@$text_password_char_warnings="Գաղտնաբառը պետք է լինի ոչ պակաս քան 8 նիշը";
@$text_mark_you_phone="Նշեք Ձեր հեռախոսահամարը";
@$text_exist_this_userneme = "Նշված մուտքանունով oգտատեր արդեն գրանցված է";
@$text_exist_this_phone_number = "Նշված հեռախոսահամարով oգտատեր արդեն գրանցված է";
@$TextErrorPasswordWarning="Ձեր կողմից լրացված գաղտնաբառերը չեն համապատասխանում իրար";
@$textNeedMarkAllFields="Անհարժեշտ է լրացնել բոլոր դաշտերը";
@$TextAcceptRegSms="Դուք Ձեր հեռախոսահամարին ստացել եք քառանիշ ակտիվացման կոդ։<br>Խնդրում ենք այն լրացնել համապատասխան դաշտում և հաստատել Ձեր գրանցումը։";
@$textAccept="ՀԱՍՏԱՏԵԼ";
@$textsixcode="Լրացրեք քառանիշ կոդը";
@$IAcceptedRuleText="Ես ծանոթացել եմ կանոնների հետ և սույնով հայտնում եմ իմ համաձայնությունը դրանց։";
@$IAcceptedRuleText2="Համաձայն եմ կոնտակտներիս տրամադրմանը գործընկերներին բուքմեյքերական և/կամ գովազդային արշավների առաջարկներ կատարելու նպատակով։";
@$IAcceptedRuleText3="Համաձայն եմ կոնտակտներիս տրամադրմանը գործընկերներին  գովազդային արշավների առաջարկներ կատարելու նպատակով։";
@$TextErorrActivationCode="Ակտիվացման կոդը սխալ եք նշել";
@$pleaseAcceptRule = "Չեք նշել ձեր համաձայնությունը կանոններին";
@$thankYouForRegistration = "Շնորհակալություն գրանցման համար։";
@$TextRemeberMe="Հիշել մուտքը";
@$TextSignInDetilesIsWrong="Մուտքանունը կամ գաղտնաբառը սխալ է";
@$TextSignInDetilesIsMissing="Մուտքագրեք մուտքանունը և գաղտնաբառը";
@$TextLogOut="Դուրս գալ";
@$myProfile="ԻՄ ՊՐՈՖԱՅԼԸ";


@$finished = "Ժամանակը ավարտված է";
@$text_your_answers = "ՁԵՐ ՊԱՏԱՍԽԱՆՆԵՐԸ";
@$text_profile_edit = "ԱՆՁՆԱԿԱՆ ՏՎՅԱԼՆԵՐԻ ԽՄԲԱԳՐՈԻՄ";
@$text_password_edit = "ԳԱՂՏՆԱԲԱՌԻ ՓՈՓՈԽՈՒՄ";
@$text_login = "Մուտքանուն";
@$text_email = "Էլ-փոստ";
@$text_birthday2="Ծննդյան տարեթիվը";
@$text_phone = "Հեռախոսահամարը";
@$text_email_warn = "Դուք չեք նշել Ձեր էլ-փոստի հասցեն։ Խորհուրդ է տրվում լրացնել այն";
@$text_avatar = "Լուսանկարը";
@$text_save = "ՊԱՀՊԱՆԵԼ";
@$old_password = "Գործող գաղտնաբառը";
@$new_password = "Նոր գաղտնաբառը";
@$repeat_password = "Կրկնել գաղտնաբառը";
@$phone_number_varn = "Հեռախոսահամարը պետք է պարունակի միայն թվեր";
@$password_wrong = "Դուք սխալ եք նշել գործող գաղտնաբառը";
@$passwor_change_finished="Գաղտանաբառը հաջողությամբ փոխարինվել է";
@$text_messages = "ՆԱՄԱԿԱԳՐՈՒԹՅՈՒՆ";
@$text_new_message = "ՆՈՐ ՆԱՄԱԿ";
@$text_no_message = "Դուք չունեք նամակներ";




if(@$_SERVER['HTTP_HOST'] == "localhost" or  @$_SERVER['HTTP_HOST']=="37.252.68.164")
{
  $DB_HOST="localhost";
  $DB_USER="root";
  $DB_PASS="";
  $DB_NAME="quiz";
  @$domain = "http://".@$_SERVER['HTTP_HOST']."/quiz/";
}
if(@$_SERVER['HTTP_HOST'] == "quiz.realmadrid.am"){
  $DB_HOST="localhost";
  $DB_USER="quiz";
  $DB_PASS='Arhr.!1985';
  $DB_NAME="quiz";
  @$domain = "https://".@$_SERVER['HTTP_HOST']."/";
}
if(@$_SERVER['HTTP_HOST'] == "rm-quiz.1x2way.site"){
  $DB_HOST="localhost";
  $DB_USER="vicjjtnm__rmquiz";
  $DB_PASS='Arhr.!1985';
  $DB_NAME="vicjjtnm_rmquiz";
  $domain = "https://".@$_SERVER['HTTP_HOST']."/";
}
@$mailAdmin = "noreply@".@$_SERVER['HTTP_HOST'];

@$db=mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
?>