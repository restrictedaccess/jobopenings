<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>

<script language=javascript src="<?php echo $staticdir;?>/js/functions.js"></script>
<script type="text/javascript" src="/portal/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $staticdir;?>/js/jscal2.js"></script> 
<script type="text/javascript" src="<?php echo $staticdir;?>/js/lang/en.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $staticdir;?>/css/jscal2.css" />

<script src="<?php echo $staticdir;?>/js/sbox.js" type="text/javascript"></script>
<script type="text/javascript" src="/seminar/js/seminar_booking.js"></script> 

<link rel=stylesheet type=text/css href="/seminar/css/overlay.css">

<link rel=stylesheet type=text/css href="/seminar/css/seminar_styles.css">
<link rel=stylesheet type=text/css href="/seminar/css/styles_global.css">
<link rel=stylesheet type=text/css href="/seminar/css/tabs.css">
<script type="text/javascript">
<!---
$(document).ready(function() {
	
	$(".pane_content").hide();
	$("ul.tabs li:<?php echo $tab;?>").addClass("active").show();
	$(".pane_content:<?php echo $tab;?>").show();

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".pane_content").hide();

		var activeTab = $(this).find("a").attr("href");
		//if( activeTab == 'staffactive' ) 

		$(activeTab).fadeIn();
		$(activeTab).show();
			//css('background', '#e0e0e0');
			
		return false;
	});
    Calendar.setup({inputField : "date_from", trigger : "bd", onSelect : function() { this.hide()  },
            //showTime   : 12,
			fdow  : 0, dateFormat : "%Y-%m-%d"
    });
    
    var i = 1;
    $("a#addtime").click(function() {
        if ($("table#newtime tr").length > 13) return;
        //var starttime = $('table#newtime tr:last select:eq(0)').val();
        var endtime = $('table#newtime tr:last select:eq(1)').val();

        $("table#newtime tr:last").clone().find("select").each(function() {
            var time_sel = $(this).attr('name');
            
            $(this).find('option').each(function(){
                if( parseFloat($(this).val()) <= endtime ) {
                    $(this).attr('disabled', true);
                }
                //alert($(this).val());
            });
            
            $(this).val('');//.attr('id', function(_, id) { return id + i });

        }).end().appendTo("table#newtime");
        i++;
    });
	<?php if($date_select):?>
	$("select#date_select option[value=<?php echo $date_select;?>]").attr("selected","selected");
	class_seminar.populate_time();
	<?php endif;?>

});
function fieldselect(fldname) {
        $('div#fieldsearch').find('input[type=text]').val('');
        //$('input#'+fldname).removeAttr('disabled');
    }
// -->
</script>
</head>
<body>
<iframe id='ajaxframe' name='ajaxframe' style='display:none;' src='javascript:false;'></iframe>

<table cellpadding='0' cellspacing='0' border='0' width='98%'>
<tr><td valign="top" >
<?php /*<div style="float:left;text-align:right;width:100%;padding:5px; color:#666666;">
<div style="float:left"><img src="/portal/images/remote-staff-logo2.jpg" alt="think" ></div>
 

<div style="float:right;width:190px;">
	<!--<a href="logout.php"  style="text-decoration:none;color:#666666;">Logout</a> | <a href="logout.php" style="text-decoration:none;color:#666666;" title="Login in Different Account">Login</a>-->
</div>
</div>*/?>


</td>
</tr>

<tr><td style="font: 8pt verdana; background:#abccdd;height:19px;">
<div style='float:left;'>&#160;&#160;<b><?php echo $heading;?></b>
<?php /*Welcome #{$admin.admin_id} {$admin.admin_fname} {$admin.admin_lname}*/?>
</div><div style='float:right;font: 8pt verdana;'>&nbsp;</div></td></tr>
<tr><td valign="top" >

<p>&nbsp;</p>

