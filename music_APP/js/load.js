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
	var loadBackArrow = $('.loadPage .fa');
	var loadPage = $('.loadPage');
	var loadBtn = $('.loadBtn');
	var userInforShow = $('.userInforShow');
	var userInforShowSpan = $$$('.userInforShow span');
	var registerBtn = $('.registerBtn');
	var mineTitleSpan = $('.mine-title>span');



	//登陆页面点击返回箭头 返回我的页面
	loadBackArrow.onclick = function(e){
		loadPage.className = 'loadPage' + ' ' + 'right-out'; 
		password.value = '';
		phone.value = '';
		txtPassword.innerText = '';
		txtPhone.innerText = '';
	}
	//点击我的页面 登陆按钮
	loadBtn.onclick = function(e){
		loadPage.className = 'loadPage' + ' ' + 'right-in';
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
				txtPhone.innerText = '请输入一个正确的手机号码!';
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
							console.log('登录成功!');
							loadPage.className = 'loadPage' + ' ' + 'right-out';
							currentUser=result.Data;
							// loaderName.innerText=result.Data.Phone;
							userInforShow.style.display = 'block';
							loadBtn.style.display = 'none';
							registerBtn.style.display = 'none';
							mineTitleSpan.className = 'fa fa-user-circle-o';
							userInforShowSpan[0].innerText = '亲爱的' + result.Data.Phone + '用户，欢迎回来!';
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
	userInforShowSpan[1].onclick = function(e){
		userInforShow.style.display = 'none';
		loadBtn.style.display = 'block';
		registerBtn.style.display = 'block';
		mineTitleSpan.className = 'fa fa-user-circle';
		currentUser=null;
	}















},false)