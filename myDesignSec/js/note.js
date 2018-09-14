$(function(e){
	var count = 1;
    var countNew = -1;
    var $tbMain = $('.tbMain');
    var news = [];
    var pagination = {
        pageSize:15,
        pageIndex:1,
        totalPage:0
    };
    var $divPageFooter = $('.divPageFooter');
    var $formControl = $('.keyWord-input');
    var $selectSection = $('.select-section');
    var $selectState = $('.select-sectionSec');
    var timer1;
    var timer2;

    //加载新闻数据
	loadNotesData();






	/*
    *加载原有新闻数据
    * */
    function loadNotesData(){
        $sectionId =  $('.select-section>option:selected').val();
    	$state =  $('.select-sectionSec>option:selected').val();
        $.ajax({
            type:'get',
            url:'ajax/getNotes.php?sectionId=' + $sectionId + '&state=' + $state,
            data:{sectionId:$sectionId , state: $state},
            success: function(result){
                if(result.code == 100){
                    notes = result.Data;
                    fillData(notes);
                }
                else{
                    notes = '';
                    fillData(notes);
                }
            },
            dataType:'json'

        });
    }

    $('select').bind('change' , function(){
        loadNotesData();
    });


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
    function fillData(news){
        //生成新闻数据
        fillSingerData(news);

        //生成页码
        fillPageNum(news);
    }

    /*
    *   生成页码
    * */
    function fillPageNum(news){
        $divPageFooter.html('');

        //计算生成的总页码
        pagination.totalPage = parseInt(Math.ceil(news.length / pagination.pageSize));


        //生成页码
        for(var i = 0 ; i < pagination.totalPage ; i++){
            var $pageCodeItem = $('<a href="#" ></a>');
            $pageCodeItem.text(i+1);
            $divPageFooter.append($pageCodeItem);

            $pageCodeItem.bind('click',function(e){
                //修改当前页码
                pagination.pageIndex = $(this).text();
                fillSingerData(news);
                //修改当前样式
                //console.log($pageCodeItem);
                $divPageFooter.find('a').removeClass('active');
                $(this).addClass('active');



                return false;


            });

        }
        if(pagination.totalPage > 1){
            $divPageFooter.find('a').first().addClass('active');
        }
        else{
        	$divPageFooter.find('a').addClass('active');
        }
    }

    /*
    *   加载分页新闻信息
    * */
    function fillSingerData(news){
        $tbMain.html('');
        var temp = news.slice((pagination.pageIndex - 1) * pagination.pageSize , pagination.pageIndex * pagination.pageSize);
        var countNum = pagination.pageIndex*15-15;
        for(var  i = 0 ;i < temp.length; i++){
            countNum++;
            var item = createNotesRow(temp[i],countNum);
            $tbMain.append(item);
        }
    }

     /*
    * 创建歌手项
    * */
    function createNotesRow(dataItem,num){
        count++;
        var $tr = $('<tr></tr>');

        var $tdId = $('<td></td>').text(num).appendTo($tr);
        var $tdTitle = $('<td></td>').appendTo($tr);
        var $title = $('<a href=""></a>').text(dataItem.Title + ' ').css('color' , '#333').attr('href' , 'notesDetail.php?Id=' + dataItem.Id).appendTo($tdTitle);
        if(dataItem.Image || dataItem.Content.indexOf("<img src=") != -1){
            var $img = $('<img src="" />').attr('src' , 'image/hasImage.gif').appendTo($title);
        }

        var $tdUser = $('<td></td>').appendTo($tr);
        var $userName = $('<span></span>').text(dataItem.Name).appendTo($tdUser);



        var $tdTime = $('<td></td>').appendTo($tr);
        var $time = $('<span></span>').text(dataItem.Time).appendTo($tdTime);
        var $tdSection = $('<td></td>').appendTo($tr);
        var $section = $('<span></span>').text(dataItem.SectionName).appendTo($tdSection);
        var $tdState = $('<td></td>').text(dataItem.State).appendTo($tr);
       
        var $tdDo= $('<td></td>').appendTo($tr);
        var $lnkDetail = $('<button class="btn btn-primary">详情</button>').appendTo($tdDo);

        if(dataItem.State == '驳回请求'){
            $tdState.css('color' , '#E10601');
        }
        if(dataItem.State == '等待审核'){
            $tdState.css('color' , '#286090');
            var $lnkOp = $('<button class="btn btn-success" data-toggle="modal" data-target="#delModal">通过</button>').appendTo($tdDo);
                 //点击审核通过
            $lnkOp.bind('click',function(e){
                $.ajax({
                    type:'post',
                    url:'ajax/permitNotes.php',
                    data:{noteId: dataItem.Id},
                    success:function(response){
                        if(response.code == 100){
                            loadNotesData();
                            $('.right-info-del').css('display' , 'block');
                            $('.error-info-del').css('display' , 'none');
                            window.clearInterval(timer1);
                            timer1 = setInterval(function(){
                                $('#delModal').modal('hide');
                            },1000);

                        }
                        else{
                            $('.right-info-del').css('display' , 'none');
                            $('.error-info-del').css('display' , 'block');
                            window.clearInterval(timer2);
                            timer2 = setInterval(function(){
                                $('#delModal').modal('hide');
                            },1000);
                        }
                    }
                });
            });

            /**/
            var $lnkFailed = $('<button class="btn btn-warning" data-toggle="modal" data-target="#delModal">驳回</button>').appendTo($tdDo);
                 //点击审核驳回
            $lnkFailed.bind('click',function(e){
                $.ajax({
                    type:'post',
                    url:'ajax/unPermitNotes.php',
                    data:{noteId: dataItem.Id},
                    success:function(response){
                        if(response.code == 100){
                            loadNotesData();
                            $('.right-info-del').css('display' , 'block');
                            $('.error-info-del').css('display' , 'none');
                            window.clearInterval(timer1);
                            timer1 = setInterval(function(){
                                $('#delModal').modal('hide');
                            },1000);

                        }
                        else{
                            $('.right-info-del').css('display' , 'none');
                            $('.error-info-del').css('display' , 'block');
                            window.clearInterval(timer2);
                            timer2 = setInterval(function(){
                                $('#delModal').modal('hide');
                            },1000);
                        }
                    }
                });
            });

        }
        if(dataItem.State == '审核通过'){
            $tdState.css('color' , '#36C601');
        }

        //点击详情
        $lnkDetail.bind('click' , function(e){
        	window.location.href="notesDetail.php?Id=" + dataItem.Id;
        });


       

        countNew = count;

        return $tr;

    }
});