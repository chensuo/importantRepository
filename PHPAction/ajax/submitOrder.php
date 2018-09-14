<?php 

session_start();
header("content-type:application/json;charset=utf-8");
require_once("../service/bookService.php");
require_once("../service/dbHelper.php");
// -1- 获取当前读者信息

$currentReader = null;

if(array_key_exists("CurrentId" , $_SESSION)){
	$currentReader = $_SESSION["Current"];
	$readerId = $_SESSION["CurrentId"];
}

if(is_null($currentReader)){
	$result["code"] = 403;
	$result["message"] = "尚未登录";
	echo json_encode($result);
	exit;
}

$readerId = $_SESSION["CurrentId"];

// echo $readerId;

// -2- 获取当前读者借书架中的图书信息, 并检查是否存在可借图书

require_once("../service/shelfService.php");

$books = getBooksInShelf($readerId);

foreach ($books as $item) {
	if($item["number"] == 0){
		$result["code"] = 106;
		$result["message"] = "图书没有库存";
		echo json_encode($result);
		exit;
	}
}


// -3- 获取可借的具体图书信息

$details = [];

foreach($books as $item){
	$list = getDetailById($item["id"]);
	$details[] = $list[0];	
}

// 4-1	更新特定图书的状态

$sqlList = [];

foreach($details as $item){
	$bookNumber = $item["bookNumber"];
	$sql = "update bookDetails set state = 0 where number = '{$bookNumber}'";
	$sqlList[] = $sql;
}

// 4-2 插入借阅记录

foreach ($details as $item) {
	$id = md5(microtime(true) . mt_rand());
	$borrowNumber = ceil(microtime(true) * 1000) . "-" . mt_rand(1000, 9999);
	$createTime = ceil(microtime(true) * 1000);
	$bookNumber = $item["bookNumber"];
	$bookId = $item["bookId"];

	$sql = "insert borrowRecords(id , borrownumber , bookId , bookNumber , memberId , createTime ,state) values('{$id}' , '{$borrowNumber}' , '{$bookId}', '{$bookNumber}' , '{$readerId}'  ,{$createTime} , 1)";

	$sqlList[] = $sql;
}


$sqlList[] = "delete from bookShelves where memberId = '{$readerId}'";

$flag = executeMultiNonQuery($sqlList);
if($flag){
	$result["code"] = 100;
	$result["message"] = "恭喜，订单提交成功!";
	
}
else{
	$result["code"] = 101;
	$result["message"] = "抱歉，订单提交失败!";
}

echo json_encode($result);

