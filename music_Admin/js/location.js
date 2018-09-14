/**
 * Created by Administrator on 2017/12/28.
 */
//未登录状态跳转到登录
var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
if(sessionStorage.getItem('currentUser') == null){
    window.location.href = "login.html";
}
