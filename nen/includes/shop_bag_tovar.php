<?php
$prf=$_GET['prf'];$idt=$_GET['idt'];
$_POST['content'] = $_SESSION['content'];

if ($prf==1) {$imgphoto="bildembez.jpg";$newprf=0;} else {$imgphoto="bildemar.jpg";$newprf=1;}
$conn = connectToBd();

echo '<table width="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0">';
echo '<form action="tpl_a4.php?ed=-2&amp;page='.$page.'" method="post">';

if (isset($_SESSION['basket']) && !empty($_SESSION['basket']))
{
echo '<tr>';
echo 	'<td rowspan=2  width="10%" align="center" class="tabletovar">Kods</td>';
echo 	'<td rowspan=2 width="14%" align="left" class="tabletovarleft">&nbsp;&nbsp;';
echo 	'<a href="tpl_a4.php?page='.$page.'&amp;prf='.$newprf.'" target="_parent" >';
echo 		'<img src="images/'.$imgphoto.'" alt="" border="0" />';
echo 	'</a>';
echo 	'</td>';
echo 	'<td rowspan=2  width="7%" align="right" class="tabletovarcenter">Nosaukums</td>';
echo 	'<td rowspan=2  width="8%" align="right" class="tabletovarcenter">&nbsp;</td>';
echo 	'<td rowspan=2  width="31%" align="left" class="tabletovarright">&nbsp;</td>';
?>
	<td rowspan=2  width="5%" align="center" class="tabletovar">Skaits</td>
	<td width="18%" colspan=2 align="center" class="tabletovar"> cena Euro ar PVN</td>
	<td  rowspan=2 width="7%" align="center" class="tabletovar">Izņemt</td>
</tr>
<tr>
	<td width="9%" align="center" class="tabletovar">1gab. </td>
	<td width="9%" align="center" class="tabletovar">Summa</td>
</tr>
<?

/////////////////////////////////////////////////////////////
// корзина существует и она не пустая
////////////////////////////////////////////////////////////
// пересчитать

	$total_summ  = 0;$sql = '';$products = '';
	reset ($_SESSION['basket']);
	while (list($key, $val) = each($_SESSION['basket']))
	{
		if (!empty($key))
		{
			$sql .= $key.', ';
		}
	}
	$dlsql=strlen(trim($sql));
	if ($dlsql==0)
	{
		mess_empty();
//		exit;
	}
	else
	{//		$_POST['content'] = $_SESSION['content'];
// заголовок таблицы

		$query_korzina = 'SELECT * FROM a4plus_tovar WHERE ref  in ('.$sql.' -9999) ORDER BY ord';
		$res_korzina	= mysql_query($query_korzina);if ($res_korzina == FALSE){print "ошибка из таблицы a4plus_tovar"; exit;}
		$kol = mysql_num_rows($res_korzina);
		$cena=0;$kolvo=0;$count=0;

		for ($i=0; $i<$kol;$i++)
		{
    		$count++;
			$pmore		= mysql_fetch_array($res_korzina);

			$name_tovar	= trim($pmore['name_tovar']);
			$cena2		= round($pmore['cena2'],2);
			$kod_tovar	= $pmore['kod_tovar'];
			$foto_sm 	= trim($pmore['foto_sm']);
			if (empty($foto_sm)) $foto_big="navfotosm.jpg";

			$id_tovar	= $pmore['ref'];
			$kolvo=array();
			$kolvo[$id_tovar] = $_SESSION['basket'][$id_tovar];
			$summa = round($kolvo[$id_tovar]*$cena2,2);

			echo '<tr>';
			echo 	'<td class="bott_kat" align="left" valign="middle"><span class="tovarcat">'.$kod_tovar.'</span></td>';
			if ($prf==1)
			{
			echo 	'<td class="bott_kat" align="left" valign="middle">';
			echo 		'<img src="foto_shop/'.$foto_sm.'" alt = "'.$name_tovar.'" border="0">';
			echo 	'</td>';
			echo 	'<td colspan=3 class="bott_kat" align="left" valign="middle">';
			}
			else
			{
			echo 	'<td colspan=4 class="bott_kat" align="left" valign="middle">';
			}
			echo 		'<span class="tovarcat">'.$name_tovar.'</span>';
			echo 	'</td>';
			echo 	'<td class="bott_kat" align="center" valign="middle">';
?>
						&nbsp;<input type="text" name="area[<?php echo $id_tovar; ?>]" value="<?php echo $kolvo[$id_tovar]; ?>" size="4" maxlength="7"/>&nbsp;
<?
			echo	'</td>';
			echo 	'<td class="bott_kat" align="right" valign="middle"><span class="tovarcat">'.number_format($cena2, 2, '.', '').'</span></td>';
			echo 	'<td class="bott_kat_cena1" align="right" valign="middle"><span class="tovarcat">'.number_format($summa, 2, '.', '').'</span></td>';
			echo 	'<td valign="middle" align="center" class="bott_kat" >';
			echo 		'<a href="tpl_a4.php?ed=-1&amp;page='.$page.'&amp;idt='.$id_tovar.'" target="_parent">';
			echo 			'<img src="images/del.jpg" alt="" border="0"  />';
			echo		'</a>';
			echo	'</td>';
			$total_summ  += $_SESSION['basket'][$id_tovar]*$cena2;
			echo '</tr>';
		}
		$total_summ  = round($total_summ,2);
////  Итоговая строка

		echo 	'<tr>';
		echo 		'<td colspan="9" width="765" align="center" height="7" valigh="middle">';
		echo 			'<IMG SRC="images/linetop.jpg" WIDTH="765" HEIGHT="2" ALT="">';
		echo 		'</td>';
		echo 	'</tr>';

		echo '<tr>';
		echo 	'<td  colspan="5" valign="middle" align="right">';
		echo 		'<span class="tovarrp"><strong>Kopā:</strong>&nbsp;</span>';
		echo 	'</td>';
		echo 	'<td  colspan="2" valign="middle" align="left">&nbsp;</td>';
		echo 	'<td  valign="middle" align="right">';
		echo 		'<span class="tovarrp_kopa">';
		echo	 		'<strong>'.number_format($total_summ, 2, '.', '').'</strong>';
		echo 		'</span>';
		echo 	'</td>';
		echo 	'<td valign="middle" align="left"><span class="tovarrp_kopa">&nbsp;Euro</span></td>';
		echo '</tr>';

		
////  Пересчитать
	}

}

