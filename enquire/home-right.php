<?php
//2010-06-15 Normaneil Macutay <normanm@remotestaff.com.au>
// - removed the country field
$menu = basename($_SERVER['SCRIPT_FILENAME']);
include 'time.php';
if($menu == "index.php"){
	include('class.php');
	$passGen = new passGen(5);	
}


$ip = $_SERVER['REMOTE_ADDR'];

$countrynames = array( "Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Ascension Island","Australia","Austria",	    "Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia-Herzegovina","Botswana","Bouvet Island",	    "Brazil","British Indian O. Terr.","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central African Rep.","Chad","Chile","China",	    "Christmas Island","Cocos (Keeling) Isl.","Colombia","Comoros","Congo","Cook Islands","Costa Rica","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Diego Garcia","Djibouti","Dominica",	    "Dominican Republic","East Timor","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Isl. (Malvinas)","Faroe Islands","Fiji","Finland","France","France (European Ter.)",	    "French Southern Terr.","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Great Britain (UK)","Greece","Greenland","Grenada","Guadeloupe (Fr.)","Guam (US)","Guatemala","Guinea",	    "Guinea Bissau","Guyana","Guyana (Fr.)","Haiti","Heard &amp; McDonald Isl.","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel",	    "Italy","Ivory Coast","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea (North)","Korea (South)","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon",	    "Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia (former Yugo.)","Madagascar (Republic of)","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands",	    "Martinique (Fr.)","Mauritania","Mauritius","Mayotte","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru",	    "Nepal","Netherland Antilles","Netherlands","New Caledonia (Fr.)","New Zealand","Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Isl.","Norway","Oman","Pakistan","Palau",	    "Panama","Papua New Guinea","Paraguay","Peru","Philippines","Pitcairn","Poland","Polynesia (Fr.)","Portugal","Puerto Rico (US)","Qatar","Reunion (Fr.)","Romania","Russian Federation","Rwanda",	    "Saint Lucia","Samoa","San Marino","Saudi Arabia","Senegal","Seychelles","Sierra Leone","Singapore","Slovakia (Slovak Rep)","Slovenia","Solomon Islands","Somalia","South Africa","South Georgia  and  South Sand","Spain",	    "Sri Lanka","St. Helena","St. Pierre &amp; Miquelon","St. Tome and Principe","St.Kitts Nevis Anguilla","St.Vincent &amp; Grenadines","Sudan","Suriname","Svalbard &amp; Jan Mayen Is","Swaziland","Sweden","Switzerland","Syria","Tadjikistan","Taiwan",	    "Tanzania","Thailand","Togo","Tokelau","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos Islands","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom",	    "United States","Uruguay","US Minor outlying Isl.","Uzbekistan","Vanuatu","Vatican City State","Venezuela","Vietnam","Virgin Islands (British)","Virgin Islands (US)","Wallis &amp; Futuna Islands","Western Sahara","Yemen","Yugoslavia","Zaire",	    "Zambia","Zimbabwe");		 

for ($count = 0; $count < count($countrynames); $count++) {      
	if($country == $countrynames[$count]){	 
		$countryoptions .= "<option selected value=\"$countrynames[$count]\">$countrynames[$count]</option>\n";      
	}else{
		$countryoptions .= "<option value=\"$countrynames[$count]\">$countrynames[$count]</option>\n";
	}
}


if($booking_code=="") {
	$promotional_code="101";
}else{
	$promotional_code = $booking_code;
}

?>
<div id="formbox">
<script type="text/javascript" src="./enquire/enquire.js"></script>
<input type="hidden" name="ip" id="ip" value="<?php echo $ip;?>"  />
<input type="hidden" name="promotional_code" id="promotional_code" value="<?php echo $booking_code;?>">

<h1 class="formtitle" style="padding-top:3px;">Customers Looking for <br />
  Offshore Remote Staff </h1>
<h2>Request a Quote and Callback</h2>


<p>First Name:<br /><input name="cfname" id="cfname" type="text" class="tfields" /></p>
<p>Last Name:<br /><input name="clname" id="clname" type="text" /></p>
<p>Email Address:<br /><input id="cemail" name="cemail" type="text" /></p>
<p class="fhalf" style="margin-left:20px;">Ph: Office<br /><input name="coffice_number" id="coffice_number" type="text"  class="ihalf"/></p>
<p class="fhalf">Ph: Mobile<br /><input id="cmobile" name="cmobile" type="text" class="ihalf" /></p>
<br clear="all" />&nbsp;
<p>Ask a Question<br /><textarea  name="cquestions" id="cquestions"></textarea></p>
<p align="center">
<?php  $rv3 = $passGen->password(0, 1); ?>
<input type="hidden" value="<?php  echo $rv3 ?>" name="rv4" id="rv4">
<?php  echo $passGen->images('./font', 'gif', 'f_', '20', '20'); ?>	  
<input type="text" value="<?php if (!empty($pass)) { echo $pass; }?>" name="pass4" id="pass4"  class="codehalf" maxlength="5" style="width:80px;"><br />
<span style="text-align:center;color:#55707e;font-size:11px;">For validation, type the numbers you see</span> 
</p>

<p ><input type="checkbox" name="top_200" id="top_200" value="yes" style="float:left; width:20px;" />I want to receive Top 200 + Productivity Software Tools</p>
	  
<p style="text-align:center" id="add_btn">
<img src="images/btn-submit.png"  border="0" style="cursor:pointer;" onclick="javascript:saveEnquireDetails();" />
</p>

</div>

