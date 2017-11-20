<?
include('class.php');
include 'time.php';
$AustodayDate = date ("jS \of F Y");

$passGen = new passGen(5);

$mess=$_REQUEST['mess'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];
$pass2 = $_REQUEST['pass2'];
$rv = $_POST['rv'];

if(isset($_POST['send']))
{
	if($passGen->verify($pass2, $rv))
	{
		//image validator is correct!
		$system_message="Note : This message came from the [Contact Us] form of the (http://www.remotestaff.com.ph/contact.php)";
		$message=str_replace("\n","<br>",$message);
		$to ="admin@remotestaff.com.au,ricag@remotestaff.com.au,normanm@remotestaff.com.au";
		$from_email=$email;
		$subject ="RemoteStaff.Com.Ph [Contact Us]";
		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header .= "From: ".$from_email." \r\n"."Reply-To: ".$from_email."\r\n";
		$body="<img src='http://www.philippinesatwork.com/dev/norman/Chris/images/banner/remoteStaff-small.jpg'>
			   <div style='font: 9pt Verdana' >
			   <p>$AustodayDate</p>
			   <p style='color:#CCCCCC'>$system_message</p>
			   <p>$message</p>
			   <p>From :<br />$from_email</p>
			   </div>";
		//echo $to."<br>".$body;
		mail($to, $subject, $body, $header);	
		header("location:contact.php?mess=1");
		
	}
	else
	{
		//echo " image validator is not correct!";
		header("location:contact.php?mess=2");			  
	}
	
}


?>
