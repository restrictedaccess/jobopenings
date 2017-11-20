<?php

class Config
{
	private $smarty;
	public static $templ_dir = 'views';
	
	public static $db_conf = null;
	public static $show_header = FALSE;
	public static $show_footer = FALSE;
    // dispatch request to the appropriate controller/method
    //public static function config() {
		//echo 'config';
		
		//require_once('../portal/conf/zend_smarty_conf.php');
    	// INITIATE SMARTY
		//$smarty = new Smarty();
		//$smarty->template_dir = "./templates";
		//$smarty->compile_dir = "./templates_c";
    //}	
	public static function header() {
		//return Config::$templ_dir.'/seat_header.php';
	}
	
	public static function footer() {
		//return Config::$templ_dir.'/seat_footer.php';
	}
	
	public static function static_dir() {
		return '/portal';
	}
}// End Config class