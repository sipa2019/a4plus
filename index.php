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
					//	$dbhost = 'localhost';
						//$dbusername = 'root';
					//	$dbpass = '';
					//	$dbname = 'a4plus';
						
						
						$dbhost = 'localhost';
$dbusername = 'likbez_likbez';
$dbpass = 'l2i0k0b97';
$dbname = 'likbez_komuza';
						
						

                        	$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);


												if (mysqli_connect_errno())
												  {
												  echo "Failed to connect to MySQL: " . mysqli_connect_error();
												  }else{
												  	mysqli_query($conn, "SET NAMES latin1");
													echo "Norm";

												  }
		
                        	
                        	$query = "SELECT * FROM a4plus_podrazdel";

							$result = mysqli_query($conn,"SELECT * FROM a4plus_podrazdel");

									if ($result == FALSE){print "ошибка при выборе файла pdf каталога"; exit;}
					
					                   $rows = array();
					                   
									   while ($row =mysqli_fetch_array($result)) {
									  
											     $rows[] = $row;
											   }
											   
											   for ($i=0; $i< 5; $i++){
											   
										
											   echo $rows[$i][3].'<br>';
											   }
											   

                        	
                        ?>
    					


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	

	<script type="text/javascript">
		
    </script>  
    <a href="#" class="scrollup">Наверх</a>
   </body>
</html>
