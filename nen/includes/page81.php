<?
$text_edit		= "Jūs varat rediģēt savu kontaktinformāciju.";
$text_info_edit = "Jūsu ievadītās kontaktinformācijas izmaiņas ir saglabātas (uz Jūsu e-pastu nosūtīta kopija).";
$edit_data 		= "Personiskās informācijas rediģēšana.";
$error_edit		= "Nepareizi ievadīti dati. Lūdzu, izdariet labojumus un ievadiet datus vēlreiz";
$conn = connectToBd();
$query = "SELECT * FROM shiny_text WHERE id_razdel = '3'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе KONTAKT"; exit;}
$p = mysql_fetch_array($result);
$text_adress 	= trim($p['content_sm']);

$id_klient = $_SESSION['id_pokupatel'];





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
echo '<TABLE width="765" border="0" cellpadding="0" cellspacing="0">';
////////////////////////////////////////////////////////
//////////////////// вход        ///////////////////////
////////////////////////////////////////////////////////
echo 	'<TR>';
echo 		'<td height="40" valign="middle" align="left" class="tabletovar">';
echo 			'<span class="textregzag">'.$edit_data.'</span>';
echo 		'</td>';
echo 	'</TR>';

$action_edit = $_POST["action_edit"];
if (!empty($action_edit))
{
// вводил регистрацию - идем на проверку
	include("includes/control_data_edit.php");
}

if (empty($action_edit) || (!empty($action_edit) && (!empty($error_reg))))
{//echo 	'<TR>';
//echo 		'<td valign="middle" align="left">';
//echo 			'<span class="textkon">'.$text_edit.'</span>';
//echo 		'</td>';
//echo 	'</TR>';

	if (!empty($error_reg))
	{
		echo 	'<TR>';
		echo 		'<td valign="middle" align="left" class="rp_0" >';
		echo 			'&nbsp;&nbsp;';
		echo 			'<span class="errzagolovok">'.$error_edit.'</span>';
		echo 		'</td>';
		echo 	'</TR>';
	}
	else
	{
		echo 	'<TR><td height="10">&nbsp;</td></TR>';
$query = "SELECT * FROM a4plus_klient WHERE id_klient = '$id_klient'";
$result = mysql_query($query);if ($result == FALSE){print "Ошибка при коннекте к БД - выбор пользователя (reg)"; exit;}
$pp = mysql_fetch_array($result);
$_POST['rEmail']	= $pp['epast'];
$_POST['rNosauk']	= $pp['nosaukums'];
$_POST['rJuradr']	= $pp['juradr'];
$_POST['rPieadr']	= $pp['pieadr'];
$_POST['rBnos']		= $pp['banka_nosauk'];
$_POST['rBkon']		= $pp['banka_konta'];
$_POST['rVards']	= $pp['vards'];
$_POST['rTal']		= $pp['talr'];
$_POST['rFakss']	= $pp['talr'];

	}
	echo 	'<TR>';
	echo 		'<td height="10">';
	include("includes/page_reg_edit.php");
	echo 		'</td>';
	echo 	'</TR>';
}
else
{		echo 	'<TR>';
		echo 		'<td valign="middle" align="left" class="rp_0" >';
		echo 			'&nbsp;&nbsp;';
		echo 			'<span class="errzagolovok">'.$text_info_edit.'</span>';
		echo 		'</td>';
		echo 	'</TR>';
}


echo 	'<TR>';
echo 		'<td height="10">&nbsp;</td>';
echo	'</TR>';
echo 	'</table>';


/////////////////////////////////////////////////
echo		'</td>';
echo 		'<td width="10" align="left" valign="top">';
echo 		'</td>';
echo	'</tr>';
echo '</table>';


?>


