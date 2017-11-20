<?
// from : skillStrengths.php
include 'function.php';
include 'conf.php';
include 'time.php';

$AusTime = date("H:i:s"); 
$AusDate = date("Y")."-".date("m")."-".date("d");
$ATZ = $AusDate." ".$AusTime;

$userid=$_SESSION['userid'];

//$userid=$_REQUEST['userid'];
$skill=$_REQUEST['skill'];
$experience=$_REQUEST['experience'];
$proficiency=$_REQUEST['proficiency'];

if(isset($_POST['Add']))
{
	//echo "Add";
	/* skills
	id, userid, skill, experience, proficiency
	*/
	$query="INSERT INTO skills (userid, skill, experience, proficiency) VALUE ($userid, '$skill', $experience, $proficiency);";
	//echo $query;
	$result=mysql_query($query);
	if (!$result)
	{
		$mess="Error";
		//header("location:subcon_updateskillsStrengths.php?mess=$mess");
		echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
	}
	else
	{
		header("location:skillsStrengths.php");
	}

}

if(isset($_POST['Next']))
{
	//echo "Next";
	if($skill!="")
	{
		$query="INSERT INTO skills (userid, skill, experience, proficiency) VALUE ($userid, '$skill', $experience, $proficiency);";
		$result=mysql_query($query);
		if (!$result)
		{
			$mess="Error";
			//header("location:skillsStrengths.php?mess=$mess");
			echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
		}
		else
		{
			//languages.php
			header("location:languages.php");
		}
	}
	else
	{
		header("location:languages.php");
	}
}

?>