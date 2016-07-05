
$(function () {
	$("#avartar").uploadify({
		//绑定flash脚本
		swf : "/plugins/uploadify/uploadify.swf",
		//设置按钮样式
                buttonText : "点击上传",
                buttonImage : "/plugins/uploadify/ImgBtn.png",
                width:50,
                height:23,
                //上传控制
               fileTypeDesc : "选择图片",
               fileTypeExts : "*.jpg;*.jpeg;*.png;*.gif",
               fileSizeLimit : 3*1024*1024,
                //上传的地址
			  //随表单一起提交的数据
                formData : {
                    _token :document.fm._token.value,
                    id : document.fm.id.value,
                },
				method:'post',
                uploader : "/Admin/user/avartar",
		onUploadSuccess : function (file, txt, response) {
		 //   alert(txt);
//			txt = '{"stutus" : 1, "info" : "upload\/avartar\/dsds.jpg\/"}';
			eval('var result = ' + txt);
			if (!result.status) {
				alert(result.info);
			} else {
				$("#im").attr("src", result.info);
			}
			
		}
                
                });
              
            }) 