$(function(e){
	var tbMian = $('.index-tb tbody');
	var sectionName = $('#txtName');
	var priority = $('#txtPriority');
	var img = $('.iconResourceSec');
	var timer1 ; 
	var timer2;
	var timer3;
	var timer4;

	/*加载该页面数据*/
	getNewsSectionData();


	/*添加新栏目 点击确定添加按钮*/
	$('.btn-save').bind('click' , function(e){
		if(sectionName.val() != '' && $('#iconResource')[0].files[0]){

			/*先上传图片*/
			var formData = new FormData();
				formData.append('image' , $('#iconResource')[0].files[0]);
				$.ajax({
					url:'ajax/upload.php',
					type:'post',
					data:formData,
					contentType:false,
					processData:false,
					success:function(response){
						/*上传图片成功*/
						if(response.code == 100){
							var $image = response.data;
							/*提交数据 发送请求*/
							$.ajax({
								type:'post',
								url:'ajax/addNewsSection.php',
								data:{sectionName:sectionName.val(), priority:priority.val() , image:$image},
								success:function(response){
									if(response.code == 100){
										$('#myModal').modal('hide');
										$('.registe').css('display' , 'none');
										sectionName.val('');
										priority.val(100);
										$('#dialog-icon-sec').attr('src' , 'image/default.jpg');
										/*重新获取数据 加载页面*/
										tbMian.html('');
										getNewsSectionData();
									}
									
								}
							});
						}
					}
				});
		}
		else{
			$('.registe').css('display' , 'inline-block');
		}
		

	});

	/*模态框取消操作*/
	$('.btn-cancel').bind('click' , function(){
		$('.registe').css('display' , 'none');
		sectionName.val('');
		priority.val(100);
		$('#dialog-icon-sec').attr('src' , 'image/default.jpg');
	});
	 /*
     *   查询功能
     * **/
    var $searchKey = $('.search-key');
    $('#btnSearch').bind('click',function(e){
        tbMian.children('tr').addClass('notChosed').show();
        tbMian.children('tr:contains(' + $searchKey.val() + ')').removeClass('notChosed');
        tbMian.children('.notChosed').hide();

    });




	/********加载新闻模块数据********/
	function getNewsSectionData(){
		$.ajax({
			type:'get',
			url:'ajax/getNewsSection.php',
			success:function(response){
				if(response.code == 100){
					var list = response.data;
					for(var i = 0; i < list.length; i++){
						var $tr = createDataRow(list[i] , i+1);
						$tr.appendTo(tbMian);
					}
				}
				else{
					alert('页面加载失败！');
				}
			}
		});
	}

	/*dom操作 */
	function createDataRow(dataItem , num){
		var  $tr = $('<tr></tr>');

		var $tdId = $('<td></td>').text(num).appendTo($tr);
		var $tdCoin = $('<td></td>').appendTo($tr);
		var $img = $('<img src="" />').attr('src' ,dataItem.Image).appendTo($tdCoin)
		var $tdSectionName = $('<td></td>').text(dataItem.SectionName).appendTo($tr);
		var $tdpriority = $('<td></td>').text(dataItem.Priority).appendTo($tr);
		var $tdDo= $("<td class='btnContainer'></td>").appendTo($tr);
		// var $lnkDetail = $('<button class="btn btn-primary">详情</button>').appendTo($tdDo);
        var $lnkChange = $('<button class="btn btn-warning" data-toggle="modal" data-target="#editModal">修改</button>').appendTo($tdDo);
        var $lnkDel = $('<button class="btn btn-danger" data-toggle="modal" data-target="#delModal">删除</button>').appendTo($tdDo);
        /*删除操作*/
        $lnkDel.bind('click' , function(){
        	$.ajax({
        		type:'post',
        		url:'ajax/delNewsSection.php',
        		data:{sectionId:dataItem.Id},
        		success:function(response){
        			if(response.code == 100){
        				tbMian.html('');
						getNewsSectionData();
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

        /*修改操作*/
        $lnkChange.bind('click' , function(){
        	/*模态框内原始数据*/
        	$('#edit-txtName').val(dataItem.SectionName);
        	$('#edit-txtPriority').val(dataItem.Priority);
        	$('.edit-dialog-icon').attr('src' , dataItem.Image);

        	if($('#iconResourceSec')[0].files[0]){

        	/*请求**/
        	$('.btn-save-edit').unbind("click").bind('click' , function(response){
        		/*先上传图片*/
				var formData = new FormData();
				formData.append('image' , $('#iconResourceSec')[0].files[0]);
				$.ajax({
					url:'ajax/upload.php',
					type:'post',
					data:formData,
					contentType:false,
					processData:false,
					success:function(response){
						/*上传图片成功*/
						if(response.code == 100){
							var $image = response.data;
							console.log($image);
							/*提交数据 发送请求*/
							$.ajax({
				        		type:'post',
				        		url:'ajax/editNewsSection.php',
				        		data:{sectionId:dataItem.Id , sectionName: $('#edit-txtName').val(), priority:$('#edit-txtPriority').val() , image:$image},
				        		success:function(response){
				        			console.log(response);
				        			if(response.code == 100){
				        				tbMian.html('');
										getNewsSectionData();
										$('#editModal').modal('hide');
				        			}
				        			else{
										alert("模块名称过长");
										$('#editModal').modal('hide');
				        			}
				        		}
				        	});

						}
					}
				});
        	});
        }
        else{	
        	/*未修改图片*/
        		/*提交数据 发送请求*/
        		$('.btn-save-edit').unbind("click").bind('click' , function(response){
							$.ajax({
				        		type:'post',
				        		url:'ajax/editNewsSection.php',
				        		data:{sectionId:dataItem.Id , sectionName: $('#edit-txtName').val(), priority:$('#edit-txtPriority').val() , image:null},
				        		success:function(response){
				        			console.log(response);
				        			if(response.code == 100){
				        				tbMian.html('');
										getNewsSectionData();
										$('#editModal').modal('hide');
				        			}
				        			else{
										alert("模块名称过长");
										$('#editModal').modal('hide');
				        			}
				        		}
				        	});
						});


        }
        	
        });



        return $tr;
	}

	/*预览图片*/
	 $('.iconResourceSec').bind('change', function(e) {


                //检查是否选择文件
                if(this.files.length == 0)
                    return;

                var file = this.files[0];

                //检查文件大小
                if(file.size >1024 * 1024 *2){
                    //超过2M

                    this.value = null;
                    return;
                }

                //检查文件类型
                if(!(file.type == 'image/png' || file.type == 'image/jpeg')){

                    this.value = null;
                    return;
                }
                var fileReader = new FileReader();
                fileReader.onload = function(e){
                    var tempImage = new Image();
                    //if(tempImage.width == 1024 || tempImage.height == 768){
                    //预览
                    tempImage.src = e.target.result;

                    $('.dialog-icon').attr('src', tempImage.src);

                };
                fileReader.readAsDataURL(file);

            });

});