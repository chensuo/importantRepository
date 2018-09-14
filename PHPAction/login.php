<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="lib/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>
    <?php 
        require_once("service/dataService.php");

        session_start();

        if(array_key_exists("Current", $_SESSION)){
            header("location:index.php");
            exit;
        }

        $messageShow = "<div class='errorInfor' style='display: none;' ><i class='fa fa-times-circle'></i> 用户名或密码错误 !</div>";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //验证信息是否正确
             $name = $_POST["userName"];
             $password = $_POST["password"];
             $user = readData(confirmUserSql($name , $password));
             if(count($user) > 0){
                 

                    // 保存当前用户信息
                    $_SESSION["Current"] = $user[0]["name"];
                    $_SESSION["CurrentId"] = $user[0]["id"];
                    
                   

                    // 跳转
                    header("location:" . $_SESSION["BackUrl"]);
                    unset($_SESSION["BackUrl"]);

                    exit;
                
             }
             else{
                $messageShow = "<div class='errorInfor' style='display: block;' ><i class='fa fa-times-circle'></i> 用户名或密码错误 !</div>";
             }
             
           
            
        }
        else{
            $backURL = $_SERVER["HTTP_REFERER"];
            $_SESSION["BackUrl"] = $backURL;
        }


     ?>
    <div>
        <div class="adShow"></div>
        <form method="post">
            <div class="container">
                <div class="load-title">用户登录</div>
                <div class="load-secTitle">看书就去有书看</div>
                <div class="load-body">
                        <input type="text" id="txtName" class="inputNotActive" name="userName" placeholder="请输入您的用户名 !" autocomplete="off" maxlength="11" value="18852676220"/>
                        <input type="password" id="txtPassword" name="password" class="inputNotActive" placeholder="请输入您的用户密码 !" autocomplete="off" value="6220"/>
                        <?php echo $messageShow ?>
                        <button class="btnLoad">登&nbsp;&nbsp;录</button><a href="<?php echo $backURL; ?>" class="btnLoadA">返&nbsp;&nbsp;回</a>
                </div>
            </div>
        </form>
    </div>

    <script src="lib/js/jquery.js"></script>
    <script src="js/login.js"></script>

</body>
</html>