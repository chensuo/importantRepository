/**
 * Created by Administrator on 2018/1/15.
 */
(function(){
    /**********appģ��=>�Զ���ָ��*****************/
    angular.module('app.directive' , [])
        /*���ģ��*/
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