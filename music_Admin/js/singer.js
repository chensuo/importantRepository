/**
 * Created by Administrator on 2017/12/28.
 */


$(function(e){
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var count = 1;
    var countNew = -1;
    var $tbMain = $('.tbMain');
    var singers = [];
    var pagination = {
        pageSize:15,
        pageIndex:1,
        totalPage:0
    };
    var $divPageFooter = $('.divPageFooter');
    var $formControl = $('.form-control');



    //加载原有歌手数据
    loadSingerData();

    //先加载添加页面 类别
    loadRegionData();


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








    /*
     * 点击添加新歌手 按钮 跳转填写页面
    * */
    $('.btn-add-singer').bind('click',function(e){
        window.location.href = 'addSinger.html';
    });




    /*
    *加载原有歌手数据
    * */
    function loadSingerData(){
        $.ajax({
            type:'get',
            url:'http://101.200.58.3/htmlprojectwebapi/singer/list?accountId='+currentUserData.Id,
            success: function(result){
                if(result.Code == 100){
                    singers = result.Data;

                    fillData(singers);
                }
            },
            dataType:'json'

        });
    }


    /*******************************************/
    /*
    *   策划分页并显示数据
    * */
    function fillData(singers){
        //生成歌手数据
        fillSingerData(singers);

        //生成页码
        fillPageNum(singers);
    }

    /*
    *   生成页码
    * */
    function fillPageNum(singers){
        $divPageFooter.html('');

        //计算生成的总页码
        pagination.totalPage = parseInt(Math.ceil(singers.length / pagination.pageSize));


        //生成页码
        for(var i = 0 ; i < pagination.totalPage ; i++){
            var $pageCodeItem = $('<a href="#" ></a>');
            $pageCodeItem.text(i+1);
            $divPageFooter.append($pageCodeItem);

            $pageCodeItem.bind('click',function(e){
                //修改当前页码
                pagination.pageIndex = $(this).text();
                fillSingerData(singers);
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
    function fillSingerData(singers){
        $tbMain.html('');
        var temp = singers.slice((pagination.pageIndex - 1) * pagination.pageSize , pagination.pageIndex * pagination.pageSize);
        var countNum = pagination.pageIndex*15-15;
        for(var  i = 0 ;i < temp.length; i++){
            countNum++;
            var item = createSingerRow(temp[i],countNum);
            $tbMain.append(item);
        }
    }

    /*
     *   加载下拉列表 分类
     * */

    //加载歌手类别
    function loadRegionData(){
        $.ajax({
            type:'get',
            url:'http://101.200.58.3/htmlprojectwebapi/SingerRegion/list?accountId='+currentUserData.Id,
            success:function(result){
                if(result.Code == 100){
                    var list = result.Data;
                    for(var i = 0; i < list.length; i++){
                        var $option = $('<option></option>');
                        $option.val(list[i].Id).text(list[i].Name).appendTo($('#singerRegionId'));
                    }




                }
            },
            dataType:'json'
        });

    }
    /*
    * 创建歌手项
    * */
    function createSingerRow(dataItem,num){
        count++;
        var $tr = $('<tr></tr>');

        var $tdId = $('<td></td>').text(num).appendTo($tr);
        var $tdHeader = $('<td></td>').appendTo($tr);
        $('<img class="singerHeader" />').attr('src',dataItem.Header).appendTo($tdHeader);
        var $tdName = $('<td></td>').text(dataItem.Name).appendTo($tr);
        var $tdSex = $('<td></td>').text(dataItem.Sex).appendTo($tr);
        var $tdBirthday = $('<td></td>').text(dataItem.Birthday).appendTo($tr);
        var $tdHeight = $('<td></td>').text(dataItem.Height).appendTo($tr);
        var $tdStar = $('<td></td>').text(dataItem.Star).appendTo($tr);
        var $tdDo= $('<td class="operatorTd"></td>').appendTo($tr);
        var $lnkDetail = $('<i  class="glyphicon glyphicon-list-alt lnkDetail" title="查看详情"></i>');
        $tdDo.append($lnkDetail);
        var $lnkOperator = $('<i class="glyphicon glyphicon-edit lnkOperator" title="编辑"></i>');
        $tdDo.append($lnkOperator);

        //点击查看详情
        $lnkDetail.bind('click',function(e){
            window.location.href = 'singerDetail.html?singerId=' + dataItem.Id;

        });


        //点击编辑
        $lnkOperator.bind('click',function(e){
            window.location.href = 'singerOperator.html';
            sessionStorage.setItem('currentSingerData',JSON.stringify(dataItem));
        });

        countNew = count;

        return $tr;

    }



    /*********************************添加歌手页面*************************************/

    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var $singerName = $('#singerName');
    var $singerRegionId = $('#singerRegionId');
    var $singerBirthday = $('#singerBirthday');
    var $singerHeight = $('#singerHeight');
    var $singerStar = $('#singerStar');
    var $singerSex = $('.singerSex');
    var $singerRemark = $('.singerRemark');
    var $operatorHeader = $('.operatorHeader');
    var $singerHeader = $('#singerHeader');
    var $singerId = $('#singerId');



    /*
     *   点击返回歌手页面
     * **/
    $('.btn-back-singerPage').bind('click',function(e){
        sessionStorage.removeItem('currentSingerData');
        window.location.href = 'singer.html';
    });




    /*
     *   点击确定 添加 添加数据
     * */
    $('.btn-save-singer').bind('click',function(e){
        var formData = new FormData();
        formData.append('id',$singerId.val());
        formData.append('name',$singerName.val());
        formData.append('sex',$('[name=sex]:checked').val());
        formData.append('birthday',$singerBirthday.val());
        formData.append('height',$singerHeight.val());
        formData.append('star',$singerStar.val());
        formData.append('regionId',$singerRegionId.val());
        formData.append('remark',$singerRemark.val());
        formData.append('accountId',currentUserData.Id);
        formData.append('header',$singerHeader[0].files[0]);

        /*
         *   加载该歌手数据
         * */
        $.ajax({
            type:'post',
            url:'http://101.200.58.3/htmlprojectwebapi/singer/create',
            data:formData,
            contentType:false,
            processData:false,
            success:function(result){
                if(result.Code == 100){
                    alert('添加成功!');
                    //console.log(result.Data);
                    var $tr = createSingerRow(result.Data,countNew);
                    $tr.appendTo($tbMain);
                    window.location.href = 'singer.html';
                }
                else{
                    alert('添加失败，请注意格式!');
                }
            },
            dataType:'json'
        });








    });
});