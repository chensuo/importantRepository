/**
 * Created by Administrator on 2018/1/8.
 */
/*
*
*   app模块 自定义服务
* */
(function(){
    angular.module('app.service' , [])
        .constant('ROOT_URL' , 'http://101.200.58.3/librarywebapi/')

        /*home页*/
        .service('homeService' , function($http , ROOT_URL){
            //ad
            this.getAdImages = function(){
                return $http.get(ROOT_URL +'advert/list');
            };
            //新书上架 馆长推荐
            this.getNewBooks = function(){
                return $http.get(ROOT_URL + 'section/list');
            }
        })

        /*sort页*/
        .service('sortService' , function($http ,ROOT_URL){
            //加载分类
            this.getSort = function(){
                return $http.get(ROOT_URL + 'category/list');
            };
        })
        /*登录页*/
        .service('loginService' , function($http , ROOT_URL){
            //提交填写账号密码
            this.postPersonData = function(phone , password ){
                //return $http.post(ROOT_URL + 'member/login', {params:{phone:phone , password:password}});
                return $http({
                    method:'post',
                    url:ROOT_URL + 'member/login',
                    params:{phone:phone , password:password}
                });
            }
        })
        /*验证码验证*/
        .service('resetService' , function($http , ROOT_URL){
            //提交手机号码
            this.postPhoneNews = function(phone){
                return $http.get(ROOT_URL + 'member/SendCodeForReset?phone=' +phone);
            };

            //验证 验证码是否正确
            this.confirmPhoneNews = function(phone , code){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'member/VerifyCodeForReset',
                    params:{phone:phone , code:code}
                });
            }

        })
        /*修改密码*/
        .service('startResetService' ,function($http , ROOT_URL){
            //提交修改
            this.postNewPassword = function(id , password){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'member/reset',
                    params:{id:id , password:password}
                });
            }
        })
        /*获取currentUserData(localstroage)服务*/
        .service('getDataService' , function($http , $window){
            //获取localStroage数据
            this.getUserData = function(key){
                return JSON.parse($window.localStorage.getItem(key));
            };
            //存储localStorage数据
            this.setUSerData = function(key , value){
                return $window.localStorage.setItem(key ,JSON.stringify(value));
            };
            //清除localStorage数据
            this.removeUserData = function(key){
                return $window.localStorage.removeItem(key);
            }
        })
        /*search => list*/
        .service('searchService' , function($http, ROOT_URL){
            //根据输入信息筛选 跳转
            this.getListData = function(param){
                return $http.get(ROOT_URL + 'book/list' , {params:{categoryId:param.categoryId , publisherId:param.publisherId ,keyword: param.keyword}});
            }
        })
        /*我的借书架*/
        .service('myBookRoomService' , function($http , ROOT_URL){
            //获取我的借书架数据
            this.getMyBookRoom = function(readerId){
                return $http.get(ROOT_URL + 'Transaction/GetMyShelf?readerId=' + readerId);
            };

            //移除单本书
            this.delThisBookData = function(readerId , bookId){
                return $http.get(ROOT_URL + 'Transaction/RemoveBookFromShelf' , {params:{readerId:readerId , bookId:bookId}});
            };
            //移除全部
            this.delAllBookData = function(readerId){
                return $http.get(ROOT_URL + 'Transaction/RemoveMyShelf?readerId=' + readerId);
            };
            //提交订单
            this.submitMyOrderData = function(readerId) {
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'Transaction/SubmitOrder',
                    params: {readerId: readerId}
                });
            }


        })
        /*bookdetail*/
        .service('bookdetailService' , function($http , ROOT_URL){
            this.getDetailData = function(bookId){
                console.log(ROOT_URL + 'book/single?id=', + bookId);
                return $http.get(ROOT_URL + 'book/single?id=', + bookId);
            };
            //图书加入借书架
            this.addMyBook = function(readerId , bookId){
                return $http.get(ROOT_URL + 'Transaction/AddBookShelf' , {params:{readerId:readerId , bookId:bookId}});
            }
        })
        /*borrowHistory*/
        .service('borrowHistoryController' , function($http , ROOT_URL){
            this.getMyOrderData = function(readerId){
                return $http.get(ROOT_URL + 'Transaction/GetBorrowRecords?readerId=' + readerId);
            };

            //取消借阅
            this.cancelOrderWay = function(orderId, readerId){
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'Transaction/CancelOrder',
                    params: {orderId: orderId , readerId:readerId}
                });
            };
            //确认借阅
            this.confirmOrderWay = function(orderId, readerId){
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'Transaction/ConfirmOrder',
                    params: {orderId: orderId , readerId:readerId}
                });
            }

        });
})();