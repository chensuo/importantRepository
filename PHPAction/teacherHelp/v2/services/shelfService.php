<?php 

require_once("dbHelper.php");

function addShelf($readerId , $bookId){
	$uuid = md5(microtime(true) . mt_rand());
	$time = time();
	$sql = "insert into bookshelves(id , memberId , bookId, createTime) 
	values('{$uuid}' , '{$readerId}' ,'{$bookId}' , {$time} );";

	return executeNonQuery($sql);

}