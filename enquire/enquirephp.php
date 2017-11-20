<?php
//2010-06-15 Normaneil Macutay <normanm@remotestaff.com.au>
// - removed the nationality field


include '../conf/zend_smarty_conf.php';
include '../class.php';
include '../portal/lib/validEmail.php';
include '../time.php';

$AusTime = date("H:i:s"); 
$AusDate = date("Y")."-".date("m")."-".date("d");
$ATZ = $AusDate." ".$AusTime;

$pass2 = $_REQUEST['pass2'];
$url = $_REQUEST['url'];
$passGen = new passGen(5);
$rv = $_POST['rv'];

$string = $_REQUEST['ip'];
$patterns[0] = '/::ffff:/';
$replacements[0] = '';
$ip = preg_replace($patterns, $replacements, $string);
$tracking_no = $_REQUEST['promotional_code'];

$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$email=$_REQUEST['email'];
//$company_name=$_REQUEST['company_name'];
$office_number=$_REQUEST['office_number'];
$mobile=$_REQUEST['mobile'];
$questions=$_REQUEST['questions'];

$top_200_pdf_link = "";
$top_200 = $_REQUEST['top_200'];	
if($top_200 == "yes"){
	$top_200_pdf_link = "<p>Here is the link to <a href='http://remotestaff.com.au/top-200plus-productivity-software-tools.pdf' target='_blank'>Top 200 + Productivity Software Tools</a></p>";
}


if($passGen->verify($pass2, $rv))
{
	$status=1;
}
else
{
	echo "0";
	exit();
}


