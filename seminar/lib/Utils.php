<?php

class Utils
{
	private static $instance = NULL;
	public $db = NULL;
	private $offset;
	
	// get Singleton instance of Input class
	public static function getInstance() {
		if (self::$instance === NULL) self::$instance = new self;
		return self::$instance;
	}
	public function __construct() {
		$this->offset = NULL;
	}
	
	public function format_date($fieldname = 'booking_starttime', $format = '%Y-%m-%d') {
		if( $this->offset == NULL ) $this->offset = $this->get_tzOffset();
		return "date_format(date_add(from_unixtime($fieldname), interval ".$this->offset." HOUR), '$format')";
	}
	
	private function get_tzOffset($tz = '+08:00') {
		$currdate = strtotime( date("Y-m-d H:i:s") );
		if( isset($_SESSION['timezone']) ) $tz = $_SESSION['timezone'];
		// SET TIMEZONE AND HOURS OFFSET
		$this->db->query("SET time_zone = '{$tz}'");
		$newdate = strtotime( $this->db->fetchOne("SELECT NOW()") );
		$tzOffset = ($newdate - $currdate) / 3600;
		return $tzOffset;
	}
	
	/*public function get_tzOffset($tz = '+08:00') {
		$currdate = strtotime( date("Y-m-d H:i:s") );
		//if( isset($_SESSION['timezone']) ) $tz = $_SESSION['timezone'];
		$db_date = strtotime( $this->db->fetchOne("SELECT NOW()") );
		echo $db_date;
		// SET TIMEZONE AND HOURS OFFSET
		$this->db->query("SET time_zone = '$tz'");
		$newdate = strtotime( $this->db->fetchOne("SELECT NOW()") );
		echo '<br/>'.$newdate;
		$tzOffset = ($newdate - $db_date) / 3600;
		return $tzOffset;
	}*/
	
	public function getLocalTime ( $tzOffset ) {
		$offset = (int)$tzOffset;
		/*if( $offset != 0 )	$offset = $tzOffset*60*60; //converting offset to seconds.
		else $offset = 60*60;*/
		//$dateFormat="Y-m-d\TH:i:s\Z a";//"d-m-Y H:i e P O";
		//$timeNdate=gmdate($dateFormat, time()+$offset);
		$dow = gmdate('D', time()+$offset);
		$hour = gmdate ('g' , time()+$offset ) ;
		$minute	= gmdate ('i' , time()+$offset ) ;
		$second	= gmdate ('s' , time()+$offset ) ;
		$am = gmdate ('a' , time()+$offset ) ;

		return implode(',', array($hour, $minute,$second, "'".$dow."','".$am."'") );
	}
	
	public function check_admin_session() {
		$admin = array('admin_id'=>33, 'admin_fname'=>'Remote', 'admin_lname'=>'Testing');
		
		if( $_SESSION['admin_id'] ) {
			//$admin_id = $_SESSION['admin_id'];
			$sql = $this->db->select()->from('admin', array('admin_id', 'admin_fname', 'admin_lname'))
			->where('admin_id = ?' ,$_SESSION['admin_id']);
			$admin = $this->db->fetchRow($sql);
		} else {
			header("location:/portal/");
			exit();
		}
		return $admin;
	}
	
	public function send_email($subject, $msgbody = 'Empty Email', $to_email = '') {
		if( TEST ) {
			$subject = 'TEST '. $subject;
			//$to_email = 'devs@remotestaff.com.au';
		}
		$mail = new Zend_Mail('UTF-8');
		$mail->setBodyHtml($msgbody);
		$mail->setFrom('noreply@remotestaff.com.au', 'Remotestaff');
		if( !$to_email || TEST) $mail->addTo('devs@remotestaff.com.au', 'Development Team');
		else $mail->addTo($to_email);
		$mail->setSubject($subject);
		$mail->addHeader('Reply-To', 'seminar@remotestaff.com.ph');
		$mail->send();
	}
	
	public function logout() {
		$this->error = '';
		$this->booking_exists = 0;
		$this->booking_info = array();

		$_SESSION['userid']="";
		$_SESSION['emailaddr']="";

		session_destroy();
		//2012-12-06 redirected to portal
		header("location:/portal/");
		//header("location:/adhoc/php/as_login.php");
		exit;
	}
}// End Config class