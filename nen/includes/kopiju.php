<?php
$conn = connectToBd();
//mysql_query("set names utf8");
	if ($page!=5){
		
		if ($ed==0)	{
			
			$queryr = "SELECT * FROM a4plus_razdel WHERE hide='0' AND id_menu='".$page."' ORDER BY ord";
			$resultr = mysql_query($queryr);
			if ($resultr == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
			$pr = mysql_fetch_array($resultr);
			$ed	= trim($pr['id_razdel']);
		}
	}
	
echo '<table width="980" border="0" cellpadding="0" cellspacing="0">';
echo	'<tr>';
echo 		'<td width="240" align="left" valign="top">';

				include("includes/left_menu2.php");
				
echo 		'</td>';
echo 		'<td width="77" align="left" valign="top">';
echo 		'</td>';
echo 		'<td width="603" align="left" valign="top">';

	if ($page==5 && $ed==-1){
		
		include("includes/videoroll.php");
		
	}else{
		$show_video = 'no';
		$ed = (0==$ed) ? '27' : $ed;
		
		if ($ed && 0==$art) {
			$show_video='yes';
		}
		
		$querya = "SELECT * FROM a4plus_podrazdel WHERE hide='0' AND id_razdel = '".$ed."' ORDER BY ord";
//echo $queryr;
		$resulta = mysql_query($querya);
		if ($resulta == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
		$kola=mysql_num_rows($resulta);
		
		if ($kola>1 && $art==0) {
			if ($page==5)	 include("includes/kop_center_shiny.php");
			else			include("includes/kop_center.php");
		} else {
			if ($art==0) {
				$pa = mysql_fetch_array($resulta);
				$art	= trim($pa['id_podrazdel']);
			}
			include("includes/list_1234.php");
		}
		if ('yes'==$show_video && 5==$page) {
			include("includes/main.php");
		}
	}

echo		'</td>';

echo 		'<td width="60" align="left" valign="top">';
echo 		'</td>';
echo	'</tr>';
echo '</table>';
?>