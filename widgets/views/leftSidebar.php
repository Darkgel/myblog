<?php
use yii\helpers\Html;
?>

<div id="statistics">
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><?=Html::encode($post_count)?></span>文章数
        </li>
        <li class="list-group-item">
            <span class="badge"><?=Html::encode($comment_count)?></span>评论数
        </li>
    </ul>
</div>
<div id="recent_articles">
    <ul class="list-group">
        <li class="list-group-item"><h3>最新文章</h3></li>
        <?php foreach($recent_posts as $post):?>
        <li class="list-group-item">
            <?=Html::a(Html::encode($post->post_title),['post/view','id'=>$post->post_id])?>
        </li>
        <?php endforeach?>
        <li class="list-group-item">
            <?=Html::a('更多',['post/index'])?>
        </li>
    </ul>
</div>
<div id="recent-comments">
    <ul class="list-group">
        <li class="list-group-item"><h3>最新评论</h3></li>
        <?php foreach($recent_comments as $comment):?>
            <li class="list-group-item">
                <?=Html::a(Html::encode($comment->comment_content),['post/view','id'=>$comment->comment_post_id])?>
            </li>
        <?php endforeach?>
    </ul>
</div>
<div id="tags">
    <ul class="list-group">
        <li class="list-group-item">
            <h3>标签</h3>
        </li>
        <?php foreach($tags as $tag_with_count):?>
        <li class="list-group-item">
            <span class="badge"><?=Html::encode($tag_with_count['count'])?></span>
            <?=Html::a(Html::encode($tag_with_count['tag_name']),['post/index-with-tags','tag_id'=>$tag_with_count['tag_id']]);?>
        </li>
        <?php endforeach;?>
        <li class="list-group-item">
            <?=Html::a('更多',['post/index-with-tags','tag_id'=>0])?>
        </li>
    </ul>
</div>
<div id="classification">
    <ul class="list-group">
        <li class="list-group-item">
            <h3>分类</h3>
        </li>
        <?php foreach($classifications as $class_with_count):?>
            <li class="list-group-item">
                <span class="badge"><?=Html::encode($class_with_count['count'])?></span>
                <?=Html::a(Html::encode($class_with_count['class_name']),['post/index-with-class','class_id'=>$class_with_count['class_id']]);?>
            </li>
        <?php endforeach;?>
        <li class="list-group-item">
            <?=Html::a('更多',['post/index-with-class','class_id'=>0])?>
        </li>
    </ul>
</div>
<!--<div id="archives">-->
<!--    <ul class="list-group">-->
<!--        <li class="list-group-item"><h3>归档</h3></li>-->
<!--        <li class="list-group-item">-->
<!--            <span class="badge">2</span><a href="#">2016年9月</a>-->
<!--        </li>-->
<!--        <li class="list-group-item">-->
<!--            <span class="badge">2</span><a href="#">2016年8月</a>-->
<!--        </li>-->
<!--        <li class="list-group-item">-->
<!--            <span class="badge">2</span><a href="#">2016年7月</a>-->
<!--        </li>-->
<!--        <li class="list-group-item">-->
<!--            <a href="#">更多</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</div>-->
<!--<div id="links">-->
<!--    <ul class="list-group">-->
<!--        <li class="list-group-item"><h3>链接</h3></li>-->
<!--        <li class="list-group-item"><a href="http://www.baidu.com">百度</a></li>-->
<!--        <li class="list-group-item"><a href="http://www.google.com">google</a></li>-->
<!--        <li class="list-group-item"><a href="http://www.qq.com">QQ</a></li>-->
<!--        <li class="list-group-item"><a href="#">更多</a></li>-->
<!--    </ul>-->
<!--</div>-->