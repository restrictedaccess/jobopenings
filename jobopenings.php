<?php
include('conf/zend_smarty_conf.php');
include('conf/Curl.php');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
include('class.php');

$passGen = new passGen(5);

if(isset($_REQUEST['rv2'])&&isset($_REQUEST['pass3']))
{

	$pass3 = $_REQUEST['pass3'];
	$rv2 = $_REQUEST['rv2'];

	if(!$passGen->verify($pass3, $rv2)) {

		echo '1';
		exit;
	}
	else
	{
		echo '0';
		exit;
	}
}

//if(!$_GET['category_id']){
//	header("location:jobopenings.php?category_id=2&sub_category_id=3");
//	exit;
//}
function getAPIURL(){

    if(TEST){
        return "http://test.api.remotestaff.com.au";
    } else if(STAGING) {
        return "http://staging.api.remotestaff.com.au";
    }else {
		return "http://api.remotestaff.com.au";
	}
}

function getLink(){

    if(TEST){
        return "http://devs.remotestaff.com.au";
    } else if(STAGING) {
        return "http://staging.remotestaff.com.au";
    }else {
		return "https://remotestaff.com.au";
	}

    

}

function getLinkPH(){

    if(TEST){
        return "http://devs.remotestaff.com.ph";
    }
    else{
        return "www.remotestaff.com.ph";
    }
}

