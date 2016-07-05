

$(function(){
    
    $('select[name=group_id]').change(function (){
        var result = confirm("确定要修改用户权限吗?");
        if(!result){
            location.reload();
           return; 
        }
       // alert($(this).val());
        //发送AJAX请求到后台数据库中修改用户对应的分组权限
        $.ajax({
           type : "post",
            url : "setGroupAccess",
            data : "group_id=" + $(this).val()+"&uid="+$(this).attr("uid"),
            dataType : "json",
            success : function(result){
                alert(result.info);
               if(!result.status) location.reload();
            }
        });
    });
    
    
    
    
})