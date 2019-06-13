<style type="text/css">
/* =-=-=-=-=-=-=-[Menu Three]-=-=-=-=-=-=-=- */
ul {
	list-style-image: url('images/krug.gif');
	margin: 0;
	padding: 0;
	}
#menu3 {
	width: 240px;
	border: 1px solid #ccc;
	margin: 1px 0px 0px 10px;
	}
#menu3 li a {
  	height: 59px;
  	voice-family: "\"}\"";
  	voice-family: inherit;
  	height: 40px;
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	}
#menu3 li a:link, #menu3 li a:visited {
	color: #05520A;
	display: block;
	background: url(images/leftmenu.jpg);
	padding: 19px 0 0 37px;
	}
#menu3 li a:hover, #menu3 li a:active {
	color: #05520A;
	background: url(images/leftmenu.jpg) 0 -59px;
	padding: 19px 0 0 37px;
	}

#menuk {
	width: 240px;
	border: 1px solid #ccc;
	margin: 1px 0px 0px 10px;
	background: url(images/kontakt.gif);
	background-repeat: no-repeat;
	background-position: top left;
	}

#menuk p {
  	voice-family: "\"}\"";
  	voice-family: inherit;
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #000000;
	padding: 60px 0 0 37px;
	}
.text_active {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	color: #DB211C;
}
.text_notactive {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	color: #05520A;
}
#menushiny {
	width: 240px;
	margin: 10px 0px 40px 10px;
	}
</style>

<?
//$menu1 = "Latvijas asortiments";
//$menu2 = "Atbilstības tabula";
//$menu3 = "Ražotāja asortiments";
//$menu4 = "Ražotāja asortiments";
$text_style1 = "text_notactive";
$text_style2 = "text_notactive";
$text_style3 = "text_notactive";
if ($ed==1) $text_style1 = "text_active";
if ($ed==2) $text_style2 = "text_active";
if ($ed==3) $text_style3 = "text_active";

?>
	<div id="menu3">
		<ul>
			<li><a href="../tpl_a4.php?page=2&amp;ed=1"  border="0" target="_parent" title="<? echo $menul1; ?>"><span class="<? echo $text_style1; ?>"><? echo $menul1; ?></span></a></li>
			<li><a href="../tpl_a4.php?page=2&amp;ed=2"  border="0" target="_parent" title="<? echo $menul2; ?>"><span class="<? echo $text_style2; ?>"><? echo $menul2; ?></span></a></li>
			<li><a href="../tpl_a4.php?page=2&amp;ed=3"  border="0" target="_parent" title="<? echo $menul3; ?>"><span class="<? echo $text_style3; ?>"><? echo $menul3; ?></span></a></li>
<?

$conn = connectToBd();
$query = "SELECT * FROM shiny_text WHERE id_razdel = '3'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе KONTAKT"; exit;}
$p = mysql_fetch_array($result);
$text_adress 	= trim($p['content']);


?>

		</ul>
	</div>
<br><br>
	<div id="menuk">

<?
echo $text_adress;


echo '</div>';

echo '<div id="menushiny">';
echo 	'<br>';
echo 	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<IMG SRC="images/shiny.jpg" WIDTH=160 HEIGHT=69 ALT="">';
echo '</div>';

