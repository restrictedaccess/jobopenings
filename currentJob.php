<?
include 'conf.php';
$userid=$_SESSION['userid'];
$mess="";
$mess=$_REQUEST['mess'];

$query="SELECT * FROM currentjob WHERE userid=$userid";
$result=mysql_query($query);
$ctr=@mysql_num_rows($result);
if ($ctr >0 )
{
	$row3 = mysql_fetch_array ($result); 
	// 1
	$company = $row3['companyname'];
	$position= $row3['position'];
	$monthfrom = $row3['monthfrom'];
	$yearfrom = $row3['yearfrom'];
	$monthto = $row3['monthto'];
	$yearto = $row3['yearto'];
	$duties =$row3['duties'];
	// 2
	$company2 = $row3['companyname2'];
	$position2= $row3['position2'];
	$monthfrom2 = $row3['monthfrom2'];
	$yearfrom2 = $row3['yearfrom2'];
	$monthto2 = $row3['monthto2'];
	$yearto2 = $row3['yearto2'];
	$duties2 =$row3['duties2'];
	// 3
	$company3 = $row3['companyname3'];
	$position3= $row3['position3'];
	$monthfrom3 = $row3['monthfrom3'];
	$yearfrom3 = $row3['yearfrom3'];
	$monthto3 = $row3['monthto3'];
	$yearto3 = $row3['yearto3'];
	$duties3 =$row3['duties3'];
	// 4
	$company4 = $row3['companyname4'];
	$position4= $row3['position4'];
	$monthfrom4 = $row3['monthfrom4'];
	$yearfrom4 = $row3['yearfrom4'];
	$monthto4 = $row3['monthto4'];
	$yearto4 = $row3['yearto4'];
	$duties4 =$row3['duties4'];
	//5
	$company5 = $row3['companyname5'];
	$position5= $row3['position5'];
	$monthfrom5 = $row3['monthfrom5'];
	$yearfrom5 = $row3['yearfrom5'];
	$monthto5 = $row3['monthto5'];
	$yearto5 = $row3['yearto5'];
	$duties5 =$row3['duties5'];
	
	///////////////////////////
	$currency =$row3['salary_currency'];
	$salary =$row3['expected_salary'];
	$neg = $row3['expected_salary_neg'];
	
	$freshgrad = $row3['freshgrad'];
	$available_status = $row3['available_status'];
	$latest_job_title = $row3['latest_job_title'];
	$years_worked = $row3['years_worked'];
	$months_worked = $row3['months_worked'];
	$available_notice =$row3['available_notice'];
	$aday =$row3['aday'];
	$amonth = $row3['amonth'];
	//echo $latest_job_title;
}

  
$currencyArray=array("Australian Dollar","Bangladeshi Taka","British Pound","Chinese RenMinBi","Euro","HongKong Dollar","Indian Rupees","Indonesian Rupiah","Japanese Yen","Malaysian Ringgit","New Zealand Dollar","Philippine Peso","Singapore Dollar","Thai Baht","US Dollars","Vietnam Dong");   
for ($i = 0; $i < count($currencyArray); $i++)
{
  if($currency == $currencyArray[$i])
  {
 $currencyoptions .= "<option selected value=\"$currencyArray[$i]\">$currencyArray[$i]</option>\n";
  }
  else
  {
 $currencyoptions .= "<option value=\"$currencyArray[$i]\">$currencyArray[$i]</option>\n";
  }
}

$numArray=array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16");
for ($i = 0; $i < count($numArray); $i++)
{
  if($years_worked == $numArray[$i])
  {
 $yearsoptions .= "<option selected value=\"$numArray[$i]\">$numArray[$i]</option>\n";
  }
  else
  {
 $yearsoptions .= "<option value=\"$numArray[$i]\">$numArray[$i]</option>\n";
  }
}

