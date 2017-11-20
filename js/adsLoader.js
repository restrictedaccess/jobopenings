var cache = {};
var base_api_url = jQuery("#baseAPIurl").val();
var sub_cat_id = '';
var work_stat = ["0","Full-Time","Part-Time"];
var sort_status="";
var sort_location="";
(function() {



if(!localStorage.getItem('ads')){
	if(!cache[sub_cat_id+work_stat[0]]) {

 			cache[sub_cat_id+work_stat[0]]=jQuery.ajax({
                type : 'POST',
                url : base_api_url+'/ads/get-active-ads/',
                dataType : 'json',
                data:{action:function(){return 'default';},
                sub_category_id:function(){return '';},
                filter_status:function(){return work_stat[0];},
                sort_status:function(){return '0';},
                sort_location:function(){return '0';}}}).promise();

      		 }
       		cache[sub_cat_id+work_stat[0]].done(SaveDataToLocalStorage);



  }
  else
  {
  	SaveDataToLocalStorage(localStorage.getItem('ads'));
  }



}());

function SaveDataToLocalStorage(data)
{


			if(!localStorage.getItem('ads')){
		    	localStorage.setItem('ads', JSON.stringify(data));
		    }
		    else
		    {
		    	console.log(localStorage.getItem('ads'));
		    }

}
