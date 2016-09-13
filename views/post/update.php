<?php
use yii\helpers\Html;

$this->title = "新文章";
?>
<div id="new-article">
    <form id="article-form" role="form" action="http://www.myblog.com/index.php?r=post/update&id=<?=$post->post_id;?>" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken();?>">
        <div class="form-group">
            <label for="title">标题</label>
            <input name="post_title" class="form-control" id="title" value="<?=Html::encode($post->post_title);?>">
        </div>
        <div class="form-group">
            <label for="summary">摘要</label>
            <textarea name="post_summary" class="form-control" id="summary" rows="8" ><?=Html::encode($post->post_summary);?></textarea>
        </div>
        <div class="form-group">
            <label for="content">文章内容</label>
            <textarea name="post_content" class="form-control" id="content" rows="23" ><?=Html::encode($post->post_content);?></textarea>
        </div>
        <div>
            <p id="article-tags">
                <strong>标签</strong> :
                <?php foreach($post->tags as $tag):?>
                    <?=Html::encode($tag['tag_name']);?>,&nbsp;
                <?php endforeach;?>
            </p>
            <p id="article-class">
                <strong>分类</strong> :
                <?php foreach($post->classifications as $classification):?>
                    <?=Html::encode($classification['class_name']);?>,&nbsp;
                <?php endforeach;?>
            </p>
        </div>
        <button type="submit" class="btn btn-info" onclick="asDraftUpdate()">保存为草稿</button>
        <button type="submit" class="btn btn-success" onclick="asPublishedUpdate()">发表</button>

        <label>
    </form>
</div>


<script>
    function asDraftUpdate(){
        var form = $("#article-form");
        var href = form.attr('action')+"&status=0";
        form.attr("action",href);
        form.submit();
    }

    function asPublishedUpdate(){
        var form = $("#article-form");
        var href = form.attr('action')+"&status=1";
        form.attr("action",href);
        form.submit();
    }
</script>