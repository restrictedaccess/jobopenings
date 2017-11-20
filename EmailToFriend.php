<?php
include('conf/zend_smarty_conf.php');
include 'portal/lib/validEmail.php';
include('class.php');
$passGen = new passGen(5);
//$smarty = new Smarty();

$job = $_GET['job'];
$userid=$_SESSION['userid'];

$pass3 = $_REQUEST['pass3'];
$rv2 = $_POST['rv2'];

if(!$job){
	die("Job Id is missing");
}



if($userid != ""){

	$sql=$db->select()
		->from('personal')
		->where('userid = ?' ,$userid);
	$result = $db->fetchRow($sql);	
	$fname = $result['fname'];
	$lname=$result['lname'];
	$email = $result['email'];
	
}

$sql = $db->select()
	->from('posting')
	->where('id = ?', $job);
$ad = $db->fetchRow($sql);	



if(isset($_POST['send'])){
	
	// validation here
	if(!$passGen->verify($pass3, $rv2)) {
		echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><script type='text/javascript'>";
		echo 'window.parent.alert("Invalid access number.");';
		echo 'history.go(-1);';
		echo "</script></head><body></body></html>";
		exit;
	}
	

	$from_email = trim($_POST['from_email']);
	$from_name = trim($_POST['from_name']);
	$email = trim($_POST['email']);
	$body ="<div style='font:12px Tahoma; padding:10px;'>
				<div style='margin-bottom:20px;'><img src='http://remotestaff.com.ph/images/remote-staff-logo.jpg' border='0'></div>
				<div align='justify' style='padding:15px;' >
						<p>Hi,</p>
						<p>Your friend ".$from_name." sent you a message about our Job Offer located in <a href='www.remotestaff.com.ph'>www.remotestaff.com.ph</a> </p>
						<p>&nbsp;</p>
						<p align='center'><b>Job Opening : ".$ad['jobposition']."</b><br />AD#".$ad['id']."</p>
						<div>".$ad['heading']."</div>";
	$sqlCheckResponsibility= $db->select()
		->from('posting_responsibility')
		->where('posting_id = ?' , $ad['id']);
	$responsibilities = $db->fetchAll($sqlCheckResponsibility);
	if(count($responsibilities) > 0){
		$body .= "<p><b>Responsibilities</b></p>";
		$body .= "<div style='margin-top:10px;'>";
		$body .= "<ul>";
		foreach($responsibilities as $responsibility){
			$body .= "<li>".$responsibility['responsibility']."</li>";
		}
		$body .= "</ul>";
		$body .= "</div>";
	}
	
	// Check if the Ads has Requirements
	$sqlCheckRequirement= $db->select()
		->from('posting_requirement')
		->where('posting_id = ?' , $ad['id']);
	$requirements = $db->fetchAll($sqlCheckRequirement);
	if(count($requirements) > 0){
		$body .= "<p><b>Requirements</b></p>";
		$body .= "<div style='margin-top:10px;'>";
		$body .= "<ul>";
		foreach($requirements as $requirement){
			$requirement["requirement"] = str_replace("–", "-", $requirement["requirement"]);
			$body .= "<li>".mb_convert_encoding($requirement['requirement'], "UTF-8")."</li>";
		}
		$body .= "</ul>";
		$body .= "</div>";
	}

					
						
	$body .="</div></div>";
	
	//echo $body;
	$mail = new Zend_Mail("UTF-8");
	$mail->setBodyHtml($body);
	$mail->setFrom($from_email, $from_name);
	$mail->setSubject("Remotestaff Job Offer : ".$ad['jobposition']);
	/*
	if(! TEST){
		for ($i = 0; $i < count($_POST['email']); ++$i){
			if(trim($_POST['email'][$i])!=""){
				if (validEmail($email)){ 
					$mail->addTo(trim($_POST['email'][$i]));		
				}
			}	
		}
		
	}else{
		for ($i = 0; $i < count($_POST['email']); ++$i){
			if(trim($_POST['email'][$i])!=""){
				if (validEmail($email)){ 
					$mail->addTo(trim($_POST['email'][$i]));		
					//$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
				}
			}	
		}
		
	}
	*/
	if($email!=""){
		$email_array = explode(",",$email);
		//for($i=0; $i<count($email_array);$i++){
		$cnt = count($email_array) > 5 ? 5 : count($email_array);
		for($i=0; $i<$cnt;$i++){
			if(! TEST){
				$mail->addTo(trim($email_array[$i]));
			}else{
				//$mail->addTo('devs@remotestaff.com.au', 'Remotestaff Developers');
				$mail->addTo(trim($email_array[$i]));
			}	
		}
	}
	
	$mail->send();
	$mess =  "Message sent.";
	$email = "";
}


