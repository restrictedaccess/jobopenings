var cache = {};
var base_api_url = jQuery("#baseAPIurl").val();
var base_link_url = jQuery("#baseLink").val();
var base_link_url_ph = jQuery("#baseLinkPH").val();
var table ="";
var blackCont = jQuery("div#blackOut");
var promptCont = jQuery("#prompt");
var img = '<img src="images/loading.gif" height=20px width=20px>';
var myHilitor;
var resp = [];
var sort_stat = "0";
var sort_loc = "0";
var sub_cat = "";
var copy_link ="";
var client_name="";
var selected_job_title = "";
var popOverHtml = "";
var posting_id = "";
var fb = "https://www.facebook.com/sharer/sharer.php?u=";
var twit = "http://twitter.com/home?status=";
var mailLink = "mailto:?";
var isSession = jQuery("#isSession").val();
var sub_value = "";
var popOverSettings = {
    animation: false,
    placement: 'auto top',
    container: 'body',
    html: true,
    title:'Copy Link <a href="#" class="close" data-dismiss="alert">&times;</a>',
    selector: '[data-toggle="popover"]',
    content: function () {
        return popOverHtml;
    }

};
var AllAds = {};
var handleBars=null;
var AdsData = {};
var getall = 0;
var mlimita = 0;
var mlimitb = 10;
var count = 0;
jQuery(document).ready(function(){
 checker()
  handleBars = new HandleBarsExt();

	if(jQuery("#request_id").val())
	{
		  lytbox(img);
      sub_value = jQuery(this).val();
    	loadAds(jQuery("#request_id").val(),'0',showResult);
	}
	else
	{
		lytbox(img);
    	loadAds('','0',showResult);
	}

	jQuery('body').popover(popOverSettings);

    jQuery("#search_ads").click(function(){

       var serach_query = jQuery("#s").val();
        if(serach_query!="")
        {
           lytbox(img);
           loadAds(serach_query,'1',showResult);
        }
        else
        {
            lytbox(img);
            loadAds('','0',showResult);
        }
    });

     jQuery("#s").keypress(function(e) {

         var code = e.keyCode || e.which;
            if(code==13)
            {
                var serach_query = jQuery(this).val();
                if(serach_query!="")
                {

                  //trySearch(serach_query);

                  testSearch(serach_query);

                    // lytbox(img);
                    // loadAds(serach_query,'1',showResult);
                }
                else
                {
                    lytbox(img);

                    loadAds('','0',showResult);
                }



            }
     });

     jQuery("#work_status_filter").change(function(){

     	var serach_query = jQuery("#s").val();
      var work_stat = jQuery("#work_status_filter").val();

      if(work_stat == "Full-Time")
      {
        jQuery(".Part-Time").hide();
        jQuery(".Full-Time").show();
        jQuery('.show_more').show();
        jQuery("#button_show").hide();
      }
      else if(work_stat == "Part-Time") {
        jQuery(".Full-Time").hide();
        jQuery(".Part-Time").show();
        jQuery('.show_more').show();
        jQuery("#button_show").hide();
      }
      else {
        jQuery(".Full-Time").show();
        jQuery(".Part-Time").show();
        jQuery('.show_more').hide();
        jQuery("#button_show").show();

      }


                // if(serach_query!="")
                // {
                //    lytbox(img);
                //     loadAds(serach_query,'1',showResult);
                // }
                // else
                // {
                //     lytbox(img);
                //
                //     loadAds(sub_cat,'0',showResult);
                // }
     });


     jQuery("#s").on('keyup',function(x){

       sub_value = jQuery(this).val();
       if(!sub_value)
       {
           loadAds('','0',showResult);
       }
      //  else {
      //      testSearch(sub_value);
      //  }

     });

    jQuery(".sort_status").on('click',function(){



    	sort_stat = jQuery(this).val();
      sortData();
      //
    	if(jQuery("#part").is(':visible'))
    	{
        jQuery("#part").hide();
      	jQuery("#full").show();
      }
      else {
        if(jQuery("#full").is(':visible'))
    		{
          jQuery("#full").hide();
    			jQuery("#part").show();
        }
      }

    });


    jQuery(".sort_location").on('click',function(){

    	sort_loc = jQuery(this).val();
      sortData();
    	if(jQuery("#office").is(':visible'))
    	{
    		jQuery("#office").hide();
    		jQuery("#home").show();

    	}

    	else
    	{
    		if(jQuery("#home").is(':visible'))
    		{
    			jQuery("#home").hide();
    			jQuery("#office").show();

    		}

    	}
    	});

    jQuery(document.body).on('click','#sub_cat',function(){

       sub_cat = jQuery(this).data('sub_cat');
       var cat_name = jQuery(this).data('cat_name');



       lytbox(img);
       sub_value = sub_cat;
       loadAds(sub_cat,'0',showResult);

    });


    jQuery(document.body).on('click','.boxclose',function(){


      hideLoading();


    });


	jQuery(document.body).on('click',"#modal_click",function(){

		jQuery(".copyLink").remove();


		jQuery("#newuserCont").hide();
		jQuery("#euser_cont").hide();
		jQuery("#applyCont").show();



		var id = jQuery(this).data('ref-id');
		var desclaimer = jQuery("#desclaimer");
		var forgotpassLink = jQuery("#baseLink").val();
		posting_id = id;
		var jo_id = jQuery(this).data('ref-jo_id');
		var work_status = jQuery("#status_"+id).html();
		var level = jQuery("#status_"+id).data('ref-level');
		var work_sched = jQuery("#status_"+id).data('ref-sched');
		var work_model = jQuery("#status_"+id).data('ref-model');
		var no_staff = jQuery("#status_"+id).data('ref-staff');





		if(work_status == 'TBA When JS is Filled' || work_status == "")
		{
			work_status = 'Full-Time';
		}

		if(level == 'TBA When JS is Filled' || level == "")
		{
			level = 'mid';
		}
		if(work_sched == 'TBA When JS is Filled' || work_sched == "")
		{
			work_sched = 'Australia/Brisbane';
		}

		if(no_staff == 'TBA When JS is Filled' || no_staff == "")
		{
			no_staff = '1';
		}

		jQuery("#modal_status").html("<strong>"+jQuery("#title_"+id).html()+"</strong>");
		selected_job_title = jQuery("#title_"+id).html();
		jQuery("#work_status").html("<strong>"+work_status+"</strong>");
		jQuery("#level").html("<strong>"+level+"</strong>");
		jQuery("#sched").html("<strong>"+work_sched+"</bstrong");
		jQuery("#model").html("<strong>"+work_model+"</strong>");
		jQuery("#staff").html("<strong>"+no_staff+"</strong>");
		jQuery("#modal_heading").html(jQuery("#cont_"+id).html());
		// jQuery("#modal_req").html(jQuery("#cont_"+id).html());
		client_name = jQuery("#client_"+id).val();


		var desclaim = "<p style='margin-left: -2px;font-size:16px;'>You are applying for "+selected_job_title+". "
					+"Fill up the form below and upload your latest Curriculum Vitae(CV).</p>"
					+"<br>"
					+'<p style="font-size: 12px; font-weight: initial; margin-left: -1px;"><i>Fields with <span style="color:red;">*</span> are required fields</i></p>';


		// console.log(client_name);

		copy_link = base_link_url+'/portal/convert_ads/ads.php?job_order_id='+jo_id;
		popOverHtml = "<div>"
                  +'<div class="table-responsive" style="margin:0px;">'
                  +'<table class="table table-condensed table-bordered" style="margin:0px;">'
                  +'<tbody>'
                  +'<tr>'
                  +'<tr><td colspan="2" class="text-justify"><i id="link_click" style="margin-top: 13px;" class="fa fa-link"></i></td>'
                  +'<td id="link_test"><a style="background-color: wheat;" id="link" target="_blank" href='+copy_link+'>'+copy_link+'</a></td>'
                  +'</tr>'
                  +'</tbody></table></div><br>'
                  +'</div>';

         var subj = "Please look at this Job Ad";
         var body = "Hi,I found this Job Ad and thought you might like it";

        jQuery("#fb_href").attr("href",fb+copy_link);
        jQuery("#twit_href").attr("href",twit+copy_link);
        jQuery("#email_href").attr("href",mailLink+"subject="+subj+"&body="+body+" <a href="+copy_link+">"+copy_link+"</a>");
        jQuery("#forgot_pass").attr("href",forgotpassLink+"/portal/forgotpass.php?user=applicant");

        desclaimer.html(desclaim);


	});

	jQuery("#forgot_pass").on("click",function(e){
		 return openWindow(this.href);
	});


	jQuery('#copyLink').on('click',function(){


		var copied = document.createElement('input');

		copied.setAttribute("value",copy_link);
		copied.setAttribute("class","copyLink");
		// console.log(copied);

		jQuery("#myModal").append(copied);

		copied.select();
		document.execCommand('copy');

		jQuery(".copyLink").remove();

		//makeToast();

	});

	jQuery('body').on('hidden.bs.popover', function (e) {
    	jQuery(e.target).data("bs.popover").inState.click = false;
	});


	jQuery(document.body).on("click",".close",function(){

			jQuery('[data-toggle="popover"]').popover('hide');

	});


	jQuery(".close").on('click',function(){


		jQuery('[data-toggle="popover"]').popover('hide');

	});


	jQuery('div').on('scroll', function () {

        var container = jQuery(this);
        jQuery(this).find('[data-toggle="popover"]').each(function () {
            jQuery(this).css({
                top: - container.scrollTop()
            });
        });
    });


	jQuery("#name").on("blur",function(){

		var val = jQuery("#name").val();

	if(val){
		if(!val.match(/\s/g))
		{
			dialogPop("Please input your full name.");

			//jQuery("#name").focus();

			jQuery("#email").prop("disabled",true);
	   		jQuery("#job_title").prop("disabled",true);
	   		jQuery("#pass3").prop("disabled",true);
	   		jQuery("#resume").prop("disabled",true);

		}
		else
		{
			jQuery("#email").prop("disabled",false);
	   		jQuery("#job_title").prop("disabled",false);
	   		jQuery("#pass3").prop("disabled",false);
	   		jQuery("#resume").prop("disabled",false);
		}
	}
	else
	{
		jQuery("#email").prop("disabled",false);
   		jQuery("#job_title").prop("disabled",false);
   		jQuery("#pass3").prop("disabled",false);
   		jQuery("#resume").prop("disabled",false);
	}

	});

	jQuery("#apply").on('click',function(){



		if(isSession == "1")
		{
			var jo = jQuery('input[name="job_title"]:hidden');
			var userid = jQuery('input[name="userid"]:hidden');
			var sessID = jQuery('#sessionID').val();
			var mon_cnt = jQuery('input[name="mon_cnt"]:hidden');
			var job_title = selected_job_title;
			jo.val(selected_job_title);

			showLoading();

			jQuery.ajax({
		      url: base_api_url+"/ads/login-and-apply/",
		      type: "POST",
		      data: {posting_id:function(){return posting_id;},
		      sesID:function(){return sessID;},
		      client:function(){return client_name;},
		      job_title:function(){return job_title;}},
		    }).done(function( response ) {
		      	response = jQuery.parseJSON(response);


		      	if(response.success)
		      	{

		      		if(response.code == 1)
		      		{
		      			hideLoading();
		      			jQuery("#myModal").modal('hide');
		      			dialogPop("You have already applied for this job.");

		      			reset();


		      		}
		      		else if(response.code == 2)
		      		{
		      			hideLoading();
		      			jQuery("#myModal").modal('hide');
		      			dialogPop('Server Timeout. Please try again.');

		      			reset();
		      		}
		      		else
		      		{
		      			userid.val(response.userid);
		      			mon_cnt.val(response.count);
		      			jQuery("#login").unbind('submit').submit();
		      			reset();
		      		}

		      	}
		      	else
		      	{
		      		hideLoading();
		      		jQuery("#myModal").modal('hide');
		      		dialogPop('Server Timeout. Please try again.');

	      			reset();
		      	}

			});
		}
		else
		{
		jQuery("#applyCont").hide();
		jQuery("#newuserCont").show();
		reset();
		}


	});

	jQuery("#back_new").on('click',function(){

		//var id = jQuery(this).data('ref-id');

		//window.open("jobopeningsphp.php?job="+id , '_blank');
		jQuery("#newuserCont").hide();
		jQuery("#applyCont").show();
		reset();

	});

		jQuery("#back_new2").on('click',function(){

		//var id = jQuery(this).data('ref-id');

		//window.open("jobopeningsphp.php?job="+id , '_blank');
		jQuery("#euser_cont").hide();
		jQuery("#applyCont").show();
		reset();

	});

	jQuery("#email").on('click',function(){

		// var id = jQuery(this).data('ref-id');
//
		// window.open("EmailToFriend.php?job="+id , '_blank');

	});



	jQuery(document.body).on('click',"#button_show",function(){
		lytbox(img);
getall = 1;
loadAds('','0',showResult);

		jQuery('.show_more').show();

		//jQuery("#contents2").append('<center><button align="center" style="width:30%;margin-top:16px;" type="button" class="btn btn-w-m btn-default" id="button_less">Show less</button></center>');
jQuery("#button_show").hide();
	});

	jQuery(document.body).on('click',"#button_less",function(){

		jQuery(this).hide();
		jQuery("#button_show").show();
		jQuery('.show_more').hide();
		jQuery("#contents2").remove(this);
		jQuery("#contents2").append('<center><button align="center" style="width:30%;margin-top:16px;" type="button" class="btn btn-w-m btn-default" id="button_show">Show more</button></center>');
	});



	jQuery("#register").submit(function(e){



    	e.preventDefault();
	});

	jQuery("#skill_test").submit(function(e){


    	e.preventDefault();
	});


	jQuery("#login").submit(function(e){



    	e.preventDefault();
	});


	jQuery('input[type=file]').change(function(){
	    var file = this.files[0];
	    name = file.name;
	    size = file.size;
	    type = file.type;


			//put validation

	});

	jQuery("#apply_new").on("click",function(){


	if(jQuery("#name").val() && jQuery("#email").val() &&
	   jQuery("#job_title").val() && jQuery("#pass3").val() && jQuery("#resume").val())
	{
				var rv2 = jQuery('#rv2').val();
		    	var pass3 = jQuery('#pass3').val();
		    	var name = jQuery('#name').val().toUpperCase();
		    	var email = jQuery('#email').val();
		    	var jo_title = jQuery('#job_title').val();
		    	var apply_type = jQuery("#apply_type").val();
		    	var userid = jQuery('input[name="userid"]:hidden');
		    	var userid2 = jQuery('input[id="userid_2"]:hidden');
		   		var _id = jQuery('input[name="_id"]:hidden');



		    	jQuery.post('./jobopenings.php',{rv2:rv2,pass3:pass3},function(resp){

		    		if(resp == '1')
		    		{

		    			hideLoading();
		    			dialogPop("Incorrect Captcha");


		    		}
		    		else
		    		{
		    				showLoading();

		    				var data = new FormData( jQuery("#register")[0]);

		    				data.append("apply_type",apply_type);
		    				data.append("selected_job",selected_job_title);
		    				data.append("client",client_name);
		    				data.append("posting_id",posting_id);

		    				jQuery.ajax({
				              url: base_api_url+"/ads/apply-new-user/",
				              type: "POST",
				              data: data,
						      processData: false,
						      contentType: false
				            }).done(function( response ) {
				              	response = jQuery.parseJSON(response);
				              	if(response.success)
				              	{
				              		userid.val(response.userid);
				              		userid2.val(response.userid);
				              		_id.val(response._id);

				              		var data2 = new FormData( jQuery("#register")[0]);
				              		data2.append('userid',response.userid);
				              		data2.append('on_ph','on_ph');

              				  		jQuery.ajax({
								        url: jQuery("#register").attr('action'),
								        type: "POST",
								        crossDomain: true,
								        data: data2,
								        processData: false,
						      			contentType: false,
						      			success:function(){
						      				 jQuery("#skill_test").unbind('submit').submit();
						      			}
								       });


			              				reset();
				              	}
				              	else
				              	{
				              		if(response.code == 5)
				              		{
				              			hideLoading();
				              			dialogPop("The email address you have entered is already registered");
				              			reset();

				              		}
				              	}

			            	});


		    		}

		    	});
			}
	});


	jQuery(document.body).on("click","#login_apply",function(){


		jQuery("#newuserCont").hide();
		jQuery("#euser_cont").show();
		reset();

	});

jQuery("#loginApply").on("click",function(){

	if(jQuery("#email2").val() && jQuery("#password").val())
	{
		var email = jQuery('#email2').val();
		var password = jQuery('#password').val();
		var apply_type = jQuery("#apply_type").val();
		var jo = jQuery('input[name="job_title"]:hidden');
		var userid = jQuery('input[name="userid"]:hidden');
		var mon_cnt = jQuery('input[name="mon_cnt"]:hidden');
		var _id = jQuery('input[name="_id"]:hidden');
		jo.val(selected_job_title);
		// var email_temp="<p>Recruiters,</p><br>"
		    				// +"<p><b>"+name+"</b> applied for <b>"+selected_job_title+"</b> with <b>"+client_name+"</b></p><br>"
		    				// +"<p>Candidate current job title is <b>"+jo_title+"</b></p><br>"
		    				// +"<p>Please check this candidate's resume attach and process if suitable.</p>";



		var data = new FormData( jQuery("#login")[0] );
		data.append('posting_id',posting_id);
		data.append('job_title',selected_job_title);
		data.append("apply_type",apply_type);
		data.append("client",client_name);

		showLoading();


		jQuery.ajax({
	      url: base_api_url+"/ads/login-and-apply/",
	      type: "POST",
	      data: data,
	      processData: false,
	      contentType: false
	    }).done(function( response ) {
	      	response = jQuery.parseJSON(response);
	      	if(response.success)
	      	{

	      		if(response.code == 1)
	      		{

	      			hideLoading();
	      			jQuery("#myModal").modal('hide');

	      			dialogPop("You have already applied for this job.");
	      			//prompt("You have already applied for this job.");

	      			reset();


	      		}
	      		else if(response.code == 2)
	      		{
	      			hideLoading();
	      			jQuery("#myModal").modal('hide');
	      			dialogPop('Server Timeout. Please try again.');
	      			jQuery("#myModal").modal('hide');
	      			reset();
	      		}
	      		else
	      		{

	      			 userid.val(response.userid);
	      			 mon_cnt.val(response.count);
	      			 _id.val(response._id);


	      			jQuery("#login").unbind('submit').submit();
	      			reset();
	      		}

	      	}
	      	else
	      	{
	      		hideLoading();
      			// jQuery("#myModal").modal('hide');
	      		dialogPop('Invalid username/password');
      			reset();
	      	}

		});
	}

	});



  /*  setInterval(function(){
      checker();
    },3600000);

    checker();*/

 });




