<?
include 'conf.php';
$id=$_REQUEST['id'];
$userid=$_REQUEST['userid'];
$query="DELETE FROM skills WHERE id = $id AND userid = $userid;";
$result=mysql_query($query);
	if (!$result)
	{
		$mess="Error";
		//header("location:skillsStrengths.php?mess=$mess&userid=$userid");
		echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
	}
	else
	{
		header("location:skillsStrengths.php");
	}


?>