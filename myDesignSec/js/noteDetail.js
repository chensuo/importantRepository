$(function(e){

	/*帖子Id*/
	var $noteIdInput = $('.noteId-input');
	var timer1;
	var timer2;
	var timer3;

	/*详情页面点击审核通过*/
	$('.btn-permit').bind('click' , function(){
		$.ajax({
                type:'post',
                url:'ajax/permitNotes.php',
                data:{noteId: $noteIdInput.val()},
                success:function(response){
                    if(response.code == 100){
                        $('.right-info-del').css('display' , 'block');
                        $('.error-info-del').css('display' , 'none');
                        window.clearInterval(timer1);
                        timer1 = setInterval(function(){
                            $('#delModal').modal('hide');
                        },1000);
                        window.clearInterval(timer3);
                        timer3 = setInterval(function(){
                        	history.go(0);
                        } , 1150);

                    }
                    else{
                        $('.right-info-del').css('display' , 'none');
                        $('.error-info-del').css('display' , 'block');
                        window.clearInterval(timer2);
                        timer2 = setInterval(function(){
                            $('#delModal').modal('hide');
                        },1000);
                        window.clearInterval(timer3);
                        timer3 = setInterval(function(){
                        	history.go(0);
                        } , 1150);

                    }
                }
            });
	});

    /*详情页面删除该帖*/
    $('.del-span').bind('click' , function(){
        $.ajax({
            type:'post',
            url:'ajax/delNotes.php',
            data:{noteId:$noteIdInput.val()},
            success:function(response){
                if(response.code == 100){
                    $('.right-info-del').css('display' , 'block');
                        $('.error-info-del').css('display' , 'none');
                        window.clearInterval(timer1);
                        timer1 = setInterval(function(){
                            $('#delModal').modal('hide');
                        },1000);
                        window.clearInterval(timer3);
                        timer3 = setInterval(function(){
                            window.location.href="note.php";
                        } , 1150);
                }
                else{
                     $('.right-info-del').css('display' , 'none');
                        $('.error-info-del').css('display' , 'block');
                        window.clearInterval(timer2);
                        timer2 = setInterval(function(){
                            $('#delModal').modal('hide');
                        },1000);
                        window.clearInterval(timer3);
                        timer3 = setInterval(function(){
                            window.location.href="note.php";
                        } , 1150);
                }
            }
        });
    });

	/*详情页面点击审核驳回*/
	$('.btn-unperimit').bind('click' , function(){
		 $.ajax({
                type:'post',
                url:'ajax/unPermitNotes.php',
                data:{noteId:$noteIdInput.val()},
                success:function(response){
                    if(response.code == 100){
                        $('.right-info-del').css('display' , 'block');
                        $('.error-info-del').css('display' , 'none');
                        window.clearInterval(timer1);
                        timer1 = setInterval(function(){
                            $('#delModal').modal('hide');
                             history.go(0);
                        },1000);
                    }
                    else{
                        $('.right-info-del').css('display' , 'none');
                        $('.error-info-del').css('display' , 'block');
                        window.clearInterval(timer2);
                        timer2 = setInterval(function(){
                            $('#delModal').modal('hide');
                        },1000);
                    }
                }
            });
	});




});