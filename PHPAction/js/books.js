$(function(e){
	//点击收起筛选
	$oldHeight = $('.choseContainer').css('height');
	$firstDvHeight = $('.firstDv').css('height');
	$('.isShowChoseDv').bind('click' , function(){
		$('.choseContainer').css('height' , $firstDvHeight);
		$('.isShowChoseDvSec').css('display' , 'block');
		$(this).css('display' , 'none');

	})
	//点击显示筛选
	$('.isShowChoseDvSec').bind('click' , function(){
		$('.choseContainer').css('height' , $oldHeight);
		$('.isShowChoseDv').css('display' , 'block');
		$(this).css('display' , 'none');

	})

	//ajax
	$message = $('.message-show');
	$('.btn-add').bind('click' , function(e){
	this.setAttribute("data-target","#myModal");
	var bookId = this.getAttribute('data-book-id');	
	// console.log(bookId);
		$.get('ajax/addShelf.php?bookId=' + bookId , function(response){

			if(response.code == 100){
				$message.text('恭喜，添加成功!');
				$message.css('color' , '#398439');
				var count = parseInt($('#lblCount').text());
				count++;
				$('#lblCount').text(count);
				
			}
			else if(response.code == 403){
				location.href = 'login.php';
			}
		});
	});

	
});