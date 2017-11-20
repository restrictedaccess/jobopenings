<?php
require_once dirname(__FILE__)."/AbstractProcess.php";
class RegisterStep2 extends AbstractProcess{
	public function render(){
		$smarty = $this->smarty;
		$db = $this->db;
		$hashcode = $_REQUEST["c"];
		$this->initializeForm();
		if (!$hashcode){
			header("Location:/register/");
		}
		$smarty->assign("registration_data", $_SESSION["registration"]);
		$validation = $db->fetchRow($db->select()->from("jobseeker_email_validations")->where("hashcode = ?", $hashcode));
		if ($validation){
			$today = date("Y-m-d H:i:s");
			if (strtotime($today)<=strtotime($validation["expiration_date"])){
				$db->update("jobseeker_email_validations", array("validated"=>1), $db->quoteInto("hashcode = ?", $hashcode));	
			}else{
				header("Location:/register/");
			}
			$_SESSION["emailaddr"] = $validation["email"];
			$smarty->assign("validation", $validation);
			
			$smarty->assign("hashcode", $hashcode);
			$smarty->assign("promocode", $_COOKIE["promo_code"]);
//            if (TEST){
//            $this->smarty->assign("base_au_url", "http://devs.remotestaff.com.au");
//            }else{
//                $this->smarty->assign("base_au_url", "https://remotestaff.com.au");
//            }
//
//            if (TEST){
//                $this->smarty->assign("base_ph_url", "http://devs.remotestaff.com.ph");
//            }else{
//                $this->smarty->assign("base_ph_url", "http://remotestaff.com.ph");
//            }
            global $base_au_url;
            global $base_ph_url;
            $this->smarty->assign("base_au_url", $base_au_url);
            $this->smarty->assign("base_ph_url", $base_ph_url);
            
			$smarty->display("step2.tpl");
		}else{
			header("Location:/register/");
		}
		
	}
	
	private function initializeForm(){
		$db = $this->db;
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
		
		
		//position desired
		$categories = $this->getCategories();
		$position_first_choice_options = "<option value=''>Select Position</option>";
		$position_second_choice_options = "<option value=''>Select Position</option>";
		$position_third_choice_options = "<option value=''>Select Position</option>";

		foreach($categories as $key=>$category){

			$categories[$key]['subcategories'] = $this->getSubCategories($category['category']['id']);
			$position_first_choice_options .= "<optgroup label='".$category['category']['name']."'>";;
			$position_second_choice_options .= "<optgroup label='".$category['category']['name']."'>";;
			$position_third_choice_options .= "<optgroup label='".$category['category']['name']."'>";;
			foreach($categories[$key]['subcategories'] as $key2=>$subcategory){

				//create sub-categories option
				$selected = "";
				
				if($subcategory['category_name'] != ''){
					
					$position_first_choice_options .= "<option value='".$key2."'>".$subcategory['category_name']."</option>";
					$position_second_choice_options .= "<option value='".$key2."'>".$subcategory['category_name']."</option>";
					$position_third_choice_options .= "<option value='".$key2."'>".$subcategory['category_name']."</option>";	
					
				}
					
			}
			$position_first_choice_options .= "</optgroup>";
			$position_second_choice_options .= "</optgroup>";
			$position_third_choice_options .= "</optgroup>";
		}
		$position_first_choice_exp_options = $this->generatePositionExperienceOptions("position_first_choice_exp");
		$position_second_choice_exp_options = $this->generatePositionExperienceOptions("position_second_choice_exp");
		$position_third_choice_exp_options = $this->generatePositionExperienceOptions("position_third_choice_exp");
		
		$smarty->assign("position_first_choice_options", $position_first_choice_options);
		$smarty->assign("position_second_choice_options", $position_second_choice_options);
		$smarty->assign("position_third_choice_options", $position_third_choice_options);
		
		$smarty->assign('position_first_choice_exp_options',$position_first_choice_exp_options);
		$smarty->assign('position_second_choice_exp_options',$position_second_choice_exp_options);
		$smarty->assign('position_third_choice_exp_options',$position_third_choice_exp_options);
		
		
		//load all industries
		$industries1 = $db->fetchAll($db->select()->from(array("di"=>"defined_industries"))->limitPage(1, 30));
		$industries2 = $db->fetchAll($db->select()->from(array("di"=>"defined_industries"))->limitPage(2, 30));

		  $sources = array("Jobstreet", "JobsDB", "Monster.com", "Employee Referral", "Job Fair", "Best Jobs", "Great Jobs", "Hiring Venue", "IT Pinoy", "Jobs Pen", "Jobspot PH", "Job Isaland", "Job Openings PH", "Job Philippines", "Locanto", "OLX", "Philippines JOB PH", "Pinoy Adster", "Resume Promo", "Sulit.com", "The Jobs Daily", "Web Geek PH", "Woop Ads", "Yello", "Facebook", "Linkein", "Tumblr", "Titter", "Skillspages", "Ayosdito", "Pinoy Exchange");
		
		$smarty->assign("sources", $sources);
		$smarty->assign('industries1',$industries1);
		$smarty->assign('industries2',$industries2);
						
	}
	
	/**
	 * Responsible for generating Position Experience
	 */
	private function generatePositionExperienceOptions($name){
		$is_yes_checked = "";
		$is_no_checked = "";
		return '<input type="radio" name="'.$name.'"  id="'.$name.'" value="Yes" '.$is_yes_checked.' /> yes
		<input type="radio" name="'.$name.'"  id="'.$name.'" value="No" '.$is_no_checked.' /> no ';
	}
	
	/**
	 * Get All Categories
	 */
	private function getCategories($category = null){

		$db = $this->db;

		$category_filter = '';
		if($category != null){
			$category_filter = 'and  category_id = '.$category;
		}

		$select="SELECT category_id, category_name FROM job_category
			WHERE status='posted' ".$category_filter." 
			ORDER BY category_name";
		$rows = $db->fetchAll($select);

		$categories = array();
		foreach($rows as $row){
			$category = array();
			$category['category']['id'] = $row['category_id'];
			$category['category']['name'] = $row['category_name'];
			$categories[] = $category;
		}
		return $categories;
	}
	/**
	 * Get All subcategory under the given category
	 */
	private function getSubCategories($category_id){

		$db = $this->db;
		$select = "SELECT sub_category_id, sub_category_name
				FROM job_sub_category 
				WHERE category_id='".$category_id."' AND 
				status = 'posted' 
				ORDER BY sub_category_name";
		$rows = $db->fetchAll($select);

		$subcategories = array();
		foreach($rows as $row){
			$subcategories[$row['sub_category_id']]['category_name'] = $row['sub_category_name'];
		}
		return $subcategories;
	}
	
	
}