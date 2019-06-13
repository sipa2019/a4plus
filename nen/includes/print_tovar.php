<?
$kartinka = "tovarcat";
if (isset($_SESSION['basket']))
{
	if (isset($_SESSION['basket'][$id_tovar]))

	{$kartinka = "tovarcatvvv";}

//	if (array_key_exists($id_tovar, $_SESSION['basket'])) {$kartinka = "tovarcatv";
//	echo $id_tovar;                                        }
}




if ($priznak==1)
{
echo '<tr>';
echo 	'<td class="rp_0">&nbsp;</td>';
echo 	'<td colspan=8 class="rp" align="left" valign="middle">';
echo 		'<span class="tovarrp">'.$name_tovar.'</span>';
echo 	'</td>';
echo '</tr>';
}
else
{



if ($prf==1)
{
echo '<tr>';
echo 	'<td class="bott_kat" align="left" valign="middle">';
print <<<HERE
			<a href="javascript:openWin('$id_tovar')" class="$kartinka">
HERE;
echo 		$kod_tovar;
echo 		'</a>';
echo 	'</td>';

//echo 	'<td class="bott_kat" align="left" valign="middle"><span class="tovarcat">'.$kod_tovar.'</span></td>';

echo 	'<td class="bott_kat" align="left" valign="middle">';
print <<<HERE
			<a href="javascript:openWin('$id_tovar')" class="$kartinka">
HERE;
echo 		'<img src="foto_shop/'.$foto_sm.'" alt = "'.$name_tovar.'" border="0">';
echo 		'</a>';
echo 	'</td>';
echo 	'<td colspan=3 class="bott_katmar" align="left" valign="middle">';
print <<<HERE
			<a href="javascript:openWin('$id_tovar')" class="$kartinka">
HERE;
echo 	$name_tovar;
echo 	'</a>';
echo 	'</td>';
}
else
{
echo '<tr>';
echo 	'<td class="bott_kat" align="left" valign="middle">';
print <<<HERE
			<a href="#" onclick="javascript:openWin('$id_tovar');" class="$kartinka">
HERE;
echo 		$kod_tovar;
echo 		'</a>';
echo 	'</td>';

//echo 	'<td class="bott_kat" align="left" valign="middle"><span class="tovarcat">'.$kod_tovar.'</span></td>';
echo 	'<td colspan=4 class="bott_kat" align="left" valign="middle">';
print <<<HERE
			<a href="javascript:openWin('$id_tovar')" class="$kartinka">
HERE;
echo 		$name_tovar;
echo 	'</a>';

echo 	'</td>';
}



echo 	'<td class="bott_kat_cena1" align="left" valign="middle"><span class="tovarcat">'.$cena1.'</span></td>';
echo 	'<td class="bott_katvalue" align="center" valign="middle" style="background-color:#FEEBF5;">';
if ($irnav==2)
{
echo 		'<img src="images/cell.jpg" alt="" border="0" />';
}
if ($irnav==3)
{
echo 		'<span class="tovarcat">'.$polekolvo.'</span>';
}
if ($irnav==0)
{
echo 		'<span class="tovarcat"> - </span>';
//echo 		'<span class="tovarcat">< 5</span>';
}
if ($irnav==1)
{
echo 		'<span class="tovarcat"> + </span>';
//echo 		'<span class="tovarcat">ir</span>';
}
echo 	'</td>';
//echo 	'<td class="bott_kat_cena2" align="left" valign="middle"><span class="tovarcat">'.$cena2.'</span></td>';
//echo 	'<td class="bott_kat_cena1" align="left" valign="middle"><span class="tovarcat">'.number_format(round($cena2*0.702804,2), 2, '.', '').'</span></td>';
echo 	'<td class="bott_kat_cena2" align="left" valign="middle"><span class="tovarcat">'.$cena2.'</span></td>';

echo 	'<td valign="middle" align="right" class="bott_katvalue" >';
echo 	'<form action="tpl_a4.php?ed='.$ed.'&amp;page='.$page.'&amp;param='.$param.'&amp;all_art='.$all_art.'&amp;prf='.$prf.'" method=post>';
echo 		'<input class="input" name="kolvo" value="" size="3" maxlength="6">';
echo 		'<input type="hidden" name="id_tovar" value="'.$id_tovar.'">';
//echo 		'<input class=button type=submit value="Положить в корзину">';

echo 		'<input type="image" src="/images/inkorzina.jpg" name="submit" align="middle">';

echo 	'</form>';
echo 	'</td>';
echo '</tr>';
}

?>


