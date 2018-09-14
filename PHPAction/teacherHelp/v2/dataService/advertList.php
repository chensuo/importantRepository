<?php 
header("content-type:application/json;charset=utf-8");

// 获取广告信息
require_once("../services/advertService.php");

$result = [];

$adverts = getAllAdverts();

if(is_bool($adverts)){
	$result["code"] = 101;
	$result["message"] = "请求失败";
}
else{
	$result["code"] = 100;
	$result["message"] = "请求成功";
	$result["data"] = $adverts;
}

echo json_encode($result);