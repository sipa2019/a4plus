<?
$conn = connectToBd();
$nav1 ="navigation";
if ($page==1) $text_main = $text_smain1;
if ($page==2) $text_main = $text_smain2;
if ($page==3) $text_main = $text_smain3;
if ($page==4) $text_main = $text_smain4;
if ($page==5) $text_main = $text_smain5;
if ($page==6) $text_main = $text_main6;
if ($page==7) $text_main = $text_smain1;
if ($page==8) $text_main = $text_smain1;
if ($page==10) $text_main = $text_smain1;
if ($page==77) $text_main = $text_smain1;
if ($page==78) $text_main = $text_smain1;
if ($page==88) $text_main = $text_smain1;
if ($page==99) $text_main = $text_smain1;
if ($page==81) $text_main = $text_smain1;
if ($page!=1 && $page!=7 && $page!=8 && $page!=10 && $page !=77 && $page !=78 && $page !=88 && $page !=99 && $page !=81)
// любой другой режим, кроме канц.товаров
{
echo	'<table width="980" border="0" cellpadding="0" cellspacing="0">';
echo 		'<tr>';
echo 			'<td width="45">&nbsp;</td>';
echo 			'<td width="240" HEIGHT="22" align="left">&nbsp;';
echo 				'<a href="../tpl_a4.php?page='.$page.'" title="'.$text_main.'" border="0" class="'.$nav1.'">';
echo '<strong>';
echo 					$text_main;
echo '</strong>';
echo 				'</a>';
echo 			'</td>';
echo 			'<td  align="left"  width="695">';
if ($page==2)
{
	$text_otra = "";
	$nav2 ="navigation_akt";
	if ($ed==1) {$text_otra = $menul1;$nav1="navigation";}
	if ($ed==2) {$text_otra = $menul2;$nav1="navigation";}
	if ($ed==3) {$text_otra = $menul3;$nav1="navigation";}

	$text_razdel = "";
	$nav3 ="navigation_akt";
	if ($art!=0)
	{
		$query = "SELECT * FROM shiny_catalog WHERE number_page = '$art'";
		$result = mysql_query($query);
		if ($result == FALSE){print "ошибка при выборе страницы каталога"; exit;}
		$p = mysql_fetch_array($result);
		$name_page 	= trim($p['name_page']);
		$text_razdel = $name_page;$nav2="navigation";
	}

	if (!empty($text_otra))
	{
echo 				'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;&nbsp;';
echo 				'<a href="../tpl_a4.php?page='.$page.'&amp;ed='.$ed.'" title="'.$text_otra.'" border="0" class="'.$nav2.'">
					'.$text_otra.'</a>&nbsp;';
	}
	if (!empty($text_razdel))
	{
echo 				'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo 				'<a href="../tpl_a4.php?page='.$page.'&amp;ed='.$ed.'&amp;art='.$art.'" title="'.$text_razdel.'" border="0" class="'.$nav3.'">
					'.$text_razdel.'</a>&nbsp;';
	}
}
if ($page==3 || $page==4 || $page==5)
{
// пункт левого меню
	if ($ed==-1)
	{
		$text_razdel = "Video prezentācija";
	}
	else
	{
		if ($ed==0) $queryr = "SELECT * FROM a4plus_razdel WHERE hide='0' AND id_menu=".$page." ORDER BY ord";

		else $queryr = "SELECT * FROM a4plus_razdel WHERE id_razdel = '".$ed."'";
//echo $queryr;
		$resultr = mysql_query($queryr);if ($resultr == FALSE){print "ошибка при выборе a4plus_razdel"; exit;}
		$pr = mysql_fetch_array($resultr);

		$nav2 ="navigation_akt";
		$text_razdel = $pr['name_razdel'];

		$querya = "SELECT * FROM a4plus_podrazdel WHERE hide='0' AND id_razdel = '".$ed."' ORDER BY ord";
//echo $queryr;
		$resulta = mysql_query($querya);
		if ($resulta == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
		$kola=mysql_num_rows($resulta);
		if ($kola>1 && $art==0)
		{
			$text_podrazdel = "";
		}
		else
		{
			if ($art==0)
			{
				$pa = mysql_fetch_array($resulta);
				$art= trim($pa['id_podrazdel']);
			}
			$queryb = "SELECT * FROM a4plus_podrazdel WHERE id_podrazdel = '".$art."'";
//echo $queryr;
			$resultb = mysql_query($queryb);
			if ($resultb == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
			$pb = mysql_fetch_array($resultb);
			$text_podrazdel = trim($pb['name_podrazdel']);
			$nav2 ="navigation";
			$nav3 ="navigation_akt";
		}
	}

	if ($page==5 && $ed==0)
	{}
	else
	{
		if (empty($text_podrazdel)) $nav2 ="navigation_akt";

echo		'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo		'<a href="../tpl_a4.php?page='.$page.'&amp;ed='.$ed.'" title="'.$text_razdel.'" border="0" class="'.$nav2.'">
			'.$text_razdel.'</a>&nbsp;';

		if (!empty($text_podrazdel))
		{

echo	 	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;&nbsp;';
echo 		'<a href="../tpl_a4.php?page='.$page.'&amp;ed='.$ed.'&amp;art='.$art.'" title="'.$text_podrazdel.'" border="0" class="'.$nav3.'">
			'.$text_podrazdel.'</a>&nbsp;';
    	}
    }


}
echo 			'</td>';
echo 		'</tr>';
echo 		'<tr>';
echo 			'<td colspan="4" width="980" align="center" height="10" valigh="middle">';
echo 				'<IMG SRC="images/linetop.jpg" WIDTH="960" HEIGHT="2" ALT="">';
echo 			'</td>';
echo 		'</tr>';
echo 		'<tr>';
echo 			'<td colspan="4" width="980" height="20" >';
echo 				'&nbsp;';
echo 			'</td>';
echo 		'</tr>';
echo 	'</table>';
}
else
{
echo	'<table width="980" border="0" cellpadding="0" cellspacing="0">';
echo 		'<tr>';
echo 			'<td width="20">&nbsp;</td>';
echo 			'<td width="265" HEIGHT="15" align="left">&nbsp;';
echo 				'<a href="../tpl_a4.php?page=1&prf='.$prf.'" title="'.$text_main.'" border="0" class="'.$nav1.'">';
echo '<strong>';
echo 					$text_main;
echo '</strong>';
echo 				'</a>';
echo 			'</td>';
echo 			'<td  align="left" width="695">';


	switch ($page)
	{
	case 1:include("includes/command_stroka.php"); break;
	case 10:
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<a href="../tpl_a4.php?page=10&prf='.$prf.'" title="Preču piegāde" border="0" class="navigation">
		Preču piegāde</a>&nbsp;';
	break;
	case 81:
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<a href="../tpl_a4.php?page=81&prf='.$prf.'" title="Jūsu info" border="0" class="navigation">
		Reģistrācijas forma mainīt</a>&nbsp;';
	break;
	case 7:
	case 8:
	case 99:
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<a href="../tpl_a4.php?page=88&prf='.$prf.'" title="Preču katalogs" border="0" class="navigation">
		Preču katalogs</a>&nbsp;';

		if ($page==7) $nav1="navigation_akt";
		if ($page==8) $nav1="navigation";
		if ($page==99) $nav1="navigation";
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<a href="../tpl_a4.php?page=7&prf='.$prf.'" title="Pirkumu grozs" border="0" class="'.$nav1.'">Pirkumu grozs</a>&nbsp;';

		if ($page==8 || $page==99)
		{
			if ($page==8) 	$nav2="navigation_akt";
			if ($page==99) 	$nav2="navigation";

echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<a href="../tpl_a4.php?page=8&prf='.$prf.'" title="Autorizācija" border="0" class="'.$nav2.'">Autorizācija</a>&nbsp;';
			if ($page==99)
			{
				$nav3="navigation_akt";
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<a href="../tpl_a4.php?page=99&prf='.$prf.'" title="Autorizācija" border="0" class="'.$nav3.'">Aizmirsāt paroli</a>&nbsp;';
			}
		}
	break;
	case 77:
		$nav1="navigation_akt";
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<span class="'.$nav1.'">Meklēšana</span>&nbsp;';
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
if ($_SESSION['advfind']==1)
{
	echo	'<span class="'.$nav1.'">'.$_SESSION['find_nosauk'].' | '.$_SESSION['find_kods'].'</span>&nbsp;';
}
else
{
	echo	'<span class="'.$nav1.'">'.$_SESSION['ishem'].'</span>&nbsp;';
}
	break;
	case 78:
		$nav1="navigation_akt";
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<span class="'.$nav1.'">Meklēšana</span>&nbsp;';
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<span class="'.$nav1.'">Paplašināta meklēšana</span>&nbsp;';
	break;

	case 88:
echo	'&nbsp;&nbsp;<IMG SRC="images/red_krug.jpg" WIDTH="18" height="12" ALT="" border="0">&nbsp;&nbsp;';
echo	'<a href="../tpl_a4.php?page=88&prf='.$prf.'" title="Preču katalogs" border="0" class="navigation">
		Preču katalogs</a>&nbsp;';
	break;
	}

echo 			'</td>';
echo 		'</tr>';
echo 		'<tr>';
echo 			'<td colspan="3" width="980" align="center" height="7" valigh="middle">';
echo 				'<IMG SRC="images/linetop.jpg" WIDTH="960" HEIGHT="2" ALT="">';
echo 			'</td>';
echo 		'</tr>';

echo 	'</table>';

}

?>