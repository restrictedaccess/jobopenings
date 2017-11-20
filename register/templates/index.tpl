<!DOCTYPE html>
<html lang="en">
<head>
	<title>BPO Company Remote Staff Official Website | Hire Offshore Staff from Remote Staff | Outsource Staff, Inexpensive and Professional Online Staff, Virtual Assistant and IT Offshore Outsourcing BPO Services</title>
	{include file="include.tpl"}
	<script type="text/javascript" src="js/step1.js"></script>
	<script type="text/javascript" src="../../js/ga_tracking_code.js"></script>
</head>

<body>
	{include file="header.tpl"}
	<div id="container"><!-- Bootstrap container -->
		
	
		<!--  Start of Application Form Content -->
		<section id="application-form">
			<div class="col-md-1">&nbsp;</div>
			<div class="col-md-10">
				<p class="intro">
					You Can Earn Well, Excel and Achieve the Career Growth You Want -<br />
					<span>By following these easy steps</span>
				</p>
				<div class="row">
					<div class="col-md-1">&nbsp;</div>
					<div class="col-md-10">
						<!-- Step 1: Email Validation -->
						<section id="step1">
							<div class="steps"><a href="#" class="visited">Email Validation</a></div>
							<p id="email-sent" class="alert alert-info" style="display:none">
								Verification link has been sent to <span class="email_address_span"></span><br/>
								Please check your email and follow the verification link to continue the registration process.
							</p>
							<p id="email-existing" class="alert alert-danger" style="display:none">
								The email address you have entered is already registered with Remotestaff.<br/>
								Should you wish to log in to your account, please click <a href="http://remotestaff.com.ph/portal/">HERE</a></span>
							</p>
							
							<form class="form-horizontal" role="form" id="email-validate-form">
							  <div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Primary Email</label>
								<div class="col-sm-6">
								  <input type="email" name="email" class="form-control" id="email_address" value="{$registration_data.email}">
								  <p class="help-block">(e.g. remotestaff@gmail.com)</p>

								 <!-- <div align="center">
								  	<strong>OR</strong><br/><br/>
								  	 <a href="/fblogin.php"><img src="images/sign_in_via_fb.png"/></a>
								 </div> -->
								</div>
								<div class="col-sm-2">
								  <button type="submit" class="btn btn-info">Get Started</button>
								</div>
							  </div>
							</form>
						</section><!-- end of Step 1: Email Validation -->
						<section id="step2"><div class="steps"><a href="#">Personal Details</a></div></section>
						<section id="step3"><div class="steps"><a href="#">Schedule an Interview</a></div></section>
					</div>
					<div class="col-md-1">&nbsp;</div>
				</div>
			</div>
			<div class="col-md-1">&nbsp;</div>
			<div class="clear">&nbsp;</div>
		</section>
		<!--  End of Application Form Content -->
	</div><!--  End of Container -->
	
	{include file="footer.tpl"}
	{literal}
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50820035-1', 'auto');
    ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
	{/literal}	
		
	
</body>