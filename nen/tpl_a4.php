<?
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid', 0);
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC">
<html>
<HEAD>
<TITLE>A4 Plus SIA.Kancelejas preces.Zīmogi.Vides reklāma.Lielformāta druka.Vizītkartes.Kopēšana.</TITLE>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="index, follow">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">




<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
<link href="a4plus_style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function(){
    $('.topmenu ul li').hover(
        function() {
            $(this).addClass("active");
            $(this).find('ul').stop(true, true);
            $(this).find('ul').slideDown();
        },
        function() {
            $(this).removeClass("active");
            $(this).find('ul').slideUp('slow');
        }
    );
});
</script>


</HEAD>

<?
ini_set('arg_separator.output', '&amp;');
include("_lib.php");

//$conn = connectToBd();

if(isset($_GET['page'])) $page = $_GET['page']; else $page = 5;

if(isset($_GET['ed'])) $ed = $_GET['ed'];
else
{
	if ($page==2) $ed = 0;
}

if(isset($_GET['art'])) $art = $_GET['art']; else $art = 0;
if(isset($_GET['all_art'])) $all_art = $_GET['all_art']; else $all_art = 1;
$prf = $_GET['prf'];
$kolvo	= $_POST["kolvo"];
if(isset($_GET['sw'])) $sw = $_GET['sw']; else $sw=0;
if(isset($_GET['param'])) $param = $_GET['param']; else $param = 1;
$id_tovar_zakaz = $_POST["id_tovar"];
//echo "$id_tovar_zakaz-".$id_tovar_zakaz;
if(isset($_GET['idt'])) $idt = $_GET['idt']; else $idt=0;
if(isset($_POST['poisks'])) $_SESSION['ishem']=$_POST['poisks'];

if(isset($_POST['advfind'])) $_SESSION['advfind'] = $_POST['advfind'];
if ($_POST['advfind']==1)
{
	$_SESSION['find_nosauk']=$_POST['find_nosauk'];
	$_SESSION['find_kods']=$_POST['find_kods'];
}


$text_smain1 = "Kancelejas preces";
$text_smain5 = "Zīmogi";
$text_smain3 = "Kopiju serviss";
$text_smain4 = "Reklāmas produkcija";

$text_main5 = "Preču piegāde";
$text_main6 = "Kontaktinformācija";
$text_main7 = "Reģistrēties";
$text_main8 = "Preču piegāde";

$menul1 = "Zīmogu izgatavošana";
$menul2 = "Atbilstības tabula";
$menul3 = "Informācija";

?>
<BODY style="background-image:url(/images/topback.jpg);background-repeat:repeat-x;background-position: top left;">
<!-- ImageReady Slices (BasicMove_www.psd) -->
<div id="content" style="z-index: 1;">
<TABLE WIDTH=100% height="100%" BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD align="center" valign="top">
			<TABLE WIDTH="980" BORDER=0 CELLPADDING=0 CELLSPACING=0>
				<TR>
					<TD height="22" width="980" ALIGN="right" VALIGN="middle">
<?
include("includes/top_menu.php");
?>
					</td>
				</tr>
	<TR>
		<TD align="center" valign="top">

<TABLE WIDTH=960 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD>
			<IMG SRC="images/shapka_01.jpg" WIDTH=296 HEIGHT=72 ALT=""></TD>
		<TD>
			<IMG SRC="images/shapka_02.jpg" WIDTH=162 HEIGHT=72 ALT=""></TD>
		<TD>
			<IMG SRC="images/shapka_03.jpg" WIDTH=144 HEIGHT=72 ALT=""></TD>
		<TD>
			<IMG SRC="images/shapka_04.jpg" WIDTH=161 HEIGHT=72 ALT=""></TD>
		<TD  align="left" valign="middle" WIDTH=197 HEIGHT=72 ALT="" style="background-image:url(/images/shapka_05.jpg);background-repeat:repeat-x;background-position: top left;">
<?
//if ($page==1 || $page==7 || $page==8 || $page==10 || $page ==77 || $page ==88 || $page==99 || $page==81)
//{
include("includes/menu_bag.php");
//}
//else
//{
//	echo '&nbsp;';
//}
?>

		</TD>
	</TR>

	<TR>
		<TD>
			<IMG SRC="images/shapka_06.jpg" WIDTH=296 HEIGHT=27 ALT=""></TD>
		<TD colspan="4"  WIDTH=664 valign="left" align="top" bgcolor="#B5E754">
    <div class="topmenu" style="float:left;">
        <ul>
