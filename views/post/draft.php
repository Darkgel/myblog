<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = '我的草稿';
?>
<div id="articles">
    <?php foreach($posts as $post):?>
        <div class="article-item">
            <h3><?=Html::a(
                    Html::encode($post->post_title),
                    ['post/view','id'=>$post->post_id]
                );?></h3>
            <div class="article-summary">
                <span class="summary">摘要: &nbsp;</span>
                <span><?=Html::encode($post->post_summary);?></span>
                <span><?=Html::a(
                        '阅读全文',
                        ['post/view','id'=>$post->post_id]
                    );?></span>
            </div>
            <div class="article-details">
                <span>posted @ <?=Html::encode($post->post_modify_date);?> 阅读(<?=Html::encode($post->post_read_count)?>) 评论(<?=Html::encode($post->getCommentCount($post->post_id))?>)&nbsp;
                    <?php if(!Yii::$app->user->isGuest):?>
                        <?=Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            ['post/update','id'=>$post->post_id]
                        );?>&nbsp;
                        <a href="javascript:deletePost(<?=$post->post_id;?>)"><span class="glyphicon glyphicon-trash"></span></a>
                    <?php endif;?>
                </span>
            </div>
        </div>
    <?php endforeach;?>
</div>

<div id="pagination">
    <?=LinkPager::widget([
        'pagination'=>$pagination,
        'nextPageLabel'=>'下一页',
        'prevPageLabel'=>'上一页',
        'firstPageLabel'=>'首页',
        'lastPageLabel'=>'尾页',
        'maxButtonCount'=>3,
    ]);?>
</div>