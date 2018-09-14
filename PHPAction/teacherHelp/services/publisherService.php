<?php 


require_once("dbHelper.php");


function getAllPublihsers(){
	$sql = "select Id ,Name  from Publishers";

	$list = executeQuery($sql);

	if(is_bool($list))
		return false;

	$publishers = [];

	foreach($list as $item){
		$publishers[] = [
			"id" => $item[0],
			"name" => $item[1]
		];
	}

	return $publishers;
}