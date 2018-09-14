/**
 * Created by Administrator on 2017/12/27.
 */
$(function(e){
    var $li = $('.nav-sidebar>li:not(:first-child)');
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var $userNameSpan = $('.userNameSpan');
    var $iframe = $('iframe');
    var lnkAddress =['singerCategory','singer','songsCategory','songs','count','mine',];

    //头部管理员部分 显示登录人姓名
    $userNameSpan.text(currentUserData.TrueName);

    //这里选择进入页面后 亮第一个li
    $($li[0]).addClass('liChosed');
    //点中li li保持特殊背景色

    //点击导航 切换iframe内容
    $li.bind('click',function(e){
        var idx = $(this).index() - 1;
        if(this.className == 'liChosed'){
            var iddx = $(this).index() - 1;
        }
        //如果点击同一个 不更改iframe的src
        if(idx == iddx){
            return false;
        }
        $li.removeClass('liChosed');
        $(this).addClass('liChosed');
        $iframe.attr('src',lnkAddress[idx] + '.html');
    });








    //点击注销返回登录页面 并清空用户名 和sessionStorage数据
    $('.btnOutLine').bind('click',function(e){
        $userNameSpan.text('');
        sessionStorage.removeItem('currentUser');
        window.location.href = 'login.html';
    });

    /***********************/





});