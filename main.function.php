<?php

	header('Access-Control: allow <*>') ;

	function main_function()
	{
		include_once("booking_code.lib.php") ;
	
		$object = new booking_code_class ;
		$booking_code = $object->booking_code($code) ;
		return $booking_code ;
	}

	$booking_code = main_function() ;

?>