<?php 
    require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");

    $mainPage = 2;

    $messageShow = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            /*返回上一界*/
            $backURL = $_SERVER["HTTP_REFERER"];

            /*写入数据库*/
            $phone = $_POST["userName"];
            $password = $_POST["password"];
            $nickName = $_POST["nickName"];

            readData(registerSql($phone , $password , $nickName) , 'no');


            // 跳转
            returnMessages("注册成功!" , "login.php");
            exit;
                
        }
        /*返回上一界*/
       @$backURL = $_SERVER["HTTP_REFERER"];


 ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>注册frontier</title>
    <link rel="stylesheet" href="lib/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
    <div>
        <div class="adShow"></div>
            <form method="post">
                <div class="container">
                    <div class="load-title"><a href="login.php" class="notActive">登录frontier</a><a href="register.php" class="active">注册</a></div>
                    <div class="load-body">
                            <div><label>手机号:</label><input id="phone" name="userName" type="text" name="" placeholder="请输入手机号 !"></div>
                            <div><label></label><input name="code" id="code" type="text" name="" placeholder="请输入验证码 !"><button  id="btnSendCode" type="button">点击发送</button></div>
                            <div><label>密码:</label><input id="txtPassword" name="password" type="password" name="" placeholder="请输入密码 !"></div>
                            <div><label>昵称:</label><input id="txtNickName" name="nickName" type="text" name="" placeholder="请填写昵称 !"></div>
                            <button class="btnLoad btnRegister">注&nbsp;&nbsp;册</button><a href="<?php echo $backURL ?>" class="btnLoadA">返&nbsp;&nbsp;回</a>
                    </div>
                </div>
            </form>


    </div>

    <script src="lib/js/jquery.js"></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>
</body>
</html>