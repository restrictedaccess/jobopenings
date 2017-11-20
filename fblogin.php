<?php
include ('conf/zend_smarty_conf.php');

$userid = $_SESSION['userid'];
//echo $userid;
$mess = $_REQUEST['mess'];
$job = $_REQUEST['job'];
$code = $_REQUEST['code'];
$code = $_REQUEST['code'];
if ($code == 1) {
	$mess = "<img src='images/problem2.gif' alt='Error'><br>Applicant Does Not Exist !";
}

if ($code == 2) {
	$mess = "<p><b>YOUVE ALREADY APPLIED FOR THIS JOB</b></p>";
}

if ($code == 3) {
	$mess = "<p><b>THANK YOU FOR APPLYING PLEASE WAIT FOR FURTHER NOTICE FROM US !</b></p>";
}

if ($job != "") {
	$sqlAds = $db -> select() -> from('posting', 'jobposition') -> where('id = ?', $job);
	$job_adsname = $db -> fetchOne($sqlAds);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="verify-v1" content="LaxjipBphycGX3aaNPJVEJ4TawiiEs/3kDSe15OJ8D8=" />
		<title>BPO Company Remote Staff Official Website | Hire Offshore Staff from Remote Staff | Outsource Staff, Inexpensive and Professional Online Staff, Virtual Assistant and IT Offshore Outsourcing BPO Services</title>
		<meta name="description" content="Outsource staff, inexpensive offshore staff, online staff and Virtual assistant working for you at $4 to $8 per hr, and you don't pay for holidays and sick pay. Save up to 70% off your labour cost with our IT Offshore Outsourcing Services we offer">
		<meta name="keywords" content="outsource staff, hire offshore staff, offshore staff, online staff, virtual assistant, IT offshore, offshore outsourcing, outsourcing services, offshore services, remote staff, BPO company, BPO Australia, outsourced staff, offshore labour, offshore hire, offshore labour hire, IT offshore outsourcing, IT offshore staff, labour cost, offshore outsourcing services, outsource offshore, outsource services, IT outsourcing services">
		<meta name="ROBOTS" content="NOODP">
		<meta name="GOOGLEBOT" content="NOODP">
		<meta name="title" content="Hire Offshore Staff from Remote Staff | Outsource Staff, Online Staff, Virtual Assistant and IT Offshore Outsourcing Services BPO Company">
		<meta name="classification" content="Outsource staff, inexpensive offshore staff, online staff and Virtual assistant working for you at $4 to $8 per hr, and you don't pay for holidays and sick pay. Save up to 70% off your labour cost with our IT Offshore Outsourcing Services we offer">
		<meta name="author" content="Remote Staff | Chris J">
		<meta name="robots" content="NOYDIR">
		<meta name="slurp" content="NOYDIR">
		<meta name="robots" content="index all,follow all">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Language" content="en-gb">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<script type="text/javascript" src="js/jquery.js"></script>
		<link href="css/style.css" type="text/css" rel="stylesheet"  />
		<link href="css/fb.css" type="text/css" rel="stylesheet"/>
		<script language="Javascript" src="js/functions.js"></script>

	</head>
	<body class="sub-bg">
		<div id="container">
			<?php
			include ("inc/header.php");
 ?>
			<!--  End of Header -->
			<?php
				include ("inc/nav.php");
 ?>
			<!-- End of Navigation -->

			<div id="main-image" style="height:30px;"></div>
			<!-- End of Main Image -->
			<div id="contents">
				<h1>Register via Facebook</h1>
				<div id="fb-root"></div>
				<script src="https://connect.facebook.net/en_US/all.js#appId=423675957728278&xfbml=1"></script>
				
				<center>
				<?php
				if (TEST){
				?>
				<fb:registration 
				  fields="[
				  
				 {'name':'name'},
				 {'name':'first_name'},
				 {'name':'last_name'},
				 {'name':'email'},
				 {'name':'location'},
				 {'name':'gender'},
				 {'name':'birthday'},
				 {'name':'phone','description':'Mobile Number','type':'text'}]"  
				  redirect-uri="http://test.remotestaff.com.ph/fb_ph_capture_register.php"
				  width="530" fb_only="true" scope="email,user_birthday,status_update,publish_stream,user_about_me">
				</fb:registration>
								
				<script type="text/javascript">
					var baseUrl = "http://test.remotestaff.com.au";
				</script>
				<?php }else{ ?>
				<fb:registration 
				  fields="[
				 {'name':'name'},
				 {'name':'first_name'},
				 {'name':'last_name'},
				 {'name':'email'},
				 {'name':'location'},
				 {'name':'gender'},
				 {'name':'birthday'},
				 {'name':'phone','description':'Mobile Number','type':'text'}]"  
				  redirect-uri="http://www.remotestaff.com.ph/fb_ph_capture_register.php"
				  width="530" fb_only="true" scope="email,user_birthday,status_update,publish_stream,user_about_me">
				</fb:registration>
								
				<script type="text/javascript">
					var baseUrl = "http://remotestaff.com.au";
				</script>
				<?php
				}
				?>
				</center>
			</div>
		</div>
		<!-- End of Content Box  -->
		</div><!-- End of Container -->
		<?php include('inc/footer.php'); ?>
	</body>
</html>
