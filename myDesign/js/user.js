$(function(){
    		
    		var $txtMemberId = $('#txtMemberId').val();
    		var $dialog = $('.dialog');
	    	var $txtPassword = $('#txtPassword');

	    	var $showEmail = $('.show-emali');
	    	var timer;

	    	/*获取该页面个人信息*/
	    	getUserAllData();
	    		
	    	

    		/*修改邮箱*/
    		$('.confirmEditEmail').bind('click' , function(){
    			var $txtEmail = $('#txtEmail').val();

    			$.post('ajax/edit.php' , {"memberId":$txtMemberId ,"email":$txtEmail} , function(response){
    				//关闭模态框
    				$('#editEmail').modal('hide');
    				if(response.code == 100){
    					$('#txtEmail').val('');
    					//修改显示的邮箱地址
    					if(response.email != ''){
    						$('.show-emali').text(response.email);
    					}
    					else{
    						$('.show-emali').text("暂无邮箱");
    					}
    					showDialog("#1DA362" , "邮箱修改成功！");
    				}
    				else{
    					$('#txtEmail').val('');
    					showDialog("#E11111" , "邮箱修改失败！");
    				}
    			});
    		});

    		/*修改密码*/
    		$('#confirmChangePsw').bind('click' , function(){
				var $oldPsw = $('#oldPsw').val();
	    		var $newPsw = $('#newPsw').val();
	    		//关闭模态框
    			$('#editPassword').modal('hide');

	    		if($oldPsw == $txtPassword.val()){
	    			if($newPsw == ''){
	    				showDialog("#E11111" , "新密码不能为空！");
	    			}
	    			else{
	    				$.post('ajax/changePsw.php' , {"oldPsw":$oldPsw , "newPsw":$newPsw , "memberId":$txtMemberId} , function(response){
		    				if(response.code == 100){
		    					$('#oldPsw').val('');
	    						$('#newPsw').val('');
	    						getUserAllData();
	    						showDialog("#1DA362" , "密码修改成功！");
	    					}
    					})
	    			}
	    			
	    		}
	    		else{
	    			$('#oldPsw').val('');
    				$('#newPsw').val('');
    				showDialog("#E11111" , "原密码不正确！");
	    		}
    			
    		});


    		$('.btnSubmit').bind('click' ,function(){
    			$sex = $('input[name=sex]:checked').val();
    			$star = $('option:selected').val();
    			$sign = $('textarea').val();

    			

    		if($('#choseHeader')[0].files[0] && $('.dialog-icon').attr('src') != $('.header-show').attr('src')){
    			//更改了头像
    			/*先上传图片*/
				var formData = new FormData();
					formData.append('image' , $('#choseHeader')[0].files[0]);
					$.ajax({
						url:'ajax/upload.php',
						type:'post',
						data:formData,
						contentType:false,
						processData:false,
						success:function(response){
							/*上传图片成功*/
							if(response.code == 100){
								var $image = response.data;
								/*发送请求 更改信息*/
								$.post('ajax/changeManyInfo.php' , {"sex": $sex, "star": $star, "sign": $sign, "memberId": $txtMemberId , header:$image} , function(response){
				    				if(response.code == 100){
				    					getUserAllData();
				    					showDialog( '#1DA362' , '更新成功！');
				    				}
				    				else{
				    					showDialog( '#E11111' , '您没有更改数据!');
				    				}
				    			});
							}

						}
					});

	    	}
	    	else{
	    		//未更改头像
	    		$.post('ajax/changeManyInfo.php' , {"sex": $sex, "star": $star, "sign": $sign, "memberId": $txtMemberId , header:''} , function(response){
    				if(response.code == 100){
    					getUserAllData();
    					showDialog( '#1DA362' , '更新成功！');
    				}
    				else{
    					showDialog( '#E11111' , '您没有更改数据!');
    				}
    			});
	    	}
			




    });	



    			/***************************************/
				function getUserAllData(){
    				$.get('ajax/getUserInfo.php?memberId=' + $txtMemberId  , function(response){
			    		if(response.code == 100){
			    			if(response.data["Header"]){
			    				$('.dialog-icon').attr('src' , response.data["Header"]);
			    				$('.header-show').attr('src' , response.data["Header"]);
			    			}
			    			else{
			    				$('.dialog-icon').attr('src' , "image/default.png");
			    				$('.header-show').attr('src' , "image/default.png");
			    			}

			    			//邮箱显示
			    			if(response.data["Email"]){
			    				$showEmail.text(response.data["Email"]);
			    			}
			    			else{
			    				$showEmail.text('暂无邮箱');
			    			}
			    			//隐藏密码
			    			$('#txtPassword').val(response.data["Password"]);
			    			
			    			//性别显示
			    			$("input[type=radio][value='" + response.data["Sex"] + "']").prop("checked", "checked");
			    			
			    			//星座显示
			    			$("option[value='" + response.data["Star"] + "']").prop("selected", "selected");
			    			//个签显示
			    			$('textarea').val(response.data["Sign"]);
			    			if(response.data["Sign"]){
			    				$('.sign-show').text(response.data["Sign"]);
			    			}
			    			else{
			    				$('.sign-show').text("暂无签名");
			    			}
			    			
			    			
			    			
			    			
			    		}
			    	});
    			}

	    		function showDialog($color = "#1DA362" , $msg){
	    			window.clearInterval(timer);
	    			$dialog.text($msg);
	    			$dialog.css('color' , $color);
	    			$dialog.css('display' , 'block');
	    			timer = setInterval(function(){
	    				$dialog.css('display' , 'none');
	    			} , 1000);
	    		}



			  /*预览图片*/
			 $('#choseHeader').bind('change', function(e) {


		                //检查是否选择文件
		                if(this.files.length == 0)
		                    return;

		                var file = this.files[0];

		                //检查文件大小
		                if(file.size >1024 * 1024 *2){
		                    //超过2M

		                    this.value = null;
		                    return;
		                }

		                //检查文件类型
		                if(!(file.type == 'image/png' || file.type == 'image/jpeg')){

		                    this.value = null;
		                    return;
		                }
		                var fileReader = new FileReader();
		                fileReader.onload = function(e){
		                    var tempImage = new Image();
		                    //if(tempImage.width == 1024 || tempImage.height == 768){
		                    //预览
		                    tempImage.src = e.target.result;

		                    $('.dialog-icon').attr('src', tempImage.src);

		                };
		                fileReader.readAsDataURL(file);

		            });

	});