if($status == 1){
	//check the email validity
	$email = trim($_REQUEST['email']);
	if (!validEmail($email)){ 
		//Invalid Email Address
		echo "01";
		exit();
	}
	//check email if exist
	$sql ="SELECT * FROM leads WHERE email = '$email';";
	//echo $sql;
	$result = $db->fetchAll($sql);
	if(count($result) > 0){
		//echo "02";
		//echo "Email Exist . Please try to enter different email address!";
			$body = "<p>Dear Admin, </p>
					<p>An existing lead have sent an inquiry via the inquiry form on ".$site."</p>
					<p>Please see details below and action.</p>
			
			<table width='550' style='border:#62A4D5 solid 1px; font:11px tahoma;' cellpadding='3' cellspacing='0'>
						<tr bgcolor='#62A4D5'  >
							<td colspan='3' style='color:#FFFFFF;'><b>RemoStaff</b> lead Inquiry [".$site."]</td>
						</tr>
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>PROMOTIONAL CODE</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$tracking_no."</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>NAME</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$fname." ".$lname."</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>EMAIL</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$email."</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>MOBILE NO.</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$mobile."&nbsp;</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>OFFICE NO.</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$office_number."&nbsp;</td>
						</tr>
						
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>QUESTIONS / CONCERN</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$questions."&nbsp;</td>
						</tr>
						
						<tr>
							<td colspan='3' valign='top' style='border-bottom:#CCCCCC solid 1px;'>&nbsp;</td>
							
						</tr>
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>DATE REGISTERED </td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$ATZ ."&nbsp;</td>
						</tr>
						
						
						<tr>
							<td colspan='3' valign='top' style='border-bottom:#CCCCCC solid 1px;'>&nbsp;</td>
							
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>IP </td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$ip ."&nbsp;</td>
						</tr>
						
						</table>";	
						
			$subject= "An existing lead have sent an inquiry via the inquiry form on [".$site."]";
			$mail = new Zend_Mail();
			$mail->setBodyHtml($body);
			$mail->setFrom('noreply@remotestaff.com.au', 'No Reply');
			if(! TEST){
				$mail->addTo('admin@remotestaff.com.au', 'Admin');
			}else{
				$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
			}
			$mail->setSubject($subject);
			$mail->send($transport);
			
			//send email to client
						//send autoresponder to leads http://test.remotestaff.com.au/get_started/home.php
			
			$body="<div style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
		Hi ".$fname." ".$lname.",
		<p>&nbsp;</p>
		<p>Thanks for getting in touch with us.</p>
		<p>A remote staff representative will be in contact with you soon!</p>
		<p>Would you like to right away interview and check out candidates who might be qualified to work for your business?</p>
	
		<p>Go to <a href='http://$site/available-staff-list.php?sr=&cl=3&c=3&id=3' target='_blank'>Available Staff</a> to check out our pre screened, qualified and readily available candidates. You can also check out our <a href='http://$site/get_started/login.php' target='_blank'>Recruitment Service</a> for options of custom recruitment.</p>
		
		<p>&nbsp;</p>
		".$top_200_pdf_link."
		<p>&nbsp;</p>
		<p>Should you have any questions, please don’t hesitate to contact us. </p>
		<p>".ADMIN_EMAIL."<br>
			Australian Toll Free Number : 1300 733 430 <br />
			International Clients : <br />
			USA Ph: +1(415) 376 1472 <br />
			UK ph: +44(020) 3286 9010<br />
			AUS ph: +61(02) 8005 0569 <br />
		</p>											
</div>";
			$mail = new Zend_Mail();
			$mail->setBodyHtml($body);
			$mail->setFrom('noreply@remotestaff.com.au', 'Remotestaff');
			if(! TEST){
				$mail->addTo($email, $name);
			}else{
				$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
			}
			$mail->setSubject('Thanks for Getting in touch with us');
			$mail->send($transport);
			//C.
			//send email to leads

			
			
			exit();
	}else{
	
		
			//check the promotional code
			if($tracking_no == ""){
				$tracking_no="101";
				$agent_id = 2;
				$business_partner_id = 2;
				$agent_email = "chrisj@remotestaff.com.au";
				$name = "Chris Jankulovski";
				$work_status ="BP";
			}else{
			
				//Check the promocodes then add 1 (one) point to its current point
				$sqlCheckPromoCode="SELECT  * FROM tracking t WHERE tracking_no = '$tracking_no';";
				$result_check=$db->fetchRow($sqlCheckPromoCode);
				
				$promo_id = $result_check['id'];
				$points=$result_check['points'];
				$points=$points+1;
				if($promo_id != ""){
					$data =  array('points' => $points);
					$where = "id = ".$promo_id;
					$db->update('tracking', $data, $where);
				}
				//check whose the owner of the promotional code
				$sqlCheckAgents="SELECT * FROM agent a WHERE status='ACTIVE';";
				$result=$db->fetchAll($sqlCheckAgents);
				foreach($result as $agent){
				
					
					$agent_code= $agent['agent_code'];
					
				
					$length=strlen($agent_code);
					if(substr($tracking_no,0,$length)==$agent_code)
					{	
						$agent_no = $agent['agent_no'];
						$agent_fname= $agent['fname'];
						$agent_lname= $agent['lname'];
						$agent_email= $agent['email'];
						$work_status= $agent['work_status'];
						$agent_id = $agent_no;
						break;
					}
				}
				
				
				if($work_status == "BP"){
					$agent_id = $agent_no;
					$business_partner_id = $agent_no;
					$name = "BP : ".$agent_fname." ".$agent_lname;
				}else if($work_status == "AFF"){
					//the owner of the promotional code is an affiliate
					//we should get the fname , lname and email of the business partner
					$sqlBP="SELECT business_partner_id, fname , lname , email FROM agent_affiliates a LEFT JOIN agent b ON b.agent_no = a.business_partner_id WHERE a.affiliate_id = $agent_id AND b.status = 'ACTIVE';";
					//echo $sqlBP;
					$result = $db->fetchRow($sqlBP);
					$business_partner_id = $result['business_partner_id'];
					$bp_name = $result['fname']." ".$result['lname'];
					$bp_email = $result['email']; 
					$email_bp = "yes";
					$name = "AFF : ".$agent_fname." ".$agent_lname." / BP : ".$bp_name;
				}else{
					$agent_id = 2;
					$business_partner_id = 2;
					$agent_email = "chrisj@remotestaff.com.au";
					$name = "BP : Chris Jankulovski";
					
				}
			}
			
			/* make a random string password for client */
			$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
			$rand_pw = '';    
			for ($p = 0; $p < 10; $p++) {
				$rand_pw .= $characters[mt_rand(0, strlen($characters))];
			}
			
			//INSERT NEW RECORD
			$data = array('tracking_no' => $tracking_no,
					'timestamp' => $ATZ,
					'status' => 'New Leads', 
					'your_questions' => $questions, 
					'fname' => $fname,
					'lname' => $lname, 
					'email' => $email, 
					'password' => sha1($rand_pw),
					'officenumber' => $office_number, 
					'mobile' => $mobile, 
					'leads_ip' => $ip,
					'agent_id' => $agent_id ,
					'business_partner_id' => $business_partner_id
					);
			//print_r($data);		
			$db->insert('leads', $data);		
			$leads_id = $db->lastInsertId();		
			
			$data = array(
						'leads_id' => $leads_id, 
						'date_change' => $ATZ, 
						'changes' => 'Registered in Enquire Form homepage '.$site, 
						'change_by_id' => $leads_id, 
						'change_by_type' => 'client'
						);
			$db->insert('leads_info_history', $data);
			
			$_SESSION['leads_id'] = $leads_id;
			
			$data = array('personal_id' => $leads_id);
			$where = "id = ".$leads_id;
			$db->update('leads', $data, $where);
			
			
			
			
			$body = "<table width='550' style='border:#62A4D5 solid 1px; font:11px tahoma;' cellpadding='3' cellspacing='0'>
						<tr bgcolor='#62A4D5'  >
							<td colspan='3' style='color:#FFFFFF;'><b>RemoStaff</b> New lead Registered [".$site."]</td>
						</tr>
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>PROMOTIONAL CODE</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$tracking_no."</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>NAME</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$fname." ".$lname."</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>EMAIL</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$email."</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>MOBILE NO.</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$mobile."&nbsp;</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>OFFICE NO.</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$office_number."&nbsp;</td>
						</tr>
						
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>QUESTIONS / CONCERN</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$questions."&nbsp;</td>
						</tr>
						
						<tr>
							<td colspan='3' valign='top' style='border-bottom:#CCCCCC solid 1px;'>&nbsp;</td>
							
						</tr>
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>DATE REGISTERED </td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$ATZ ."&nbsp;</td>
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>LEADS OF</td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$name."&nbsp;</td>
						</tr>
						<tr>
							<td colspan='3' valign='top' style='border-bottom:#CCCCCC solid 1px;'>&nbsp;</td>
							
						</tr>
						
						<tr>
							<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>IP </td>
							<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
							<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$ip ."&nbsp;</td>
						</tr>
						
						</table><div style='color:#CCCCCC'>Leads Id : $leads_id</div>";	
						
			//echo $message;
			//send email to admin and chris
			$admin_email = "info@remotestaff.com.au";
			$admin_name = "Remotestaff";
			$subject= "NEW LEADS ENQUIRY FROM SITE [".$site."]";
			
			$mail = new Zend_Mail();
			$mail->setBodyHtml($body);
			$mail->setFrom($admin_email, $admin_name);
			if(! TEST){
				$mail->addTo('chrisj@remotestaff.com.au', 'Chris Jankulovski');
				$mail->addCc('ricag@remotestaff.com.au', 'Admin');// Adds a recipient to the mail with a "Cc" header
				//$mail->addBcc('normanm@remotestaff.com.au');// Adds a recipient to the mail not visible in the header.
			}else{
				$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
			}
			
			
			
			$mail->setSubject($subject);
			$mail->send($transport);
			
			//send email to BP or AFF
			if($agent_id != 2){
				$mail = new Zend_Mail();
				$mail->setBodyHtml($body);
				$mail->setFrom($admin_email, $admin_name);
				if(! TEST){
					$mail->addTo($agent_email, $agent_fname." ".$agent_lname);
				}else{
					$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
				}
				$mail->setSubject($subject);
				$mail->send($transport);
			}
			
			if($email_bp == "yes"){
				$mail = new Zend_Mail();
				$mail->setBodyHtml($body);
				$mail->setFrom($admin_email, $admin_name);
				if(! TEST){
					$mail->addTo($bp_email, $bp_name);
				}else{
					$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
				}
				$mail->setSubject($subject);
				$mail->send($transport);
			}
			
			//C.
			//send autoresponder to leads http://test.remotestaff.com.au/get_started/home.php
			
			$body="<div style='font-family:Arial, Helvetica, sans-serif; font-size:14px;'>
		Hi ".$fname." ".$lname.",
		<p>&nbsp;</p>
		<p>Thanks for getting in touch with us.</p>
		<p>A remote staff representative will be in contact with you soon!</p>
		<p>Would you like to right away interview and check out candidates who might be qualified to work for your business?</p>
	
		<p>Go to <a href='http://$site/available-staff-list.php?sr=&cl=3&c=3&id=3' target='_blank'>Available Staff</a> to check out our pre screened, qualified and readily available candidates. You can also check out our <a href='http://$site/get_started/login.php' target='_blank'>Recruitment Service</a> for options of custom recruitment.</p>
		
		<p>&nbsp;</p>
		".$top_200_pdf_link."
		<p>&nbsp;</p>

		
	<p>A user name and password has been assigned to you below.  You can use these credentials to avail of any of our services on site and for ease of transaction. </p>
		<p>
		Username/Email: ".$email."<br>
		Password: ".$rand_pw."<br>
		</p>
		<p>Should you have any questions, please don’t hesitate to contact us. </p>
		<p>".ADMIN_EMAIL."<br>
			Australian Toll Free Number : 1300 733 430 <br />
			International Clients : <br />
			USA Ph: +1(415) 376 1472 <br />
			UK ph: +44(020) 3286 9010<br />
			AUS ph: +61(02) 8005 0569 <br />
		</p>											
</div>";
			$mail = new Zend_Mail();
			$mail->setBodyHtml($body);
			$mail->setFrom('noreply@remotestaff.com.au', 'Remotestaff');
			if(! TEST){
				$mail->addTo($email, $name);
			}else{
				$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
			}
			$mail->setSubject('Thanks for Getting in touch with us');
			$mail->send($transport);
			//C.
			//send email to leads
	 }		
}

?>



