/**
 * Created by Administrator on 2018/1/17.
 */
(function(){
    /*********app模块=> 筛选器*********************/
    angular.module('app.filter' , [])
    /*bookData页面*/
        .filter('bookDataFilter' , function(){
            return function(data , keyWord , bookCategoryId ,bookPublisher){
                var temp = Array.from(data);

                //if(bookCategory == '全部'){
                //    return temp.filter(function(item){
                //        return item.Book.Name.toLowerCase().indexOf(keyWord.toLowerCase()) >= 0;
                //    });
                //}

                if(keyWord.length > 0){
                    temp = temp.filter(function(item){
                        return item.Book.Name.toLowerCase().indexOf(keyWord.toLowerCase()) >= 0;
                    });
                }

                if(!bookCategoryId){
                    return temp.filter(function(item){
                        return item.Book.Name.toLowerCase().indexOf(keyWord.toLowerCase()) >= 0;
                    });
                }

                if(bookCategoryId){
                    return temp.filter(function(item){
                        //return item.Book.Name.toLowerCase().indexOf(keyWord.toLowerCase()) >= 0 &&  item;
                    });
                }

                return temp;

            }
        });



})();