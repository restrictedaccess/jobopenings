<?php 
include('conf/zend_smarty_conf.php');

$userid=$_SESSION['userid'];
//echo $userid;
$mess=$_REQUEST['mess'];
$job=$_REQUEST['job'];
$code=$_REQUEST['code'];
$code=$_REQUEST['code'];
if($code==1)
{
	$mess ="<img src='images/problem2.gif' alt='Error'><br>Applicant Does Not Exist !";
}

if($code==2)
{
	$mess= "<p><b>YOUVE ALREADY APPLIED FOR THIS JOB</b></p>";
}

if($code==3)
{
	$mess= "<p><b>THANK YOU FOR APPLYING PLEASE WAIT FOR FURTHER NOTICE FROM US !</b></p>";
}

if($job!="")
{
	$sqlAds=$db->select()
		->from('posting' , 'jobposition')
		->where('id = ?' ,$job);
	$job_adsname = $db->fetchOne($sqlAds);
	
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
  <?php include("inc/header.php"); ?>
  <!--  End of Header -->
<?php include("inc/nav.php"); ?><!-- End of Navigation -->

<div id="main-image" style="height:30px;"></div>
<!-- End of Main Image -->
<div id="contents">
<div id="fb-root"></div>

<?php 
if (TEST){
	?>
		<script type="text/javascript">
			var baseUrl = "http://test.remotestaff.com.au";
		</script>
	<?php	
}else{
?>
	<script type="text/javascript">
		var baseUrl = "http://remotestaff.com.au";
	</script>
<?php
}
?>
<script type="text/javascript">

	var clicked = false;

	(function() {
	var e = document.createElement('script'); e.async = true;
	e.src = document.location.protocol
	+ '//connect.facebook.net/en_US/all.js';
	document.getElementById('fb-root').appendChild(e);
	}());
	
	function updateButton(response){
		var button = document.getElementById('fb-auth');
		var userInfo = document.getElementById('user-info');
		if (response.authResponse){
			FB.api("/me", function(info){
				login(response, info);
			})
		}else{
			//user is not connected to your app or logged out
		}
	}
	
	window.fbAsyncInit = function(){
		FB.init({
			appId:'423675957728278',
			status:true,
			cookie:true,
			xfbml:true,
			oauth:true,
		})
		
		FB.getLoginStatus(updateButton);
		FB.Event.subscribe('auth.statusChange', updateButton);
	}
	
	function login(response, info){
	    if (response.authResponse) {
	        var accessToken = response.authResponse.accessToken;
	        var picture = "https://graph.facebook.com/"+info.id+"/picture?type=large";
	     
			FB.api("/me", function(info){
				info.picture = picture
				var query = FB.Data.query('select current_location, work, relationship_status,education from user where uid={0}', info.id);
	            query.wait(function(rows) {
	            	row = rows[0];
	            	info.current_location = row.current_location
	            	info.work = row.work
	            	info.relationship_status = row.relationship_status
	            	info.education = row.education
	            	info.from = "PH"
	            	info.job_id = jQuery("#job_id").val();
	            	jQuery.post("/portal/application/fb_grab_data.php", info, function(response){
	            		response = jQuery.parseJSON(response);
	            		if (response.success){
		            		postOnFeed();
		            		if (response.redirect!=null){
			            		window.location.href = response.redirect;			            			
		            		}else{
		            			if (clicked){
		            				window.location.reload();
		            			}
		            		}

	            		}					
					})
	            })
				
			})
	    }
	}
	function postOnFeed(){
		FB.api('/me/feed', 'post',
			{
			message     : "Registered as a Work From Home Professional with RemoteStaff.com.ph - Apply Now",
			link        : 'http://remotestaff.com.ph',
			picture     : baseUrl+'/portal/application_form/images/rs_logo.png',
			name        : 'Remote Staff',
			description : 'Work for foreign companies in a relaxed and more flexible workplace - your own home and get the salary you deserve'
			},
			function(response) {
				if (!response || response.error) {
				} else {
				}
			}
		);
		
	}
	
	
	
	jQuery(document).ready(function(){
		
		jQuery("#sign_in_via_fb").click(function(e){
			clicked = true;
			FB.login(function(response) {
				if (response.authResponse) {
					FB.api('/me', function(info) {
						login(response, info);
					});
				} else {
					//user cancelled login or did not grant authorization
						
				}
			}, {scope:'email,user_birthday,status_update,publish_stream,user_about_me'});
			e.preventDefault();
		})
	})


	
</script>
<form name='form' method='post' action='jobopeningsphp2.php'>

<input type='hidden' name='job' id="job_id" value=<?=$job;?> />

<input type='hidden' name='userid'  value=<?=$userid;?> />



<div id="control">						

<?php
// Check if the user is login!
if($userid=="")
{ // the current user is not login....

?>	



<table width='98%' align='center'>

<tr><td colspan="3"><b><P>Please Login Before you Apply...</P>

</td></tr>

<tr><td colspan=3 align=center>

<?php echo $mess;?>



</td></tr>

<tr><td width='45%' align='right'>Email</td><td width='2%'>:</td><td width='53%'><input type='text' name='email' id='email'></td></tr>

<tr><td align='right'>Password</td><td>:</td><td><input type='password' name='password' id='password'></td></tr>
<tr><td align='right' colspan='3' style="padding-right: 315px;"><input type='submit' name='login' id='login' value='Login'/></td></tr>
<tr><td align='left' colspan='3' height='30' style="padding-left:350px;"><small>Retrieve password, click <a href='#' class='link5' onClick="javascript:popup_win('http://remotestaff.com.au/portal/forgotpass.php?user=applicant',500,330);" style='color:#663300; text-decoration:none; font-weight:bold;'>HERE</a></small></td></tr>

<tr><td align='left' colspan='3' height='30' style="padding-left:350px;"><small>If you are yet to register as jobseeker, click <a href='https://remotestaff.com.ph/register/' style='color:#663300; text-decoration:none; font-weight:bold;'>HERE</a><br/>or <button class="sign_in_via_fb" id="sign_in_via_fb"></button></small></td></tr>


</table>
<?php } else { ?>
<div align="center"><?php echo $mess;?></div>
<h2>Apply Online</h2>
<h3>POSITION TITLE : <?php echo $job_adsname;?></h3>
<hr />
<div align="center"><input type='submit' name='apply' value='Apply Online'  /><br>
<a href='jobopenings.php'>Back</a></div>
<?php } ?>



</form>	

</div>
</div>
<!-- End of Content Box  -->
</div><!-- End of Container -->
<?php include('inc/footer.php'); ?>
</body>
</html>
