/* seminar_booking.js  - mike 2012-03-16 */

var class_seminar = (function(){

	// constructor
    var seminar = function () {
		//this.update_cal();
        // private
        // public (this instance only)
		

    };
	
	seminar.filter_list = function() {
		var date_select = $('select#date_select').val();
		var time_select = $('select#time_select').val();
		
		$.ajax({
			type: "POST",
			url: "/seminar/admin.php?/filter_list/",
			data: { 'date_select': date_select, 'time_select': time_select},
			dataType: "json",
			success: function(data){
				var book_info = data.result['booking_info'];
				var pages = data.result['pages'];
				var pp = data.result['pp'];
				
				$('span#totalresult').empty().text(pages['items_total']);
				$('span#pages').empty().html(pp['display_pages']);
				$('span#itemspp').empty().html(pp['items_pp']);
				$('span#jumpmenu').empty().html(pp['jump_menu']);
				
				seminar.populate_table(book_info, 'process_filter', data.url);
			}, error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(textStatus + " (" + errorThrown + ")");
			}
		});
	};
	
	seminar.search_keyword = function() {
		var fieldname = $("input[name=field]:checked").val();
		var field_inp = $('input#'+fieldname).val();
		if(!field_inp) return;
		
		$.ajax({
			type: "POST",
			url: "/seminar/admin.php?/search_keyword/",
			data: { 'fieldname': fieldname, 'field_inp': field_inp},
			dataType: "json",
			success: function(data){
				$('span#totalresult').text(data.result.length);
				//$('span#totalresult').empty().text(pages['items_total']);
				$('span#pages').empty();
				$('span#itemspp').empty();
				$('span#jumpmenu').empty();
				seminar.populate_table(data.result, 'process_keyword', data.url);
			}, error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(textStatus + " (" + errorThrown + ")");
			}
		});
	};
	
	seminar.excelExport = function() {
		var type_display = $('input#action').val();
		var fld1 = undefined;
		var fld2 = undefined;
		var process = false;
		switch(type_display) {
			case 'process_filter':
				fld1 = $('select#date_select').val();
				fld2 = $('select#time_select').val();
				//if(!fld1 || !fld2) return;
				process = true;
				break;
			case 'process_keyword':
				var fld1 = $("input[name=field]:checked").val();
				var fld2 = $('input#'+fld1).val();
				if(!fld2) return;
				process = true;
				break;
		}
		if (process == true) {
			location.href='/seminar/admin.php?/toXLS/&method='+type_display+'&fld1='+fld1+'&fld2='+fld2;
		}
	};
	
	seminar.populate_table = function(data, method, url) {
		var tbl = $('table#bookings');
		tbl.find("tr:gt(0)").remove();
					
		var bgcolor = new Array('#d0d8e8', '#e9edf4');
		var rowbg = '';
					
		if(data.length == 0) {
			tbl.find('tbody').append("<tr bgcolor='#e9edf4'><td colspan='6'>No record found!</td></tr>");
			$('input#action').val('');
			return;
		}
		$('input#action').val(method);
		
		//$('span#totalresult').text(data.length);
				
		for(var i = 0; i < data.length; i++) {
			var book_info = data[i];
			rowbg = bgcolor[i % 2];
			
			var userid = book_info.userid;
			if( parseInt(book_info.userid) > 0) {
				userid = "<a href='http://"+url+"/portal/AdminResumeChecker/ResumeChecker.html?userid="+userid+"' target='_blank'>"+userid+"</a>";			
			}
			tbl.find('tbody').append("<tr bgcolor='"+rowbg+"'>"+
				"<td class='item'>"+book_info.fname+"</td>"+
				"<td class='item'>"+book_info.lname+"</td>"+
				"<td class='item'>"+book_info.email+"</td>"+
				"<td class='item'>"+book_info.tel_no+"</td>"+
				"<td class='item'>"+book_info.recent_job+"</td>"+
				"<td class='item'>"+book_info.position_desired+"</td>"+
				"<td class='item'>"+userid+"</td></tr>");
		}
	};
	
	seminar.populate_time = function() {
		date = $('select#date_select option:selected').text();
		
		$.ajax({
			type: "POST",
			url: "/seminar/admin.php?/date_time/",
			data: { 'date': date},
			dataType: "json",
			success: function(data){
				$('select#time_select').empty();
				var idx = date.replace(/\s+/g, '_');
				if(date != 'View all') {
					var datetime = data[idx];
				
				
					for(var i = 0; i < datetime.length; i++) {
						var info = datetime[i];
						
						$('select#time_select').append("<option value='"+info.start_val+"-"+
							info.finish_val+"'>"+info.start_time+" - "+info.finish_time+"</option>");
					}
				}
			}, error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(textStatus + " (" + errorThrown + ")");
			}
		});
	};
	return seminar;
})();
