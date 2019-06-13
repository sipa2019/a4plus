<?
$conn = connectToBd();
$id_cls=$_GET['param'];
$dll=$_GET['dll'];
$param=trim($id_cls);
$id_parent=array();
$ccicle = 0;

if (empty($param)) $param=1;
$id_parent[]=$param;

while ($param !=0)
{
	$query = "SELECT *  FROM a4plus_tovar WHERE ref = '".$param."'";
	$result = mysql_query($query);
	if ($result == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
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
$stroka_up="&nbsp;";
$kol_tot=count($id_ref);
$ident_open=0;

global $ed;


$kol_par=count($massiv_data);
// i=1 - пропускаем кансютовары в строке поиска
for ($i=1; $i<$kol_par;$i++)
{
	$level_tree	=$massiv_data[$i][0];
	$folder		=$massiv_data[$i][1];
	$identif	=$massiv_data[$i][2];
	$name		=$massiv_data[$i][3];
	$icon		=$massiv_data[$i][7];
	if ($icon == 0) $icon_pic = "/images/papka4.gif";
	if ($icon == 1) $icon_pic = "/images/papka1.gif";
	if ($icon == 2) $icon_pic = "/images/papka2.gif";
	if ($icon == 3) $icon_pic = "/images/papka3.gif";

	if ($folder==1)
	{

	$dll = $dll + strlen(trim($name));
	$key = array_search($identif, $id_ref);
	if ($key)
	{

        if ($stroka_up == "&nbsp;") {$ed = $identif;$stroka_up .= '&nbsp;<img src="'.$icon_pic.'" width="16" height="16" border="0" align="middle">&nbsp;';}
        else
        {
			if (!empty($stroka_up)) $stroka_up .= '&nbsp;<img src="'.$icon_pic.'" width="16" height="16" border="0" align="middle">&nbsp;&nbsp;';
		}
		$stroka_up .= '<a class="linktope" href="tpl_a4.php?ed='.$ed.'&amp;lang='.$lang.'&amp;page='.$page.'&amp;param='.$identif.'&amp;prf='.$prf.'" align = "left" target="_parent" >
		<span class="Linka">'.$name.'&nbsp;&nbsp;&nbsp;</span></a>';


		if ($key== $kol_tot-1)
		{
			$stroka_up .= '&nbsp;<img src="images/last_bul.gif" width="7" height="9" border="0">&nbsp;';
			$ident_open = $identif;
			break;
		}
	}

	}
}
//if ($id_cls==0) echo '<span class="precukatalogs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preču katalogs</span>';
if ($id_cls==0) echo '';
else
echo $stroka_up;



?>