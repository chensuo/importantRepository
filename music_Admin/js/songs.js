/**
 * Created by 陈锁 on 2017/12/30.
 */



$(function(e){
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var count = 1;
    var countNew = -1;
    var $tbMain = $('.tbMain');
    var songs = [];
    var pagination = {
        pageSize:15,
        pageIndex:1,
        totalPage:0
    };
    var $divPageFooter = $('.divPageFooter');
    var $formControl = $('.form-control');



    //加载原有歌曲数据
    loadSongsData();

    //先加载添加页面 类别
    loadRegionData();

    //先加载添加页面 歌手
    loadSingerData();


    /*
     * 点击添加新歌曲 按钮 跳转填写页面
     * */
    $('.btn-add-singer').bind('click',function(e){
        window.location.href = 'addSongs.html';
    });


    /*
     *加载原有歌曲数据
     * */
    function loadSongsData(){
        $.ajax({
            type:'get',
            url:'http://101.200.58.3/htmlprojectwebapi/song/list?accountId='+currentUserData.Id,
            success: function(result){
                if(result.Code == 100){
                    songs = result.Data;
                    fillData(songs);
                }
            },
            dataType:'json'

        });
    }

    /*
     *   查询 //只查询前面15个
     * */
    $('#btnSearch').bind('click',function(e){
        if($formControl.val() == ''){
            $divPageFooter.children('a').show();
            $tbMain.children('tr:hidden').show();
            return;
        }
        $tbMain.children('tr').addClass('notChosed').show();
        $tbMain.children('tr:contains(' + $formControl.val() + ')').removeClass('notChosed').addClass('chosed');
        $tbMain.children('.notChosed').hide();
        $divPageFooter.children('a').hide();

    });




    /*******************************************/

    /*
     *   策划分页并显示数据
     * */
    function fillData(songs){
        //生成歌手数据
        fillSingerData(songs);

        //生成页码
        fillPageNum(songs);
    }

    /*
     *   生成页码
     * */
    function fillPageNum(songs){
        $divPageFooter.html('');

        //计算生成的总页码
        pagination.totalPage = parseInt(Math.ceil(songs.length / pagination.pageSize));


        //生成页码
        for(var i = 0 ; i < pagination.totalPage ; i++){
            var $pageCodeItem = $('<a href="#" ></a>');
            $pageCodeItem.text(i+1);
            $divPageFooter.append($pageCodeItem);

            $pageCodeItem.bind('click',function(e){
                //修改当前页码
                pagination.pageIndex = $(this).text();
                fillSingerData(songs);
                //修改当前样式
                //console.log($pageCodeItem);
                $divPageFooter.find('a').removeClass('active').css('color','#888');
                $(this).addClass('active').css('color','#fff');



                return false;


            });

        }
        if(pagination.totalPage > 1){
            $divPageFooter.find('a').first().addClass('active').css('color','#fff');
        }
    }

    /*
     *   加载分页歌手信息
     * */
    function fillSingerData(songs){
        $tbMain.html('');
        var temp = songs.slice((pagination.pageIndex - 1) * pagination.pageSize , pagination.pageIndex * pagination.pageSize);
        var countNum = pagination.pageIndex*15-15;
        for(var  i = 0 ;i < temp.length; i++){
            countNum++;
            var item = createSongRow(temp[i],countNum);
            $tbMain.append(item);
        }
    }
    /*
     *   加载下拉列表 歌手
     * **/
    function loadSingerData(){
        $.ajax({
            type:'get',
            url:'http://101.200.58.3/htmlprojectwebapi/singer/list?accountId='+currentUserData.Id,
            success: function(result){
                if(result.Code == 100){
                    var list = result.Data;
                    for(var i = 0; i < list.length; i++ ){
                       var $option = $('<option></option>');
                        $option.val(list[i].Id).text(list[i].Name).appendTo($('#songsSingerId'));
                    }
                }
            },
            dataType:'json'

        });
    }


    /*
     *   加载下拉列表 分类
     * */

    //加载歌手类别
    function loadRegionData(){
        $.ajax({
            type:'get',
            url:'http://101.200.58.3/htmlprojectwebapi/SongCategory/list?accountId='+currentUserData.Id,
            success:function(result){
                if(result.Code == 100){
                    var list = result.Data;
                    for(var i = 0; i < list.length; i++){
                        var $option = $('<option></option>');
                        $option.val(list[i].Id).text(list[i].Name).appendTo($('#songsCategoryId'));
                    }
                }
            },
            dataType:'json'
        });

    }

    /*
     * 创建歌曲项
     * */
    function createSongRow(dataItem,num){
        count++;
        var $tr = $('<tr></tr>');

        var $tdId = $('<td></td>').text(num).appendTo($tr);
        var $tdCover = $('<td></td>').appendTo($tr);
        $('<img class="songCover" />').attr('src',dataItem.Image).appendTo($tdCover);
        var $tdName = $('<td></td>').text(dataItem.Name).appendTo($tr);
        var $tdSingerName = $('<td></td>').text(dataItem.SinerName).appendTo($tr);
        var $tdCategoryName = $('<td></td>').text(dataItem.CategoryName).appendTo($tr);
        var $tdDuration = $('<td></td>').text(dataItem.Duration).appendTo($tr);
        var $tdPlayNumber = $('<td></td>').text(dataItem.PlayNumber).appendTo($tr);
        var $tdDo= $('<td class="operatorTd"></td>').appendTo($tr);
        var $lnkDetail = $('<i  class="glyphicon glyphicon-list-alt lnkDetail" title="查看详情"></i>');
        $tdDo.append($lnkDetail);
        var $lnkOperator = $('<i class="glyphicon glyphicon-remove-sign lnkOperator" title="删除该歌曲"></i>');
        $tdDo.append($lnkOperator);

        //点击查看详情
        $lnkDetail.bind('click',function(e){
            window.location.href = 'songsDetail.html?songsId=' + dataItem.Id;
        });


        //点击删除
        $lnkOperator.bind('click',function(e){
            //sessionStorage.setItem('currentSongsData',JSON.stringify(dataItem));

            $.ajax({
                type:'get',
                url:'http://101.200.58.3/htmlprojectwebapi/song/delete',
                data:{id:dataItem.Id,accountId:currentUserData.Id},
                success:function(result){
                    if(result.Code == 100){
                        alert('删除成功！');
                        //重新加载页面
                        $tbMain.html('');
                        //序号要重新排序
                        count = 1;
                        countNew = -1;
                        loadSongsData();
                    }
                    else{
                        alert('删除失败！');
                        //console.log(dataItem.Id);
                        //console.log(currentUserData.Id);
                    }
                }
            });
        });

        countNew = count;

        return $tr;

    }



    /*********************************添加歌曲页面*************************************/

    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var $songsName = $('#songsName');
    var $songsDuration = $('#songsDuration');
    var $songsCategoryId = $('#songsCategoryId');
    var $songsSingerId = $('#songsSingerId');
    var $songsWord = $('.songsWord');
    var $songsCover = $('#singerHeader');
    var $songsResource = $('#songsResource');
    var $operatorHeader = $('.operatorHeader');

    /*
     *   点击返回歌曲页面
     * **/
    $('.btn-back-singerPage').bind('click',function(e){
        sessionStorage.removeItem('currentSingerData');
        window.location.href = 'songs.html';
    });

    /*
     *   点击确定 添加 添加新歌曲数据
     * */
    $('.btn-save-singer').bind('click',function(e){
        var formData = new FormData();
        formData.append('name',$songsName.val());
        formData.append('duration',$songsDuration.val());
        formData.append('categoryId',$songsCategoryId.val());
        formData.append('singerId',$songsSingerId.val());
        formData.append('word',$songsWord.val());
        formData.append('cover',$songsCover[0].files[0]);
        formData.append('resource',$songsResource[0].files[0]);
        formData.append('accountId',currentUserData.Id);

        $.ajax({
            type:'post',
            url:'http://101.200.58.3/htmlprojectwebapi/song/create',
            data:formData,
            contentType:false,
            processData:false,
            success:function(result){
                if(result.Code == 100){
                    alert('添加成功!');
                    //console.log(result.Data);
                    var $tr = createSongRow(result.Data,countNew);
                    $tr.appendTo($tbMain);
                    window.location.href = 'songs.html';
                }
                else{
                    alert('添加失败，请注意格式!');
                }
            },
            dataType:'json'
        });



    });
});
