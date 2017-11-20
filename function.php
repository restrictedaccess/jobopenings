<?
 function filterfield($fieldname){

/*
	$fieldname = str_replace(",", "&nbsp;",$fieldname);
	$fieldname = str_replace("'", "",$fieldname);
	$fieldname = str_replace(chr(92), "\\",$fieldname);
	$fieldname = str_replace(chr(34), chr(92).chr(34),$fieldname);
	$fieldname = str_replace(chr(13), "",$fieldname);
	$fieldname = str_replace(chr(10), "",$fieldname);
	$fieldname =mysql_escape_string($fieldname);
	$fieldname = stripslashes($fieldname);
*/
	 $fieldname = str_replace("'", "",$fieldname);
 if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $fieldname = stripslashes($fieldname);
	
  }
  if (phpversion() >= '4.3.0')
  {
    $fieldname = mysql_real_escape_string($fieldname);
  }
  else
  {
    $fieldname = mysql_escape_string($fieldname);
  }
 
  return $fieldname;


	
	//return the filtered data
   // return $fieldname;
 
}
function filterfield2($str){

	$str = str_replace(",", "&nbsp;",$str);
}

function RandomCode(){
/*
$time =time();
$y =date('Y');
$m =date('m');
$d= date('d');

  
   $code=$time.substr(microtime(),2).$y.$d.$m;
 */  
 $code =generatecode();
   return $code;
   
}
function generatecode(){
        $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I',
'J','K','L','M','N','O','P','R','S','T','U','W');
        $lenght = 8; 
        (string) $keygen = '';
        for($i=0;$i<=$lenght;$i++){
            $keygen .= $chars[rand(0,37)];         }
        return $keygen;
    } 

function format_date($original='', $format="%b %d %Y") {
    $format = ($format=='date' ? "%m-%d-%Y" : $format);
    $format = ($format=='datetime' ? "%m-%d-%Y %H:%M:%S" : $format);
    $format = ($format=='mysql-date' ? "%Y-%m-%d" : $format);
    $format = ($format=='mysql-datetime' ? "%Y-%m-%d %H:%M:%S" : $format);
    return (!empty($original) ? strftime($format, strtotime($original)) : "" );
}

function ATZ()
{
	//putenv('TZ=Australia/Perth');
    //format the timezone for SQL
    //$timeZone = preg_replace('/([+-]\d{2})(\d{2})/','\'\1:\2\'', date('O'));
    //mysql_query('SET time_zone='.$timeZone);
	putenv ('TZ=Australia/Perth'); 
	$AusTime = date("H:i:s"); 
	$AusDate = date("Y")."-".date("m")."-".date("d");
	$ATZ = $AusDate." ".$AusTime;
	return $ATZ;
}

?>