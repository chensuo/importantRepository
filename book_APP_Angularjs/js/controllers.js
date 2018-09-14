/**
 * Created by Administrator on 2018/1/8.
 */

/*
*   app模块 控制器
*
* */
(function(){
    angular.module('app.controller' , ['app.service'])
        /*******home*********/
        .controller('homeController' , function($scope , homeService ,$location ,$window ,$interval){
            //ad
            $scope.adList = [];
            homeService.getAdImages().then(function(response){
                if(response.status == 200 && response.data.Code == 100) {
                    $scope.adList = response.data.Data;

                    $scope.$watch($scope.adList, function () {

                        if ($scope.adList) {
                            var images = document.querySelectorAll('.image-wrapper>div');
                            var index = 0;
                            $interval(function(){
                                images[index].className = 'outLeft';
                                index++;
                                if(index >= images.length){
                                    index = 0;
                                }
                                images[index].className = 'inRight';
                            } , 3000)
                        }

                    })
                }
            });

            //网速慢显示提示
            $scope.isShowHis = true;
            $scope.returnIsShowHis = function(item){
                if(item){
                    $scope.isShowHis = false;
                }
                else{
                    $scope.isShowHis = true;
                }
            };




            //点击图片跳转详情
            $scope.goDetail = function(item){
                $location.url('/bookdetail/' + item.Book.Id);
                //console.log(item.Book.Id);
            };

            //点击搜索图标 跳转搜索页面
            $scope.goSearch = function(){
                $location.url('/search');
            };






            //首页推荐栏目 和 书项目
            $scope.books = [];
            $scope.booksAll = [];
            homeService.getNewBooks().then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    //$scope.newBooks = response.data.Data[1];
                    //$scope.recdBooks = response.data.Data[0];
                        $scope.books = response.data.Data;

                }
            });

            //跳转列表
            $scope.goList = function(item){
                $window.sessionStorage.setItem('bookItem' , JSON.stringify(item));
                $location.url('/newbooks');
            }
        })

        /************首页列表************/
        .controller('newbooksController' , function($scope , $window ,$location){
            $scope.booksAllData = JSON.parse($window.sessionStorage.getItem('bookItem'));
            $scope.books = [];
            $scope.booksAll = [];
            $scope.btnGetMoreIsShow = 0;//0是隐藏
            $scope.listBtnCode = 0;//当前点击加载更多按钮次数 显示默认4个;
            $scope.listShowNoMore = 0; //为1时显示没有更多了

            //网速慢显示提示
            $scope.isShowHis = true;
            $scope.returnIsShowHis = function(item){
                if(item){
                    $scope.isShowHis = false;
                }
                else{
                    $scope.isShowHis = true;
                }
            };


            //点击图片跳转详情
            $scope.goDetail = function(item){
                $location.url('/bookdetail/' + item.Book.Id);
                //console.log(item.Book.Id);
            };


            if($scope.booksAllData.Books.length <= 4){
                //图书项目 数量 小于等于4 一次性显示
                $scope.books = $scope.booksAllData;


                //console.log($scope.list);
            }

            else {
                $scope.btnGetMoreIsShow = 1;//显示加载更多按钮

                //默认显示4个
                $scope.books.Name = $scope.booksAllData.Name;
                $scope.books.Books = $scope.booksAllData.Books.slice(0,4);

                //图书项目 数量 大于4 点击加载更多才显示
                for(var i = 0; i < $scope.booksAllData.Books.length; i += 4) {
                    $scope.booksAll.push($scope.booksAllData.Books.slice(i, i + 4));

                };

                $scope.bottomCode = 0;
                //点击加载更多按钮
                $scope.loadMoreBooks = function(){

                    if($scope.listBtnCode < $scope.booksAll.length-1){
                        $scope.listBtnCode++;
                        $scope.books.Name = $scope.booksAllData.Name;
                        $scope.books.Books = $scope.books.Books.concat($scope.booksAll[$scope.listBtnCode]);
                    }
                    else{
                        $scope.listShowNoMore = 1;//显示没有更多了
                        $scope.btnGetMoreIsShow = 0;//隐藏加载更多按钮

                    }

                }

            }

        })
    /*******sort*********/
        .controller('sortController' , function($scope , sortService , $location){
            //获取分类信息
            $scope.sortData = [];
            sortService.getSort().then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    $scope.sortData = response.data.Data;
                    //console.log($scope.sortData);
                }
            });

            //网速慢显示提示
            $scope.isShowHis = true;
            $scope.returnIsShowHis = function(item){
                if(item){
                    $scope.isShowHis = false;
                }
                else{
                    $scope.isShowHis = true;
                }
            };

            //跳转list页面
            $scope.goList = function(item){
                $location.url('/list?categoryId=' + item.Id);
            };


        })
        /*******find*********/
        .controller('findController' , function($scope){

        })
        /*******mine*********/
        .controller('mineController' , function($scope , getDataService , $location){

            $scope.isLoginSuccess = true;
            $scope.currentUserData = getDataService.getUserData('currentUserData');
            if($scope.currentUserData){
                //有数据 登录成功
                $scope.isLoginSuccess = false;
                //console.log($scope.currentUserData);
            }
            else{
                //没数据 显示未登录状态
                $scope.isLoginSuccess = true;
            }

            //跳转个人页面
            $scope.goPersonal = function(){
                $location.url('/personal');

            };
            //我的借书架
            $scope.goMyBookRoom = function(){
              if($scope.currentUserData){
                  //已经登录状态
                  $location.url('/myBookRoom');
              }
                else{
                  //未登录状态
                  $location.url('/login');
                }
            };

            //我的借阅 (借阅历史)
            $scope.goMyBook = function(){
                if($scope.currentUserData){
                    //已经登录状态
                    $location.url('/borrowHistory');
                }
                else{
                    //未登录状态
                    $location.url('/login');
                }
            };

            //地址管理
            $scope.goAddress = function(){
                if($scope.currentUserData){
                    //已经登录状态
                    $location.url('/myAddress');
                }
                else{
                    //未登录状态
                    $location.url('/login');
                }
            };

            //软件反馈等三个菜单跳转
            $scope.goother = function(){
                $location.url('/find');
            }



        })
        /********personal**********/
        .controller('personalController' , function($scope , getDataService ,$location ,$window){
            $scope.currentUserData = getDataService.getUserData('currentUserData');

            //点击注销用户
            $scope.backLogin = function(){
                getDataService.removeUserData('currentUserData');
                $window.sessionStorage.removeItem('bookItem');
                $location.url('/mine');
            };
            if($scope.currentUserData.Address){
                $scope.perAddress = $scope.currentUserData.Address;
            }
            else{
                $scope.perAddress = '暂无记录';
            }
            if($scope.currentUserData.CardId){
                $scope.perCardId = $scope.currentUserData.CardId;
            }
            else{
                $scope.perCardId = '暂无记录';
            }


        })
        /*******bookdetail*********/
        .controller('bookdetailController' , function($scope , $routeParams ,$http ,$window ,getDataService ,$location, bookdetailService){
            $scope.myBookRoomToDetail = 0;

            $scope.returnBack = function(){
                $window.sessionStorage.removeItem('myBookRoomToDetail');
                $scope.myBookRoomToDetail = 0;
                $window.history.back();
            };

            //网速慢显示提示
            $scope.isShowHis = true;
            $scope.returnIsShowHis = function(item){
                if(item){
                    $scope.isShowHis = false;
                }
                else{
                    $scope.isShowHis = true;
                }
            };



            //若是从我的书架转入详情页面
            if($window.sessionStorage.getItem('myBookRoomToDetail')){
                $scope.myBookRoomToDetail = 1;
            }

            //console.log('id为:' + $routeParams.Id);
            $scope.bookId =  $routeParams.Id;
            $scope.bookItem = [];
            $scope.books = [];

            $http.get('http://101.200.58.3/librarywebapi/book/single?id=' + $scope.bookId)
                .then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.bookItem = response.data.Data;
                        //console.log($scope.bookItem);
                    }
                });

            $scope.currentUserData = getDataService.getUserData('currentUserData');
            //我的借书架
            $scope.goMyBookRoom = function(){
                if($scope.currentUserData){
                    //已经登录状态
                    $location.url('/myBookRoom');
                }
                else{
                    //未登录状态
                    $location.url('/login');
                }
            };

            $scope.addBookShow = '加入借书架';
            $scope.colorCode = 0;
            //加入借书架
            $scope.clickAddBook = function(){
                if($scope.currentUserData){

                    //可借数量为0的时候 => 不可借
                    if($scope.bookItem.Number == 0){
                        //console.log('对不起库存数量为0');
                        $scope.addBookShow = '可借数量不足';
                        $scope.colorCode = 1;

                    }
                    //可借数量不为0的时候 => 可以借
                    else{

                            //借书架中没有当前添加的书
                            bookdetailService.addMyBook($scope.currentUserData.Id , $scope.bookId).then(function(response){
                                if(response.status == 200 && response.data.Code == 100){
                                    //console.log('成功添加!');
                                    $scope.addBookShow = '添加成功';
                                    $scope.colorCode = 2;
                                    //已经登录状态
                                    //$location.url('/myBookRoom');
                                }
                                if(response.status == 200 && response.data.Code == 217){
                                    console.log('该图书已在您的借书架中!');
                                    $scope.addBookShow = '借书架已有该书';
                                    $scope.colorCode = 3;

                                }
                            });

                        }
                        //else{
                        //    console.log('您的借书架已拥有该书!');
                        //}



                }
                else{
                    //未登录状态
                    $location.url('/login');
                }

            }


        })
        /*******list*********/
        .controller('listController' , function($scope , $routeParams ,searchService ,$location ,$window,getDataService){
            $scope.returnBack = function(){
                $window.history.back();
            };
            $scope.params = {
                categoryId: $routeParams.categoryId,
                publisherId: '',
                keyword: $routeParams.keyword
            };

            //点击图片跳转详情
            $scope.goDetail = function(item){
                $location.url('/bookdetail/' + item.Book.Id);
                //console.log(item.Book.Id);
            };
            //console.log('id为:' + $routeParams.categoryId);


            $scope.list = [];
            $scope.listAll = [];
            $scope.btnGetMoreIsShow = 0;//0是隐藏
            $scope.listBtnCode = 0;//当前点击加载更多按钮次数 显示默认4个;
            $scope.listShowNoMore = 0; //为1时显示没有更多了
            //getDataService.setUSerData('btnGetMoreBooks', $scope.listBtnCode);


                searchService.getListData($scope.params).then(function(response){
                    if(response.status == 200 && response.data.Code == 100) {
                        if(response.data.Data.length <= 4){
                            //图书项目 数量 小于等于4 一次性显示
                            $scope.list = response.data.Data;
                            //console.log($scope.list);
                        }



                        else {
                            $scope.btnGetMoreIsShow = 1;//显示加载更多按钮

                            //默认显示4个
                            $scope.list = response.data.Data.slice(0,4);

                            //图书项目 数量 大于4 点击加载更多才显示
                            for (var i = 0; i < response.data.Data.length; i += 4) {
                                $scope.listAll.push(response.data.Data.slice(i, i + 4));

                            }

                            $scope.bottomCode = 0;
                            //点击加载更多按钮
                            $scope.loadMoreBooks = function(){

                                if($scope.listBtnCode < $scope.listAll.length-1){
                                    $scope.listBtnCode++;
                                    $scope.list = $scope.list.concat($scope.listAll[$scope.listBtnCode]);
                                    //console.log($scope.listAll.length);
                                    //console.log($scope.listAll);
                                }
                                else{
                                    $scope.listShowNoMore = 1;//显示没有更多了
                                    $scope.btnGetMoreIsShow = 0;//隐藏加载更多按钮

                                }

                        }





                        }}

                });


            $scope.isShow = true;
            $scope.returnIsShow = function(item){
                if(item){
                    $scope.isShow = false;
                }
                else{
                    $scope.isShow = true;
                }
            };




        })
        /*******login*********/
        .controller('loginController' , function($scope ,loginService , $location , $window , getDataService){
            $scope.form = {
                phone:'',
                password:''
            };

            $scope.returnBack = function(){
                $window.history.back();
            };

            //账号密码错误提示 是否显示
            $scope.infoShow = false;
            $scope.infoShowSuccess = false;

            $scope.enterIn = function(){
                //console.log($scope.form.phone , $scope.form.password);
                loginService.postPersonData($scope.form.phone , $scope.form.password).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //console.log(response);
                        $scope.infoShowSuccess = true;
                        $scope.infoShow = false;
                        getDataService.setUSerData('currentUserData' , response.data.Data);
                        //成功=>跳转mine页面
                        $location.url('/mine');
                    }
                    else{
                        $scope.infoShow = true;
                        $scope.infoShowSuccess = false;
                    }
                });
            };



        })
        /*************resetPassword*****************/
        .controller('resetController' , function($scope , resetService ,$timeout , $location){
            $scope.form = {
                phone: '',
                phoneNews:''
            };


            $scope.btnSend = '获取验证码';
            $scope.btndisabled = false;

            //$scope.isSend = false;
            //获取验证码
            $scope.getPhoneNews = function(){
                resetService.postPhoneNews($scope.form.phone).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        console.log('发送成功，90秒后更改发送按钮显示,并且按钮才可点击(暂时改成3秒后更改按钮显示文字)');
                        //显示发送成功
                        //$scope.isSend = true;
                        $scope.btnSend = '90s后再次发送';
                        $scope.btndisabled = true;

                        $scope.$watch('btnSend',function(){
                            if($scope.btnSend == '90s后再次发送'){
                                $timeout(function(){
                                    $scope.btnSend = '获取验证码';
                                    $scope.btndisabled = false;
                                } , 3000)}
                        });
                    }
                });

            };

            //验证码与手机号不相符 错误信息是否显示
            $scope.phoneNewsShow = false;
            $scope.phoneNewsShowSuccess = false;

            //验证 验证码是否正确(点击下一步按钮)
            $scope.enterIn = function(){
                resetService.confirmPhoneNews($scope.form.phone , $scope.form.phoneNews).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        console.log(response.data.Data);
                        $scope.phoneNewsShow = false;
                        $scope.phoneNewsShowSuccess = true;

                        //成功后跳转页面
                        $location.url('/startReset/' + response.data.Data.Id);

                    }
                    else{
                        $scope.phoneNewsShow = true;
                        $scope.phoneNewsShowSuccess = false;
                        console.log('验证错误!')
                    }
                });
            };

        })
        /*******************startReset******************/
        .controller('startResetController' , function($scope , startResetService , $routeParams , $location){
            $scope.form = {
                password:''
            };
            $scope.resetSuccess = false;
            $scope.confirmReset = function(){
                startResetService.postNewPassword($routeParams.id , $scope.form.password).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        console.log('修改成功');

                        //显示成功信息
                        $scope.resetSuccess = true;

                        //跳转登录页面
                        $location.url('/login');

                    }
                });
            }

        })
        /********************myBookRoom（我的借书架）*****************************/
        .controller('myBookRoomController' , function($scope ,$window , myBookRoomService , getDataService ,$location){
            $scope.returnBack = function(){
                $window.history.back();
            };

            //获取当前用户信息
            $scope.currentUserData = getDataService.getUserData('currentUserData');
            //获取我的借书架数据
            $scope.myBookData = [];
            myBookRoomService.getMyBookRoom($scope.currentUserData.Id).then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    $scope.myBookData = response.data.Data;
                    //console.log($scope.myBookData);

                    //初始为空!
                }
            });

            //点击图片跳转详情
            $scope.goDetail = function(item){
                //传入是从我的书架跳转入详情页面的记录
                $window.sessionStorage.setItem('myBookRoomToDetail' , 0);
                $location.url('/bookdetail/' + item.Book.Id);
                //console.log(item.Book.Id);
            };


            //删除单本书
            $scope.delThisBook = function(bookId){
                //console.log(bookId);
                myBookRoomService.delThisBookData($scope.currentUserData.Id , bookId).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //console.log('删除成功!');

                        //再次获取数据
                        myBookRoomService.getMyBookRoom($scope.currentUserData.Id).then(function(response){
                            if(response.status == 200 && response.data.Code == 100){
                                $scope.myBookData = response.data.Data;
                                //console.log($scope.myBookData);

                            }
                        });

                    }
                });

            };

            //若无收藏书 要有提示
            $scope.isShow = true;
            $scope.returnIsShow = function(item){
                if(item){
                    $scope.isShow = false;
                }
                else{
                    $scope.isShow = true;
                }
            };

            $scope.operatorCode = 0;
            //点击编辑
            $scope.startOperator = function(){
                //显示复选框
                $scope.operatorCode = 1;


            };

            //点击删除全部
            $scope.delAllCode = 0;
            $scope.startDel = function(){

                //全选操作前前面复选框必须全选中
                if($scope.chkCode == false){

                    //删除所有数据
                    myBookRoomService.delAllBookData($scope.currentUserData.Id).then(function(response){
                        if(response.status == 200 && response.data.Code == 100){
                            //console.log('全部删除成功!');
                            $scope.operatorCode = 0;
                            //提示无收藏图书
                            $scope.delAllCode = 1;


                            //再次获取数据
                            myBookRoomService.getMyBookRoom($scope.currentUserData.Id).then(function(response){
                                if(response.status == 200 && response.data.Code == 100){
                                    $scope.myBookData = response.data.Data;
                                    //console.log($scope.myBookData);

                                }
                            });

                        }
                    });

                }
                else{
                    //直接关闭复选框 不操作
                    $scope.operatorCode = 0;
                }


            };


            //点击复选框
            $scope.chkCode = true;
            $scope.chkBook = function(){
                $scope.chkCode = !$scope.chkCode;
            };

            //点击全部选中
            $scope.chkAll = function(){

                if( $scope.operatorCode == 1)
                $scope.chkCode = !$scope.chkCode

            };

            //点击提交订单
            $scope.orderInfo = '提交订单';
            $scope.orderCode = 0;
            $scope.submitMyOrder = function(){
                myBookRoomService.submitMyOrderData($scope.currentUserData.Id).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //成功即跳转订单页面(我的借阅)
                        $scope.orderInfo = '提交订单';
                        $scope.orderCode = 0;
                        $location.url('/borrowHistory');
                    }
                    if(response.status == 200 && response.data.Code == 214){
                        console.log('图书没有库存，可以先预订');
                        $scope.orderCode = 1;
                        $scope.orderInfo = '没有库存';
                    }
                });

            }

        })
        /********************borrowHistory(借阅历史/我的借阅)*****************************/
        .controller('borrowHistoryController' , function($scope ,$window ,borrowHistoryController , getDataService ,$location){
            $scope.returnBack = function(){
                $window.history.back();
            };

            //点击头部菜单
            $scope.menuCode = 1;
            $scope.choseOrder = function(){
                //选择当前订单
                $scope.menuCode = 1;
            };
            $scope.choseHistory = function(){
                //选择借阅历史
                $scope.menuCode = 2;
            };

            //无订单的现实
            $scope.isShow = true;
            $scope.returnIsShow = function(item){
                if(item){
                    $scope.isShow = false;
                }
                else{
                    $scope.isShow = true;
                }
            };

            //无借阅历史
            $scope.isShowHis = true;
            $scope.returnIsShowHis = function(item){
                if(item){
                    $scope.isShowHis = false;
                }
                else{
                    $scope.isShowHis = true;
                }
            };

            //获取当前用户信息
            $scope.currentUserData = getDataService.getUserData('currentUserData');
            //获取我的订单
            //当前借阅列表
            $scope.list = [];
            //借阅历史列表
            $scope.listHis = [];
            $scope.smallBook = {};
            $scope.smallBookList = {};
            borrowHistoryController.getMyOrderData($scope.currentUserData.Id).then(function(response){
                if(response.status == 200 && response.data.Code == 100){


                    //筛选当前可操作的订单
                    for(var i = 0 ; i < response.data.Data.length ; i++){
                        //获取当前借阅列表
                        if(!(response.data.Data[i].State == 0 || response.data.Data[i].State == 4)){
                            $scope.smallBook = response.data.Data[i];
                            $scope.list.push( $scope.smallBook);
                        }
                        //获取借阅历史列表
                        else{
                            $scope.smallBookList = response.data.Data[i];
                            $scope.listHis.push($scope.smallBookList);

                        }
                    }


                }
            });

            //显示状态
            $scope.state = '';
            $scope.orderStateShow = function(state){
                if(state == 1){
                     return $scope.state = '等待确认订单';
                }
                if(state == 0){
                    return $scope.state = '订单已取消';
                }
                if(state == 2){
                    return $scope.state = '书已配送';
                }
                if(state == 3){
                    return $scope.state = '已收货,请及时归还';
                }
                if(state == 4){
                    return $scope.state = '书已归还';
                }
            };

            //取消订单
            $scope.notActiveCode = 0;
            $scope.cancelOrder = function(orderId){
                borrowHistoryController.cancelOrderWay(orderId, $scope.currentUserData.Id).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //删除成功!
                        $scope.list = [];
                        $scope.listHis = [];

                        //重新加载数据
                        borrowHistoryController.getMyOrderData($scope.currentUserData.Id).then(function(response){
                            if(response.status == 200 && response.data.Code == 100){
                                //console.log(response.data.Data);

                                //筛选当前可操作的订单
                                for(var i = 0 ; i < response.data.Data.length ; i++){
                                    //获取当前借阅列表
                                    if(!(response.data.Data[i].State == 0 || response.data.Data[i].State == 4)){
                                        $scope.smallBook = response.data.Data[i];
                                        $scope.list.push( $scope.smallBook);
                                    }
                                    //获取借阅历史列表
                                    else{
                                        $scope.smallBookList = response.data.Data[i];
                                        $scope.listHis.push($scope.smallBookList);

                                    }
                                }
                                console.log('取消成功');
                                //console.log($scope.list);
                                //按钮显示不可点击状态
                                $scope.notActiveCode = 2;


                            }
                        });


                    }
                });

            };

            //确认收货
            $scope.confirmOrder = function(orderId){
                borrowHistoryController.confirmOrderWay(orderId, $scope.currentUserData.Id).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //添加成功!
                        //$scope.cancelCode = 1;
                        //console.log(response.data.Data);
                        $scope.list = [];
                        $scope.listHis = [];

                        //重新加载数据
                        borrowHistoryController.getMyOrderData($scope.currentUserData.Id).then(function(response){
                            if(response.status == 200 && response.data.Code == 100){
                                //console.log(response.data.Data);

                                //筛选当前可操作的订单
                                for(var i = 0 ; i < response.data.Data.length ; i++){
                                    //获取当前借阅列表
                                    if(!(response.data.Data[i].State == 0 || response.data.Data[i].State == 4)){
                                        $scope.smallBook = response.data.Data[i];
                                        $scope.list.push( $scope.smallBook);
                                    }
                                    //获取借阅历史列表
                                    else{
                                        $scope.smallBookList = response.data.Data[i];
                                        $scope.listHis.push($scope.smallBookList);

                                    }
                                }
                                console.log('确认收货成功');
                                //console.log($scope.list);
                                //按钮显示不可点击状态
                                $scope.notActiveCode = 1;


                            }
                        });



                    }
                });

            };

            //当前订单点击图片跳转详情
            $scope.goDetail = function(item){
                //此跳转无加入书架操作
                $window.sessionStorage.setItem('myBookRoomToDetail' , 0);
                $location.url('/bookdetail/' + item.BookId);
                //console.log(item.Book.Id);
            };

            //借阅历史单点击图片跳转详情
            $scope.goDetailSec = function(item){
                //此跳转有加入书架操作
                $location.url('/bookdetail/' + item.BookId);
                //console.log(item.Book.Id);
            };







        })
        /************search*******************/
        .controller('searchController' , function($scope ,searchService , $location ,getDataService){
            $scope.params = {
                keyword :'',
                publisherId :'',
                categoryId:''
            };
            $scope.keywordArr = [];

            if(getDataService.getUserData('currentList')){
                $scope.keywordArr = getDataService.getUserData('currentList')
            }


            $scope.list = [];
            $scope.startSearch = function(){
                searchService.getListData($scope.params).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //console.log(response.data.Data);
                        $scope.list = response.data.Data;

                        //存取数据
                        if(!( $scope.keywordArr.indexOf($scope.params.keyword) >= 0) && $scope.params.keyword){
                            $scope.keywordArr.push($scope.params.keyword);
                            getDataService.setUSerData('currentList' ,  $scope.keywordArr);
                            //console.log($scope.keywordArr);
                        }


                        //跳转
                        $location.url('/list?keyword=' + $scope.params.keyword);


                    }
                })
            };

            //清除历史记录
            $scope.clearHistory = function(){
                getDataService.removeUserData('currentList');
                $scope.keywordArr = [];
            };

            $scope.his1 = '三国演义';
            $scope.his2 = '活着';
            $scope.his3 = '上下五千年';
            //点击历史记录进行搜索筛选
            $scope.searchByHis = function(item){
                //console.log(item);
                //跳转
                $location.url('/list?keyword=' + item);
            }


        });






})();