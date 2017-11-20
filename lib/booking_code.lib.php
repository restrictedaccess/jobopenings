<?php

	class booking_code_class
	{
		function booking_code()
		{
			$booking_code = $this->set_bookingcode() ;
			return $booking_code ;
		}

		function set_bookingcode()
		{
			if(!isset($_COOKIE['recruiters_promo_code']))
			{
				if($_GET['gclid']==""){
					if($_GET["gkw"]==""){
						$booking_code = trim($_GET["url"]) ;
					}else{
						$booking_code = trim($_GET["gkw"]) ;
					}
				}
				if ($booking_code!="fb.login"){
					setcookie("recruiters_promo_code",$booking_code,2592000 + time()) ;				
				}
	
			}
			else
			{
				$booking_code = $_COOKIE['recruiters_promo_code'] ;
			}
			return $booking_code ;
		}	
	}
	
?>
