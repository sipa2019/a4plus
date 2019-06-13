
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
{
    $count++;
	$pr = mysql_fetch_array($resultr);
	$id_podrazdel	= trim($pr['id_podrazdel']);
	$name_podrazdel	= trim($pr['name_podrazdel']);
	$foto_sm 		= trim($pr['foto_small']);
	$foto_hover		= trim($pr['foto_hover']);
	if (empty($foto_hover)) $foto_hover=$foto_sm;
	$pic_podrazdel	= "pic".$id_podrazdel;

echo 		'<td width="200" HEIGHT="79" align="center" valign="middle">';
?>
			<a href="../tpl_a4.php?page=<? echo $page; ?>&amp;ed=<? echo $ed; ?>&amp;art=<? echo $id_podrazdel; ?>"
			 onMouseOver="document.<? echo $pic_podrazdel; ?>.src='foto/<? echo $foto_hover; ?>'"
			 onMouseOut="document.<? echo $pic_podrazdel; ?>.src='foto/<? echo $foto_sm; ?>'"  target="_parent">
			<IMG SRC="foto/<? echo $foto_sm; ?>" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="<? echo $pic_podrazdel; ?>">
			</a>


<?
echo		'</td>';


		if ($count==3)
		{
echo 	'</tr>';
echo 	'<TR>';
			$count=0;
		}

}
if ($count==2){
echo 	'<td >&nbsp;</td></TR>';
}
if ($count==1){
echo 	'<td colspan=2>&nbsp;</td></TR>';
}
if ($count==0){
echo 	'<td colspan=3>&nbsp;</td></TR>';
}
echo '</table>';