function loadAds(sub_cat_id,type,callback)
{

  var act="";
  var cacheData = "search";
  var work_stat = jQuery("#work_status_filter").val();
  if(type == '0')
  {
   if(!sub_cat_id)
    {
      sub_cat_id = "";
      act = 'default';



    }
    else
    {
        act = 'default';
    }
  }else
    {

        act = 'search';
        table="";

    }



   	if(!sub_cat_id || sub_cat_id == "")
   	{
		
		var gtall ="";
		if(getall == 1){
					if(mlimitb < count)
					{
						mlimita = 11;
						mlimitb = count;
						
						gtall = '?gtall=LIMIT ' + mlimita + ' ,' + mlimitb;
						
					}
			
					cache[sub_cat_id+work_stat]=jQuery.ajax({
		                type : 'POST',
		                url : base_api_url+'/ads/get-active-ads/'+gtall,
		                dataType : 'json',
		                data:{action:function(){return act;},
		                sub_category_id:function(){return sub_cat_id;},
		                filter_status:function(){return work_stat;},
		                sort_status:function(){return sort_stat;},
		                sort_location:function(){return sort_loc;}}}).promise();
							cache[sub_cat_id+work_stat].done(callback);
							
			}else {

				if(localStorage.getItem('ads') && work_stat == '0' && sort_stat == '0' && sort_loc == '0')
				{
				// console.log("local storage");
					showResult(JSON.parse(localStorage.getItem('ads')));
				}
				else
				{
				// console.log("walang sub_cat");
				sort_stat = "0";
				sort_loc = "0";
			
		mlimita = 0;
			mlimitb = 10;
			
			gtall = '?gtall=LIMIT ' + mlimita + ' ,' + mlimitb;
			

					if(!cache[sub_cat_id+work_stat]) {
					 
						cache[sub_cat_id+work_stat]=jQuery.ajax({
								type : 'POST',
								url : base_api_url+'/ads/get-active-ads/'+gtall,
								dataType : 'json',
								data:{action:function(){return act;},
								sub_category_id:function(){return sub_cat_id;},
								filter_status:function(){return work_stat;},
								sort_status:function(){return sort_stat;},
								sort_location:function(){return sort_loc;}}}).promise();

	              }


    			cache[sub_cat_id+work_stat].done(callback);

				}
		}
		
   	}
   	else
   	{


      if(!localStorage.getItem(sub_cat_id))
      {
        // console.log("may sub_cat");
        sort_stat = "0";
        sort_loc = "0";
          if(!cache[sub_cat_id+work_stat]) {

            cache[sub_cat_id+work_stat]=jQuery.ajax({
                      type : 'POST',
                      url : base_api_url+'/ads/get-active-ads/',
                      dataType : 'json',
                      data:{action:function(){return act;},
                      sub_category_id:function(){return sub_cat_id;},
                      filter_status:function(){return work_stat;},
                      sort_status:function(){return "0";},
                      sort_location:function(){return "0";}}}).promise();

             }

          cache[sub_cat_id+work_stat].done(callback);
      }
      else {
        showResult(JSON.parse(localStorage.getItem(sub_cat_id)));
      }

   	}



}

