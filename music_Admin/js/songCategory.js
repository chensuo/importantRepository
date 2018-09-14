/**
 * Created by 陈锁 on 2017/12/30.
 */
$(function(e){
    var $singerCategoryTbMain = $('.singerCategory-tbMain');
    var currentUserData = JSON.parse(sessionStorage.getItem('currentUser'));
    var count = 1;
    var addNewCategoryInput = $('.add-newCategory');
    var countNew = -1;

    //加载原有歌曲别
    loadSongCategory();


    //点击添加歌曲类别
    /*
     * 点击 确定保存
     * */
    $('.btnSaveSingerCategory').bind('click',function(e){
        if(addNewCategoryInput.val() == ''){
            addNewCategoryInput.attr('placeholder','请输入有效的类别名称!');
            return false;
        }
        $.ajax({
            type:'post',
            url:'http://101.200.58.3/htmlprojectwebapi/SongCategory/create',
            data:{name:addNewCategoryInput.val(),accountId:currentUserData.Id},
            success:function(result){
                if(result.Code == 100){
                    //console.log(catagory);
                    var $tr = createSongCategory(result.Data,countNew);
                    $($tr).appendTo($singerCategoryTbMain);
                    addNewCategoryInput.val('');
                    addNewCategoryInput.attr('placeholder','');
                    $('#myModal').modal('hide');
                    console.log('添加成功');
                }
                else{
                    alert('已经有该分类!');
                }
            },
            dataType:'json'

        });


    });

    /*
     * 点击 取消
     * */
    $('.btnCancelSingerCategory').bind('click',function(e){
        addNewCategoryInput.attr('placeholder','');
        addNewCategoryInput.val('');
    });





    /******************************/
    /*
     * 加载原有歌曲类别
     * */
    function loadSongCategory(){
        $.ajax({
            type:'get',
            url:'http://101.200.58.3/htmlprojectwebapi/SongCategory/list?accountId='+currentUserData.Id,
            success:function(result){
                if(result.Code == 100){
                    var list = result.Data;
                    for(var i = list.length - 1 ; i >= 0 ; i--){
                        var $tr = createSongCategory(list[i],count);
                        $singerCategoryTbMain.append($tr);
                    }

                }
            },
            dataType:'json'
        });
    }


    /*
     * 创建歌曲类别项目
     * */
    function createSongCategory(dataItem,num){
        count++;
        var $tr = $('<tr></tr>');
        var $tdId = $('<td></td>').appendTo($tr);
        $tdId.text(num);

        var $tdName = $('<td></td>').appendTo($tr);
        $tdName.text(dataItem.Name);

        var $tdDo = $('<td></td>').appendTo($tr);
        var $btnChange = $('<button></button>').appendTo($tdDo);
        $btnChange.text('修改').addClass('btn btn-warning btnChange');
        //点击行修改 修改！
        $btnChange.bind('click',function(e){
            var categoryName = $tdName.text();
            $tdName.text('');
            var changeInput = $('<input type="text" />').appendTo($tdName);
            changeInput.val(categoryName);
            changeInput.focus();

            //操作栏按钮变为保存和取消
            $btnChange.css('display','none');
            $btnDel.css('display','none');
            var $btnSaveChange = $('<button></button>').appendTo($tdDo);
            $btnSaveChange.text('保存').addClass('btn btn-success btnChange');

            var $btnCancelChange = $('<button></button>').appendTo($tdDo);
            $btnCancelChange.text('取消').addClass('btn btn-default btnDel');

            //编辑该行 保存效果 （更新）
            $btnSaveChange.bind('click',function(e){
                var self = this;
                $.ajax({
                    type:'post',
                    url:'http://101.200.58.3/htmlprojectwebapi/SongCategory/update',
                    data:{id:dataItem.Id,name:changeInput.val(),accountId:currentUserData.Id},
                    success:function(result){
                        if(result.Code == 100){
                            $(self).parent().parent().replaceWith(createSongCategory(result.Data, num));
                        }
                        else{
                            alert('已经有该分类!');
                        }
                    },
                    dataType:'json'

                });
            });

            //编辑该行 取消操作
            $btnCancelChange.bind('click',function(e){
                $btnSaveChange.css('display','none');
                $btnCancelChange.css('display','none');
                $btnChange.css('display','block');
                $btnDel.css('display','block');
                changeInput.remove();
                $tdName.text(dataItem.Name);


            });

        });


        var $btnDel = $('<button></button>').appendTo($tdDo);
        $btnDel.text('删除').addClass('btn btn-danger btnDel');
        //点击行操作 删除！
        $btnDel.bind('click',function(e){
            $(this).parent().parent().remove();
        });

        countNew = count ;
        return $tr;
    }


});
