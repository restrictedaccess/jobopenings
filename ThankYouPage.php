<?php 
include('conf/zend_smarty_conf.php');

session_start();
if(isset($_REQUEST))
{
	if($_REQUEST['apply_type']==0)
	{
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$current_jo = $_REQUEST['job_title'];
		$_SESSION['userid']  =  $_REQUEST['userid'];
		$_SESSION['_id'] = $_REQUEST['_id'];
	}
	else
	{
		
		if(!$_SESSION['userid'])
		{
			$_SESSION['userid'] = $_REQUEST['userid'];
		}
		   
		$job_title = $_REQUEST['job_title'];
		$count = $_REQUEST['mon_cnt'];
		$_SESSION['_id'] = $_REQUEST['_id'];
	}
	
}
	function getApplyType()
	{
		return $_REQUEST['apply_type'];
	}
	function getAPIURL(){
        
    if(TEST){
        return "http://test.api.remotestaff.com.au";
    }
    else{
        return "http://api.remotestaff.com.au";
    }
}

function getLink(){
        
    if(TEST){
        return "http://devs.remotestaff.com.au";
    }
    else{
        return "http://remotestaff.com.au";
    }
}

function getLinkPH(){
        
    if(TEST){
        return "http://devs.remotestaff.com.ph";
    }
    else{
        return "www.remotestaff.com.ph";
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
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<link href="css/style.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script language="Javascript" src="js/functions.js"></script>
<style>
	
	div#blackOut {
	position: fixed;
	top: 0;
	left: 0;
	height:100%;
	width: 100%;
	background-color: #000;
	z-index: 2000;
}
div#whiteBox {
	position:fixed;
	top:50%;
	left:50%;
	background-color:white;
	border:black 2px solid;
	padding:10px;
	z-index: 2500;
}
#prompt
{
        position: absolute;
	z-index: 2500;
        padding:10px;
        background-color: white;
        border:1px solid black;
        text-align: center;
        font-weight: bold;
        display:none;  
        font-family: sans-serif;
}
a.boxclose{
    float:right;
    margin-top:-20px;
    margin-right:-10px;
    cursor:pointer;
    color: #fff;
    border: 1px solid #AEAEAE;
    background: #605F61;
    font-size: 25px;
    font-weight: bold;
    display: inline-block;
    line-height: 3px;
    padding: 5px 3px; 
    text-decoration: none;

}

</style>

</head>
<body class="sub-bg">
<div id="container">
  <?php include("inc/header.php"); ?>
  <!--  End of Header -->
<?php include("inc/nav.php"); ?><!-- End of Navigation -->

<div id="main-image" style="height:30px;"></div>
<!-- End of Main Image -->
<div id="contents" style="padding-bottom: 100px;">
 <input id="baseAPIurl" type="hidden" value='<?php echo getAPIURL();?>'/>
  <input id="userid" type="hidden" value='<?php echo $_REQUEST['userid']?>'/>
 <input id="url_jobseeker" type="hidden" value='<?php echo getLink();?>/portal/applicantHome.php?'/>
 <input id="reupload_resume" type="hidden" value='<?php echo getLink();?>/portal/jobseeker_register/finalize_step2.php'/>
 <input id="_id" type="hidden" value='<?php echo $_SESSION['_id']?>'/>
