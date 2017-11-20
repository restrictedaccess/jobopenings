<?php
/* $Id: class_booking.php 2012-02-21 $ */

//  THIS CLASS CONTAINS SEAT BOOKING METHODS.
// This would be the model file
//include_once('activecalendar.php');
include_once('../portal/lib/paginator.class.php');

class SeminarSchedule {
    private $db;
	private $table = 'seminar_schedules';

    private $id;
	
	public $schedule_info;
	
	public $start_tstamp;
	public $finish_tstamp;
	public $is_error;
	private static $instance = NULL;
	private $utils = NULL;
	
	// return Singleton instance of MySQL class
	public static function getInstance($db) {
		if (self::$instance === NULL) {
			self::$instance = new self($db);
		}
        return self::$instance;
    }

    public function __construct($db) {		
        $this->db = $db;
		$this->is_error = 0;
		
		$this->utils = Utils::getInstance();
		$this->utils->db = $db;
    }
	
	// get booking schedule for specific date
	public function schedule_get($date = NULL) {
        $start_qstr = $this->utils->format_date('start_time', '%M %e, %Y - %l:%i%p');
        $finish_qstr = $this->utils->format_date('finish_time', '%l:%i%p');
		
		$start_val_qstr = $this->utils->format_date('start_time', '%H:%i');
        $finish_val_qstr = $this->utils->format_date('finish_time', '%H:%i');
		
		$query = "SELECT id, $start_qstr start, $finish_qstr finish, max_seat,
		$start_val_qstr start_val, $finish_val_qstr finish_val FROM " .$this->table;
		
		
		$result = $this->db->fetchAll($query);
		//print_r($result);
		$sched_array = array();
		
		foreach($result as $sched) {
			$datetime = explode(' - ', $sched['start']);
			$idx = str_replace(' ', '_', $datetime[0]);
			
			if( $date !== NULL ) {
				$date_inp = str_replace(' ', '_', $date);
				if( $date_inp != $idx ) continue;
			}
			
			$sched_array[ $idx ][] = array('id' => $sched['id'], 'max_seat' => $sched['max_seat'],
				'start_time' => $datetime[1], 'finish_time' => $sched['finish'],
				'start_val' => $sched['start_val'], 'finish_val' => $sched['finish_val']);			
		}
		return $sched_array;
	}
	
	public function user_schedule($id) {
		$date_qstr = $this->utils->format_date('start_time', '%M %e, %Y');
		$time_start_qstr = $this->utils->format_date('start_time', '%l:%i%p');
		$time_end_qstr = $this->utils->format_date('finish_time', '%l:%i%p');
		
		$query = "SELECT $date_qstr date, $time_start_qstr start_time, $time_end_qstr end_time FROM " .$this->table.
		" WHERE id = $id";
		return $this->db->fetchRow($query);
			
	}
	
	// delete row
    public function delete($id_array = array())
    {
		$users_model = new SeminarUsers($this->db);
		
        for( $i = 0; $i < count($id_array); $i++ ) {
			$id = (int)$id_array[$i];
			$booked = $users_model->total_sched_id($id);
			$max_seat = $this->db->fetchOne("SELECT max_seat FROM ".$this->table." WHERE id=".$id);
			if( ($max_seat - $booked[ $id ]) == $max_seat )			
				$this->db->delete($this->table, 'id=' . $id);
        }
    }
	public function date_get() {
		$date_qstr = $this->utils->format_date('start_time', '%M %e, %Y');
		$date_val_qstr = $this->utils->format_date('start_time', '%Y-%m-%d');
		$query = "SELECT b.date, b.date_val FROM
		(SELECT start_time, $date_qstr date, $date_val_qstr date_val FROM " .$this->table.
		") b GROUP BY b.date ORDER BY b.start_time";
			
		return $this->db->fetchAll($query);
			
	}
	public function time_get() {
        $start_qstr = $this->utils->format_date('start_time', '%l:%i%p');
        $finish_qstr = $this->utils->format_date('finish_time', '%l:%i%p');
		$start_val_qstr = $this->utils->format_date('start_time', '%H:%i');
        $finish_val_qstr = $this->utils->format_date('finish_time', '%H:%i');
		
		$query = "SELECT b.start, b.finish, b.start_val, b.finish_val FROM
		(SELECT start_time, $start_qstr start, $finish_qstr finish, $start_val_qstr start_val,
		$finish_val_qstr finish_val FROM ".$this->table. ") b GROUP BY b.start ORDER BY b.start_time";

		return $this->db->fetchAll($query);

	}
	public function filter_booking_datetime($start, $finish, $page) {
		$leftjoin = "LEFT JOIN seminar_users u ON s.id=u.sched_id WHERE u.id is not NULL";
		
		$pages = new Paginator();		
		
        $pages->mid_range = 7;
        $pages->items_per_page = 50;
		
		if($start && $finish) {
			$leftjoin .= " AND (start_time >= $start) AND (finish_time <= $finish)";
		}
		//echo "SELECT count(s.id) FROM ".$this->table." s $leftjoin";
		$pages->items_total = $this->db->fetchOne("SELECT count(s.id) FROM ".$this->table." s $leftjoin");
		//echo $where_clause;
		$pages->paginate();
		
		$sql = $this->db->select()->from(array('s' => $this->table), array('u.*'));
		$sql .= " $leftjoin";
		
		if( $page ) $sql .= $pages->limit;;
		//->joinLeft(array('u' => 'seminar_users'), 's.id = u.sched_id');
		//->where('u.id is not NULL');
		
		$booking_info = $this->db->fetchAll($sql);
		return array('booking_info' => $booking_info, 'pages' => $pages);
	}
	
	public function create_new_schedule($date, $starttime = array(), $endtime = array(), $maxseat = array()) {
		$cnt = count($starttime);
		for( $i = 0; $i < $cnt; $i++ ) {
			if( empty($starttime[$i]) || empty($endtime[$i]) ) continue;
			
			$starttime_val = strlen(substr(strrchr($starttime[$i], '.'), 1))
				? str_replace('.5', ':30', $starttime[$i]) : $starttime[$i] . ':00';

			$endtime_val = strlen(substr(strrchr($endtime[$i], '.'), 1))
				? str_replace('.5', ':30', $endtime[$i]) : $endtime[$i] . ':00';
				
			$sched_start = strtotime($date.' '.$starttime_val);
			$sched_finish = strtotime($date.' '.$endtime_val);
			
			//$unixtstamp = strtotime($date_str);
			$current_date = strtotime(date("Y-m-d H:i:s"));

			if( $this->db->fetchOne("SELECT id FROM ".$this->table.
				" WHERE (start_time <= $sched_start AND finish_time >= $sched_start) OR
				(start_time <= $sched_finish AND finish_time >= $sched_finish )" ) != ""
			   || $sched_start <= $current_date ) {
				continue;
			}
			
			$max_seat = $maxseat[$i];
			
			
			$insert_data = array('start_time' => $sched_start, 'finish_time' => $sched_finish, 'max_seat' => $max_seat);
			
			$this->db->insert($this->table, $insert_data);
			
		}
	}
	
}