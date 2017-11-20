<?
$site = $_SERVER['HTTP_HOST'] ;
header("location:http://remotestaff.com.au/portal/personal.php");



include('class.php');

$passGen = new passGen(5);



$mess="";

$mess=$_REQUEST['mess'];



$nationality="";

$countryoptions="";

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

		

 for ($count = 0; $count < count($countrynames); $count++) {

      if($nationality == $countrynames[$count])

      {

	 $countryoptions .= "<option selected value=\"$countrynames[$count]\">$countrynames[$count]</option>\n";

      }

      else

      {

	 $countryoptions .= "<option value=\"$countrynames[$count]\">$countrynames[$count]</option>\n";

      }

	  

   }	

//echo $countryoptions;



?>





<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>



<head>

<title>Remote Staff Online Job Hiring, Opening, Vacancies, Work Employment | Easy Online Job Application</title>     

<meta name="description" content="Remote Staff online job hiring, opening, vacancies, work employment, easy online job application for job seekers. Apply now and be part of a great and supportive Global work force team. Embrace global opportunities and expand your Career choices now." />

<meta name="keywords" content="remote staff, online job, job hiring, online job hiring, remote staff hiring, job opening, online job opening, job vacancies, online job vacancies, job employment, online job employment, work employment, online work employment, hiring employment, hiring vacancies, hiring work, hiring work employment, online hiring, online job work, online employment, online work, remote staff job hiring, remote staff job opening, remote staff vacancies, remote staff work employment, remote staff employment, remote hiring, remote job hiring, remote job opening, remote vacancies, remote work employment, remote employment, staff hiring, staff job hiring, staff job opening, staff vacancies, staff work employment, remote staff employment, easy online job application, easy application, easy job, easy online job, job application, online application, easy job application, job seekers, apply now, global work force team, global work, global work force, global work team, work team, work force team, global opportunities, career choices" />

<meta http-equiv="Content-Language" content="en-gb">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="main.css" rel="stylesheet" type="text/css">

<link href="css/font.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<script language=javascript src="js/validation.js"></script>

<script language=javascript src="js/functions.js"></script>

<script type="text/javascript">

<!--

function checkFields()

