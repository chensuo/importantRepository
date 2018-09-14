<?php 

header("content-type:application/json;charset=utf-8");

const IMAGE_URL_ROOT = "http://127.0.0.1:9091/myDesignSec/";

$result = [
	"errno" => 101,
	"data" => []
];

$file = $_FILES["editImage"];

// 检查文件类型

// 检查文件大小 

// 确定文件信息
$ext = pathinfo($file["name"] , PATHINFO_EXTENSION);
$fileName = md5(uniqid(microtime(true) . mt_rand())) . "." . $ext;

if(move_uploaded_file($file["tmp_name"] , "../image/" . $fileName)){
	$result = [
		"errno" => 0,
		"data" => [IMAGE_URL_ROOT . "image/" . $fileName]
	];
}

echo json_encode($result);