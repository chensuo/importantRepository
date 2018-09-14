window.addEventListener('load',function(e){
	var newUsers = $('.new-users');
	var createNewUsers = $('.createNewUsers');
	var zcbtnCancel = $('.zcbtn-cancel');
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
	var zctxtCheckbox = $('#zctxtCheckbox');



	//点击主页注册 弹出注册页面
	createNewUsers.onclick = function(e){
		newUsers.style.display = 'block';
	}

	//点击注册页面取消按钮 
	zcbtnCancel.onclick = function(e){
		newUsers.style.display = 'none';

		//清空input面数据
		zcphone.value = '';
		zccnfphone.value = '';
		zcpassword.value = '';
		zccnfpassword.value = '';
		zccheckbox.checked = false;


		zctxtPhone.innerText = '';
		zctxtNews.innerText = '';
		zctxtPassword.innerText = '';
		zctxtCnfPassword.innerText = '';
		zctxtCheckbox.innerText = '';

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
	function ZcCheckCheckbox(){
		if(zccheckbox.checked == false){
			zctxtCheckbox.innerText = '请阅读相关协议！';
			return false; 
		}
		zctxtCheckbox.innerText = '';
		return true;

	}
	


	//失去焦点事件
	zcpassword.onblur = ZcCheckPassword;
	zccnfpassword.onblur = ZcCheckConfirmPassword;
	zcphone.onblur = ZcCheckPhone;


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
			var zcCheckboxIsVaile = ZcCheckCheckbox();

			
			if(!(zcphoneIsVaile==true && zcconfirmPasswordIsVaile==true && zcpasswordIsVaile==true && zcCheckboxIsVaile==true)){
				return false;
			}

			
			var param = 'phone='+zcphone.value+'&password='+zcpassword.value;
				var xhr = new XMLHttpRequest();
				xhr.open('POST','http://192.168.12.100/htmlprojectwebapi/member/register',true);
				xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				xhr.onreadystatechange = function(e){
					if(this.readyState == 4 && this.status == 200){
						var result=JSON.parse(this.responseText);
						if(result.Code == 100){
							alert('注册成功!');
							newUsers.style.display = 'none';
							zcphone.value = '';
							zccnfphone.value = '';
							zcpassword.value = '';
							zccnfpassword.value = '';
							zccheckbox.checked = false;


							zctxtPhone.innerText = '';
							zctxtNews.innerText = '';
							zctxtPassword.innerText = '';
							zctxtCnfPassword.innerText = '';
							zctxtCheckbox.innerText = '';

						}
						else{
							alert('该号码已经被注册!');
							
						}
					}
				}
			xhr.send(param);


			




	}




















},false)