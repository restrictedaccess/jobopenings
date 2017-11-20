// override jquery validate plugin defaults
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
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

jQuery(document).ready(function(){
	jQuery("#email-validate-form").validate({
		rules:{
			email:{
				required:true,
				email:true
			}
		}, 
		submitHandler: function(form) {
			var data = jQuery(form).serialize();
			var url = base_url+"/portal/jobseeker_register/step1.php";
			
			jQuery.post(url, data, function(response){
				response = jQuery.parseJSON(response);
				if (response.success){
					jQuery("#email-existing").hide();
					jQuery("#email-sent").fadeIn(100);
					jQuery(".email_address_span").html(jQuery("#email_address").val())
				}else{
					jQuery("#email-sent").hide();
					jQuery("#email-existing").fadeIn(100);
				}
			})
			
			
			return false;
		}
	});
});