<? if($_SESSION['userid']) {?>

	<? if(getApplyType( ) == 0){ ?>
		
		<p ><h1 style="text-align: center;font-size: 30px;color:black;margin-left:70px;border-bottom: 0">Thank you for submitting your contact details and resume.</h1></p>
		<p style="font-size: 18px; margin-left: 229px;">Please click <button class="btn btn-info" id="auto_login">here</button> and update your details in your candidate profile.</p>
		<p style="font-size: 18px; margin-left: 229px;">If you are a good match one of our recruiters will get in contact very soon.</p>
		<p style="font-size: 18px; margin-left: 229px;">Have a great day!</p>
		<p style="font-size: 18px; margin-left: 229px;">RS Recruitment Team</p>
		
	<? } else { ?>
	
		<? if($_REQUEST['mon_cnt'] < 3) { ?>
		<p><h1 style="text-align: center;font-size: 30px;color:black;border-bottom: 0">Thank you for applying for the <? echo $_REQUEST['job_title']?> role</h1></p>
		<p style="font-size: 18px; margin-left: 229px;">Our records show that you are already registered with us.</p>
		<p style="font-size: 18px; margin-left: 229px;">Please click <button class="btn btn-info" id="auto_login">here</button> and update your details in your candidate profile.</p>
		<p style="font-size: 18px; margin-left: 229px;">If you are a good match one of our recruiters will get in contact very soon.</p>
		<p style="font-size: 18px; margin-left: 229px;">Have a great day!</p>
		<? } else { ?>
			
		<p><h1 style="text-align: center;font-size: 30px;color:black;border-bottom: 0">Thank you for applying for the <? echo $_REQUEST['job_title']?> role</h1></p>
		<p style="font-size: 18px; margin-left: 229px;">Our records show that you are already registered with us.</p>
		<p style="font-size: 18px; margin-left: 229px;">In order to continue with your application please <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">upload</button> your most recent C.V.</p>
		<p style="font-size: 18px; margin-left: 229px;">Please click <button class="btn btn-info" id="auto_login">here</button> and update your details in your candidate profile.</p>
		<p style="font-size: 18px; margin-left: 229px;">If you are a good match one of our recruiters will get in contact very soon.</p>
		<p style="font-size: 18px; margin-left: 229px;">Have a great day!</p>

		<? } ?>

	<?  } ?>
<?  } ?>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #337ab7;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style='text-align:left;color:white;'>Pleas upload your updated reume</h4>
        </div>
        <form name="upload_newCV" method="post" action='ThankYouPage.php?apply_type=<?php echo $_REQUEST['apply_type']?>&job_title=<?php echo $_REQUEST['job_title']?>' id="upload_newCV" role="form" enctype="multipart/form-data">
        <div class="modal-body">
          <div>
          	
				<input type="file" id="resume" name="resume" required="required">
				<input type="hidden" name="userid" value="<? echo $_SESSION['userid'];?>">
	
		  </div>
        </div>
        	<div class="modal-footer">
          	<button id="upload_cv" type="button" class="btn btn-default">Upload</button>
        	</div>
		</form>
      </div>
      
    </div>
  </div>

</div>
</div>

<!-- End of Content Box  -->
</div><!-- End of Container -->
<div id="footer" style="width: 100%; left: 0px; bottom: 0px; overflow: hidden;">
<div id="footerbox">
<div id="sublinks">

<dl style="width:30px;"><!-- SPACER -->&nbsp;</dl>

<dl>
	<dt>Login</dt>
		<dd><a href="http://remotestaff.com.au/portal/">Jobseeker login</a> </dd>  
		<dd><a href="http://remotestaff.com.au/portal/">Contractor login </a></dd>
		<dd><a href="http://remotestaff.com.au/portal/">Referral Partner login</a></dd>    

</dl>

<dl>
	<dt>Main Links</dt>
		<dd><a href="/index.php" >Home</a> </dd>  
		<dd><a href="/jobopenings.php">Job Openings</a></dd> 
		<dd><a href="/register/" >Register Now</a></dd>
		<dd><a href="/howwework.php">How We Work</a></dd>
		<dd><a href="/qanda-jobseeker.php" >Q & A</a></dd>
		<dd><a href="/aboutus.php" >About Us</a></dd>
		<dd><a href="/showcasing-staff.php" >Existing Staff</a></dd>
		<dd><a href="/testimonials.php" >Staff Testimonials</a></dd>
		<dd><a href="http://blog.remotestaff.com.ph" >Blogs</a></dd>

<!--<dd><a href="/seminar/seminar.php" >Seminar Booking</a></dd>-->
</dl>

<dl>
	<dt>Legal</dt>
		<dd><a href="/terms.php">Terms and Condition</a></dd>   
		<dd><a href="/privacy.php">Privacy Policy </a></dd>

</dl>

