<?php
if ($page==88) {$p_menu="left_menu_shop_akt";$imgp="lm_krug_red.jpg";} else {$p_menu="left_menu_shop";$imgp="llm_krug_w.jpg";}
echo '<table width="180" border="0" cellpadding="0" cellspacing="0">';
echo 	'<tr><td colspan="4" height="3"><img src="images/empty.gif" alt = "" width="3" height="5" align="top" border="0"></td></tr>';


echo 	'<tr>';
echo 		'<td width="1" align="left" valign="top">&nbsp;</td>';
echo 		'<td width="18" align="center" valign="top"><img src="images/'.$imgp.'" alt = "" valign="top" border="0"></td>';
echo 		'<td width="143" align="left" valign="middle">';
echo 			'<a href="../tpl_a4.php?page=88&prf='.$prf.'"  border="0" target="_parent" title="Preču katalogs" class="'.$p_menu.'">';
echo 			'Preču katalogs';
echo 			'</a>';
echo 		'</td>';
echo 		'<td width="18" align="left" valign="top">&nbsp;</td>';
echo 	'</tr>';

echo 	'<tr><td colspan="4" height="3"><img src="images/empty.gif" alt = "" width="3" height="5" align="top" border="0"></td></tr>';


echo 	'<tr><td colspan="4" valign="top">';

echo			'<form action="../tpl_a4.php?page=77&prf='.$prf.'" method="POST">';
?>
					&nbsp;&nbsp;<input type="text" name="poisks" value="   meklēšana"
					onfocus="this.value=''"	size="18" maxlength="100" valign="top">
					<input type="hidden" name="advfind" value="0">
					<input type="image" src="/images/findbutton.jpg" name="submit" align="top">
<?
//echo 			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../tpl_a4.php?page=78&prf='.$prf.'"  border="0" target="_parent" title="Paplašināta meklēšana" class="left_menu_find">';
//echo 			'paplašināta meklēšana';
//echo 			'</a>';

echo 			'</form>';

echo '</td></tr>';

//echo 	'<tr><td colspan="4" height="3"><img src="images/empty.gif" alt = "" width="3" height="3" align="top" border="0"></td></tr>';

echo 	'<tr>';
echo 		'<td width="1" align="left" valign="top">&nbsp;</td>';
echo 		'<td width="18" align="center" valign="top"><img src="images/empty.gif" alt = "" width="18" height="5" align="top" border="0"></td>';
echo 		'<td width="143" align="left" valign="middle">';
echo 			'<a href="../tpl_a4.php?page=78&prf='.$prf.'"  border="0" target="_parent" title="Paplašināta meklēšana" class="left_menu_find">';
echo 			'paplašināta meklēšana';
echo 			'</a>';
echo 		'</td>';
echo 		'<td width="18" align="left" valign="top">&nbsp;</td>';
echo 	'</tr>';

echo 	'<tr><td colspan="4" height="10"><img src="images/empty.gif" alt = "" width="3" height="10" align="top" border="0"></td></tr>';
$conn = connectToBd();
$query = "SELECT *  FROM a4plus_tovar WHERE ref_parent = '1' AND isfolder = '1' AND hide = '0' ORDER BY ord";
 
$result = mysql_query($query);if ($result == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
$kol_leftmenu = mysql_num_rows($result);
for ($ib=0; $ib<$kol_leftmenu;$ib++)
{
	$row = mysql_fetch_array($result);
	$ref = $row["ref"];
	$name_tovar = $row["name_tovar"];
	$dll = strlen(trim($name_tovar));
	if ($ed==$ref) {$l_menu="left_menu_shop_akt";$imgleft="lm_krug_red.jpg";} else {$l_menu="left_menu_shop";$imgleft="llm_krug_w.jpg";}

//echo '<div class="menuleft">';

echo 	'<tr>';
echo 		'<td width="1" align="left" valign="top">&nbsp;</td>';
echo 		'<td width="18" align="center" valign="top"><img src="images/'.$imgleft.'" alt = "" valign="top" border="0"></td>';
echo 		'<td width="143" align="left" valign="middle">';
echo 			'<a href="../tpl_a4.php?ed='.$ref.'&amp;page=1&amp;param='.$ref.'&amp;prf='.$prf.'"  border="0" target="_parent" title="'.$name_tovar.'" class="'.$l_menu.'">';
echo 			$name_tovar;
echo 			'</a>';
echo 		'</td>';
echo 		'<td width="18" align="left" valign="top">&nbsp;</td>';
echo 	'</tr>';
echo 	'<tr><td colspan="4" height="3"><img src="images/empty.gif" alt = "" width="3" height="5" align="top" border="0"></td></tr>';
//	echo 	'</a><br>';
//echo '</div>';
}

echo '</table>';
?>

