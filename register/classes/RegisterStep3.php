<?php
require_once dirname(__FILE__)."/AbstractProcess.php";
class RegisterStep3 extends AbstractProcess{
	public function render(){
		$smarty = $this->smarty;
		$db = $this->db;
		$this->initializeForm();
		$code = $_REQUEST["c"];
		$validation = $db->fetchRow($db->select()->from("jobseeker_session_transfer")->where("hashcode = ?", $code));
		if ($validation){
			$session = json_decode($validation["session_data"]);
			$_SESSION["userid"] = $session->userid;
			$_SESSION["emailaddr"] = $session->emailaddr;
			$smarty->assign("userid", $session->userid);
			$db->delete("jobseeker_session_transfer", $db->quoteInto("hashcode = ?", $code));
		}else{
			$smarty->assign("userid", $_SESSION["userid"]);
		}
        
//        if (TEST){
//            $this->smarty->assign("base_au_url", "http://devs.remotestaff.com.au");
//        }else{
//            $this->smarty->assign("base_au_url", "https://remotestaff.com.au");
//        }
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
		$smarty->display("step3.tpl");
	}
	
	private function initializeForm(){
		$smarty = $this->smarty;	
		$items = array(
				""=>"Month",
				"1"=>"Jan",
				"2"=>"Feb",
				"3"=>"Mar",
				"4"=>"Apr",
				"5"=>"May",
				"6"=>"Jun",
				"7"=>"Jul",
				"8"=>"Aug",
				"9"=>"Sep",
				"10"=>"Oct",
				"11"=>"Nov",
				"12"=>"Dec"
			);
			
		
		$smarty->assign("option_months", $items);
		
		$items = array();
		$items[] = "Day";
		for($i=1;$i<=31;$i++){
			$items[] = $i;
		}
		$smarty->assign("option_days", $items);
		
		
		$items = array();
		
		for($i=7;$i<=11;$i++){
			if ($i<=9){
				$items[] = "0".$i.":00 am";
				$items[] = "0".$i.":30 am";
			}else{
				$items[] = $i.":00 am";
				$items[] = $i.":30 am";
			}
		}
		
		$items[] = "12:00 pm";
		$items[] = "12:30 pm";
		
		
		for($i=1;$i<=6;$i++){	
			$items[] = $i.":00 pm";
			$items[] = $i.":30 pm";
		}
		
		$smarty->assign("option_time", $items);
		
	}
}