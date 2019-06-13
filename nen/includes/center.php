<?
if ($page==1) {$text_smain=$text_smain1;}
if ($page==2) {$text_smain=$text_smain2;}
if ($page==3) {$text_smain=$text_smain3;}
if ($page==4) {$text_smain=$text_smain4;}
?>
<TABLE WIDTH="980"  BORDER="0" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD width="10" height="40" style="background-image:url(images/cornertopl.jpg);background-repeat:no-repeat;background-position: top left;">

		</td>
		<td width="240" height="40" style="background-image:url(images/cornertop.jpg);background-repeat:repeat-x;background-position: top left;">
&nbsp;
		</TD>
		<td width="50" height="40"  style="background-image:url(images/centertop.jpg);background-repeat:no-repeat;background-position: top left;">
&nbsp;
		</TD>
		<td width="670" height="40" style="background-image:url(images/cornertop.jpg);background-repeat:repeat-x;background-position: top left;">
&nbsp;
		</TD>
		<TD width="10" style="background-image:url(images/cornertopr.jpg);background-repeat:no-repeat;background-position: top right;">
&nbsp;
		</td>
	</tr>
	<TR>
		<TD  height="60" align="left" valign="top" width="10" style="background-image:url(images/shadowl.jpg);background-repeat:repeat-y;background-position: top left;">

		</td>
		<td width="240" height="60" align="center" valign="middle" style="background-image:url(images/menuleft_top.jpg);background-repeat:no-repeat;background-position: top left;">
<?
echo 		'<a class="stext_top" href="../tpl_a4.php?page='.$page.'" title="'.$text_smain.'" border="0">'.$text_smain.'</a>';
?>
		</TD>
		<td width="50" style="background-image:url(images/center.jpg);background-repeat:repeat-y;background-position: top left;">
&nbsp;
		</TD>
		<td width="670" style="background-image:url(images/topcentr.jpg);background-repeat:no-repeat;background-position: top left;">
<?
echo 		'&nbsp;&nbsp;&nbsp;&nbsp;<IMG SRC="images/krug.gif"  valign="middle" border="0" ALT="">';
echo 		'<a class="text_topakl" href="../tpl_a4.php?page="'.$page.'"&ed=2" title="'.$menul1.'" border="0">'.$menul1.'</a>';
echo 		'&nbsp;&nbsp;&nbsp;<IMG SRC="images/krug.gif"  valign="middle" border="0" ALT="">';
echo 		'<a class="text_topakll" href="../tpl_a4.php?page="'.$page.'"&ed=2" title="'.$menul1.'" border="0">Printer Old Line</a>';

?>

		</TD>
		<TD width="10" style="background-image:url(images/shadowr.jpg);background-repeat:repeat-y;background-position: top right;">
&nbsp;
		</td>
	</tr>
	<TR>
		<TD  height="60" align="left" valign="top" width="10" style="background-image:url(images/shadowl.jpg);background-repeat:repeat-y;background-position: top left;">

		</td>
		<td width="240" height="600" align="center" valign="top">
<?
include("includes/left_menu.php");
?>
		</TD>
		<td width="50" style="background-image:url(images/center.jpg);background-repeat:repeat-y;background-position: top left;">
&nbsp;
		</TD>
		<td width="670">
&nbsp;
		</TD>
		<TD width="10" style="background-image:url(images/shadowr.jpg);background-repeat:repeat-y;background-position: top right;">
&nbsp;
		</td>
	</tr>

</table>