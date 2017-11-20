<?php 
include('conf/zend_smarty_conf.php');

$userid=$_SESSION['userid'];
if($userid!=""){
	$sql=$db->select()
		->from('personal')
		->where('userid = ?' ,$userid);
	$result = $db->fetchRow($sql);	
	$staff_name = $result['fname']." ".$result['lname'];
	$staff_email = $result['email'];
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
<link href="css/style.css" type="text/css" rel="stylesheet"  />
<script language="Javascript" src="js/functions.js"></script>

</head>
<body class="sub-bg">
<div id="container">
  <?php include("inc/header.php"); ?>
  <!--  End of Header -->
<?php include("inc/nav.php"); ?><!-- End of Navigation -->

<div id="main-image" style="height:30px;"></div>
<!-- End of Main Image -->
<div id="contents">
<p>Dear <?php echo $_GET['fname']." ".$_GET['lname'];?> ,</p>
<p>Thank you for registering.</p>
<p><b>The code has been sucessfully sent to your primary email.</b> [ <?php echo $_GET['email'];?> ] </p>
<p>Code verification is done to ensure that your email address is valid. Valid email address is required to process your application as this will be your initial means of contact. </p>

</div>
</div>
<!-- End of Content Box  -->
</div><!-- End of Container -->
<?php include('inc/footer.php'); ?>
<script type="text/javascript"> 
var fb_param = {}; 
fb_param.pixel_id = '6006919459206'; 
fb_param.value = '0.00'; 
(function(){ 
var fpw = document.createElement('script'); 
fpw.async = true; 
fpw.src = '//connect.facebook.net/en_US/fp.js'; 
var ref = document.getElementsByTagName('script')[0]; 
ref.parentNode.insertBefore(fpw, ref); 
})(); 
</script> 
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6006919459206&amp;value=0" /></noscript> 
</body>
</html>
