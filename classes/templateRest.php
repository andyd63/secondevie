<?php

$success = false;
$data = array();


function reponse_json($success, $data, $msgErreur=NULL) {
	$array['success'] = $success;
	$array['msg'] = $msgErreur;
	$array['result'] = $data;

	return json_encode($array,JSON_UNESCAPED_UNICODE);
}


function reponse_jsonAlone($data) {
	return json_encode($data,JSON_UNESCAPED_UNICODE);
}
function reponse_jsonApi($data) {
	$array['data']  = $data;
	return json_encode($array,JSON_UNESCAPED_UNICODE);
}


?>