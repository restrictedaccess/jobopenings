// JavaScript Document
function SendInquiry(){
	var fullname = $('fullname').value;
	var email = $('email_address').value;
	var mobile = $('mobile').value;
	var question = $('question').value;
	
	var rv2 = $("rv2").value;
	var pass3 = $("pass3").value;
	
	emailReg = "^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[a-zA-Z]$"
	var regex = new RegExp(emailReg);
	
	
	if(fullname == ""){
		alert("Please enter your full name");
		return false;
	}
	
	if(email == ""){
		alert("Please enter your email address");
		return false;
	}
	
	if(regex.test(email) == false){
		alert('Please enter a valid email address and try again!');
		return false;
	}	
	
	if(mobile == ""){
		alert("Please enter a contact no.");
		return false;
	}
	
	if(question == ""){
		alert("There is no message to be send");
		return false;
	}
	
	if(pass3==""){
		alert("Please type the code that you see in the image");
		return false;
	}
	
	$('send_result').innerHTML="";
	$("send_btn").innerHTML = "<img src='images/ajax-loader.gif'> Processing...";
	var query = queryString({'fullname' : fullname , 'email' : email , 'mobile' : mobile , 'question' : question , 'rv2' : rv2, 'pass3' : pass3 });
	//alert(query);
	var result = doXHR('inquiry/SendInquiry.php', {method:'POST', sendContent: query, headers: {"Content-Type":"application/x-www-form-urlencoded"}});
	result.addCallbacks(OnSuccessSendInquiry, OnFailSendInquiry);
}

function OnSuccessSendInquiry(e){
	if((e.responseText) == '0'){
		alert("Code is not correct!");
		$('send_result').innerHTML= "Code is not correct!";
		$("send_btn").innerHTML ='<img src="images/btn-submit.png" style="cursor:pointer;" onclick="SendInquiry()"  />';
	}else if((e.responseText) == '01'){
		alert("Invalid Email Address");
		$('send_result').innerHTML= "Invalid Email Address!";
		$("send_btn").innerHTML ='<img src="images/btn-submit.png" style="cursor:pointer;" onclick="SendInquiry()"  />';
	}else{
		location.href="thankyou-inquiry.php";
		//alert("Thank You");
		//$('send_result').innerHTML=e.responseText;
		//$("send_btn").innerHTML ='<img src="images/btn-submit.png" style="cursor:pointer;" onclick="SendInquiry()"  />';
	}
}

function OnFailSendInquiry(e){
	alert("Failed to send inquiry");
}
