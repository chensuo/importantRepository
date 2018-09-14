<?php 
    require_once("services/dbHelper.php"); 
    require_once("services/dataService.php");
    require_once("services/globalService.php");

    @session_start();

    /*已经登录状态 跳转index*/
    if(array_key_exists("Current", $_SESSION)){
        header("location:index.php");
        exit;
    }



    /*获取mainPage*/
    if(array_key_exists("mainPage", $_GET)){
        $mainPage = $_GET["mainPage"];
    }
    else{
        $mainPage = 1;
    }

  
    $messageShow = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            
           //验证信息是否正确
             $name = $_POST["userName"];
             $password = $_POST["password"];
             $user = readData(confirmUserSql($name , $password));
             if(count($user) > 0){
                 

                    // 保存当前用户信息
                    $_SESSION["Current"] = $user[0];
                    print_r($_SESSION["Current"]);
                    
                   
                    if(stristr($_SESSION["BackUrl"] , 'register.php') != ''){
                        header("location:" . "index.php");
                        unset($_SESSION["BackUrl"]);
                    }
                    else{
                        header("location:" . $_SESSION["BackUrl"]);
                        unset($_SESSION["BackUrl"]);
                    }
                   
                
            }
            else{
                $messageShow = "<div class='errorInfor' style='display: block;' ><i class='fa fa-times-circle'></i> 用户名或密码错误 !</div>";
            }
            
        }
          /*返回上一界*/
        @$backURL = $_SERVER["HTTP_REFERER"];
        @$_SESSION["BackUrl"] = $backURL;

       


 ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>登录frontier</title>
    <link rel="stylesheet" href="lib/css/font-awesome.css"/>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>
    <div>
        <div class="adShow"></div>
            <form method="post">
                <div class="container">
                    <div class="load-title"><a href="login.php" class="<?php echo $mainPage == 1 ? 'active':'notActive' ?>">登录frontier</a><a href="register.php" class="<?php echo $mainPage == 2 ? 'active':'notActive' ?>">注册</a></div>
                    <!-- <div class="load-secTitle">欢迎登录frontier</div> -->
                    <div class="load-body">
                            <input type="text" id="txtName" class="inputNotActive" name="userName" placeholder="请输入您的手机号 !" autocomplete="off" maxlength="11" value="18852676220"/>
                            <input type="password" id="txtPassword" name="password" class="inputNotActive" placeholder="请输入您的用户密码 !" autocomplete="off" value="6220"/>
                            <?php echo $messageShow == ''? '':$messageShow ?>
                            <button class="btnLoad">登&nbsp;&nbsp;录</button><a href="<?php echo stristr($_SESSION["BackUrl"] , 'register.php') != '' ?'index.php':$_SESSION["BackUrl"];?>" class="btnLoadA">返&nbsp;&nbsp;回</a>
                    </div>
                </div>
            </form>

    </div>

    <script src="lib/js/jquery.js"></script>
    <script src="js/login.js"></script>

</body>
</html>