<?
// page=1 печаталась страница - картинка
//echo '<li><a href="../tpl_a4.php?page=1&prf='.$prf.'" title="'.$text_smain1.'" border="0">'.$text_smain1.'</a></li>';
echo '<li><a href="../tpl_a4.php?page=88&prf='.$prf.'" title="'.$text_smain1.'" border="0">'.$text_smain1.'</a></li>';
echo '<li><a href="../tpl_a4.php?page=5" title="'.$text_smain5.'" border="0">'.$text_smain5.'</a></li>';
echo '<li><a href="../tpl_a4.php?page=3" title="'.$text_smain3.'" border="0">'.$text_smain3.'</a></li>';
echo '<li><a href="../tpl_a4.php?page=4" title="'.$text_smain4.'" border="0">'.$text_smain4.'</a></li>';
?>
        </ul>
    </div>

		</TD>
	</TR>
	<TR>
		<TD>
			<IMG SRC="images/shapka_08.jpg" WIDTH=296 HEIGHT=26 ALT=""></TD>
		<TD>
			<IMG SRC="images/shapka_09.jpg" WIDTH=162 HEIGHT=26 ALT=""></TD>
		<TD>
			<IMG SRC="images/shapka_10.jpg" WIDTH=144 HEIGHT=26 ALT=""></TD>
		<TD>
			<IMG SRC="images/shapka_11.jpg" WIDTH=161 HEIGHT=26 ALT=""></TD>
		<TD>
			<IMG SRC="images/shapka_12.jpg" WIDTH=197 HEIGHT=26 ALT=""></TD>
	</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD colspan=5>
<?
include("includes/zagolovok.php");
?>
		</TD>
	</TR>
			<tr>
				<td valign="top">
<?
switch ($page)
{
case 1:include("includes/shop.php"); break;
//case 2:include("includes/zimogi.php"); break;
case 5:include("includes/kopiju.php"); break;
case 3:include("includes/kopiju.php"); break;
case 4:include("includes/kopiju.php"); break;
//case 4:include("includes/reklama.php"); break;
case 7:include("includes/shopbag.php"); break;
case 8:include("includes/reg_shop.php"); break;
case 6:include_once("includes/kontakt.php"); break;
case 9:include_once("includes/make_order.php"); break;
case 77:
case 78:
case 10:include_once("includes/shop.php"); break;
case 88:include("includes/shop.php"); break;
case 99:include_once("includes/page99.php"); break;
case 81:include("includes/page81.php"); break;
}
?>
				</td>
			</tr>

</TABLE>
		</TD>
	</TR>
</TABLE>
<div id="text"></div>
</div>
<?php
if ($page==1 || $page==77)
{
	?>
<div id="footer" >
<TABLE WIDTH="100%" height="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0"  style="background-image:url(/images/top.jpg);background-repeat:repeat-x;background-position: top left;">
<?
echo '<tr align="center"><TD WIDTH="980" ALIGN="center" VALIGN="top">';
echo '<table WIDTH="980" BORDER="0" CELLPADDING="0" CELLSPACING="0">';
echo '<tr>';
echo 	'<td width="200" align="left" valign="top"><img src="images/empty.gif" alt = "" width="3" height="20" align="top" border="0"></td>';
echo 	'<td width="93" align="left" valign="top">&nbsp;</td>';

if ($k_folder==0)
{
	if ($kolvo==0)
	{
//		if (isset($action_poisk) && !empty($action_poisk)) $text_fun=$text_navpoisk; else $text_fun = $text_sorry;
//		mess_vibor($text_fun);
	}
	else
	{
echo 	'<td align="left" width="217">';
		$prf=$_GET['prf'];
		if ($prf==1) {$imgphoto="bildembez.jpg";$newprf=0;$kol_page=25;} else {$imgphoto="bildemar.jpg";$newprf=1;$kol_page=25;}

echo 	'<a href="tpl_a4.php?ed='.$ed.'&amp;page='.$page.'&amp;all_art='.$all_art.'&amp;param='.$param.'&amp;prf='.$newprf.'" target="_parent" >';
echo 		'<img src="images/'.$imgphoto.'" alt="" border="0" />';
echo 	'</a>';
echo 	'</td>';
echo 	'<td align="left">';

		$count=1;
		if ($all_art==0) $all_art=1;if ($all_art==1) $prev=0;
		$next=$all_art+$kol_page;$prev=$all_art-$kol_page;
		if ($prev>0)
		{
echo '<a href="tpl_a4.php?ed='.$ed.'&amp;lang='.$lang.'&amp;page='.$page.'&amp;all_art='.$prev.'&amp;param='.$param.'&amp;prf='.$prf.'"><img src="images/krugred2.gif" border="0" alt="" align="middle" width="18" height="12"></a>';
		}
		for ($pp=1; $pp<$kolvo+1; $pp=$pp+$kol_page)
		{
			if ($all_art==$pp) $cla="katalog_a"; else $cla="katalog";
echo '<a href="tpl_a4.php?ed='.$ed.'&amp;lang='.$lang.'&amp;page='.$page.'&amp;all_art='.$pp.'&amp;param='.$param.'&amp;prf='.$prf.'" class="'.$cla.'">'.$count.'</a> | ' ;
			$count++;
		}
		if ($next<=$kolvo)
		{
echo '<a href="tpl_a4.php?ed='.$ed.'&amp;lang='.$lang.'&amp;page='.$page.'&amp;all_art='.$next.'&amp;param='.$param.'&amp;prf='.$prf.'"><img src="images/krugred.gif" border="0" align="middle" width="18" height="12" alt=""></a>';
		}
	}
}
echo 	'</td>';
echo '</tr>';
echo '</table>';
echo '</td></tr>';
?>
</table></div>
<?}
else
{




	//echo $text_adress;
	include_once("includes/view/footer1.php");
}
?>
</BODY>
</HTML>
