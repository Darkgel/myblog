function scroll_to_top(){
    var position = $(window).scrollTop();
    var acceleration = 10;
    var clock=setInterval(function()
    {
        if(position<=0)
        {
            clearInterval(clock);
        }
        else
        {
            position-=acceleration;
            acceleration+=3;
            $(window).scrollTop(position);
        }
    },10);
}

function deletePost(id){
    if(confirm("你确定要删除这篇文章吗?")){
        $.ajax({
            type:"POST",
            url:"http://www.myblog.com/index.php?r=post/delete&id="+id,
            success:function(data){
                if(data=='1'){
                    alert("删除成功!");
                    location.reload();
                }else{
                    alert("删除失败!再试试看...");
                }
            },
            error:function(){
                alert("删除失败!再试试看...");
            }
        });
    }
}
