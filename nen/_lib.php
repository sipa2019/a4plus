<?
function connectToBd()
{
global $dbhost,$dbusername,$dbpass,$dbname;
/

$dbhost = 'localhost';
$dbusername = 'root';
$dbpass = '';
$dbname = 'a4plus';



$conn = mysql_connect($dbhost, $dbusername, $dbpass );
	if (!$conn)
		{
		echo "Ошибка в Подключении к серверу";exit;
		}
		else
		{
			if (!@mysql_select_db($dbname))
				{
				echo "Ошибка в Подключении к базе";exit;
				}
			else
				{
				//mysql_query("SET NAMES 'utf8'");	
				//mysql_set_charset('utf8',$conn);	
				//mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);	
				//echo "Подключение на уровне функции прошло успешно3";
				}

		}
}
function processCategories($level, $path, $sel)
{
	$out = array();
	$cnt = 0;
	
	$query = "SELECT ref, isfolder, name_tovar, ord, hide, news, icon_folder FROM a4plus_tovar WHERE ref_parent='".$path[$level]."' ORDER by ord";
    $res = mysql_query($query);
	if ($res == FALSE){print "ошибка при обращении к таблице a4plus_tovar"; exit;}
	$kol_ref = mysql_num_rows($res);

	for ($ib=0; $ib<$kol_ref;$ib++)
	{
		$row = mysql_fetch_array($res);
//    while ($row = db_fetch_row($res))
//	{
		$out[$cnt][0] = $level;
		$out[$cnt][1] = $row["isfolder"];
		$out[$cnt][2] = $row["ref"];
		$out[$cnt][3] = $row["name_tovar"];
		$out[$cnt][4] = $row["ord"];
		$out[$cnt][5] = $row["hide"];
		$out[$cnt][6] = $row["news"];
		$out[$cnt][7] = $row["icon_folder"];
		$cnt++;
		//process subcategories?
		if ($level+1<count($path) && $row["ref"] == $path[$level+1])
		{
			$sub_out = processCategories($level+1,$path,$sel);
			//add $sub_out to the end of $out
			for ($j=0; $j<count($sub_out); $j++)
			{
				$out[] = $sub_out[$j];
				$cnt++;
			}
		}
	}
	return $out;
} //processCategories
//-------------------------------------
// определение IP-посетителя
//-------------------------------------
function define_ip()
{
$strRemoteIP = $_SERVER['REMOTE_ADDR'];

if (!$strRemoteIP) {$strRemoteIP = urldecode(getenv('HTTP_CLIENTIP'));}
if (getenv('HTTP_X_FORWARDED_FOR')) {$strIP = getenv('HTTP_X_FORWARDED_FOR');}
elseif (getenv('HTTP_X_FORWARDED')) {$strIP = getenv('HTTP_X_FORWARDED');}
elseif (getenv('HTTP_FORWARDED_FOR')) {$strIP = getenv('HTTP_FORWARDED_FOR');}
elseif (getenv('HTTP_FORWARDED')) {$strIP = getenv('HTTP_FORWARDED');} else {$strIP = $_SERVER['REMOTE_ADDR'];}
if ($strRemoteIP != $strIP) {$strIP = $strRemoteIP . ', ' . $strIP;}
$ip=$strIP;
return $ip;
}
///////////////////////////////
function sql_quote( $value )
{
if( get_magic_quotes_gpc() )
{
      $value = stripslashes( $value );
}
//check if this function exists
if( function_exists( "mysql_real_escape_string" ) )
{
      $value = mysql_real_escape_string( $value );
}
//for PHP version < 4.3.0 use addslashes
else
{
      $value = addslashes( $value );
}
return $value;
}
//======================================
//формирование строки запроса при поиске
//======================================
function str_select($poisks,$name_pole)
{
// убираем крайние пробелы
	$poisks=trim($poisks);
	$poisks=sql_quote( $poisks );

	$poisk_word = explode(" ", $poisks);
	$kol_word=count($poisk_word);
	$stroka_rezult="";

// формирование строки сравнения для запроса
	for ($j=0; $j<$kol_word;$j++)
	{
		$text_w=trim($poisk_word[$j]);

		if ($j==0) {$nach="(";} else {$nach=" AND (";}

		$stroka_rezult.=$nach." ".$name_pole." LIKE '%".$text_w."%'";

		$slovo_up = mb_convert_case($text_w, MB_CASE_UPPER, "UTF-8");
		$slovo_lo = mb_convert_case($text_w, MB_CASE_LOWER, "UTF-8");

		if ($text_w!= $slovo_up)
		{$stroka_rezult.=" OR ".$name_pole." LIKE '%".$slovo_up."%'";
		}

		if ($text_w!= $slovo_lo)
		{$stroka_rezult.=" OR ".$name_pole." LIKE '%".$slovo_lo."%'";
		}

		$pervaja=mb_substr($text_w,0,1,"UTF-8");

		$pervaja_b = mb_convert_case($pervaja, MB_CASE_UPPER, "UTF-8");
		$pervaja_m = mb_convert_case($pervaja, MB_CASE_LOWER, "UTF-8");
		$ostalno = mb_substr($text_w,1,mb_strlen($text_w)-1,"UTF-8");
		$slovo_b=$pervaja_b.$ostalno;
		$slovo_m=$pervaja_m.$ostalno;

		if ($slovo_b!= $text_w&&$slovo_b!= $slovo_up)
		{$stroka_rezult.=" OR ".$name_pole." LIKE '%".$slovo_b."%'";
		}

		if ($slovo_m!= $text_w&&$slovo_m!= $slovo_lo)
		{$stroka_rezult.=" OR ".$name_pole." LIKE '%".$slovo_m."%'";
		}

		$stroka_rezult.=")";
	}
//echo $stroka_rezult.'<br>';

return $stroka_rezult;
}
//======================================
//формирование строки запроса при поиске
//   $poisks - строка поиска, которую ввел пользователь
//   $name_pole - в каком поле надо искать
//======================================
function string_for_find($poisks,$name_pole)
{
// убираем крайние пробелы
	$poisks=trim($poisks);
// убираем недопустимые символы для sql
	$poisks=sql_quote( $poisks );
// заменяем все латышские символы
$mas_eng[0]="a";$mas_lat[0]="ā";
$mas_eng[1]="c";$mas_lat[1]="č";
$mas_eng[2]="e";$mas_lat[2]="ē";
$mas_eng[3]="g";$mas_lat[3]="ģ";
$mas_eng[4]="i";$mas_lat[4]="ī";
$mas_eng[5]="k";$mas_lat[5]="ķ";
$mas_eng[6]="l";$mas_lat[6]="ļ";
$mas_eng[7]="n";$mas_lat[7]="ņ";
$mas_eng[8]="s";$mas_lat[8]="š";
$mas_eng[9]="u";$mas_lat[9]="ū";
$mas_eng[10]="z";$mas_lat[10]="ž";
$mas_eng[11]="A";$mas_lat[11]="Ā";
$mas_eng[12]="C";$mas_lat[12]="Č";
$mas_eng[13]="E";$mas_lat[13]="Ē";
$mas_eng[14]="G";$mas_lat[14]="Ģ";
$mas_eng[15]="I";$mas_lat[15]="Ī";
$mas_eng[16]="K";$mas_lat[16]="Ķ";
$mas_eng[17]="L";$mas_lat[17]="Ļ";
$mas_eng[18]="N";$mas_lat[18]="Ņ";
$mas_eng[19]="S";$mas_lat[19]="Š";
$mas_eng[20]="U";$mas_lat[20]="Ū";
$mas_eng[21]="Z";$mas_lat[21]="Ž";
$poisks = str_replace($mas_lat, $mas_eng, $poisks);
// переводим все в нижний регистр
$poisks = strtolower($poisks);

// разбираем строку поиска на слова
$poisk_word = explode(" ", $poisks);
$kol_word=count($poisk_word);

$stroka_rezult="(";

// формирование строки сравнения для запроса
for ($j=0; $j<$kol_word;$j++)
{

	$text_w=trim($poisk_word[$j]);

	$stroka_rezult.=" ".$name_pole." LIKE '%".$text_w."%'";

	if ($j!=$kol_word-1) $stroka_rezult.=" OR ";

}
$stroka_rezult.=")";
//echo $stroka_rezult.'<br>';
return $stroka_rezult;
}

?>
