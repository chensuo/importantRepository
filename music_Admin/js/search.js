/**
 * Created by Administrator on 2018/1/3.
 */
$(function(e){
    /*
     *   查询功能
     * **/
    $tbMain = $('tbody');
    var $formControl = $('.form-control');
    $('#btnSearch').bind('click',function(e){
        $tbMain.children('tr').addClass('notChosed').show();
        $tbMain.children('tr:contains(' + $formControl.val() + ')').removeClass('notChosed');
        $tbMain.children('.notChosed').hide();

    });
});