 window.onload = function(e){
        var images = document.querySelectorAll('.image-wrapper>a');
        var buttons = document.querySelectorAll('.wrapper button');
        var index = 0;
        /*
          点击向右
        */
        var arrowRight = document.querySelector('.arrow-right');
        // document.onselectstart = new Function('return false');   //相当于css中user-select: none;
       
        //点击向右
        arrowRight.onclick = rightHandle;

        arrowRight.onmouseover = function(){
            arrowLeft.style.background = "rgba(0,0,0,0.4)";
            arrowLeft.style.color = "#fff";
        }
         arrowRight.onmouseout = function(){
            arrowLeft.style.background = "";
            arrowLeft.style.color = "#d1d1d1";
        }
     
        function rightHandle(){
            var self = this;

            if(timer){
                window.clearInterval(timer);
            }

           
            // 前一个左出
            images[index].className = 'outLeft';
            buttons[index].style.background = 'transparent';

            // 下一个右进
            index++;
            if(index >= images.length){
                index = 0;
            }
            images[index].className = 'inRight';
            buttons[index].style.background = '#fff';
            //解决点击过于频繁 连续翻页问题
            //移除绑定
            self.onclick = null;
            //再次绑定
            setTimeout(function(){  
                self.onclick = rightHandle;

                 timer = setInterval(autoChangeImage, 3000); 

                },1200);

          

        }
       

        /*
           点击向左
        */

        var arrowLeft = document.querySelector('.arrow-left');

        arrowLeft.onclick = leftHandle;

        function leftHandle(){
            var self = this;
            if(timer){
                window.clearInterval(timer);
            }

            images[index].className = 'outRight';
            buttons[index].style.background = 'transparent';

            if(index > 0){
                index--;
            }
            else{
                index = images.length - 1;
            }
            images[index].className = 'inLeft';
            buttons[index].style.background = '#fff';
            //解决点击过于频繁 连续翻页问题
            //移除绑定
            self.onclick = null;
            //再次绑定
            setTimeout(function(){ 
               
                self.onclick = leftHandle;
                timer = setInterval(autoChangeImage, 3000); 
            },1100);
           

        }


        /*
            点击按钮切换
         */
        
        for(var i = 0 ;i < buttons.length; i++){
            buttons[i].onclick = function(){
                var self = this;

                // 若点击当前页面 不变化

                // var currentIndex = getIndex(self);
                // for(var i = 0; i < buttons.length; i++){
                //     if(self == buttons[i]){
                //          currentIndex = i;
                //         break;

                //     }
                // }
                var currentIndex = getIndex(self);
               

                

                if(currentIndex == index){
                    return;
                }

                // 停止动画
                if(timer){
                    window.clearInterval(timer);
                }

                // 前一个出去
                if(currentIndex > index){
                    images[index].className = 'outLeft';
                    images[currentIndex].className = 'inRight';
                    buttons[index].style.background = 'transparent';
                    buttons[currentIndex].style.background = '#fff';
                }
                else{
                    // 当前进来
                    images[index].className = 'outRight';
                    images[currentIndex].className = 'inLeft';
                     buttons[index].style.background = 'transparent';
                    buttons[currentIndex].style.background = '#fff';
                }
                index = currentIndex;

                // 重启动画
                timer = window.setInterval(autoChangeImage , 3000);

            }
        }

        /*
            自动切换
        */

        var timer = window.setInterval(autoChangeImage , 3000);


        function autoChangeImage(){
            //当前左出
            images[index].className = 'outLeft';
            buttons[index].style.background = 'transparent';
            index++;
            if(index >= images.length){
                index = 0;
            }

            //右边右进
            images[index].className = 'inRight';
            buttons[index].style.background = '#fff';

        }

        //取点击按钮的index
        function getIndex(button){
            var idx = -1;
            for(var i = 0 ;i < buttons.length; i++){
                if(button == buttons[i]){
                    idx = i;
                    break;
                }
            }
            return idx;
        }




    }//window
    // $(function(e){
    //         $('.image-wrapper>a img').mouseover(function(){
    //             self = $(this);
    //             $(this).animate({width:"115%"} , 350);
    //             if(!self.is(":animated")){
    //                 self.stop();
    //             }
    //         });
    //         $('.image-wrapper>a img').mouseout(function(){
    //             self = $(this);
    //             $(this).animate({width:"100%"}, 200);
    //             if(!self.is(":animated")){
    //                 self.stop();
    //             }
    //         });

    //     });