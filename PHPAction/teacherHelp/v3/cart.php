<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>借书架</title>
</head>
<body>

	<?php 
	 	session_start();

	 	$currentReader = null;
	 	if(array_key_exists("CurrentReader", $_SESSION)){
	 		$currentReader = $_SESSION["CurrentReader"];
	 	}

	 	if(is_null($currentReader)){
	 		header("location:login.php");
	 		exit;
	 	}

	 	// 获取当前读者的借书架中的图书列表
	 	require_once("services/shelfService.php");

	 	$books = getBooksInShelf($currentReader["id"]);

	  ?>

	<?php 
		include_once("inc/header.php");
	 ?>

	 

	  <h2>图书列表</h2>
	
		<table border="1" style="width:80%;">
			<thead>
				<tr>
					<th>
						<input type="checkbox" id="chkAll">全选
					</th>
					<th>书名</th>
					<th>库存量</th>
					<th>可借数量</th>
					<th>删除</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($books as $item): ?>
					<tr>
						<td>
							<input type="checkbox">
						</td>
						<td><?php echo $item["name"]; ?></td>
						<td><?php echo $item["amount"]; ?></td>
						<td><?php echo $item["number"]; ?></td>
						<td>
							<button data-book-id="<?php echo $item["id"]; ?>" class="btn-delete">删除</button>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<hr>
		<a href="#">结算</a>
		<button id="btnSubmit">结算</button>


	<script type="text/javascript" src="lib/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(e){
			$('.btn-delete').bind('click' , function(e){
				var $self = $(this);
				var bookId = this.getAttribute('data-book-id');
				$.get('ajax/removeShelf.php?bookId=' + bookId , function(response){
					if(response.code == 100){
						// 删除当前行
						$self.parent().parent().remove();

						// 更新数字
					}
				});
			});


			$('#btnSubmit').bind('click' , function(){
				$.get('ajax/submitOrder.php' , function(response){
					console.log(response);
					if(response.code == 100){
						$('tbody tr').remove();
					}
					else{
						alert(response.message);
					}
				});
			});
		});
	</script>
	
</body>
</html>