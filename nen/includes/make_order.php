<?
$text_tit0 = "Jūsu pasūtījums";
$text_tit1="Paldies, ";
$text_tit2="Paldies, ka izvēlējāties mūsu veikalu.";
$text_tit3="Jūsu pasūtījuma numurs: ";
$text_tit4=" ";
$text_tit11="Jūsu komentārs:";
$shap_1="nn";
$shap_2="preces nosaukums";
$shap_3="cena";
$shap_4="daudzums";
$shap_5="summa";
$shap_0="Kopā:";
//$text_tit5="Ja viss ir pareizi, mūsu meneržeris piezvanīs jums tuvākajā laikā. ";
$text_mess_order = "Jūs saņemsiet uz e-pastu apstiprinājumu par pasūtījuma saņemšanu.";
$text_tit5="
Pēc informācijas apstrādes, Jūs saņemsiet uz e-pastu apstiprināšanai pasūtījuma kopiju.";

$text_tit6="Lūdzu pārbaudiet Jūsu kontakta datus un kļūdas gadījumā sazināties ar mums.";
$mess_session="Noformēt pasūtījumu<br>
Grozs ir tukšs. Jūsu pasūtījums jau ir pieņemts izpildīšanai. <br>
Informācija par to ir nosūtīta uz Jūsu e-pastu. <br>
Best Regards, <br>
SIA 'A4 plus' <br>";


$text_tit7 	="Best Regards,";
$text_tit8	="SIA 'A4 plus'";
$text_tit9	="tel./fax: 67 613 541";
$text_tit10	="mob.: 20 22 19 10";
$text_tit11	="Riga, Ranka dambis 9";
$text_tit12 ="<a href='www.a4plus.lv'>www.a4plus.lv</a><br><a href='www.shinystamp.lv'>www.shinystamp.lv</a>";

$conn = connectToBd();
$query = "SELECT * FROM shiny_text WHERE id_razdel = '3'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе KONTAKT"; exit;}
$p = mysql_fetch_array($result);
$text_adress 	= trim($p['content_sm']);

echo '<table width="980" border="0" cellpadding="0" cellspacing="0">';
echo 	'<tr>';
echo 		'<td height="200" width="10" align="left" valign="top">&nbsp;</td>';
// ячейка левого меню
echo 		'<td width="180" align="left" valign="top">';
echo 			'<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D0EC97">';
echo				'<tr>';
echo 					'<td width="180" height="35" align="left" valign="top" class="leftmenutable">';
echo '&nbsp;';
echo 					'</td>';
echo 				'</tr>';
echo				'<tr>';
echo 					'<td width="180" align="center" valign="top">';
echo 						'<table width="174" border="0" cellpadding="0" cellspacing="0" bgcolor="#D0EC97">';
echo							'<tr>';
echo 								'<td width="174" align="left" valign="top">';
?>
<div class="roundcont">
	<div class="roundtop">
		<img src="images/tl.jpg" alt="" width="15" height="15" class="corner" style="display: none" />
	</div>
	<p>
<?
	echo '<span class="textkon">'.$text_adress.'</span>';
?>
	</p>
	<div class="roundbottom">
		<img src="images/bl.jpg" alt="" width="15" height="15" class="corner" style="display: none" />
	</div>
</div>
<?
echo 								'</td>';
echo 							'</tr>';

echo 						'</table>';
echo 					'</td>';
echo 				'</tr>';
echo 	'<tr><td height="7"><img src="images/empty.gif" alt = "" width="3" height="7" align="top" border="0"></td></tr>';

