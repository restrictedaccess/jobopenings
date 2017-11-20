// JavaScript Document
var PATH = 'register/';

function is_numeric(input){
	if(!isNaN(input)){
		return true;
	}
	else{
		return false;
	}
}

function RegisterApplicant(){
	//alert("Hello World");
	
	var staff_fname = $('staff_fname').value;
	var staff_lname = $('staff_lname').value;
	var staff_email = $('staff_email').value;
	
	var bmonth = $('bmonth').value;
	var bday = $('bday').value;
	var byear = $('byear').value;
	
	var identification = $('identification').value;
	var identification_number = $('identification_number').value;
	var gender = getGender();
	
	
	if(bmonth == 0 || bday == "" || byear == ""){
		alert("Please enter your Date of Birth");
		return false;
	}
	  
	if(!is_numeric(byear)){
		alert("Invalid birthyear");
		return false;
	}
  
  
	var nationality = $('nationality').value;
	var permanent_residence = $('permanent_residence').value;
	
	emailReg = "^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[a-zA-Z]$"
	var regex = new RegExp(emailReg);
	
	var rv = $("rv").value;
	var pass2 = $("pass2").value;
	//alert(gender);

	if(staff_fname == ""){
		alert("Please enter your first name");
		return false;
	}
	
	if(staff_lname == ""){
		alert("Please enter your last name");
		return false;
	}
	
	if(staff_email == ""){
		alert("Please enter your email address");
		return false;
	}
	
	if(regex.test(staff_email) == false){
		alert('Please enter a valid email address and try again!');
		return false;
	}	
	
	
	if(gender == ""){
		alert("Please choose your gender");
		return false;
	}
	
	if(pass2==""){
		alert("Please type the code that you see in the image");
		return false;
	}
	
	

	$('application_result').innerHTML= "";
	$("reg_btn").innerHTML = "<img src='images/ajax-loader.gif'> Processing...";
	
	var query = queryString({'staff_fname' : staff_fname , 'staff_lname' : staff_lname , 'staff_email' : staff_email , 'bmonth' : bmonth , 'bday' : bday , 'byear' : byear , 'identification' : identification , 'identification_number' : identification_number , 'gender' : gender , 'nationality' : nationality , 'permanent_residence' : permanent_residence , 'rv' : rv, 'pass2' : pass2 });
	
	//alert(query);
	var result = doXHR(PATH + 'RegisterApplicant.php', {method:'POST', sendContent: query, headers: {"Content-Type":"application/x-www-form-urlencoded"}});
	result.addCallbacks(OnSuccessRegisterApplicant, OnFailRegisterApplicant);

	
}

function OnSuccessRegisterApplicant(e){
	if((e.responseText) == '0'){
		$('application_result').innerHTML= "Code is not correct!";
		$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
	}else if((e.responseText) == '01'){
		$('application_result').innerHTML= "Invalid Email Address!";
		$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
	}else if((e.responseText) == '02'){
		$('application_result').innerHTML= "The email address you have entered is already registered with Remotestaff.<br> Should you wish to log in to your account, please click <a href='/portal/'>HERE</a>";
		$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
	}else{ 
	
	/*	var staff_fname = $('staff_fname').value; 
		var staff_lname = $('staff_lname').value;
		var staff_email = $('staff_email').value;
	
		var url="thankyou.php";
			url=url+"?email="+staff_email;
			url=url+"&fname="+staff_fname;
			url=url+"&lname="+staff_lname;
		location.href= url;	*/
		//alert("Thank You");
		//$('application_result').innerHTML=e.responseText;
		//$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
		document.register.submit()
	}
	
}
function OnFailRegisterApplicant(e){ 
	alert("Failed to process applicants registration");
}






function getGender(){
	var radio_bttn = document.getElementsByName('gender');
	var radio_bttn_value;
	var i;
	for(i=0;i<radio_bttn.length;i++)
	{
		if(radio_bttn[i].checked==true) {
			radio_bttn_value = radio_bttn[i].value;
			return radio_bttn_value;
			break;
		}
	}
}// JavaScript Document
var PATH = 'register/';

