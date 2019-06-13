<?
//$name_book = "foto/atbilstibas_tabula.pdf";
//$text_pdf = "Atbilstības tabula .PDF";
$count=1;

$conn = connectToBd();

$query = "SELECT * FROM shiny_pdf WHERE number_cat = '2'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе файла pdf из БД"; exit;}
$pp = mysql_fetch_array($result);
$name_book = trim($pp['foto_sm']);
$text_pdf  = trim($pp['name_sm']);

$query = "SELECT * FROM shiny_tab ORDER BY number_page";
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
echo 					'<td align="right" valign="middle">';
echo 						'<a href="foto/'.$name_book.'" target="_blank" class="left_menu_new">';
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
echo 	'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&all_art='.$prev.'"><img src="images/enter.jpg" border=0 width=18 height=12 align="middle"></a>';
echo	'&nbsp;';
	}
	for ($pp=1; $pp<$kolpage+1; $pp++)
	{
		if ($all_art==$pp) $cla="bigbuk_akt"; else $cla="bigbuk";
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&all_art='.$pp.'" class="'.$cla.'">'.$count.'</a> | ' ;
		    $count++;
	}
	if ($next<=$kolpage)
	{echo		'&nbsp;';
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&all_art='.$next.'"><img src="images/krugred.gif" border=0 width=18 height=12 align="middle"></a>';
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
echo 	'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&all_art='.$prev.'"><img src="images/enter.jpg" border=0 width=18 height=12 align="middle"></a>';
echo	'&nbsp;';
	}
	for ($pp=1; $pp<$kolpage+1; $pp++)
	{
		if ($all_art==$pp) $cla="bigbuk_akt"; else $cla="bigbuk";
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&all_art='.$pp.'" class="'.$cla.'">'.$count1.'</a> | ' ;
		    $count1++;
	}
	if ($next<=$kolpage)
	{
echo		'&nbsp;';
echo 		'<a href="tpl_a4.php?ed='.$ed.'&page='.$page.'&all_art='.$next.'"><img src="images/krugred.gif" border=0 width=18 height=12 align="middle"></a>';
	}

echo 		'</td>';
echo 	'</tr>';



echo '</table>';
}


?>