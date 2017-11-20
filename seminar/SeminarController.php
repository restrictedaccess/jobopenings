<?php

    /* $ seat_home.php 2012-02-08 mike $ */
    
    class SeminarController {
        private $db = NULL;
        private $timeNum = array(6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,0,1,2,3,4,5);
        private $schedule_model = NULL;
        private $admin = array();
        private $users_model = NULL;
        
        // constructor
        public function __construct() {
            $this->db = Config::$db_conf;
            
            //$this->seat_model = new ClassBooking( $this->db );
            $this->schedule_model = new SeminarSchedule($this->db);
            //$this->users_model = SeminarUsers::getInstance($this->db);
            //$this->admin = $this->seat_model->check_admin_session();
            //var_dump($this->seat_model);
            //ClassBooking::
        }
        
        public function index($view_type) {
            $users_model = new SeminarUsers($this->db);
            
            
            $view = new View('seminar_form');
            $view->title = 'Remotestaff Seminar';
            $view->heading = 'Seminar Booking';
            $view->seat_id = $seat_id;
            
            $view->sched_array = $this->schedule_model->schedule_get();
            $view->total_booked = $users_model->total_sched_id();
            
            $view->display();
        }
        
        public function process_booking() {
            // get POST params
            //$yearID = Input::post('yearID') ? Input::post('yearID') : ( Input::get('yearID') ? : date('Y') );
            $userid = 0;
            $last_id = 0;

            if (Input::post('task') == 'create')
            {
                $fname = Input::post('fname');
                $lname = Input::post('lname');
                $email = Input::post('email');
                
                $position_desired = Input::post('position_desired');
                $sched_id = Input::post('sched_id') ? Input::post('sched_id') : 0;
                
                $telno = Input::post('telno');
                $recent_job = Input::post('recent_job');
                
                $userid = Input::post('userid');

                
                $diff_user = new SeminarUsers($this->db);
                $diff_user->user_account($email, $fname, $lname, $telno, $sched_id);
                $_error = $diff_user->_error;                
                
                // ADD NEW STAFF TO DATABASE IF NO ERROR
                if($_error == "") {
                    $datetime = explode('_', $sched_id);
                    $sched_id = $datetime[0];
                    
                    $data_array = array('fname' => $fname, 'lname' => $lname, 'email' => $email,
                        'position_desired' => $position_desired, 'sched_id' => $sched_id, 'userid' => $userid);
                  
                  if( $telno ) $data_array['tel_no'] = $telno;
                  if( $recent_job ) $data_array['recent_job'] = $recent_job;
                  $last_id = $diff_user->user_create($data_array);
                  
                  // send email                  
                  $email_body = "<p>Hi $fname,</p>
                      <p>Thanks for your booking for ".$datetime[1].".</p>
                      The seminar will be about qualifying and training for a Long Term Work From Home job.
                      This seminar and service is FREE. Remote Staff will not collect any
                      payments all throughout the recruitment and hiring process.<br/><br/>
                      Please arrive at 27th  Floor, Trafalgar Plaza, 105 H.V.
                      De La Costa Street, Salcedo Village, Makati City at least 10 Minutes before the
                      seminar time. Dress code is casual.<p>";
                      
                    if ( isset($_SESSION['userid']) && !empty($_SESSION['userid']) &&
                        isset($_SESSION['emailaddr']) &&  !empty($_SESSION['emailaddr']) &&
                         isset($_SESSION['seminar_login']) && !empty($_SESSION['seminar_login']) ) {
                        
                        $email_body .= "As you have already completed your application form,
                        you are qualified to be interviewed after the seminar.
                        Please take note of your application ID or the email you used upon registration.
                        Also ensure that your online resume is detailed.
                        Should you wish to update your resume please log in as a Job Seeker
                        by following this <a href='https://remotestaff.com.au/portal/'>link</a>";
                    } else {
                        $email_body .= "Please complete your
                      Job Seeker account <a href='http://www.remotestaff.com.ph/seminar/seminar.php?/jsregister/&id=$last_id'>HERE</a>
                      to qualify for an instant interview after the seminar.";
                    }
                    
                    $email_body .="</p><br/>
                    <p>Should you wish to cancel for any reason ,
                    please email cancelation notice at <a href='mailto:seminar@remotestaff.com.ph'>seminar@remotestaff.com.ph</a> </p><br/>
                    <p>Remote Staff Team <br/>
                    www.remotestaff.com.ph <br/>
                    www.facebook.com/remotestaff</p>";
                    
                    $utils = Utils::getInstance();
                    $utils->send_email('Remotestaff Seminar Booking', $email_body, $email);
                    
                   // $utils->send_email('Remotestaff Seminar Booking', $email_body);//, 'mike.lacanilao@remotestaff.com.au');
                    
                    // set for thankyou page
                    $_SESSION['page'] = 'thankyou';
                }
              
                // RUN JAVASCRIPT TO UPDATE MAIN PAGE
                echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><script type='text/javascript'>";
                echo 'window.parent.createResult("'.$_error.'",'.$last_id.');';
                echo "</script></head><body></body></html>";
                exit;
            }
        }
        
        public function jsform() {
            $emailaddr = Input::post('emailaddr');
            $password = Input::post('password');
            
            $diff_user = new SeminarUsers($this->db);
            
            $diff_user->jobseeker_login($emailaddr, $password);
        }
        
        public function thankyou() {
            $userid = Input::get('id');
            $diff_user = new SeminarUsers($this->db, array($userid));
            
            $dates = $this->schedule_model->user_schedule($diff_user->user_info['sched_id']);
            
            if( $_SESSION['page'] && $_SESSION['page'] == 'thankyou') {
                $view = new View('seminar_thankyou');
                $view->title = 'Remotestaff Seminar';
                $view->heading = 'Seminar Booking';
                $view->userid = $userid;
                $view->date = $dates['date'];
                $view->start = $dates['start_time'];
                $view->finish = $dates['end_time'];
                
                $view->fname = $diff_user->user_displayname();
                
                $view->display();
                $_SESSION['page']="";
                $_SESSION['userid'] = "";
                $_SESSION['emailaddr'] = "";
                $_SESSION['seminar_login'] = "";
                session_destroy();
            } else {
                header('Location: /seminar/seminar.php?/');
                exit;
            }
        }
        
        public function jsregister() {
            $userid = Input::get('id');
            $diff_user = new SeminarUsers($this->db, array($userid, ''));
            
            $view = new View('jsregister_redirect');

            $view->userid = $diff_user->user_info['id'];
            $view->email = $diff_user->user_info['email'];
            $view->fname = $diff_user->user_info['fname'];
            $view->lname = $diff_user->user_info['lname'];
            
            $view->rv = '1ec806d54270d8642b9743d698079dd9';
            $view->pass2 = 'RemoteStaff';
            $view->display();
        }
        
        
    }