function is_numeric(input){
	if(!isNaN(input)){
		return true;
	}
	else{
		return false;
	}
}

function RegisterApplicant(){
	//alert("Hello World");
	
	var staff_fname = $('staff_fname').value;
	var staff_lname = $('staff_lname').value;
	var staff_email = $('staff_email').value;
	var staff_promo_code = $('staff_promo_code').value;
	var bmonth = $('bmonth').value;
	var bday = $('bday').value;
	var byear = $('byear').value;
	
	var identification = $('identification').value;
	var identification_number = $('identification_number').value;
	
	var gender = getGender();
	
	
	if(bmonth == 0 || bday == "" || byear == ""){
		alert("Please enter your Date of Birth");
		return false;
	}
	  
	if(!is_numeric(byear)){
		alert("Invalid birthyear");
		return false;
	}
  
  
	var nationality = $('nationality').value;
	var permanent_residence = $('permanent_residence').value;
	
	emailReg = "^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[a-zA-Z]$"
	var regex = new RegExp(emailReg);
	
	var rv = $("rv").value;
	var pass2 = $("pass2").value;
	//alert(gender);

	if(staff_fname == ""){
		alert("Please enter your first name");
		return false;
	}
	
	if(staff_lname == ""){
		alert("Please enter your last name");
		return false;
	}
	
	if(staff_email == ""){
		alert("Please enter your email address");
		return false;
	}
	
	if(regex.test(staff_email) == false){
		alert('Please enter a valid email address and try again!');
		return false;
	}	
	
	
	if(gender == ""){
		alert("Please choose your gender");
		return false;
	}
	
	if(pass2==""){
		alert("Please type the code that you see in the image");
		return false;
	}
	
	

	$('application_result').innerHTML= "";
	$("reg_btn").innerHTML = "<img src='images/ajax-loader.gif'> Processing...";
	
	var query = queryString({'staff_fname' : staff_fname , 'staff_lname' : staff_lname , 'staff_email' : staff_email , 'bmonth' : bmonth , 'bday' : bday , 'byear' : byear , 'identification' : identification , 'identification_number' : identification_number , 'gender' : gender , 'nationality' : nationality , 'permanent_residence' : permanent_residence , 'rv' : rv, 'pass2' : pass2 , 'promo_code':staff_promo_code});
	
	//alert(query);
	var result = doXHR(PATH + 'RegisterApplicant.php', {method:'POST', sendContent: query, headers: {"Content-Type":"application/x-www-form-urlencoded"}});
	result.addCallbacks(OnSuccessRegisterApplicant, OnFailRegisterApplicant);

	
}

function OnSuccessRegisterApplicant(e){
	if((e.responseText) == '0'){
		$('application_result').innerHTML= "Code is not correct!";
		$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
	}else if((e.responseText) == '01'){
		alert("Invalid Email Address");
		$('application_result').innerHTML= "Invalid Email Address!";
		$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
	}else if((e.responseText) == '02'){
		$('application_result').innerHTML= "The email address you have entered is already registered with Remotestaff.<br> Should you wish to log in to your account, please click <a href='/portal/'>HERE</a><br>";
		$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
	}else{
	
	/*	var staff_fname = $('staff_fname').value;
		var staff_lname = $('staff_lname').value;
		var staff_email = $('staff_email').value;  
	
		var url="thankyou.php";
			url=url+"?email="+staff_email;
			url=url+"&fname="+staff_fname;
			url=url+"&lname="+staff_lname;
		location.href= url;	*/
		//alert("Thank You");
		//$('application_result').innerHTML=e.responseText;
		//$("reg_btn").innerHTML ='<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />';
		document.register.submit()
	}
	
}
function OnFailRegisterApplicant(e){
	alert("Failed to process applicants registration");
}






function getGender(){
	var radio_bttn = document.getElementsByName('gender');
	var radio_bttn_value;
	var i;
	for(i=0;i<radio_bttn.length;i++)
	{
		if(radio_bttn[i].checked==true) {
			radio_bttn_value = radio_bttn[i].value;
			return radio_bttn_value;
			break;
		}
	}
}