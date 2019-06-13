<?
$conn = connectToBd();
$query = "SELECT * FROM shiny_text WHERE id_razdel = '3'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе KONTAKT"; exit;}
$p = mysql_fetch_array($result);
$text_adress 	= trim($p['content_sm']);
if(empty($_SESSION['pokupatel']))
// покупатель не авторизировался
{
	$action_enter = $_POST["action_enter"];
	if (!empty($action_enter))
// вводил логин и пароль - идем на проверку
	{
include("includes/control_login.php");
	}
	else
	{
		$action_reg = $_POST["action_reg"];
		if (!empty($action_reg))
		{
// вводил регистрацию - идем на проверку
include("includes/control_data.php");

		}

	}

}

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
<div class="roundcont" >
	<div class="roundtop">
		<img src="images/tl.jpg" alt="" width="15" height="15" class="corner" style="display: none" />
	</div>
	<p>
<?
	echo '<span class="textkon"  >'.$text_adress.'</span>';
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

$text_iet="Ja Jūs jau esiet mūsu veikalā iepircies (-kusies), lūdzu, autorizējieties:
ievadiet savu e-pasta adresi un paroli.<br>
Ja Jūs šiet iepērkaties pirmo reizi, lūdzu, aizpildiet reģistrācijas lapu.";
$text_reg="Laukumi, kuri atzīmēti ar zvaigznīti, aizpildāmi obligāti.";
$error_1="Nepareiza e-adrese vai parole ";

if(empty($_SESSION['pokupatel']))
// покупатель не авторизировался
{
echo '<TABLE width="765" border="0" cellpadding="0" cellspacing="0">';
////////////////////////////////////////////////////////
//////////////////// вход        ///////////////////////
////////////////////////////////////////////////////////
echo 	'<TR>';
echo 		'<td height="40" valign="middle" align="left" class="tabletovar">';
echo 			'<span class="textregzag">Ieiet</span>';
echo 		'</td>';
echo 	'</TR>';
echo 	'<TR>';
echo 		'<td valign="middle" align="left">';
echo 			'<span class="textkon">'.$text_iet.'</span>';
echo 		'</td>';
echo 	'</TR>';

if (!empty($error_ent))
{
echo 	'<TR>';
echo 		'<td valign="middle" align="left" class="tabletovar">';
echo 			'<IMG SRC="images/error.jpg" WIDTH="16" HEIGHT="16" border=0 ALT="" align="middle">&nbsp;&nbsp;';
echo 			'<span class="errzagolovok">'.$error_1.'</span>';
echo 		'</td>';
echo 	'</TR>';
}
else
{
echo 	'<TR>';
echo 		'<td height="10">&nbsp;</td>';
echo	'</TR>';
}
echo 	'<TR>';
echo 		'<td height="10">';
include("includes/page_enter.php");
echo 		'</td>';
echo 	'</TR>';

echo 	'<TR>';
echo 		'<td height="10">&nbsp;</td>';
echo	'</TR>';
////////////////////////////////////////////////////////
//////////////////// регистрация ///////////////////////
////////////////////////////////////////////////////////
echo 	'<TR>';
echo 		'<td height="40" valign="middle" align="left" class="tabletovar">';
echo 			'<span class="textregzag">Reģistrēties </span>';
echo 		'</td>';
echo 	'</TR>';
echo 	'<TR>';
echo 		'<td valign="middle" align="left">';
echo 			'<span class="textkon">&nbsp;&nbsp;&nbsp;'.$text_reg.'</span>';
echo 		'</td>';
echo 	'</TR>';

if (!empty($error_reg))
{
echo 	'<TR>';
echo 		'<td valign="middle" align="left" class="rp_0" >';
echo 			'&nbsp;&nbsp;';
echo 			'<span class="errzagolovok">'.$error_reg.'</span>';
echo 		'</td>';
echo 	'</TR>';
}
else
{
echo 	'<TR>';
echo 		'<td height="10">&nbsp;</td>';
echo	'</TR>';
}
echo 	'<TR>';
echo 		'<td height="10">';
include("includes/page_reg.php");
echo 		'</td>';
echo 	'</TR>';

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
}
else
{
	print "<HTML><HEAD>\n";
	print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=tpl_a4.php?page=7'>\n";
	print "</HEAD></HTML>\n";
	exit();
}
?>