function appendToStorage(name, data){
    var old = localStorage.getItem(name);
    if(old === null) old = "";
   return localStorage.setItem(name, old + data);
}


function showResult(response)
{
 hideLoading();
// console.log('pasok '+sub_value);
if(!sub_value)
{
  if(!localStorage.getItem('ads'))
  {
    localStorage.setItem('ads', JSON.stringify(response));
    AllAds = response;
  }
  else {
    AllAds = JSON.parse(localStorage.getItem('ads'));
  }

}else {
    if(!localStorage.getItem(sub_value))
    {
      localStorage.setItem(sub_value, JSON.stringify(response));
    }
}


 

	if(response && response.length)
	{

    //console.log(response);

    var title="";
    var cat_name="";
    var gs_requirements;
    var requirements_neutral;
    var requirements_must_have;
    var requirements_good_to_have;
    var converted_requirements_neutral;
    var converted_requirements_must_have;
    var converted_requirements_good_to_have;
    var gs_responsibilities;
    var responsibilities;
    var converted_responsibilities;
    var temp_name="";
    var color="";
    var number = 0;
    var display="";


	AdsData = response;
  AdsData.len = AdsData.length

  jQuery.each(response, function(index) {
    requirements_neutral = response[index].requirements.neutral;
    requirements_must_have = response[index].requirements.must_have;
    requirements_good_to_have = response[index].requirements.good_to_have;

    converted_requirements_neutral = response[index].converted_requirements.neutral;
    converted_requirements_must_have = response[index].converted_requirements.must_have;
    converted_requirements_good_to_have = response[index].converted_requirements.good_to_have;

    converted_responsibilities = response[index].converted_responsbilities;
    gs_responsibilities = response[index].gs_responsibilities;

    if(!jQuery.isEmptyObject(converted_requirements_good_to_have) || !jQuery.isEmptyObject(converted_requirements_must_have)
    || !jQuery.isEmptyObject(converted_requirements_neutral)|| !jQuery.isEmptyObject(gs_requirements))
    {
        AdsData[index].msneu = 1
        if(!jQuery.isEmptyObject(converted_requirements_good_to_have) || !jQuery.isEmptyObject(converted_requirements_must_have))
        {
                  AdsData[index].ms = 1;
        }
        else {
            if(!jQuery.isEmptyObject(converted_requirements_neutral))
            {
              AdsData[index].neutral = 1;
            }
        }
    }
    else {
        AdsData[index].hasDataMs = "Requirements to be announced.";
    }

    if(!jQuery.isEmptyObject(converted_responsibilities) || !jQuery.isEmptyObject(gs_responsibilities))
    {
        AdsData[index].gsresp = 1
        if(!jQuery.isEmptyObject(converted_responsibilities))
        {
            AdsData[index].resp = 1;
        }

    }
    else {
      AdsData[index].hasDataResp = "Responsibilities to be announced.";
    }

	if(getall == 1){
		AdsData.showme = "1";
	}else{
		AdsData.showme = "0";
	}

  });


  // console.log(AdsData);
  var HTML = { Ads : AdsData };
  var template = "#jobads-templates";
  var target = "#contents2";
  handleBars.populateHandeBarsElement(template,target,HTML);

  // var Source =   jQuery("#jobads-templates").html();
  // var theTemplate = Handlebars.compile(Source);
  // var theCompiledHtml = theTemplate(HTML);
  // var Template = Handlebars.compile(Source);
  // var theTemp = Template(HTML);
  // jQuery("#contents2").html(theCompiledHtml);

	 }
	else
	{

                    dialogPop("No results found");
                    sub_cat="";
	}
getall = 0;
}


