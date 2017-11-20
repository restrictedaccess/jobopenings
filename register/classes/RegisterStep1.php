<?php
require_once dirname(__FILE__)."/AbstractProcess.php";
class RegisterStep1 extends AbstractProcess{
	public function render(){

		$smarty = $this->smarty;
		$this->collectInput();
		$this->setPromoCode();
		$smarty->assign("registration_data", $_SESSION["registration"]);

//        if (TEST){
//            $this->smarty->assign("base_au_url", "http://devs.remotestaff.com.au");
//        }else{
//            $this->smarty->assign("base_au_url", "https://remotestaff.com.au");
//        }
//        if (TEST){
//            $this->smarty->assign("base_ph_url", "http://devs.remotestaff.com.ph");
//        }else{
//            $this->smarty->assign("base_ph_url", "http://remotestaff.com.ph");
//        }

        global $base_au_url;
        global $base_ph_url;
        $this->smarty->assign("base_au_url", $base_au_url);
        $this->smarty->assign("base_ph_url", $base_ph_url);


		$smarty->display("index.tpl");
        
        
	}
	
	private function collectInput(){
		$_SESSION["registration"] = array();
		if (isset($_POST["fname"])){
			$_SESSION["registration"]["fname"] = $_POST["fname"];
		}
		if (isset($_POST["lname"])){
			$_SESSION["registration"]["lname"] = $_POST["lname"];
		}
		if (isset($_POST["email"])){
			$_SESSION["registration"]["email"] = $_POST["email"];
		}
		if (isset($_POST["bmonth"])){
			$_SESSION["registration"]["bmonth"] = $_POST["bmonth"];
		}
		if (isset($_POST["bday"])){
			$_SESSION["registration"]["bday"] = $_POST["bday"];
		}
		if (isset($_POST["byear"])){
			$_SESSION["registration"]["byear"] = $_POST["byear"];
		}
		
		if (isset($_POST["gender"])){
			$_SESSION["registration"]["gender"] = $_POST["gender"];
		}
		if (isset($_POST["nationality"])){
			$_SESSION["registration"]["nationality"] = $_POST["nationality"];
		}
		if (isset($_POST["permanent_residence"])){
			$_SESSION["registration"]["permanent_residence"] = $_POST["permanent_residence"];
		}
		
	}
	
	private function setPromoCode(){
		//track promo code
		if (isset($_REQUEST["promo_code"])&&$_REQUEST["promo_code"]){
			if (!isset($_COOKIE["promo_code"])){
				$booking_code = $_REQUEST["promo_code"];
				$_SESSION["promo_code"] = $booking_code;
				setcookie("promo_code",$booking_code,2592000 + time()) ;
			}else{
				$_SESSION["promo_code"] = $_COOKIE["promo_code"];
			}
		}
	}
}
