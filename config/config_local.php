<?php
	/*
	* localhost 
	*/
define ('BASEURL', 'http://mvcorieco/');
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
define (DBNAME, 'orieco');

//define (LOCALE, 'ru');
$locales = array('ru' => 'RU', 'lv' => 'LV');

define (PREFIX, ''); 
define (THUBN, 'th_'); 


/*define ('BASEURL', 'http://admin.dorfmanaserviss.likbez.lv/');
//define ('BASEURLFRONT', 'http://svars/');

define ('DIRSEP', DIRECTORY_SEPARATOR);

$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP)  . DIRSEP;
define ('SITE_PATH', $site_path);

$view_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'view' . DIRSEP;
define ('VIEW_PATH', $view_path);

$image_path = realpath(dirname(__FILE__) . DIRSEP . '../..' . DIRSEP) . DIRSEP. 'dor_mobprogi' . DIRSEP. 'images/actions_images' . DIRSEP;
define ('IMAGE_PATH', $image_path);

$real_image_path = 'http://www.dorfmanaserviss.likbez.lv/dor_mobprogi/images/actions_images/';
define ('REAL_IMAGE_PATH', $real_image_path);

define (DBHOST, 'localhost');
define (DBUSER, 'likbez_likbez');
define (DBPASS, 'l2i0k0b97');
define (DBNAME, 'likbez_komuza');

//define (LOCALE, 'ru');
$locales = array('ru' => 'RU', 'lv' => 'LV');


define (PREFIX, ''); 
define (THUBN, 'th_'); */



	/*
	* dserviss.lv 
	*/
/*define ('BASEURL', 'http://admin.dserviss.lv/');
//define ('BASEURLFRONT', 'http://svars/');

define ('DIRSEP', DIRECTORY_SEPARATOR);

$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP)  . DIRSEP;
define ('SITE_PATH', $site_path);

$view_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'view' . DIRSEP;
define ('VIEW_PATH', $view_path);

$image_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'photos' . DIRSEP. 'action' . DIRSEP;
//$image_path = 'http://www.dorfman.lv/dor_mobprogi/images/actions_images/';
define ('IMAGE_PATH', $image_path);

$real_image_path = 'http://www.dserviss.lv/dor_mobprogi/images/actions_images/';
define ('REAL_IMAGE_PATH', $real_image_path);

define (DBHOST, 'localhost');
define (DBUSER, 'dorfman_dorfman');
define (DBPASS, 'leonid2013');
define (DBNAME, 'dorfman_dor_serviss');

//define (LOCALE, 'ru');
$locales = array('ru' => 'RU', 'lv' => 'LV');

define (PREFIX, ''); 
define (THUBN, 'th_'); */












	/* 
	* for real site 
	*
define ('BASEURL', 'http://mir-sveta.kz/');
define ('DIRSEP', DIRECTORY_SEPARATOR);

$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'public_html' . DIRSEP;
define ('SITE_PATH', $site_path);

$view_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'public_html' . DIRSEP. 'view' . DIRSEP;
define ('VIEW_PATH', $view_path);

$image_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP. 'public_html' . DIRSEP. 'photos' . DIRSEP;	
define ('IMAGE_PATH', $image_path);
	*/
?>