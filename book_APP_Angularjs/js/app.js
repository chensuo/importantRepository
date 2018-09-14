/**
 * Created by Administrator on 2018/1/8.
 */
/*
*
*   主模板=>app
* */
    (function(){
        angular.module('app' , ['ngRoute','app.directive' , 'app.controller'])
            .config(function($routeProvider , $locationProvider){
                $locationProvider.hashPrefix('');
                $routeProvider
                    /*home*/
                    .when('/home' ,{
                        templateUrl:'view/home.html',
                        controller:'homeController'
                    })
                    /*sort*/
                    .when('/sort' ,{
                        templateUrl:'view/sort.html',
                        controller:'sortController'
                    })
                    /*find*/
                    .when('/find' ,{
                        templateUrl:'view/find.html',
                        //controller:'findController'
                    })
                    /*mine*/
                    .when('/mine' ,{
                        templateUrl:'view/mine.html',
                        controller:'mineController'
                    })
                    /*login*/
                    .when('/login' ,{
                        templateUrl:'view/login.html',
                        controller:'loginController'
                    })
                    /*newbooks*/
                    .when('/newbooks' ,{
                        templateUrl:'view/newbooks.html',
                        controller:'newbooksController'
                    })
                    /*bookdetail*/
                    .when('/bookdetail/:Id' , {
                        templateUrl:'view/bookdetail.html',
                        controller:'bookdetailController'
                    })
                    /*search*/
                    .when('/search' , {
                        templateUrl:'view/search.html',
                        controller:'searchController'
                    })
                    /*list*/
                    .when('/list' , {
                        templateUrl:'view/list.html',
                        controller:'listController'
                    })
                    /*restPassword*/
                    .when('/reset' , {
                        templateUrl:'view/resetPassword.html',
                        controller:'resetController'
                    })
                    /*startReset*/
                    .when('/startReset/:id' , {
                        templateUrl:'view/startReset.html',
                        controller:'startResetController'
                    })
                    /*personal*/
                    .when('/personal' , {
                        templateUrl:'view/personal.html',
                        controller:'personalController'
                    })
                    /*myBookRoom*/
                    .when('/myBookRoom' , {
                        templateUrl:'view/myBookRoom.html',
                        controller:'myBookRoomController'
                    })
                    /*borrowHistory*/
                    .when('/borrowHistory' , {
                        templateUrl:'view/borrowHistory.html',
                        controller:'borrowHistoryController'
                    })
                    /*myAddress*/
                    .when('/myAddress' , {
                        templateUrl:'view/myAddress.html',
                        //controller:myAddressController'
                    })
                    /*otherwise*/
                    .otherwise({redirectTo:'/home'})

            });


    })();