<div id="container">
    <ul class="tabs">
      <li><a href="#reports">Booking Report</a></li>
      <li><a href="#schedule">Schedule</a></li>
    </ul>
					
  <div class="pane_container">
    <div id="reports" class="pane_content">
        
     <div style='float:left;width:100%;padding:8px;margin:10px;'>
	   <div style="float:left;width:30%;padding-right:15px;">
        <fieldset>
            <legend>Date Filters</legend>
            <div style='padding:3px;'><span>Date Of Seminar:</span>
            <select name="date_select" id="date_select" class="inputbox2" onchange="class_seminar.populate_time()">
				<option value='all'>View all</option>
                <?php foreach($dateselect as $date):?>
                <option value='<?php echo $date['date_val'];?>'><?php echo $date['date'];?></option>
                <?php endforeach;?>
            </select></div>
            <div style='padding:3px;'>
            <span>Time Of Seminar:</span>
            <select name="time_select" id="time_select" class="inputbox2"><option value=''>--</option>
                <!--<?php foreach($timeselect as $time):?>
                <option value='<?php echo $time['start_val'].'-'.$time['finish_val'];?>'><?php echo $time['start'].' - '.$time['finish'];?></option>
                <?php endforeach;?>-->
            </select></div>
            <div style='padding-left:10px;'><input type="button" value="Filter List" class="button" onclick="class_seminar.filter_list();"></div>
        </fieldset>
		</div>
       
       <div id="fieldsearch" style="float:left;width:30%;padding-left:15px;">
        <fieldset>
            <legend>Search By Keyword</legend>
            <div style='padding:3px;'><input type='radio' name='field' value='fname' checked='checked' onclick='fieldselect("fname");'/>
                <span>First Name:</span> <input type='text' class='inputbox2' id='fname' name='fname'/></div>
            <div style='padding:3px;'><input type='radio' name='field' value='lname' onclick='fieldselect("lname");'/>
                <span>Last Name:&nbsp;</span><input type='text' class='inputbox2' id='lname' name='lname'/></div>
            <div style='padding:3px;'><input type='radio' name='field' value='email' onclick='fieldselect("email");'/>
                <span>Email Addr:&nbsp;</span><input type='text' class='inputbox2' id='email' name='email'/></div>
            <div style='padding-left:10px;'><input type="button" value="Search" class="button" onclick="class_seminar.search_keyword();"></div>
        </fieldset>
		</div>
	  
	 </div>
        <div id='result' style='float:left;width:90%;border:1px solid #aaa;'>
            <form action='' method='post' target='ajaxframe'><input type='hidden' name='action' id='action' value='<?php echo $method;?>'/></form>
           <span style=" float:left;">
			<table cellpadding='0' cellspacing='0' class='list' style='float:left;width:auto;'>
			<tr><td>Total Result: <span id='totalresult'><?php echo $items_total;?></span></td>
				<td> &nbsp; <span id='pages'><?php echo $pages;?></span></td>
				<td> &nbsp; <span id='itemspp'><?php echo $items_pp;?></span> &nbsp; </td>
				<td><span id='jumpmenu'><?php echo $jump_menu;?></span></td>
			</tr>
			</table>
		   
		   </span>
           <span style=" float:right;"><input type="button" onClick="class_seminar.excelExport();" value="Export to Excel"></span>
           <table cellpadding='3' cellspacing='3' class='list' width='100%' id='bookings'>
           <tbody>
           <tr>
             <td class='header'>First Name</td>
             <td class='header'>Last Name</td>
             <td class='header'>Email</td>
             <td class='header'>Number</td>
             <td class='header'>Last Position</td>
             <td class='header'>Postion Desired</td>
             <td class='header'>Applicant ID</td>
           </tr>
		   
		   <?php if(count($booking_info) > 0):
		   $bgcolor = array('#d0d8e8', '#e9edf4');
			foreach($booking_info as $book_info):
				$ctr++;
				$userid = $book_info['userid'];
				if( $userid > 0) {
					$userid = "<a href='http://".$domain."/portal/AdminResumeChecker/ResumeChecker.html?userid=".$userid."' target='_blank'>".$userid."</a>";
				}
			?>
			<tr bgcolor="<?php echo $bgcolor[$ctr % 2];?>">
			<td class='item'><?php echo $book_info['fname'];?></td>
			<td class='item'><?php echo $book_info['lname'];?></td>
			<td class='item'><?php echo $book_info['email'];?></td>
			<td class='item'><?php echo $book_info['tel_no'];?></td>
			<td class='item'><?php echo $book_info['recent_job'];?></td>
			<td class='item'><?php echo $book_info['position_desired'];?></td>
			<td class='item'><?php echo $userid;?></td></tr>
			<?php endforeach;
			endif;?>
   
           </tbody>
   
           </table>
        </div>

	
    </div>
  
    <div id="schedule" class="pane_content">
	  
	  <form action='admin.php?/delete/' method='post' target='ajaxframe' id='mgrform'>
		<div class='error' style='width: 100%;'>&nbsp;</div>
        <div id="fieldsearch" style="float:left;width:90%;padding-left:15px;border:1px solid #aaa;">
            <div style='float:left;padding-left:10px;'>
            <input type="button" value="Add new schedule" class="button" onclick="addSchedule();"/>
            &nbsp;&nbsp;&nbsp;<input type="submit" value="Delete" class="button"/>
            </div>
		</div>
    <div style='float:left;width:100%;padding-left:50px;'>			
				<div class='seminar_date'>
					<table width='100%' cellpadding='7' cellspacing='7'>
					<?php
						$idx = array_keys($sched_array);
						$cnt = count($idx);
						$rows = ceil($cnt/2);
						$ctr = 0;
						for($i = 0; $i < $rows; $i++):
							echo "<tr>\n";
							for($j = 0; $j < 2; $j++):
								echo "<td valign='top'>\n";
								if($ctr < $cnt):
									$date_str = str_replace('_',' ', $idx[$ctr]);?>
									<!--<input type='radio' name='sched_id' value='<?php echo $date_str;?>'/>&nbsp;-->
                                    <?php echo $date_str;
									foreach($sched_array[ $idx[$ctr] ] as $sched):
										$seat_avail = $sched['max_seat'] - $total_booked[ $sched['id'] ];?>
										<div class='time'><input type='checkbox' name="sched_id[]" value='<?php echo $sched['id'];?>' <?php if($seat_avail < $sched['max_seat']):?>disabled<?php endif;?>/>&nbsp;
										<?php echo $sched['start_time'].' - '.$sched['finish_time'];?>&nbsp;&nbsp;
										(<?php echo $seat_avail;?> seats available)
										</div>
								<?php endforeach;
								endif;
								echo "</td>\n";
							$ctr++;
							endfor;
							echo "</tr>\n";
					endfor;?>
					</table>
					<br/><br/>
		

				</div>
			</div>
        
	  </form>
	</div>
  </div>