/*
$smarty->assign('job' , $job);
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Pragma: no-cache");
$smarty->display('EmailToFriend.tpl');
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="./js/MochiKit.js"></script>
<script type="text/javascript" src="js/addrow-v2.js"></script>
<script type="text/javascript">
<!--

String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
function CheckEmail(){
	if($('from_name').value == ""){
		alert("Please type in your name");
		return false;
	}
	if($('from_email').value == ""){
		alert("Please type in your email address");
		return false;
	}
	
	if($('email').value == ""){
		alert("Please type in recipient(s) email address");
		return false;
	}

	var emails = $('email').value;
	var youremail = $('from_email').value;

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(youremail)){
		alert("The email you entered is invalid");
		return false
	}


	emails = emails.split(",");
	for(i=0;i<emails.length;i++){
		if(!filter.test(emails[i].trim())){
			alert("One of the placed email for the recipients for this job posting is invalid.");
			return false;
		}
	}
	
}
-->
</script>
<title>Email To Friend</title>
</head>

<body>
<?php if($mess) {?>
<div style="text-align:center; background:#FFFF00; font-weight:bold;"><?php echo $mess;?></div>
<?php } ?>
<form name="form" method="post" action="EmailToFriend.php?job=<?php echo $job;?>" onsubmit="return CheckEmail();">
<table width="100%" cellpadding="2" cellspacing="0"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">

<tr bgcolor="#FFFFFF">
<td width="19%">From Name</td>
<td width="81%"><input type="text" name="from_name" id="from_name" size="60" /></td>
</tr>

<tr bgcolor="#FFFFFF">
<td >From Email</td>
<td ><input type="text" name="from_email" id="from_email" size="60" value="<?php echo $email;?>" /></td>
</tr>

<tr bgcolor="#FFFFFF">
<td >Subject</td>
<td >
<div><b>Remotestaff Job Offer</b></div>
<div>Job Opening : <?php echo $ad['jobposition'];?></div>
</td>
</tr>


<tr><td colspan="2"><hr /></td></tr>
<tr><td colspan="2" valign="top">
Insert Email addresses  separated by comma "," (<span style='font-size:9px;color:#ff0000;'>maximum of 5 recipients</span>)
<table width="100%" cellpadding="2" cellspacing="0">
<tr class="row_to_clone">
<td width="19%">To</td>
<td width="81%"><input name="email" id="email" type="text" size="60"  /></td>
</tr>
</table>
</td>
</tr>
<!--<tr><td colspan="2"><span style="color:#0000FF; cursor:pointer; font-weight:bold;" onclick="addRow(); return false;" >Add More</span></td></tr>-->
<tr><td colspan="2">
<span style="text-align:center;font-size:11px;">For validation, type the numbers you see</span> <br />
<?php  $rv2 = $passGen->password(0, 1); ?>
<input type="hidden" value="<?php  echo $rv2 ?>" name="rv2" id="rv2">
<?php  echo $passGen->images('./font', 'gif', 'f_', '20', '20'); ?>	  
<input type="text" value="" name="pass3" id="pass3"  style="width:80px;" maxlength="5">
</td>
</tr>

<tr>
<td colspan="2">
<div style="border-top:#999999; margin-top:20px;">
<input type="submit" name="send" value="Send" /><input type="button" value="cancel" onclick="self.close()"/>
</div>
</td></tr>

</table>
</form>
</body>
</html>



