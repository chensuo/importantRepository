<?php 


require_once("dbHelper.php");

/*
	功能描述：根据栏目编号，获取图书列表
*/
function getBooksBySectionId($sectionId){
	$sql = "select b.id ,b.isbn , b.Name , b.Image from books b inner join bookinsections bs on b.id = bs.bookId
where bs.sectionId = '{$sectionId}'";

	$list = executeQuery($sql);

	if(is_bool($list))
		return false;

	$books = [];
	foreach($list as $item){
		$books[] = [
			"id" => $item[0],
			"isbn" => $item[1],
			"name" => $item[2],
			"image" => $item[3]
		];
	}

	return $books;
}

/*


*/

function getAllBooks($cid = "" , $pid = "" , $pageIndex = 0 , $pageSize = 6){
	$sql1 = "select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId where 1=1";

	$sql2 = "select count(*) from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId where 1=1";

	// 添加条件
	if($cid != ""){
		$sql1 = $sql1 . " and c.id = '{$cid}'";
		$sql2 = $sql2 . " and c.id = '{$cid}'";
	}

	if($pid != ""){
		$sql1 = $sql1 . " and p.id = '{$pid}'";
		$sql2 = $sql2 . " and p.id = '{$pid}'";
	}

	// 分页
	$startIndex = $pageIndex * $pageSize;
	$sql1 = $sql1 . " limit {$startIndex} , {$pageSize};";


	$sql = $sql1 . $sql2 . ";";





	echo $sql;
	echo "<hr />";

	$list = executeMultiQuery($sql);

	if(is_bool($list))
		return false;

	// print_r($list);

	$books = [];
	$totalRowCount = 0;

	foreach($list[0] as $item){
		$books[] = [
			"id" => $item[0],
			"isbn" => $item[1],
			"name" => $item[2],
			"image" => $item[5]
		];
	}

	$totalRowCount = $list[1][0][0];


	return [
		"books" => $books,
		"total" => $totalRowCount
	];

}