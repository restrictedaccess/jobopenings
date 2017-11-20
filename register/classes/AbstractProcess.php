<?php
abstract class AbstractProcess{
	/**
	 * The db object
	 */	
	protected $db;
	
	/**
	 * Smarty engine
	 */
	protected $smarty;
	public function __construct($db){
		$this->db = $db;
		$this->smarty = new Smarty();
//		if (TEST){
//			$this->smarty->assign("base_au_url", "http://devs.remotestaff.com.au");
//		}else{
//			$this->smarty->assign("base_au_url", "https://remotestaff.com.au");
//		}
//
//        if (TEST){
//            $this->smarty->assign("base_ph_url", "http://devs.remotestaff.com.ph");
//        }else{
//            $this->smarty->assign("base_ph_url", "http://remotestaff.com.ph");
//        }
        global $base_au_url;
        global $base_ph_url;
        $this->smarty->assign("base_au_url", $base_au_url);
        $this->smarty->assign("base_ph_url", $base_ph_url);
        
        
        
		if (!empty($_REQUEST)){
			foreach($_REQUEST as $key=>$val){
				if (!is_array($val)){
					$_REQUEST[$key] = strip_tags($val);
				}
			}
		}
		
		
		if (isset($_COOKIE["recruiters_promo_code"])){
			$this->smarty->assign("cookie_promo_code", $_COOKIE["recruiters_promo_code"]);
		}
		$hash_code = chr(rand(ord("a"), ord("z"))) . substr( md5( uniqid( microtime()) . $_SERVER[ 'REMOTE_ADDR' ] . $_GET['jr_cat_id'] ), 2, 17 );
		$this->smarty->assign("hashcode", $hash_code);
	}
     
	
	
}
