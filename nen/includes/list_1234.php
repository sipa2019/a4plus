<?
//$name_book = "foto/atbilstibas_tabula.pdf";
//$text_pdf = "Atbilstības tabula .PDF";
$count=1;

$conn = connectToBd();

if (5==$page && 29==$ed) {
	$query = "SELECT * FROM a4plus_delivery WHERE hide = '0' ORDER BY ord";
	$result = mysql_query($query);
	if ($result == FALSE){print "ошибка при выборе данных из БД"; exit;}
	$count=0; $records = array();
	$kol = mysql_num_rows($result);
	if ($kol>0) {
		for ($i=0; $i<$kol;$i++) {
			$row	= mysql_fetch_array($result);
			$records[$i]['id'] = $row['id'];
			$records[$i]['title'] = $row['title'];
			$records[$i]['href'] = $row['href'];
			$records[$i]['ord'] = $row['ord'];
		}
	}
}

$query = "SELECT * FROM a4plus_pdf WHERE id_podrazdel = '".$art."'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе файла pdf из БД"; exit;}
$pp = mysql_fetch_array($result);
$name_book = trim($pp['foto_sm']);
$text_pdf  = trim($pp['name_page']);

$query = "SELECT * FROM a4plus_catalog WHERE id_podrazdel = '".$art."' ORDER BY name_page";
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

echo '<table width="600" border="0" cellpadding="0" cellspacing="0">';
if (!empty($name_book))
{
echo		 		'<tr>';
echo 					'<td align="left" valign="middle">';
echo 						'<a href="foto/'.$name_book.'" target="_blank" class="left_menu_pdf">';
echo 						$text_pdf;
echo 						'</a>';
echo 					'&nbsp;</td>';
echo 				'</tr>';
}
echo 	'<tr>';
echo		'<td align="center" valign="top">';

	if ($all_art==0) $all_art=1;
	if ($all_art==1) $prev=0;
	$next=$all_art+1;$prev=$all_art-1;
	if ($prev>0)
	{
echo 	'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&art='.$art.'&all_art='.$prev.'"><img src="images/enter.jpg" border=0 width=18 height=12 align="middle"></a>';
echo	'&nbsp;';
	}
if ($kolpage>1)
{
	for ($pp=1; $pp<$kolpage+1; $pp++)
	{
		if ($all_art==$pp) $cla="bigbuk_akt"; else $cla="bigbuk";
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&art='.$art.'&all_art='.$pp.'" class="'.$cla.'">'.$count.'</a> | ' ;
		    $count++;
	}
}
	if ($next<=$kolpage)
	{echo		'&nbsp;';
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&art='.$art.'&all_art='.$next.'"><img src="images/krugred.gif" border=0 width=18 height=12 align="middle"></a>';
	}

echo 		'</td>';
echo 	'</tr>';
if (5==$page && 29==$ed && $records) { 
	foreach ($records as $record) { ?>
		<tr><td height='30' align="right" valign="top">
			<a href="<?=$record['href']?>" target='_blank' style='font-size:1.2em;'><?=$record['title']?></a>
		</td></tr>
	<?php }
} else {
	echo 	'<tr><td HEIGHT=22>&nbsp;</td></tr>';
}
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
echo 	'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&art='.$art.'&all_art='.$prev.'"><img src="images/enter.jpg" border=0 width=18 height=12 align="middle"></a>';
echo	'&nbsp;';
	}
if ($kolpage>1)
{
	for ($pp=1; $pp<$kolpage+1; $pp++)
	{
		if ($all_art==$pp) $cla="bigbuk_akt"; else $cla="bigbuk";
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&art='.$art.'&all_art='.$pp.'" class="'.$cla.'">'.$count1.'</a> | ' ;
		    $count1++;
	}
}
	if ($next<=$kolpage)
	{
echo		'&nbsp;';
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&art='.$art.'&all_art='.$next.'"><img src="images/krugred.gif" border=0 width=18 height=12 align="middle"></a>';
	}

echo 		'</td>';
echo 	'</tr>';



echo '</table>';
}


?>