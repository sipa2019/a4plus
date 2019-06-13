<?php
//echo $_POST['kolvo'].' - '.$_POST['id_tovar'];
// пересчитать
$conn = connectToBd();
if ($ed==-2)
{
	if (isset($_SESSION['basket']) && !empty($_SESSION['basket']))
	{
		foreach($_POST['area'] as $id_tovar=>$val)
		{
			if (is_numeric($val)) $_SESSION['basket'][$id_tovar] = $val;
		}
	}
	$content= sql_quote(trim($_POST['content']));$content = htmlspecialchars(stripslashes($content));
	$_SESSION['content'] = $content;
}
// удалить
if ($ed==-1)
{
	unset($_SESSION['basket'][$idt]);
}
// добавление товара в корзину
if (!empty($kolvo))
{
	$_SESSION['basket'][$id_tovar_zakaz]+=$kolvo;$id_tovar_zakaz=0;$kolvo=0;
}

/////////////////////////////////////////////////////////////
// корзина существует и она не пустая
////////////////////////////////////////////////////////////
if ((9==$page) && isset($_SESSION['id_pokupatel']) && !empty($_SESSION['id_pokupatel'])){
	$kopa_tot = 0;
} else {


if (isset($_SESSION['basket']) && !empty($_SESSION['basket']))
{
	$kopa_top  = 0;$sql = '';
	reset ($_SESSION['basket']);
	while (list($key, $val) = each($_SESSION['basket']))
	{
		if (!empty($key))
		{
			$sql .= $key.', ';
		}
	}
	$dlsql=strlen(trim($sql));
	if ($dlsql!=0)
	{
		$query_korzina = 'SELECT * FROM a4plus_tovar WHERE ref  in ('.$sql.' -9999) ORDER BY ord';
		$res_korzina	= mysql_query($query_korzina);if ($res_korzina == FALSE){print "ошибка из таблицы a4plus_tovar"; exit;}
		$kol = mysql_num_rows($res_korzina);
		for ($i=0; $i<$kol;$i++)
		{
			$pmore		= mysql_fetch_array($res_korzina);
			$id_tovar	= $pmore['ref'];
			$cena2		= $pmore['cena2'];
			$kopa_1 	= $_SESSION['basket'][$id_tovar]*$cena2;
			$kopa_tot	= $kopa_tot + $kopa_1;
		}
	}
}
}
echo '<TABLE WIDTH="195" height="70" BORDER=0 CELLPADDING=0 CELLSPACING=0>';
echo '<tr>';
echo 	'<td WIDTH="60" align="left" valign="middle">';
echo 		'<a href="tpl_a4.php?page=7&prf='.$prf.'" target="_parent" class="text_bag">';
echo 		'<IMG SRC="images/bag_empty.gif" ALT="" BORDER="0" align="middle">';
echo 		'</a>';
echo 	'</td>';
echo 	'<td width="135" align="left" valign="middle">';
echo 		'<a href="tpl_a4.php?page=7&prf='.$prf.'" target="_parent" class="text_bag">';
echo 			"Pirkumu grozs:<br>";
echo 			"<em class='totalSumma'>".$kopa_tot."</em> Euro";
//echo 			"summa ".$kopa_tot." Ls";
//echo 			number_format($kopa_tot, 2, '.', '')." LVL<br>";
//echo 			number_format(round($kopa_tot/0.702804,2), 2, '.', '')." Euro";
echo 		'</a>';
echo 	'</td>';
echo '</tr>';
echo '</table>';




?>