echo 			'</table>';
echo 		'</td>';
/////////////////////////////////////////////
echo 		'<td width="10" align="left" valign="top">&nbsp;';
echo 		'</td>';
echo 		'<td width="765" align="left" valign="top">';
/////////////////////////////////////////////
$id_login = $_SESSION['id_pokupatel'];
if (!empty($id_login))
{
	$content = $_SESSION['content'];
	if (!empty($content)) $nn=1; else 	$nn=0;

	$query = "SELECT * FROM a4plus_klient WHERE id_klient = ".$id_login;
	$result = mysql_query($query);
	if ($result == FALSE){print "Ошибка при коннекте к БД - userov (order)"; exit;}
	$p 			= mysql_fetch_array($result);
	$tel 		= trim($p['talr']);
	$email 		= trim($p['epast']);
	$nosaukums 	= trim($p['nosaukums']);
	$vards		= trim($p['vards']);

	$putdate=date('Y-m-d');

	$rName 		= $email;
	$rLogin = explode("@", $rName);

	$name_pokupatel =$rLogin[0];
	if (!empty($nosaukums)) $name_pokupatel=$nosaukums;
	if (!empty($vards)) 	$name_pokupatel=$vards;

	$text_message="";
//
// присвоение нового номера заказа
//
	$number_ord='aaa';$x==0;
	while ($x==0)
	{
		$cis 		= mt_rand(100,999);
		$dateor		= date('ymd');
		$idlogin 	= $name_pokupatel;
		$number_ord = $dateor.'_'.$idlogin.'_'.$cis;
		$query = "SELECT * FROM a4plus_order WHERE number_order = '".$number_ord."'";
//echo $query.'<br>';
		$result = mysql_query($query);
		if ($result == FALSE){print "Ошибка при коннекте к БД - проверка номера заказа"; exit;}
		$kol = mysql_num_rows($result);
		if ($kol ==0) $x=1;
	}
// приветствие покупателю
	echo '<table width="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0">';
	echo 	'<tr><td colspan=5 align="center">';
	echo			'<span class="text_thanks">'.$text_tit2.'</span>';
	echo		'</td>';
	echo 	'</TR>';
	$text_message.=$text_tit2."<br>";

	echo 	'<tr><td colspan=5 height=20 align="center">&nbsp;</td></tr>';
	echo 	'<tr><td colspan=5 align="center">';
	echo 	'<span class="text_vazno">'.$text_tit0.'</span>';
	echo 	'</td></tr>';
/////////////////////////////////////////////////////////
// если корзина не пустая - печатаем шапку и строчки
/////////////////////////////////////////////////////////
	if (isset($_SESSION['basket']) && !empty($_SESSION['basket']))
	{

		echo 	'<tr><td colspan=5 height=20 align="center">&nbsp;</td></tr>';
		echo '<tr>';
		echo 	'<td rowspan=2 width="12%" align="center" class="tabletovar">Kods</td>';
		echo 	'<td rowspan=2 width="65%" align="center" class="tabletovar">Nosaukums</td>';
?>
				<td rowspan=2  width="5%" align="center" class="tabletovar">Skaits</td>
				<td width="18%" colspan=2 align="center" class="tabletovar"> cena Euro ar PVN</td>
			</tr>
			<tr>
				<td width="9%" align="center" class="tabletovar">1gab. </td>
				<td width="9%" align="center" class="tabletovar">Summa</td>
			</tr>
<?
		$kop_summa	=0;$kop_val	=0;
		foreach($_SESSION['basket'] as $id_tovar=>$val)
		{
			if ($val!=0 and $id_tovar!=0)
			{
				$nn++;
				$query = "SELECT * FROM a4plus_tovar WHERE ref = ".$id_tovar;
//echo $query;
// определяем цену товара
				$result = mysql_query($query);
				if ($result == FALSE){print "Ошибка при коннекте к БД - выбор товара (order)"; exit;}
				$kol 		= mysql_num_rows($result);
				$p 			= mysql_fetch_array($result);
				$name_tovar	= trim($p['name_tovar']);
				$kod_tovar 	= trim($p['kod_tovar']);
				$cena		= $p['cena2'];

			    $summa		=$val*$cena;
			    $kop_summa +=$summa;
			    $kop_val +=$val;

				$query_order_tovar = "INSERT INTO a4plus_order_tovar (
							number_order,
							id_klient,
							ref,
							newcena,
							kolvo)
							VALUES (
							'$number_ord',
							'$id_login',
							'$id_tovar',
							'$cena',
							'$val')";
				$result_order_tovar = mysql_query($query_order_tovar);
				if ($result_order_tovar == FALSE){print "Ошибка при коннекте к БД - запись товара (order)"; exit;}

//echo $query_order_tovar;
				echo '<TR>';
				echo 	'<td align="left" class="bott_kat" >';
				echo 		'<span class="tovarcat">'.$kod_tovar.'</span>';
				echo 	'</td>';
				echo 	'<td align="left" class="bott_kat" >';
				echo 		'<span class="tovarcat">'.$name_tovar.'</span>';
				echo 	'</td>';
				echo 	'<td align="left" class="bott_kat" >';
				echo 		'<span class="tovarcat">'.$val.'</span>';
				echo 	'</td>';
				echo 	'<td align="right" class="bott_kat" >';
				echo 		'<span class="tovarcat">'.number_format($cena, 2, '.', '').'</span>';
				echo 	'</td>';
				echo 	'<td align="right" class="bott_kat" >';
				echo 		'<span class="tovarcat">'.number_format($summa, 2, '.', '').'</span>';
				echo 	'</td>';
				echo '</tr>';

		 	}
		}
	}
	if ($nn!=0)
	{
		$query_order = "INSERT INTO a4plus_order (
							number_order,
							id_klient,
							putdate,
							statusik,
							archive,
							prim,
							summa)
							VALUES (
							'$number_ord',
							'$id_login',
							'$putdate',
							0,
							0,
							'$content',
							'$kop_summa')";
