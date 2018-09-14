<?php 
    require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");

    @session_start();

    /*已经登录状态 跳转index*/
    if(array_key_exists("CurrentAdmin", $_SESSION)){
        header("location:index.php");
        exit;
    }

     $messageShow = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            
           //验证信息是否正确
             $name = $_POST["userName"];
             $password = $_POST["password"];
             $user = readData(confirmAdminSql($name , $password));
             if(count($user) > 0){
                 

                    // 保存当前用户信息
                    $_SESSION["CurrentAdmin"] = $user[0];
                    
                   

                    // 跳转
                    header("location:" . "index.php");
                   
                   
                
            }
            else{
                $messageShow = "<div class='errorInfor' style='display: block;' ><i class='fa fa-times-circle'></i> 用户名或密码错误 !</div>";
            }
            
        }
      

 ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>登录frontier管理系统</title>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="lib/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="lib/css/star.css">
    <style type="text/css">
    </style>

</head>
<body>
        <div class="container">
            <form method="post">
                <div class="load-title">登录</div>
                <div class="load-secTitle">frontier管理系统</div>
                <div class="load-body">
                        <input type="text" id="txtName" class="inputNotActive" name="userName" placeholder="请输入您的用户名 !" autocomplete="off" maxlength="11" value="18852676220"/>
                        <input type="password" id="txtPassword" name="password" class="inputNotActive" placeholder="请输入您的用户密码 !" autocomplete="off"  value="6220"/>
                         <?php echo $messageShow == ''? '':$messageShow ?>
                        <div class="errorInfor" style="display: none;" ><i class="fa fa-times-circle"></i> 用户名或密码错误 !</div>
                        <button class="btnLoad">登&nbsp;&nbsp;录</button>
                </div>
            </form>
        </div>

    <script src="lib/js/jquery.js"></script>
    <script src="js/login.js"></script>

</body>
</html>