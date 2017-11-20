<?
// from : updateperosnal.php
include 'conf.php';
include 'function.php';
include 'class.php';
include 'time.php';


$AusTime = date("H:i:s"); 
$AusDate = date("Y")."-".date("m")."-".date("d");
$ATZ = $AusDate." ".$AusTime;




$userid="";
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];

$byear=$_REQUEST['byear'];
$bmonth=$_REQUEST['bmonth'];
$bday=$_REQUEST['bday'];

$auth_no_type_id=$_REQUEST['auth_no_type_id'];
$msia_new_ic_no=$_REQUEST['msia_new_ic_no'];

$gender=$_REQUEST['gender'];
$nationality=$_REQUEST['nationality'];
$permanent_residence=$_REQUEST['permanent_residence'];

$email=$_REQUEST['email'];
$password=$_REQUEST['pass'];
$pass=sha1($_REQUEST['pass']);
$alt_email=$_REQUEST['alt_email'];

$handphone_country_code=$_REQUEST['handphone_country_code'];
$handphone_no=$_REQUEST['handphone_no'];

$tel_area_code=$_REQUEST['tel_area_code'];
$tel_no=$_REQUEST['tel_no'];

$address1=$_REQUEST['address1'];
$address2=$_REQUEST['address2'];

$postcode=$_REQUEST['postcode'];

$country_id=$_REQUEST['country_id'];
$msia_state_id=$_REQUEST['msia_state_id'];


$city=$_REQUEST['city'];

$msn_id=$_REQUEST['msn_id'];
$yahoo_id=$_REQUEST['yahoo_id'];
$icq_id=$_REQUEST['icq_id'];
$skype_id=$_REQUEST['skype_id'];



///////// new fields ///// June 13 2008
$home_working_environment=$_REQUEST['home_working_environment'];
$internet_connection=$_REQUEST['internet_connection'];
$isp=$_REQUEST['isp'];
$computer_hardware=$_REQUEST['computer_hardware'];
$headset_quality=$_REQUEST['headset_quality'];
$computer_hardware=filterfield($computer_hardware);
//////////////////////////
//$msia_state_id=$_REQUEST['msia_state_id'];
if ($msia_state_id =="00")
{
	$state=$_REQUEST['state'];
}

if ($msia_state_id !="00")
{
	$state=$msia_state_id;
}

//$bday=$byear."-".$bmonth."-".$bday;

$fname=filterfield($fname);
$lname=filterfield($lname);
$auth_no_type_id=filterfield($auth_no_type_id);
$msia_new_ic_no=filterfield($msia_new_ic_no);

$email=filterfield($email);
$alt_email=filterfield($alt_email);

$handphone_no=filterfield($handphone_no);
$tel_area_code=filterfield($tel_area_code);
$tel_no=filterfield($tel_no);

$address1=filterfield($address1);
$address2=filterfield($address2);

$postcode=filterfield($postcode);
$city=filterfield($city);
$msn_id=filterfield($msn_id);
$yahoo_id=filterfield($yahoo_id);
$icq_id=filterfield($icq_id);
$skype_id=filterfield($skype_id);
$state=filterfield($state);
$fname=filterfield($fname);
$fname=filterfield($fname);
$fname=filterfield($fname);


$pass2 = $_REQUEST['pass2'];
$passGen = new passGen(5);
$rv = $_POST['rv'];

/*
userid, lname, fname, byear, bmonth, bday, auth_no_type_id, msia_new_ic_no, gender, nationality, permanent_residence, email, pass, alt_email, handphone_country_code, handphone_no, tel_area_code, tel_no, address1, address2, postcode, country_id, state, city, msn_id, yahoo_id, icq_id, skype_id, image, datecreated, dateupdated, status, home_working_environment, internet_connection, isp, computer_hardware, headset_quality
*/

