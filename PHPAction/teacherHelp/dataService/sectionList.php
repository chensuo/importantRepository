<?php 
header("content-type:application/json;charset=utf-8");

require_once("../services/sectionService.php");

$sections = getAllSections();

$result = [];

if(is_bool($sections)){
	$result["code"] = 101;
	$result["message"] = "请求失败";
}
else{
	$result["code"] = 100;
	$result["message"] = "请求成功";
	$result["data"] = $sections;
}

echo json_encode($result);