//
$numArray2=array("0","1","2","3","4","5","6","7","8","9","10","11");
for ($i = 0; $i < count($numArray2); $i++)
{
  if($months_worked == $numArray2[$i])
  {
 $monthoptions .= "<option selected value=\"$numArray2[$i]\">$numArray2[$i]</option>\n";
  }
  else
  {
 $monthoptions .= "<option value=\"$numArray2[$i]\">$numArray2[$i]</option>\n";
  }
  
  if($available_notice == $numArray2[$i])
  {
 $monthoptions2 .= "<option selected value=\"$numArray2[$i]\">$numArray2[$i]</option>\n";
  }
  else
  {
 $monthoptions2 .= "<option value=\"$numArray2[$i]\">$numArray2[$i]</option>\n";
  }
  
}
$numArray3=array("1","2","3","4","5","6","7","8","9","10","11","12");
//$intern_notice
for ($i = 0; $i < count($numArray3); $i++)
{
  if($intern_notice == $numArray3[$i])
  {
 	$monthnums .= "<option selected value=\"$numArray3[$i]\">$numArray3[$i]</option>\n";
  }
  else
  {
 	$monthnums .= "<option value=\"$numArray3[$i]\">$numArray3[$i]</option>\n";
  }
}
$monthnamesArray=array("January","February","March","April","May","June","July","August","September","October","November","December");
for ($i = 0; $i < count($monthnamesArray); $i++)
{
  if($monthjoined == $monthnamesArray[$i])
  {
 $monthnameoptions .= "<option selected value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }
  else
  {
 $monthnameoptions .= "<option value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }
  
  /////
  
  if($monthleft == $monthnamesArray[$i])
  {
 	$monthnameoptions2 .= "<option selected value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }
  else
  {
 	$monthnameoptions2 .= "<option value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }//
  
  if($amonth == $monthnamesArray[$i])
  {
 	$monthnameoptions3 .= "<option selected value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }
  else
  {
 	$monthnameoptions3 .= "<option value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }
  
  //$imonth
  if($imonth == $monthnamesArray[$i])
  {
 	$monthnameoptions4 .= "<option selected value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }
  else
  {
 	$monthnameoptions4 .= "<option value=\"$monthnamesArray[$i]\">$monthnamesArray[$i]</option>\n";
  }
  
}

$numArrays=array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
for ($i = 0; $i < count($numArrays); $i++)
{
  if($aday == $numArrays[$i])
  {
 	$nums .= "<option selected value=\"$numArrays[$i]\">$numArrays[$i]</option>\n";
  }
  else
  {
 	$nums .= "<option value=\"$numArrays[$i]\">$numArrays[$i]</option>\n";
  }
  //$iday
  if($iday == $numArrays[$i])
  {
 	$nums2 .= "<option selected value=\"$numArrays[$i]\">$numArrays[$i]</option>\n";
  }
  else
  {
 	$nums2 .= "<option value=\"$numArrays[$i]\">$numArrays[$i]</option>\n";
  }
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
<title>Hire Remote Staff, Cost Effective Dedicated Staff, Take Advantage of Global Trends Now</title>
<meta name="description" content="Hire an inexpensive online staff. Remote Staff will help you outsource your Online Staffing needs">
<meta name="robots" content="NOYDIR">
<meta name="slurp" content="NOYDIR">
<meta name="keywords" content="remote staff, Online Staff, outsource staff">
<meta name="robots" content="index all,follow all">
<meta name="revisit-after" content="7 days">
<meta name="author" content="rai samson">
<meta name="copyright" content="Copyright © 2007 Carousel Productions Inc. All rights reserved.">
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="main.css" rel="stylesheet" type="text/css">
<link href="css/font.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script language=javascript src="js/util.js"></script>
<script type="text/javascript">
<!--
function checkFields()
{
	if (document.frmWorkExp.freshgrad[0].checked ==false && document.frmWorkExp.freshgrad[1].checked ==false && document.frmWorkExp.freshgrad[2].checked ==false )
	{
		 alert("Please choose your current Status");
		 return false;
	}
	if (document.frmWorkExp.available_status[0].checked==false && document.frmWorkExp.available_status[1].checked==false && document.frmWorkExp.available_status[2].checked==false && document.frmWorkExp.available_status[3].checked==false && document.frmWorkExp.freshgrad[0].checked==false)
	{
		alert("Please choose your Availability Status");
		return false;
	}
	if (document.frmWorkExp.salary_currency.selectedIndex=="0")
	{
		alert("Please choose a Currency");
		return false;
	}
	if (document.frmWorkExp.expected_salary.value=="")
	{
		alert("Please enter your expected salary");
		return false;
	}
	if (document.frmWorkExp.expected_salary.value!=""){
		if (IsNumeric(document.frmWorkExp.expected_salary.value)==false)
		{
			alert("Please enter a valid Salary . Must be a number");
			document.frmWorkExp.expected_salary.value="";
			return false;
		}
	}	
	return true;
}	
-->
</script>
<script language="JavaScript">
<!-- Start of Rollover Script -->
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v3.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
<!-- End of Rollover Script -->
</script>
</head>
<body class="bg3" onLoad="MM_preloadImages('images/tablk_home.jpg','images/tablk_about.jpg','images/tablk_apply.jpg','images/tablk_contact.jpg','images/tablk_howork.jpg','images/tablk_jobopen.jpg','images/tablk_pros.jpg','images/tablk_quality.jpg','images/tablk_testi.jpg')">
<div align="center">
  <table width="784" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td height="94" valign="bottom" background="images/header03.gif"><div align="right"> 
        <table border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><a href="index.php"></a></td>
           <!--  <td><a href="index.php"><img src="images/nav01c.gif" width="165" height="42" border="0"></a></td> -->
            <td><img src="images/nav03c.gif" width="176" height="42"></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
  <table width="784" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center"><img src="images/header_apply.gif" width="784" height="155"></div></td>
    </tr>
  </table>
  <table width="784" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td>
	 <div align="left">
	  <table border="0" cellspacing="0" cellpadding="0">
	   <tr class="nav">
	    <td width="51">
		 <div align="center">
		  <p class="nav"><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/tabgrn_home.jpg',1)"><img src="images/tablk_home.jpg" alt="" name="Image1" id="Image1" width="51" height="30" border="0"></a></p>
         </div>
		</td>
		<td width="86"><div align="center"><a href="prosandcons.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/tabgrn_pros.jpg',1)"><img src="images/tablk_pros.jpg" alt="" name="Image2" id="Image2" width="86" height="30" border="0"></a></div></td>
		<td width="161"><div align="center"><a href="qualities.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/tabgrn_quality.jpg',1)"><img src="images/tablk_quality.jpg" alt="" name="Image3" id="Image3" width="161" height="30" border="0"></a></div></td>
		<td width="94"><div align="center"><a href="howwework.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/tabgrn_howork.jpg',1)"><img src="images/tablk_howork.jpg" alt="" name="Image4" id="Image4" width="94" height="30" border="0"></a></div></td>
		<td width="83"><div align="center"><a href="testimonials.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/tabgrn_testi.jpg',1)"><img src="images/tablk_testi.jpg" alt="" name="Image5" id="Image5" width="83" height="30" border="0"></a></div></td>
	    <td width="74"><div align="center"><a href="apply.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/tabgrn_apply.jpg',1)"><img src="images/tabgrn_apply.jpg" alt="" name="Image6" id="Image6" width="74" height="30" border="0"></a></div></td>
		<td width="91"><div align="center"><a href="jobopenings.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','images/tabgrn_jobopen.jpg',1)"><img src="images/tablk_jobopen.jpg" alt="" name="Image7" id="Image7" width="91" height="30" border="0"></a></div></td>
		<td width="66"><div align="center"><a href="aboutus.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','images/tabgrn_about.jpg',1)"><img src="images/tablk_about.jpg" alt="" name="Image8" id="Image8" width="66" height="30" border="0"></a></div></td>
		<td width="78"><div align="center"><a href="contact.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image9','','images/tabgrn_contact.jpg',1)"><img src="images/tablk_contact.jpg" alt="" name="Image9" id="Image9" width="78" height="30" border="0"></a></div></td>
       </tr>
	  </table>
	 </div>
	</td>
   </tr>
  </table>
  <table width="784" border="0" cellpadding="0" cellspacing="0" background="images/bgbody.gif">
    <tr> 
      <td class="bodytop"><table width="740" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr> 
            <td width="230">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td valign="top" bgcolor="c6f1fa"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td background="images/line_top.gif" bgcolor="#FFFFFF"><div align="right"><img src="images/line_dsyn.gif" width="61" height="10"></div></td>
                      </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td valign="top" class="tabdsyn"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td bgcolor="#FFFFFF" class="">
						<table width=566 cellpadding=10 cellspacing=0 border=0 align="center">
<tr><td><table width=98% cellspacing=0 cellpadding=0 align=center><tr><td class=msg><b>Fill in this section to give employers a snapshot of your profile.</b> <br></td>
</tr></table>
<br>
<form name="frmWorkExp" method="POST" action="currentJobphp.php" onSubmit="return checkFields();">
<input type="hidden" name="userid" value="<? echo $userid?>">
<b>Current Status:</b>
<table width=100% cellspacing=8 cellpadding=2 border=0>
<tr><td width=5% ><input name="freshgrad" type="radio"  onClick="" value="I am still pursuing my studies and seeking internship or part-time jobs"></td>
<td>I am still pursuing my studies and seeking internship or part-time jobs</td></tr>
<tr><td width=5% ><input type="radio" name="freshgrad" value="I am a fresh graduate seeking my first job"  onClick=""></td>
<td>I am a fresh graduate seeking my first job</td></tr>
<tr><td width=5% ><input type="radio" name="freshgrad" value="I have been working for" ></td>
<td >I have been working for
 <select name="years_worked" style="width:40px;" class="text">
<option value='0'>0</option>
<? echo $yearsoptions;?>
</select>
&nbsp;year(s)
 <select name="months_worked" style="width:40px;" class="text">
 <? echo $monthoptions;?>
 </select>
 &nbsp;month(s)</td></tr></table>
 <br clear=all>
<table width=100% cellspacing=8 cellpadding=2 border=0 align=left >
<tr><td width=100% bgcolor=#DEE5EB colspan=3><b> Current / Latest Job Title</b></td></tr>
<tr valign=top><td align=right width=30% >Title :</td>
<td><INPUT maxLength=100 size=30 style='width:270px' class="text" name="latest_job_title" value="<?=$latest_job_title?>"></td></tr>

<tr><td width=100% bgcolor=#DEE5EB colspan=2><b>Current Job (SKIP if you have no working experience)</b></td></tr>
<tr><td colspan=2 >
<input type="hidden" name="counter" id="counter" value="" />
<div id="work">
<div id="workhistory">
<label>Company Name 1:</label>
<input name="companyname" type="text" id="companyname" size="45" value="<?=$company;?>"  />						
<br />
<label>Position/Title:</label>
<input name="position" type="text" id="position"  size="45"  value="<?=$position;?>" />
<br />
<label>Employment Period:</label>
<select name="monthfrom">
                <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option selected="selected" value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
              </select>
			  <select name="yearfrom" >
                  <option selected="selected" value="2008">2008 </option>
                  <option value="2007">2007 </option>
                  <option value="2006">2006 </option>
                  <option value="2005">2005 </option>
                  <option value="2004">2004 </option>
                  <option value="2003">2003 </option>
                  <option value="2002">2002 </option>
                  <option value="2001">2001 </option>
                  <option value="2000">2000 </option>
                  <option value="1999">1999 </option>
                  <option value="1998">1998 </option>
                  <option value="1997">1997 </option>
                  <option value="1996">1996 </option>
                  <option value="1995">1995 </option>
                  <option value="1994">1994 </option>
                  <option value="1993">1993 </option>
                  <option value="1992">1992 </option>
                  <option value="1991">1991 </option>
                  <option value="1990">1990 </option>
                  <option value="1989">1989 </option>
                  <option value="1988">1988 </option>
                  <option value="1987">1987 </option>
                  <option value="1986">1986 </option>
                  <option value="1985">1985 </option>
                  <option value="1984">1984 </option>
                  <option value="1983">1983 </option>
                  <option value="1982">1982 </option>
                  <option value="1981">1981 </option>
                  <option value="1980">1980 </option>
                  <option value="1979">1979 </option>
                  <option value="1978">1978 </option>
                  <option value="1977">1977 </option>
                  <option value="1976">1976 </option>
                  <option value="1975">1975 </option>
                  <option value="1974">1974 </option>
                  <option value="1973">1973 </option>
                  <option value="1972">1972 </option>
                  <option value="1971">1971 </option>
                  <option value="1970">1970 </option>
                  <option value="1969">1969 </option>
                  <option value="1968">1968 </option>
                  <option value="1967">1967 </option>
                  <option value="1966">1966 </option>
                  <option value="1965">1965 </option>
                  <option value="1964">1964 </option>
                  <option value="1963">1963 </option>
                  <option value="1962">1962 </option>
                  <option value="1961">1961 </option>
                  <option value="1960">1960 </option>
                  <option value="1959">1959 </option>
                  <option value="1958">1958 </option>
                  <option value="1957">1957 </option>
                  <option value="1956">1956 </option>
                  <option value="1955">1955 </option>
                  <option value="1954">1954 </option>
                  <option value="1953">1953 </option>
                  <option value="1952">1952 </option>
                  <option value="1951">1951 </option>
                  <option value="1950">1950 </option>
                </select>
			  <select name="monthto" >
                  <option selected="selected" value="Current Month">Current </option>
                 <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option  value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
                </select>
			  <select name="yearto" >
                <option selected="selected" value="Current Year">Current </option>
                <option value="2008">2008 </option>
                <option value="2007">2007 </option>
                <option value="2006">2006 </option>
                <option value="2005">2005 </option>
                <option value="2004">2004 </option>
                <option value="2003">2003 </option>
                <option value="2002">2002 </option>
                <option value="2001">2001 </option>
                <option value="2000">2000 </option>
                <option value="1999">1999 </option>
                <option value="1998">1998 </option>
                <option value="1997">1997 </option>
                <option value="1996">1996 </option>
                <option value="1995">1995 </option>
                <option value="1994">1994 </option>
                <option value="1993">1993 </option>
                <option value="1992">1992 </option>
                <option value="1991">1991 </option>
                <option value="1990">1990 </option>
                <option value="1989">1989 </option>
                <option value="1988">1988 </option>
                <option value="1987">1987 </option>
                <option value="1986">1986 </option>
                <option value="1985">1985 </option>
                <option value="1984">1984 </option>
                <option value="1983">1983 </option>
                <option value="1982">1982 </option>
                <option value="1981">1981 </option>
                <option value="1980">1980 </option>
                <option value="1979">1979 </option>
                <option value="1978">1978 </option>
                <option value="1977">1977 </option>
                <option value="1976">1976 </option>
                <option value="1975">1975 </option>
                <option value="1974">1974 </option>
                <option value="1973">1973 </option>
                <option value="1972">1972 </option>
                <option value="1971">1971 </option>
                <option value="1970">1970 </option>
                <option value="1969">1969 </option>
                <option value="1968">1968 </option>
                <option value="1967">1967 </option>
                <option value="1966">1966 </option>
                <option value="1965">1965 </option>
                <option value="1964">1964 </option>
                <option value="1963">1963 </option>
                <option value="1962">1962 </option>
                <option value="1961">1961 </option>
                <option value="1960">1960 </option>
                <option value="1959">1959 </option>
                <option value="1958">1958 </option>
                <option value="1957">1957 </option>
                <option value="1956">1956 </option>
                <option value="1955">1955 </option>
                <option value="1954">1954 </option>
                <option value="1953">1953 </option>
                <option value="1952">1952 </option>
                <option value="1951">1951 </option>
                <option value="1950">1950 </option>
              </select>
			  <br />			 
<label>Responsibilities / Achievments:</label>
<textarea rows="7" cols="30" name="duties" ><?=$duties;?></textarea>
<br />
<br>
<label>Company Name 2:</label>
<input name="companyname2" type="text" id="companyname2" size="45" value="<?=$company2;?>"  />						
<br />
<label>Position/Title:</label>
<input name="position2" type="text" id="position2"  size="45" value="<?=$position2;?>"  />
<br />
<label>Employment Period:</label>
<select name="monthfrom2">
                <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option selected="selected" value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
              </select>
			  <select name="yearfrom2" >
                  <option selected="selected" value="2008">2008 </option>
                  <option value="2007">2007 </option>
                  <option value="2006">2006 </option>
                  <option value="2005">2005 </option>
                  <option value="2004">2004 </option>
                  <option value="2003">2003 </option>
                  <option value="2002">2002 </option>
                  <option value="2001">2001 </option>
                  <option value="2000">2000 </option>
                  <option value="1999">1999 </option>
                  <option value="1998">1998 </option>
                  <option value="1997">1997 </option>
                  <option value="1996">1996 </option>
                  <option value="1995">1995 </option>
                  <option value="1994">1994 </option>
                  <option value="1993">1993 </option>
                  <option value="1992">1992 </option>
                  <option value="1991">1991 </option>
                  <option value="1990">1990 </option>
                  <option value="1989">1989 </option>
                  <option value="1988">1988 </option>
                  <option value="1987">1987 </option>
                  <option value="1986">1986 </option>
                  <option value="1985">1985 </option>
                  <option value="1984">1984 </option>
                  <option value="1983">1983 </option>
                  <option value="1982">1982 </option>
                  <option value="1981">1981 </option>
                  <option value="1980">1980 </option>
                  <option value="1979">1979 </option>
                  <option value="1978">1978 </option>
                  <option value="1977">1977 </option>
                  <option value="1976">1976 </option>
                  <option value="1975">1975 </option>
                  <option value="1974">1974 </option>
                  <option value="1973">1973 </option>
                  <option value="1972">1972 </option>
                  <option value="1971">1971 </option>
                  <option value="1970">1970 </option>
                  <option value="1969">1969 </option>
                  <option value="1968">1968 </option>
                  <option value="1967">1967 </option>
                  <option value="1966">1966 </option>
                  <option value="1965">1965 </option>
                  <option value="1964">1964 </option>
                  <option value="1963">1963 </option>
                  <option value="1962">1962 </option>
                  <option value="1961">1961 </option>
                  <option value="1960">1960 </option>
                  <option value="1959">1959 </option>
                  <option value="1958">1958 </option>
                  <option value="1957">1957 </option>
                  <option value="1956">1956 </option>
                  <option value="1955">1955 </option>
                  <option value="1954">1954 </option>
                  <option value="1953">1953 </option>
                  <option value="1952">1952 </option>
                  <option value="1951">1951 </option>
                  <option value="1950">1950 </option>
                </select>
			  <select name="monthto2" >
                  <option selected="selected" value="Current Month">Current </option>
                 <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option  value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
                </select>
			  <select name="yearto2" >
                <option selected="selected" value="Current Year">Current </option>
                <option value="2008">2008 </option>
                <option value="2007">2007 </option>
                <option value="2006">2006 </option>
                <option value="2005">2005 </option>
                <option value="2004">2004 </option>
                <option value="2003">2003 </option>
                <option value="2002">2002 </option>
                <option value="2001">2001 </option>
                <option value="2000">2000 </option>
                <option value="1999">1999 </option>
                <option value="1998">1998 </option>
                <option value="1997">1997 </option>
                <option value="1996">1996 </option>
                <option value="1995">1995 </option>
                <option value="1994">1994 </option>
                <option value="1993">1993 </option>
                <option value="1992">1992 </option>
                <option value="1991">1991 </option>
                <option value="1990">1990 </option>
                <option value="1989">1989 </option>
                <option value="1988">1988 </option>
                <option value="1987">1987 </option>
                <option value="1986">1986 </option>
                <option value="1985">1985 </option>
                <option value="1984">1984 </option>
                <option value="1983">1983 </option>
                <option value="1982">1982 </option>
                <option value="1981">1981 </option>
                <option value="1980">1980 </option>
                <option value="1979">1979 </option>
                <option value="1978">1978 </option>
                <option value="1977">1977 </option>
                <option value="1976">1976 </option>
                <option value="1975">1975 </option>
                <option value="1974">1974 </option>
                <option value="1973">1973 </option>
                <option value="1972">1972 </option>
                <option value="1971">1971 </option>
                <option value="1970">1970 </option>
                <option value="1969">1969 </option>
                <option value="1968">1968 </option>
                <option value="1967">1967 </option>
                <option value="1966">1966 </option>
                <option value="1965">1965 </option>
                <option value="1964">1964 </option>
                <option value="1963">1963 </option>
                <option value="1962">1962 </option>
                <option value="1961">1961 </option>
                <option value="1960">1960 </option>
                <option value="1959">1959 </option>
                <option value="1958">1958 </option>
                <option value="1957">1957 </option>
                <option value="1956">1956 </option>
                <option value="1955">1955 </option>
                <option value="1954">1954 </option>
                <option value="1953">1953 </option>
                <option value="1952">1952 </option>
                <option value="1951">1951 </option>
                <option value="1950">1950 </option>
              </select>
			  <br />			 
<label>Responsibilities / Achievments:</label>
<textarea rows="7" cols="30" name="duties2" ><?=$duties2;?></textarea>
<br>
<br>
<label>Company Name 3:</label>
<input name="companyname3" type="text" id="companyname3" size="45" value="<?=$company3;?>"  />						
<br />
<label>Position/Title:</label>
<input name="position3" type="text" id="position3"  size="45"  value="<?=$position3;?>"  />
<br />
<label>Employment Period:</label>
<select name="monthfrom3">
                <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option selected="selected" value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
              </select>
			  <select name="yearfrom3" >
                  <option selected="selected" value="2008">2008 </option>
                  <option value="2007">2007 </option>
                  <option value="2006">2006 </option>
                  <option value="2005">2005 </option>
                  <option value="2004">2004 </option>
                  <option value="2003">2003 </option>
                  <option value="2002">2002 </option>
                  <option value="2001">2001 </option>
                  <option value="2000">2000 </option>
                  <option value="1999">1999 </option>
                  <option value="1998">1998 </option>
                  <option value="1997">1997 </option>
                  <option value="1996">1996 </option>
                  <option value="1995">1995 </option>
                  <option value="1994">1994 </option>
                  <option value="1993">1993 </option>
                  <option value="1992">1992 </option>
                  <option value="1991">1991 </option>
                  <option value="1990">1990 </option>
                  <option value="1989">1989 </option>
                  <option value="1988">1988 </option>
                  <option value="1987">1987 </option>
                  <option value="1986">1986 </option>
                  <option value="1985">1985 </option>
                  <option value="1984">1984 </option>
                  <option value="1983">1983 </option>
                  <option value="1982">1982 </option>
                  <option value="1981">1981 </option>
                  <option value="1980">1980 </option>
                  <option value="1979">1979 </option>
                  <option value="1978">1978 </option>
                  <option value="1977">1977 </option>
                  <option value="1976">1976 </option>
                  <option value="1975">1975 </option>
                  <option value="1974">1974 </option>
                  <option value="1973">1973 </option>
                  <option value="1972">1972 </option>
                  <option value="1971">1971 </option>
                  <option value="1970">1970 </option>
                  <option value="1969">1969 </option>
                  <option value="1968">1968 </option>
                  <option value="1967">1967 </option>
                  <option value="1966">1966 </option>
                  <option value="1965">1965 </option>
                  <option value="1964">1964 </option>
                  <option value="1963">1963 </option>
                  <option value="1962">1962 </option>
                  <option value="1961">1961 </option>
                  <option value="1960">1960 </option>
                  <option value="1959">1959 </option>
                  <option value="1958">1958 </option>
                  <option value="1957">1957 </option>
                  <option value="1956">1956 </option>
                  <option value="1955">1955 </option>
                  <option value="1954">1954 </option>
                  <option value="1953">1953 </option>
                  <option value="1952">1952 </option>
                  <option value="1951">1951 </option>
                  <option value="1950">1950 </option>
                </select>
			  <select name="monthto3" >
                  <option selected="selected" value="Current Month">Current </option>
                 <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option  value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
                </select>
			  <select name="yearto3" >
                <option selected="selected" value="Current Year">Current </option>
                <option value="2008">2008 </option>
                <option value="2007">2007 </option>
                <option value="2006">2006 </option>
                <option value="2005">2005 </option>
                <option value="2004">2004 </option>
                <option value="2003">2003 </option>
                <option value="2002">2002 </option>
                <option value="2001">2001 </option>
                <option value="2000">2000 </option>
                <option value="1999">1999 </option>
                <option value="1998">1998 </option>
                <option value="1997">1997 </option>
                <option value="1996">1996 </option>
                <option value="1995">1995 </option>
                <option value="1994">1994 </option>
                <option value="1993">1993 </option>
                <option value="1992">1992 </option>
                <option value="1991">1991 </option>
                <option value="1990">1990 </option>
                <option value="1989">1989 </option>
                <option value="1988">1988 </option>
                <option value="1987">1987 </option>
                <option value="1986">1986 </option>
                <option value="1985">1985 </option>
                <option value="1984">1984 </option>
                <option value="1983">1983 </option>
                <option value="1982">1982 </option>
                <option value="1981">1981 </option>
                <option value="1980">1980 </option>
                <option value="1979">1979 </option>
                <option value="1978">1978 </option>
                <option value="1977">1977 </option>
                <option value="1976">1976 </option>
                <option value="1975">1975 </option>
                <option value="1974">1974 </option>
                <option value="1973">1973 </option>
                <option value="1972">1972 </option>
                <option value="1971">1971 </option>
                <option value="1970">1970 </option>
                <option value="1969">1969 </option>
                <option value="1968">1968 </option>
                <option value="1967">1967 </option>
                <option value="1966">1966 </option>
                <option value="1965">1965 </option>
                <option value="1964">1964 </option>
                <option value="1963">1963 </option>
                <option value="1962">1962 </option>
                <option value="1961">1961 </option>
                <option value="1960">1960 </option>
                <option value="1959">1959 </option>
                <option value="1958">1958 </option>
                <option value="1957">1957 </option>
                <option value="1956">1956 </option>
                <option value="1955">1955 </option>
                <option value="1954">1954 </option>
                <option value="1953">1953 </option>
                <option value="1952">1952 </option>
                <option value="1951">1951 </option>
                <option value="1950">1950 </option>
              </select>
			  <br />			 
<label>Responsibilities / Achievments:</label>
<textarea rows="7" cols="30" name="duties3" ><?=$duties3;?></textarea>
<br>
<br>
<label>Company Name 4:</label>
<input name="companyname4" type="text" id="companyname4" size="45" value="<?=$company4;?>"  />						
<br />
<label>Position/Title:</label>
<input name="position4" type="text" id="position4"  size="45" value="<?=$position4;?>"  />
<br />
<label>Employment Period:</label>
<select name="monthfrom4">
                <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option selected="selected" value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
              </select>
			  <select name="yearfrom4" >
                  <option selected="selected" value="2008">2008 </option>
                  <option value="2007">2007 </option>
                  <option value="2006">2006 </option>
                  <option value="2005">2005 </option>
                  <option value="2004">2004 </option>
                  <option value="2003">2003 </option>
                  <option value="2002">2002 </option>
                  <option value="2001">2001 </option>
                  <option value="2000">2000 </option>
                  <option value="1999">1999 </option>
                  <option value="1998">1998 </option>
                  <option value="1997">1997 </option>
                  <option value="1996">1996 </option>
                  <option value="1995">1995 </option>
                  <option value="1994">1994 </option>
                  <option value="1993">1993 </option>
                  <option value="1992">1992 </option>
                  <option value="1991">1991 </option>
                  <option value="1990">1990 </option>
                  <option value="1989">1989 </option>
                  <option value="1988">1988 </option>
                  <option value="1987">1987 </option>
                  <option value="1986">1986 </option>
                  <option value="1985">1985 </option>
                  <option value="1984">1984 </option>
                  <option value="1983">1983 </option>
                  <option value="1982">1982 </option>
                  <option value="1981">1981 </option>
                  <option value="1980">1980 </option>
                  <option value="1979">1979 </option>
                  <option value="1978">1978 </option>
                  <option value="1977">1977 </option>
                  <option value="1976">1976 </option>
                  <option value="1975">1975 </option>
                  <option value="1974">1974 </option>
                  <option value="1973">1973 </option>
                  <option value="1972">1972 </option>
                  <option value="1971">1971 </option>
                  <option value="1970">1970 </option>
                  <option value="1969">1969 </option>
                  <option value="1968">1968 </option>
                  <option value="1967">1967 </option>
                  <option value="1966">1966 </option>
                  <option value="1965">1965 </option>
                  <option value="1964">1964 </option>
                  <option value="1963">1963 </option>
                  <option value="1962">1962 </option>
                  <option value="1961">1961 </option>
                  <option value="1960">1960 </option>
                  <option value="1959">1959 </option>
                  <option value="1958">1958 </option>
                  <option value="1957">1957 </option>
                  <option value="1956">1956 </option>
                  <option value="1955">1955 </option>
                  <option value="1954">1954 </option>
                  <option value="1953">1953 </option>
                  <option value="1952">1952 </option>
                  <option value="1951">1951 </option>
                  <option value="1950">1950 </option>
                </select>
			  <select name="monthto4" >
                  <option selected="selected" value="Current Month">Current </option>
                 <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option  value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
                </select>
			  <select name="yearto4" >
                <option selected="selected" value="Current Year">Current </option>
                <option value="2008">2008 </option>
                <option value="2007">2007 </option>
                <option value="2006">2006 </option>
                <option value="2005">2005 </option>
                <option value="2004">2004 </option>
                <option value="2003">2003 </option>
                <option value="2002">2002 </option>
                <option value="2001">2001 </option>
                <option value="2000">2000 </option>
                <option value="1999">1999 </option>
                <option value="1998">1998 </option>
                <option value="1997">1997 </option>
                <option value="1996">1996 </option>
                <option value="1995">1995 </option>
                <option value="1994">1994 </option>
                <option value="1993">1993 </option>
                <option value="1992">1992 </option>
                <option value="1991">1991 </option>
                <option value="1990">1990 </option>
                <option value="1989">1989 </option>
                <option value="1988">1988 </option>
                <option value="1987">1987 </option>
                <option value="1986">1986 </option>
                <option value="1985">1985 </option>
                <option value="1984">1984 </option>
                <option value="1983">1983 </option>
                <option value="1982">1982 </option>
                <option value="1981">1981 </option>
                <option value="1980">1980 </option>
                <option value="1979">1979 </option>
                <option value="1978">1978 </option>
                <option value="1977">1977 </option>
                <option value="1976">1976 </option>
                <option value="1975">1975 </option>
                <option value="1974">1974 </option>
                <option value="1973">1973 </option>
                <option value="1972">1972 </option>
                <option value="1971">1971 </option>
                <option value="1970">1970 </option>
                <option value="1969">1969 </option>
                <option value="1968">1968 </option>
                <option value="1967">1967 </option>
                <option value="1966">1966 </option>
                <option value="1965">1965 </option>
                <option value="1964">1964 </option>
                <option value="1963">1963 </option>
                <option value="1962">1962 </option>
                <option value="1961">1961 </option>
                <option value="1960">1960 </option>
                <option value="1959">1959 </option>
                <option value="1958">1958 </option>
                <option value="1957">1957 </option>
                <option value="1956">1956 </option>
                <option value="1955">1955 </option>
                <option value="1954">1954 </option>
                <option value="1953">1953 </option>
                <option value="1952">1952 </option>
                <option value="1951">1951 </option>
                <option value="1950">1950 </option>
              </select>
			  <br />			 
<label>Responsibilities / Achievments:</label>
<textarea rows="7" cols="30" name="duties4" ><?=$duties4;?></textarea><br>
<br>
<label>Company Name 5 :</label>
<input name="companyname5" type="text" id="companyname5" size="45" value="<?=$company5;?>"  />						
<br />
<label>Position/Title:</label>
<input name="position5" type="text" id="position5"  size="45" value="<?=$position5;?>"  />
<br />
<label>Employment Period:</label>
<select name="monthfrom5">
                <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option selected="selected" value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
              </select>
			  <select name="yearfrom5" >
                  <option selected="selected" value="2008">2008 </option>
                  <option value="2007">2007 </option>
                  <option value="2006">2006 </option>
                  <option value="2005">2005 </option>
                  <option value="2004">2004 </option>
                  <option value="2003">2003 </option>
                  <option value="2002">2002 </option>
                  <option value="2001">2001 </option>
                  <option value="2000">2000 </option>
                  <option value="1999">1999 </option>
                  <option value="1998">1998 </option>
                  <option value="1997">1997 </option>
                  <option value="1996">1996 </option>
                  <option value="1995">1995 </option>
                  <option value="1994">1994 </option>
                  <option value="1993">1993 </option>
                  <option value="1992">1992 </option>
                  <option value="1991">1991 </option>
                  <option value="1990">1990 </option>
                  <option value="1989">1989 </option>
                  <option value="1988">1988 </option>
                  <option value="1987">1987 </option>
                  <option value="1986">1986 </option>
                  <option value="1985">1985 </option>
                  <option value="1984">1984 </option>
                  <option value="1983">1983 </option>
                  <option value="1982">1982 </option>
                  <option value="1981">1981 </option>
                  <option value="1980">1980 </option>
                  <option value="1979">1979 </option>
                  <option value="1978">1978 </option>
                  <option value="1977">1977 </option>
                  <option value="1976">1976 </option>
                  <option value="1975">1975 </option>
                  <option value="1974">1974 </option>
                  <option value="1973">1973 </option>
                  <option value="1972">1972 </option>
                  <option value="1971">1971 </option>
                  <option value="1970">1970 </option>
                  <option value="1969">1969 </option>
                  <option value="1968">1968 </option>
                  <option value="1967">1967 </option>
                  <option value="1966">1966 </option>
                  <option value="1965">1965 </option>
                  <option value="1964">1964 </option>
                  <option value="1963">1963 </option>
                  <option value="1962">1962 </option>
                  <option value="1961">1961 </option>
                  <option value="1960">1960 </option>
                  <option value="1959">1959 </option>
                  <option value="1958">1958 </option>
                  <option value="1957">1957 </option>
                  <option value="1956">1956 </option>
                  <option value="1955">1955 </option>
                  <option value="1954">1954 </option>
                  <option value="1953">1953 </option>
                  <option value="1952">1952 </option>
                  <option value="1951">1951 </option>
                  <option value="1950">1950 </option>
                </select>
			  <select name="monthto5" >
                  <option selected="selected" value="Current Month">Current </option>
                 <option value="JAN">JAN </option>
                <option value="FEB">FEB </option>
                <option  value="MAR">MAR </option>
                <option value="APR">APR </option>
                <option value="MAY">MAY </option>
                <option value="JUN">JUN </option>
                <option value="JUL">JUL </option>
                <option value="AUG">AUG </option>
                <option value="SEP">SEP </option>
                <option value="OCT">OCT </option>
                <option value="NOV">NOV </option>
                <option value="DEC">DEC </option>
                </select>
			  <select name="yearto5" >
                <option selected="selected" value="Current Year">Current </option>
                <option value="2008">2008 </option>
                <option value="2007">2007 </option>
                <option value="2006">2006 </option>
                <option value="2005">2005 </option>
                <option value="2004">2004 </option>
                <option value="2003">2003 </option>
                <option value="2002">2002 </option>
                <option value="2001">2001 </option>
                <option value="2000">2000 </option>
                <option value="1999">1999 </option>
                <option value="1998">1998 </option>
                <option value="1997">1997 </option>
                <option value="1996">1996 </option>
                <option value="1995">1995 </option>
                <option value="1994">1994 </option>
                <option value="1993">1993 </option>
                <option value="1992">1992 </option>
                <option value="1991">1991 </option>
                <option value="1990">1990 </option>
                <option value="1989">1989 </option>
                <option value="1988">1988 </option>
                <option value="1987">1987 </option>
                <option value="1986">1986 </option>
                <option value="1985">1985 </option>
                <option value="1984">1984 </option>
                <option value="1983">1983 </option>
                <option value="1982">1982 </option>
                <option value="1981">1981 </option>
                <option value="1980">1980 </option>
                <option value="1979">1979 </option>
                <option value="1978">1978 </option>
                <option value="1977">1977 </option>
                <option value="1976">1976 </option>
                <option value="1975">1975 </option>
                <option value="1974">1974 </option>
                <option value="1973">1973 </option>
                <option value="1972">1972 </option>
                <option value="1971">1971 </option>
                <option value="1970">1970 </option>
                <option value="1969">1969 </option>
                <option value="1968">1968 </option>
                <option value="1967">1967 </option>
                <option value="1966">1966 </option>
                <option value="1965">1965 </option>
                <option value="1964">1964 </option>
                <option value="1963">1963 </option>
                <option value="1962">1962 </option>
                <option value="1961">1961 </option>
                <option value="1960">1960 </option>
                <option value="1959">1959 </option>
                <option value="1958">1958 </option>
                <option value="1957">1957 </option>
                <option value="1956">1956 </option>
                <option value="1955">1955 </option>
                <option value="1954">1954 </option>
                <option value="1953">1953 </option>
                <option value="1952">1952 </option>
                <option value="1951">1951 </option>
                <option value="1950">1950 </option>
              </select>
			  <br />			 
<label>Responsibilities / Achievments:</label>
<textarea rows="7" cols="30" name="duties5" ><?=$duties5;?></textarea>
<!--<input type="button" name="addwork" class="button" id="addwork" value="Add More Work History" onClick="AddWork();" />-->
</div>
</div>


</td></tr>
</table>
  
<br clear=all><br>
<table width=100% cellspacing=8 cellpadding=2 border=0 align=left ><tr><td width=100% bgcolor=#DEE5EB colspan=2><b>Availability Status</b></td></tr>
<tr><td>


<table width=100% cellspacing=2 cellpadding=2 border=0><tr><td width='5%'>

<!-- 1 -->
<INPUT type="radio" value="a" name="available_status" ></td>
<td width=95% >I can start work after
<select style='width:40px' class="text" name="available_notice">
<? echo $monthoptions2;?>
</select>&nbsp;month(s) of notice period
</td></tr>

<!-- 2 -->
<tr><td width=5% >
<INPUT type=radio value="b" name="available_status" ></td>
<td width=95% >I can start work after
<select name="aday" class="text"> 
<option value='0'></option>
<? echo $nums;?>
</select>
 - <select name="amonth" class="text">
<option value='0'></option>
<? echo $monthnameoptions3;?>
</select> - <input type=text name="ayear" size=4 maxlength=4 style='width=50px' value='<?=$ayear;?>'  class=text> (YYYY)</td></tr>

<!-- 3 -->
<tr><td width=5% >
<INPUT type=radio value="p" name="available_status" >
</td>
<td width=95% >I am not actively looking for a job now</td></tr>

<!-- 4 -->
<tr><td width=5% >
<INPUT type=radio value="Work Immediately" name="available_status" >
</td>
<td width=95% >Work Immediately</td></tr>

</table>
</td></tr>
</table>
<br clear=all><br>
<table width=100% cellspacing=8 cellpadding=2 border=0 align=left >
<tr><td width=100% bgcolor=#DEE5EB colspan=2>
<b>Expected Salary (Optional)</b></td>
</tr><tr><td width=30% align=right>Expected Monthly Salary :</td><td width=70% >
<select name="salary_currency" style="font:8pt, Verdana" >  
<option value="0">-</option>
<? echo $currencyoptions;?>
</select>&nbsp;&nbsp;
<input type="text" class="text" name="expected_salary" maxlength="15" size="16" value="">&nbsp;&nbsp;
<INPUT type="checkbox" value="Yes" name="expected_salary_neg" >Negotiable</td></tr></table>
<br clear=all><table border=0 align=center cellpadding=4 cellspacing=2><tr><td align=center>
<input type="submit"  value="Update" name=btnSubmit class="button" style="width:120px;"></td></tr></table></form>
</td></tr></table>
						
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                             <tr valign="top" class="text01">  
                              <td background="images/line_bottom.gif" bgcolor="#FFFFFF"><div align="left"><img src="images/line_dsyn1.gif" width="61" height="15"></div></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
          </tr>
          <tr> 
            <td colspan="2" valign="top">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table width="784" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td>
        <? include_once("footer.php") ?>
      </td>
    </tr>
  </table>
  
</div>
</body>
</html>
