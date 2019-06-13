<?
$iEmail="E-pasts* :";
$iPass="Parole* :";
$rem_pass = "Aizmirsāt paroli?";
?>
<form action="tpl_a4.php?page=<? echo $page; ?>" method="post">
	<table width="765" cellpadding="0" cellspacing="0" style="border: 1px solid #D0EC97">
		<tr>
			<td width=125 height="20">&nbsp;</td>
			<td width="180">&nbsp;</td>
			<td width="450">&nbsp;</td>
			<td width=10>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><span class="textreg"><? echo $iEmail; ?></span></td>
			<td>
				<input type="text" name="rEmail" value='<?php echo $rEmail; ?>' size="25" maxlength="30" />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><span class="textreg"><? echo $iPass; ?></span></td>
			<td>
				<input type="password" name="rPass" value='<?php echo $rPass; ?>' size="25" maxlength="30" />

<?
echo 			'<br>';
echo 			'<a href="tpl_a4.php?page=99" target="_parent" class="katalog">';
echo				$rem_pass;
echo 			'</a>';
?>
			</td>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td colspan=2>&nbsp;</td>
			<td>
				<input type=hidden name=sid_add_theme value='<?php echo $sid_add_theme; ?>'>
				<input type=hidden name=action_enter value=yes>
				<input type="submit" name="ok" value=" OK " />
			</td>
			<td>&nbsp;</td>
		</tr>


		<tr>
			<td colspan="4" width=765 height="20">&nbsp;</td>
		</tr>
	</table>
</form>
