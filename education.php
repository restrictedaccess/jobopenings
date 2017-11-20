<?
include 'conf.php';
$userid=$_SESSION['userid'];
//echo $userid;
$mess="";
$mess=$_REQUEST['mess'];
$countryoptions="";
$countrycodes="";
$fieldoptions="";
$fieldstudy="";
$college_country="";

$countrycodes = array(
"AF","AL","DZ","AS","AD","AO","AI","AQ","AG","AR","AM","AW","AC","AU","AT","AZ","BS","BH","BD","BB",
"BY","BE","BZ","BJ","BM","BT","BO","BA","BW","BV","BR","IO","BN","BG","BF","BI","KH","CM","CA","CV","KY","CF","TD","CL",
"CN","CX","CC","CO","KM","CG","CK","CR","HR","CU","CY","CZ","DK","DG","DJ","DM","DO","TP","EC","EG","SV","GQ","ER","EE",
"ET","FK","FO","FJ","FI","FR","FX","TF","GA","GM","GE","DE","GH","GI","GB","GR","GL","GD","GP","GU","GT","GN","GW","GY",
"GF","HT","HM","HN","HK","HU","IS","IN","ID","IR","IQ","IE","IL","IT","CI","JM","JP","JO","KZ","KE","KI","KP","KR","KW",
"KG","LA","LV","LB","LS","LR","LY","LI","LT","LU","MO","MK","MG","MW","MY","MV","ML","MT","MH","MQ","MR","MU","YT","MX",
"FM","MD","MC","MN","MS","MA","MZ","MM","NA","NR","NP","AN","NL","NC","NZ","NI","NE","NG","NU","NF","MP","NO","OM","PK",
"PW","PA","PG","PY","PE","PH","PN","PL","PF","PT","PR","QA","RE","RO","RU","RW","LC","WS","SM","SA","SN","SC","SL","SG",
"SK","SI","SB","SO","ZA","GS","ES","LK","SH","PM","ST","KN","VC","SD","SR","SJ","SZ","SE","CH","SY","TJ","TW","TZ","TH",
"TG","TK","TO","TT","TN","TR","TM","TC","TV","UG","UA","AE","UK","US","UY","UM","UZ","VU","VA","VE","VN","VG","VI","WF",
"EH","YE","YU","ZR","ZM","ZW");

$countrynames = array(
	    "Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Ascension Island","Australia","Austria",
	    "Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia-Herzegovina","Botswana","Bouvet Island",
	    "Brazil","British Indian O. Terr.","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central African Rep.","Chad","Chile","China",
	    "Christmas Island","Cocos (Keeling) Isl.","Colombia","Comoros","Congo","Cook Islands","Costa Rica","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Diego Garcia","Djibouti","Dominica",
	    "Dominican Republic","East Timor","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Isl. (Malvinas)","Faroe Islands","Fiji","Finland","France","France (European Ter.)",
	    "French Southern Terr.","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Great Britain (UK)","Greece","Greenland","Grenada","Guadeloupe (Fr.)","Guam (US)","Guatemala","Guinea",
	    "Guinea Bissau","Guyana","Guyana (Fr.)","Haiti","Heard &amp; McDonald Isl.","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel",
	    "Italy","Ivory Coast","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea (North)","Korea (South)","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon",
	    "Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia (former Yugo.)","Madagascar (Republic of)","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands",
	    "Martinique (Fr.)","Mauritania","Mauritius","Mayotte","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru",
	    "Nepal","Netherland Antilles","Netherlands","New Caledonia (Fr.)","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Isl.","Norway","Oman","Pakistan","Palau",
	    "Panama","Papua New Guinea","Paraguay","Peru","Philippines","Pitcairn","Poland","Polynesia (Fr.)","Portugal","Puerto Rico (US)","Qatar","Reunion (Fr.)","Romania","Russian Federation","Rwanda",
	    "Saint Lucia","Samoa","San Marino","Saudi Arabia","Senegal","Seychelles","Sierra Leone","Singapore","Slovakia (Slovak Rep)","Slovenia","Solomon Islands","Somalia","South Africa","South Georgia  and  South Sand","Spain",
	    "Sri Lanka","St. Helena","St. Pierre &amp; Miquelon","St. Tome and Principe","St.Kitts Nevis Anguilla","St.Vincent &amp; Grenadines","Sudan","Suriname","Svalbard &amp; Jan Mayen Is","Swaziland","Sweden","Switzerland","Syria","Tadjikistan","Taiwan",
	    "Tanzania","Thailand","Togo","Tokelau","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos Islands","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom",
	    "United States","Uruguay","US Minor outlying Isl.","Uzbekistan","Vanuatu","Vatican City State","Venezuela","Vietnam","Virgin Islands (British)","Virgin Islands (US)","Wallis &amp; Futuna Islands","Western Sahara","Yemen","Yugoslavia","Zaire",
	    "Zambia","Zimbabwe");
 for ($count = 0; $count < count($countrycodes); $count++) {
      if($college_country == $countrycodes[$count])
      {
	 $countryoptions .= "<option selected value=\"$countrycodes[$count]\">$countrynames[$count]</option>\n";
      }
      else
      {
	 $countryoptions .= "<option value=\"$countrycodes[$count]\">$countrynames[$count]</option>\n";
      }
   }

