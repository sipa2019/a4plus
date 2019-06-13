<?
function connectToBd()
{
//global $dbhost,$dbusername,$dbpass,$dbname;



$dbhost = 'localhost';
$dbusername = 'root';
$dbpass = '';
$dbname = 'a4plus';



/*$conn = mysql_connect($dbhost, $dbusername, $dbpass );
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
					//mysql_query("SHOW VARIABLES LIKE 'character_set_client'" );
				
				//mysql_query("SET NAMES 'utf8'");	
				//mysql_set_charset('utf8',$conn);	
				//mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);	
				//echo "Подключение на уровне функции прошло успешно3";
				}

		}*/
		
		
		
		
		

$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  	
	echo "Norm";
	//var_dump($conn);
  }
		
		
		
		
		
		
		
		
		
		
		
}

?>
