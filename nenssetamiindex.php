<?php session_start();
//unset($_SESSION['guest']);
ini_set('display_errors','On'); 
error_reporting(E_ALL);
Error_Reporting(E_ALL & ~E_NOTICE);
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>www.a4plus.lv</title>
	
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" >
    
<style>



</style> 
  </head>

  <body>

    				
						<?php
						$dbhost = 'localhost';
						$dbusername = 'root';
						$dbpass = '';
						$dbname = 'a4plus';
                        	
                        	$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);


							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }else{
							  	
								//echo "Norm";
								
							  }
		
                        	//$conn = connectToBd();
                        /*	$host = 'localhost';
							$username = 'root';
							$password = '';
							$database = 'a4plus';
                        	$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$alter_database_charset_sql = "ALTER DATABASE ".$database." CHARACTER SET utf8 COLLATE utf8_unicode_ci";
mysqli_query($conn, $alter_database_charset_sql);

$show_tables_result = mysqli_query($conn, "SHOW TABLES");
$tables  = mysqli_fetch_all($show_tables_result);

foreach ($tables as $index => $table) {
  $alter_table_sql = "ALTER TABLE ".$table[0]." CONVERT TO CHARACTER SET utf8  COLLATE utf8_unicode_ci";
  $alter_table_result = mysqli_query($conn, $alter_table_sql);
  echo "<pre>";
  var_dump($alter_table_result);
  echo "</pre>";
}*/
                        	
                        	
                        	
                        	
                        	
                        	
                        	
                        	
                        	/*@mysql_query("SET NAMES utf8mb4");
                        	
                        	
                        	SET NAMES UTF8;
set collation_server = utf8_general_ci;
set default-character-set = utf8;
set init_connect = ’SET NAMES utf8′;
set character_set_server = utf8;
set character_set_client = utf8;*/
                        	
                        	
                        	
                        	
                        	
                        	
                        	
                        	
                        		//header('Content-Type: text/html; charset=utf-8');
         // mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);

//$re = mysql_query('SHOW VARIABLES LIKE "%character_set%";')or die(mysql_error());
//while ($r = mysql_fetch_assoc($re)) {var_dump ($r); echo "<br />";}


//$resultt=mysql_query ("SET NAMES utf8 COLLATE utf8_unicode_ci");

//var_dump($resultt);

//$init_connect=mysql_query ('SET collation_connection = utf8_unicode_ci');

//var_dump($init_connect);
//mysql_set_charset('utf8',$conn);
// $result = mysql_query("SHOW CREATE TABLE 'a4plus'");
       // var_dump($result);  	

//mysql_set_charset('utf8');
//mysql_query('SET NAMES "utf8"');

	
//mysql_set_charset('utf8');
// или mysql_query('SET NAMES "utf8"');
                        	
   
//mysql_query("SHOW VARIABLES LIKE 'char%'" );


 
/*
character_set_client: latin1  */               	
                        	
                        	
                        	
                        	
                        //	mysql_query("set names utf8");
                        	//mysql_query ("SET NAMES utf-8");
                        	//mysql_query("set CHARACTER SET utf8");
                        	
                        	//mysql_query("SHOW VARIABLES LIKE 'character_set_client'" );
                        	//mysql_query("SET character_set_client = 'utf-8'");
//mysql_query("SET character_set_connection = 'utf-8'");
//mysql_query("SET character_set_results = 'utf-8′");
//mysql_query("SET NAMES 'utf-8'");
//set_charset('utf-8');
                        	
                        	

//mysql_set_charset('utf8');

	
//mysql_set_charset('utf8');
// или mysql_query('SET NAMES "utf8"');
                        	
                        	//mysql_query("SET character_set_results = 'utf-8'");
                        	$query = "SELECT * FROM a4plus_podrazdel";
                        //	var_dump($query);
                        	//mysql_query("SET character_set_results = 'utf-8'");
							//$result = mysql_query($query);
							$result = mysqli_query($conn,"SELECT * FROM a4plus_podrazdel");
							//var_dump($result);
						//	mysql_query("SET character_set_client = 'utf-8'");
//mysql_query("SET character_set_connection = 'utf-8'");
//mysql_query("SET character_set_results = 'utf-8′");
//mysql_query("SET NAMES 'utf-8'");
									if ($result == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
					
					                   $rows = array();
					                   
									   while ($row =mysqli_fetch_array($result)) {
									  
											     $rows[] = $row;
											   }
											   
											   for ($i=0; $i< 5; $i++){
											   
										
											   echo $rows[$i][3].'<br>';
											   }
											   
											   
									  
									  
									    	
								
   
										
   
   
  // var_dump($rows);
					
	//	die;	
			
                        	
                        ?>
    					













    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	

	<script type="text/javascript">
		
    </script>  
    <a href="#" class="scrollup">Наверх</a>
   </body>
</html>
