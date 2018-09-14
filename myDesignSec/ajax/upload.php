<?php 

// 设置跨域请求头

require_once("../util/httpClient.class.php");
require_once("../util/globalSetting.class.php");


// 检查文件

// 获取文件
$file = $_FILES["image"];


// 临时文件
$oldFileName = $file["tmp_name"];// c:/windows/temp/xxxx.tmp



// 新文件
$newFileName = dirname($oldFileName) . "/" . pathinfo($oldFileName , PATHINFO_FILENAME) . '.' . pathinfo($file["name"] , PATHINFO_EXTENSION);


// echo $oldFileName;
// echo "<hr />";
// echo $newFileName;



// 重命名
rename($oldFileName, $newFileName);

// // 上传文件到远程服务器
 $res = HttpClient::upload($newFileName);


// // 响应
header("content-type:application/json;charset=utf-8");

$result = [
	"code" => 101,
	"message" => "上传失败"
];

if(!is_null($res)){
	// unlink($newFileName);
	$result = [
		"code" => 100,
		"message" => "上传成功",
		"data" => GlobalSetting::URL_IMAGE_SERVER . $res
	];
}

echo json_encode($result);


