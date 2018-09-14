/**
 * Created by Administrator on 2018/1/15.
 */
(function(){
    /***********app模块=>控制器*****************/
    angular.module('app.controller' , ['app.service'])
        /***************add********************/
        .controller('addController' , function($scope){

        })
        /***************sort**********************/
        .controller('sortController' , function($scope , sortService ,$location ,$window){

            //获取数据
            $scope.sortList = [];
            $scope.priority = 1;
            dataShow();
            function dataShow(){
                sortService.getSortData().then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //console.log(response.data.Data);
                        for(var j = 0 ; j < response.data.Data.length ; j++){
                            $scope.sortList = response.data.Data;

                            //分页总数
                            $scope.pageSize = 9;
                            $scope.pages = Math.ceil($scope.sortList.length / $scope.pageSize); //分页数
                            $scope.newPages = $scope.pages > 5 ? 5 : $scope.pages;
                            $scope.pageList = [];
                            $scope.selPage = 1;
                            //设置表格数据源(分页)
                            $scope.setData = function () {
                                $scope.items = $scope.sortList.slice(($scope.pageSize * ($scope.selPage - 1)), ($scope.selPage * $scope.pageSize));//通过当前页数筛选出表格当前显示数据
                            };
                            $scope.items = $scope.sortList.slice(0, $scope.pageSize);
                            //分页要repeat的数组
                            for (var i = 0; i < $scope.newPages; i++) {
                                $scope.pageList.push(i + 1);
                            }
                            //打印当前选中页索引
                            $scope.selectPage = function (page) {
                                //不能小于1大于最大
                                if (page < 1 || page > $scope.pages) return;
                                //最多显示分页数5
                                if (page > 2) {
                                    //因为只显示5个页数，大于2页开始分页转换
                                    var newpageList = [];
                                    for (var i = (page - 3) ; i < ((page + 2) > $scope.pages ? $scope.pages : (page + 2)) ; i++) {
                                        newpageList.push(i + 1);
                                    }
                                    $scope.pageList = newpageList;
                                }
                                $scope.selPage = page;
                                $scope.setData();
                                $scope.isActivePage(page);
                            };
                            //设置当前选中页样式
                            $scope.isActivePage = function (page) {
                                return $scope.selPage == page;
                            };
                            //上一页
                            $scope.Previous = function () {
                                $scope.selectPage($scope.selPage - 1);
                            };
                            //下一页
                            $scope.Next = function () {
                                $scope.selectPage($scope.selPage + 1);
                            };

                        }

                    }
                });
            }

            /*
             *   查询功能
             * **/
            $tbMain = $('tbody');
            var $formControl = $('.form-control');
            $('#btnSearch').bind('click',function(e){
                $tbMain.children('tr').addClass('notChosed').show();
                $tbMain.children('tr:contains(' + $formControl.val() + ')').removeClass('notChosed');
                $tbMain.children('.notChosed').hide();

            });


            //点击详情 跳转详情页面
            $scope.sortToDetail = function(id){
                $location.url('/sortDetail/' + id);
            };

            //添加新栏目
            $scope.newSortData = {
                name : '',
                priority : 100
            };
            //点击确定添加
            $scope.clickAddNewSortData = function(){
                sortService.addNewSortData($scope.newSortData.name , $scope.newSortData.priority).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //重新获取数据
                        dataShow();
                        //同时关闭模态框
                        $('#myModal').modal('hide');
                        //文本框数据清空;
                        $scope.newSortData = {
                            name : '',
                            priority : 100
                        };

                    }
                });
            };
            //点击取消添加
            $scope.clickCancelAdd = function(){
                //文本框数据清空;
                $scope.newSortData = {
                    name : '',
                    priority : 100
                };
            };

            //删除该分类
            $scope.removeThisSort = function(id){
                sortService.removeThisSortData(id).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        //重新获取数据
                        dataShow();
                    }
                });

            };

            //点击更新 跳转更新页面
            $scope.sortToChange = function(id){
                $location.url('/changeSort/' + id);
            }




        })
        /**************bookCategory*************************/
        .controller('bookCategoryController' , function($scope , bookCategoryService ,$location){
            //获取图书分类信息
            $scope.bookCatagoryList = [];
            dataShow();
            /*
            * 查询
            * */
            $tbMain = $('tbody');
            var $formControl = $('.form-control');
            $('#btnSearch').bind('click',function(e){

                $tbMain.children('tr').addClass('notChosed').show();
                $tbMain.children('tr:contains(' + $formControl.val() + ')').removeClass('notChosed');
                $tbMain.children('.notChosed').hide();

            });
            function dataShow(){
                bookCategoryService.getBookCatagoryData().then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.bookCatagoryList = response.data.Data;
                        //分页总数
                        $scope.pageSize = 9;
                        $scope.pages = Math.ceil($scope.bookCatagoryList.length / $scope.pageSize);
                        $scope.newPages = $scope.pages > 5 ? 5 : $scope.pages;
                        $scope.pageList = [];
                        $scope.selPage = 1;

                        $scope.setData = function () {
                            $scope.items = $scope.bookCatagoryList.slice(($scope.pageSize * ($scope.selPage - 1)), ($scope.selPage * $scope.pageSize));
                        };
                        $scope.items = $scope.bookCatagoryList.slice(0, $scope.pageSize);

                        for (var i = 0; i < $scope.newPages; i++) {
                            $scope.pageList.push(i + 1);
                        }

                        $scope.selectPage = function (page) {

                            if (page < 1 || page > $scope.pages) return;

                            if (page > 2) {

                                var newpageList = [];
                                for (var i = (page - 3) ; i < ((page + 2) > $scope.pages ? $scope.pages : (page + 2)) ; i++) {
                                    newpageList.push(i + 1);
                                }
                                $scope.pageList = newpageList;
                            }
                            $scope.selPage = page;
                            $scope.setData();
                            $scope.isActivePage(page);
                        };

                        $scope.isActivePage = function (page) {
                            return $scope.selPage == page;
                        };

                        $scope.Previous = function () {
                            $scope.selectPage($scope.selPage - 1);
                        };

                        $scope.Next = function () {
                            $scope.selectPage($scope.selPage + 1);
                        };

                    }
                });


            }



            //预览图片

            $scope.iconResource = '';

            $('#iconResource').bind('change', function(e) {

                //检查是否选择文件
                if(this.files.length == 0)
                    return;

                var file = this.files[0];

                //检查文件大小
                if(file.size >1024 * 1024 *2){
                    //超过2M

                    this.value = null;
                    return;
                }

                //检查文件类型
                if(!(file.type == 'image/png' || file.type == 'image/jpeg')){

                    this.value = null;
                    return;
                }
                var fileReader = new FileReader();
                fileReader.onload = function(e){
                    var tempImage = new Image();
                    //if(tempImage.width == 1024 || tempImage.height == 768){
                    //预览
                    tempImage.src = e.target.result;

                    $('.dialog-icon').attr('src', tempImage.src);

                };
                fileReader.readAsDataURL(file);

            });

            //确定添加新分类
            $scope.newBookCategory = {
                name:'',
                icon:null,
            };
            //点击确定添加按钮
            $scope.clickAddNewBookCategoryData = function(){
                $scope.newBookCategory.icon = document.querySelector('#iconResource').files[0];
                bookCategoryService.addNewBookCategoryData($scope.newBookCategory).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){

                        //再次获取数据
                        dataShow();

                        //同时关闭模态框
                        $('#myModal').modal('hide');
                        //文本框数据清空;
                        $scope.newBookCategory = {
                            name:'',
                            icon:null
                        };
                    }
                    else{
                        console.log('添加失败');
                    }
                });
            };
            //点击取消按钮
            $scope.clickCancelAdd = function(){
                //文本框数据清空;
                $scope.newBookCategory = {
                    id:'',
                    name:'',
                    icon:null
                };
            };
            //获取该分类数据
            //点击修改按钮 弹出模态框
            $scope.startChange = function(id){
                bookCategoryService.getThisBookCategoryData(id).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.newBookCategory = {
                            name:response.data.Data.Name,
                            iconSrc:response.data.Data.Image
                        };

                        //点击确定修改按钮 修改数据
                        $scope.clickStartChangeThisCategory = function(){
                            $scope.newBookCategory.id = id;
                            $scope.newBookCategory.icon = document.querySelector('#iconResourceSec').files[0];
                            bookCategoryService.startChangeThisCategory($scope.newBookCategory).then(function(response){
                                if(response.status == 200 && response.data.Code == 100){

                                    //再次获取数据
                                    dataShow();

                                    //同时关闭模态框
                                    $('#myModal-sec').modal('hide');
                                    console.log('change-success');
                                }
                                else{
                                    console.log('change-fail');
                                }


                            });
                        };




                    }

                });
            };

            $('#iconResourceSec').bind('change', function(e) {


                if(this.files.length == 0)
                    return;

                var file = this.files[0];


                if(file.size >1024 * 1024 *2){

                    this.value = null;
                    return;
                }


                if(!(file.type == 'image/png' || file.type == 'image/jpeg')){
                    this.value = null;
                    return;
                }
                var fileReader = new FileReader();
                fileReader.onload = function(e){
                    var tempImage = new Image();
                    //if(tempImage.width == 1024 || tempImage.height == 768){

                    tempImage.src = e.target.result;

                    $('#dialog-icon-sec').attr('src', tempImage.src);

                };
                fileReader.readAsDataURL(file);

            });




        })

        /***************bookData******************************/
        .controller('bookDataController' , function($scope , bookDataService ,bookCategoryService , $location){

            //获取分类下拉框数据
            $scope.selectCategoryList = [];
            bookCategoryService.getBookCatagoryData().then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    response.data.Data.unshift({Id:'' , Name:'全部类别'});
                    $scope.selectCategoryList = response.data.Data;
                }
            });

            //获取出版社下拉框数据
            $scope.selectPublisherList = [];
            bookDataService.getSelectPublisherData().then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    response.data.Data.unshift({Id:'' , Name:'全部出版社'});
                    $scope.selectPublisherList = response.data.Data;
                    //console.log($scope.selectPublisherList);
                }
            });

            //获取所有数据
            $scope.bookDataList = [];
            $scope.bookDataForm = {
                categoryId:'',
                publisherId:'',
                keyword:''
            };
            dataShow();
            //点击查询
            $scope.bookDataSearch = function(){
                //console.log($scope.bookDataForm);
                dataShow();

            };


            //获取数据
            function dataShow(){
                bookDataService.getBookData($scope.bookDataForm).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.bookDataList =  response.data.Data;
                        //console.log($scope.bookDataList);
                        //分页总数
                        $scope.pageSize = 8;
                        $scope.pages = Math.ceil($scope.bookDataList.length / $scope.pageSize); //分页数
                        $scope.newPages = $scope.pages > 5 ? 5 : $scope.pages;
                        $scope.pageList = [];
                        $scope.selPage = 1;
                        //设置表格数据源(分页)
                        $scope.setData = function () {
                            $scope.items = $scope.bookDataList.slice(($scope.pageSize * ($scope.selPage - 1)), ($scope.selPage * $scope.pageSize));//通过当前页数筛选出表格当前显示数据
                        };
                        $scope.items = $scope.bookDataList.slice(0, $scope.pageSize);
                        //分页要repeat的数组
                        for (var i = 0; i < $scope.newPages; i++) {
                            $scope.pageList.push(i + 1);
                        }
                        //打印当前选中页索引
                        $scope.selectPage = function (page) {
                            //不能小于1大于最大
                            if (page < 1 || page > $scope.pages) return;
                            //最多显示分页数5
                            if (page > 2) {
                                //因为只显示5个页数，大于2页开始分页转换
                                var newpageList = [];
                                for (var i = (page - 3) ; i < ((page + 2) > $scope.pages ? $scope.pages : (page + 2)) ; i++) {
                                    newpageList.push(i + 1);
                                }
                                $scope.pageList = newpageList;
                            }
                            $scope.selPage = page;
                            $scope.setData();
                            $scope.isActivePage(page);
                        };
                        //设置当前选中页样式
                        $scope.isActivePage = function (page) {
                            return $scope.selPage == page;
                        };
                        //上一页
                        $scope.Previous = function () {
                            $scope.selectPage($scope.selPage - 1);
                        };
                        //下一页
                        $scope.Next = function () {
                            $scope.selectPage($scope.selPage + 1);
                        };




                    }
                });

            }

            //点击详情跳转详情页面
            $scope.goToDetail = function(id){
                $location.url('/bookDataDetail/' + id);
            };

            //点击修改跳转修改页面
            $scope.goToChange = function(id){
                $location.url('/bookDataChange/' + id);
            };

            //点击添加页面 跳转
            $scope.goToAdd = function(){
                $location.url('/bookDataAdd');
            };

            //入库 数量下拉框
            $scope.optionNum = [{num:1},{num:2},{num:3},{num:4},{num:5},{num:6},{num:7},{num:8},{num:9},{num:10}];

            //点击入库按钮
            $scope.portThisBook = function(id){
                //先获取该书基本信息
                $scope.bookLittleData = {
                    name:'',
                    author:'',
                    image:''
                };
                bookDataService.getThisBookData(id).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.bookLittleData = {
                            name:response.data.Data.Book.Name,
                            author:response.data.Data.Book.Author.Name,
                            image:response.data.Data.Book.Image
                        };
                    }

                });

                //点击确定入库
                $scope.portBookData = {
                    bookId:id,
                    count:'1',
                    libraryId:''
                };
                $scope.portFailCode = false; //默认隐藏
                $scope.portSuccessCode = false;
                $scope.clickPortBook = function(){
                    bookDataService.bookPortData($scope.portBookData).then(function(response){
                        if(response.status == 200 && response.data.Code == 100){
                            console.log('入库成功!');
                            $scope.portSuccessCode = true;
                            $scope.portFailCode = false;
                            //同时关闭模态框
                            $('#myModal').modal('hide');

                        }
                        else{
                            $scope.portFailCode = true;
                            $scope.portSuccessCode = false;
                        }
                    });

                }

            }



        })
        /*************bookDataDetail********************/
        .controller('bookDataDetailController' , function($scope , $stateParams ,bookDataDetailService , $window){

            //获取该图书信息
            $scope.thisBookData = [];
            bookDataDetailService.getThisBookDataDetail($stateParams.id).then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    $scope.thisBookData = response.data.Data;
                    console.log( $scope.thisBookData);
                }
            });


            //点击返回上一页
            $scope.returnBack = function(){
                $window.history.back();
            };



        })
        /**************bookDataChange*******************************/
        .controller('bookDataChangeController' , function($scope , bookDataDetailService ,$stateParams ,$window , bookCategoryService ,bookDataService ,$location){
            //点击返回上一页
            $scope.returnBack = function(){
                $window.history.back();
            };

            //获取该图书信息
            $scope.thisBookData = [];
            $scope.thisBookDataBook = {
                id:'',
                isbn:'',
                name:'',
                publishDate:'',
                categoryId:'',
                publisherId:'',
                authorId:'',
                introduce:'',
                imgSrc:'',
                image:null
            };
            $scope.authorList = [];
            $scope.bookCategoryList = [];
            $scope.publisherList = [];

            //先获取作者
            bookDataDetailService.getAllAuthor().then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    $scope.authorList = response.data.Data;
                    //console.log($scope.authorList);
                }
            })
                //再获取类别
                .then(bookCategoryService.getBookCatagoryData().then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.bookCategoryList = response.data.Data;
                        //console.log($scope.bookCategoryList);
                    }
            }))
                //再获取出版社
                .then(bookDataDetailService.getAllPublisher().then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.publisherList = response.data.Data;
                        //console.log( $scope.publisherList);
                    }
                }))
                //最后获取书数据
                .then( bookDataDetailService.getThisBookDataDetail($stateParams.id).then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    $scope.thisBookData = response.data.Data;
                    $scope.thisBookDataBook = {
                        id:$scope.thisBookData.Book.Id,
                        isbn:$scope.thisBookData.Book.ISBN,
                        name:$scope.thisBookData.Book.Name,
                        publishDate:$scope.thisBookData.Book.PublishDate,
                        categoryId:$scope.thisBookData.Book.Category.Id,
                        publisherId:$scope.thisBookData.Book.Publisher.Id,
                        authorId:$scope.thisBookData.Book.Author.Id,
                        introduce:$scope.thisBookData.Book.Introduce,
                        imgSrc:$scope.thisBookData.Book.Image,
                        image:null
                    };
                    //console.log($scope.thisBookDataBook);
                }
            }));


            //点击确定更新
            $scope.saveBookChange = function(){
                $scope.thisBookDataBook.image = document.querySelector('#bookCover').files[0];
                bookDataService.changeBookData($scope.thisBookDataBook).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        console.log('更新成功!')
                        //返回图书信息管理页面
                        $location.url('/bookData');
                    }
                    else{
                        alert('更新失败! 请注意格式');
                    }
                });
            };





            //更换封面 预览图片
            $('#bookCover').bind('change', function(e) {


                if(this.files.length == 0)
                    return;

                var file = this.files[0];


                if(file.size >1024 * 1024 *2){

                    this.value = null;
                    return;
                }


                if(!(file.type == 'image/png' || file.type == 'image/jpeg')){
                    this.value = null;
                    return;
                }
                var fileReader = new FileReader();
                fileReader.onload = function(e){
                    var tempImage = new Image();
                    //if(tempImage.width == 1024 || tempImage.height == 768){

                    tempImage.src = e.target.result;

                    $('.bookDataChange-cover').attr('src', tempImage.src);

                };
                fileReader.readAsDataURL(file);

            });







        })
        /**************bookDataAdd*******************/
        .controller('bookDataAddController' , function($scope , bookDataDetailService , bookCategoryService ,$window ,bookDataService ,$location){
            //点击返回上一页
            $scope.returnBack = function(){
                $window.history.back();
            };
            //更换封面 预览图片
            $('#bookCover').bind('change', function(e) {


                if(this.files.length == 0)
                    return;

                var file = this.files[0];


                if(file.size >1024 * 1024 *2){

                    this.value = null;
                    return;
                }


                if(!(file.type == 'image/png' || file.type == 'image/jpeg')){
                    this.value = null;
                    return;
                }
                var fileReader = new FileReader();
                fileReader.onload = function(e){
                    var tempImage = new Image();
                    //if(tempImage.width == 1024 || tempImage.height == 768){

                    tempImage.src = e.target.result;

                    $('.bookDataChange-cover').attr('src', tempImage.src);

                };
                fileReader.readAsDataURL(file);

            });

            //进入页面先加载作者下拉框 图书类别下拉框 图书出版社下拉框
            //先获取作者
            bookDataDetailService.getAllAuthor().then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    response.data.Data.unshift({Id:'' , Name:'--请选择--'});
                    $scope.authorList = response.data.Data;
                    //console.log($scope.authorList);
                }
            })
                //再获取类别
                .then(bookCategoryService.getBookCatagoryData().then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        response.data.Data.unshift({Id:'' , Name:'--请选择--'});
                        $scope.bookCategoryList = response.data.Data;
                        //console.log($scope.bookCategoryList);
                    }
                }))
                //再获取出版社
                .then(bookDataDetailService.getAllPublisher().then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        response.data.Data.unshift({Id:'' , Name:'--请选择--'});
                        $scope.publisherList = response.data.Data;
                        //console.log( $scope.publisherList);
                    }
                }));

            //添加图书的参数
            $scope.thisBookDataBook = {
                isbn:'',
                name:'',
                publishDate:'',
                categoryId:'',
                publisherId:'',
                authorId:'',
                introduce:'',
                image:null
            };
            //点击确定添加
            $scope.saveBookAdd = function(){
                $scope.thisBookDataBook.image = document.querySelector('#bookCover').files[0];
                bookDataService.addNewBookData($scope.thisBookDataBook).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                       console.log('添加成功');
                        //跳转回去页面
                        $location.url('/bookData');

                    }
                    else{
                        alert('添加失败,请注意格式!');
                    }
                });
            }




        })
        /***************bookPort*************************/
        .controller('bookPortController' , function($scope){
        })
        /****************orderManage***********************/
        .controller('orderManageController' , function($scope , orderManageService ,sessionService , $window){
            /*
             * 查询
             * */
            //$tbMain = $('tbody');
            //var $formControl = $('.form-control');
            //$('#btnSearch').bind('click',function(e){
            //
            //    $tbMain.children('tr').addClass('notChosed').show();
            //    $tbMain.children('tr:contains(' + $formControl.val() + ')').removeClass('notChosed');
            //    $tbMain.children('.notChosed').hide();
            //
            //});
            $scope.navCodeFir = true;
            $scope.navCodeSec = false;
            $scope.navClickFir = function(){
                $scope.navCodeFir = true;
                $scope.navCodeSec = false;
                //重新获取一次数据
                $scope.sendBookList = [];
                $scope.backBookList = [];
                dataShow();
            };
            $scope.navClickSec = function(){
                $scope.navCodeFir = false;
                $scope.navCodeSec = true;
                //重新获取一次数据
                $scope.sendBookList = [];
                $scope.backBookList = [];
                dataShow();
            };

            //获取所有订单数据
            $scope.sendBookList = [];
            $scope.backBookList = [];
            $scope.needToSend = [];
            dataShow();



            function dataShow(){
                    orderManageService.getAllOrderData().then(function(response){
                        if(response.status == 200 && response.data.Code == 100){

                            for(var k = 0 ; k < response.data.Data.length ; k++){

                                if(response.data.Data[k].State == 2 ||response.data.Data[k].State == 1){
                                    //获取配送 列表
                                    $scope.sendBookList.push(response.data.Data[k]);


                                    //分页总数
                                    $scope.pageSizeSec = 8;
                                    $scope.pagesSec = Math.ceil($scope.sendBookList.length / $scope.pageSizeSec); //分页数
                                    $scope.newPagesSec = $scope.pagesSec > 5 ? 5 : $scope.pagesSec;
                                    $scope.pageListSec = [];
                                    $scope.selPageSec = 1;
                                    //设置表格数据源(分页)
                                    $scope.setDataSec = function () {
                                        $scope.itemsSec = $scope.sendBookList.slice(($scope.pageSizeSec * ($scope.selPageSec - 1)), ($scope.selPageSec * $scope.pageSizeSec));//通过当前页数筛选出表格当前显示数据
                                    };
                                    $scope.itemsSec = $scope.sendBookList.slice(0, $scope.pageSizeSec);
                                    //分页要repeat的数组
                                    for (var i = 0; i < $scope.newPagesSec; i++) {
                                        $scope.pageListSec.push(i + 1);
                                    }
                                    //打印当前选中页索引
                                    $scope.selectPageSec = function (page) {
                                        //不能小于1大于最大
                                        if (page < 1 || page > $scope.pagesSec) return;
                                        //最多显示分页数5
                                        if (page > 2) {
                                            //因为只显示5个页数，大于2页开始分页转换
                                            var newpageListSec = [];
                                            for (var i = (page - 3) ; i < ((page + 2) > $scope.pagesSec ? $scope.pagesSec : (page + 2)) ; i++) {
                                                newpageListSec.push(i + 1);
                                            }
                                            $scope.pageListSec = newpageListSec;
                                        }
                                        $scope.selPageSec = page;
                                        $scope.setDataSec();
                                        $scope.isActivePageSec(page);
                                    };
                                    //设置当前选中页样式
                                    $scope.isActivePageSec = function (page) {
                                        return $scope.selPageSec == page;
                                    };
                                    //上一页
                                    $scope.PreviousSec = function () {
                                        $scope.selectPageSec($scope.selPageSec - 1);
                                    };
                                    //下一页
                                    $scope.NextSec = function () {
                                        $scope.selectPageSec($scope.selPageSec + 1);
                                    };
                                }






                                if(response.data.Data[k].State == 4 || response.data.Data[k].State == 3){
                                    //获取归还 列表
                                    $scope.backBookList.push(response.data.Data[k]);

                                    //分页总数
                                    $scope.pageSize = 8;
                                    $scope.pages = Math.ceil($scope.backBookList.length / $scope.pageSize); //分页数
                                    $scope.newPages = $scope.pages > 5 ? 5 : $scope.pages;
                                    $scope.pageList = [];
                                    $scope.selPage = 1;
                                    //设置表格数据源(分页)
                                    $scope.setData = function () {
                                        $scope.itemsBook = $scope.backBookList.slice(($scope.pageSize * ($scope.selPage - 1)), ($scope.selPage * $scope.pageSize));//通过当前页数筛选出表格当前显示数据
                                    };
                                    $scope.itemsBook = $scope.backBookList.slice(0, $scope.pageSize);
                                    //分页要repeat的数组
                                    for (var i = 0; i < $scope.newPages; i++) {
                                        $scope.pageList.push(i + 1);
                                    }
                                    //打印当前选中页索引
                                    $scope.selectPage = function (page) {
                                        //不能小于1大于最大
                                        if (page < 1 || page > $scope.pages) return;
                                        //最多显示分页数5
                                        if (page > 2) {
                                            //因为只显示5个页数，大于2页开始分页转换
                                            var newpageList = [];
                                            for (var i = (page - 3) ; i < ((page + 2) > $scope.pages ? $scope.pages : (page + 2)) ; i++) {
                                                newpageList.push(i + 1);
                                            }
                                            $scope.pageList = newpageList;
                                        }
                                        $scope.selPage = page;
                                        $scope.setData();
                                        $scope.isActivePage(page);
                                    };
                                    //设置当前选中页样式
                                    $scope.isActivePage = function (page) {
                                        return $scope.selPage == page;
                                    };
                                    //上一页
                                    $scope.Previous = function () {
                                        $scope.selectPage($scope.selPage - 1);
                                    };
                                    //下一页
                                    $scope.Next = function () {
                                        $scope.selectPage($scope.selPage + 1);
                                    };
                                }
                            }


                        }
                    });


            };

            //显示状态
            $scope.state = '';
            $scope.orderStateShow = function(state){
                if(state == 1){
                    return $scope.state = '等待配送';
                }
                if(state == 2){
                    return $scope.state = '已经配送';
                }
                if(state == 3){
                    return $scope.state = '尚未归还';
                }
                if(state == 4){
                    return $scope.state = '已经归还';
                }
            };

            //点击配送
            $scope.goToSend = function(id){
                console.log(id);
                orderManageService.sendBookData(id).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        console.log('成功配送');
                        //重新获取一次数据
                        $scope.sendBookList = [];
                        $scope.backBookList = [];
                        dataShow();
                    }
                    else{
                        alert('配送失败!');
                    }
                });
            };

            //点击归还
            $scope.goToBack = function(orderId , bookNumber){
                orderManageService.backBookData(orderId , bookNumber).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        console.log('归还成功!');
                        //重新获取一次数据
                        $scope.sendBookList = [];
                        $scope.backBookList = [];
                        dataShow();
                    }
                    else{
                        alert('归还失败!');
                    }
                });
            };


            //点击详情
            $scope.goToDetail = function(item){
                //存取数据
                sessionService.sessionSetData('thisOrderData' , item);
                //获取数据
                $scope.thisOrderData = sessionService.sessionGetData('thisOrderData');
            };
            //点击模态框 确定
            $scope.removeSession = function(){
                //清除数据
                sessionService.sessionRemoveData('thisOrderData');
            }






        })
        /****************sortDetail*************************/
        .controller('sortDetailController' , function($scope , $window ,$stateParams , sortDetailService){

            $scope.currentSortData = [];
            $scope.pageCode = false;
            $scope.pageCodeAct = 1;//默认第一页被选中
            $scope.otherPageCode = 0;
            $scope.booksData = [];
            sortDetailService.getThisSortDetailData($stateParams.id).then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    $scope.booksData = response.data.Data.Books;
                    if(response.data.Data.Books.length <= 3){
                        $scope.currentSortData = response.data.Data;
                        $scope.pageCode = true;//隐藏分页
                        $scope.otherPageCode = 2;//隐藏其他分页（2 3）

                    }
                    if(response.data.Data.Books.length >= 3 && response.data.Data.Books.length <= 6){
                        $scope.otherPageCode = 3;//隐藏其他分页（3）
                        $scope.currentSortData = response.data.Data;
                        $scope.booksNum = response.data.Data.Books.length;
                        $scope.currentSortData.Books = response.data.Data.Books.slice(0 , 3);
                        $scope.clickPageCodeFir = function(){
                            $scope.currentSortData.Books = $scope.booksData.slice(0 , 3);
                            $scope.pageCodeAct = 1;  //第一页被选中



                        };
                        $scope.clickPageCodeSec = function(){
                            $scope.currentSortData.Books = $scope.booksData.slice(3 , $scope.booksData.length);
                            $scope.pageCodeAct = 2; //第二页被选中

                        }
                    }
                    if(response.data.Data.Books.length >= 6 ){
                        $scope.currentSortData = response.data.Data;
                        $scope.booksNum = response.data.Data.Books.length;
                        $scope.currentSortData.Books = response.data.Data.Books.slice(0 , 3);

                        $scope.clickPageCodeFir = function(){
                            $scope.currentSortData.Books =  $scope.booksData.slice(0 , 3);
                            $scope.pageCodeAct = 1; //第一页被选中
                            //console.log($scope.currentSortData.Books);


                        };
                        $scope.clickPageCodeSec = function(){
                            $scope.currentSortData.Books =  $scope.booksData.slice(3 , 6);
                            $scope.pageCodeAct = 2; //第二页被选中


                        };
                        $scope.clickPageCodeTir = function(){
                            $scope.currentSortData.Books = $scope.booksData.slice(6 , $scope.booksData.length);
                            $scope.pageCodeAct = 3; //第二页被选中


                        }
                    }

                }
            });

            //点击返回上一页面
            $scope.returnBack = function(){
                $window.history.back();
            };

        })
        /*****************changeSort***********************/
        .controller('changeSortController' , function($scope , changeSortService  ,$window , $stateParams){
            //获取数据
            //获取该类数据
            $scope.currentSortData = [];
            $scope.pageCode = false;
            $scope.pageCodeAct = 1;//默认第一页被选中
            $scope.otherPageCode = 0;
            $scope.booksData = [];
            changeSortService.getThisSortDetailData($stateParams.id).then(function(response){
                if(response.status == 200 && response.data.Code == 100){
                    //console.log(response.data.Data);
                    $scope.currentSortData = response.data.Data;
                    //console.log($scope.currentSortData);
                    $scope.changeSortData = {
                        id :$scope.currentSortData.Id,
                        name:$scope.currentSortData.Name,
                        priority:$scope.currentSortData.Priority
                    };
                    if(response.status == 200 && response.data.Code == 100){
                        $scope.booksData = response.data.Data.Books;
                        if(response.data.Data.Books.length <= 3){
                            $scope.currentSortData = response.data.Data;
                            $scope.pageCode = true;
                            $scope.otherPageCode = 2;

                        }
                        if(response.data.Data.Books.length >= 3 && response.data.Data.Books.length <= 6){
                            $scope.otherPageCode = 3;
                            $scope.currentSortData = response.data.Data;
                            $scope.booksNum = response.data.Data.Books.length;
                            $scope.currentSortData.Books = response.data.Data.Books.slice(0 , 3);
                            $scope.clickPageCodeFir = function(){
                                $scope.currentSortData.Books = $scope.booksData.slice(0 , 3);
                                $scope.pageCodeAct = 1;


                            };
                            $scope.clickPageCodeSec = function(){
                                $scope.currentSortData.Books = $scope.booksData.slice(3 , $scope.booksData.length);
                                $scope.pageCodeAct = 2;

                            }
                        }
                        if(response.data.Data.Books.length >= 6 ){
                            $scope.currentSortData = response.data.Data;
                            $scope.booksNum = response.data.Data.Books.length;
                            $scope.currentSortData.Books = response.data.Data.Books.slice(0 , 3);

                            $scope.clickPageCodeFir = function(){
                                $scope.currentSortData.Books =  $scope.booksData.slice(0 , 3);
                                $scope.pageCodeAct = 1;
                                console.log($scope.currentSortData.Books);


                            };
                            $scope.clickPageCodeSec = function(){
                                $scope.currentSortData.Books =  $scope.booksData.slice(3 , 6);
                                $scope.pageCodeAct = 2;


                            };
                            $scope.clickPageCodeTir = function(){
                                $scope.currentSortData.Books = $scope.booksData.slice(6 , $scope.booksData.length);
                                $scope.pageCodeAct = 3;


                            }
                        }

                    }



                }
            });



            //返回上一级
            $scope.returnBack = function(){
                $window.history.back();
            };


            //修改数据
            $scope.saveSortChange = function(){
                changeSortService.saveSortChangeData($scope.changeSortData.id , $scope.changeSortData.name , $scope.changeSortData.priority).then(function(response){
                    if(response.status == 200 && response.data.Code == 100){
                        console.log('success');
                        $window.history.back();
                    }
                    else{
                        console.log('fail');
                    }
                });
            }



        });



})();