function center()
{
  var top, left;

    top = Math.max(jQuery(window).height() - promptCont.outerHeight(), 0) / 2;
    left = Math.max(jQuery(window).width() - promptCont.outerWidth(), 0) / 2;

    promptCont.css({
        top:top + jQuery(window).scrollTop(),
        left:left + jQuery(window).scrollLeft()
    });
}

function prompt(msg)
{



    // var contetnt = "<a class='boxclose'></a>";
    var contetnt="";
    contetnt+=msg;
    promptCont.html(contetnt);

    promptCont.css({
        width: msg.width || 'auto',
        height: msg.height || 'auto'
    });

    center();
    promptCont.show();
    jQuery("div#blackOut").fadeTo(550, 0.8);

}

function showLoading()
{
    blackCont.fadeTo(550, 0.8);
    blackCont.show();
    prompt("Processing your applicantion, kindly please wait..");
}

function hideLoading()
{
     blackCont.hide();
     promptCont.hide();
     jQuery("div#whiteBox").hide();
}

  function lytbox(variable){


    jQuery("div#blackOut").fadeTo(550, 0.8);
    jQuery("div#whiteBox").fadeTo(550, 1);

    var divHeight = jQuery("div#whiteBox").height();
    var divWidth = jQuery("div#whiteBox").width();


    divHeight += 88;
    var marginTop = -(divHeight /2);
    divWidth += 30 ;
    var marginLeft = -(divWidth / 2);


    marginTop += "px";
    marginLeft +="px";

    jQuery("#whiteBox").css("margin-top", marginTop);
    jQuery("#whiteBox").css("margin-left", marginLeft);

    jQuery("#whiteBox").html(variable);


  }


