<style type="text/css">
#MainTable {
	width:900px;
	padding:0 20px;
	}
	#ContainerContact {background:url(../images/a4plus.jpg) no-repeat 0 0;
	width:300px;padding:0 30px;height:600px;
	float:left;
	text-align:left;
	}
	#ContainerMap {
	width:500px;padding:20px 0 50px 0;
	float:left;
	}
	#ContainerMap iframe {
	float:left;margin:0;padding:0;
	}
	#ContainerMap a {
	font-size:10px;color:#929191;
	clear:both;
	display:block;
	}
	#ContainerPhoto {
	background-color:#F3F3F3;
	border-bottom:1px solid #EBEBEB;
	width:400px;
	padding:15px;
	float:left;
	}
</style>
<?
$conn = connectToBd();
$query = "SELECT * FROM shiny_text WHERE id_razdel = '3'";
$result = mysql_query($query);
if ($result == FALSE){print "ошибка при выборе KONTAKT"; exit;}
$p = mysql_fetch_array($result);
$text_adress 	= trim($p['content']);
$foto_sm 		= trim($p['foto_sm']);
?>
	<div id="MainTable">
		<div id="ContainerContact">
		<?
		echo $text_adress;
		?>
		</div>
		<div id="ContainerMap">
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?client=opera&amp;q=Aleksandra+Gr%C4%ABna+bulv%C4%81ris+3+Riga&amp;oe=utf-8&amp;ie=UTF8&amp;hq=&amp;hnear=Aleksandra+Gr%C4%ABna+bulv%C4%81ris+3,+R%C4%ABga,+LV-1048,+%D0%9B%D0%B0%D1%82%D0%B2%D0%B8%D1%8F&amp;t=m&amp;z=14&amp;vpsrc=0&amp;ll=56.942946,24.08313&amp;output=embed"></iframe>
			<br /><small>
			<a href="http://maps.google.com/maps?client=opera&amp;q=Aleksandra+Gr%C4%ABna+bulv%C4%81ris+3+Riga&amp;oe=utf-8&amp;ie=UTF8&amp;hq=&amp;hnear=Aleksandra+Gr%C4%ABna+bulv%C4%81ris+3,+R%C4%ABga,+LV-1048,+%D0%9B%D0%B0%D1%82%D0%B2%D0%B8%D1%8F&amp;t=m&amp;z=14&amp;vpsrc=0&amp;ll=56.942946,24.08313&amp;source=embed" style="color:#0000FF;text-align:left" target="_blank">Просмотреть увеличенную карту</a></small>
		</div>
		<div id="ContainerPhoto">
		<?
			if (!empty($foto_sm))
			echo  '<img src="foto/'.$foto_sm.'" alt="">';
		?>
		</div>
	</div>



