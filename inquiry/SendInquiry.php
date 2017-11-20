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

$pass3 = $_REQUEST['pass3'];
$passGenn = new passGen(5);
$rv2 = $_POST['rv2'];

$fullname=trim($_REQUEST['fullname']);
$email=trim($_REQUEST['email']);

$mobile =$_REQUEST['mobile'];
$question = $_REQUEST['question'];

if($passGenn->verify($pass3, $rv2))
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
	if (!validEmail($email)){ 
		//Invalid Email Address
		echo "01";
		exit();
	}
	
	$site = $_SERVER['HTTP_HOST'];
	$body = "
	<p>Online Inquiry from ".$fullname." [".$site."]</p>
	<p>&nbsp;</p>
	<table width='550' style='border:#62A4D5 solid 1px; font:11px tahoma;' cellpadding='3' cellspacing='0'>
				<tr bgcolor='#62A4D5'  >
					<td colspan='3' style='color:#FFFFFF;'><b>RemoStaff</b> Online Inquiry site  [".$site."]</td>
				</tr>
				
				
				<tr>
					<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>NAME</td>
					<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
					<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$fullname."</td>
				</tr>
				
				<tr>
					<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>EMAIL</td>
					<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
					<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$email."</td>
				</tr>
				
				<tr>
					<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>MOBILE.</td>
					<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
					<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$mobile."&nbsp;</td>
				</tr>
				
				<tr>
					<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>QUESTION.</td>
					<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
					<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".stripslashes($question)."&nbsp;</td>
				</tr>
				
			
				<tr>
					<td width='149' valign='top' style='border-bottom:#CCCCCC solid 1px;'>DATE</td>
					<td width='6' valign='top' style='border-bottom:#CCCCCC solid 1px;'>:</td>
					<td width='325' valign='top' style='border-bottom:#CCCCCC solid 1px;'>".$ATZ ."&nbsp;</td>
				</tr>
				</table>";	
				
		
		$subject= "Online Inquiry from ".$fullname." [".$site."]";
		$mail = new Zend_Mail();
		$mail->setBodyHtml($body);
		$mail->setFrom('noreply@remotestaff.com.au', 'No Reply');
		
		if(! TEST){
			$mail->addTo('applicants@remotestaff.com.au', 'applicants@remotestaff.com.au');
			//$mail->addCc('ricag@remotestaff.com.au', 'Admin');// Adds a recipient to the mail with a "Cc" header
			//$mail->addBcc('normanm@remotestaff.com.au');// Adds a recipient to the mail not visible in the header.
		}else{
			$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
		}
		
		$mail->setSubject($subject);
		$mail->send($transport);	

	
	
}
?>



