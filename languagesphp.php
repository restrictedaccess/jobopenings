<?
// from : languages.php
include 'conf.php';
$userid=$_SESSION['userid'];

//$userid=$_REQUEST['userid'];
$language=$_REQUEST['language'];
$spoken=$_REQUEST['spoken'];
$written=$_REQUEST['written'];

if(isset($_POST['Add']))
{	
	// language
	// id, userid, language, spoken, written
	$query="INSERT INTO language (userid, language, spoken, written) VALUES ($userid, '$language', $spoken, $written)";
	$result=mysql_query($query);
	if (!$result)
	{
		$mess="Error";
		//header("location:languages.php?mess=$mess");
		echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
	}
	else
	{
		header("location:languages.php");
	}
}

if(isset($_POST['Next']))
{
	if($language!=""){
	$query="INSERT INTO language (userid, language, spoken, written) VALUES ($userid, '$language', $spoken, $written)";
	$result=mysql_query($query);
	if (!$result)
	{
		$mess="Error";
		echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
	}
	else
	{
		header("location:thankyouapplying.php");
	}
	}
	else
	{
		header("location:thankyouapplying.php");
	}
}


// to : ---> uploadPhoto.php
?>