//echo '<tr>';
//echo 	'<td  colspan="9" height="20">&nbsp;</td>';
//echo '</tr>';
echo '<tr>';
echo 	'<td width="10%" height="20">&nbsp;</td>';
echo 	'<td width="14%" height="20">&nbsp;</td>';
echo 	'<td width="7%" height="20">&nbsp;</td>';
echo 	'<td width="8%" height="20">&nbsp;</td>';
echo 	'<td width="31%" height="20">&nbsp;</td>';
echo 	'<td width="5%" height="20">&nbsp;</td>';
echo 	'<td width="9%" height="20">&nbsp;</td>';
echo 	'<td width="9%" height="20">&nbsp;</td>';
echo 	'<td width="7%" height="20">&nbsp;</td>';
echo '</tr>';


echo '<tr>';
echo 	'<td  colspan="9" align="left">';
echo 		'<span class="tovarrp"></span>';
echo 	'</td>';
echo '</tr>';
echo '<tr>';
echo 	'<td  colspan="9" height="50" align="left">';
?>
			<textarea name="content"  style="width: 100%; height: 10em" maxlength="400">
			<? echo $_POST['content'] ?></textarea>
<?
echo 	'</td>';
echo '</tr>';


echo '<tr>';
echo 	'<td  colspan="9" height="10">&nbsp;</td>';
echo '</tr>';
echo '<tr>';
echo 	'<td  colspan="9" valign="middle" align="center" height="40">';
echo 		'<span class="textpar">';
echo 			'Pēc informācijas ievadīšanas vai maiņas nospiediet&nbsp;&nbsp;';
echo 		'</span>';
echo 		'<input type="hidden" name="action" value="post">';
echo 		'<input class="button" type="submit" value="&nbsp;SAGLABĀT&nbsp;">';
echo 	'</td>';
echo '</tr>';
echo '<tr>';
echo 	'<td  colspan="9" class="tabletovar" height="10">&nbsp;</td>';
echo '</tr>';

////  сообщение о том, чтоб зарегистрировались
if(empty($_SESSION['pokupatel']))
{
echo 	'<TR>';
echo 		'<td colspan="9" height="70" valign="middle" align="center">';
echo 			'<IMG SRC="images/red_krug.jpg" border="0" ALT="" align="middle">&nbsp;&nbsp;';
echo 			'<a href="tpl_a4.php?page=8" target="_parent" class="navigation">';
echo 				"STARTS pasūtījuma veikšanai";
echo 			'</a>';
echo 		'</td>';
echo 	'</TR>';
}
else
{
echo 	'<TR>';
echo 		'<td colspan="9" height="20" valign="middle" align="center">&nbsp;</td>';
echo 	'</TR>';


echo 	'<TR>';
echo 		'<td colspan="3">&nbsp;</td>';
echo 		'<td colspan="6" height="70" valign="middle" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo 			'<IMG SRC="images/red_krug.jpg" border="0" ALT="" align="middle">&nbsp;&nbsp;';
echo 			'<a href="tpl_a4.php?page=81" target="_parent" class="navigation">';
echo 				"Reģistrācijas forma mainīt";
echo 			'</a>';
echo 		'</td>';
echo 	'</TR>';

echo 	'<TR>';
echo 		'<td colspan="3">&nbsp;</td>';
echo 		'<td colspan=6 align="left" valign="middle" scope="col">';
echo 			'<div class="buttons_order">';
echo 				'<div class="post_order">
						<a href="tpl_a4.php?page=9" target="_parent">';
echo 					'<span></span>';
echo 					'</a>
					</div>';
echo 			'</div>';
echo 		'</td>';
echo 	'</TR>';
}

//}
//else
//{//	mess_empty();
//}
?>
</form>
</table>







<?
function mess_empty()
{
echo 	'<tr>';
echo 		'<td  colspan="9" align="center" valign="middle" height="60">';
?>
				<span class="precukatalogs"><strong>Jūsu pirkumu grozs ir tukšs!</strong></span>
<?
echo 		'</td>';
echo 	'</tr>';
}
?>