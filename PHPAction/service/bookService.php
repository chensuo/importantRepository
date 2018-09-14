<?php  

/*
	提交订单 获取该书详情
*/
function getDetailById($bookId){
	$sql = "select b.id , b.number , b.state ,b.libraryId , l.name , b.bookId from bookDetails b inner join libraries l on l.id=b.libraryId where b.bookId='{$bookId}' and state = 1";

	$result = executeQuery($sql);
	if(is_bool($result)){
		return false;
	}

	$details = [];

	foreach($result as $item){
		$details[] = [
			"id" => $item[0],
			"bookNumber" => $item[1],
			"bookId" => $item[5]
		];
	}

	return $details;
}