function removeHtmlTags(required)
{

    return required.replace(/(<([^>]+)>)/ig,"");

}

function reset()
{
	jQuery('#register')[0].reset();
	jQuery('#login')[0].reset();
}

function dialogPop(cont)
{
	var title = '<i class="fa fa-exclamation-triangle"></i>';

    jQuery( "#dialog" ).dialog({
	  titleIsHtml: true ,
      resizable: false,
      draggable:false,
      height:140,
      width:400,
      modal: true,
      moveToTop:true,
      buttons: {
        "Close": function() {
         jQuery( this ).dialog( "close" );

        }

      },
      closeOnEscape: false,
   	  open: function(event, ui) { jQuery(".ui-dialog-titlebar-close").hide();
   	  	// jQuery(this)
        // .parent()
        // .children(".ui-dialog-titlebar")
        // .html(title);
        jQuery('.ui-dialog').css('z-index',3100);
 		jQuery('.ui-widget-overlay').css('z-index',3000);
        }
    }).show();
    jQuery( "#dialog" ).html(cont);

}

function openWindow(url) {

    if (window.innerWidth <= 640) {
        var a = document.createElement('a');
        a.setAttribute("href", url);
        a.setAttribute("target", "_blank");

        var dispatch = document.createEvent("HTMLEvents");
        dispatch.initEvent("click", true, true);

        a.dispatchEvent(dispatch);
    }
    else {
        var width = window.innerWidth * 0.66 ;
        var height = width * window.innerHeight / window.innerWidth ;
        window.open(url , 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
    }
    return false;
}

function makeToast()
{
	var options =
				{
					priority : "info",
					title    : null,
					message  :"Link Copied"
				};

	jQuery.toaster(options);
}


function testSearch(val)
{
  var temp = [];
  var i = 0;
  val = val.toLowerCase();
  var result = null;


  result = jQuery.grep(AllAds,function(e){
          return ( e.singular_name.toLowerCase().indexOf(val) > -1 );
  });

  if(!result.length)
  {
    result = jQuery.grep(AllAds,function(e){
            return ( e.ads.heading.toLowerCase().indexOf(val) > -1 );
    });

        if(!result.length)
        {
          loadAds(val,'1',showResult);
        }
        else{
          console.log(result);
          showResult(result);
        }
  }
  else{
    console.log(result);
    showResult(result);
  }


}

function sortData()
{
  var temp = [];
  var temp2 = [];
  var temp3 = [];
  var temp4 = [];
  var i = 0;
  var x = 0;
  var z = 0;
  var y = 0;
  var work_stat = (sort_stat == "0" ? "Full-Time" :"Part-Time");
  var loc_stat = (sort_loc == "0" ? "Home Office" : "Office Location");
  jQuery.each(AdsData, function(index) {

    if(AdsData[index].work_status == work_stat)
    {
      if(AdsData[index].work_model == loc_stat)
      {
          temp[i] = AdsData[index];
          i++;

      }
      else {
        temp2[x] = AdsData[index];
        x++;
      }


    }
    else {
        if(AdsData[index].work_model == loc_stat)
        {
            temp3[z] = AdsData[index];
            z++;
        }
        else {
          temp4[y] = AdsData[index];
          y++;

        }


    }
  });


  var data =jQuery.concat(temp, temp2,temp3,temp4);
  showResult(data);
}

function checker()
{

  //var count = 0;
  	if(localStorage.getItem('countAds'))
    {
      count = localStorage.getItem('countAds');
    }

  jQuery.ajax({
            type : 'POST',
            url : base_api_url+'/ads/get-ads-counter/',
            dataType : 'json',
            success:function(data){
              if(data)
              {
                  if(parseInt(count) != parseInt(data.count))
                  {
                      console.log("updating data");
                      if(parseInt(count) !=0)
                      {
                        localStorage.clear();
                        cache = {};
                        loadAds('','0',showResult);
                      }

                      localStorage.setItem('countAds',data.count);
					  count = data.count;
                  }
                  else {

                    console.log("no new ads posted");
                  }

              }

            },
                 error : function(response){


                      console.log(response);

            }

    });

  }





// function trySearch(val)
// {
//
//     console.log(val);
//         var str = jQuery("#s").val().toLowerCase();
//         var newarr = jQuery.grep(AdsData,function(n,i){
//             return n.AdsData.toLowerCase().search(str)!=-1;
//     });
//     console.log(newarr);
// }

(function($){$.concat||$.extend({concat:function(b,c){var a=[];for(var x in arguments)if(typeof a=='object')a=a.concat(arguments[x]);return a}});})(jQuery);
