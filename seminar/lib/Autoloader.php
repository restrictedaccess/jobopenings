<?php

// define custom ClassNotFoundException exception class
class ClassNotFoundException extends Exception{}


// handle request and dispatch it to the appropriate controller
try{
	Dispatcher::dispatch();
}
// catch exceptions
catch (ClassNotFoundException $e){
	echo $e->getMessage();
	exit();
}
catch (Exception $e){
	echo $e->getMessage();
	exit();
}// End front controller