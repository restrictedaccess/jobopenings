<?php
include ('conf/zend_smarty_conf.php');
define('FACEBOOK_APP_ID', '423675957728278');
define('FACEBOOK_SECRET', '4e7762fec47c0094c36940fe0d08ae22');

function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
}

if ($_REQUEST) {
  $response = parse_signed_request($_REQUEST['signed_request'], 
                                   FACEBOOK_SECRET);
  
  if (TEST){
    header("Location:http://test.remotestaff.com.au/portal/application_form/receive_mobile_number.php?mobile_number=".urlencode($response["registration"]["phone"])."&email=".urlencode($response["registration"]["email"]));	
  }else{
    header("Location:https://www.remotestaff.com.au/portal/application_form/receive_mobile_number.php?mobile_number=".urlencode($response["registration"]["phone"])."&email=".urlencode($response["registration"]["email"]));	
  }
  
} else {
  echo '$_REQUEST is empty';
}

