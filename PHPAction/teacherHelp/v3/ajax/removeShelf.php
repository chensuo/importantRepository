<?php 


session_start();


header("content-type:application/json;charset=utf-8");

require_once("0205/services/shelfService.php");


// 获取图书ID
$bookId = "";

if(array_key_exists("bookId", $_GET)){
	$bookId = $_GET["bookId"];
}

if($bookId == ""){
	$result["code"] = 102;
	$result["message"] = "参数无效";
	echo json_encode($result);
	exit;
}


// 获取当前登录信息

$currentReader = null;
if(array_key_exists("CurrentReader" , $_SESSION)){
	$currentReader = $_SESSION["CurrentReader"];
}

if(is_null($currentReader)){
	$result["code"] = 403;
	$result["message"] = "尚未登录";
	echo json_encode($result);
	exit;
}

// 检查

$flag = removeBookFromShelf($bookId , $currentReader["id"]);



// 删除
if($flag){
	$result["code"] = 100;
	$result["message"] = "移除成功";
	$result["data"] = 1;
	
}
else{
	$result["code"] = 101;
	$result["message"] = "移除失败";
	$result["data"] = 0;
}

echo json_encode($result);