if(isset($_POST['send']))
{

	if($passGen->verify($pass2, $rv)){
		//image validator is correct!
		$queryCheck="SELECT * FROM personal WHERE email = '$email';";
		$result=mysql_query($queryCheck);
		$ctr=@mysql_num_rows($result);
		if($ctr > 0)
		{
	    	// email exist
			header("location:apply.php?mess=4");
		}
		else
		{
			$status = 1;  
		}
		
	}
	else 
	{
		$status = 2;
		header("location:apply.php?mess=2"); // image validator is not correct!
	}

if($status == 1)
{


	$query="INSERT INTO personal (lname, fname, byear, bmonth, bday, auth_no_type_id, msia_new_ic_no, gender, nationality, permanent_residence, email,pass,
			alt_email,handphone_country_code, handphone_no, tel_area_code, tel_no, address1, address2, postcode, country_id, state, city, msn_id, yahoo_id,
		 icq_id, skype_id, datecreated, status, home_working_environment, internet_connection, isp, computer_hardware, headset_quality) 
		 VALUES
('$lname', '$fname','$byear','$bmonth', '$bday', '$auth_no_type_id', '$msia_new_ic_no', '$gender', '$nationality', '$permanent_residence', '$email','$pass', '$alt_email', '$handphone_country_code', '$handphone_no', '$tel_area_code', '$tel_no', '$address1', '$address2', '$postcode', '$country_id', '$state', '$city', '$msn_id', '$yahoo_id', '$icq_id', '$skype_id', '$ATZ', 'New', '$home_working_environment', '$internet_connection', '$isp', '$computer_hardware', '$headset_quality')";


$result=mysql_query($query);
if (!$result)
{
	$mess="Error";
	echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
	//header("location:personal.php?mess=3");
}
else
{
	//echo "Data Inserted";
	//header("location:education");
	/////
//
	$subject="WELCOME TO REMOTESTAFF";
	$admin_email ="admin@remotestaff.com.au";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: ".$admin_email." \r\n"."Reply-To: ".$admin_email."\r\n";	
	
	$body="<div align='center' style=' margin:10px; background-color: #FAFCEE; border: 1px solid #D8E899; text-align: left;  ; font: 12px tahoma; padding:20px;'>
<img src='http://www.philippinesatwork.com/dev/norman/Chris/images/banner/remoteStaff-small.jpg'>
<p>Hi $fname&nbsp;$lname,</p>
<p>Thank you for Applying !</p>
<p>Here is your account information in RemoteStaff :</p>
<li>Email : $email</li>
<li>Password : $password</li>
<p>If you want us to seriously consider you as a Remote Staff contractor, It is required that you must complete your profile and answer every question and add/upload your latest photo. </p>
<p>To Edit your Profile/Online Resume, Click <a href='http://www.philippinesatwork.com/dev/norman/Chris/' target='_blank'><b>HERE</b></a> Please login as a <b>&quot;Job Seeker&quot;</b></p>
<p>If you are applying for a call center position or telemarketers please do upload your sample voice record..</p>
<p></p>
<p>Cheers!<br><br>
<span style='color:#999999'>admin@remotestaff.com.au</span></p>
</div>
<div align='center' style='font:10px tahoma; margin-top:0px;'> 
         <p class='footer-verd'><a href='http://www.remotestaff.com.ph/index.php'>Home</a> | <a href='http://www.remotestaff.com.ph/prosandcons.php'>Pros &amp; Cons</a> | <a href='http://www.remotestaff.com.ph/qualities.php'>Qualities Needed from You</a> | <a href='http://www.remotestaff.com.ph/howwework.php'>How We Work</a> | <a href='http://www.remotestaff.com.ph/testimonials.php'>Testimonials</a> | 
          <a href='http://www.remotestaff.com.ph/apply.php'>Apply Now</a> | <a href='http://www.remotestaff.com.ph/jobopenings.php'>Job Openings</a></p>
		   <p class='footer-verd'>Copyright 2008 <a href='http://www.remotestaff.com.ph'>Remote Staff</a>, ACN 
          Number 094-364-511. All rights reserved. </p>
      </div>";

mail($email,$subject, $body, $headers);
	//
	/////
	$userid=mysql_insert_id(); 
	$_SESSION['userid']=$userid;
	$mess="";
	header("location:education.php");
}

}


}

?>

