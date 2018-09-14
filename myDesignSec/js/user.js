$(function(e){
	var oldPassword = $('#oldPassword');
	var newPassword = $('#newPassword');
	var confirmNewPassword = $('#confirmNewPassword');
	var oldPasswordError = $('.old-show');
	var newPasswordError = $('.new-show');
	var newConfirmPasswordError = $('.new-confirm-show');
	var btnSave = $('.btn-save');
	var adminId = $('.adminId-input');
	var infoShow = $('.modal-body>p');
	var timer;
	var timer1;



	//失去焦点事件
    oldPassword.blur(function(e){
        checkOldPassword();
    });

    //失去焦点事件
    newPassword.blur(function(e){
        checkNewPassword();
    });

    //失去焦点事件
    confirmNewPassword.blur(function(e){
        checkConfimNewPassword();
    });

    btnSave.bind('click' , function(){
    	if(checkOldPassword() && checkNewPassword() && checkConfimNewPassword()){
    		$.ajax({
    			type:'post',
    			url:'ajax/changePsw.php',
    			data:{adminId:adminId.val() , oldPassword:oldPassword.val(),  newPassword:newPassword.val()},
    			success:function(response){
    					window.clearInterval(timer1);
    					window.clearInterval(timer);
    				if(response.code == 100){
    					infoShow.text('密码修改成功！');
    					infoShow.css('color' , '#36C601');
    					timer = setInterval(function(){
    						$("#editPassword").modal('hide');
    					} ,1000);
    					oldPassword.val('');
    					newPassword.val('');
    					confirmNewPassword.val('');
    				}
    				else{
    					infoShow.text('原密码不正确！');
    					infoShow.css('color' , '#E10601');
    					timer1 = setInterval(function(){
    						$("#editPassword").modal('hide');
    					} ,1000);
    					oldPassword.val('');
    					newPassword.val('');
    					confirmNewPassword.val('');
    				}
    			}
    		});

    	}
    	else{
    		return false;
    	}
    })
   

	/***************************/
	function checkOldPassword(){
		oldPasswordError.removeClass('isError');
		if(oldPassword.val() == ''){
			 oldPasswordError.addClass('isError');
			 oldPasswordError.text(' 旧密码不能为空');
			 return false;
		}

		return true;
	}

	function checkNewPassword(){
		newPasswordError.removeClass('isError');
		if(newPassword.val() == ''){
			 newPasswordError.addClass('isError');
			 newPasswordError.text(' 新密码不能为空');
			 return false;
		}

		return true;
	}

	function checkConfimNewPassword(){
		newConfirmPasswordError.removeClass('isError');
		if(confirmNewPassword.val() != newPassword.val()){
			 newConfirmPasswordError.addClass('isError');
			 newConfirmPasswordError.text(' 两次密码不一致');
			 return false;
		}

		return true;
	}



});