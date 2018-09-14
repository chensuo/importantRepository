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
    <title>register frontier</title>
    <link rel="stylesheet" href="lib/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
    <div>
        <div class="adShow"></div>
            <form method="post">
                <div class="container">
                    <div class="load-title"><a href="login.php" class="notActive">Sign in frontier</a><a href="register.php" class="active">register</a></div>
                    <div class="load-body">
                            <div><label>Phone:</label><input id="phone" name="userName" type="text" name="" placeholder="phone number !"></div>
                            <div><label></label><input name="code" id="code" type="text" name="" placeholder="verification code !"><button  id="btnSendCode" type="button">send</button></div>
                            <div><label>Psw:</label><input id="txtPassword" name="password" type="password" name="" placeholder="Password !"></div>
                            <div><label>Name:</label><input id="txtNickName" name="nickName" type="text" name="" placeholder="Nickname !"></div>
                            <button class="btnLoad btnRegister">register</button><a href="<?php echo $backURL ?>" class="btnLoadA">return</a>
                    </div>
                </div>
            </form>


    </div>

    <script src="lib/js/jquery.js"></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>
</body>
</html>