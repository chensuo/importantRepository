/**
 * Created by Administrator on 2018/1/15.
 */
(function(){
    /************app模块=>自定义服务********************/
    angular.module('app.service' , [])
        .constant('ROOT_URL' , 'http://101.200.58.3/librarywebapi/')

        /*栏目信息管理*/
        .service('sortService' , function($http , ROOT_URL){
            //获取首页栏目信息
            this.getSortData = function(){
                return $http.get(ROOT_URL + 'section/list');
            };
            //添加新栏目
            this.addNewSortData = function(name , priority){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'section/create',
                    params: {name: name , priority:priority}
                });
            };
            //删除该栏目
            this.removeThisSortData = function(id){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'section/delete',
                    params:{id:id}
                });
            }
        })
        /*sessionStroage 存取信息*/
        .service('sessionService' , function($http , $window){
            //sessionStorage存数据
            this.sessionSetData = function(key , value){
                return $window.sessionStorage.setItem(key  , JSON.stringify(value));
            };
            //sessionStorage取数据
            this.sessionGetData = function(key){
                return JSON.parse($window.sessionStorage.getItem(key));
            };
            //sessionStorage清除数据
            this.sessionRemoveData = function(key){
                return $window.sessionStorage.removeItem(key);
            }
        })
        /*changeSort*/
        .service('changeSortService' ,function($http , ROOT_URL){
            //保存修改
            this.saveSortChangeData = function(id , name , priority ){
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'section/update',
                    params: {id: id, name: name, priority: priority}
                });

            };
            //获取该栏目详情
            this.getThisSortDetailData = function(id){
                return $http.get(ROOT_URL + 'section/single?id=' + id);
            };
        })
        /*sortDetail*/
        .service('sortDetailService' ,function($http , ROOT_URL){
            //获取该栏目详情
            this.getThisSortDetailData = function(id){
                return $http.get(ROOT_URL + 'section/single?id=' + id);
            };
        })
        /*bookCategory*/
        .service('bookCategoryService' , function($http , ROOT_URL){
            //获取图书分类
            this.getBookCatagoryData = function(){
                return $http.get(ROOT_URL + 'category/list');
            };
            //添加新分类
            this.addNewBookCategoryData = function(form) {
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'category/create',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }
                });
            };
            //获取该类信息
            this.getThisBookCategoryData = function(id){
                return $http.get(ROOT_URL + 'category/single?id=' + id);
            };
            //修改该类数据
            this.startChangeThisCategory = function(form){
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'category/update',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }
                });
            }
        })
        /*图书信息管理*/
        .service('bookDataService' , function($http , ROOT_URL){
            //图书信息查询
            this.getBookData = function(form){
                return $http.get(ROOT_URL + 'book/list' , {params:{categoryId:form.categoryId , publisherId:form.publisherId , keyword:form.keyword}});
            };
            //获取下拉列表 出版社信息
            this.getSelectPublisherData = function(){
                return $http.get(ROOT_URL + 'publisher/list');
            };

            //特定图书查询
            this.getThisBookData = function(id){
                return $http.get(ROOT_URL + 'book/single?id=' + id);
            };

            //根据栏目查询图书信息
            this.getBookDataBySort = function(sectionId){
                return $http.get(ROOT_URL + 'book/GetBooksBySection?sectionId=' + sectionId) ;
            };

            //添加图书基本信息
            this.addBookData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/create',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }

                });
            };

            //更新图书基本信息
            this.changeBookData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/update',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }

                });
            };

            //添加新图书
            this.addNewBookData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/create',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }

                });
            };

            //图书入库
            this.bookPortData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/putaway',
                    params: {bookId:form.bookId , count:form.count , libraryId:form.libraryId}
                });
            }

        })
        /*bookDataDetail(图书信息管理 => 详情页面)*/
        .service('bookDataDetailService' , function($http , ROOT_URL){
            //获取该图书详情
            this.getThisBookDataDetail = function(id){
                return $http.get(ROOT_URL + 'book/single?id=' + id);
            };
            //获取所有作者
            this.getAllAuthor = function(){
                return $http.get(ROOT_URL + 'author/list');
            };
            //获取所有出版社
            this.getAllPublisher = function(){
                return $http.get(ROOT_URL + 'publisher/list');
            };

        })
        /*订单信息管理*/
        .service('orderManageService' , function($http , ROOT_URL){
            //获取所有订单
            this.getAllOrderData = function(){
                return $http.get(ROOT_URL + 'Transaction/GetAllBorrowRecords');
            };

            //配送
            this.sendBookData = function(orderId){
                return $http.get(ROOT_URL + 'Transaction/Distribution?orderId=' + orderId);
            };

            //归还
            this.backBookData = function(orderId , bookNumber){
                return $http.get(ROOT_URL + 'Transaction/ReturnBook' , {params:{orderId:orderId , bookNumber:bookNumber}});
            }
        });

})();