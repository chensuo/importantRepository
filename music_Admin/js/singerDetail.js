/**
 * Created by Administrator on 2017/12/28.
 */
$(function(e){
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));

    /*
    *   点击返回歌手页面
    * **/
    $('.btn-back-singerPage').bind('click',function(e){
        window.location.href = 'singer.html';
    });

    var search = location.search.substr(1);

    var singerId = search.split('=')[1];
    //console.log(singerId);

    $.ajax({
        type: 'get',
        url: 'http://101.200.58.3/htmlprojectwebapi/singer/single',
        data: {id: singerId, accountId: currentUserData.Id},
        success: function (result) {
            //console.log(singerId);
            if(result.Code == 100){
                var list = result.Data;
                //console.log(list.Id);
                $('.singerDetailHeader').attr('src',list.Header);
                $('.detailNameSpan').text(list.Name);
                $('.detailSexSpan').text(list.Sex);
                $('.detailBirthdaySpan').text(list.Birthday);
                $('.detailHeightSpan').text(list.Height);
                $('.detailStartSpan').text(list.Star);
                $('.detailRegionSpan').text(list.RegionName);
                $('.detailInfoSpan').text(list.Remark).css('font-size','12px');
            }

        },
        dataType:'json'
    });


});