$fieldCodesArray=array("Advertising/Media","Agriculture/Aquaculture/Forestry","Airline Operation/Airport Management","Architecture","Art/Design/Creative Multimedia","Biology","BioTechnology","Business Studies/Administration/Management","Chemistry","Commerce","Computer Science/Information Technology","Dentistry","Economics","Education/Teaching/Training","Engineering (Aviation/Aeronautics/Astronautics)","Engineering (Bioengineering/Biomedical)","Engineering (Chemical)","Engineering (Civil)","Engineering (Computer/Telecommunication)","Engineering (Electrical/Electronic)","Engineering (Environmental/Health/Safety)","Engineering (Industrial)","Engineering (Marine)","Engineering (Material Science)","Engineering (Mechanical)","Engineering (Mechatronic/Electromechanical)","Engineering (Metal Fabrication/Tool & Die/Welding)","Engineering (Mining/Mineral)","Engineering (Others)","Engineering (Petroleum/Oil/Gas)","Finance/Accountancy/Banking","Food & Beverage Services Management","Food Technology/Nutrition/Dietetics","Geographical Science","Geology/Geophysics","History","Hospitality/Tourism/Hotel Management","Human Resource Management","Humanities/Liberal Arts","Journalism","Law","Library Management","Linguistics/Languages","Logistic/Transportation","Maritime Studies","Marketing","Mass Communications","Mathematics","Medical Science","Medicine","Music/Performing Arts Studies","Nursing","Optometry","Others","Personal Services","Pharmacy/Pharmacology","Philosophy","Physical Therapy/Physiotherapy","Physics","Political Science","Property Development/Real Estate Management","Protective Services & Management","Psychology","Quantity Survey","Science & Technology","Secretarial","Social Science/Sociology","Sports Science & Management","Textile/Fashion Design","Urban Studies/Town Planning","Veterinary");

 for ($count = 0; $count < count($fieldCodesArray); $count++) {
      if($fieldstudy == $fieldCodesArray[$count])
      {
	$fieldoptions .= "<option selected value=\"$fieldCodesArray[$count]\">$fieldCodesArray[$count]</option>\n";
      }
      else
      {
	 $fieldoptions .= "<option value=\"$fieldCodesArray[$count]\">$fieldCodesArray[$count]</option>\n";
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
	var year =document.edu.graduate_year.value;
	missinginfo = "";
	if (document.edu.educationallevel.selectedIndex=="0")
	{
		missinginfo += "\n     -  Please choose your Educational Attainment";
	}
	if (document.edu.fieldstudy.selectedIndex=="0")
	{
		missinginfo += "\n     -  Please choose your Field of Study";
	}//grade
	if (document.edu.grade.value == "Grade Point Average (GPA)")
	{
		if (document.edu.gpascore.value=="")
		{
			missinginfo += "\n     -  Please enter your Grade Point Average (GPA) score";
		}
		if (IsNumeric(document.edu.gpascore.value)==false)
		{
			missinginfo += "\n     -  Please enter a valid Grade Point Average (GPA) score";
		}

		
	}
	if (document.edu.college_name.value == "")
	{
		missinginfo += "\n     -  Please enter your Institution / University /School Name";
	}
	
	if (document.edu.college_country.selectedIndex=="0")
	{
		missinginfo += "\n     -  Please enter your Institution / University /School Location";
	}
	//
	if (document.edu.graduate_month.selectedIndex=="0")
	{
		missinginfo += "\n     -  Please enter Graduation Month";
	}
	if (year == "")
	{
		missinginfo += "\n     -  Please enter Graduation Year";
	}
	if (year.length <4 && year!="")
	{
		missinginfo += "\n     -  Please enter a valid Graduation Year \n \t Format must be (YYYY)";
	}
	///////////////////////////////////////////////
		
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
                  <td valign="top" class="tabdsyn"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td bgcolor="#FFFFFF" class=""><table width=566 cellpadding=10 cellspacing=0 border=0 align="center">
						<tr>
                          <td>
  <form method="POST" name="edu" action="educationphp.php"onsubmit="return checkFields();">
    
    
  <table width=100% cellspacing=8 cellpadding=2 border=0 align=left ><tr><td width=100% bgcolor=#DEE5EB colspan=2><b>Highest Academic Qualification</b></td></tr><tr valign=top><td align=right  >Highest Level :</td><td>
  <select name="educationallevel"  style="width:390px;font:8pt, Verdana">
  <option value="0">-</option>
  <option value="High School Diploma">High School Diploma</option>
  <option value="Vocational Diploma / Short Course Certificate" >Vocational Diploma / Short Course Certificate</option>
  <option value="Bachelor's/College Degree">Bachelor's/College Degree </option>
  <option value="Post Graduate Diploma / Master's Degree">Post Graduate Diploma / Master's Degree</option>
  <option value="Professional License (Passed Board/Bar/Professional License Exam)">Professional License (Passed Board/Bar/Professional License Exam)</option>
  <option value="Doctorate Degree">Doctorate Degree</option>
  </select></td></tr>
  <tr valign=top><td align=right  >Field of Study :</td><td><select name="fieldstudy" style="width:390px;font:8pt, Verdana" >
  <option value="000">-</option>
  <? echo $fieldoptions; ?>
    
  </select></td></tr>
  <tr valign=top><td align=right  >&nbsp;&nbsp;&nbsp;Major :</td>
  <td><INPUT maxLength=100 size=30 style='width:270px' class="text" name="major" value=""></td></tr>
  <tr valign=top><td align=right  >Grade :</td><td>
  <select name="grade" style="width:270px;font:8pt, Verdana" >
  <option value="Grade Point Average (GPA)" >Grade Point Average (GPA)</option>
  <option value="Incomplete">Incomplete</option>
  </select></td></tr>
  <tr valign=top><td>&nbsp;</td>
  <td>If GPA, please enter score: <INPUT maxLength=5 size=3 style='width:35px' class="text" name="gpascore" value=""> out of 100</td>
  </tr>
  <tr valign=top><td align=right  >Institute / University :</td>
  <td><INPUT maxLength="100" size="30" style="width:270px" class="text" name="college_name" value=""></td></tr>
  <tr valign=top><td align=right  >Located In :</td>
  <td><select name="college_country" style="width:270px;font:8pt, Verdana" >
  <option value="00">-</option>
  <? echo $countryoptions;?>
  </select>
  </td></tr><tr valign=top><td align=right  >Graduation Date :</td>
  <td>
  <select name="graduate_month" class=text>
    <option value='0'></option>
    <option value=1>January</option>
    <option value=2>February</option>
    <option value=3>March</option>
    <option value=4>April</option>
    <option value=5>May</option>
    <option value=6>June</option>
    <option value=7>July</option>
    <option value=8 >August</option>
    <option value=9>September</option>
    <option value=10>October</option>
    <option value=11>November</option>
    <option value=12>December</option>
    
</select> - <input type="text" name="graduate_year" size=4 maxlength=4 style='width=50px' value=""  class="text"> (YYYY)<br>&nbsp;&nbsp;<img src='images/arrow.gif'><font class=tip>Enter expected graduation date if still pursuing</font></td></tr></table><br clear=all><input type="hidden" name="userid" value="<? echo $userid?>"><br><table width=100% border=0 cellspacing=1 cellpadding=2><tr><td align=center><INPUT type=submit value='Save & Next' name="btnSubmit" class=button style='width:120px'></td></tr></table></form></td></tr></table><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
