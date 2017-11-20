<?php 
$hash_code = chr(rand(ord("a"), ord("z"))) . substr( md5( uniqid( microtime()) . $_SERVER[ 'REMOTE_ADDR' ] . $_GET['jr_cat_id'] ), 2, 17 );

function getAUSite(){
    try{
        global $base_au_url;
        return $base_au_url;
    } catch(Exception $e){

    }
    if(TEST){
        return "http://devs.remotestaff.com.au/";
    } else if(STAGING){
        return "http://staging.remotestaff.com.au";
    } else{
        return "http://www.remotestaff.com.au/";
    }
}
function getPHSite(){

    try{
        global $base_ph_url;
        return $base_ph_url;
    } catch(Exception $e){

    }

    if(TEST){
        return "http://devs.remotestaff.com.ph/";
    } else if(STAGING){
        return "http://staging.remotestaff.com.ph/";
    } else{
        return "http://www.remotestaff.com.ph/";
    }
}


?>



<!-- <div id="header">
	<div id="headerleft"><img src="/images/remote-staff-logo.jpg" width="700px" height="89px"/></div>

	<div id="headerright">
		<?php include 'home_pages_link.php';?>
		<a href="contactus.php"><img src="images/icon-contact3.png" border="0" /></a><br />
		Phone: +632 846 4249<br>
        <!--For Instant Interview Call Us Now:<br>+63947-995-9825<br />
        Text us at : +63917-533-8028<br />-->
        <!-- <a href="webchat.php?hash=<?php echo $hash_code; ?>" target="_blank">Click Here to Live Chat Now</a>
	</div>

</div> 
<br clear="all" /> -->
<div class ="container">
    <div id="header">
        <div class ="row">
            <div class = "col-lg-4">
            <img class = "rs-logo" src="/images/rs-fb-header.png"/>
            <div class = "rs-logo-content">Work from home jobs for Filipinos!</div>
            </div>
            <div class = "col-lg-4 text-center"> 
            <a type="button" href="<?echo getAUSite(); ?>" class = "btn btn-default employer-button">If you are an Employer, click here</a>
            <img class = "arrow-curve" src="/images/arror-curve.png"/>
            </div>
             <div class = "col-lg-4">
                <div class = "country-btn-group text-right"> 
                    <a type="button" href="<?echo getAUSite(); ?>" class="btn btn-default country-btn" >AUS</a>
                    <a type="button" href="<?echo getAUSite(); ?>" class="btn btn-default country-btn" >UK</a>
                    <a type="button" href="<?echo getPHSite(); ?>" class="btn btn-default country-btn active" >PH</a>
                    <a type="button" href="<?echo getAUSite(); ?>" class="btn btn-default country-btn" >IN</a>
                    <a type="button" href="<?echo getAUSite(); ?>" class="btn btn-default country-btn" >US</a>
                </div>
                <div class ="country-btn-group text-right">
                    <a href="contactus.php" style="color:#000000;text-decoration: none;"><img class = "contact-ph" src="/images/telephone.png"><span>+63 2 846 4249</span></a>
                </div>
                <div class ="country-btn-group text-right">
                    <a href="webchat.php?hash=<?php echo $hash_code; ?>" target="_blank">Click Here To Live Chat</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

