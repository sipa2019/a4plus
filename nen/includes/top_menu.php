<?
$text_main81 = "Jūsu info";
$atop1 = "text_toptop";
$atop2 = "text_toptop";
$atop8 = "text_toptop";
if ($page==10) 	{$atop1 = "text_toptopakt";}
if ($page==6) 	{$atop2 = "text_toptopakt";}
if ($page==8) 	{$atop8 = "text_toptopakt";}
//if ($page==81) 	{$atop3 = "text_toptopakt";}
?>
<TABLE WIDTH="980" height="22" BORDER="0" CELLPADDING="0" CELLSPACING="0" >
	<tr>
		<td align="right" valign="middle">
<?
if ($page==1 || $page==88 || $page==77 || $page==78 || $page==10)
{
echo 		'<a class="'.$atop1.'" href="../tpl_a4.php?page=10&prf='.$prf.'" title="'.$text_main8.'" border="0">'.$text_main8.'</a>';
}
echo 		'<a class="'.$atop8.'" href="../tpl_a4.php?page=8" title="'.$text_main7.'" border="0">'.$text_main7.'</a>';

echo 		'<a class="'.$atop2.'" href="../tpl_a4.php?page=6" title="'.$text_main6.'" border="0">'.$text_main6.'</a>';
//if (isset($_SESSION['id_pokupatel']) && $_SESSION['id_pokupatel']!=0)
//{
//echo 		'<a class="'.$atop3.'" href="../tpl_a4.php?page=81" title="'.$text_main3.'" border="0">'.$text_main81.'</a>';
//}
?>
		</td>
		<td WIDTH="48" align="left" valign="top">
			<IMG SRC="images/spacer.gif"  WIDTH="48" height="22" ALT="">
		</td>
	</tr>
</table>