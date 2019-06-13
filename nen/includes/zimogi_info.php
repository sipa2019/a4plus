<?
$conn = connectToBd();
$query = "SELECT * FROM shiny_text WHERE id_razdel = '5'";

$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе товара из таблицы INFO"; exit;}

$p = mysql_fetch_array($result);
$foto_sm 				= trim($p['foto_sm']);


//$text_pdf = "Dīlera asortiments .PDF";

echo			'<table width="600" border="0" cellpadding="0" cellspacing="0">';
echo		 		'<tr>';
echo 					'<td align="center" valign="top">';
echo 						'<IMG SRC="foto/'.$foto_sm.'" WIDTH="600" ALT="" align="top" border="0">';
echo		 			'</td>';
echo 				'</tr>';
echo		 		'<tr>';
echo 					'<td height="20" >';
echo 						'&nbsp;';
echo		 			'</td>';
echo 				'</tr>';
echo 			'</table>';