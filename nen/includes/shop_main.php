<?
//////////////////////////////////////////////////////////
	$param=$_GET['param'];
	if (empty($param)) $param='1';
// проверка - это еще папки или уже товар
	$query1 = "SELECT COUNT(*) FROM a4plus_tovar WHERE ref_parent = '".$param."' and isfolder='1'";
	$r_query1 = mysql_query($query1);if ($r_query1 == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
	$Count1=mysql_fetch_row($r_query1);
// количество элементов-папок с заданным родителем
	$k_folder=$Count1[0];

// навигация по страницам - выбранного каталога и только сам товар
//	$k_q = "SELECT COUNT(*) FROM ms_tovar WHERE ref_parent = '".$param."' and isfolder='0'";
//	$k_all = "SELECT * FROM ms_tovar WHERE ref_parent = '".$param."' and isfolder='0'";

if ($prf == 0) {$text_prf=$print_foto;$nprf=1;} else {$text_prf=$print_navfoto;$nprf=0;}
?>
<table width="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0">

<tr>

	<td align="left" valign="top">
<?
// если это еще папки - то печать каталога с перемещением по нему
if ($page==1 && $param <=1)
{	include("includes/list_content.php");}
else
{
	if ($k_folder>0 )
	{
		include("includes/katalog_center_new.php");
	}
	else
	{
		include("includes/katalog_tovar.php");
	}
}
?>
	</td>

</tr>

<tr>

	<td style="">&nbsp;</td>

</tr>
</table>

