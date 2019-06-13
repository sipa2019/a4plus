<style type="text/css">
#TableVideoPresent {
	width:600px;
	}
	.ContainerVideo {
	width:600px;
	}
	.NameVideo {
	font-size:14px;padding:10px 0;font-weight:bold;
	}
	.BlockVideo {
	padding-bottom:20px;border-bottom:1px solid #EBEBEB;
	}
</style>
<?
$conn = connectToBd();
$query 		= "SELECT * FROM video_roll WHERE hide = '0' ORDER BY ord";
$result 	= mysql_query($query);if ($result == FALSE){print "ошибка:video_roll"; exit;}
$kolvideo 	= mysql_num_rows($result);
?>
<div id="TableVideoPresent">
<?
	if ($kolvideo==0)
	{
?>
		<div class="VideoEmpty">Video prezentācijas drīz būs</div>
<?
	}
	else
	{
		for ($i=0; $i<$kolvideo;$i++)
		{
			$p = mysql_fetch_array($result);
			$name_video = $p['name_video'];
			$text_roll 	= $p['text_roll'];

?>
			<div class="ContainerVideo">
				<div class="NameVideo"><? echo $name_video; ?></div>
				<div class="BlockVideo"><? echo $text_roll; ?></div>
			</div>
<?
		}
	}
?>
</div>
