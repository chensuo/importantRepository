<?php 
	require_once("../util/verifyCode.class.php");
	
	$phone = $_GET["phone"];
	$code = $_GET["code"];

	$response = VerifyCodeService::validate($phone , $code);

	$result = [
	"code" => 101,
	"message" => "验证码为4个数字",
	"data" => $response
	];

	if($response == -1){
		$result = [
			"code" => 102,
			"message" => "验证码错误"
		];
	}
	else if($response == 1){
		$result = [
			"code" => 100,
			"message" => "验证码正确"
		];
	}

	header("content-type:application/json;charset=utf-8");
	echo json_encode($result);