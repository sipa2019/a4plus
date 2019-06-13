<?php
session_start();
if (!isset($_SESSION['okenter'])) include "auth.php";
$progGoTo = $_SERVER['PHP_SELF'];
include_once("_liba4.php");
$conn = connectToBd();
?>
<style type="text/css">
.textmenu {
	padding: 7px 7px;
	font: 16px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #4A4A4B;
}
a.kateg {
	padding: 7px 7px;
	font: 16px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #4A4A4B;
}
a.kateg:hover {
	color: #029F02;
}
a.kateg_act {
	padding: 7px 7px;
	font: 16px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #333EA0;
}
a.linkmenu {
	padding: 2px;
	font: 12px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #FD5401;
}
a.linkmenu:hover {
	color: #F0AA01;
}
.pdate {
	padding: 2px;
	font: 10px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #029F02;
}
a.katalog {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #001D3A;
}
a.katalog:hover {
	color: #F00208;
	text-decoration: underline;
}
a.katalog:visited {
	color: #1A548D;
}
a.katalog_a {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #F00208;
}
.katalog {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #001D3A;
}
a.navcom {
	font: 12px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #FE0006;
}
a.navcom:hover {
	color:#4C9A00;
	text-decoration: underline;
}
.nav {
	font: 12px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #ffffff;
}
.bott_tabl {
    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-bottom-color: #C6C8D1;
}
</style>
<?

// определение начальных условий
$id_parent=array();$ccicle = 0;
$id_cls=$_GET['param'];
$param=trim($id_cls);if (empty($param)) $param='1';
$id_parent[]=$param;

