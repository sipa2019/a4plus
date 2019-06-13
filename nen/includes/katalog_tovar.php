<script type="text/javascript">
function openWin(idp) {
var myUrl = "text_mess.php?idt=" + idp;
var newW  = idp;

 var width  = 500;
 var height = 370;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=yes';
 newwin=window.open(myUrl, newW, params);
}
</script>
<style type="text/css">
.tmore {
	font: 10px Geneva, Arial, Helvetica, sans-serif;
	color: #2C3B0C;
	padding: 2px;
}
</style>
<?
// навигация по страницам - выбранного каталога и только сам товар
$text_navpoisk	="Diemžēl nekas netika atrasts !";
$text_sorry		="Atvainojiet, informācija drīz būs... ";
if ($page==77)
{	if ($_SESSION['advfind']==1)
	{
// расширенный поиск
	    $string_total_adv = "";
		$find_nosauk 	= $_SESSION['find_nosauk'];
		$find_kods		= $_SESSION['find_kods'];
		if (!empty($find_nosauk)) 	{$pole_name = "string_name";$stroka_new_name = string_for_find($find_nosauk,$pole_name);$string_total_adv=$stroka_new_name;}
		if (!empty($find_kods))
		{			$pole_name = "kod_tovar";$stroka_kod_tovar=str_select($find_kods,$pole_name);
			if (!empty($string_total_adv)) {$string_total_adv .= " AND ";}
			$string_total_adv .= $stroka_kod_tovar;
		}
		if (!empty($string_total_adv))
		{
			$k_q = "SELECT COUNT(*) FROM a4plus_tovar WHERE isfolder='0' AND hide = '0' AND priznak='0' AND (".$string_total_adv.")";
			$k_all = "SELECT * FROM a4plus_tovar WHERE isfolder='0' AND hide = '0' AND priznak='0' AND (".$string_total_adv.") ORDER by ref_parent, ord";
        }
		else
		{
			$k_q = "SELECT COUNT(*) FROM a4plus_tovar WHERE ref_parent = '0' and isfolder='0' AND hide = '0'";
			$k_all = "SELECT * FROM a4plus_tovar WHERE ref_parent = '0' and isfolder='0' AND hide = '0' ORDER by ord, priznak DESC";
		}
//echo $k_all;
	}
	else
	{
// общий поиск
		$poisks = $_SESSION['ishem'];		if (mb_strlen(trim($poisks))!=0)
		{
			$pole_name = "name_tovar";
			$stroka_name_tovar=str_select($poisks,$pole_name);

			$pole_name = "string_name";
			$stroka_new_name = string_for_find($poisks,$pole_name);

			$pole_name = "descript";
			$stroka_descript = str_select($poisks,$pole_name);
			$pole_name = "kod_tovar";
			$stroka_kod_tovar=str_select($poisks,$pole_name);
//=======================================
// сами запросы
			$k_q = "SELECT COUNT(*) FROM a4plus_tovar WHERE isfolder='0' AND hide = '0' AND priznak='0' AND (".$stroka_name_tovar." OR ".$stroka_descript." OR ".$stroka_kod_tovar." OR ".$stroka_new_name.")";
			$k_all = "SELECT * FROM a4plus_tovar WHERE isfolder='0' AND hide = '0' AND priznak='0' AND (".$stroka_name_tovar." OR ".$stroka_descript." OR ".$stroka_kod_tovar." OR ".$stroka_new_name.") ORDER by ref_parent, ord";

		}
	}}
else
{
	$k_q = "SELECT COUNT(*) FROM a4plus_tovar WHERE ref_parent = '".$param."' and isfolder='0' AND hide = '0'";
	$k_all = "SELECT * FROM a4plus_tovar WHERE ref_parent = '".$param."' and isfolder='0' AND hide = '0' ORDER by ord, priznak DESC";
}