function geCategories()
{
	$sql = $db->select()
	  	->from('job_category')
	    ->where('status=?', 'posted');
		$cat = $db->fetchAll($sql);


	return $cat;
}
function getsubCategory($id)
{
		$get_sub_categories_sql = $db -> select()
                              -> from(array('p'=>'posting'),array('p.sub_category_id'))
                              -> joinLeft(array('jsc'=>'job_sub_category'), 'p.sub_category_id = jsc.sub_category_id', array('jsc.sub_category_id AS sub_category_id', 'jsc.sub_category_name'))
                              -> where('jsc.category_id=?', $id)
                              -> group('jsc.sub_category_id');
							  $sub_cat = $db -> fetchAll($get_sub_categories_sql);

		return $sub_cat;
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BPO Company Remote Staff Official Website | Hire Offshore Staff from Remote Staff | Outsource Staff, Inexpensive and Professional Online Staff, Virtual Assistant and IT Offshore Outsourcing BPO Services</title>
<meta name="description" content="Outsource staff, inexpensive offshore staff, online staff and Virtual assistant working for you at $4 to $8 per hr, and you don't pay for holidays and sick pay. Save up to 70% off your labour cost with our IT Offshore Outsourcing Services we offer">
<meta name="keywords" content="outsource staff, hire offshore staff, offshore staff, online staff, virtual assistant, IT offshore, offshore outsourcing, outsourcing services, offshore services, remote staff, BPO company, BPO Australia, outsourced staff, offshore labour, offshore hire, offshore labour hire, IT offshore outsourcing, IT offshore staff, labour cost, offshore outsourcing services, outsource offshore, outsource services, IT outsourcing services">
<meta name="ROBOTS" content="NOODP">
<meta name="GOOGLEBOT" content="NOODP">
<meta name="title" content="Hire Offshore Staff from Remote Staff | Outsource Staff, Online Staff, Virtual Assistant and IT Offshore Outsourcing Services BPO Company">
<meta name="classification" content="Outsource staff, inexpensive offshore staff, online staff and Virtual assistant working for you at $4 to $8 per hr, and you don't pay for holidays and sick pay. Save up to 70% off your labour cost with our IT Offshore Outsourcing Services we offer">
<meta name="author" content="Remote Staff | Chris J">
<meta name="robots" content="NOYDIR">
<meta name="slurp" content="NOYDIR">
<meta name="robots" content="index all,follow all">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Content-Language" content="en-gb">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="js/jquery-ui-1.11.4.custom/jquery-ui.css">
<link href="css/style.css" type="text/css" rel="stylesheet"  />
<link href="css/rsscroll-staff.css" type="text/css" rel="stylesheet" />
<link href="css/search_for_ads.css" rel="stylesheet">

<script language="javascript">

function listmax(idx,idy,idz){
//document.getElementById(idx).style.display = 'block';
toggle(idx);
document.getElementById(idy).style.display = 'none';
document.getElementById(idz).style.display = 'block';
}

function listmin(idx,idy,idz){
toggle(idx);
//document.getElementById(idx).style.display = 'none';
document.getElementById(idy).style.display = 'none';
document.getElementById(idz).style.display = 'block';
}

function MinMax(id){

	obj = document.getElementById('tr_'+id);
	obj.style.backgroundImage = (obj.style.backgroundImage == 'url("images/avail-staff-left-title-expanded-new.png")') ? 'url("images/avail-staff-left-title-expanded-new.png")' : 'url("images/avail-staff-left-title-expanded-new.png")';
	toggle('tr_sub_'+id);

}

</script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>

</head>
<body class="sub-bg" id="jobopen">
	<?php include("inc/header.php"); ?>
<div id="container">
    <input id="baseAPIurl" type="hidden" value='<?php echo getAPIURL();?>'/>
    <input id="baseLink" type="hidden" value='<?php echo getLink();?>'/>
    <input id="baseLinkPH" type="hidden" value='<?php echo getLinkPH();?>'/>
    <input id="staffLink" type="hidden" value='<?php echo getLinkPH();?>'/>

    <?php if(isset($_REQUEST['sub_category_id'])){  ?>
    	<input id="request_id" type="hidden" value='<?php echo $_REQUEST['sub_category_id'];?>'/>
    <? } ?>


  <!--  End of Header -->
<?php include("inc/nav.php"); ?><!-- End of Navigation -->

<div id="main-image" style="width:90%;">

    <center style="margin-left:27px;">
        <!-- <table width="100%" style="padding:0;margin-left: 105px;">
            <tr>
                <td style="text-align:right;margin-left: 7%;">
                    <label style="color: #165394;;font-weight: bolder;font-size: 13px;">SEARCH JOBS&nbsp;</label>
                </td>
                <td style="text-align:right;">
                    <div class="searchlink" id="searchlink">
                    <div class="searchform">
                         <input type="text" class="s" id="s" placeholder="Enter Keyword(s)">
                    </div>
                 	</div>

                </td>
                <td>
                	<input type='checkbox' name="work_status" value="Full Time">&nbsp;
                	<label>Full Time</label>
                	<input type='checkbox' name="work_status" value="Part Time">&nbsp;
                	<label>Part Time</label>
                </td>
            </tr>
        </table> -->
        <table style="width: 100%; margin-left: 220px;">

        				<tr>
        					<td style="width:500px;">

									<div class="row" style="width:500px">
								        <div>
								            <div id="imaginary_container">
								                <div class="input-group stylish-input-group">
								                    <input id="s" type="text" class="form-control"  placeholder="Search Jobs by Position,Skills or Keywords" >
								                    <span class="input-group-addon">
								                        <button type="submit" id="search_ads">
								                            <span class="glyphicon glyphicon-search"></span>
								                        </button>
								                    </span>
								                </div>
								            </div>
								        </div>
									</div>

        					</td>
        					<td>
	    						<select id='work_status_filter' class="selectpicker show-menu-arrow">
								  <option value="0">Both Full Time and Part Time</option>
								  <option value="Full-Time">Full Time</option>
								  <option value="Part-Time">Part Time</option>
									</select>

        					</td>
				</tr>

        </table>

       </center>

    	<div style="float: right; margin-right: -99px; margin-top: 26px; z-index: 2; position: relative">

    		<table>
    			<tr>
    				<td>
    					<label style="font-weight: inherit;font-size: 11px">Sort By:</label>&nbsp;
    				</td>
    				<td style="padding: 5px;">


    					<div id='full' style="display:none;"><button class="sort_status" value="0">Full-Time <i class="glyphicon glyphicon-sort-by-alphabet"></i></button></div>
    					<div id='part'><button class="sort_status" value="1">Part-Time <i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></button></div>

    					<!-- <div id='full'><button id='sort_status' title="Sort by Full Time" value='0' class="btn btn-sort_stat" >Full Time <i class="glyphicon glyphicon-sort-by-alphabet"></i></button></div>

    					<div id='part' style="display:none;"><a id='sort_status'
   						title="Sort by Full Time" value='1' class="btn btn-sort_stat"><i class="glyphicon glyphicon-sort-by-alphabet-alt"></i> Part Time</a></div> -->

    					<!-- <select id="sort_status" class="selectpicker show-menu-arrow">
								  <option value="0">Full Time</option>
								  <option value="1">Part Time</option>
						</select> -->
    				</td>
    				<td>

    					<div id='home' style="display:none;"><button class="sort_location" value="0">Home Office <i class="glyphicon glyphicon-sort-by-alphabet"></i></button></div>
    					<div id='office'><button class="sort_location" value="1">Office Location <i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></button></div>

    					<!-- <select id="sort_location" class="selectpicker show-menu-arrow">
								  <option value="0">Home Base</option>
								  <option value="1">Office Location</option>
						</select>	 -->
    				</td>
    			</tr>
    		</table>
    	</div>
</div>
<!-- End of Main Image -->

<div id="contents">

<div id="astaffleft" style="width: 24% ! important;">
<h2 style="text-align: left;">Job Openings</h2>
<h3 style="font-size:14px; text-align:left; line-height:18px;">Only registered job seekers with Remotestaff are able to apply for job openings.</h3>
<? if($_SESSION['userid']) { ?>
	 <input id="isSession" type="hidden" value="1"/>
	 <input id="sessionID" type="hidden" value="<? echo $_SESSION['userid'];?>"/>
	<h3 style="font-size:14px; text-align:left; line-height:18px;"><a href='logout.php'>Log out</a></h3>
<? }else {?>
	<input id="isSession" type="hidden" value="0"/>
<h3 style="font-size:14px; text-align:left; line-height:18px;"><a href="http://www.remotestaff.com.ph/register/">Register Now</a> or <a href="http://www.remotestaff.com.au/portal/">Login</a>.</h3>
<? } ?>
<div id="staffclass" style="font-size:97%;width:217px">
	<table width="100%" cellpadding="0" cellspacing="0">

					<?php

						$sql = $db->select()
						  ->from('job_category')
						    ->where('status=?', 'posted');
						$categories = $db->fetchAll($sql);
						foreach($categories as $category){
						if($_GET['category_id'] == $category['category_id']){
						  $display = "block";
						}else{
						  $display = "none";
						}

					?>
					<tr id="tr_<?php echo $category['category_id'];?>" style="background:url(images/avail-staff-left-title-expanded-new.png);background-repeat: no-repeat;background-size: 104% auto;">
					<td  height="40" align="right" style="padding-right:5px; color:#FFFFFF; font-weight:bold; cursor:pointer;width:20%" onclick="MinMax(<?php echo $category['category_id'];?>)"><?php echo $category['category_name'];?>
					</td>
					</tr>
					<tr>
					<td align="right" style="padding-right:5px;">
					<div id="tr_sub_<?php echo $category['category_id'];?>" style="display:<?php echo $display;?>">
						<ul>
							<?php

								 $get_sub_categories_sql = $db -> select()
		                              -> from(array('p'=>'posting'),array('p.sub_category_id'))
		                              -> joinLeft(array('jsc'=>'job_sub_category'), 'p.sub_category_id = jsc.sub_category_id', array('jsc.sub_category_id AS sub_category_id', 'jsc.sub_category_name'))
		                              -> where('jsc.category_id=?', $category['category_id'])
		                              -> group('jsc.sub_category_id');



	                              	 // $get_sub_categories_sql = $db -> select()
		                              // -> from(array('p'=>'posting'),array('p.sub_category_id'))
		                              // -> joinLeft(array('jsc'=>'job_sub_category'), 'p.sub_category_id = jsc.sub_category_id', array('jsc.sub_category_id AS sub_category_id', 'jsc.sub_category_name'))
		                              // -> where('jsc.category_id=?',$category["category_id"])
							  		  // ->where('(SELECT COUNT(*) FROM posting WHERE status="ACTIVE" and show_status="YES" and sub_category_id=jsc.sub_category_id and category_id = p.category_id)<>0')
		                              // -> group('jsc.sub_category_id');



    							$get_sub_categories = $db -> fetchAll($get_sub_categories_sql);
							  	$counter =0;
								foreach($get_sub_categories as $get_sub_category){
								 $counter++;
 							?>

							<li style="cursor:pointer;" id="sub_cat" data-cat_name="<?php echo $category['category_name'];?>" data-sub_cat="<?php echo $get_sub_category['sub_category_id'];?>">
								<?php echo $get_sub_category['sub_category_name'];?>
							</li>
							<?php } ?>
						</ul>
					</div>
					</td>
					</tr>
					<?php }?>
				</table>

</div>
</div>
</div>

<div id="contents2">
</div>
</div>
<?php include('inc/footer.php'); ?>



<div id="blackOut" style="display:none;">
</div>
<div id="whiteBox" style="display:none;">
</div>
<div id="prompt" style="display:none;"></div>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">

      <!-- Modal content-->
   <div id='applyCont'>
      <div class="modal-content" style="width:700px;max-height:800px;">
        <div class="modal-header" style="background-color: #337ab7;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id='modal_status' class="modal-title" style='text-align:left;color:white;'>Modal Header</h4>

        </div>

        <div class="modal-body" style="height: 620px;max-height:700px">
          <h3 style="margin-left:-1px;">Job Details:</h3>
          <label style="font-weight:500">Work Status: <span id='work_status'><b></b></span></label><br>
       	  <label style="font-weight:500">Level: <span id='level'><b></b></span></label><br>
          <label style="font-weight:500">Work Schedule: <span id='sched'><b></b></span></label><br>
          <label style="font-weight:500">Work Location: <span id='model'><b></b></span></label><br>
          <label style="font-weight:500">No. of staff needed: <span id='staff'><b></b></span></label>
          <hr style="margin-top:5px !important;">
          <h3 style="margin-left:-1px;">Job Summary:</h3>
          <div id='ads_cont' style="overflow-y:auto;overflow-x: hidden;height:400px;">
          <div id='modal_heading'></div><br>
          <!-- <div id='modal_req'></div> -->
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <table id='modal_action' style="float: left; width: 101%; margin-left: -37px;">
          	<tr>
          		<td>
          			<div id='applycont'><button type="button" class="btn btn-w-m btn-primary" id="apply" style="margin:0px; width: 200px;">APPLY NOW</button></div>
          		</td >
          		<td style="text-align: left; width: 115px;">
          			<a id='fb_href' href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook" style="margin-left: 10px;width:100px"><i class="fa fa-facebook"></i> Facebook</a>

          		</td>
          		<td style="text-align: left;">
          			<a id='twit_href' href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank" class="btn btn-twitter" style="width:100px"><i class="fa fa-twitter"></i> Twitter</a>

          		</td>
          		<td style="text-align: left;">
					<a id='email_href' href="mailto:?subject=;body=."
   					title="Share by Email" target="_blank" class="btn btn-email" style="margin-left:-11px;width:100px"><i class="fa fa-envelope"></i> Email</a>
          		</td>
          		<td>
          			<a id='copyLink' data-toggle="popover" data-placement="top" class="btn btn-copylink" style="margin-left:-22px"><i class="fa fa-link"></i> Copy Link</a>
          		</td>
          	</tr>
         </table>
        </div>
      </div>
     </div>

    <div id='newuserCont' style="display:none;">
 	  <div class="modal-content" style="width:700px;max-height:800px;">
        <div class="modal-header" style="background-color: #337ab7;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 id='modal_status' class="modal-title" style='text-align:left;color:white;'><i id='back_new' class="fa fa-chevron-left"></i> Back to Job Postion details</h4>

        </div>


      <form name="register" action='<?php echo getLink();?>/portal/jobseeker_register/finalize_step2.php' method="post" id="register" role="form" enctype="multipart/form-data" target="hiddenFrame">
        <div class="modal-body" style="height: 620px;max-height:700px">

        			<input type="hidden" id="userid_2" name="userid">
     				<input type="hidden" id="on_ph" name="on_ph" value="on_ph">

					<div class="form_box">
						<input type="hidden" value="0" id="apply_type" name="apply_type">
						<div id="desclaimer" style="margin-top: -35px; padding-bottom: 24px; font-weight: bold;">

						</div>

						<div style="padding-bottom: 9px;">
							<label>Full Name<span style="color:red">*</span>:</label>
							<input placeholder="Enter Your Name" id="name" name="name" required="required" type="text">
						</div>

						<div style="padding-bottom: 9px;">
							<label>Email<span style="color:red">*</span>:</label>
							<input placeholder="Enter Your Email Address" id="email" name="email" required="required" type="email">
						</div>

						<div style="padding-bottom: 9px;">
							<label>Current Job Title<span style="color:red">*</span>:</label>
							<input placeholder="Enter Your Job Title" id="job_title" name="job_title" type="text">
						</div>

						<div style="padding-bottom: 9px;">
							<label>CV<span style="color:red">*</span>:</label>
							<input type="file" id="resume" name="resume" required="required">
						</div>

						<div style="padding-bottom: 9px;">
							<label style='width:100%'>For validation, type the numbers you see<span style="color:red">*</span>:</label>
							<?php  $rv2 = $passGen->password(0, 1); ?>
							<input type="hidden" value="<?php  echo $rv2 ?>" name="rv2" id="rv2">
							<table>
								<tr>
									<td>
										<div>
										<?php  echo $passGen->images('./font', 'gif', 'f_', '20', '20'); ?>
										</div>
									</td>
									<td>
										<input type="text" value="" name="pass3" id="pass3"  style="width:80px;" maxlength="5" required="required">
									</td>
								</tr>
							</table>
						</div>

					</div>
					<br>

			</div>
			<div class="modal-footer">
	         		<table style="width:100%">
	         			<tr>
	         				<td>
	         					<div id='applycont'><button type="submit" class="btn btn-w-m btn-primary" id="apply_new" style="margin:0px; width: 200px;float:left;margin-left:-4px;">Sign Up and Apply</button></div>
	         				</td>
	         				<td style="font-size:12px;">
	         					Already on RemoteStaff?&nbsp;<a id="login_apply" style="cursor:pointer;">Login and Apply</a>
	         				</td>
	         			</tr>
	         		</table>
	        	</div>

        	</form>
     </div>

     <form name="skill_test" action='ThankYouPage.php' method="post" id="skill_test" role="form" enctype="multipart/form-data" >
     		<input type="hidden" id="userid" name="userid">
			<input type="hidden" id="_id" name="_id">


     </form>

    </div>

    <div id="euser_cont" style="display:none">
    	<div class="modal-content" style="width:700px;max-height:400px;">
        <div class="modal-header" style="background-color: #337ab7;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 id='modal_status' class="modal-title" style='text-align:left;color:white;'><i id='back_new2' class="fa fa-chevron-left"></i> Back to Job Postion details</h4>

        </div>

      <form name="login" action='ThankYouPage.php' method="post" id="login" role="form" enctype="multipart/form-data">
        <div class="modal-body" style="height: 200px;max-height:400px">
					<div class="form_box" style="margin-top: 18px;">
						<input type="hidden" value="1" id="apply_type" name="apply_type">
						<input type="hidden" id="job_title" name="job_title">
						<input type="hidden" id="userid" name="userid">
						<input type="hidden" id="mon_cnt" name="mon_cnt">
						<? if(isset($_SESSION['_id'])) { ?>
							<input type="hidden" id="_id" name="_id" value="<? echo $_SESSION['_id'];?>">
						<? }else{ ?>
					    <input type="hidden" id="_id" name="_id" >
					    <? } ?>
						<div>
							<label>Email<span style="color:red">*</span>:</label>
							<input placeholder="Enter Your Email Address" id="email2" name="email2" required="required" type="email">
						</div>

						<div>
							<label>Password<span style="color:red">*</span>:</label>
							<input placeholder="Enter Password" id="password" name="password" type="password">
						</div>

						<div style="margin-left:150px">
							<a id="forgot_pass" target="_blank" style="cursor:pointer;font-size: 12px">Forgot Password?</a>
						</div>

					</div>
					<br>
			</div>
			<div class="modal-footer">
	         		<table style="width:100%">
	         			<tr>
	         				<td>
	         					<div id='applycont'><button type="submit" class="btn btn-w-m btn-primary" id="loginApply" style="margin:0px; width: 200px;float:left;margin-left:-4px;">Login and Apply</button></div>
	         				</td>
	         			</tr>
	         		</table>
	        	</div>

        	</form>
     </div>
    </div>

  </div>
</div>


<div id="dialog">
</div>
<iframe name="hiddenFrame" width="0" height="0" border="0" style="display: none;"></iframe>

<?php include('templates/jobAd_template.html'); ?>
</body>


<!-- <script type="text/javascript" src="js/hilitor.js"></script>   -->


<script type="text/javascript" src="js/jquery.toaster.js"></script>
<script type="text/javascript" src="js/MochiKit.js"></script>
<script language=javascript src="js/functions.js"></script>
<script type="text/javascript" src="js/ga_tracking_code.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script type="text/javascript" src="js/handlebars.js"></script>
<script type="text/javascript" src="js/HandleBarsExt.js"></script>
<script type="text/javascript" src="js/search_for_ads.js"></script>







</html>
