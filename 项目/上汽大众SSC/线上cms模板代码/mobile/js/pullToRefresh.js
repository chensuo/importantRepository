$(function(){
    /*下拉刷新*/
    $('.weui-tab').pullToRefresh(function () {
        // 下拉刷新触发时执行的操作放这里。
        //结束刷新
        //do something
        setTimeout(function() {
            $('.weui-tab').pullToRefreshDone();
        }, 1500);
    });
});