<?php
include('conf/zend_smarty_conf.php');
include 'time.php';

$AusTime = date("H:i:s"); 
$AusDate = date("Y")."-".date("m")."-".date("d");
$ATZ = $AusDate." ".$AusTime;

$date=date('l jS \of F Y h:i:s A');
$job=$_REQUEST['job'];

//login
if(isset($_POST['login']))
{
	$email = trim($_REQUEST['email']);
	$password=sha1($_REQUEST['password']);
	 $sql = $db->select()
			->from('personal', 'userid')
			->where('email = ?', $email)
			->where('pass = ?', $password);
	$userid = $db->fetchOne($sql);
	if ($userid) {
		$_SESSION['userid'] = $userid;
		header("location:jobopeningsphp.php?job=$job");
		exit;
	}
	else{
		header("location:jobopeningsphp.php?code=1&job=$job");
	}
	
}
//apply
if(isset($_POST['apply']))
{
	$userid=$_SESSION['userid'];
	// CHECK THE USER IF HE ALREADY APPLIED THE JOB POSTING
	$sql = $db->select()
		->from('applicants' , 'id')
		->where('posting_id = ?' ,$job)
		->where('userid =?' ,$userid);
	$id = $db->fetchOne($sql);	
	if ($id)
	{
		$mess= "YOUVE ALREADY APPLIED FOR THIS JOB";
		$mess=str_replace(" ","%20",$mess);
		header("location:jobopeningsphp.php?code=2&job=$job");
		exit;
	}
	else
	{
		$data = array(
				'posting_id' => $job, 
				'userid' => $userid, 
				'status' => 'Unprocessed', 
				'date_apply' => $ATZ 
		);
		$db->insert('applicants' , $data);
		$mess= "THANK YOU FOR APPLYING PLEASE WAIT FOR FURTHER NOTICE FROM US !";
		$mess=str_replace(" ","%20",$mess);
		header("location:jobopeningsphp.php?code=3&job=$job");
		exit;
	} 

}

/*
if(isset($_POST['signup']))
{
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$email = $_REQUEST['email'];
	$pass=$_REQUEST['password'];
	$password=sha1($_REQUEST['password']);
	//echo $fname."<br>";
	//echo $lname."<br>";
	//echo $email."<br>";
	//echo $password."<br>";
	//echo $ATZ."<br>";
	$queryCheck="SELECT * FROM personal WHERE email = '$email';";
	//echo $queryCheck;
	$result=mysql_query($queryCheck);
	$ctr=@mysql_num_rows($result);
	if($ctr > 0)
	{
		//echo "email exist";
		$mess="Email%20Exist%20!";
		header("location:jobopeningsphp.php?mess=$mess&job=$job");
	}
	else
	{
		//echo $status = 1;  
		$queryInsert="INSERT INTO personal SET fname = '$fname', lname = '$lname', email = '$email' , pass = '$password', datecreated = '$ATZ', status = 'New';";
		$result2=mysql_query($queryInsert);
		if (!$result2)
		{
			echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
			//header("location:personal.php?mess=3");
		}
		else
		{
			$userid=mysql_insert_id(); 
			$_SESSION['userid']=$userid;
			//////////
			
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
<li>PASSWORD :&nbsp;$pass</li>
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

if (@mail($email, $subject, $body, $header)) {
	
	header("location:jobopeningsphp.php?job=$job");
}
			//////////
			
		}

	}
}	

if(isset($_POST['cancel']))
{
	header("location:jobopeningsphp.php?job=$job");
}	
*/
?>