<dl>
	<dt>Marketing</dt>
		<dd><a href="/contactus.php">Contact us</a></dd>  
		<dd><a href="">Sitemap</a> </dd> 
		<dd><a href="/article1.php" id="mtopic4">Articles</a> </dd>  
		<dd><a href="">Adhocstaffing.com</a></dd>
		<dd><a href="/presentations.php">Presentations</a></dd>    
</dl>

<dl>
	<dt>Client Sites</dt>
		<dd><a href="http://remotestaff.com.au">remotestaff.com.au</a></dd>   

	<dt>Staff Sites</dt>
		<dd><a href="/index.php">remotestaff.com.ph</a> </dd> 
<!--
<dd><a href="/myke_demo/rs-ph/index.php">remotestaff.co.in</a></dd>   
<dd><a href="/myke_demo/rs-ph/index.php">remotestaff.cn</a></dd>
<dd><a href="/myke_demo/rs-ph/index.php">remotestaff.asia</a></dd>
-->
</dl>

<br clear="all" /><br clear="all" />

<p align="center">
<img src='/images/flags/Philippines.png'/> Trafalgar Plaza Bldg. Unit A&amp;B 27th Flr. 105 H.V. Dela Costa Street Salcedo Village, 1227 Makati City, Philippines<br />
Copyright 2014 Remote Staff Inc. All rights reserved.</p>
</div>
</div></div>
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

jQuery("#upload_newCV").submit(function(e){
    	
    
    	
    	e.preventDefault();
});

jQuery("#testLogin").submit(function(e){
    	
    
    	
    	e.preventDefault();
});



jQuery("#upload_cv").on("click",function(){
     
    if(jQuery("#resume").val()) 
    {
     prompt("Uploading file, please wait.");
     
	 var base_api_url = jQuery("#baseAPIurl").val();
	var contentType ="application/x-www-form-urlencoded; charset=utf-8";
	  var data = new FormData( jQuery("#upload_newCV")[0]);
	   data.append('userid',jQuery("#userid").val());
  	   data.append('on_ph','on_ph2');
  				
		jQuery.ajax({
          url: jQuery("#reupload_resume").val(),
          type: "POST",
          crossDomain: true,
    	  data: data,
	      processData: false,
	      contentType: false,
   		  success:function(){
			 jQuery("#skill_test").unbind('submit').submit();
		}
       });
    }
    else
    {
    	alert("Please upload your latest resume.");
    }

});

jQuery(document.body).on("click","#auto_login",function(){
	
  		 
  		 
  		 
  		 var url =jQuery("#url_jobseeker").val()+"k="+jQuery("#_id").val();

 		 window.location.href = url;
	
});

jQuery(document.body).on('click','.boxclose',function(){
   
    
  hideLoading();
    
    
});

function center()
{
  var top, left;
	var promptCont = jQuery("#prompt");	
	
    top = Math.max(jQuery(window).height() - promptCont.outerHeight(), 0) / 2;
    left = Math.max(jQuery(window).width() - promptCont.outerWidth(), 0) / 2;

    promptCont.css({
        top:top + jQuery(window).scrollTop(), 
        left:left + jQuery(window).scrollLeft()
    });  
}

function prompt(msg)
{
    
 var promptCont = jQuery("#prompt");
    
    var contetnt = "";
    
    contetnt+=msg;
    promptCont.html(contetnt);
    
    promptCont.css({
        width: msg.width || 'auto', 
        height: msg.height || 'auto'
    });
    
    center();
    promptCont.show();
    jQuery("div#blackOut").fadeTo(550, 0.8);

}

function showLoading() 
{
	var promptCont = jQuery("#prompt");
	var blackCont = jQuery("div#blackOut");
    blackCont.fadeTo(550, 0.8);
    blackCont.show();
    prompt("Processing your applicantion, kindly please wait..");
}

function hideLoading()
{
	var promptCont = jQuery("#prompt");
	var blackCont = jQuery("div#blackOut");
     blackCont.hide();
     promptCont.hide();
     jQuery("div#whiteBox").hide();
}
	

</script> 

<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6006919459206&amp;value=0" /></noscript> 

<div id="blackOut" style="display:none;">
</div>
<div id="whiteBox" style="display:none;">
</div>
<div id="prompt" style="display:none;"></div>   


</body>
</html>