</div>


</td></tr>

</table>

<?php /* HIDDEN DIV TO DISPLAY CREATE/EDIT ADMIN */?>
<div id='addschedule' class='overlay'><span id='task-status'></span>

  <div id='divschedule' style='width:570px;padding:3px;border:1px solid #011a39;'>
	<div style='text-align:center;padding-left:10px;border:none;font-size:13px;font-weight:bold;'>New Schedule</div>
		<form id='schedform' name='schedform' method='POST' target='ajaxframe' action='admin.php?/new_sched/' style='padding:0px;'>
			
			<table width="100%" border='0' cellpadding="2" cellspacing="2" class="list" id="newtime">
			  
			  <tr><td class='form1'>Date of seminar: </td>
                <td class='form2'><input type="text" id="date_from" name="date_from" class="inputbox2" style="width:100px;" onchange="class_seat.checkBookDate();"/> <img align="absmiddle" src="/portal/images/calendar_ico.png" id="bd" style="cursor: pointer; " onMouseOver="this.style.background='red'" onMouseOut="this.style.background=''"/>
			     &nbsp;&nbsp; <a href='#' id='addtime'>add time</a></td></tr>
			  <tr><td class='form1'>Start Time:</td>
                <td class='form2'>
			   <select name="start_time[]" class="inputbox2">
				  <option value="0">-</option>
				<?php foreach($time_sel_value as $time_option):
					if( $time_option > 11.5 ) {
						$hrs = $time_option - 12;
						$ampm = 'pm';
					} else { $hrs = $time_option;
						$ampm ='am';
					}
					if( $hrs == 0 ) $hrs = 12;
                    //$time_val = str_replace('.5', ':30', $time_option);
                    $hrstr = sprintf('%02d', $hrs) ;//.
                    $hrstr .= strlen(substr(strrchr($hrs, '.'), 1)) ? ':30' : ':00';
                    ?>
					<option value='<?php echo $time_option;?>'><?php echo $hrstr . ' '. $ampm;?></option>
				<?php endforeach;?>
				</select> &nbsp;&nbsp;
			  Finish Time: <select name="finish_time[]" class="inputbox2">
				  <option value="0">-</option>
				  <?php foreach($time_sel_value as $time_option):
					if( $time_option > 11.5 ) {
						$hrs = $time_option - 12;
						$ampm = 'pm';
					} else { $hrs = $time_option;
						$ampm ='am';
					}
					if( $hrs == 0 ) $hrs = 12;
                    //$time_val = str_replace('.5', ':30', $time_option);
                    $hrstr = sprintf('%02d', $hrs) ;//.
                    $hrstr .= strlen(substr(strrchr($hrs, '.'), 1)) ? ':30' : ':00';
                    ?>
					<option value='<?php echo $time_option;?>'><?php echo $hrstr. ' '. $ampm;?></option>
				<?php endforeach;?>
				</select> &nbsp;&nbsp;Max. seat:<input type='text' name="max_seat[]" value='25' class='inputbox2' style='width:20px;'/>
			  </td></tr>

		  </table>
            <div style='width:100%;border:none;text-align:center;'><input type='submit' class='button' id='createbutton' value='Add New'> &nbsp;
            <input type='button' id='cancelmgr' class='button' value='Cancel' onClick="$('div#addschedule').hide();"></div>
		</form>
	</div>
	<script type="text/javascript">
	<!--
	function resetForm() {
        
    }
    function addSchedule() {
        $('div#addschedule').show();
    }
	function createResult(err_msg) {
		if( err_msg )
			$('span#task-status').empty().append(err_msg).show().fadeOut(6000);
		else {
			var seat_id = $('input#seat_id').val();
			var staff_id = $('input#staff_id').val();
			location.href='admin.php?tab=last';
		}
	}
	//-->
	</script>
</div>


</body>
</html>