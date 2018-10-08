$(function(){
    ///*下拉刷新*/
    //var pages = 1;
    //var sizes = 4;
    //var loading = false;  //状态标记
    //
    //$("#listwrap").pullToRefresh().on("pull-to-refresh", function () {
    //    setTimeout(function () {
    //        pages = 1;
    //        $("#Tolist").html("");
    //        loadlist();
    //        if (loading) loading = false;
    //        $("#listwrap").pullToRefreshDone(); // 重置下拉刷新
    //    }, 1500);   //模拟延迟
    //});
    //
    ////function loadlist(){
    ////    //加载数据
    ////}

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