/**
 * Created by 陈锁 on 2017/12/30.
 */
$(function(e){
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));

    /*
     *   点击返回歌曲页面
     * **/
    $('.btn-back-singerPage').bind('click',function(e){
        window.location.href = 'songs.html';
    });

    //获取点击歌曲id标示符
    var search = location.search.substr(1);
    var songsId= search.split('=')[1];
    //console.log('传入选中歌曲id:  '+songsId);
    $.ajax({
        type: 'get',
        url: 'http://101.200.58.3/htmlprojectwebapi/song/single',
        data: {id:songsId, accountId:currentUserData.Id},
        success: function (result) {
            if(result.Code == 100){
                //console.log('ajax中再次确定传入选中歌曲id:  '+songsId);
                //console.log(result.Data);

                var list = result.Data;
                //console.log('ajax中传出id:  '+list.Id);
                $('.songsDetailHeader').attr('src',list.Image);
                $('.detailNameSpan').text(list.Name);
                $('.detailDurationSpan').text(list.Duration);
                $('.detailResourceSpan').text(list.Resource).css('font-size','12px');
                $('.detailPlayNumberSpan').text(list.PlayNumber);
                $('.detailCategoryNameSpan').text(list.CategoryName);
                $('.detailSingerNameSpan').text(list.detailCreateTime);
                $('.detailWord').text(list.Word).css('font-size','12px');
            }

        },
        dataType:'json'
    });


});