while ($param !='0')
{
	$query = "SELECT *  FROM a4plus_tovar WHERE ref = '".$param."'";
	$result = mysql_query($query);if ($result == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
	$kol_ref = mysql_num_rows($result);
	if ($kol_ref==0)
	{
//
echo "не найден идентификатор родителя, обнуляем массив";
//
		$id_parent=array();
		break;
	}
	$pm = mysql_fetch_array($result);
	$param = trim($pm['ref_parent']);
//
//echo '<br>ref_parent-'.$param.'<br>';
//
	$id_parent[]=$param;
	$ccicle++;
	if ($ccicle>10)
	{
		echo "ошибка в ref-parent=зацикливание";exit;
		$id_parent=array();
		break;
	}

}

$id_ref = array_reverse($id_parent);
$massiv_data=array();
$massiv_data=processCategories(0, $id_ref, $sel);


$kol_par=count($massiv_data);
?>
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" valign="top" >
			<TABLE width="960" border="0" cellpadding="0" cellspacing="0" bgcolor="#F3F7AF">
<?
for ($i=0; $i<$kol_par;$i++)
{
	$level_tree	=$massiv_data[$i][0];
	$folder		=$massiv_data[$i][1];
	$identif	=$massiv_data[$i][2];
	$name		=$massiv_data[$i][3];

// определение картинок для плюсов-минусов и где располагаются усики
	if ($i==0) {$pic_plus="/images/fplus.gif";$pic_minus="/images/fminus.gif";}
	$pic_plus="/images/tplus.gif";$pic_minus="/images/tminus.gif";
	if ($i==$kol_par-1)
	{
		$pic_plus="/images/lplus.gif";$pic_minus="/images/lminus.gif";
	}
	else
	{
		if ($level_tree!=$massiv_data[$i+1][0])	{$pic_plus="/images/lplus.gif";$pic_minus="/images/lminus.gif";}
	}
	if (in_array($identif, $id_ref))  {$picture_pm=$pic_minus;$catlink="katalog_a";$picture_f="/images/knopkavib.gif";}
	else {$picture_pm=$pic_plus;$catlink="katalog";$picture_f="/images/help_close.gif";}

// определение картинок для самих знаний.

	if ($folder==0)
	{
		$picture_f="/images/picnofolder.gif";$picture_pm="/images/tminus.gif";
	}

echo 	'<tr>';
echo 		'<td width="50%" align="left" nowrap class="bott_tabl">';

	for ($x=0; $x<$level_tree;$x++)
	{
echo 	'<img src="/images/i.gif" width="16" height="16" border="0" align="middle" alt="">';
	}

//echo '</td>';
//echo '<td  align=left>';
echo 			'<img src="'.$picture_pm.'" width="16" height="16" border="0" align="middle" alt="">';
//echo '</td>';
//echo '<td  align=left>';
echo 			'<img src="'.$picture_f.'" width="16" height="16" border="0" align="middle" alt="">';
if ($folder==1)
{
echo 			'<a href="admin.php?param='.$identif.'&amp;mainm=11" target="_parent" class="'.$catlink.'">';
echo 			$name;
echo 			'</a>';
}
else
{
echo 			'<span class="katalog">';
echo 			$name;
echo 			'</span>';

}
echo 		'</td>';
echo 		'<td width="50%" align="left" class="bott_tabl">';

if ($folder==1)
{
echo 			'<a href="addedit_tovar.php?param='.$identif.'&amp;mainm=11&amp;paramadd=add" target="_parent" class="navcom">';
echo 			'<img src="/images/add-16.png" width="16" height="16" border="0" align="middle" alt="">';
echo 				'add';
echo 			'</a>';
}
else
{
echo 			'<img src="/images/spacer.gif" width="16" height="16" border="0" align="middle" alt="">';
echo 			'<span class="nav">add</span>';
}
echo 			'&nbsp;&nbsp;&nbsp;';
echo 			'<a href="addedit_tovar.php?param='.$identif.'&amp;mainm=11&amp;paramadd=edit" target="_parent" class="navcom">';
echo 			'<img src="/images/edit2.png" width="16" height="16" border="0" align="middle" alt="">';
echo 				'edit';
echo 			'</a>';
echo 			'&nbsp;&nbsp;&nbsp;';
echo 			'<a href="del_more.php?param='.$identif.'&amp;page=1" target="_parent" class="navcom">';
echo 			'<img src="/images/delete-16.png" width="16" height="16" border="0" align="middle" alt="">';
echo 				'del';
echo 			'</a>';
echo 			'&nbsp;&nbsp;&nbsp;';


echo 		'</td>';
echo 	'</tr>';

}

?>
</table>
</td>
</tr>
</table>
<?
////////////////////////////////////
// серединка
////////////////////////////////////


function processCategories($level, $path, $sel)
{
	//returns an array of categories, that will be presented by the category_navigation.tpl template
	//$categories[] - categories array
	//$level - current level: 0 for main categories, 1 for it's subcategories, etc.
	//$path - path from root to the selected category (calculated by calculatePath())
	//$sel -- categoryID of a selected category
	//returns an array of (categoryID, name, level)
	//category tree is being rolled out "by the path", not fully
	$out = array();
	$cnt = 0;
//	$parent = $path[$level];
//	if ( $parent == "" || $parent == null )
//		$parent = "NULL";
	$query = "SELECT ref, isfolder, name_tovar FROM a4plus_tovar WHERE ref_parent='".$path[$level]."' ORDER by ord";
//echo 	'<br>'.$query.'<br>';

    $res = mysql_query($query);
	if ($res == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
	$kol_ref = mysql_num_rows($res);

	for ($ib=0; $ib<$kol_ref;$ib++)
	{
		$row = mysql_fetch_array($res);
//    while ($row = db_fetch_row($res))
//	{
		$out[$cnt][0] = $level;
		$out[$cnt][1] = $row["isfolder"];
		$out[$cnt][2] = $row["ref"];
		$out[$cnt][3] = $row["name_tovar"];
		$cnt++;
		//process subcategories?
		if ($level+1<count($path) && $row["ref"] == $path[$level+1])
		{
			$sub_out = processCategories($level+1,$path,$sel);
			//add $sub_out to the end of $out
			for ($j=0; $j<count($sub_out); $j++)
			{
				$out[] = $sub_out[$j];
				$cnt++;
			}
		}
	}
	return $out;
} //processCategories
?>


