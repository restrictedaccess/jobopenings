<?
include 'conf.php';
$userid=$_SESSION['userid'];
$mess="";
$mess=$_REQUEST['mess'];

$language="";
$languageoptions="";
$languageArray=array("Arabic","Bahasa Indonesia","Bahasa Malaysia","Bengali","Chinese","Dutch","English","Filipino","French","German","Hebrew","Hindi","Italian","Japanese","Korean","Portuguese","Russian","Spanish","Tamil","Thai","Vietnamese");
for ($i = 0; $i < count($languageArray); $i++)
{
  if($language == $languageArray[$i])
  {
 $languageoptions .= "<option selected value=\"$languageArray[$i]\">$languageArray[$i]</option>\n";
  }
  else
  {
 $languageoptions .= "<option value=\"$languageArray[$i]\">$languageArray[$i]</option>\n";
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
<meta name="copyright" content="Copyright � 2007 Carousel Productions Inc. All rights reserved.">
<meta http-equiv="Content-Language" content="en-gb">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="main.css" rel="stylesheet" type="text/css">
<link href="css/font.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script type="text/javascript">
<!--
function checkFields()
{
	//if (confirm("Are you sure"))
	//{
	//	return true;
	//}
	//else return false;		
	//alert (document.frmSkills.skill.value);
	
	missinginfo = "";
	if (document.frmLang.language.selectedIndex ==0)
	{
		missinginfo += "\n     -  Please enter a Language";
	}
	//
	if (document.frmLang.spoken.selectedIndex ==0)
	{
		missinginfo += "\n     -  Please rate your language(Spoken) proficiency";
	}
	
	// written
	if (document.frmLang.written.selectedIndex ==0)
	{
		missinginfo += "\n     -  Please rate your language(Written) proficiency";
	}
	
	if (missinginfo != "")
	{
		missinginfo =" " + "You failed to correctly fill in the required information:\n" +
		missinginfo + "\n\n";
		alert(missinginfo);
		return false;
	}
	else return true;

	
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
                  <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td bgcolor="#FFFFFF" class="tabdsyn">
						<form method="POST" name="frmLang" action="languagesphp.php"  onsubmit="return checkFields();">
<input type="hidden" name="userid" value="<? echo $userid;?>">

<table width=566 cellspacing=8 cellpadding=2 border=0 align=center >
<tr><td width=100% bgcolor=#DEE5EB colspan=2><b>Add a Language </b></td></tr>
<tr><td colspan=2 >Select only languages you are fluent in and rate your proficiency (0=Poor - 10=Excellent).</td></tr>
<tr><td align=right width=30% >Language :</td><td><select name="language" style="font:8pt, Verdana" >
<option value="0">-</option>
<? echo $languageoptions;?>
</select>
</td></tr>
<tr><td align=right width=30% >Spoken :</td>
<td>
<select name="spoken"  style="font:8pt, Verdana">
<option value=0>0</option>
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option>
</select>
</td></tr>
<tr><td align=right width=30% >Written :</td>
<td><select name="written"  style="font:8pt, Verdana">
<option value=0>0</option>
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option>
</select>
</td></tr>
<tr><td colspan=2>
<table width=100% border=0 cellspacing=1 cellpadding=2>
<tr><td align=center>
<INPUT type="submit" value="Save & Add Another Language" name="Add" class="button" style="width:240px">
&nbsp;&nbsp;
<INPUT type="submit" value="Save & Next" name="Next" class="button" style="width:120px">
</td></tr></table>
</td></tr>
</table>
<!-- skills list -->
<br clear=all><br>

<?
$counter = 0;
$query="SELECT id,language,spoken,written FROM language WHERE userid=$userid;";
//echo $query;
$result=mysql_query($query);
//echo @mysql_num_rows($result);
$ctr=@mysql_num_rows($result);
if ($ctr >0 )
{
 echo "<table width=80% cellspacing=0 cellpadding=0 align=center>
<tr><td><br><b>Languages Added to Your Resume (Maximum of 5 Languages)</b><br><br></td></tr>
<tr><td bgcolor=#333366 height=2></td></tr>
<tr><td>


<table width=100% cellspacing=1 cellpadding=2 align=center border=0 bgcolor=#DEE5EB>
<tr >
<td width='6%' align=center>#</td>
<td width='33%' align=left><b><font size='1'>Language</font></b></td>
<td width='26%' align=center><b><font size='1'>Spoken</font></b></td>
<td width='35%' align=center><b><font size='1'>Written</font></b></td>
<td width='26%' align=center><b><font size='1'>Action</font></b></td>
</tr>";


	$bgcolor="#f5f5f5";
	while(list($id,$language,$spoken,$written) = mysql_fetch_array($result))
	{
		$counter=$counter+1;
		
			
		echo "<tr bgcolor=$bgcolor>
			  <td width='6%' align=center><font size='1'>".$counter.".</font></td>
			  <td width='33%' align=left><font size='1'>".$language."</font></td>
			  <td width='26%' align=center><font size='1'>".$spoken."</font></td>
			  <td width='35%' align=center><font size='1'>".$written."</font></td>
			  <td width='26%' align=center><font size='1'><a href='#' onclick ='go($id); return false;'>delete</a></font></td>
			 </tr>";
			  if($bgcolor=="#f5f5f5")
			  {
			  	$bgcolor="#FFFFFF";
			  }
			  else
			  {
			  	$bgcolor="#f5f5f5";
			  }
	}	
	
echo "</table>
	</td></tr>
	<tr><td bgcolor=#333366 height=1>
	<img src='images/space.gif' height=1 width=1></td></tr></table>";
	
	
}
?>

<!-- --->
<br><input type=hidden name=mode value="update"></form>
<script language=javascript>
<!--
	function go(id) 
	{
		
			if (confirm("Are you sure you want to delete this skill?")) {
				location.href = "deletelanguage.php?id="+id+"&userid="+<? echo $userid;?>;
				//alert(id);
			}
	}
//-->
</script>
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
