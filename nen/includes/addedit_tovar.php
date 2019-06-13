<?
session_start();
if (!isset($_SESSION['okenter'])) include "auth.php";
$progGoTo = $_SERVER['PHP_SELF'];
include_once("_liba4.php");
$conn = connectToBd();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>Администрирование сайта</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="/style_shop.css" type="text/css" />
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
<script type="text/javascript">
       _editor_url = "http://www.ros.lv/editor_ros/";
       _editor_lang = "en";
</script>
<script type="text/javascript" src="http://www.ros.lv/editor_ros/htmlarea_sobstv.js"></script>
<script type="text/javascript" src="/jslib/openWind.js"></script>
<script type="text/javascript">
      HTMLArea.loadPlugin("TableOperations");
      HTMLArea.loadPlugin("SpellChecker");
      HTMLArea.loadPlugin("CSS");
      function initDocument() {
          var css_plugin_args = {
          combos : [
            { label: "Syntax",
                         // menu text       // CSS class
              options: { "None"           : "",
                         "Code" : "code",
                         "String" : "string",
                         "Comment" : "comment",
                         "Variable name" : "variable-name",
                         "Type" : "type",
                         "Reference" : "reference",
                         "Preprocessor" : "preprocessor",
                         "Keyword" : "keyword",
                         "Function name" : "function-name",
                         "Html tag" : "html-tag",
                         "Html italic" : "html-helper-italic",
                         "Warning" : "warning",
                         "Html bold" : "html-helper-bold"
                       },
              context: "pre"
            },
            { label: "Info",
              options: { "None"           : "",
                         "Quote"          : "quote",
                         "Highlight"      : "highlight",
                         "Deprecated"     : "deprecated"
                       }
            }
          ]
        };

       var editor1 = new HTMLArea("descript");
        editor1.registerPlugin(TableOperations);
        editor1.registerPlugin(CSS, css_plugin_args);
        editor1.config.pageStyle = "import url(custom.css);";
        editor1.generate();

      };
    </script>
</head>
<style type="text/css">
.zagolovok {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #FD5401;
}
.namepole {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: underline;
	color: #13017B;
}
.pole {
	font: 14px Geneva, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #262626;
}