//echo $query_order;
		$result_order = mysql_query($query_order);
		if ($result_order == FALSE){print "Ошибка при коннекте к БД - запись заказа (order)"; exit;}

		if ($kop_summa!=0)
		{

			echo 				'<TR>';
			echo 					'<td colspan=2 align="right">';
			echo 						'<span class="tovarrp"><strong>'.$shap_0.'</span>';
			echo 					'</td>';
			echo 					'<td colspan=2>&nbsp;</td>';
			echo 					'<td  align="right">';
			echo				 		'<span class="tovarrp_kopa_order">';
			echo					 		'<strong>'.number_format($kop_summa, 2, '.', '').'</strong>';
			echo				 		'</span>';
			echo 					'</td>';
			echo 				'</tr>';
		}
		echo 				'<tr><td colspan=5 height=20 align="center">&nbsp;</td></tr>';
		echo 				'<TR>';
		echo 					'<td colspan=5 align="left">';
		echo 						'<span class="tovarrp">'.$text_tit11.'</span>';
		echo 					'</td>';
		echo 				'</TR>';
		echo 				'<TR>';
		echo 					'<td colspan=5 align="left">';
		echo 						'<span class="textreg">'.$content.'</span><br>';
		echo 					'</td>';
		echo 				'</TR>';
		echo 				'<tr><td colspan=5 height=10 align="center">&nbsp;</td></tr>';
		echo 				'<tr><td  colspan="5" class="tabletovar" height="10">&nbsp;</td></tr>';
		echo 				'<tr><td colspan=5 height=10 align="center">&nbsp;</td></tr>';
		echo 				'<TR>';
		echo 					'<td colspan=5 align="left">';
		echo 						'<span class="tovarrp">'.$text_mess_order.'</span>';
		echo 					'</td>';
		echo 				'</TR>';
		echo 				'<TR>';
		echo 					'<td colspan=5 align="left">';
		echo 						'<span class="tovarrp">';
		echo 							$text_tit8;
		echo 						'</span>
								</td>';
		echo 				'</TR>';

// низ письма
		$text_message.= $text_tit5."<br><br>";
		$text_message.= $text_tit7."<br>";
		$text_message.= $text_tit8."<br>";
		$text_message.= $text_tit9."<br>";
		$text_message.= $text_tit10."<br>";
		$text_message.= $text_tit11."<br>";
		$text_message.= $text_tit12."<br>";
//////////////////////////////////////////////////
// отсылка письма и запись в базу
		$additional_headers = 'Content-type: text/html; charset=UTF-8'."\r\n";

		$tt			= 'A4 plus internetveikalu';
		$email=$email;
//$email		= 'nata@mailbox.riga.lv';
		mail ($email,$tt,$text_message,$additional_headers);

		$tt_admin 	= 'internetveikalu: info for manager';
		$text_admin	= $putdate." - Prinjat zakaz na summu:".$kop_summa."Euro";
//mail ('nata@mailbox.riga.lv;ros@latnet.lv',$tt_admin,$text_admin,$additional_headers);

		if ($kop_val!=0)
		{// отправляем письмо для канц.товаров
			mail ('veikals@A4plus.lv',$tt_admin,$text_admin,$additional_headers);		}
		else
		{// отправляем письмо для штампиков
			mail ('info@A4plus.lv',$tt_admin,$text_admin,$additional_headers);
		}
		unset($_SESSION['basket']);
		unset($_SESSION['content']);
	}
	else
	{
		echo '<tr>';
		echo	'<td colspan=5 align = "center">';
		echo		'<span class="leftmenu_act">'.$mess_session.'</span>';
		echo	'</td>';
		echo '</tr>';
	}
	echo '</table>';
}
echo		'</td>';
echo 		'<td width="10" align="left" valign="top">';
echo 		'</td>';
echo	'</tr>';
echo '</table>';
?>
