// May 11,2010 Normaneil Macutay <normaneil.macutay@gmail.com>
// - used by page inc/home-right.php

var PATH = 'enquire/';


function getCheckBoxValue(obj){
	var element = document.getElementsByName(obj);
	var i;
	for(i=0;i<element.length;i++)
	{
		if(element[i].checked==true) {
			return element[i].value;
			break;
		}
	}
}

function saveEnquireDetails(){
	//alert("Hello world");	
	var ip = $("ip").value;
	var promotional_code = $("promotional_code").value;
	var rv = $("rv4").value;
	var pass2 = $("pass4").value;
	var email = $("cemail").value;
	
	
	var fname = $("cfname").value;
	var lname = $("clname").value;
	var office_number = $("coffice_number").value;
	var mobile = $("cmobile").value;
	var questions = $("cquestions").value;

	var top_200 = getCheckBoxValue('top_200');
	
	if(fname==""){
		alert("Please enter your First Name");
		return false;
	}
	if(lname==""){
		alert("Please enter your Last Name");
		return false;
	}
	if(office_number == "" && mobile == "" ){
		alert("Please specify your contact number");
		return false;
	}
	
	
	if(pass2==""){
		alert("Please type the code that you see in the image");
		return false;
	}
	
	$("add_btn").innerHTML = "<img src='images/ajax-loader.gif'> Processing...";
	
	var query = queryString({'ip' : ip , 'promotional_code' : promotional_code, 'rv' : rv, 'pass2' : pass2, 'email' : email , 'fname' : fname, 'lname' : lname, 'office_number' : office_number, 'mobile' : mobile, 'questions' : questions , 'top_200' : top_200});
	//alert(query);
	var result = doXHR(PATH + 'enquirephp.php', {method:'POST', sendContent: query, headers: {"Content-Type":"application/x-www-form-urlencoded"}});
	result.addCallbacks(OnSuccessSaveEnquireDetails, OnFailSaveEnquireDetails);
}

function OnSuccessSaveEnquireDetails(e){
	//alert(e.responseText);
	
	if((e.responseText) == '0'){
		alert("Code is not correct!");
		$("add_btn").innerHTML ='<img src="images/btn-submit.png"  border="0" style="cursor:pointer;" onclick="javascript:saveEnquireDetails();" />';
	}else if((e.responseText) == '01'){
		alert("Invalid Email Address");
		$("add_btn").innerHTML ='<img src="images/btn-submit.png"  border="0" style="cursor:pointer;" onclick="javascript:saveEnquireDetails();" />';
	}else if((e.responseText) == '02'){
		alert("Email Exist . Please try to enter different email address!");
		$("add_btn").innerHTML ='<img src="images/btn-submit.png"  border="0" style="cursor:pointer;" onclick="javascript:saveEnquireDetails();" />';
	}else{
		location.href="thankyou-inquiry.php";
		//alert(e.responseText);
		//$("add_btn").innerHTML ='<img src="images/btn-submit.png"  border="0" style="cursor:pointer;" onclick="javascript:saveEnquireDetails();" />';
	}
	
	
}

function OnFailSaveEnquireDetails(e){
	alert("Failed to add Enquire Form Details");
}