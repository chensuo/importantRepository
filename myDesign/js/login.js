/**
 * Created by Administrator on 2017/12/27.
 */
$(function(e){
    var txtName = $('#txtName');
    var txtPassword = $('#txtPassword');
    var errorInfor = $('.errorInfor');

    //背景图片一直变换
    // ChangeBgImage();

    //失去焦点事件
    txtName.blur(function(e){
        CheckUserName();
    });
    txtPassword.blur(function(e){
        CheckPassword();
    });

    //点击登录
    $('.btnLoad').bind('click',function(e){
        var userNameIsVaile = CheckUserName();
        var passwordIsVaile = CheckPassword();
        if(!(userNameIsVaile && passwordIsVaile)){
            return false;
        }
    });

    /**********************************************************************/
    //背景图片一直变换
    // function ChangeBgImage(){
    //     var index = 0;
    //     var bgImage = ['1.jpg','2.jpg','3.jpg'];
    //     //$('body').css('background-image','url(images/'+ bgImage[0] +')');
    //     var timer = setInterval(function(){
    //         index++;
    //         if(index == bgImage.length){
    //             index = 0;
    //         }
    //         $('body').css('background-image','url(image/'+ bgImage[index] +')');
    //     },3000);

    // }
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


});
