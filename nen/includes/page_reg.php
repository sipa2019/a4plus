<?
if (!empty($error_email))		$pic1 = '<IMG SRC="images/errsmall.jpg" WIDTH=16 HEIGHT=16 border=0 ALT="" align="middle">&nbsp;'; else $pic1 = '';
if (!empty($error_password)) 	$pic2 = '<IMG SRC="images/errsmall.jpg" WIDTH=16 HEIGHT=16 border=0 ALT="" align="middle">&nbsp;'; else $pic2 = '';
if (!empty($error_vards)) 		$pic3 = '<IMG SRC="images/errsmall.jpg" WIDTH=16 HEIGHT=16 border=0 ALT="" align="middle">&nbsp;'; else $pic3 = '';
if (!empty($error_telefon))		$pic4 = '<IMG SRC="images/errsmall.jpg" WIDTH=16 HEIGHT=16 border=0 ALT="" align="middle">&nbsp;'; else $pic4 = '';

$iEmail	= "E-pasts:*:";
$iPass 	= "Parole*:";
$iPass2	= "Atkārtojiet paroli*:";

$iNosauk= "Nosaukums:";
$iPvn	= "Vienotais Reģ.Nr.:";
$iReg	= "Registracijas numurs:";
$iJuradr= "Juridiskā adrese:";
$iPieadr= "Saņēmēja adrese:";

$iBnos	= "Bankas nosaukums:";
$iBkod	= "Bankas kods:";
$iBkon	= "Bankas konta Nr.:";

$iVards	= "Vārds, uzvārds*:";
$iTal	= "Tālrunis*:";
$iFakss	= "Fakss:";

?>
<form action="tpl_a4.php?page=<? echo $page; ?>" method=post>
	<table width="765" cellpadding="0" cellspacing="0" style="border: 1px solid #D0EC97">
		<tr>
			<td width=125 height="20">&nbsp;</td>
			<td width="180">&nbsp;</td>
			<td width="450">&nbsp;</td>
			<td width=10>&nbsp;</td>
		</tr>
		<tr>
			<td ><span class="text_error">&nbsp;&nbsp;<? echo $pic1.$error_email; ?></span></td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iEmail; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rEmail" value="<? echo $_POST['rEmail']; ?>" size="70" maxlength="100">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td ><span class="text_error">&nbsp;&nbsp;<? echo $pic2.$error_password; ?></td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iPass; ?></span>
			</td>
			<td align="left" valign="top">
				<input type="password" class="input" name="rPass" value="<? echo $_POST['rPass']; ?>" size="20" maxlength="20">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iPass2; ?></span>
			</td>
			<td align="left" valign="top">
				<input type="password" class="input" name="rPass2" value="<? echo $_POST['rPass2']; ?>" size="20" maxlength="20">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" width=765 height="20">&nbsp;</td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iNosauk; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rNosauk" value="<? echo $_POST['rNosauk']; ?>" size="70" maxlength="200">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iPvn; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rPvn" value="<? echo $_POST['rPvn']; ?>" size="70" maxlength="100">
			</td>
			<td >&nbsp;</td>
		</tr>


		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iJuradr; ?></span>
			</td>
			<td align="left" valign="top">
				<textarea name="rJuradr"  style="width: 95%; height: 3em">
				<? echo $_POST['rJuradr']; ?></textarea>
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iPieadr; ?></span>
			</td>
			<td align="left" valign="top">
				<textarea name="rPieadr"  style="width: 95%; height: 3em">
				<? echo $_POST['rPieadr']; ?></textarea>
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iBnos; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rBnos" value="<? echo $_POST['rBnos']; ?>" size="70" maxlength="200">
			</td>
			<td >&nbsp;</td>
		</tr>

		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iBkon; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rBkon" value="<? echo $_POST['rBkon']; ?>" size="70" maxlength="100">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" width=765 height="20">&nbsp;</td>
		</tr>
		<tr>
			<td ><span class="text_error">&nbsp;&nbsp;<? echo $pic3.$error_vards; ?></td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iVards; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rVards" value="<? echo $_POST['rVards']; ?>" size="70" maxlength="100">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td ><span class="text_error">&nbsp;&nbsp;<? echo $pic4.$error_telefon; ?></td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iTal; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rTal" value="<? echo $_POST['rTal']; ?>" size="70" maxlength="100">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td align="left" valign="top">
				<span class="textreg"><? echo $iFakss; ?></span>
			</td>
			<td align="left" valign="top">
				<input class="input" name="rFakss" value="<? echo $_POST['rFakss']; ?>" size="70" maxlength="100">
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" width=765 height="20">&nbsp;</td>
		</tr>
		<tr>
			<td colspan=2>&nbsp;</td>
			<td align="left" valign="top">
				<input type="hidden" name="action_reg" value="post">
				<input class="button" type="submit" value=" OK ">
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" width=765 height="20">&nbsp;</td>
		</tr>
	</table>
</form>