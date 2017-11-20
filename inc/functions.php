<?php
function getALLfromIP($addr) {
    // this sprintf() wrapper is needed, because the PHP long is signed by default
	global $db;
    $ipnum = sprintf("%u", ip2long($addr));
    $query = "SELECT cc, cn FROM ip NATURAL JOIN cc WHERE ${ipnum} BETWEEN start AND end";
    $result = $db->fetchRow($query);
	
	return $result;
}

function getCCfromIP($addr) {
    $data = getALLfromIP($addr);
	if($data) return $data['cn'];
    return false;
}