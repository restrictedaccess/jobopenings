<?php
/* livechat.php  // 2010-08-19 *//*header("Expires: Wed, 17 Jul 1997 05:00:00GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");*/
require_once('./conf/zend_smarty_conf.php');

$hostname = $_SERVER['HTTP_HOST'];
$ipaddr = $_SERVER['REMOTE_ADDR'];

$ip2v4 = str_replace(":", "", strrchr($ipaddr, ":")); 
if (!$ip2v4) $ip2v4 = $ipaddr;

$query = "SELECT cc, cn FROM ip NATURAL JOIN cc WHERE ". sprintf("%u", ip2long($ip2v4)) . " BETWEEN start AND end ";
$row = $db->fetchRow($query);
$cntry_name = $row['cn'];
?>

<!-- saved from url=(0014)about:internet -->
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--  BEGIN Browser History required section --><link rel="stylesheet" type="text/css" href="https://remotestaff.com.au/portal/history/history.css" /><!--  END Browser History required section -->
<title>RS LiveChat (Beta)</title><script src="https://remotestaff.com.au/portal/AC_OETags.js" language="javascript"></script>
<!--  BEGIN Browser History required section --><script src="https://remotestaff.com.au/portal/history/history.js" language="javascript"></script>
<!--  END Browser History required section -->

<style>body { margin: 0px; overflow:hidden }</style><script language="JavaScript" type="text/javascript"><!--// -----------------------------------------------------------------------------// Globals// Major version of Flash required
var requiredMajorVersion = 10;
// Minor version of Flash required
var requiredMinorVersion = 3;
// Minor version of Flash required
var requiredRevision = 0;

var repeat=1;
var sender;
var title=document.title;
var leng;
var start=1;

function initDoc(sendername) {
  document.title = ' ' + sendername + ' sent you a message ';
  alert_title = document.title;
  leng=alert_title.length;
}

function titlemove() {
  titl=alert_title.substring(start, leng) + alert_title.substring(0, start);
  document.title=titl;
  start++;
  if (start==leng+1) {
     start=0;
     if (repeat==0)
     return;
  }
 movetitle = setTimeout("titlemove()",170);
}

function resetTitle() {
	clearTimeout(movetitle);
	document.title = title;
}
// -----------------------------------------------------------------------------// --></script></head>
<body scroll="no">
<script language="JavaScript" type="text/javascript">
<!--
// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);
// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

if ( hasProductInstall && !hasRequestedVersion ) {
	// DO NOT MODIFY THE FOLLOWING FOUR LINES
	// Location visited after installation is complete if installation is required
	var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
	var MMredirectURL = window.location;
    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
    var MMdoctitle = document.title;

	AC_FL_RunContent(
		"src", "playerProductInstall",
		"FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
		"width", "100%",
		"height", "100%",
		"align", "middle",
		"id", "webchat",
		"quality", "high",
		"bgcolor", "#869ca7",
		"name", "webchat",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "http://vps01.remotestaff.biz:5080/remote/livechat/webchat",
			"width", "100%",
			"height", "100%",
			"align", "middle",
			"id", "webchat",
			"quality", "high",
			"bgcolor", "#869ca7",
			"name", "webchat",
			"flashvars", "hostname=<?php echo $hostname ?>&ipaddr=<?php echo $cntry_name ?>",
			"allowScriptAccess","always",
			"type", "application/x-shockwave-flash",
			"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
  } else {  // flash is too old or we can't detect the plugin
    var alternateContent = 
	"<\?xml version=\"1.0\" encoding=\"UTF-8\"?>"
+ "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">"
+ "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">"
+ "<head><title>Remotestaff Chat</title></head>"
+ "<body  style='margin-left:auto;margin-right:auto'><div id='rslogo' style='padding-left:50px;width:483px;height:61px;margin-left:50px;margin-right:auto;background-image:url(images/remote-staff-logo2sm.jpg); background-repeat:no-repeat;'></div>"
+ "<div id='content' style='text-align:justify;padding-left:50px;margin-left:auto;margin-right:auto;float:left;margin-top:100px;'>"
+ "You need Adobe Flash Player toactivate chat. Get Flash Player for free <a href='http://www.adobe.com/go/getflash/'>HERE.</a><br/><br/>"
+ "If you don't wish to do this, please call us on our numbers below or quickly fill out the inquiry"
+ "form <a href='contactus.php' target='_blank'>HERE.</a>  We will get back to you within 24 business hours."
+ "<p>Australia: 1-300-733-430</p><p>"
+ "United Kingdom: +44 209-386-9010</p>"
+ "USA: 1-800-760-5113<p>"
+ "Or call us from anywhere at +61 3 9017 2828</p>"
+ "</div></body></html>";

    document.write(alternateContent);  // insert non-flash content
  }
// -->
</script>
<noscript>
  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
			id="webchat" width="100%" height="100%"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="http://vps01.remotestaff.biz:5080/remote/livechat/webchat.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#869ca7" />
			<param name="allowScriptAccess" value="always" />
			<param name="flashvars" value="hostname=<?php echo $hostname ?>&ipaddr=<?php echo $cntry_name ?>" />
			<embed src="http://vps01.remotestaff.biz:5080/remote/livechat/webchat.swf" flashvars="hostname=<?php echo $hostname ?>&ipaddr=<?php echo $cntry_name ?>" quality="high" bgcolor="#869ca7"
				width="100%" height="100%" name="webchat" align="middle"
				play="true"
				loop="false"
				quality="high"
				allowScriptAccess="always"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>
</body>
</html>

<?php
 $_SESSION['firstrun'] = "chat autologin";
?>
