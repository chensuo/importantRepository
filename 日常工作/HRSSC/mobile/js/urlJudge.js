/*根据url判断当前页面tabbar选中情况*/
$(function(){
    var url = window.location.href;
    var urlList = [];
    /*根据接口获取tabbar*/
    var tabbars = [];
    $.get(document.lnkUrl + "api/front/tabs", function(data){
        if(data.code == 200){
            tabbars = data.body;
            tabbars.sort(compare('TAB_SORT'));
            for(var i=0;i<tabbars.length;i++){
                urlList.push(tabbars[i].TAB_URL);
            }
            new Vue({
                el: '#tabs',
                data: {tabbars: tabbars}
            });
            if(url.indexOf("/ssc/contentwd/index.jhtml") >= 0){
                url = "/ssc/contentwd/index.jhtml";
                for(var i=0;i<urlList.length;i++){
                    if(urlList[i].indexOf(url) >=0){
                        $($("#tabs>a")[i]).find(".tabbar-inactive").remove();
                        $($("#tabs>a")[i]).find(".tabbar-active").css("display" , "block");
                    }
                }
            }
            if(url.indexOf("/ssc/contentbk/index.jhtml") >= 0){
                url = "/ssc/contentbk/index.jhtml";
                for(var i=0;i<urlList.length;i++){
                    if(urlList[i].indexOf(url) >=0){
                        $($("#tabs>a")[i]).find(".tabbar-inactive").remove();
                        $($("#tabs>a")[i]).find(".tabbar-active").css("display" , "block");
                    }
                }
            }
        }
    });
    //数组排序方法
    function compare(property){
        return function(a,b){
            var value1 = a[property];
            var value2 = b[property];
            return value1 - value2;
        }
    }

});