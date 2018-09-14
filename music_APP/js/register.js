(function(){
	var registerBackArrow = $('.registerPage .fa');	
	var registerPage = $('.registerPage');
	var registerBtn = $('.registerBtn');
	var newUsers = $('.new-users');
	var createNewUsers = $('.createNewUsers');
	var zcbtnSubmit  = $('.zcbtn-submit');
	var zcphone = $('#zcphone');
	var zccnfphone = $('#zccnfphone');
	var zcpassword = $('#zcpassword');
	var zccnfpassword = $('#zccnfpassword');
	var zccheckbox = $('.zccheckbox');
	var zctxtPhone = $('#zctxtPhone');
	var zctxtNews = $('#zctxtNews');
	var zctxtPassword = $('#zctxtPassword');
	var zctxtCnfPassword = $('#zctxtCnfPassword');
	var zcnew = $('#zcnew');
	var zcitemNewsgettextbox = $('.zcitem-newsgettextbox');
	var showInfor = $('.showInfor');

	// var zctxtCheckbox = $('#zctxtCheckbox');



	
	//注册页面点击返回箭头 返回我的页面
	registerBackArrow.onclick = function(e){
		registerPage.className = 'registerPage' + ' ' + 'right-out'; 
		//清空input面数据
		zcphone.value = '';
		zcnew.value = '';
		zcpassword.value = '';
		zccnfpassword.value = '';
		// zccheckbox.checked = false;

		zctxtPhone.innerText = '';
		zctxtNews.innerText = '';
		zctxtPassword.innerText = '';
		zctxtCnfPassword.innerText = '';
		// zctxtCheckbox.innerText = '';
		showInfor.innerText = '';
	}
	
	//点击我的页面 注册按钮
	registerBtn.onclick = function(e) {
		registerPage.className = 'registerPage' + ' ' + 'right-in'; 
	}


	/*
	功能：手机号码
	*/
	function ZcCheckPhone(){
		if(zcphone.value == ''){
				zctxtPhone.innerText = '手机号码不能为空！';
				return false;
			}
		var zcregPhone = /^1[3578]\d{9}$/;
		if(!zcregPhone.test(zcphone.value)){
			zctxtPhone.innerText = '电话号码长度为11位的数字，必须以18、13、15、17开头';
			return false;
		}
		zctxtPhone.innerText = '';
		return true;


	}

	/*
	 功能：根据输入的手机号码 获取验证码
	*/
	zcitemNewsgettextbox.onclick = function(e){
		var zcphoneIsVaile = ZcCheckPhone();
		if(zcphoneIsVaile==true){
			var xhr = new XMLHttpRequest();
			xhr.open('GET','http://101.200.58.3/htmlprojectwebapi/Message/Send?phone='+zcphone.value,true);
			xhr.onreadystatechange = function(e){
				if(this.readyState == 4 && this.status == 200){
					var result=JSON.parse(this.responseText);
					if(result.Code == 100){
						zctxtNews.style.color = '#6AC62E';
						zctxtNews.innerText = '发送成功,5分钟内有效!';
					}
					else{
						zctxtNews.style.color = '#ff0000';
						zctxtNews.innerText = '再次发送需等候90s!';
							
					}
				}
			}
		xhr.send(null)

		}
				
	}

	//确认验证码已经填写
	function ZcCheckNew(){
		if(zcnew.value == ''){
			zctxtNews.style.color = '#ff0000';
			zctxtNews.innerText = '请填写验证码!';
			return false
		}
		zctxtNews.innerText = '';
		return true;
	
	}		
		






	/*
	功能：密码
	*/
	function ZcCheckPassword(){
		zctxtPassword.innerText = '';
			if(zcpassword.value == ''){
				zctxtPassword.innerText = '密码不能为空!';
				return false;
			}
			var zcregPassword = /^\w{6,12}$/;
			if(!zcregPassword.test(zcpassword.value)){
				zctxtPassword.innerText = '密码为6-12位的非空白字符！';
				return false;
			}
			return true;

	}
	/*
	功能：确认密码
	*/
	function ZcCheckConfirmPassword(){
		if(zccnfpassword.value != zcpassword.value){
				zctxtCnfPassword.innerText = '两次密码必须一致！';
				return false;

			}
			zctxtCnfPassword.innerText = '';
			return true;

	}

	/*
		复选框必须选中
	*/
	// function ZcCheckCheckbox(){
	// 	if(zccheckbox.checked == false){
	// 		zctxtCheckbox.innerText = '请阅读相关协议！';
	// 		return false; 
	// 	}
	// 	zctxtCheckbox.innerText = '';
	// 	return true;

	// }
	


	//失去焦点事件
	zcpassword.onblur = ZcCheckPassword;
	zccnfpassword.onblur = ZcCheckConfirmPassword;
	zcphone.onblur = ZcCheckPhone;
	zcnew.onblur = ZcCheckNew;


	/*
		点击注册按钮 
	*/
	zcbtnSubmit.onclick = function(){	
			//密码
			var zcpasswordIsVaile = ZcCheckPassword();
			
			//确认密码
			var zcconfirmPasswordIsVaile = ZcCheckConfirmPassword();
			//手机号码
			var zcphoneIsVaile = ZcCheckPhone();
			//复选框
			// var zcCheckboxIsVaile = ZcCheckCheckbox();

			//验证码
			var zcnewIsValie = ZcCheckNew();

			
			if(!(zcphoneIsVaile==true && zcconfirmPasswordIsVaile==true && zcpasswordIsVaile==true && zcnewIsValie==true)){
				return false;
			}

			
			var param = 'phone='+zcphone.value+'&password='+zcpassword.value+'&code='+zcnew.value;
				var xhr = new XMLHttpRequest();
				xhr.open('POST','http://101.200.58.3/htmlprojectwebapi/member/RegisterWithVerifyCode',true);
				xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				xhr.onreadystatechange = function(e){
					if(this.readyState == 4 && this.status == 200){
						var result=JSON.parse(this.responseText);
						if(result.Code == 100){
							console.log('注册成功!');
							registerPage.className = 'registerPage'+ ' ' +'right-out';
							zcphone.value = '';
							zcnew.value = '';
							zcpassword.value = '';
							zccnfpassword.value = '';
							// zccheckbox.checked = false;


							zctxtPhone.innerText = '';
							zctxtNews.innerText = '';
							zctxtPassword.innerText = '';
							zctxtCnfPassword.innerText = '';
							// zctxtCheckbox.innerText = '';
							showInfor.innerText = '';

						}
						if(result.Code == 102){
							showInfor.innerText = '该号码已经被注册!'
							
						}
					}
				}
			xhr.send(param);


			




	}









})();