if (!empty($k_q))
{
	$k_r = mysql_query($k_q);if ($k_r == FALSE){print "ошибка при подсчете данных из таблицы a4plus_tovar1111"; exit;}
	$Count=mysql_fetch_row($k_r);$kolvo=$Count[0];
}
echo '<table width="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0">';
if ($kolvo==0)
{
	if ($page==77) $text_fun=$text_navpoisk; else $text_fun = $text_sorry;
	mess_vibor($text_fun);
}
else
{


	$prf=$_GET['prf'];
	$idt=$_GET['idt'];
	if ($prf==1) {$imgphoto="bildembez.jpg";$newprf=0;$kol_page=25;} else {$imgphoto="bildemar.jpg";$newprf=1;$kol_page=25;}

	$count=1;
	if ($all_art==0) $all_art=1;if ($all_art==1) $prev=0;
	$next=$all_art+$kol_page;$prev=$all_art-$kol_page;

echo '<tr>';
echo 	'<td rowspan=2  width="10%" align="center" class="tabletovar">Kods</td>';
echo 	'<td rowspan=2 width="14%" align="left" class="tabletovarleft">&nbsp;';
echo 	'<a href="tpl_a4.php?ed='.$ed.'&amp;page='.$page.'&amp;all_art='.$all_art.'&amp;param='.$param.'&amp;prf='.$newprf.'" target="_parent" >';
echo 		'<img src="images/'.$imgphoto.'" alt="" border="0" />';
echo 	'</a>';
echo 	'</td>';
echo 	'<td rowspan=2  width="10%" align="right" class="tabletovarcenter">Nosaukums</td>';
echo 	'<td rowspan=2  width="5%" align="right" class="tabletovarcenter">&nbsp;</td>';
echo 	'<td rowspan=2  width="31%" align="left" class="tabletovarright">';
// подсчитываем кол-во элем ентов (строчек) - kol_vo
		if ($prev>0)
		{
echo '<a href="tpl_a4.php?ed='.$ed.'&amp;page='.$page.'&amp;all_art='.$prev.'&amp;param='.$param.'&amp;prf='.$prf.'"><img src="images/krugred2.gif" border="0" alt="" align="middle" width="18" height="12"></a>';
		}
		for ($pp=1; $pp<$kolvo+1; $pp=$pp+$kol_page)
		{
			if ($all_art==$pp) $cla="katalog_a"; else $cla="katalog";
echo '<a href="tpl_a4.php?ed='.$ed.'&amp;page='.$page.'&amp;all_art='.$pp.'&amp;param='.$param.'&amp;prf='.$prf.'" class="'.$cla.'">'.$count.'</a> | ' ;
			$count++;
		}
		if ($next<=$kolvo)
		{
echo '<a href="tpl_a4.php?ed='.$ed.'&amp;page='.$page.'&amp;all_art='.$next.'&amp;param='.$param.'&amp;prf='.$prf.'"><img src="images/krugred.gif" border="0" align="middle" width="18" height="12" alt=""></a>';
		}
?>
	</td>
	<!--<td rowspan=2  width="5%" align="center" class="tabletovar">Skaits</td>-->
	<td width="19%" colspan=3 align="center" class="tabletovar"> cena EUR 1gab.ar PVN</td>
	<td  rowspan=2 width="10%" align="center" class="tabletovar">Grozā</td>
</tr>
<tr>

	<td width="7%" align="center" class="tabletovar">Pamata</td>
	<td width="6%" align="center" class="tabletovar">Atlaide</td>	
	<td width="7%" align="center" class="tabletovar">Īpašā</td>

<!--
	<td width="7%" align="center" class="tabletovar">LVL</td>
	<td width="7%" align="center" class="tabletovar">Euro</td>
-->		
</tr>
<?
		$numb_r = $all_art-1;
//$query = "SELECT *  FROM ms_tovar WHERE ref_parent = '".$param."' and isfolder='0' LIMIT ".$numb_r.", ".$kol_page;
		$query = $k_all." LIMIT ".$numb_r.", ".$kol_page;
//echo '2-'.$query;
		$result = mysql_query($query);
		if ($result == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
		$kol_ref = mysql_num_rows($result);
		if ($kol_ref!=0)
		{
			for($i=0; $i<$kol_ref; $i++)
			{
				$pm 		= mysql_fetch_array($result);
				$isfolder	= $pm['isfolder'];
				$priznak	= $pm['priznak'];
				$ref		= $pm['ref'];
				$id_tovar	= $pm['ref'];
				$irnav		= trim($pm['irnav']);
				if ($irnav==2) {$ostatok	= "zvan.";}
				if ($irnav==1) {$ostatok	= "ir";}
				if ($irnav==0) {$ostatok	= "nav";}

				$name_tovar	= trim($pm['name_tovar']);
				$cena1		= $pm['cena1'];
				$cena2		= $pm['cena2'];
				$kod_tovar	= $pm['kod_tovar'];
				$polekolvo	= $pm['kolvo'];

				$kartinka = "galka_nav.jpg";
//				if (isset($_SESSION['basket']))
//	 			{
//					if (array_key_exists($id_tovar, $_SESSION['basket'])) $kartinka = "galka_ir.jpg";
//				}
				$foto_sm 	= $pm['foto_sm'];
				if (strlen($foto_sm)==0) $foto_sm="navfotosm.jpg";
include("includes/print_tovar.php");
			}
		}

}
echo '</table>';

/////////////////////////////////////////
//mess_vibor($text_info);




function mess_vibor($text_sorry)
{

echo '<tr><td colspan="9" height="50"></td></tr>';
echo '<tr>';
echo 	'<td  colspan="9" valign="middle" align="center" height="60">';
echo 		'<span class="text_thanks">';
echo 		$text_sorry;
echo 		'</span>';
echo 	'</td>';
echo '</tr>';
echo '<tr><td colspan="9" height="30" ></td></tr>';
}
?>