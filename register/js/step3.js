$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
    	if (element.parent().hasClass("radio-inline")||element.parent().hasClass("checkbox-inline")||element.parent().hasClass("radio")||element.parent().hasClass("checkbox")){
    		error.appendTo(element.parent().parent());
    	}else{
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }    		
    	}

    }
});
jQuery(document).ready(function(){
	
	
	jQuery("#schedule-form").validate({
		rules:{
			day:{
				required:true
			},
			month:{
				required:true
			},
			time:{
				required:true
			},
			"interview_type[]":{
				required:true,
			}
			
		}, 
		submitHandler: function(form) {
			var data = jQuery(form).serialize();
			var url = base_url+"/portal/jobseeker_register/step3.php";
			
			jQuery.post(url, data, function(response){
				response = jQuery.parseJSON(response);
				if (response.success){
					window.location.href = base_url+"/portal/jobseeker/";
				}else{
					alert(response.error);
				}
			})
			
			
			return false;
		}
	});
	
	
	jQuery("#take_exam").on("click", function(e){
		popup_win7(base_url+"/skills_test/", 800, 600);
		e.preventDefault();
	})
	
	jQuery("#jobseeker_login").on("click", function(e){
		window.location.href = base_url+"/portal/jobseeker/";
		e.preventDefault();
	})
	
});
