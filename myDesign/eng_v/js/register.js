 $(function(e){
    /*发送验证码*/
    var $btnSendCode = $('#btnSendCode');
    var $code = $('#code');
    var txtName = $('#phone');
    var txtPassword = $('#txtPassword');
    var txtNickName = $('#txtNickName');
    var $isRight = 0;
    var timer1;
    var timer2;
    /*点击发送验证码按钮*/
     $btnSendCode.bind('click' , function(){
        var phone = $('#phone').val();

        var pattern = /^1[3578]\d{9}$/;

        if(!pattern.test(phone)){
            alert('号码无效');
            return;
        }


        /*ajax 请求发送短信*/
        $.get('ajax/sendCode.php?phone=' + phone , function(response){
            if(response.code == 100){
                $btnSendCode.text('发送成功');
                $btnSendCode.css('color' , '#1AF01C');
                window.clearInterval(timer1);
                 timer1 = setInterval(function(){
                    $btnSendCode.text('点击发送');
                    $btnSendCode.css('color' , '#fff');
                },1500);
            }
            else{
                $btnSendCode.text('发送失败');
                $btnSendCode.css('color' , '#EF4300');
                window.clearInterval(timer2);
                timer2 = setInterval(function(){
                   $btnSendCode.text('点击发送');
                    $btnSendCode.css('color' , '#fff');
                },1500);
            }
        });

        /*鼠标移出验证码框 开始验证验证码*/
        $code.blur(function(){
            var code = $('#code').val();
            $.get('ajax/validateCode.php?phone=' + phone + '&code=' + code , function(response){
                console.log(response);
                if(response.code == 100){
                    console.log("验证码正确");
                    $code.css('border' , '1px solid #1AF01C');
                    $isRight = 1;
                }
                else{
                    $code.css('border' , '1px solid #EF4300');
                }
            });                   

        });

    });

     //点击注册
    $('.btnRegister').bind('click',function(e){
        var userNameIsVaile = CheckUserName();
        var passwordIsVaile = CheckPassword();
        var codeIsVaile = CheckCode();
        var nickNameIsVaile = CheckNickName();
        if(!(userNameIsVaile && passwordIsVaile && codeIsVaile && nickNameIsVaile && $isRight == 1)){
            return false;
        }

    });

    //验证用户名不能为空
    function CheckUserName() {
        txtName.removeClass('inputActive');
        txtName.attr('placeholder','请输入您的手机号 !');
        if (txtName.val() == '') {
            txtName.addClass('inputActive');
            txtName.attr('placeholder','手机号不能为空 !');
            return false;
        }
        return true;
    }

    //验证密码不能为空
    function CheckPassword() {
        txtPassword.removeClass('inputActive');
        txtPassword.attr('placeholder','请输入您的用户密码 !');
        if (txtPassword.val() == '') {
            txtPassword.addClass('inputActive');
            txtPassword.attr('placeholder','用户密码不能为空 !');
            return false;
        }
        return true;
    }

    //昵称不能为空
    function CheckNickName(){
        txtNickName.removeClass('inputActive');
        txtNickName.attr('placeholder','请填入您的昵称 !');
        if (txtNickName.val() == '') {
            txtNickName.addClass('inputActive');
            txtNickName.attr('placeholder','昵称不能为空 !');
            return false;
        }
        return true;
    }
     //验证码不能为空
    function CheckCode(){
        $code.removeClass('inputActive');
        $code.attr('placeholder','请输入验证码 !');
        if ($code.val() == '') {
            $code.addClass('inputActive');
            $code.attr('placeholder','验证码不能为空 !');
            return false;
        }
        return true;
    }


});