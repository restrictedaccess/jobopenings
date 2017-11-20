<?
// from: education.php
include 'conf.php';
include 'function.php';

//$userid=$_REQUEST['userid'];
$userid=$_SESSION['userid'];

$educationallevel=$_REQUEST['educationallevel'];
$fieldstudy=$_REQUEST['fieldstudy'];
$major=$_REQUEST['major'];
$grade=$_REQUEST['grade'];
$gpascore=$_REQUEST['gpascore'];
$college_name=$_REQUEST['college_name'];
$college_country=$_REQUEST['college_country'];
$graduate_month=$_REQUEST['graduate_month'];
$graduate_year=$_REQUEST['graduate_year'];

$major=filterfield($major);
//$gpascore=filterfield($gpascore);
$college_name=filterfield($college_name);
if($gpascore=="")
{
	$gpascore=0;
}

/*
id, userid, educationallevel, fieldstudy, major, grade, gpascore, college_name, college_country, graduate_month, graduate_year
*/
$query="INSERT INTO education SET userid = $userid,
		educationallevel = '$educationallevel', 
		fieldstudy = '$fieldstudy', 
		major = '$major', 
		grade = '$grade', 
		gpascore = $gpascore, 
		college_name = '$college_name' , 
		college_country = '$college_country', 
		graduate_month = '$graduate_month', 
		graduate_year = '$graduate_year';";
	//echo $query;

$result=mysql_query($query);
if (!$result)
{
	$mess="Error";
	echo ("Query: $query\n<br />MySQL Error: " . mysql_error());
	//header("location:education.php?mess=$mess");
}
else
{
	//echo "Data Inserted";
	header("location:currentJob.php");
	//$mess="";
}

//to: -> currentJob.php
?>

