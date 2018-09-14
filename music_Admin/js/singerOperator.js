/**
 * Created by Administrator on 2017/12/29.
 */
$(function(e){
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var currentSingerData = JSON.parse(sessionStorage.getItem('currentSingerData'));
    //console.log(currentSingerData);
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





    //先加载下拉列表 分类
    loadRegionData();

    /*
     *   加载下拉列表 分类
     * */
    function loadRegionData(){
        //加载歌手类别
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
                    /*
                     *   加载该歌手数据
                     * */
                    loadSingerData();



                }
            },
            dataType:'json'
        });
    }


    /*
    *   点击确定更新信息
    * */
    $('.btn-success').bind('click',function(e){
        //console.log($('[name=sex]:checked').val());
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
        $.ajax({
            type:'post',
            url:'http://101.200.58.3/htmlprojectwebapi/singer/update',
            data:formData,
            contentType:false,
            processData:false,
            success:function(result){
                if(result.Code == 100){
                    alert('修改成功!');
                    window.location.href = 'singer.html';
                    //console.log(result.Data);
                }
                else{
                    alert('修改失败!');
                }
            },
            dataType:'json'
        });

    });


    /*******************************************************/
    /*
    *   加载歌手数据方法
     *  */
    function loadSingerData(){
        $singerId.val(currentSingerData.Id);
        $singerName.val(currentSingerData.Name);
        $singerBirthday.val(currentSingerData.Birthday);
        $singerRegionId.val(currentSingerData.RegionId);
        $singerHeight.val(currentSingerData.Height);
        $singerRemark.val(currentSingerData.Remark);
        $operatorHeader.attr('src',currentSingerData.Header);
        //辨别男女
        //$singerSex.val(currentSingerData.Sex);
        if(currentSingerData.Sex == '男'){
            $('.man').prop('checked',true);
            $('.women').prop('checked',false);
        }
        else{
            $('.man').prop('checked',false);
            $('.women').prop('checked',true);
        }
        //辨别星座
        $singerStar.val(currentSingerData.Star);





    }







});