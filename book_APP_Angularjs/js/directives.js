/**
 * Created by Administrator on 2018/1/8.
 */
/*
*
*   app模块 自定义指令
* */
(function(){
    angular.module('app.directive' , [])
        /*导航*/
        .directive('pageNav' , function(){
            return{
                restrict:'EA',
                replace:true,
                templateUrl: 'template/pageNav.html',
                scope:{
                    navCurrentIndex:'@'
                }
            }

        });


})();