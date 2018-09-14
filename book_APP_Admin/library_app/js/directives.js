/**
 * Created by Administrator on 2018/1/15.
 */
(function(){
    /**********app模块=>自定义指令*****************/
    angular.module('app.directive' , [])
        /*框架模块*/
        .directive('pageBody' , function(){
            return {
                restrict:'EA',
                replace:true,
                templateUrl: 'templates/pageBody.html',
                scope: {
                    navCurrentIndex: '@'
                }
            }
        });

})();