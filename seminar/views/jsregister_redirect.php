<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Seeker Redirection</title>

<script type="text/javascript" src="/portal/js/jquery.js"></script>

<link rel=stylesheet type=text/css href="/seminar/css/overlay.css">

<link rel="stylesheet" type="text/css" href="/seminar/css/styles_global.css" />
<script type="text/javascript">
<!--
$(document).ready(function() {
    $.ajax({
		type: "POST",
		url: "/register/RegisterApplicant.php",
		data: { 'staff_email': '<?php echo $email;?>', 'staff_fname' : '<?php echo $fname;?>',
            'staff_lname':'<?php echo $lname;?>', 'rv':'<?php echo $rv;?>', 'pass2':'<?php echo $pass2;?>'},
		dataType: "text",
		success: function(data){
            $.ajax({
                type: "POST",
                url: "/portal/application_form/register/SendCode.php",
                data: { 'email': '<?php echo $email;?>'},
                dataType: "text",
                success: function(data){
                    var urlform = '/portal/application_form/registernow-step1-personal-details.php';
                    location.href=urlform+"?<?php echo 'email='.$email.'&fname='.$fname.'&lname='.$lname;?>";	
        
                }, error: function(XMLHttpRequest, textStatus, errorThrown){
                    alert(textStatus + " (" + errorThrown + ")");
                }
            });

		}, error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus + " (" + errorThrown + ")");
		}
	});
    
    /*$.ajax({
		type: "POST",
		url: "/portal/register/SendCode.php",
		data: { 'email': '<?php echo $email;?>'},
		dataType: "json",
		success: function(data){
            

		}, error: function(XMLHttpRequest, textStatus, errorThrown){
			alert(textStatus + " (" + errorThrown + ")");
		}
	});*/
});
-->
</script>
</head>
<body>
    <p style='font-size:13px;'>Loading the JobSeeker form...</p>
</body>
</html>