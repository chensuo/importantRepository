<?php 

require_once("dbHelper.php");

/*
	添加借书架
*/
function addShelf($readerId , $bookId){
	$uuid = md5(microtime(true) . mt_rand());
	$time = time();
	$sql = "insert into bookshelves(id , memberId , bookId, createTime) 
	values('{$uuid}' , '{$readerId}' ,'{$bookId}' , {$time} );";

	return executeNonQuery($sql);

}

/*
	提交订单
*/
function getBooksInShelf($readerId){
	$sql = "select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookshelves bs on bs.BookId = b.Id where memberId = '{$readerId}'";

	$result = executeQuery($sql);

	if(is_bool($result))
		return false;

	$books = [];
	foreach($result as $item){
		$books[] = [
			"id" => $item[0],
			"isbn" => $item[1],
			"name" => $item[2],
			"image" => $item[5],
			"amount" => $item[14],
			"number" => $item[15]
		];
	}

	return $books;


}