</style>
<body onload="initDocument()">
<?php
$param 		= $_GET['param'];
$paramadd 	= $_GET['paramadd'];
/////////////////////////////////////////////
// если еще форма не запускалась
////////////////////////////////////////////
if ($_SERVER['REQUEST_METHOD'] !== 'POST')
{
	if ($paramadd=="add")
	{
		$_POST['name_tovar']	= "";
		$_POST['descript'] 		= "";
		$_POST['kod_tovar']		= "";		
		$_POST['cena1'] 		= "";				
		$_POST['cena2'] 		= "";
		$foto_sm				= "";
		$foto_big				= "";		
		$_POST['ord']	 		= 0;
		$_POST['irnav']	 		= 0;		
		$_POST['hide']	 		= 0;				
		$_POST['news']	 		= 0;						
		$_POST['sale']	 		= 0;
		$_POST['isfolder']		= 0;
		$isfolder				= 0;
		// не папка, а товар
		$check_folder_no		= "checked";
		$check_folder_yes		= "";	
//  есть в наличии
		$check_irnav_yes		= "checked";
		$check_irnav_no 		= "";
// показывать в магазине
		$check_hide_yes			= "checked";
		$check_hide_no 			= "";
// не новинка
		$check_news_yes			= "";
		$check_news_no 			= "checked";
// не распродажа		
		$check_sale_yes			= "";
		$check_sale_no 			= "checked";

		$query = "SELECT * FROM a4plus_tovar WHERE ref = '$param'";
		$result = mysql_query($query);if ($result == FALSE){print "ошибка при чтении из таблицы a4plus_tovar"; exit;}
		$p = mysql_fetch_array($result);
		$name_folder = trim($p['name_tovar']);		
		$text_zagolovok = "Добавление в папку: ".$name_folder;
	}
	else
	{
		$query = "SELECT * FROM a4plus_tovar WHERE ref = '$param'";
		$result = mysql_query($query);if ($result == FALSE){print "ошибка при чтении из таблицы a4plus_tovar"; exit;}
		$p = mysql_fetch_array($result);
		$_POST['name_tovar']	= trim($p['name_tovar']);
		$_POST['descript'] 		= trim($p['descript']);
		$_POST['kod_tovar']		= trim($p['kod_tovar']);		
		$_POST['cena1'] 		= trim($p['cena1']);				
		$_POST['cena2'] 		= trim($p['cena2']);
		$foto_sm				= trim($p['foto_sm']);
		$foto_big				= trim($p['foto_big']);		
		$_POST['ord']	 		= trim($p['ord']);

		$_POST['irnav']	 		= trim($p['irnav']);		
		$irnav					= trim($p['irnav']);		
		if ($irnav==1) {$check_irnav_yes= "checked";$check_irnav_no = "";}
		if ($irnav==0) {$check_irnav_no = "checked";$check_irnav_yes= "";}

		$_POST['hide']	 		= trim($p['hide']);				
		$hide					= trim($p['hide']);		
		if ($hide==0) {$check_hide_yes= "checked";$check_hide_no = "";}
		if ($hide==1) {$check_hide_no = "checked";$check_hide_yes= "";}

		$_POST['news']	 		= trim($p['news']);						
		$news					= trim($p['news']);		
		if ($news==1) {$check_news_yes= "checked";$check_news_no = "";}
		if ($news==0) {$check_news_no = "checked";$check_news_yes= "";}
		
		$_POST['sale']	 		= trim($p['sale']);
		$sale					= trim($p['sale']);		
		if ($sale==1) {$check_sale_yes= "checked";$check_sale_no = "";}
		if ($sale==0) {$check_sale_no = "checked";$check_sale_yes= "";}

		$_POST['isfolder']		= trim($p['isfolder']);
		$isfolder				= trim($p['isfolder']);		
		if ($isfolder==1) {$check_folder_yes= "checked";$check_folder_no = "";$name_folder="карточки ПАПКИ";}
		if ($isfolder==0) {$check_folder_no = "checked";$check_folder_yes= "";$name_folder="карточки ТОВАРА";}

		$text_zagolovok = "Редактирование ".$name_folder;
	}
?>
<table width="940" align = "center" height="400">
<tr><td colspan="3" align="center"><span class="zagolovok"><? echo $text_zagolovok; ?></span></td></tr>
<tr>
	<td width="350" height="10">&nbsp;</span></td>
	<td width="40">&nbsp;</td>
	<td width="550">&nbsp;</span></td>
</tr>

<form action="<? echo 'addedit_tovar.php?param='.$param.'&mainm=11&paramadd='.$paramadd; ?>"  method="post" enctype="multipart/form-data" name="form1">
<tr>
	<td width="350" align="left"><span class="pole">Наименование:</span></td>
	<td width="40">&nbsp;</td>
	<td width="550">
		<input type="text" name="name_tovar" value="<? echo $_POST['name_tovar']; ?>" size=80>	
	</td>
</tr>
<?
if ($paramadd=="add")
{
?>
<tr>
	<td align="left">
		<span class="pole">Карточка:</span>
	</td>
	<td >&nbsp;</td>
	<td align="left">
		<input type="radio" name="isfolder" value="0" <? echo $check_folder_no;?>>
		<span class="pole">товара&nbsp;&nbsp;&nbsp;</span>		
		<input type="radio" name="isfolder" value="1" <? echo $check_folder_yes;?>>
		<span class="pole">папки&nbsp;&nbsp;&nbsp;</span>		
	</td>
</tr>
<?
}
if ($isfolder=="0")
{
?>
<tr><td colspan=3>
	<table width=100% cellpadding=0 cellspacing=0 bgcolor="#CCFFC9">
		<tr>
			<td width="350" height="1" bgcolor="#46FD53">&nbsp;</span></td>
			<td width="40" bgcolor="#46FD53">&nbsp;</td>
			<td width="550" bgcolor="#46FD53">&nbsp;</span></td>
		</tr>
		<tr>
			<td colspan="3" align="center" bgcolor="#46FD53"><span class="pole"><strong>Заполняется только в случае, если вводится карточка товара:</strong></span></td>
		</tr>	
		<tr>
			<td colspan="3" align="left"><span class="pole">Описание:</span></td>
		</tr>
		<tr>
			<td colspan="3" align="left">
				<textarea   id="descript"  name="descript"  style="width: 90%; height: 20em"><? echo $_POST['descript']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="left">
				<span class="pole">Наличие:&nbsp;</span>
			</td>
			<td >&nbsp;</td>
			<td align="left">
				<input type="radio" name="irnav" value="1" <? echo $check_irnav_yes;?>>
				<span class="pole">да&nbsp;&nbsp;&nbsp;</span>		
				<input type="radio" name="irnav" value="0" <? echo $check_irnav_no;?>>
				<span class="pole">нет&nbsp;&nbsp;&nbsp;</span>		
			</td>
		</tr>
		<tr>
			<td align="left">
			<span class="pole">Новинка:&nbsp;</span>
			</td>
			<td >&nbsp;</td>
			<td align="left">
				<input type="radio" name="news" value="1" <? echo $check_news_yes;?>>
				<span class="pole">да&nbsp;&nbsp;&nbsp;</span>		
				<input type="radio" name="news" value="0" <? echo $check_news_no;?>>
				<span class="pole">нет&nbsp;&nbsp;&nbsp;</span>		
			</td>
		</tr>
		<tr>
			<td align="left">
				<span class="pole">Распродажа:&nbsp;</span>
			</td>
			<td >&nbsp;</td>
			<td align="left">
				<input type="radio" name="sale" value="1" <? echo $check_sale_yes;?>>
				<span class="pole">да&nbsp;&nbsp;&nbsp;</span>		
				<input type="radio" name="sale" value="0" <? echo $check_sale_no;?>>
				<span class="pole">нет&nbsp;&nbsp;&nbsp;</span>		
			</td>
		</tr>
		<tr>
			<td align="left"><span class="pole">Цена основная:</span></td>
			<td >&nbsp;</td>
			<td >
				<input type="text" name="cena1" value="<? echo $_POST['cena1']; ?>" size=40>	
			</td>
		</tr>
		<tr>
			<td align="left"><span class="pole">Цена дополнительная:</span></td>
			<td >&nbsp;</td>
			<td >
				<input type="text" name="cena2" value="<? echo $_POST['cena2']; ?>" size=40>	
			</td>
		</tr>
		<tr>
			<td align="left">
				<span class="pole">Фотография </span><br>
				<IMG SRC="/foto_shop/<? echo $foto_sm; ?>" border=0 ALT="">
			</td>
			<td >&nbsp;</td>	
			<td align="left">
				<input type="hidden" name="MAX_FILE_SIZE" value="3000000" >
				<input name="foto_s" type="file" size="40" maxlength="30">
			</td>
		</tr>
	</table>
</td>
</tr>
<tr>
	<td colspan="3" align="center" bgcolor="#FFFD5A"><span class="pole">Заполняется как для товара, так и для папки:</span></td>
</tr>
<?
}
?>

	
</tr>
	<td align="left"><span class="pole">Порядок следования:</span></td>
	<td >&nbsp;</td>
	<td align="left">
		<input type="text" name="ord" value="<? echo $_POST['ord']; ?>" size=40>	
	</td>
</tr>
<tr>
	<td align="left">
		<span class="pole">Показывать на сайте:&nbsp;</span>
	</td>
	<td >&nbsp;</td>
	<td align="left">
		<input type="radio" name="hide" value="0" <? echo $check_hide_yes;?>>
		<span class="pole">да&nbsp;&nbsp;&nbsp;</span>		
		<input type="radio" name="hide" value="1" <? echo $check_hide_no;?>>
		<span class="pole">нет&nbsp;&nbsp;&nbsp;</span>		
	</td>
</tr>	
<tr>
	<td width="350" height="10">&nbsp;</span></td>
	<td width="40">&nbsp;</td>
	<td width="550">&nbsp;</span></td>
</tr>
	<tr>
		<td colspan="3" align="center">
			<input type="submit" value="Публиковать">
			<input type="reset" name="Reset" value="Reset">
			<input name="Button" type="button" class="pecat_stroki"
			onClick="MM_goToURL('parent','<? echo "admin.php?param=".$param."&mainm=11"; ?>');
			return document.MM_returnValue" value="Cancel">
		 </td>
	</tr>
</form>
</table>
<?
}
else
{
	$name_tovar =	$_POST['name_tovar'];
	$descript	=	$_POST['descript'];
	$kod_tovar	=	$_POST['kod_tovar'];		
	$cena1		=	$_POST['cena1'];				
	$cena2		=	$_POST['cena2'];
	$ord		=	$_POST['ord'];
	$irnav		=	$_POST['irnav'];		
	$hide		=	$_POST['hide'];				
	$news		=	$_POST['news'];						
	$sale		=	$_POST['sale'];
	$isfolder	=	$_POST['isfolder'];

//	$f = $HTTP_POST_FILES["foto_s"]["name"];
//	$numerok = novoe_name_foto($f);
//	$foto_sm = 	foto_upload_resize("foto_s",$numerok,$f,535000,300);

	if ($paramadd=="add")
		
			$query = "INSERT INTO a4plus_tovar (
					ref_parent,isfolder,name_tovar,descript,foto_sm,foto_big,cena1,cena2,ord,irnav,kod_tovar,hide,news,sale)
					VALUES (
					'$param','$isfolder','$name_tovar','$descript','$foto_sm','$foto_big','$cena1','$cena2','$ord','$irnav','$kod_tovar','$hide','$news','$sale')";		
		
		else
			$query = "UPDATE a4plus_tovar SET
				name_tovar ='$name_tovar',
				descript ='$descript',
				cena1 ='$cena1',
				cena2 ='$cena2',
				ord ='$ord',
				irnav ='$irnav',
				kod_tovar ='$kod_tovar',
				hide ='$hide',
				news ='$news',
			    sale='$sale'
				WHERE ref ='".$param."'";			
echo $query;	
	$result = mysql_query($query);
	if ($result == FALSE) {print "ошибка при записи в таблицу a4plus_tovar"; exit;}
	

	
//******************
$viv="Все прошло успешно!";
$piktogr = "/images/logo.jpg";
$vivod_okna1  = <<<HERE
<link href="/style_ros/style_ros.css" rel="stylesheet" type="text/css">
<style type="text/css">body {background-color: #F2F2FA;}</style>
<table id="Table_01" width="317" align = "center" height="254" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center" valign="middle" bgcolor="#F7F8FC" background="/pogi/icon_lin1.gif">
			<img src="$piktogr">
			<p class="text_zagolov">$viv <br></p>
				<a href="admin.php?mainm=11&param=$param" target="_parent">
				<img src="/images/ok.png" width="54" height="26" border="0">
			</a>
		</td>
	</tr>
</table>
HERE;
print "$vivod_okna1";

}
?>
</body>
</html>
