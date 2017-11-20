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
$pass3=$_REQUEST['pass'];
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
$fullname =$fname." ".$lname;
$from_email="normanm@remotestaff.com.au";
$subject ="Welcome to RemoteStaff";
$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= "From: ".$from_email." \r\n"."Reply-To: ".$from_email."\r\n";	
$body="<html>
<head>
<title>RemoteStaff.Com.Au</title>
<style>
body{font-family:Tahoma; font-size:14px;}
#paragraph {margin-left:10px; margin-top:5px;}
#paragraph p{margin-left:10px; margin-right:5px; margin-top:10px;padding:5px 0 5px 10px;font-family:Tahoma; font-size:13px;}
#paragraph h5 {margin-left:10px; margin-right:5px; margin-top:10px;padding:5px 0 5px 10px;font-family:Tahoma; }
#paragraph h3 { color:#660000;margin-left:10px; margin-right:5px; margin-top:10px;padding:5px 0 5px 10px;font-family:Tahoma; }
#paragraph ul{font-family:Tahoma; font-size:13px;}
#paragraph li { margin-bottom:10px; margin-top:10px;}
#paragraph span { margin-top:20px; color:#003399; text-align:justify;font-family:Tahoma; font-size:13px; }
</style>
</head>
<body>
<table style=' border:#FFFFFF solid 1px;' width='100%'>
<tr><td><img src='http://www.philippinesatwork.com/dev/norman/Chris/images/banner/remoteStaff-small.jpg'></td></tr>

<tr><td height='105' width='100%%' valign='top'>
<div id='paragraph' style=''>
<p>$date<p>
<h5>Hi&nbsp; $fullname</h5>
<h3>Welcome to RemoteStaff!!! </h3>
<p><b>Your LOGIN DETAILS: </b></p>
<ul>
<li>EMAIL :&nbsp;$email</li>
<li>PASSWORD :&nbsp;$pass3</li>
</ul>
<p><b>Please always Update your Profile . </b></p>
<ul>
<li><a href='http://www.philippinesatwork.com/dev/norman/Chris/'>LOGIN</a> as <B>JOB SEEKER</B></li>
</ul>
<p style='color:#666666'>Normaneil Macutay<br>
<a href='http://www.remotestaff.com.au/' target='_blank'>RemoteStaff</a> </p>
</div>
</td></tr>
<tr><td height='28' background='http://www.philippinesatwork.com/dev/norman/Chris/images/banner/remote.jpg'>&nbsp;</td>
</tr>
</table>
</body>
</html>
";
mail($email, $subject, $body, $header);
	/////
	$userid=mysql_insert_id(); 
	$_SESSION['userid']=$userid;
	$mess="";
	header("location:education.php");
}

}


}

?>

