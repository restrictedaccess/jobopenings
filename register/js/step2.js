var selected_industries = [];
var old_selected_industries = [];

$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.required-field').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.required-field').removeClass('has-error');
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

function autocomplete(){
	
	var skills = new Bloodhound({
	  datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.skill_name); },
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  remote: '/register/skill_search.php?name=%QUERY',
	});
	 
	skills.initialize();
	
	console.log(skills.ttAdapter());
	$(".skill-item").typeahead("destroy");
	$(".skill-item").typeahead({
	  minLength: 3,
	  highlight: true,
	},{
		 displayKey:"skill_name",
         source : skills.ttAdapter(),

     });
}
jQuery(document).ready(function(){
	var skill_item = jQuery("#skill-item").html();
	jQuery("#skill-list").html(skill_item);
	
	autocomplete();
	jQuery("#add-more-skill").on("click", function(e){
		var skill_item = jQuery("#skill-item-no-label").html();
		jQuery(skill_item).appendTo(jQuery("#skill-list"));
		
		autocomplete();
		
		e.preventDefault();
		e.stopPropagation();
	});
	jQuery("#previous-task-label").hide();
	jQuery(".position-choice").on("change", function(e){
		var me = jQuery(this);
		var value = me.val();
		jQuery.get("/register/get_task_list.php?sub_category_id="+value, function(response){
			response = jQuery.parseJSON(response);
			var src = jQuery("#task-item-template").html();
			var template = Handlebars.compile(src);
			var target = me.attr("data-target");
			
			if (response.result.length > 0){
				var output = "";
				output += "<p><strong>"+response.sub_category+"</strong></p>";
				response.ratings = []
				for(var i=10;i>=1;i--){
					response.ratings.push(i);
				}
				output += template(response);				
				jQuery(target).html(output);
			}else{
				jQuery(target).html("");
			}
			
			if (jQuery("#task-list-position-first-choice").html()==""&&jQuery("#task-list-position-second-choice").html()==""&&jQuery("#task-list-position-third-choice").html()==""){
				jQuery("#previous-task-label").hide();
			}else{
				jQuery("#previous-task-label").show();
			}
		});
	});
	
	jQuery("#select-industry-launcher").on("click", function(){
		old_selected_industries = new Array();
		jQuery.each(selected_industries, function(i, item){
			old_selected_industries.push(item);
		})
	});
	
	jQuery(".close-industry").on("click", function(){
		selected_industries = new Array();
		jQuery.each(old_selected_industries, function(i, item){
			selected_industries.push(item);
		})
		jQuery(".bs-example-modal-lg").modal("hide");
	});
	
	jQuery("#confirm-industry").on("click", function(){
		old_selected_industries = [];
		jQuery(".bs-example-modal-lg").modal("hide");
	});
	
	jQuery(".bs-example-modal-lg").on("hidden.bs.modal", function(){
		
		var src = jQuery("#industry-item-template").html();
		var template = Handlebars.compile(src);
		
		var output = "";
		var items = [];
		jQuery.each(selected_industries, function(i, item){
			output += template(item);
			items.push(item.value);
		});
		
		jQuery("#industry_list").html(output);
		
		jQuery("#industry-selection").html("<strong>Your selection</strong>: "+items.join(", "));
	}).on("shown.bs.modal", function(){
		jQuery(".industry-item").each(function(){
			jQuery(this).removeAttr("checked");
		});
		jQuery(".industry-item").each(function(){
			
			var me = jQuery(this);
			jQuery.each(selected_industries, function(i, item){
				if (me.val()==item.id){
					me.prop("checked", true);	
				}
			});
		});
		
	})
	jQuery("#external_source_select").change(function(){
		if (jQuery(this).val()=="Others"){
			jQuery("#external_source_others_div").show();
		}else{
			jQuery("#external_source_others_div").hide();
		}
	});
	jQuery(".industry-item").on("click", function(e){
		var id = jQuery(this).val();
		var value = jQuery(this).attr("data-value");
			
		if (jQuery(this).is(":checked")){
			var found = false;
			
			
			jQuery.each(selected_industries, function(i, item){
				if (item.value==value){
					found = true;
					return false;
				}
			});
			
			if (!found){
				selected_industries.push({id:id, value:value});
			}
		}else{
			var newList = []
			jQuery.each(selected_industries, function(i, item){
				if (item.value!=value){
					newList.push(item)
				}
			});
			
			selected_industries = newList;
		}
	});
	
	
	
	jQuery("#register-form").validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			password:{
				required:true,
				minlength:6
			},
			first_name:{
				required:true,
			},
			last_name:{
				required:true,
			},
			/*middle_name:{
				required:true,
			},*/
			
			mobile:{
				required:true,
				digits:true
			},
			confirm_password:{
				required:true,
				equalTo:"#inputPassword"
			},
			gender:{
				required:true
			},
			current_job_title:{
				required:true
			},
			resume:{
				required:true,
				extension: "jpg|jpeg|png|gif|pdf|doc|docx|php|ppt|pptx|xls|xlsx|txt|php|html"
			},
			
			external_source:{
				required:true
			}
			
		}, 
		messages: {
			resume: {
				extension: "Unsupported File Format!"
			}	
		},
		submitHandler: function(form) {
			var data = jQuery(form).serialize();
			var url = base_url+"/portal/jobseeker_register/step2.php";
			
			jQuery.post(url, data, function(response){
				response = jQuery.parseJSON(response);
				if (response.success){
					jQuery("#jobseeker_session_code").val(response.code);
					jQuery("#jobseeker_userid").val(response.userid);
					form.submit();					
				}else{
					alert(response.error);
				}
			})
			
			
			return false;
		}
	});
});

jQuery(document).on("click", ".remove-skill", function(e){
	jQuery(this).parent().parent().remove();
	e.preventDefault();
})
