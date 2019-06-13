<?
echo '<table width="980" border="0" cellpadding="0" cellspacing="0">';
echo	'<tr>';
echo 		'<td width="240" align="left" valign="top">';
include("includes/left_menu.php");
echo 		'</td>';
echo 		'<td width="77" align="left" valign="top">';
echo 		'</td>';
echo 		'<td width="603" align="left" valign="top">';

switch ($ed)
{

case 0:include_once("includes/main.php"); break;
case 1:include_once("includes/diller.php"); break;
case 2:include_once("includes/tabula.php"); break;
case 3:include_once("includes/zimogi_info.php"); break;
//case 4:include_once("includes/history.php"); break;
}


echo		'</td>';
echo 		'<td width="60" align="left" valign="top">';
echo 		'</td>';
echo	'</tr>';
echo '</table>';
?>