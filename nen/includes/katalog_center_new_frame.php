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
<link href="../a4plus_style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" type="text/javascript"></script>
<?
$id_cls=$_GET['param'];
$dlina=$_GET['dll']*10;

include("../_lib.php");
$conn = connectToBd();
$id_parent=array();
$ccicle = 0;
$param=trim($id_cls);
$kolrow =0;

if (empty($param)) {$param='1';$dlina=140;}
echo '<table width="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" style="border: 1px solid #738375;">';
echo	'<tr>';
echo		'<td colspan=2 height="20" class="tabletovar">&nbsp;</td>';
echo 	'</tr>';
echo 	'<tr>';
echo 	'<td width="114" >&nbsp;</td>';
echo 	'<td align="left">';
ShowTree($param, 0, $ed);
echo 	'</td>';
echo '</tr>';
echo	'<tr>';
echo		'<td colspan=2 height="20">&nbsp;</td>';
echo 	'</tr>';
echo '</table>';



function ShowTree($ParentID, $lvl, $ed) {

global $link;
global $lvl;
$lvl++;


$stylefold = "fold".$lvl;
//echo '$lvl-'.$stylefold.'<br>';
$query = "SELECT ref, isfolder, name_tovar, icon_folder FROM a4plus_tovar WHERE ref_parent='".$ParentID."' and isfolder='1' AND hide = '0' ORDER by ord";
$result = mysql_query($query);if ($result == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
if (mysql_num_rows($result) > 0) {
echo "<UL class=".$stylefold.">\n";
while ( $row = mysql_fetch_array($result) ) {
$ID1 = $row["ref"];
$icon = $row["icon_folder"];
if ($icon == 0) $icon_pic = "/images/papka4.gif";
if ($icon == 1) $icon_pic = "/images/papka1.gif";
if ($icon == 2) $icon_pic = "/images/papka2.gif";
if ($icon == 3) $icon_pic = "/images/papka3.gif";


echo "<LI>\n";

echo ('<img src="'.$icon_pic.'" width="16" height="16" border="0" align="middle" alt="">&nbsp;');
echo ('<A HREF="../tpl_a4.php?param='.$ID1.'&amp;page=1" target="_parent" class="katalog">'.$row["name_tovar"].'</A>');
//echo("<A HREF=\""."?param=".$ID1."\">".$row["description"]."</A>"." \n");
ShowTree($ID1, $lvl, $ed);
$lvl--;
}
echo "</UL>\n";
}

}
