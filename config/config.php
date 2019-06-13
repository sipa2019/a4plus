<?php
	/*
	* localhost 
	*/
define ('BASEURL', 'http://a4plusV/');
//define ('BASEURLFRONT', 'http://svars/');

define ('DIRSEP', DIRECTORY_SEPARATOR);

$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP)  . DIRSEP;
define ('SITE_PATH', $site_path);

$view_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'view' . DIRSEP;
define ('VIEW_PATH', $view_path);

//$image_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'dor_mobprogi' . DIRSEP. 'images'. DIRSEP.'actions_images' . DIRSEP;
$image_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'photos' . DIRSEP. 'action' . DIRSEP;
//$image_path = 'http://www.dorfman.lv/dor_mobprogi/images/actions_images/';
define ('IMAGE_PATH', $image_path);

//$real_image_path = 'http://www.dorfman.lv/dor_mobprogi/images/actions_images/';
$real_image_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'photos' . DIRSEP. 'action' . DIRSEP;
define ('REAL_IMAGE_PATH', $real_image_path);


define (DBHOST, 'localhost');
define (DBUSER, 'root');
define (DBPASS, '');
define (DBNAME, 'a4plus');



define (PREFIX, ''); 
define (THUBN, 'th_'); 


?>