<?
//$name_book = "foto/atbilstibas_tabula.pdf";
//$text_pdf = "Atbilstības tabula .PDF";
$count=1;
if ($page==10) $art=1; else $art=2;
$conn = connectToBd();

if ($page==10)
{	$query = "SELECT * FROM shiny_text WHERE id_razdel = '7'";
	$result = mysql_query($query);
	if ($result == FALSE){print "ошибка при выборе данных из БД"; exit;}

	$p = mysql_fetch_array($result);
	$cont1 = $p['content'];
	$cont2 = $p['content_sm'];


echo '<table width="765" border="0" cellpadding="0" cellspacing="0"  style="border: 1px solid #738375;">';
echo	'<tr>';
echo		'<td colspan=2 height="20" class="tabletovar">&nbsp;</td>';
echo 	'</tr>';

echo 	'<tr>';
echo		'<td width="78" valign="top" >&nbsp;</td>';
echo		'<td width="600" align="left" valign="top" >';


echo '<table width="600" border="0" cellpadding="0" cellspacing="0">';

echo 	'<tr><td HEIGHT=30>&nbsp;</td></tr>';

echo 	'<tr>';
echo		'<td align="left" valign="top">';
echo '<span class="tovarcat">';
echo $cont1;
echo '</span>';
echo 		'</td>';
echo 	'</tr>';
echo 	'<tr><td HEIGHT=22>&nbsp;</td></tr>';

echo 	'<tr>';
echo		'<td align="left" valign="top">';
echo '<span class="tovarcat">';
echo $cont2;
echo '</span>';
echo 		'</td>';
echo 	'</tr>';

echo '</table>';

echo 		'</td>';
echo 	'</tr>';

echo '</table>';
}
else
{
$query = "SELECT * FROM a4plus_kanc WHERE id_razdel = '".$art."' ORDER BY name_page";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе данных из БД"; exit;}
$kolpage = mysql_num_rows($result);
$j=0;
if ($kolpage>0)
{
	for ($i=0; $i<$kolpage;$i++)
	{
		$j++;
		$p = mysql_fetch_array($result);
		$massiv_lapa [$j] = $p['foto_sm'];
	}

echo '<table width="765" border="0" cellpadding="0" cellspacing="0">';
echo 	'<tr>';
echo		'<td align="center" valign="top">';


echo '<table width="600" border="0" cellpadding="0" cellspacing="0">';
echo 	'<tr>';
echo		'<td align="center" valign="top">';

	if ($all_art==0) $all_art=1;
	if ($all_art==1) $prev=0;
	$next=$all_art+1;$prev=$all_art-1;
	if ($prev>0)
	{
echo 	'<a href="tpl_a4.php?page='.$page.'&art='.$art.'&all_art='.$prev.'"><img src="images/enter.jpg" border=0 width=18 height=12 align="middle"></a>';
echo	'&nbsp;';
	}
if ($kolpage>1)
{
	for ($pp=1; $pp<$kolpage+1; $pp++)
	{
		if ($all_art==$pp) $cla="bigbuk_akt"; else $cla="bigbuk";
echo 		'<a href="tpl_a4.php?page='.$page.'&art='.$art.'&all_art='.$pp.'" class="'.$cla.'">'.$count.'</a> | ' ;
		    $count++;
	}
}
	if ($next<=$kolpage)
	{echo		'&nbsp;';
echo 		'<a href="tpl_a4.php?page='.$page.'&art='.$art.'&all_art='.$next.'"><img src="images/krugred.gif" border=0 width=18 height=12 align="middle"></a>';
	}

echo 		'</td>';
echo 	'</tr>';
echo 	'<tr><td HEIGHT=22>&nbsp;</td></tr>';

echo	'<tr>';
echo		'<td align="center" valign="top">';
echo 			'<IMG SRC="foto/'.$massiv_lapa[$all_art].'" WIDTH="600" ALT="" align="top" border="0">';
echo		'</td>';
echo	'</tr>';

echo 	'<tr><td HEIGHT=22>&nbsp;</td></tr>';

$count1=1;
echo 	'<tr>';
echo		'<td align="center" valign="top">';

	if ($all_art==0) $all_art=1;
	if ($all_art==1) $prev=0;
	$next=$all_art+1;$prev=$all_art-1;
	if ($prev>0)
	{
echo 	'<a href="tpl_a4.php?page='.$page.'&art='.$art.'&all_art='.$prev.'"><img src="images/enter.jpg" border=0 width=18 height=12 align="middle"></a>';
echo	'&nbsp;';
	}
if ($kolpage>1)
{
	for ($pp=1; $pp<$kolpage+1; $pp++)
	{
		if ($all_art==$pp) $cla="bigbuk_akt"; else $cla="bigbuk";
echo 		'<a href="tpl_a4.php?page='.$page.'&art='.$art.'&all_art='.$pp.'" class="'.$cla.'">'.$count1.'</a> | ' ;
		    $count1++;
	}
}
	if ($next<=$kolpage)
	{
echo		'&nbsp;';
echo 		'<a href="tpl_a4.php?page='.$page.'&art='.$art.'&all_art='.$next.'"><img src="images/krugred.gif" border=0 width=18 height=12 align="middle"></a>';
	}

echo 		'</td>';
echo 	'</tr>';
echo '</table>';

echo 		'</td>';
echo 	'</tr>';
echo '</table>';
}
}

?>