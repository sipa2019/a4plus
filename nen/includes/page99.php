<?
$conn = connectToBd();
$text_forgot = "Uzrakstiet e-pasta adresi, kuru Jūs norādījāt reģistrējoties. <br>
Mēs Jums nosūtīsim paroli.";
$text_message = "Jūsu parole ieejai internetveikalā: ";
$send_mail = " Nosūtīt ";
$text_soob = "Uz Jūsu e-pastu nosūtīta parole.";
$text_error = "Nav atrasts lietotājs ar šādu e-pastu";

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

echo 		'<td width="765" align="left" valign="middle" height="200">';

echo 			'<TABLE width="765" border="0" cellpadding="0" cellspacing="0">';
////////////////////////////////////////////////////////
//////////////////// вход        ///////////////////////
////////////////////////////////////////////////////////
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	$error_ent="";

	$email = substr($_POST["rEmail"],0,100);
	$email = htmlspecialchars(stripslashes($email));

	$query = "SELECT * FROM a4plus_klient WHERE epast = '$email'";
	$result = mysql_query($query);
	if ($result == FALSE){print "Ошибка при коннекте к БД - выбор пользователя (auth)"; exit;}
	$kol = mysql_num_rows($result);

	IF ($kol==0)
	{
		$error_ent="error";
	}
	else
	{
		$pp = mysql_fetch_array($result);
		$passw 		= $pp['passw'];

// отсылка письма и запись в базу
		$additional_headers = 'Content-type: text/html; charset=UTF-8'."\r\n";
		$tt			= 'A4 plus internetveikalu';
		$email=$email;
		$text_message .= $passw;
//$email		= 'nata@mailbox.riga.lv';
		mail ($email,$tt,$text_message,$additional_headers);	}
}
if ($_SERVER['REQUEST_METHOD'] != 'POST' || $error_ent =="error")
{	if ($error_ent=="error") $error_1=$text_error; else $error_1="";
?><form action="tpl_a4.php?page=99" method="post">
		<tr>
			<td width=50 height="20">&nbsp;</td>
			<td width="665" align="center"><span class="text_error"><? echo $error_1; ?></span></td>
			<td width=50>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="center"><span class="textreg"><? echo $text_forgot; ?></span></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="center"><span class="textreg"><? echo $iEmail; ?></span>&nbsp;&nbsp;&nbsp;
				<input type="text" name="rEmail" value="<?php echo $_POST['rEmail']; ?>" size="30" maxlength="30" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" width=765 height="20">&nbsp;</td>
		</tr>
		<tr>
			<td width=50 height="20">&nbsp;</td>
			<td align="center">
				<input type="submit" name="ok" value="<? echo $send_mail; ?>" />
			</td>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td colspan="3" width=765 height="20">&nbsp;</td>
		</tr>
</form>
<?
}
else
{?>
		<tr>
			<td width=50 height="20">&nbsp;</td>
			<td width="665" align="center"><span class="navigation_akt"><? echo $text_soob; ?></span></td>
			<td width=50>&nbsp;</td>
		</tr>
<?}
echo 		'</table>';
echo		'</td>';
echo 		'<td width="10" align="left" valign="top">';
echo 		'</td>';
echo	'</tr>';
echo '</table>';