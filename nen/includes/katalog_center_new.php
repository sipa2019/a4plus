<?php
$id_cls=$_GET['param'];
$dlina=$_GET['dll']*10;
//echo $_GET['param'];
//include("includes/_libms.php");
//include("_lib.php");
//$conn = connectToBd();
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
ShowTree($param, 0, $ed, $prf);
echo 	'</td>';
echo '</tr>';
echo	'<tr>';
echo		'<td colspan=2 height="20">&nbsp;</td>';
echo 	'</tr>';
echo '</table>';



function ShowTree($ParentID, $lvl, $ed, $prf) {

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
echo ('<A HREF="tpl_a4.php?ed='.$ed.'&amp;param='.$ID1.'&amp;page=1&amp;prf='.$prf.'" target="_parent" class="katalog">'.$row["name_tovar"].'</A>');
//echo("<A HREF=\""."?param=".$ID1."\">".$row["description"]."</A>"." \n");
ShowTree($ID1, $lvl, $ed, $prf);
$lvl--;
}
echo "</UL>\n";
}

}
