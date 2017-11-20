<?php
include '../conf/zend_smarty_conf.php';
if ($_REQUEST["sub_category_id"]){
	$sub_category = $db->fetchOne($db->select()->from("job_sub_category", "sub_category_name")->where("sub_category_id = ?", $_REQUEST["sub_category_id"]));
	$skills_tasks = $db->fetchAll($db->select()->from("job_position_skills_tasks")->where("sub_category_id = ?", $_REQUEST["sub_category_id"])->where("type = 'task'")->order("value"));
	echo json_encode(array("success"=>true, "result"=>$skills_tasks, "sub_category"=>$sub_category));
}else{
	echo json_encode(array("success"=>true, "result"=>array()));
}

