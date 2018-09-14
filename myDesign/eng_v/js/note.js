$(function(e){
   	var $dialog = $('.dialog');

	/*回复帖子(正对楼主)*/
	$('.btn-replyNote').bind('click' , function(){
		$replayContent = $('.replay-content').val();
		$memberId = $('.memberId-input').val();
		$noteId = $('.noteId-input').val();
		$.post('ajax/replyNote.php' , {"memberId":$memberId , "noteId":$noteId , "content": $replayContent} , function(response){
			console.log(response);
			if(response.code == 100){
				window.localStorage.setItem('Scroll' , document.documentElement.scrollTop);
				window.location.href = $('.url-input').val();
				// $dialog.css('display' , 'block');
				// showDialog('#1DA362' , "回复成功！");

			}
			else{
				window.localStorage.setItem('Scroll' , document.documentElement.scrollTop);
				window.location.href = $('.url-input').val();
				// $dialog.css('display' , 'block');
				// showDialog('#E11111' , "回复失败！");
			}
		});
	});

	function showDialog($color , $msg){
		$dialog.text($msg);
		$dialog.css('color' , $color);
		if($dialog.css('display') != 'none'){
			setInterval(function(){
				$dialog.css('display' , 'none');
			} , 1500);
		}
		
	}



});