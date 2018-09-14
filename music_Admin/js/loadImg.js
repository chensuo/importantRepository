/**
 * Created by Administrator on 2018/1/2.
 */
var operatorHeader = document.querySelector('.operatorHeader');
/*
 *   添加图片时 预览图片
 * */
var singerHeader = document.querySelector('#singerHeader');

singerHeader.onchange = function(e){
    var self = this;

    //检查是否选择文件
    if(this.files.length == 0)
        return;

    var file = this.files[0];

    //检查文件大小
    if(file.size >1024 * 1024 *2){
        //超过2M
        console.log('图片超过2M');
        this.value = null;
        return;
    }

    //检查文件类型
    if(!(file.type == 'image/png' || file.type == 'image/jpeg')){
        console.log('不是图片格式');
        this.value = null;
        return;
    }
    var fileReader = new FileReader();
    fileReader.onload = function(e){
        var tempImage = new Image();
        //if(tempImage.width == 1024 || tempImage.height == 768){
        //预览
        tempImage.src = e.target.result;

        operatorHeader.src = tempImage.src;
        //}
        //else{
        //    alert('图片分辨率必须为1024');
        //}
    };
    fileReader.readAsDataURL(file);


}

