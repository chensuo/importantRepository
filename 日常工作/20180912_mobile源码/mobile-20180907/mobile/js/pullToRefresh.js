$(function(){
    /*����ˢ��*/
    $('.weui-tab').pullToRefresh(function () {
        // ����ˢ�´���ʱִ�еĲ��������
        //����ˢ��
        //do something
        setTimeout(function() {
            $('.weui-tab').pullToRefreshDone();
        }, 2000);
    });
});