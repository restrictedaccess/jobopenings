<?php 
include('conf/zend_smarty_conf.php');
include_once('ShowPrice.php');
$show_price = ShowPrice::Show();
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
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<script type="text/javascript" src="video/flowplayer-3.1.4.min.js"></script>
<script type="text/javascript" src="js/ga_tracking_code.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<link href="css/style.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>

<link href="css/style.css" type="text/css" rel="stylesheet"  />
</head>
<body class="sub-bg" id="showstaff">
<?php include("inc/header.php"); ?><!--  End of Header -->
<div id="container">

<?php include("inc/nav.php"); ?><!-- End of Navigation -->

<div id="main-image" style="height:30px;"></div>
<!-- End of Main Image -->

<div id="contents">

<div style="float:left; width:246px;">
	<?if($show_price == False){
		echo '<fb:like-box href="http://www.facebook.com/pages/Remote-Staff-wwwremotestaffcomau/186026291427516" width="246" height="300" show_faces="true" stream="false" header="false"></fb:like-box>';
	}?>
	&nbsp;
</div>


<div id="content-main" style="width:408px;">
<h1>Example of contracted staff <br />
  working right now</h1>

<p>This selection is  a small sample of the hundreds of staff that are currently working with our clients, in most cases, for years. You will find that all our showcased staff are university graduates, tech-savvy, fluent in English, highly skilled and experienced in various work disciplines. While telecommuting from different cities across the Philippines, each contracted staff works as an integral part of the client�s businesses. Each case study will feature a brief job description, working accomplishments and a quick audio introduction by the staff. <strong>Click the job roles below to view success stories</strong></p> 

<br clear="all" />



</div><!-- End of Main Contents -->

<div id="content-right">
<p style="height:30px;">&nbsp;</p>
<a href="testimonials.php" id="showcasenav"><img src="images/btn-staff-testimonials.jpg" width="246" height="70" border="0" /></a></div>
<!-- End of Right Contents -->

</div><!-- End of Content Box  -->

<div style="clear:both"><img src="images/img-showcasing-staff1.jpg" border="0" usemap="#Map" />
<map name="Map" id="Map">  
  <area shape="circle" coords="192,150,96" href="showcasing-staff-IT.php" />
<area shape="circle" coords="448,153,96" href="showcasing-staff-marketing.php" />
<area shape="circle" coords="701,153,96" href="showcasing-staff-office.php" />
</map>

</div>

</div><!-- End of Container -->

<?php include('inc/footer.php'); ?>
</body>
</html>
