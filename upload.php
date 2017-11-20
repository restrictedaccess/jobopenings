<?php
include 'conf.php';
include 'time.php';
$userid = $_SESSION['userid'];

$AusTime = date("H:i:s"); 
$AusDate = date("Y")."-".date("m")."-".date("d");
$AustodayDate = date ("jS \of F Y");
$ATZ = $AusDate." ".$AusTime;


//temporary name of image
$tmpName = $_FILES['myfile']['tmp_name']; 
$img = $_FILES['myfile']['name']; 
$imgsize= $_FILES['myfile']['size']; 
$imgtype = $_FILES['myfile']['type'];

if($img != ''){
	if($imgtype=="image/pjpeg") 
	{ 
		$imgtype=".jpg"; 
	} 
	elseif($imgtype=="image/jpeg") 
	{ 
		$imgtype=".jpg"; 
	} 
	elseif($imgtype=="image/gif") 
	{ 
		$imgtype=".gif"; 
	} 
	elseif($imgtype=="image/png") 
	{ 
		$imgtype=".png"; 
	}
	elseif($imgtype=="image/x-png") 
	{ 
		$imgtype=".png"; 
	}  
	else 
	{ 
		//echo "Error uploading file, file type is not allowed"; 
		$flag = 2;
		//exit; 
	} 
}






// Edit upload location here
$destination_path = "uploads/pics/";
$result = 0;

$target_path = $destination_path .$userid.$imgtype;
if(@move_uploaded_file($tmpName, $target_path))
{
   $sql2="UPDATE personal SET image='$destination_path$userid$imgtype' WHERE userid=$userid";
   mysql_query($sql2);
   $result = 1;
}

sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>,'<?=$destination_path.$userid.$imgtype;?>');</script>   
