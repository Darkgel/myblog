//get the param in the url
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return decodeURI(r[2]); return null; //返回参数值
}

/*------------vote begin------------*/
function approve(){
    $.ajax({
        type:"GET",
        url:"http://www.myblog.com/index.php?r=post/vote&id="+getUrlParam('id')+"&vote=1",
        success:function(data){
            if(data=='success'){
                $("#approve_count").text(parseInt($("#approve_count").text())+1);
                toast("评价成功!   感谢您的评价!");
            }else{
                toast("评价失败!   再试一次看看...");
            }
        },
        error:function(){
            toast("评价失败!   再试一次看看...");
        }
    });
}

function against(){
    $.ajax({
        type:"GET",
        url:"http://www.myblog.com/index.php?r=post/vote&id="+getUrlParam('id')+"&vote=0",
        success:function(data){
            if(data=='success'){
                $("#against_count").text(parseInt($("#against_count").text())+1);
                toast("评价成功!感谢您的评价!");
            }else{
                toast("评价失败!   再试一次看看...");
            }
        },
        error:function(){
            toast("评价失败!   再试一次看看...");
        }
    });
}
/*------------vote end------------*/


/*
*implement effect like toast in android
*方法声明：
*function toast(message, duration)
*参数说明：
*string message - toast提示内容
*int duration - toast显示持续时间
* (可选"long", "short"或具体毫秒数，"short"时为2000，"long"为5000，此参数不填时默认"short")
* */
var toast_id = 0;        //外部变量，用来保存setTimeout产生的计时器id
var zindex = 99;　　　　　//这里的z-index可以自己调整，保证在其他元素上不被遮挡
function toast(message, duration) {
    window.clearTimeout(toast_id);    //若短时间内调用两次toast,清除上一次的timeout
    if (document.getElementById("app_toast")!=undefined) {
        //上次toast未消失,此时强制停止动画并删除该元素
        $("#app_toast").stop();
        document.body.removeChild(document.getElementById("app_toast"));
    }
    //设置超时时间
    duration = duration==null?"short":duration;
    if (duration=="short") duration = 2000;
    else if (duration=="long") duration = 5000;

    //定义新元素
    var div = document.createElement("div");
    div.setAttribute("style", "position:fixed;top:50%;text-align:center;width:95%;z-index:" + zindex);
    div.setAttribute("id", "app_toast");

    //写入innerHTML内容，z-index为app_tpast的z-index值加1，value为提示内容
    div.innerHTML = '<input type="button" id="app_txt_toast" style="padding-left:20px;padding-right:20px;border-radius:8px;opacity:0.2;height:20px;background:#000000;color:#ffffff;border:none;z-index:'+(zindex+1)+';" value="'+message+'"/>';
    document.body.appendChild(div);　　//向document添加元素

    $("#app_txt_toast").animate({height:'29px',opacity:'0.7'}, 200, function(){});
    $("#app_toast").animate({top:'60%'}, 200, function(){});　　//制作一个toast从底部滑动效果

    //持续duration毫秒后fadeout
    toast_id = window.setTimeout(function() {
        $("#app_toast").fadeOut(200, function() {
            document.body.removeChild(document.getElementById("app_toast"));
            toast_id = 0;
        })
    }, duration);
}

// function replyform(){
//     this.id
//     $(".new-reply").toggle();
// }
$(".reply a").click(function(){
    var mes = this.id;
    var arr = mes.split('-');
    var reply_form = $("#reply-form").remove();
    var href = "http://www.myblog.com/index.php?r=comment/reply&post_id="+arr[1]+"&comment_after="+arr[2]+"&comment_replyto_id="+arr[0]+"&comment_replyto_author="+arr[3];
    reply_form.find("form").attr("action",href);
    $(this).next().append(reply_form);
    return false;
});

function cancel_reply(){
    var reply_form = $("#reply-form").remove();
    $("#reply-ul").append(reply_form);
    return false;
}
