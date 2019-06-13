<?php
$conn = connectToBd();

$error_reg		="";
$error_vards = "";
$err14 = "nav aizpildīts";
$error_telefon = "";
$err9 = "nav aizpildīts";
$err10 = "ir nepieļaujamie simboli";


$error_2="Nepareizi ievadīti dati. Lūdzu, izdariet labojumus un ievadiet datus vēlreiz";
$id_klient = $_SESSION['id_pokupatel'];
$rEmail	= $_POST['rEmail'];

$rNosauk= sql_quote(trim($_POST['rNosauk']));$rNosauk = htmlspecialchars(stripslashes($rNosauk));
$rJuradr= sql_quote(trim($_POST['rJuradr']));$rJuradr = htmlspecialchars(stripslashes($rJuradr));
$rPieadr= sql_quote(trim($_POST['rPieadr']));$rPieadr = htmlspecialchars(stripslashes($rPieadr));
$rBnos  = sql_quote(trim($_POST['rBnos']));$rBnos = htmlspecialchars(stripslashes($rBnos));
$rBkon	= sql_quote(trim($_POST['rBkon']));$rBkon = htmlspecialchars(stripslashes($rBkon));
$rVards	= sql_quote(trim($_POST['rVards']));$rVards = htmlspecialchars(stripslashes($rVards));
$rTal	= sql_quote(trim($_POST['rTal']));$rTal = htmlspecialchars(stripslashes($rTal));
$rFakss	= sql_quote(trim($_POST['rFakss']));$rFakss = htmlspecialchars(stripslashes($rFakss));

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
$rTal = htmlspecialchars(stripslashes($rTal));
if ($error_telefon != '' || $error_vards != '')
{	$error_reg = $error_2;
}

//echo $error_reg;
if (empty($error_reg))
{

	$time = date("Ymd");
	$ip_apmek=define_ip();
$id_klient = $_SESSION['id_pokupatel'];
	$query_ins 	= "UPDATE a4plus_klient SET
				nosaukums='$rNosauk',
				juradr='$rJuradr',
				pieadr='$rPieadr',
				banka_nosauk='$rBnos',
				banka_konta='$rBkon',
				vards='$rVards',
				talr='$rTal',
				fakss='$rFakss',
				ip='$ip_apmek',
				timestamp='$time'
				 WHERE id_klient = $id_klient";


	$result_ins = mysql_query($query_ins);
	if ($result_ins == FALSE){print "ошибка при обращении к таблице userов"; exit;}


$text_mes1 = "Paldies , ka izvēlējaties mūsu veikalu!";
$text_mes2 = "Jūsu logins (e-mails):";
$text_mes3 = "Parole :";
$iEmail	= "E-mails*:";
$iPass 	= "Parole*:";
$iPass2	= "Atkartojiet paroli*:";

$iNosauk= "Nosaukums:";
$iPvn	= "PVN maksataja numurs:";
$iJuradr= "Juridiska adrese:";
$iPieadr= "Piegades adrese:";

$iBnos	= "Bankas nosaukums:";
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
$text_message	=  		 $text_mes1.'<br>'
						.$iNosauk.$rNosauk.'<br>'
						.$iPvn.$rPvn.'<br>'
						.$iJuradr.$rJuradr.'<br>'
						.$iPieadr.$rPieadr.'<br>'
						.$iBnos.$rBnos.'<br>'
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
