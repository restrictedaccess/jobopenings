<?php


$motnh_array = array("Month","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
for($i=0; $i<count($motnh_array);$i++){
	
	$monthOptions.="<option value=".$i.">".$motnh_array[$i]."</option>";
}

for($i=1;$i<32;$i++){
	$dayOptions .="<option value=".$i.">".$i."</option>";
}

$identification_array = array("SSS ID","TIN","Passport","Postal ID","Drivers License","PRC ID");
for($i=0; $i<count($identification_array);$i++){
	$identificationOptions .="<option value=\"".$identification_array[$i]."\">".$identification_array[$i]."</option>";
}


$sql = $db->select()
	->from('country')
	->order('printable_name');
$countries = $db->fetchAll($sql);	
foreach($countries as $country){
	
	$nationalityOptions .= "<option value=\"".$country['printable_name']."\">".$country['printable_name']."</option>";
	$countryOptions .= "<option value=\"".$country['iso']."\">".$country['printable_name']."</option>";
	
}

?>


<div><img src="images/home-register-now-to-remotestaff.jpg"  /></div>
<?php
if ($recruiters_promo_code){
	if (TEST){
		?>
		<form name="register" id="register" action='http://test.remotestaff.com.au/portal/application_form/registernow-step1-personal-details.php?promo_code=<?php echo $recruiters_promo_code?>' method="post">				
		<?php
	}else{
		?>
		<form name="register" id="register" action='https://remotestaff.com.au/portal/application_form/registernow-step1-personal-details.php?promo_code=<?php echo $recruiters_promo_code?>' method="post">
		<?php
		
	}
?>
<?php
}else{
?><?php
	if (TEST){
		?>
		<form name="register" action='http://test.remotestaff.com.ph/register/' method="post">
		<?php
	}else{
		?>
		<form name="register" action='http://remotestaff.com.ph/register/' method="post">
		<?php
	}	
}?>
<div id="formbox" style="padding-top:10px;">
<input name="ph_form" id="ph_form" type="hidden" />
<input type="hidden" name="promo_code" value="<?php echo $recruiters_promo_code?>" id="staff_promo_code"/>
<p>First Name:<br /><input name="fname" id="staff_fname" type="text" class="tfields" /></p>
<p>Last Name:<br /><input name="lname" id="staff_lname" type="text" /></p>
<p>Email Address:<br /><input name="email" id="staff_email" type="text" /></p>
<p>Date of Birth<br />
<select name="bmonth" id="bmonth">
<?php echo $monthOptions;?>
</select>
<select name="bday" id="bday">
<option value="0">Day</option>
<?php echo $dayOptions;?>
</select>
<input type="text" name="byear" id="byear" class="ihalf" size="4" style="width:50px;" maxlength="4" />
</p>
<p>Identification ( optional )<br />
<select name="auth_no_type_id" id="identification">
<?php echo $identificationOptions;?>
</select>
<input id="identification_number" name="msia_new_ic_no" type="text" size="20" style="width:80px;" />
</p>
<p>Gender <input name="gender" checked="checked" type="radio" value="Male" style="width:15px;" />Male <input name="gender"  type="radio" value="Female" style="width:15px;" />Female</p>
<p>Nationality<br /><select name="nationality" id="nationality" style="width:200px;"><option value="">Select</option><?php echo $nationalityOptions;?></select></p>
<p >Permanent Residence in : ( optional )<br />
<select name="permanent_residence" id="permanent_residence" style="width:200px;">
<option value="">Select</option>
<?php echo $countryOptions;?>
</select>
</p>
<p align="center">
<span style="text-align:center;color:#55707e;font-size:11px;">For validation, type the numbers you see</span> <br />

<?php  $rv = $passGen->password(0, 1); ?>
<input type="hidden" value="<?php  echo $rv ?>" name="rv" id="rv">
<?php  echo $passGen->images('./font', 'gif', 'f_', '20', '20'); ?>	  
<input type="text" value="<?php if (!empty($pass)) { echo $pass; }?>" name="pass2" id="pass2"  style="width:80px;" maxlength="5">
</p>

<br />
<div id="application_result" style="text-align:center;color:#ff0000;"></div>
<p id="reg_btn" style="text-align:center">
<!--<img src="images/btn-clicknext.png" onclick="RegisterApplicant()" style="cursor:pointer;" />-->
<img src="images/btn-clicknext.png" onclick="document.register.submit()" style="cursor:pointer;" />
</p>
</div>
</form>

