<?php
include('conf/zend_smarty_conf.php');
include('class.php');
require_once "inc/functions.php";
$passGen = new passGen(5);

if ($recruiters_promo_code=="fb.login"){
	include "fblogin.php";
	die;

}
if ($recruiters_promo_code&&trim($recruiters_promo_code)!=""){
	$ip = $_SERVER["REMOTE_ADDR"];
	$ipcountry = getCCfromIP($ip);
	$db->insert("personal_promo_code_hits", array("promo_code"=>$recruiters_promo_code, "date_created"=>date("Y-m-d H:i:s"), "ip_address"=>$ip, "ip_location"=>$ipcountry));
}

function getAPIURL(){

    if(TEST){
        return "http://test.api.remotestaff.com.au";
    } else if(STAGING){
    	return "http://staging.api.remotestaff.com.au";
	} else{
        return "http://api.remotestaff.com.au";
    }
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
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="video/flowplayer-3.1.4.min.js"></script>
<script type="text/javascript" src="js/MochiKit.js"></script>
<script language="Javascript" src="js/functions.js"></script>
<script type="text/javascript" src="register/register.js"></script>
<script type="text/javascript" src="inquiry/inquiry.js"></script>
<script type="text/javascript" src="js/ga_tracking_code.js"></script>
<link href="css/style.css" type="text/css" rel="stylesheet"  />

<script language="javascript">
/*
function listmin(idx,idy,idz){
toggle(idx);
//document.getElementById(idx).style.display = 'none';
document.getElementById(idy).style.display = 'none';
document.getElementById(idz).style.display = 'block';
}
function listmax(idx,idy,idz){
//document.getElementById(idx).style.display = 'block';
toggle(idx);
document.getElementById(idy).style.display = 'none';
document.getElementById(idz).style.display = 'block';
} */

function MinMax(id){

	obj = document.getElementById('tr_'+id);
	obj.style.backgroundImage = (obj.style.backgroundImage == 'url("images/avail-staff-left-title-expanded-new.jpg")') ? 'url("images/avail-staff-left-title-expanded-new.png")' : 'url("images/avail-staff-left-title-expanded-new.png")';
	toggle('tr_sub_'+id);

}
-->
</script>


</head>
<body id="homex">
<?php include("inc/header.php"); ?><!--  End of Header -->
<div id="container">

<?php include("inc/nav.php"); ?><!-- End of Navigation -->

<div id="headspacer">&nbsp;</div>
<!-- End of Main Image -->

<div id="contents">
<input id="baseAPIurl" type="hidden" value='<?php echo getAPIURL();?>'/>
<div id="content-left">
 <?php include("inc/home-left.php"); ?>
</div><!-- End of Left Contents -->

<div id="content-main">
<h1><!--<span style="color:#92b211">Work from Home Jobs for Filipinos!</span> <br /> -->You Can Earn Well, Excel, and Achieve the Career Growth You Want - Right from Your Very Own HOME!</h1>

<p><strong>Dear Filipino Professional,</strong></p>

<p>If you're ready to embrace global opportunities and expand your career choices while doing all this from the comfort of your own home, we invite you to <a href="http://www.remotestaff.com.au/portal/personal.php">signup</a> as a Remotestaff jobseeker today. We cultivate relationships based on mutual confidence - and we help foster trust between you and international employers to achieve sustainable long lasting careers. </p>

<h2>Countless Employment Contracting Opportunities Await Filipino Professionals Who Have...</h2>

<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">Confidence in Speaking and Understanding English</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">A Working Computer with Reliable DSL Broadband Internet Connection</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">A Quiet and Private Room to Work From</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">Serious Pro-active commitment to homebased work</p>

<!--<p><strong>RemoteStaff</strong>  matches your professional skills set with international employers. </p> -->



<h2>10 Reasons Why You Should Become a Remotestaff Jobseeker Today</h2>

<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">Assist both the client and staff in overcoming any cultural and communication issues as well as resolve any work style difference you may experience</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">We help staff better understand how to work effciently with international employers and to help them meet their employers expectations</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">Stable BPO with a proven track record of subcontracting hundreds of Filipino professionals</p>
<!--<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">We guarantee staff work a day and get paid a day, this is to assure staff commitments and eliminate any concerns staff might have with investing their time working with you.</p> -->
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">Work a day and get paid a day, guaranteed. Remote Staff eliminates any concerns you might have working with international employers and we take care of all payments in local peso currency so to elimitate any currency risk as well.</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">Staff experience fast career growth opportunties working with remote staff clients</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">Staff value working as a remote staff contractor because of the added job secruity offered by Remote Staff with the continuous re-hiring commitments we make to quality staff.</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">We access better quality staff by hiring professionals to work from home and offer a better quality work-life balance.</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">On-time payroll and salary remittance in local currency</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">We have a dedicated team of more than 20-plus in-house staff to assure your success with your cooperation.</p>
<p style="padding-left:25px; background:url(images/home-chk.png) top left no-repeat;">We have invested heavily in building our own technology from scratch, eg. Screenshots and WebCam Shots system, Activity tracker, Online attendance/timekeeping and payroll, CRM, etc </p>
<p></p>

<?php if ($recruiters_promo_code){
	?>
	<p align="center"><a href="<?php echo getPHSite(); ?>/register/"><img src="images/btn-registernow.jpg" border="0" /></a></p>
<?php
}else{
?>
	<p align="center"><a href="<?php echo getPHSite(); ?>/register/"><img src="images/btn-registernow.jpg" border="0" /></a></p>
<?php
}
?>

<p></p>



</div><!-- End of Main Contents -->

<div id="content-right">
<?php
include("inc/home-right.php");
include ("inc/inquiry-form.php");
?>

</div><!-- End of Right Contents -->
</div><!-- End of Content Box  -->
</div><!-- End of Container -->

<?php include('inc/footer.php'); ?>
<script type="text/javascript" src="http://dnn506yrbagrg.cloudfront.net/pages/scripts/0011/0256.js"> </script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

</body>
</html>
