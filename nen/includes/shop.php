
<?
$conn = connectToBd();
$query = "SELECT * FROM shiny_text WHERE id_razdel = '3'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе KONTAKT"; exit;}
$p = mysql_fetch_array($result);
$text_adress 	= trim($p['content_sm']);


echo '<table width="980" border="0" cellpadding="0" cellspacing="0">';
echo 	'<tr>';
echo 		'<td width="10" align="left" valign="top">&nbsp;</td>';
// €чейка левого меню
echo 		'<td width="180" align="left" valign="top">';
echo 			'<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#D0EC97">';
echo				'<tr>';
echo 					'<td width="180" align="left" valign="top" class="leftmenutable">';

include("includes/shop_leftmenu.php");
echo '<br>';
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
switch ($page)
{
case 1:include("includes/shop_main.php"); break;
case 10:include("includes/list_content.php"); break;
case 78:include("includes/page78.php"); break;
case 77:include("includes/katalog_tovar.php"); break;
//case 88:include("includes/katalog_center_new.php"); break;
case 88:


echo '<iframe name="precu_katalog" height="700" width="765" align="middle" hspace="0" vspace="0"
   src="includes/katalog_center_new_frame.php"
   scrolling="yes"  frameborder="no" marginwidth="0px" marginheight="0px">
     </iframe>';
break;

}

echo		'</td>';
echo 		'<td width="10" align="left" valign="top">';
echo 		'</td>';
echo	'</tr>';
echo '</table>';
?>