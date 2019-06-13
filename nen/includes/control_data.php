<?php
$conn = connectToBd();

$error_reg="";
$error_2="Nepareizi ievadīti dati. Lūdzu, izdariet labojumus un ievadiet datus vēlreiz";

$rEmail	= sql_quote(trim($_POST['rEmail']));$rEmail = htmlspecialchars(stripslashes($rEmail));
$error_email = "";
$err3 = "nav aizpildīts";
$err4 = "ir nepieļaujams formāts";
$err13= "tāds 'Logins' jau eksistē!";

$rPass	= sql_quote(trim($_POST['rPass']));$rPass = htmlspecialchars(stripslashes($rPass));
$rPass2	= sql_quote(trim($_POST['rPass2']));$rPass2 = htmlspecialchars(stripslashes($rPass2));
$error_password = "";
$err5 = "nav aizpildīts";
$err6 = "'Parole'-'Atkārtot paroli' nesakrit";
$err7 = "ir nepieļaujamie simboli";

$rNosauk= sql_quote(trim($_POST['rNosauk']));$rNosauk = htmlspecialchars(stripslashes($rNosauk));

$rPvn	= sql_quote(trim($_POST['rPvn']));$rPvn = htmlspecialchars(stripslashes($rPvn));
$rReg	= sql_quote(trim($_POST['rReg']));$rReg = htmlspecialchars(stripslashes($rReg));
$rJuradr= sql_quote(trim($_POST['rJuradr']));$rJuradr = htmlspecialchars(stripslashes($rJuradr));
$rPieadr= sql_quote(trim($_POST['rPieadr']));$rPieadr = htmlspecialchars(stripslashes($rPieadr));
$rBnos  = sql_quote(trim($_POST['rBnos']));$rBnos = htmlspecialchars(stripslashes($rBnos));
$rBkod	= sql_quote(trim($_POST['rBkod']));$rBkod = htmlspecialchars(stripslashes($rBkod));
$rBkon	= sql_quote(trim($_POST['rBkon']));$rBkon = htmlspecialchars(stripslashes($rBkon));

$rVards	= sql_quote(trim($_POST['rVards']));$rVards = htmlspecialchars(stripslashes($rVards));
$error_vards = "";
$err14 = "nav aizpildīts";

$rTal	= sql_quote(trim($_POST['rTal']));$rTal = htmlspecialchars(stripslashes($rTal));
$error_telefon = "";
$err9 = "nav aizpildīts";
$err10 = "ir nepieļaujamie simboli";

$rFakss	= sql_quote(trim($_POST['rFakss']));$rFakss = htmlspecialchars(stripslashes($rFakss));

// Проверяем e-mail на корректность
if ($rEmail == '')
{
	$action_reg = '';$error_email = $err3;
}
elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $rEmail))
{
	$action_reg = '';$error_email = $err4;
}
$rEmail = htmlspecialchars(stripslashes($rEmail));
if (empty($error_email))
{
	$query_login 	= "select id_klient from a4plus_klient where epast='$rEmail'";
	$result_login = mysql_query($query_login);
	if ($result_login == FALSE){print "ошибка при обращении к таблице покупателей"; exit;}
	IF (mysql_num_rows($result_login)!=0)
	{
		$action_reg = '';$error_email = $err13;
	}
}
// Проверяем пароль на корректность
if ($rPass == '' || $rPass2 == '')
{
	$action_reg = '';$error_password =$err5;
}
elseif($rPass !== $rPass2)
{
	$action_reg = '';$error_password =$err6;

}
elseif(!preg_match("/^\w{3,}$/", $rPass))
{
	$action_reg = '';$error_password =$err7;

}
$rPass = htmlspecialchars(stripslashes($rPass));
// Проверяем Vards на корректность
if ($rVards == '')
{
	$action_reg = '';$error_vards = $err14;
}
$rVards = htmlspecialchars(stripslashes($rVards));
// Телефон не пустой и без спец.символов
if ($rTal == '')
{
	$action_reg = '';$error_telefon =$err9;
}
//elseif (!preg_match("/^\w{3,}$/", $rTal))
//{
//	$action_reg = '';$error_telefon =$err10;
//}
$rTal = htmlspecialchars(stripslashes($rTal));


