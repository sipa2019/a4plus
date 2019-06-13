
<style type="text/css">
#sec a img {
border:5px outset #D0ED98;
}

#sec a:hover img {
border:3px outset #D0ED98;
}
</style>

<?
echo '<table width="600" border="0" cellpadding="0" cellspacing="0">';

echo	'<tr>';


$kolvo_row = 3;
$count=0;
$conn = connectToBd();

$queryr = "SELECT * FROM a4plus_podrazdel WHERE hide='0' AND id_razdel = '".$ed."' ORDER BY ord";
//echo $queryr;
$resultr = mysql_query($queryr);
if ($resultr == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
$kolr=mysql_num_rows($resultr);
for ($j=0; $j<$kolr;$j++)
{    $count++;
	$pr = mysql_fetch_array($resultr);
	$id_podrazdel	= trim($pr['id_podrazdel']);
	$name_podrazdel	= trim($pr['name_podrazdel']);
	$foto_sm 		= trim($pr['foto_small']);

echo 		'<td width="150" HEIGHT="177" align="center" valign="middle"
				 style="background-image:url(/foto/'.$foto_sm.');
				 background-repeat:no-repeat;background-position: center;">';
if (!empty($foto_sm))
{
echo 	'<div id="sec">';
echo 			'<a href="tpl_a4.php?page='.$page.'&amp;ed='.$ed.'&amp;art='.$id_podrazdel.'" target="_parent">';
echo 				'<IMG SRC="images/spacer_menu.gif" WIDTH="136" HEIGHT="163" align="middle" alt="">';
echo 			'</a>';
echo 	'</div>';
}
echo		'</td>';


		if ($count==4)
		{
echo 	'</tr>';
echo 	'<TR>';
			$count=0;
		}

}
if ($count==3){
echo 	'<td >&nbsp;</td></TR>';
}
if ($count==2){
echo 	'<td colspan=2>&nbsp;</td></TR>';
}
if ($count==1){
echo 	'<td colspan=3>&nbsp;</td></TR>';
}
if ($count==0){
echo 	'<td colspan=4>&nbsp;</td></TR>';
}

echo '</table>';
