window.addEventListener('load',function(e){
	var loadZc = $('.loadZc');
	var loadButton = $('.load-button');
	var load = $('.load');
	var closeLoadList = $('.closeLoadList');
	var btnLoad = $('.btn-submit');
	var password = $('#password');
	var phone = $('#phone');
	var txtPassword = $('#txtPassword');
	var txtPhone = $('#txtPhone');
	var loadCancelButton = $('.loadCancelButton');
	var loadZc = $('.loadZc');
	var loadShow = $('.loadShow');
	var loaderName = $('.loaderName');
	var currentUser = null;

	//登陆按钮点击
	loadButton.onclick = function(e){
		load.style.display = 'block';
	}
	//登陆页面关闭
	closeLoadList.onclick = function(e){
		load.style.display = 'none';
		password.value = '';
		phone.value = '';
		txtPassword.innerText = '';
		txtPhone.innerText = '';
	}


	/*
	功能：密码
	*/
	function CheckPassword(){
		txtPassword.innerText = '';
			if(password.value == ''){
				txtPassword.innerText = '密码不能为空!';
				return false;
			}
			var regPassword = /^\w{6,12}$/;
			if(!regPassword.test(password.value)){
				txtPassword.innerText = '密码为6-12位的非空白字符!';
				return false;
			}
			return true;

	}
	/*
	功能：手机号码
	*/
	function CheckPhone(){
		txtPhone.innerText = '';
		txtPhone.style.color = '#ff0000';
		if(phone.value == ''){
				txtPhone.innerText = '手机号码不能为空！';
				return false;
			}
			var regPhone = /^1[3578]\d{9}$/;
			if(!regPhone.test(phone.value)){
				txtPhone.innerText = '电话号码长度为11位的数字，必须以18、13、15、17开头!';
				return false;
			}
			if(regPhone.test(phone.value)){
				txtPhone.style.color = '#6AC62E';
				txtPhone.innerText = '手机号码格式正确!';
				

			}
			
			return true;


	}
	/*
		功能：失去焦点事件
	*/
	password.onblur = CheckPassword;
	phone.onblur = CheckPhone;

	/*
	点击登陆按钮 
	*/
	btnLoad.onclick = function(){	

			//手机号码
			var phoneIsVaile = CheckPhone();

			//密码
			var passwordIsVaile = CheckPassword();

			if(!(phoneIsVaile == true  && passwordIsVaile == true)){
				return false;
			}

		
			
			var phoneData = phone.value;
			var passwordData = password.value;
			var param = 'phone='+phoneData+'&password='+passwordData;
				var xhr = new XMLHttpRequest();
				xhr.open('POST','http://101.200.58.3/htmlprojectwebapi/member/login',true);
				xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				xhr.onreadystatechange = function(e){
					if(this.readyState == 4 && this.status == 200){
						var result=JSON.parse(this.responseText);
						if(result.Code == 100){
							loadShow.style.display='block';
							loadZc.style.display='none';
							load.style.display = 'none';
							currentUser=result.Data;
							loaderName.innerText=result.Data.Phone;

							phone.value = '';
							password.value = '';
							txtPassword.innerText = '';
							txtPhone.innerText = '';


						}
						if(result.Code == 110){
							txtPassword.innerText = '账号或密码错误!';
						}
					}
				}
			xhr.send(param);




			// load.style.display = 'none';
			// password.value = '';
			// phone.value = '';
			// txtPassword.innerText = '';
			// txtPhone.innerText = '';





	}

	//注销按钮
	loadCancelButton.onclick = function(e){
		loadZc.style.display = 'block';
		loadShow.style.display = 'none';
		currentUser=null;
	}















},false)