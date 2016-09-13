<?php

$this->title = "新文章";
?>
<div id="new-article">
    <form id="article-form" role="form" action="http://www.myblog.com/index.php?r=post/create" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken();?>">
        <div class="form-group">
            <label for="title">标题</label>
            <input name="post_title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="summary">摘要</label>
            <textarea name="post_summary" class="form-control" id="summary" rows="8"></textarea>
        </div>
        <div class="form-group">
            <label for="content">文章内容</label>
            <textarea name="post_content" class="form-control" id="content" rows="23"></textarea>
        </div>
        <div class="form-group">
            <label for="tags">标签</label>
            <input name="post_tags" class="form-control" id="tags">
            <p>常用标签 : yii,linux,php</p>
        </div>
        <div class="form-group">
            <label for="classification">分类</label>
            <input name="post_class" class="form-control" id="classification">
            <p>常用分类 : PHP,LINUX,YII</p>
        </div>
        <button type="submit" class="btn btn-info" onclick="asDraft()">保存为草稿</button>
        <button type="submit" class="btn btn-success" onclick="asPublished()">发表</button>

        <label>
    </form>
</div>


<script>
    function asDraft(){
        var href = "http://www.myblog.com/index.php?r=post/create&status=0";
        var form = $("#article-form");
        form.attr("action",href);
        form.submit();
    }

    function asPublished(){
        var href = "http://www.myblog.com/index.php?r=post/create&status=1";
        var form = $("#article-form");
        form.attr("action",href);
        form.submit();
    }
</script>