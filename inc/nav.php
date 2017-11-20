<div id="nav">
<ul>
<!--<li class="spacer">&nbsp;</li>-->
<li class="spacer"></li>
<li><a href="index.php" id="homenav">Home</a></li>
<li><a href="jobopenings.php" id="jobopennav">Job Openings</a></li>
<?
if (TEST == False) {
    $domain = 'http://www.remotestaff.com.au';
}
else{
	 $domain = 'http://devs.remotestaff.com.au';
}
	
?>
<li><a href="/register/" >Register Now</a></li>
<li><a href="<?php echo $domain;?>/skills_test/" id="testnav" target="_blank">Skills Tests</a></li>
<li><a href="howwework.php" id="hownav">How We Work</a></li>
<li><a href="qanda-jobseeker.php" id="qnanav">Q &amp; A</a></li>
<li><a href="qualities.php" id="qualitiesnav">Qualities Needed From You</a></li>
<!--<li><a href="testimonials.php" id="testimonialnav">Testimonials</a></li> -->
<li><a href="showcasing-staff.php" id="showcasenav">Existing Staff</a></li>
<li><a href="aboutus.php" id="aboutnav">About Us</a></li>
<?php
	if (TEST){
		?>
		<li><a href="http://devs.remotestaff.com.au/portal/" id="loginnav">Login</a></li>
		<?php
	}else{
		?>
		<li><a href="http://www.remotestaff.com.au/portal/" id="loginnav">Login</a></li>
		<?php
	}
?>

</ul>
</div>