{

	var countryid =document.frmPersonal.country_id.value;

	missinginfo = "";

	if (document.frmPersonal.fname.value == "")

	{

		missinginfo += "\n     -  Please enter your First Name";

	}

	if (document.frmPersonal.lname.value == "")

	{

		missinginfo += "\n     -  Please enter your Last Name";

	}

	if (document.frmPersonal.gender[0].checked == false && document.frmPersonal.gender[1].checked == false)

	{	

			missinginfo += "\n     -  Please choose your gender";

		

	}

	if (document.frmPersonal.nationality.selectedIndex=="0")

	{

		missinginfo += "\n     -  Please choose your nationality";

	}

	if (document.frmPersonal.email.value == "")

	{

		missinginfo += "\n     -  Please site a email address"; 

	}

	if (document.frmPersonal.pass.value == "")

	{

		missinginfo += "\n     -  Please enter your Password"; 

	}

	if (document.frmPersonal.handphone_no.value == "")

	{

		missinginfo += "\n     -  Please enter your mobile number";

	}

	if (document.frmPersonal.tel_area_code.value == "")

	{

		missinginfo += "\n     -  Please enter your area code";

	}

	if (document.frmPersonal.tel_no.value == "")

	{

		missinginfo += "\n     -  Please enter your telephone number";

	}

	if (document.frmPersonal.address1.value == "")

	{

		missinginfo += "\n     -  Please enter your Address";

	}

	if (document.frmPersonal.postcode.value == "")

	{

		missinginfo += "\n     -  Please enter your Postal Code"; //

	}

	if (document.frmPersonal.country_id.selectedIndex=="0")

	{

		missinginfo += "\n     -  Please state your Country";

	}

	

	if (countryid=="AU"|| countryid=="BD"|| countryid=="HK"|| countryid=="ID"|| countryid=="IN"|| countryid=="MY"|| countryid=="PH"|| countryid=="SG"|| countryid=="TH"|| countryid=="VN")

	{

		if (document.frmPersonal.msia_state_id.selectedIndex=="0")

		{

			missinginfo += "\n     -  Please enter your State or Region";

		}

	}

	else

	{

		if (document.frmPersonal.state.value == "")

		{

			missinginfo += "\n     -  Please enter your State or Region";



		}

	}

	if(document.frmPersonal.city.value == "")

	{

		missinginfo += "\n     -  Please enter your City";

	}

	if (document.frmPersonal.byear.value == "")

	{

		missinginfo += "\n     -  Please enter your Birth Year";

	}

	

	

	///////////////////////////////////////////////

	

	

	//companyturnover  AU BD HK ID IN MY PH SG TH VN

	

	

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

<script language="javascript">

var AU = new Array();

AU[0] = "('Select a State','00','')";

AU[1] = "('A.C.T','AT','')";

AU[2] = "('Northern Territory','NO','')";

AU[3] = "('New South Wales','NW','')";

AU[4] = "('Queensland','QL','')";

AU[5] = "('South Australia','SA','')";

AU[6] = "('Tasmania','TS','')";

AU[7] = "('Victoria','VI','')";

AU[8] = "('Western Australia','WA','')";

var BD = new Array();

BD[0] = "('Select a Division','00','')";

BD[1] = "('Barisal','BS','')";

BD[2] = "('Chittagong','CI','')";

BD[3] = "('Dhaka','DK','')";

BD[4] = "('Khulna','KN','')";

BD[5] = "('Rajshahi','RH','')";

BD[6] = "('Sylhet','YH','')";

var HK = new Array();

HK[0] = "('Hong Kong','HK','')";

var ID = new Array();

ID[0] = "('Select a State','00','')";

ID[1] = "('Aceh','AC','')";

ID[2] = "('Bali','BA','')";

ID[3] = "('Bangka Belitung','BB','')";

ID[4] = "('Banten','BN','')";

ID[5] = "('Bengkulu','BE','')";

ID[6] = "('Gorontalo','GR','')";

ID[7] = "('Jakarta Raya','JA','')";

ID[8] = "('Jambi','JB','')";

ID[9] = "('Jawa Barat','JR','')";

ID[10] = "('Jawa Tengah','JT','')";

ID[11] = "('Jawa Timur','JW','')";

ID[12] = "('Kalimantan Barat','KB','')";

ID[13] = "('Kalimantan Selatan','KS','')";

ID[14] = "('Kalimantan Tengah','KU','')";

ID[15] = "('Kalimantan Timur','KV','')";

ID[16] = "('Lampung','LP','')";

ID[17] = "('Maluku','ML','')";

ID[18] = "('Maluku Utara','MJ','')";

ID[19] = "('Nusa Tenggara Barat','NB','')";

ID[20] = "('Nusa Tenggara Timur','NT','')";

ID[21] = "('Papua','IJ','')";

ID[22] = "('Riau','RI','')";

ID[23] = "('Sulawesi Selatan','SE','')";

ID[24] = "('Sulawesi Tengah','SF','')";

ID[25] = "('Sulawesi Tenggara','SH','')";

ID[26] = "('Sulawesi Utara','SJ','')";

ID[27] = "('Sumatera Barat','SK','')";

ID[28] = "('Sumatera Selatan','SN','')";

ID[29] = "('Sumatera Utara','SP','')";

ID[30] = "('Yogyakarta','YG','')";

var IN = new Array();

IN[0] = "('Select a State','00','')";

IN[1] = "('Andaman & Nicobar','AN:40100:','')";

IN[2] = "('Andhra Pradesh - Hyderabad','AP:40210:Hyderabad:','')";

IN[3] = "('Andhra Pradesh - Secunderabad','AP:40210:Secunderabad:','')";

IN[4] = "('Andhra Pradesh - Vishakapatnam','AP:40220:Vishakapatnam:','')";

IN[5] = "('Andhra Pradesh - Vijaywada','AP:40230:Vijaywada:','')";

IN[6] = "('Andhra Pradesh - Other cities','AP:40299:','')";

IN[7] = "('Assam - Gauhati','AS:40310:Gauhati:','')";

IN[8] = "('Assam - Other cities','AS:40399:','')";

IN[9] = "('Arunachal Pradesh','AU:40400:','')";

IN[10] = "('Bihar - Patna','BI:40510:Patna:','')";

IN[11] = "('Bihar - Other cities','BI:40599:','')";

IN[12] = "('Chandigarh','CH:40600:','')";

IN[13] = "('Chhattisgarh','CT:43400:','')";

IN[14] = "('Daman & Diu','DD:40700:','')";

IN[15] = "('Delhi - Delhi','DE:40800:Delhi:','')";

IN[16] = "('Delhi - Faridabad','DE:40800:Faridabad:','')";

IN[17] = "('Delhi - Ghaziabad','DE:40800:Ghaziabad','')";

IN[18] = "('Delhi - Gurgoan','DE:40800:Gurgoan:','')";

IN[19] = "('Delhi - Noida','DE:40800:Noida:','')";

IN[20] = "('Dadra & Nagar Haveli','DN:40900:','')";

IN[21] = "('Goa','GO:41000:','')";

IN[22] = "('Gujarat - Ahmedabad','GU:41110:Ahmedabad:','')";

IN[23] = "('Gujarat - Vadodara','GU:41120:Vadodara:','')";

IN[24] = "('Gujarat - Other cities','GU:41199:','')";

IN[25] = "('Haryana - Panipat','HA:41210:Panipat:','')";

IN[26] = "('Haryana - Other cities','HA:41299:','')";

IN[27] = "('Himachal Pradesh','HP:41300:','')";

IN[28] = "('Jammu & Kashmir','JK:41400:','')";

IN[29] = "('Jharkhand - Jamshedpur','JN:43510:Jamshedpur:','')";

IN[30] = "('Jharkhand - Ranchi','JN:43520:Ranchi:','')";

IN[31] = "('Jharkhand - Other cities','JN:43599:','')";

IN[32] = "('Karnataka - Bangalore','KA:41510:Bangalore:','')";

IN[33] = "('Karnataka - Mysore','KA:41520:Mysore:','')";

IN[34] = "('Karnataka - Mangalore','KA:41530:Mangalore:','')";

IN[35] = "('Karnataka - Other cities','KA:41599:','')";

IN[36] = "('Kerala - Cochin','KE:41610:Cochin:','')";

IN[37] = "('Kerala - Trivandrum','KE:41620:Trivandrum:','')";

IN[38] = "('Kerala - Other cities','KE:41699:','')";

IN[39] = "('Lakshadweep','LA:41700:','')";

IN[40] = "('Maharashtra - Aurangabad','MA:41810:Aurangabad:','')";

IN[41] = "('Maharashtra - Mumbai','MA:41820:Mumbai:','')";

IN[42] = "('Maharashtra - Nagpur','MA:41830:Nagpur:','')";

IN[43] = "('Maharashtra - Nashik','MA:41840:Nashik:','')";

IN[44] = "('Maharashtra - Pune','MA:41850:Pune:','')";

IN[45] = "('Maharashtra - Other cities','MA:41899:','')";

IN[46] = "('Meghalaya','ME:41900:','')";

IN[47] = "('Mizoram','MI:42000:','')";

IN[48] = "('Manipur','MN:42100:','')";

IN[49] = "('Madhya Pradesh - Bhopal','MP:42210:Bhopal:','')";

IN[50] = "('Madhya Pradesh - Indore','MP:42220:Indore:','')";

IN[51] = "('Madhya Pradesh - Other cities','MP:42299:','')";

IN[52] = "('Nagaland','NA:42300:','')";

IN[53] = "('Orissa - Bhubaneshwar','OR:42410:Bhubaneshwar:','')";

IN[54] = "('Orissa - Other cities','OR:42499:','')";

IN[55] = "('Pondicherry','PO:42500:','')";

IN[56] = "('Punjab - Jalandhar','PU:42610:Jalandhar:','')";

IN[57] = "('Punjab - Ludhiana','PU:42620:Ludhiana:','')";

IN[58] = "('Punjab - Other cities','PU:42699:','')";

IN[59] = "('Rajasthan - Jaipur','RA:42710:Jaipur:','')";

IN[60] = "('Rajasthan - Kota','RA:42720:Kota:','')";

IN[61] = "('Rajasthan - Other cities','RA:42799:','')";

IN[62] = "('Sikkim','SI:42800:','')";

IN[63] = "('Tamil Nadu - Chennai','TN:42910:Chennai:','')";

IN[64] = "('Tamil Nadu - Coimbatore','TN:42920:Coimbatore:','')";

IN[65] = "('Tamil Nadu - Madurai','TN:42930:Madurai:','')";

IN[66] = "('Tamil Nadu - Trichy','TN:42940:Trichy:','')";

IN[67] = "('Tamil Nadu - Salem','TN:42950:Salem:','')";

IN[68] = "('Tamil Nadu - Hosur','TN:42960:Hosur:','')";

IN[69] = "('Tamil Nadu - Other cities','TN:42999:','')";

IN[70] = "('Tripura','TR:43000:','')";

IN[71] = "('Uttaranchal','UT:43600:','')";

IN[72] = "('Uttar Pradesh - Lucknow','UP:43110:Lucknow:','')";

IN[73] = "('Uttar Pradesh - Kanpur','UP:43120:Kanpur:','')";

IN[74] = "('Uttar Pradesh - Other cities','UP:43199:','')";

IN[75] = "('West Bengal - Kolkata','WB:43210:Kolkata:','')";

IN[76] = "('West Bengal - Other cities','WB:43299:','')";

var MY = new Array();

MY[0] = "('Select a State','00','')";

MY[1] = "('Johor','JH','')";

MY[2] = "('Kedah','KH','')";

MY[3] = "('Kuala Lumpur','KL','')";

MY[4] = "('Kelantan','KT','')";

MY[5] = "('Melaka','MK','')";

MY[6] = "('Negeri Sembilan','NS','')";

MY[7] = "('Penang','PG','')";

MY[8] = "('Pahang','PH','')";

MY[9] = "('Perak','PK','')";

MY[10] = "('Perlis','PS','')";

MY[11] = "('Sabah','SB','')";

MY[12] = "('Selangor','SL','')";

MY[13] = "('Sarawak','SW','')";

MY[14] = "('Terengganu','TG','')";

MY[15] = "('Labuan','LB','')";

var PH = new Array();

PH[0] = "('Select a State','00','')";

PH[1] = "('Armm','AR','')";

PH[2] = "('Bicol Region','BR','')";

PH[3] = "('C.A.R','CA','')";

PH[4] = "('Cagayan Valley','CG','')";

PH[5] = "('Central Luzon','CL','')";

PH[6] = "('Central Mindanao','CM','')";

PH[7] = "('Caraga','CR','')";

PH[8] = "('Central Visayas','CV','')";

PH[9] = "('Eastern Visayas','EV','')";

PH[10] = "('Ilocos Region','IL','')";

PH[11] = "('National Capital Reg','NC','')";

PH[12] = "('Northern Mindanao','NM','')";

PH[13] = "('Southern Mindanao','SM','')";

PH[14] = "('Southern Tagalog','ST','')";

PH[15] = "('Western Mindanao','WM','')";

PH[16] = "('Western Visayas','WV','')";

var SG = new Array();

SG[0] = "('Singapore','SG','')";

var TH = new Array();

TH[0] = "('Select a State','00','')";

TH[1] = "('North','TA','')";

TH[2] = "('North Eastern','TB','')";

TH[3] = "('Central','TC','')";

TH[4] = "('Eastern','TD','')";

TH[5] = "('South','TE','')";

var VN = new Array();

VN[0] = "('Select a City','00','')";

VN[1] = "('An Giang','VN:110101:An Giang:','')";

VN[2] = "('Ba Ria-Vung Tau','VN:110102:Ba Ria-Vung Tau:','')";

VN[3] = "('Bac Can','VN:110103:Bac Can:','')";

VN[4] = "('Bac Giang','VN:110104:Bac Giang:','')";

VN[5] = "('Bac Lieu','VN:110105:Bac Lieu:','')";

VN[6] = "('Bac Ninh','VN:110106:Bac Ninh:','')";

VN[7] = "('Ben Tre','VN:110107:Ben Tre:','')";

VN[8] = "('Binh Dinh','VN:110108:Binh Dinh:','')";

VN[9] = "('Binh Duong','VN:110109:Binh Duong:','')";

VN[10] = "('Binh Phuoc','VN:110110:Binh Phuoc:','')";

VN[11] = "('Binh Thuan','VN:110111:Binh Thuan:','')";

VN[12] = "('Ca Mau','VN:110112:Ca Mau:','')";

VN[13] = "('Can Tho','VN:110113:Can Tho:','')";

VN[14] = "('Cao Bang','VN:110114:Cao Bang:','')";

VN[15] = "('Da Nang','VN:110115:Da Nang:','')";

VN[16] = "('Dac Lac','VN:110116:Dac Lac:','')";

VN[17] = "('Dong Nai','VN:110117:Dong Nai:','')";

VN[18] = "('Dong Thap','VN:110118:Dong Thap:','')";

VN[19] = "('Gia Lai','VN:110119:Gia Lai:','')";

VN[20] = "('Ha Giang','VN:110120:Ha Giang:','')";

VN[21] = "('Ha Nam','VN:110121:Ha Nam:','')";

VN[22] = "('Ha Noi','VN:110122:Ha Noi:','')";

VN[23] = "('Ha Tay','VN:110123:Ha Tay:','')";

VN[24] = "('Ha Tinh','VN:110124:Ha Tinh:','')";

VN[25] = "('Hai Duong','VN:110125:Hai Duong:','')";

VN[26] = "('Haiphong','VN:110126:Haiphong:','')";

VN[27] = "('Ho Chi Minh','VN:110127:Ho Chi Minh:','')";

VN[28] = "('Hoa Binh','VN:110128:Hoa Binh:','')";

VN[29] = "('Hung Yen','VN:110129:Hung Yen:','')";

VN[30] = "('Khanh Hoa','VN:110130:Khanh Hoa:','')";

VN[31] = "('Kien Giang','VN:110131:Kien Giang:','')";

VN[32] = "('Kon Tum','VN:110132:Kon Tum:','')";

VN[33] = "('Lai Chau','VN:110133:Lai Chau:','')";

VN[34] = "('Lam Dong','VN:110134:Lam Dong:','')";

VN[35] = "('Lang Son','VN:110135:Lang Son:','')";

VN[36] = "('Lao Cai','VN:110136:Lao Cai:','')";

VN[37] = "('Long An','VN:110137:Long An:','')";

VN[38] = "('Nam Dinh','VN:110138:Nam Dinh:','')";

VN[39] = "('Nghe An','VN:110139:Nghe An:','')";

VN[40] = "('Ninh Binh','VN:110140:Ninh Binh:','')";

VN[41] = "('Ninh Thuan','VN:110141:Ninh Thuan:','')";

VN[42] = "('Phu Tho','VN:110142:Phu Tho:','')";

VN[43] = "('Phu Yen','VN:110143:Phu Yen:','')";

VN[44] = "('Quang Binh','VN:110144:Quang Binh:','')";

VN[45] = "('Quang Nam','VN:110145:Quang Nam:','')";

VN[46] = "('Quang Ngai','VN:110146:Quang Ngai:','')";

VN[47] = "('Quang Ninh','VN:110147:Quang Ninh:','')";

VN[48] = "('Quang Tri','VN:110148:Quang Tri:','')";

VN[49] = "('Soc Trang','VN:110149:Soc Trang:','')";

VN[50] = "('Son La','VN:110150:Son La:','')";

VN[51] = "('Tay Ninh','VN:110151:Tay Ninh:','')";

VN[52] = "('Thai Binh','VN:110152:Thai Binh:','')";

VN[53] = "('Thai Nguyen','VN:110153:Thai Nguyen:','')";

VN[54] = "('Thanh Hoa','VN:110154:Thanh Hoa:','')";

VN[55] = "('Thua Thien-Hue','VN:110155:Thua Thien-Hue:','')";

VN[56] = "('Tien Giang','VN:110156:Tien Giang:','')";

VN[57] = "('Tra Vinh','VN:110157:Tra Vinh:','')";

VN[58] = "('Tuyen Quang','VN:110158:Tuyen Quang:','')";

VN[59] = "('Vinh Long','VN:110159:Vinh Long:','')";

VN[60] = "('Vinh Phuc','VN:110160:Vinh Phuc:','')";

VN[61] = "('Yen Bai','VN:110161:Yen Bai:','')";

VN[62] = "('Others','VN:110199:','')";

var strArrayList = ",AU,BD,HK,ID,IN,MY,PH,SG,TH,VN";function emptyLocationSelect(objOtherState, strCountry, objStateSelect, objCitySelect, objLocationSelect){ 

var NS4 = (document.layers) ? true : false; 

var temp = "";  

		if(!NS4){ 	objStateSelect.style.visibility = 'hidden'; } 

		if(strArrayList.indexOf(strCountry) > 0){ 

			while(objStateSelect.options.length > eval(strCountry + ".length")){  

				objStateSelect.options[(objStateSelect.options.length-1)] = null;  

			}  

		objOtherState.disabled = true;  

		objOtherState.value = '';  

		for(i=0;i<eval(strCountry + ".length");i++){  

			temp = eval(strCountry + "[i]");	 

				if(!NS4){  

					objOtherState.size = 10  

					objOtherState.style.visibility = 'hidden';  

					objStateSelect.style.visibility = 'visible';  

				}  

				else{  

					objOtherState.disabled = true;  

				}  

				eval("objStateSelect.options[i] = new Option" + temp);  

		}  

	}else{  

		while(objStateSelect.options.length > 1){  

			objStateSelect.options[(objStateSelect.options.length-1)] = null;  

		}  

		if(!NS4){  

			objStateSelect.options[0] = new Option("","00");  

			objStateSelect.style.visibility = 'hidden';  

			objOtherState.style.visibility = 'visible';  

			objOtherState.size = 20  

			objOtherState.disabled = false; 

		}else{	  

			objStateSelect.options[0] = new Option(Others,"00");  

			objOtherState.disabled = false;  

		}  

	}  

	objStateSelect.selectedIndex = 0;  

	

}  

function enterCity(ld,  objCitySelect, objLocationSelect, cls){  

	var id = ld.split(":") ; 

	objLocationSelect.value = "";

	if(id[1] != null && id[1].length > 0){ 

		objLocationSelect.value = id[1]; 

			if(id[2] != null && id[2].length > 0 ){ 

				objCitySelect.value = ""; 

				objCitySelect.value = id[2]; 

		} else{  

			if(cls == true) { 

				objCitySelect.value = ""; 

			} 

		} 

	}else{ 

	   if(cls == true) { 

		objCitySelect.value = ""; 

	   } 

	} 

} 

 function repopulateLocation(objMsiaState, data, startindex, endindex) {  

	for(var i =0 ; i< objMsiaState.options.length; i++)  

	{		

		var tempVar =  data;  

		if(objMsiaState.options[i].value == tempVar 

		||  (objMsiaState.options[i].value.substring(startindex, endindex) == tempVar.substring(startindex, endindex))) 

		{ 

			objMsiaState.selectedIndex = i; 

			break; 

		} 

	} 

   return i;  

} 

function populateDuplicateLocation(objMsiaState, data, strmsia, strloc, strcity){   

	for(var i =0 ; i< objMsiaState.options.length; i++){  

 		if(objMsiaState.options[i].value == data){  

			objMsiaState.selectedIndex = i;  

			break; 

		}else{ 

			var tmpst =  strmsia; 

			var tmplc =  strloc; 

			var tmpct =  strcity;	 

				var d = objMsiaState.options[i].value.split(":"); 

			if(d[0] == tmpst && d[1] == tmplc){ 

				var c = d[2].toLowerCase(); 

				var tmpct = tmpct.toLowerCase(); 

				if ( c.indexOf(tmpct) >= 0 || tmpct.indexOf(c) >= 0 ){ 

					objMsiaState.selectedIndex = i; 

						break; 

				} 

			} 

		} 

   }  

   return i;  

}  

function populateOtherLocation(objMsiaState, objCity, objLocation, strmsia, strcity){ 

  for(var i =0 ; i< objMsiaState.options.length; i++){ 

	var tmpst = strmsia; 

	var tmpct =  strcity;	 

				var d = objMsiaState.options[i].value.split(":"); 

			if(d[0] == tmpst){ 

			   if(d[2] != null && d[2].length > 0 ){ 

				var c = d[2].toLowerCase();  

				var tmpct = tmpct.toLowerCase(); 

				if ( c.indexOf(tmpct) >= 0 || tmpct.indexOf(c) >= 0 ){ 

					objMsiaState.selectedIndex = i; 

					break; 

				} 

				} 

			}

		} 

	if(i <  objMsiaState.options.length){ 

		enterCity(objMsiaState.options[i].value, objCity, objLocation, false) 

   }  

   return i;  

  }  

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

      <td> <div align="left">

          <table border="0" cellspacing="0" cellpadding="0">

          <tr class="nav"> 

            <td width="51"><div align="center"> 

                <p class="nav"><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/tabgrn_home.jpg',1)"><img src="images/tablk_home.jpg" alt="" name="Image1" id="Image1" width="51" height="30" border="0"></a></p>

              </div></td>

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

        </div></td>

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

						<? if($mess!="") { ?>

<div style="background-color:#FFFFCC; text-align:center; margin-top:10px; height:50px; padding:5 5 5 5px; "><b>

<? if ($mess=="3") {echo "There's an  Error Please try again"; }?>

<? if ($mess=="4") { ?>

<img src="images/problem2.gif" alt="Error"><br>

The Email that you are trying to Register is already Exist. Please try register a different Email Address or you can try to Retrieve your Login Details 

<a href='#' class='link5' onClick= "javascript:popup_win('./forgotpassword.php?user=APPLICANT',500,330);">here</a>

<?

}

?>

</b></div>

<? }?>



						<table width=566 cellpadding=10 cellspacing=0 border=0 align="center" class="text01">

<tr><td>

<form method="POST" name="frmPersonal" action="personalphp.php"onsubmit="return checkFields();">

<table width=100% cellspacing=8 cellpadding=2 border=0 align=left >

<tr><td width=100% colspan=3 bgcolor=#DEE5EB class="text01"><b>Personal Details</b></td>

</tr>

<tr><td width=30% align=right class="text01">First Name :</td>

<td colspan=2 class="text01" >

<INPUT size='30' class='text' style="width:270px" name='fname' value=""></td></tr>

<tr><td width=30% align=right class="text01">Family/Last Name :</td>

<td colspan=2 class="text01" ><INPUT size="30" class=text style="width:270px" name="lname" value=""></td></tr>

<tr valign=top><td width=30% align=right class="text01" >Date of Birth :</td>

<td colspan=2 class="text01"><select name="bday" class="text">

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

<option value=11>11</option>

<option value=12>12</option>

<option value=13>13</option>

<option value=14>14</option>

<option value=15>15</option>

<option value=16>16</option>

<option value=17>17</option>

<option value=18>18</option>

<option value=19>19</option>

<option value=20>20</option>

<option value=21>21</option>

<option value=22>22</option>

<option value=23>23</option>

<option value=24>24</option>

<option value=25>25</option>

<option value=26>26</option>

<option value=27>27</option>

<option value=28>28</option>

<option value=29>29</option>

<option value=30>30</option>

<option value=31>31</option>

</select>

 - <select name="bmonth" class="text">

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

 </select>

- <input type="text" name="byear" size="4" maxlength=4 style='width=50px' value="2008"  class=text> (YYYY)</td></tr>



<tr valign=top><td width=30% align=right class="text01" >Identification :<br>

  (Optional) &nbsp;</td>

<td colspan=2 class="text01">

<select name="auth_no_type_id" style="font:8pt, Verdana">

<option value="0" selected>-</option>

<option value="IC No.">IC No.</option>

<option value="Social Card No.">Social Card No.</option>

<option value="Tax Card No.">Tax Card No.</option>

<option value="Driver's License No.">Driver's License No.</option>

<option value="Student Card No.">Student Card No.</option>

<option value="Passport No.">Passport No.</option>

<option value="Professional License No.">Professional License No.</option>

</select> 

- 

<INPUT maxLength=30 size=15 style='width=120px' class="text" name="msia_new_ic_no" value=''><br>&nbsp;&nbsp;

<img src='images/arrow.gif'><a href="#">which one should I use?</a></td></tr>

<tr valign=top><td width=30% align=right class="text01" >Gender :</td>

<td colspan=2 class="text01">

<INPUT type=radio value="Female" name="gender">Female &nbsp;&nbsp;

<INPUT type=radio value="Male" name="gender" >Male</td></tr>

<tr valign=top><td width=30% align=right class="text01" >Nationality :</td>

<td colspan=2 class="text01">

<select name="nationality" style="width:270px; font:8pt, Verdana" >

<option value="0">-</option>

<? echo $countryoptions;?>

</select>

</td></tr>

<tr valign=top>

<td width=30% align=right class="text01" >Permanent Resident&nbsp;&nbsp;<br>

  Status In :<br>(Optional)&nbsp;&nbsp;</td>

<td colspan=2 class="text01">

<table cellspacing=1 width=100% border=0 cellpadding=1 align=center>

  <tr valign=top><td class="text01"><input type="radio" name="permanent_residence" value="AU">Australia</td><td class="text01"><input type="radio" name="permanent_residence" value="CA">Canada</font></td><td class="text01"><input type="radio" name="permanent_residence" value="CN">China</font></td></tr><tr><td class="text01"><input type="radio" name="permanent_residence" value="HK">Hong Kong</font></td><td class="text01"><input type="radio" name="permanent_residence" value="IN">India</font></td><td class="text01"><input type="radio" name="permanent_residence" value="ID">Indonesia</font></td></tr><tr><td class="text01"><input type="radio" name="permanent_residence" value="JP">Japan</font></td><td class="text01"><input type="radio" name="permanent_residence" value="MY">Malaysia</font></td><td class="text01"><input type="radio" name="permanent_residence" value="NZ">New Zealand</font></td></tr><tr><td class="text01"><input type="radio" name="permanent_residence" value="PH" Checked>Philippines</font></td><td class="text01"><input type="radio" name="permanent_residence" value="SG">Singapore</font></td><td class="text01"><input type="radio" name="permanent_residence" value="TH">Thailand</font></td></tr><tr><td class="text01"><input type="radio" name="permanent_residence" value="GB">United Kingdom</font></td><td class="text01"><input type="radio" name="permanent_residence" value="US">United States</font></td></tr></table></td></tr></table>

<br clear=all><br>

<table width=100% cellspacing=8 cellpadding=2 border=0 align=left >



<tr><td width=100% colspan=3 bgcolor=#DEE5EB class="text01"><b>Login Details</b></td>

</tr>

<tr valign=top><td width=30% align=right class="text01" >Primary Email :</td>

<td class="text01"><INPUT maxLength=100 size=30 style='width:270px' class="text" name="email" value="" onChange="javascript: ValidateOneEmail(this);"></td></tr>

<tr valign=top><td width=30% align=right class="text01" >Password :</td>

<td class="text01"><INPUT maxLength=100 size=30 style='width:270px' class="text" name="pass" value="" ></td></tr>

<tr><td width=100% colspan=3 bgcolor=#DEE5EB class="text01"><b>Contact Info</b></td>

</tr>

<tr valign=top><td width=30% align=right class="text01" >Alternative Email :<br>

  (Optional)&nbsp;&nbsp;</td>

<td class="text01"><INPUT maxLength=100 size=30 style='width:270px' class="text" name="alt_email" value="" onChange=""><br>&nbsp;&nbsp;<img src='images/arrow.gif'><font class=tip>will be used if primary email is not reachable</font></td></tr><tr valign=top><td width=30% align=right class="text01" >Mobile No. :</td>

<td class="text01">

<SELECT name="handphone_country_code" style='font:8pt, Verdana; width:120px'>

<option value=""></option>

<option value="880">88 (Bangladesh)</option>

<option value="91">91 (India)</option>

<option value="62">62 (Indonesia)</option>

<option value="60">60 (Malaysia)</option>

<option value="63" selected >63 (Philippines)</option>

<option value="65">65 (Singapore)</option>

<option value="0">Other</option></SELECT>

- <INPUT maxLength=15 size=15 style='width:136px' class="text" name="handphone_no" value="">

</td></tr>

<tr valign=top><td width=30% align=right class="text01" >Telephone No. :</td>

<td class="text01"><INPUT maxLength=5 size=5 style='width:60px' class="text" name="tel_area_code" value=""> 

- <INPUT maxLength=20 size=22 style='width:196px' class=text name="tel_no" value=""><br>

<font class=tip>Area Code - Number</font></td></tr>

<tr valign=top><td align=right width=30% valign=top >Address 1:</td><td>

<textarea  rows="3"  style='width:270px' class="text" name="address1" id="address1"></textarea></td></tr>



<tr valign=top><td align=right width=30% valign=top >Address 2:</td><td><textarea  rows="3"  style='width:270px' class="text" name="address2" id="address2"></textarea></td></tr>

<tr valign=top><td width=30% align=right class="text01" >Postal Code :</td>

<td class="text01"><INPUT maxLength=20 size=30 style='width:270px' class="text" name="postcode" value=""></td></tr>

<tr valign=top><td width=30% align=right class="text01" >Country :</td>

<td class="text01"><select name="country_id" onChange="javascript: emptyLocationSelect(this.form.state, this.options[this.selectedIndex].value,this.form.msia_state_id,this.form.city, this.form.location_code) ;" style="width:270px;font:8pt, Verdana"><option value="00">-</option>

<option value="AF">Afghanistan</option>

<option value="AL">Albania</option>

<option value="DZ">Algeria</option>

<option value="AS">American Samoa</option>

<option value="AD">Andorra</option>

<option value="AO">Angola</option>

<option value="AI">Anguilla</option>

<option value="AQ">Antarctica</option>

<option value="AG">Antigua and Barbuda</option>

<option value="AR">Argentina</option>

<option value="AM">Armenia</option>

<option value="AW">Aruba</option>

<option value="AU">Australia</option>

<option value="AT">Austria</option>

<option value="AZ">Azerbaijan</option>

<option value="BS">Bahamas</option>

<option value="BH">Bahrain</option>

<option value="BD">Bangladesh</option>

<option value="BB">Barbados</option>

<option value="BY">Belarus</option>

<option value="BE">Belgium</option>

<option value="BZ">Belize</option>

<option value="BJ">Benin</option>

<option value="BM">Bermuda</option>

<option value="BT">Bhutan</option>

<option value="BO">Bolivia</option>

<option value="BA">Bosnia Hercegovina</option>

<option value="BW">Botswana</option>

<option value="BV">Bouvet Island</option>

<option value="BR">Brazil</option>

<option value="IO">British Indian Ocean Territory</option>

<option value="BN">Brunei Darussalam</option>

<option value="BG">Bulgaria</option>

<option value="BF">Burkina Faso</option>

<option value="BI">Burundi</option>

<option value="KH">Cambodia</option>

<option value="CM">Cameroon</option>

<option value="CA">Canada</option>

<option value="CV">Cape Verde</option>

<option value="KY">Cayman Islands</option>

<option value="CF">Central African Republic</option>

<option value="TD">Chad</option>

<option value="CL">Chile</option>

<option value="CN">China</option>

<option value="CX">Christmas Island</option>

<option value="CC">Cocos (Keeling) Islands</option>

<option value="CO">Colombia</option>

<option value="KM">Comoros</option>

<option value="CG">Congo</option>

<option value="CK">Cook Islands</option>

<option value="CR">Costa Rica</option>

<option value="CI">Cote D'ivoire</option>

<option value="HR">Croatia</option>

<option value="CU">Cuba</option>

<option value="CY">Cyprus</option>

<option value="CZ">Czech Republic</option>

<option value="DK">Denmark</option>

<option value="DJ">Djibouti</option>

<option value="DM">Dominica</option>

<option value="DO">Dominican Republic</option>

<option value="TP">East Timor</option>

<option value="EC">Ecuador</option>

<option value="EG">Egypt</option>

<option value="SV">EL Salvador</option>

<option value="GQ">Equatorial Guinea</option>

<option value="ER">Eritrea</option>

<option value="EE">Estonia</option>

<option value="ET">Ethiopia</option>

<option value="FK">Falkland Islands (Malvinas)</option>

<option value="FO">Faroe Islands</option>

<option value="FJ">Fiji</option>

<option value="FI">Finland</option>

<option value="FR">France</option>

<option value="GF">French Guiana</option>

<option value="PF">French Polynesia</option>

<option value="TF">French Southern Territories</option>

<option value="GA">Gabon</option>

<option value="GM">Gambia</option>

<option value="GE">Georgia</option>

<option value="DE">Germany</option>

<option value="GH">Ghana</option>

<option value="GI">Gibraltar</option>

<option value="GR">Greece</option>

<option value="GL">Greenland</option>

<option value="GD">Grenada</option>

<option value="GP">Guadeloupe</option>

<option value="GU">Guam</option>

<option value="GT">Guatemala</option>

<option value="GN">Guinea</option>

<option value="GW">Guinea-Bissau</option>

<option value="GY">Guyana</option>

<option value="HT">Haiti</option>

<option value="HM">Heard and Mc Donald Islands</option>

<option value="HN">Honduras</option>

<option value="HK">Hong Kong</option>

<option value="HU">Hungary</option>

<option value="IS">Iceland</option>

<option value="IN">India</option>

<option value="ID">Indonesia</option>

<option value="IR">Iran</option>

<option value="IQ">Iraq</option>

<option value="IE">Ireland</option>

<option value="IL">Israel</option>

<option value="IT">Italy</option>

<option value="JM">Jamaica</option>

<option value="JP">Japan</option>

<option value="JO">Jordan</option>

<option value="KZ">Kazakhstan</option>

<option value="KE">Kenya</option>

<option value="KI">Kiribati</option>

<option value="KP">Korea (North)</option>

<option value="KR">Korea (South)</option>

<option value="KW">Kuwait</option>

<option value="KG">Kyrgyzstan</option>

<option value="LA">Laos</option>

<option value="LV">Latvia</option>

<option value="LB">Lebanon</option>

<option value="LS">Lesotho</option>

<option value="LR">Liberia</option>

<option value="LY">Libyan Arab Jamahiriya</option>

<option value="LI">Liechtenstein</option>

<option value="LT">Lithuania</option>

<option value="LU">Luxembourg</option>

<option value="MO">Macau</option>

<option value="MK">Macedonia</option>

<option value="MG">Madagascar</option>

<option value="MW">Malawi</option>

<option value="MY">Malaysia</option>

<option value="MV">Maldives</option>

<option value="ML">Mali</option>

<option value="MT">Malta</option>

<option value="MH">Marshall Islands</option>

<option value="MQ">Martinique</option>

<option value="MR">Mauritania</option>

<option value="MU">Mauritius</option>

<option value="YT">Mayotte</option>

<option value="MX">Mexico</option>

<option value="FM">Micronesia</option>

<option value="MC">Monaco</option>

<option value="MN">Mongolia</option>

<option value="MS">Montserrat</option>

<option value="MA">Morocco</option>

<option value="MZ">Mozambique</option>

<option value="MM">Myanmar</option>

<option value="NA">Nambia</option>

<option value="NR">Nauru</option>

<option value="NP">Nepal</option>

<option value="NL">Netherlands</option>

<option value="AN">Netherlands Antilles</option>

<option value="NC">New Caledonia</option>

<option value="NZ">New Zealand</option>

<option value="NI">Nicaragua</option>

<option value="NE">Niger</option>

<option value="NG">Nigeria</option>

<option value="NU">Niue</option>

<option value="NF">Norfolk Island</option>

<option value="MP">Northern Mariana Islands</option>

<option value="NO">Norway</option>

<option value="OM">Oman</option>

<option value="OT">Others</option>

<option value="PK">Pakistan</option>

<option value="PW">Palau</option>

<option value="PS">Palestinian Territory, Occupied</option>

<option value="PA">Panama</option>

<option value="PG">Papua New Guinea</option>

<option value="PY">Paraguay</option>

<option value="PE">Peru</option>

<option value="PH" >Philippines</option>

<option value="PN">Pitcairn</option>

<option value="PL">Poland</option>

<option value="PT">Portugal</option>

<option value="PR">Puerto Rico</option>

<option value="QA">Qatar</option>

<option value="MD">Republic Of Moldova</option>

<option value="RE">Reunion</option>

<option value="RO">Romania</option>

<option value="RU">Russia</option>

<option value="RW">Rwanda</option>

<option value="KN">Saint Kitts And Nevis</option>

<option value="LC">Saint Lucia</option>

<option value="VC">Saint Vincent and The Grenadines</option>

<option value="WS">Samoa</option>

<option value="SM">San Marino</option>

<option value="ST">Sao Tome and Principe</option>

<option value="SA">Saudi Arabia</option>

<option value="SN">Senegal</option>

<option value="SC">Seychelles</option>

<option value="SL">Sierra Leone</option>

<option value="SG">Singapore</option>

<option value="SK">Slovakia</option>

<option value="SI">Slovenia</option>

<option value="SB">Solomon Islands</option>

<option value="SO">Somalia</option>

<option value="ZA">South Africa</option>

<option value="GS">South Georgia And South Sandwich Islands</option>

<option value="ES">Spain</option>

<option value="LK">Sri Lanka</option>

<option value="SH">St. Helena</option>

<option value="PM">St. Pierre and Miquelon</option>

<option value="SD">Sudan</option>

<option value="SR">Suriname</option>

<option value="SJ">Svalbard and Jan Mayen Islands</option>

<option value="SZ">Swaziland</option>

<option value="SE">Sweden</option>

<option value="CH">Switzerland</option>

<option value="SY">Syrian Arab Republic</option>

<option value="TW">Taiwan</option>

<option value="TJ">Tajikistan</option>

<option value="TZ">Tanzania</option>

<option value="TH">Thailand</option>

<option value="TG">TOGO</option>

<option value="TK">Tokelau</option>

<option value="TO">Tonga</option>

<option value="TT">Trinidad and Tobago</option>

<option value="TN">Tunisia</option>

<option value="TR">Turkey</option>

<option value="TM">Turkmenistan</option>

<option value="TC">Turks and Caicos Islands</option>

<option value="TV">Tuvalu</option>

<option value="UG">Uganda</option>

<option value="UA">Ukraine</option>

<option value="AE">United Arab Emirates</option>

<option value="GB">United Kingdom</option>

<option value="US">United States</option>

<option value="UM">United States Minor Outlying Islands</option>

<option value="UY">Uruguay</option>

<option value="UZ">Uzbekistan</option>

<option value="VU">Vanuatu</option>

<option value="VA">Vatican City State (Holy See)</option>

<option value="VE">Venezuela</option>

<option value="VN">Vietnam</option>

<option value="VG">Virgin Islands (British)</option>

<option value="VI">Virgin Islands (U.S.)</option>

<option value="WF">Wallis and Futuna Islands</option>

<option value="EH">Western Sahara</option>

<option value="YE">Yemen</option>

<option value="YU">Yugoslavia</option>

<option value="CD">Zaire</option>

<option value="ZM">Zambia</option>

<option value="ZW">Zimbabwe</option>

</select></td></tr><tr><td width=30% align=right class="text01" >State/Region :</td>

<td class="text01"><select name="msia_state_id" value="NC" onChange="return enterCity(form.msia_state_id.options[form.msia_state_id.options.selectedIndex].value, this.form.city, this.form.location_code, true);" style="width:270px;font:8pt verdana"><OPTION value="00">Select State/Region &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION><OPTION value="00">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION></select> <br><INPUT maxLength=20 size=30 style='width:270px' class="text" name="state" value="" ><input type=hidden name="state2" value=""></td></tr><tr valign=top><td width=30% align=right class="text01" >City :</td>

<td class="text01"><input type=hidden name=location_code value=""><INPUT maxLength=20 size=30 style='width:270px' class="text" name="city" value=""></td></tr>

<tr>

  <td width=100% colspan=3 bgcolor=#DEE5EB class="text01"><b>Working at Home Capabilities</b></td>

</tr>

<tr valign=top><td width=30% align=right class="text01" >Home Working Environment :</td>

<td class="text01"><input type="radio" name="home_working_environment" value="private room" >Private Room&nbsp;<input type="radio" name="home_working_environment" value="shared room">Shared Room&nbsp;<input type="radio" name="home_working_environment" value="living room">Living Room&nbsp;</td></tr>

<tr valign=top><td width=30% align=right class="text01" >Internet Connection :</td>

<td class="text01"><input type="radio" name="internet_connection" value="WI-FI">WI-FI&nbsp;<input type="radio" name="internet_connection" value="DIAL-UP">Dial-Up&nbsp;<input type="radio" name="internet_connection" value="DSL">DSL&nbsp;</td></tr>

<tr valign=top><td width=30% align=right class="text01" >Internet Provider (ISP) :</td>

<td class="text01"><INPUT size=30 style='width:270px' class="text" name="isp" value=""></td></tr>

<tr valign=top><td width=30% align=right class="text01" >List of Computer Harwdare:</td>

<td class="text01"><textarea name="computer_hardware" cols="30" rows="5"></textarea></td></tr>

<tr valign=top><td width=30% align=right class="text01" >Headset Quality :</td>

<td class="text01"><select name="headset_quality" class="text">

<option value=0>No Headset</option>

<option value=1>1</option>

<option value=2>2</option>

<option value=3>3</option>

<option value=4>4</option>

<option value=5>5</option>

</select>&nbsp;1 LOW...5 High&nbsp;&nbsp;</td></tr>













</table><br clear=all><table width=100% cellspacing=8 cellpadding=2 border=0 align=left ><tr><td width=100% bgcolor=#DEE5EB colspan=3><b class="text01">&nbsp;Online Contact Info (OPTIONAL)</a></b></td>

</tr><tr><td><div id='internet_acc' class='toggleshow'><table width='100%' cellpadding=2 cellspacing=4 border=0>

            <tr valign=top><td colspan=2 align=left class="text01"><a name='ia'>Fill in your Instant Messaging (IM) Usernames here to provide us with an alternative way to contact you. <font color=red><b>Note: This section is fully optional.</b></font></a><br>

  <br></td></tr><tr valign=top><td width=30% align=right class="text01" >MSN Messenger ID :</td>

  <td class="text01"><INPUT maxLength=80 size=30 style='width:200px' class=text name="msn_id" value=""></td></tr><tr valign=top><td width=30% align=right class="text01" >Yahoo! Messenger ID :</td>

  <td class="text01"><INPUT maxLength=80 size=30 style='width:200px' class="text" name="yahoo_id" value=""></td></tr><tr valign=top><td width=30% align=right class="text01" >ICQ Number :</td>

  <td class="text01"><INPUT maxLength=80 size=30 style='width:200px' class=text name="icq_id" value=""></td></tr><tr valign=top><td width=30% height="57" align=right class="text01" >Skype ID :</td>

<td class="text01"><INPUT maxLength=80 size=30 style='width:200px' class="text" name="skype_id" value=""></td></tr><tr><td colspan=2>

<p> <div align="center" class="table">

                       	     <input type="text" value="<?php if (!empty($pass)) { echo $pass; }?>" name="pass2"  size="5" maxlength="5">

                       	     <?php  $rv = $passGen->password(0, 1); ?>

                       	     <input type="hidden" value="<?php  echo $rv ?>" name="rv">

                       	     <?php  echo $passGen->images('font', 'gif', 'f_', '20', '20'); ?><br />

                     	     for validation, please type the numbers that you see <br />

<br />

<? if ($mess==2) { echo "<span class='style1' style='background-color:#FFFFCC'><b>Please type the Correct Code!</span></font>"; }?>

</div></p>







</td></tr></table></div></td></tr></table><br clear=all>

<br>

<table width=100% border=0 cellspacing=1 cellpadding=2><tr><td align=center><INPUT type=submit value='Save & Next' name="send" class="button" style='width:120px'></td></tr></table></form></td></tr></table>

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

  <table width="784" border="0" cellpadding="0" cellspacing="0" background="images/bgbody.gif" align="center">

  <tr>

  	<td>

		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">

  		<tr> 

    		<td class="side" style="width: 740px; border-top: 1px dotted #9DBF7B; border-bottom: 1px dotted #9DBF7B; padding-left:10px; padding-right:10px;"><div align="center"><p class="text02">Tag Clouds</p></div></td>

  		</tr>

  		<tr><td>&nbsp;</td></tr>

  		<tr>

  			<td align="center">

<!-- Added by Joanna Cortez -->

<div align="center" style="width: 740px;  _height: 300px; min-height: 300px; background-color: #FAFCEE; border: 1px solid #D8E899; line-height: 22px; text-align: left;  ; font-family: 'Arial', Helvetica;">

<div style="padding: 10px; padding-top: 10px;">

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">online work employment</a>

  <a href='http://#' style="font-size: 18px; color: #33CCFF; text-decoration: none;">online job opening</a>

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">hiring vacancies</a>

  <a href='http://#' style="font-size: 15px; color: #33CCFF; text-decoration: none;">hiring employment</a>

  <a href='http://#' style="font-size: 16px; color: #95B308; text-decoration: none;">online job vacancies</a>

  <a href='http://#' style="font-size: 22px; color: #33CCFF; text-decoration: none;">job hiring</a>

  <a href='http://#' style="font-size: 21px; color: #95B308; text-decoration: none;">online job hiring</a>

  <a href='http://#' style="font-size: 17px; color: #AAC59C; text-decoration: none;">job vacancies</a>

  <a href='http://#' style="font-size: 19px; color: #33CCFF; text-decoration: none;">job opening</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">job employment</a>

  <a href='http://#' style="font-size: 24px; color: #AAC59C; text-decoration: none;">remote staff</a>

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">online job employment</a>

  <a href='http://#' style="font-size: 15px; color: #AAC59C; text-decoration: none;">work employment</a>

  <a href='http://#' style="font-size: 23px; color: #95B308; text-decoration: none;">online job</a>

  <a href='http://#' style="font-size: 20px; color: #33CCFF; text-decoration: none;">remote staff hiring</a>

  <a href='http://#' style="font-size: 19px; color: #AAC59C; text-decoration: none;">online work</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">remote hiring</a>

  <a href='http://#' style="font-size: 15px; color: #AAC59C; text-decoration: none;">staff job opening</a>

  <a href='http://#' style="font-size: 16px; color: #95B308; text-decoration: none;">remote staff vacancies</a>

  <a href='http://#' style="font-size: 18px; color: #AAC59C; text-decoration: none;">remote staff job hiring</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">remote staff employment</a>

  <a href='http://#' style="font-size: 21px; color: #33CCFF; text-decoration: none;">online job work</a>

  <a href='http://#' style="font-size: 22px; color: #AAC59C; text-decoration: none;">online hiring</a>

  <a href='http://#' style="font-size: 15px; color: #33CCFF; text-decoration: none;">remote work employment</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">remote job opening</a>

  <a href='http://#' style="font-size: 23px; color: #33CCFF; text-decoration: none;">hiring work employment</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">remote vacancies</a>

  <a href='http://#' style="font-size: 24px; color: #95B308; text-decoration: none;">hiring work</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">staff hiring</a>

  <a href='http://#' style="font-size: 17px; color: #AAC59C; text-decoration: none;">remote staff job opening</a>

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">remote employment</a>

  <a href='http://#' style="font-size: 15px; color: #AAC59C; text-decoration: none;">staff job hiring</a>

  <a href='http://#' style="font-size: 20px; color: #95B308; text-decoration: none;">online employment</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">remote staff work employment</a>

  <a href='http://#' style="font-size: 15px; color: #33CCFF; text-decoration: none;">remote job hiring</a>

  <a href='http://#' style="font-size: 21px; color: #33CCFF; text-decoration: none;">easy online job application</a>

  <a href='http://#' style="font-size: 15px; color: #AAC59C; text-decoration: none;">global work</a>

  <a href='http://#' style="font-size: 17px; color: #66CCCC; text-decoration: none;">job application</a>

  <a href='http://#' style="font-size: 15px; color: #33CCFF; text-decoration: none;">work team</a>

  <a href='http://#' style="font-size: 16px; color: #AAC59C; text-decoration: none;">online application</a>

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">work force team</a>

  <a href='http://#' style="font-size: 15px; color: #AAC59C; text-decoration: none;">job seekers</a>

  <a href='http://#' style="font-size: 20px; color: #66CCCC; text-decoration: none;">easy application</a>

  <a href='http://#' style="font-size: 15px; color: #AAC59C; text-decoration: none;">career choices</a>

  <a href='http://#' style="font-size: 23px; color: #AAC59C; text-decoration: none;">staff work employment</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">easy job application</a>

  <a href='http://#' style="font-size: 19px; color: #33CCFF; text-decoration: none;">easy job</a>

  <a href='http://#' style="font-size: 22px; color: #AAC59C; text-decoration: none;">remote staff employment</a>

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">global opportunities</a>

  <a href='http://#' style="font-size: 15px; color: #66CCCC; text-decoration: none;">global work force</a>

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">global work force team</a>

  <a href='http://#' style="font-size: 15px; color: #33CCFF; text-decoration: none;">global work team</a>

  <a href='http://#' style="font-size: 15px; color: #95B308; text-decoration: none;">apply now</a>

  <a href='http://#' style="font-size: 24px; color: #66CCCC; text-decoration: none;">staff vacancies</a>

  <a href='http://#' style="font-size: 18px; color: #AAC59C; text-decoration: none;">easy online job</a>

</div>

</div>

										</td>

  									</tr>

  									<tr><td>&nbsp;</td></tr>

									</table>

	</td>

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

