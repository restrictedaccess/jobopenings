<!DOCTYPE html>
<html lang="en">
<head>
	<title>BPO Company Remote Staff Official Website | Hire Offshore Staff from Remote Staff | Outsource Staff, Inexpensive and Professional Online Staff, Virtual Assistant and IT Offshore Outsourcing BPO Services</title>
	{include file="include.tpl"}
	<link rel="stylesheet" href="css/step3.css"/>
	<script type="text/javascript" src="js/step3.js"></script>
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
						<section id="step1">
							<div class="steps"><a href="#" class="visited">Email Validation</a></div>
						</section>
						<section id="step2">
							<div class="steps"><a href="#" class="visited">Personal Details</a></div>
						</section>
						<!-- Step 3: Schedule an Interview -->
						<section id="step3">
							<div class="steps"><a href="#" class="visited">Schedule an Interview</a></div>
							<form class="form-horizontal" role="form" id="schedule-form">
								<input type="hidden" name="userid" value="{$userid}"/>
							  <div class="form-group">
								<div class="col-sm-3">
								  <select name="month" class="form-control">
									  {foreach from=$option_months item=month key=k}
									  	<option value="{$k}">{$month}</option>
									  {/foreach}
									</select>
								</div>
								<div class="col-sm-2">
								  <select name="day" class="form-control">
									   {foreach from=$option_days item=day key=k}
									  	<option value="{$k}">{$day}</option>
									  {/foreach}
									</select>
								</div>
								<div class="col-sm-3">
								  <select name="time" class="form-control">
								  	  <option value="">Time</option>
									  {foreach from=$option_time item=time key=k}
									  	<option value="{$time}">{$time}</option>
									  {/foreach}
									</select>
								</div>
							  </div>
								<!-- Checkbox design using CSS3-->
								<div class="form-group">
									<div class="checkbox col-sm-3">
										<input id="check1" type="checkbox" name="interview_type[]" value="phone">
										<label for="check1">Mobile</label>
									</div>
									<div class="checkbox col-sm-3">
										<input id="check2" type="checkbox" name="interview_type[]" value="skype">
										<label for="check2">Skype</label>
									</div>
								</div>
								<div class="form-group">
									<div class="checkbox col-sm-3 padt0">
										<input id="check3" type="checkbox" name="interview_type[]" value="landline">
										<label for="check3">Landline</label>
									</div>
									<div class="checkbox col-sm-3 padt0">
										<input id="check4" type="checkbox" name="interview_type[]" value="makati">
										<label for="check4">Makati Office</label>
									</div>
								</div>
								<!-- end of design here -->
								<div class="form-group">
									<div class="col-sm-10 mb70 mt20">
									  <button type="submit" class="btn btn-info">DONE</button>
									  <!--<span>* lorem Ipsum</span> -->
									</div>
								</div>
								<h4>Boost Your Profile</h4>
								<div class="form-group ml0">
									<p class="btn-fix">
									  <button type="button" class="btn btn-info btn-lg btn-fix" id="take_exam">Take Industry Proven Skill's Test </button>
									</p>
								</div>
								<div class="form-group ml0">
									<p class="btn-fix">
									  <button type="button" class="btn btn-info btn-lg btn-fix" id="jobseeker_login">Complete your online resume</button>
									</p>
								</div>
							</form>
						</section><!-- end of Step 3: Schedule an Interview -->
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</section><!--  end of Application Form Content -->
	</div><!--  End of Container -->
	
	{include file='footer.tpl'}
	{literal}
	<!-- Google Code for Remotestaff PH - Sign Up Conversion Tracking Code Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 975578263;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "djp3CNGH7wgQl8mY0QM";
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/975578263/?label=djp3CNGH7wgQl8mY0QM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	{/literal}
</body>