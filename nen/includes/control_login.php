<?
$error_ent="";

$email = substr($_POST["rEmail"],0,100);
$email = htmlspecialchars(stripslashes($email));

$pas = substr($_POST["rPass"],0,32);
$pas = htmlspecialchars(stripslashes($pas));


$conn = connectToBd();
$query = "SELECT * FROM a4plus_klient WHERE epast = '$email' AND passw = '$pas'";

$result = mysql_query($query);
if ($result == FALSE){print "Ошибка при коннекте к БД - выбор пользователя (auth)"; exit;}
$kol = mysql_num_rows($result);

IF ($kol==0)
{
	$error_ent="error";
}
else
{
$pp = mysql_fetch_array($result);
$id_pokupatel = $pp['id_klient'];
$rName 		= $pp['epast'];
$rLogin = explode("@", $rName);

$_SESSION['pokupatel']=$rLogin[0];
$_SESSION['id_pokupatel']=$id_pokupatel;
	print "<HTML><HEAD>\n";
	print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=tpl_a4.php?page=7'>\n";
	print "</HEAD></HTML>\n";
	exit();
}
?>

