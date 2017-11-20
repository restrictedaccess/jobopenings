<?php

/* class_users.php 2012-03-12 $ */
include '../portal/lib/validEmail.php';

class SeminarUsers {
    private $db;
	private $table = 'seminar_users';

    private $userid;
	
	public $user_info;
	public $user_exists;
	public $_error;
	private static $instance = NULL;
	private $_salt;
	
	public static function getInstance($db) {
		if (self::$instance === NULL) {
			self::$instance = new self($db);
		}
        return self::$instance;
    }
    
    function __construct($db, $unique = array(0, '')) {

        $this->db = $db;
		
		$select_fields = '*'; //'userid, fname, lname, image, email, pass, handphone_no,skype_id';
		
		$this->user_exists = 0;
		$this->user_info['id'] = 0;
		$this->_error = '';
		
		$this->utils = Utils::getInstance();
		
		//$this->_salt = "$1$"."remote123"."$";
		
		if($unique[0] != 0 || $unique[1] != "" ) {
			
			$user_email = strtolower($unique[1]);
					
			$sql_array = array();
			
			if( !empty($unique[0]) )
			  $sql_array[] = "SELECT {$select_fields} FROM ". $this->table. " WHERE id={$unique[0]} LIMIT 1";
		  
			if( !empty($unique[1]) )
			  $sql_array[] = "SELECT {$select_fields} FROM ". $this->table. " WHERE LOWER(email)='{$user_email}' LIMIT 1";
		  

			if( count($sql_array)>1 )
			  $query = '('.join(') UNION (', $sql_array).')';
			else
			  $query = $sql_array[0];
			  
			
			//echo $query;
			
			$this->user_info = $this->db->fetchRow($query);
			
			if( $this->user_info['id'] > 0 ) {
				$this->user_exists = 1;
			}
		
		}

    }
	
	public function user_create($data_array = array()) {
	  $this->db->insert($this->table, $data_array);
	  return $this->db->lastInsertId($this->table);	
	} // END admin_create() METHOD
	
	public function user_displayname() {
		if( $this->user_info['fname'] ) $display = $this->user_info['fname'];
		else $display = $this->user_info['email'];
		return $display;
	}
	
	
	function user_account($email, $fname, $lname, $telno, $sched_id) {
		// CHECK FOR EMPTY FIELDS
		if(!$this->_error && (trim($email) == "" || trim($fname) == "" || trim($lname) == "")
		   || $telno == "" || !$sched_id) {
			$this->_error = 'Required fields must not be empty';
		}

		if(!$this->_error && !validEmail($email) ) $this->_error = 'Invalid email address';

		// CHECK FOR DUPLICATE EMAIL
		$lowercase_email = strtolower($email);
		if(!$this->_error &&
		   strtolower($this->user_info['email']) != $lowercase_email &&
		   $this->db->fetchOne("SELECT email FROM ".$this->table." WHERE email='$email'") != "") {
			$this->_error = 'Email already in used';
		}
		
	}
	
	public function fetchAll($sched_id = NULL) {
		$query = "SELECT * FROM " .$this->table;
		if( $sched_id !== NULL ) $query .= " WHERE sched_id = $sched_id";
		return $this->db->fetchAll($query);
	}
	
	public function total_sched_id($sched_id = NULL) {
		$query = "SELECT * FROM " .$this->table;
		if( $sched_id !== NULL ) $query .= " WHERE sched_id=$sched_id";
		$result = $this->db->fetchAll($query);

        $total_array = array();
        foreach( $result as $res ) {
			$total_array[ $res['sched_id'] ] = $total_array[ $res['sched_id'] ] + 1;
        }
		return $total_array;
	}
	
	public function jobseeker_login($emailaddr, $password) {
		$sql = $this->db->select()
            ->from('personal', array('userid','fname','lname','handphone_no'))
            ->where('email = ?', $emailaddr)
            ->where('pass = ?', sha1($password));
        $personal = $this->db->fetchRow($sql);
        
		echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><script type='text/javascript'>";
        if ($personal) {
			$userid = $personal['userid'];
            $_SESSION['userid'] = $userid;
            $_SESSION['emailaddr'] = $emailaddr;
			$_SESSION['seminar_login'] = 'jobseeker';
            // RUN JAVASCRIPT TO UPDATE MAIN PAGE            
            echo 'window.parent.populatejs('.$userid.',"'.$personal['fname'].'","'.$personal['lname'].'","'.$emailaddr.'","'.$personal['handphone_no'].'");';            
        }
        else {
            echo 'alert("Email / Password does not match!");';
        }
		echo "</script></head><body></body></html>";
        exit;
	}
	
	public function search_by_keyword($fldname = 'fname', $substr = NULL) {
		$sql = $this->db->select()
            ->from($this->table)
            ->where("locate('$substr', $fldname) > 0");

        return $this->db->fetchAll($sql);
	}
}



?>