if ($error_email != '' || $error_telefon != '' || $error_password != '' || $error_vards != '')
{	$error_reg = $error_2;
}


if (empty($error_reg))
{
	$time = date("Ymd");
	$ip_apmek=define_ip();
	$query_ins = "INSERT INTO a4plus_klient (
 	epast,passw,nosaukums,pvn,reg,juradr,pieadr,banka_nosauk,banka_kods,banka_konta,vards,talr,fakss,ip,timestamp)
		VALUES (
	'$rEmail','$rPass','$rNosauk','$rPvn','$rReg','$rJuradr','$rPieadr','$rBnos','$rBkod','$rBkon','$rVards','$rTal','$rFakss','$ip_apmek','$time'
				)";
//echo $query_ins;

	$result_ins = mysql_query($query_ins);
	if ($result_ins == FALSE){print "ошибка при обращении к таблице userов"; exit;}



	$query = "SELECT * FROM a4plus_klient WHERE epast = '$rEmail' AND passw = '$rPass'";
	$result = mysql_query($query);
	if ($result == FALSE){print "Ошибка при коннекте к БД - выбор пользователя (reg)"; exit;}
	$pp = mysql_fetch_array($result);
	$id_pokupatel = $pp['id_klient'];

	$rName 		= $pp['epast'];
	$rLogin = explode("@", $rName);
	$_SESSION['pokupatel']=$rLogin[0];
	$_SESSION['id_pokupatel']=$id_pokupatel;

$text_mes1 = "Paldies , ka izvēlējaties mūsu veikalu!";
$text_mes2 = "Jūsu logins (e-mails):";
$text_mes3 = "Parole :";
$iEmail	= "E-mails*:";
$iPass 	= "Parole*:";
$iPass2	= "Atkartojiet paroli*:";

$iNosauk= "Nosaukums:";
$iPvn	= "PVN maksataja numurs:";
$iReg	= "Registracijas numurs:";
$iJuradr= "Juridiska adrese:";
$iPieadr= "Piegades adrese:";

$iBnos	= "Bankas nosaukums:";
$iBkod	= "Bankas kods:";
$iBkon	= "Bankas konta numurs:";

$iVards	= "Vards, uzvards*:";
$iTal	= "Talrunis*:";
$iFakss	= "Fakss:";

$text_tit6 = "Lūdzu pārbaudiet Jūsu kontakta datus un kļūdas gadījumā sazināties ar mums.";

$text_tit7 	= "Ar cieņu";
$text_tit8	="SIA A4 plus";
$text_tit9	="tāl.20221910";



$tt				=		'A4 plus - e-veikals';
$additional_headers = 'Content-type: text/html; charset=UTF-8'."\r\n";
$email			=		$rEmail;
//$email			=		$rEmail;
$text_message	=  		 $text_mes1.'<br>'
						.$text_mes2.$rEmail.'<br>'
						.$iPass.$rPass.'<br>'
						.$iNosauk.$rNosauk.'<br>'
						.$iPvn.$rPvn.'<br>'
						.$iReg.$rReg.'<br>'
						.$iJuradr.$rJuradr.'<br>'
						.$iPieadr.$rPieadr.'<br>'
						.$iBnos.$rBnos.'<br>'
						.$iBkod.$rBkod.'<br>'
						.$iBkon.$rBkon.'<br>'
						.$iVards.$rVards.'<br>'
						.$iTal.$rTal.'<br>'
						.$iFakss.$rFakss.'<br><br>'
						.$text_tit6.'<br>'
						.$text_tit7.'<br>'
						.$text_tit8.'<br>'
						.$text_tit9.'<br>';
//echo $text_message;
mail ($email,$tt,$text_message,$additional_headers);

}


?>
