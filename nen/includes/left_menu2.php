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

<?php
		$conn		=	connectToBd();
		$menuVideo 	=	"Video prezentācija";
		$query		=	"SELECT * FROM shiny_text WHERE id_razdel = '3'";
		$result		=	mysql_query($query);
		
		if ($result == FALSE){print "ошибка при выборе KONTAKT"; exit;}

		$p			=	mysql_fetch_array($result);
		$text_adress= trim($p['content']);

		$query		= "SELECT * FROM a4plus_razdel WHERE hide = '0' AND id_menu='".$page."' ORDER BY ord";
		$result		= mysql_query($query);

if ($result == FALSE){print "ошибка при выборе MENU"; exit;}
$kol=mysql_num_rows($result);
for ($i=0; $i<$kol;$i++)
{
	$pp = mysql_fetch_array($result);
	$menu_kop[$i] = $pp['name_razdel'];
	$id_menu[$i] = $pp['id_razdel'];
}
echo '<div id="menu3">';
echo 	'<ul>';
for ($i=0; $i<$kol;$i++)
{
	if ($ed==$id_menu[$i]) $text_style = "text_active"; else $text_style = "text_notactive";
echo 	'<li>';
echo 		'<a href="../tpl_a4.php?page='.$page.'&amp;ed='.$id_menu[$i].'"  border="0" target="_parent" title="'.$menu_kop[$i].'">';
echo 			'<span class="'.$text_style.'">'.$menu_kop[$i].'</span>';
echo 		'</a>';
echo 	'</li>';
}
// video presentation Zimogi (page=5)
if ($page==5)
{
	if ($ed==-1) $text_style = "text_active"; else $text_style = "text_notactive";
echo 	'<li>';
echo 		'<a href="../tpl_a4.php?page='.$page.'&amp;ed=-1"  border="0" target="_parent" title="'.$menuVideo.'">';
echo 			'<span class="'.$text_style.'">'.$menuVideo.'</span>';
echo 		'</a>';
echo 	'</li>';
}
?>

		</ul>
	</div>
<br><br>
	<div id="menuk" style="background-color: #ea15da;">

<?php
//echo $text_adress;


echo '</div>';
if ($page==5)
{
echo '<div id="menushiny">';
echo 	'<br>';
echo 	'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<IMG SRC="images/shiny.jpg" WIDTH=160 HEIGHT=69 ALT="">';
echo '</div>';
}