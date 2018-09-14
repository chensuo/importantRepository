/**
 * Created by Administrator on 2018/1/2.
 */
$(function(e){
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));

    $.validator.addMethod('notEqual',function(value,element,param){
        //var regOldPassword = /^[A-Za-z][0-9A-Za-z]{3,19}$/;
        //return regUserName.test(value);
        if(value !== $('#password').val()){
            return true;
        }
    },'新密码不能与旧密码一直!');
    $('form').validate({
        rules:{
            oldPassword:{
                required:true,
                rangelength: [4,4],
                digits:true

            },
            newPassword:{
                required:true,
                notEqual:true,
                rangelength: [4,4],
                digits:true


            },
            confirmPassword:{
                required:true,
                equalTo:'#newPassword',
            }

        },
        messages:{
            oldPassword:{
                required:'旧密码不能为空!',
                rangelength:'旧密码为4位数字!',
                digits:'旧密码为4位数字!'
            },
            newPassword:{
                required:'新密码不能为空!',
                rangelength:'新密码为4位数字!',
                digits:'新密码为4位数字!'
            },
            confirmPassword:{
                required:'请再次确认密码!',
                equalTo:'两次输入密码不一致!',
            }

        },
        submitHandler:function(form){
            /*
             *   更新密码
             * */
            $.ajax({
                type:'post',
                url:'http://192.168.12.100/htmlprojectwebapi/account/modifypassword',
                data:{id:currentUserData.Id,oldPassword:$('#password').val(),newPassword:$('#newPassword').val()},
                success:function(result){
                    if(result.Code == 100){
                        alert('修改成功!');
                        sessionStorage.clear();
                        parent.location.href = "login.html";

                    }
                    if(result.Code == 111){
                        alert('旧密码不正确!');
                    }
                },
                dataType:'json'
            });
            return false;

        }

    });


});