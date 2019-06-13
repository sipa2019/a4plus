<?
$conn = connectToBd();
$query = "SELECT * FROM shiny_pdf WHERE number_cat = '1'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
$p = mysql_fetch_array($result);

$name_sm 	= trim($p['name_sm']);
$name_big 	= trim($p['name_big']);
$foto_sm 	= trim($p['foto_sm']);
$foto_big 	= trim($p['foto_big']);


if ($ed==1)
{
//$text_pdf = "Dīlera asortiments .PDF";
$name_book = "foto/".$foto_sm;
$text_pdf = $name_sm;

$name_paraug = "foto/".$foto_big;
$paraug_pdf = $name_big;


}
if ($art==0)
{
echo			'<table width="600" border="0" cellpadding="0" cellspacing="0">';
echo		 		'<tr>';
echo 					'<td colspan="3" width="600" HEIGHT="79" align="left" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=1" onMouseOver="document.pic1.src='images/btn1h.jpg'" onMouseOut="document.pic1.src='images/btn1.jpg'">
							<IMG SRC="images/btn1.jpg" WIDTH="600" HEIGHT="79" ALT="" align="middle" border="0" NAME="pic1">
							</a>
<?
echo		 			'</td>';
echo 				'</tr>';

echo		 		'<tr>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=4" onMouseOver="document.pic4.src='images/btn4h.jpg'" onMouseOut="document.pic4.src='images/btn4.jpg'">
							<IMG SRC="images/btn4.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic4">
							</a>
<?
echo		 			'</td>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=5" onMouseOver="document.pic5.src='images/btn5h.jpg'" onMouseOut="document.pic5.src='images/btn5.jpg'">
							<IMG SRC="images/btn5.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic5">
							</a>
<?
echo 					'</td>';
echo		 			'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=6" onMouseOver="document.pic6.src='images/btn6h.jpg'" onMouseOut="document.pic6.src='images/btn6.jpg'">
							<IMG SRC="images/btn6.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic6">
							</a>
<?
echo 					'</td>';
echo 				'</tr>';
echo		 		'<tr>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=7" onMouseOver="document.pic7.src='images/btn7h.jpg'" onMouseOut="document.pic7.src='images/btn7.jpg'">
							<IMG SRC="images/btn7.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic7">
							</a>
<?
echo		 			'</td>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=8" onMouseOver="document.pic8.src='images/btn8h.jpg'" onMouseOut="document.pic8.src='images/btn8.jpg'">
							<IMG SRC="images/btn8.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic8">
							</a>
<?
echo 					'</td>';
echo		 			'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=9" onMouseOver="document.pic9.src='images/btn9h.jpg'" onMouseOut="document.pic9.src='images/btn9.jpg'">
							<IMG SRC="images/btn9.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic9">
							</a>
<?
echo 					'</td>';
echo 				'</tr>';
echo		 		'<tr>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=10" onMouseOver="document.pic10.src='images/btn10h.jpg'" onMouseOut="document.pic10.src='images/btn10.jpg'">
							<IMG SRC="images/btn10.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic10">
							</a>
<?
echo		 			'</td>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=11" onMouseOver="document.pic11.src='images/btn11h.jpg'" onMouseOut="document.pic11.src='images/btn11.jpg'">
							<IMG SRC="images/btn11.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic11">
							</a>
<?
echo 					'</td>';
echo		 			'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=12" onMouseOver="document.pic12.src='images/btn12h.jpg'" onMouseOut="document.pic12.src='images/btn12.jpg'">
							<IMG SRC="images/btn12.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic12">
							</a>
<?
echo 					'</td>';
echo 				'</tr>';
echo		 		'<tr>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=13" onMouseOver="document.pic13.src='images/btn13h.jpg'" onMouseOut="document.pic13.src='images/btn13.jpg'">
							<IMG SRC="images/btn13.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic13">
							</a>
<?
echo		 			'</td>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=14" onMouseOver="document.pic14.src='images/btn14h.jpg'" onMouseOut="document.pic14.src='images/btn14.jpg'">
							<IMG SRC="images/btn14.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic14">
							</a>
<?
echo 					'</td>';
echo		 			'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=15" onMouseOver="document.pic15.src='images/btn15h.jpg'" onMouseOut="document.pic15.src='images/btn15.jpg'">
							<IMG SRC="images/btn15.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic15">
							</a>
<?
echo 					'</td>';
echo 				'</tr>';
echo		 		'<tr>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=16" onMouseOver="document.pic16.src='images/btn16h.jpg'" onMouseOut="document.pic16.src='images/btn16.jpg'">
							<IMG SRC="images/btn16.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic16">
							</a>
<?
echo		 			'</td>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=17" onMouseOver="document.pic17.src='images/btn17h.jpg'" onMouseOut="document.pic17.src='images/btn17.jpg'">
							<IMG SRC="images/btn17.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic17">
							</a>
<?
echo 					'</td>';
echo		 			'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=18" onMouseOver="document.pic18.src='images/btn18h.jpg'" onMouseOut="document.pic18.src='images/btn18.jpg'">
							<IMG SRC="images/btn18.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic18">
							</a>
<?
echo 					'</td>';
echo 				'</tr>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=19" onMouseOver="document.pic19.src='images/btn19h.jpg'" onMouseOut="document.pic19.src='images/btn19.jpg'">
							<IMG SRC="images/btn19.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic19">
							</a>
<?
echo		 			'</td>';
echo 					'<td width="200" HEIGHT="79" align="centr" valign="middle">';
?>
							<a href="../tpl_a4.php?page=2&amp;ed=<? echo $ed; ?>&amp;art=20" onMouseOver="document.pic20.src='images/btn20h.jpg'" onMouseOut="document.pic20.src='images/btn20.jpg'">
							<IMG SRC="images/btn20.jpg" WIDTH="196" HEIGHT="75" ALT="" align="middle" border="0" NAME="pic20">
							</a>
<?
echo 					'</td>';
echo 					'<td  width="200" align="right" valign="middle">';
echo 						'<a href='.$name_book.' target="_blank" class="left_menu_new">';
echo 						$text_pdf;
echo 						'</a>';
echo 						'<br>';
echo 						'<a href='.$name_paraug.' target="_blank" class="left_menu_new">';
echo 						$paraug_pdf;
echo 						'</a>';
echo 					'&nbsp;</td>';
echo 				'</tr>';
echo 			'</table>';
}
else
{
	$conn = connectToBd();
	$query = "SELECT * FROM shiny_catalog WHERE number_page = '$art'";
	$result = mysql_query($query);
	if ($result == FALSE){print "ошибка при выборе страницы каталога"; exit;}
	$p = mysql_fetch_array($result);
	$lapa_print = trim($p['foto_sm']);
	$pdf_print = trim($p['foto_big']);

echo			'<table width="600" border="0" cellpadding="0" cellspacing="0">';
if (!empty($pdf_print))
{
echo		 		'<tr>';
echo 					'<td height="20" align="left">&nbsp;';
echo 						'<a href="../foto/'.$pdf_print.'" target="_blank" class="left_menu_new">';
echo 						'paraugi.pdf';
echo 						'</a>';
echo		 			'</td>';
echo 				'</tr>';
}
echo		 		'<tr>';
echo 					'<td align="center" valign="top">';
echo 						'<IMG SRC="foto/'.$lapa_print.'" WIDTH="600" ALT="" align="top" border="0">';
echo		 			'</td>';
echo 				'</tr>';
echo		 		'<tr>';
echo 					'<td height="20" >';
echo 						'&nbsp;';
echo		 			'</td>';
echo 				'</tr>';
echo 			'</table>';
}