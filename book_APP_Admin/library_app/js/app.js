/**
 * Created by Administrator on 2018/1/15.
 */
(function(){
    /*************主模块app************************/
    /***********ui路由********************/
    angular.module('app' , ['ui.router' , 'app.directive' ,'app.controller'])
        .config(function($stateProvider , $urlRouterProvider){
            $urlRouterProvider.otherwise('/otherwise');
            $stateProvider
                /*add*/
                .state('add' , {
                    url: '/add',
                    templateUrl: 'views/add.html',
                    controller:'addController'
                })
                /*sort*/
                .state('sort' , {
                    url:'/sort',
                    templateUrl: 'views/sort.html',
                    controller:'sortController'
                })
                /*bookCategory*/
                .state('bookCategory' , {
                    url: '/bookCategory',
                    templateUrl: 'views/bookCategory.html',
                    controller: 'bookCategoryController'
                })
                /*bookData*/
                .state('bookData' , {
                    url: '/bookData',
                    templateUrl: 'views/bookData.html',
                    controller:'bookDataController'
                })
                /*orderManage*/
                .state('orderManage' ,{
                    url: '/orderManage',
                    templateUrl:'views/orderManage.html',
                    controller:'orderManageController'
                })
                /*sortDetail*/
                .state('sortDetail' , {
                    url: '/sortDetail/:id',
                    templateUrl:'views/sortDetail.html',
                    controller:'sortDetailController'
                })
                /*changeSort*/
                .state('changeSort' , {
                    url:'/changeSort/:id',
                    templateUrl:'views/changeSort.html',
                    controller:'changeSortController'
                })
                /*changeBookCategory*/
                .state('changeBookCategory' , {
                    url:'/changeBookCategory',
                    templateUrl:'views/changeBookCategory.html',
                    controller:'changeBookCategoryController'
                })
                /*bookDataDetail*/
                .state('bookDataDetail' , {
                    url:'/bookDataDetail/:id' ,
                    templateUrl: 'views/bookDataDetail.html',
                    controller:'bookDataDetailController'
                })
                /*bookDataChange*/
                .state('bookDataChange' , {
                    url:'/bookDataChange/:id' ,
                    templateUrl: 'views/bookDataChange.html',
                    controller:'bookDataChangeController'
                })
                /*bookDataAdd*/
                .state('bookDataAdd' , {
                    url:'/bookDataAdd' ,
                    templateUrl: 'views/bookDataAdd.html',
                    controller:'bookDataAddController'
                })
                /*默认跳转*/
                .state('otherwise' , {
                    url:'/otherwise',
                    templateUrl: 'views/add.html',
                    controller:'addController'
                });



        });


})();