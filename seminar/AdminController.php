<?php

    /* $ AdminController.php 2012-02-08 mike $ */
    include_once('./lib/class_xls.php');
    
    class AdminController {
        private $db = NULL;
        private $schedule_model = NULL;
        private $admin = array();
        private $domain = 'http://www.remotestaff.com.au';
        
        // constructor
        public function __construct() {
            $this->db = config::$db_conf;

            $this->schedule_model = SeminarSchedule::getInstance($this->db);
            
            if( TEST ) $this->domain = 'test.remotestaff.com.au';
            
            $utils = new Utils();
            $utils->db = $this->db;
            
            $this->admin = $utils->check_admin_session();

        }
        public function index($view_type = NULL) {
            $current_date = date("Y-m-d");
            
            $users_model = new SeminarUsers($this->db);
            
            $tab = Input::get('tab') ? Input::get('tab') : 'first';
            
            $view = new View('admin_view');
            $view->title = 'Remotestaff Seminar - Admin';
            $view->heading = 'Admin Reports';
            
            $view->dateselect = $this->schedule_model->date_get();
            $view->timeselect = $this->schedule_model->time_get();
            
            $view->sched_array = $this->schedule_model->schedule_get();
            $view->total_booked = $users_model->total_sched_id();
            $view->tab = $tab;
            $view->time_sel_value = array(9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14, 14.5, 15, 15.5,
                16, 16.5, 17, 17.5, 18, 18.5, 19, 19.5, 20, 20.5, 21);
            
            if( $view_type !== NULL ) {
                $date_select = Input::get('date_select');
                
                $result = $this->process_filter();
                //print_r($result['booking_info']);
                $view->booking_info = $result['booking_info'];
                $view->domain = $this->domain;
                $view->method = 'process_filter';
                $view->date_select = $date_select;
                
                $pages = $result['pages'];
                $view->ipp = $pages->low;
                $view->items_total = $pages->items_total;
                $view->pages = $pages->display_pages();
                $view->jump_menu = $pages->display_jump_menu();
                $view->items_pp = $pages->display_items_per_page();
            }
             //echo json_encode(array('result' => $result, 'url' => $this->domain) );
            
            $view->display();
        }
        
        private function process_keyword($fld_var = 'fieldname', $inp_var = 'field_inp', $page = FALSE) {
            $fldname = Input::post($fld_var) ? Input::post($fld_var) : Input::get($fld_var);
            $fld_inp = Input::post($inp_var) ? Input::post($inp_var) : Input::get($inp_var);
            
            $users_model = new SeminarUsers($this->db);
            return $users_model->search_by_keyword($fldname, $fld_inp);
        }
        
        private function process_filter($date_var = 'date_select', $time_var = 'time_select', $page = TRUE) {
            $date_select = Input::post($date_var) ? Input::post($date_var) : Input::get($date_var) ;
            $time_select = Input::post($time_var) ? Input::post($time_var) : Input::get($time_var);
            $start_time = 0;
            $finish_time = 0;
            if( $date_select != 'all' ) {
                $time_array = explode('-', $time_select);
                $start_time = strtotime($date_select.' '.$time_array[0]);
                $finish_time = strtotime($date_select.' '.$time_array[1]);    
            }
            return $this->schedule_model->filter_booking_datetime($start_time, $finish_time, $page); 
        }
        
        public function search_keyword() {
            $search_result = $this->process_keyword();
            echo json_encode(array('result' => $search_result, 'url' => $this->domain) );
        }
        
        public function filter_list() {
            $result = $this->process_filter();
            
            $pages = $result['pages'];
            $url_replace = "/index/filter";
           
            $result['pp']['display_pages'] = str_replace("/filter", $url_replace, $pages->display_pages());//$pages->display_pages();
            $result['pp']['jump_menu'] = str_replace("/filter", $url_replace, $pages->display_jump_menu());
            $result['pp']['items_pp'] = str_replace("/filter", $url_replace, $pages->display_items_per_page());
            echo json_encode(array('result' => $result, 'url' => $this->domain) );
        }
        
        public function date_time($date) {
            $date = Input::post('date');
            $search_result = $this->schedule_model->schedule_get($date);
            echo json_encode($search_result);
        }
        
        public function toXLS() {
            $method = Input::get('method');
            $search_result = $this->$method('fld1', 'fld2', FALSE);
            
            if(array_key_exists('booking_info', $search_result))
                $search_result = $search_result['booking_info'];

            $xls = new class_xls();
            $xls->xlsHeader();
            //??¹ header ?? string
            $xls->xlsWriteString( 0 , 0 , 'First Name' );
            $xls->xlsWriteString( 0 , 1 , 'Last Name' );
            $xls->xlsWriteString( 0 , 2 , 'Email' );
            $xls->xlsWriteString( 0 , 3 , 'Number' );
            $xls->xlsWriteString( 0 , 4 , 'Last Position' );
            $xls->xlsWriteString( 0 , 5 , 'Position Desired' );
            $xls->xlsWriteString( 0 , 6 , 'Applicant-ID' );
            
            for($i = 0; $i < 7; $i++) {
                $xls->xlsWriteString( 1 , $i , '' );
            }
            
            $ctr = 2;
            foreach($search_result as $result) {
                $xls->xlsWriteString( $ctr , 0 , $result['fname'] );
                $xls->xlsWriteString( $ctr , 1 , $result['lname'] );
                $xls->xlsWriteString( $ctr , 2 , $result['email'] );
                $xls->xlsWriteString( $ctr , 3 , $result['tel_no'] );
                $xls->xlsWriteString( $ctr , 4 , $result['recent_job'] );
                $xls->xlsWriteString( $ctr , 5 , $result['position_desired'] );
                $xls->xlsWriteNumber( $ctr , 6 , $result['userid'] );
                $ctr++;
            }
            
            $xls->xlsClose();
        }
        
        public function new_sched() {
            $msg_error = '';
            $sched_date = Input::post('date_from');
            
            //echo count($_POST['start_time']);
            //echo ' '.count($_POST['finish_time']);
            //foreach( $_POST['start_time'] as $key => $val ) {
            //    echo $sched_date.'<br/>'.$val;
            //}
            if( !$sched_date ) $msg_error = 'Date of Seminar is empty.';
            elseif( empty($_POST['start_time'][0]) || empty($_POST['finish_time'][0])) $msg_error = 'Select the time from the list.';
            elseif( empty($_POST['max_seat'][0]) ) $msg_error = 'Max seat is empty!';
            
            if( !$msg_error ) {
                $this->schedule_model->create_new_schedule($sched_date, $_POST['start_time'], $_POST['finish_time'], $_POST['max_seat']);
            }

            // RUN JAVASCRIPT TO UPDATE MAIN PAGE
            echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><script type='text/javascript'>";
            echo 'window.parent.createResult("'.$msg_error.'");';
            echo "</script></head><body></body></html>";
            exit;
        }
        
        public function delete() {
            
            echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><script type='text/javascript'>";

            if( count($_POST['sched_id']) == 0 ) {
                echo 'window.parent.alert("Please select time");';
            }else {
                $this->schedule_model->delete($_POST['sched_id']);
                 echo 'window.parent.createResult("");';
            }
            echo "</script></head><body></body></html>";
            exit;
            
        }
    }