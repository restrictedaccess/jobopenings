<?php

	class booking_code_class
	{
		function booking_code()
		{
			$booking_code = $this->set_bookingcode() ;
			$this->commission_monster() ;
			return $booking_code ;
		}

		function set_bookingcode()
		{
			if(!isset($_COOKIE['mod21bookid']))
			{
				if($_GET["gkw"]=="")
				{
				$booking_code = trim($_GET["url"]) ;
				}
				else
				{
					$booking_code = trim($_GET["gkw"]) ;
				}
				setcookie("mod21bookid",$booking_code,2592000 + time()) ;
			}
			else
			{
				$booking_code = $_COOKIE['mod21bookid'] ;
			}
			return $booking_code ;
		}
	
		function commission_monster()
		{
			if($_GET['00N20000001DxK1']=="cm" and $_GET['form_name']=="ebook")
			{
				$contact_email = $_GET['email'] ;
				echo "<img border='0' width='1' height='1' src='https://members.commissionmonster.com/track_lead/855/".$contact_email."' alt='http://www.commissionmonster.com.au' />" ;
			}
		}
	}
	
?>