<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\PostviewAsset;
use yii\bootstrap\Alert;


$this->title = $post->post_title;
AppAsset::register($this);
PostviewAsset::register($this);
?>
<?php
if( Yii::$app->getSession()->hasFlash('comment_success') ) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-success', //这里是提示框的class
        ],
        'body' => Yii::$app->getSession()->getFlash('comment_success'), //消息体
    ]);
}
?>
<div id="article">
    <h1><?=$post->post_title;?></h1>
    <div id="article-body">
        <?=$post->post_content;?>
    </div>
    <div id="article-footer">
        <div id="vote">
            <a href="javascript:approve()" id="approve">赞成(<span id="approve_count"><?=Html::encode($post->post_like_count);?></span>)</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript:against()" id="against">反对(<span id="against_count"><?=Html::encode($post->post_hate_count);?></span>)</a>
        </div>
        <br /><br />
        <div>
            <p id="article-tags">
                <strong>标签</strong> :
                <?php foreach($post->tags as $tag):?>
                    <?=Html::encode($tag['tag_name']);?>,&nbsp;
                <?php endforeach;?>
            </p>
            <p id="article-class">
                &nbsp;&nbsp;<strong>分类</strong> :
                <?php foreach($post->classifications as $classification):?>
                    <?=Html::encode($classification['class_name']);?>,&nbsp;
                <?php endforeach;?>
            </p>
        </div>
        <br /><br />
        <div>
            <?php if(isset($preAndnext[1])):?>
                <p id="backward">
                    &nbsp;上一篇 :&nbsp;
                    <?=Html::a(Html::encode($preAndnext[0]['post_title']),['post/view','id'=>$preAndnext[0]['post_id']]);?>
                </p>
                <p id="forward">
                    下一篇 : &nbsp;
                    <?=Html::a(Html::encode($preAndnext[1]['post_title']),['post/view','id'=>$preAndnext[1]['post_id']]);?>
                </p>
            <?php else:?>
                <?php if(($preAndnext[0]['post_id']>$post->post_id)):?>
                    <p id="backward">
                        &nbsp;上一篇 :&nbsp;没有了
                    </p>
                    <p id="forward">
                        下一篇 : &nbsp;
                        <?=Html::a(Html::encode($preAndnext[0]['post_title']),['post/view','id'=>$preAndnext[0]['post_id']]);?>
                    </p>
                <?php else:?>
                    <p id="backward">
                        &nbsp;上一篇 :&nbsp;
                        <?=Html::a(Html::encode($preAndnext[0]['post_title']),['post/view','id'=>$preAndnext[0]['post_id']]);?>
                    </p>
                    <p id="forward">
                        下一篇 : &nbsp;没有了
                    </p>
                <?php endif?>
            <?php endif?>

        </div>
        <br /><br />
        <div id="other-details">
            <span>posted @ <?=Html::encode($post->post_modify_date);?> 阅读(<?=Html::encode($post->post_read_count)?>) 评论(<?=Html::encode($post->getCommentCount($post->post_id))?>)&nbsp;
                <?php if(!Yii::$app->user->isGuest):?>
                <?=Html::a(
                    '<span class="glyphicon glyphicon-pencil"></span>',
                    ['post/update','id'=>$post->post_id]
                );?>&nbsp;
                <?=Html::a(
                    '<span class="glyphicon glyphicon-trash"></span>',
                    ['post/delete','id'=>$post->post_id]
                );?>
                <?php endif;?>
                </span>
        </div>
    </div>
</div>

<div id="comments">
    <h3>&nbsp;评论列表</h3>
    <ul class="media-list">
        <?php foreach ($comment_group as $comment_chain):?>
        <li class="media">
            <div class="media-object pull-left">
                <?=Html::img("@web/img/user.png");?>
            </div>
            <div class="media-body">
                <h5 class="media-heading">
                    <?=Html::encode($comment_chain[0]['comment_author_name'])?>&nbsp;
                    <?php if(($comment_chain[0]['comment_author_email'])!==''):?>
                    <a href="mailto:<?=Html::encode($comment_chain[0]['comment_author_email'])?>">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </a>&nbsp;
                    <?php endif;?>
                    <span><?=Html::encode($comment_chain[0]['comment_date'])?></span>
                </h5>
                <div><?=Html::encode($comment_chain[0]['comment_content'])?><a id="<?=Html::encode($comment_chain[0]['comment_id'])?>" hidden="hidden"></a></div>
                <div class="reply">
                    <a id="<?=Html::encode($comment_chain[0]['comment_id'].'-'.$post->post_id.'-'.$comment_chain[0]['comment_after'].'-'.$comment_chain[0]['comment_author_name']);?>" href="#">回复</a>
                    <ul id="reply-<?=Html::encode($comment_chain[0]['comment_id'])?>">

                    </ul>
                </div>
                <br/>
                <?php if(count($comment_chain)>1):?>
                    <ul class="media-list">
                    <?php for($i = 1; $i < count($comment_chain);$i++):?>
                        <!--     reply begin           -->
                        <li class="media">
                            <div class="media-object pull-left">
                                <?=Html::img("@web/img/user.png");?>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <?=Html::encode($comment_chain[$i]['comment_author_name'])?>&nbsp;
                                    <?php if(($comment_chain[$i]['comment_author_email'])!==''):?>
                                        <a href="mailto:<?=Html::encode($comment_chain[$i]['comment_author_email'])?>">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </a>&nbsp;
                                    <?php endif;?>
                                    回复&nbsp;&nbsp;<?=Html::encode($comment_chain[$i]['comment_replyto_author'])?>&nbsp;
                                    <span><?=Html::encode($comment_chain[$i]['comment_date'])?></span>
                                </h5>
                                <div><?=Html::encode($comment_chain[$i]['comment_content'])?><a id="<?=Html::encode($comment_chain[$i]['comment_id'])?>" hidden="hidden"></a></div>
                                <div class="reply">
                                    <a id="<?=Html::encode($comment_chain[$i]['comment_id'].'-'.$post->post_id.'-'.$comment_chain[$i]['comment_after'].'-'.$comment_chain[$i]['comment_author_name']);?>" href="#">回复</a>
                                    <ul id="reply-<?=Html::encode($comment_chain[$i]['comment_id'])?>">

                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!--     reply end           -->
                    <?php endfor;?>
                    </ul>
                <?php endif?>
            </div>
        </li>
        <?php endforeach;?>
    </ul>
</div>

<div id="new-comments">
    <h3>&nbsp;发表评论</h3>
    <form role="form" action="http://www.myblog.com/index.php?r=comment/create&post_id=<?=$post->post_id;?>" method="post" onsubmit="return validate_form()" class="comment-form">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div class="form-group">
            <label for="comment-content">您的评论</label>
            <textarea name="comment_content" class="form-control" rows="8" id="comment-content" placeholder="请在这里写下您的评论"></textarea>
        </div>
        <div class="form-group">
            <label for="comment-author">评论人</label>
            <input name="comment_author_name" type="text" class="form-control" id="comment-author" placeholder="如何称呼您" >
        </div>
        <div class="form-group">
            <label for="email">邮箱(选填)&nbsp;&nbsp;&nbsp;备注:您的邮箱将不会被公开,若您留下邮箱,当有人回复您的评论时可以将回复发送到您的邮箱</label>
            <input name="comment_author_email" type="email" class="form-control" id="email" placeholder="请输入您的邮箱地址">
        </div>
        <button type="submit" class="btn btn-success">提交评论</button>
    </form>
</div>





<div  style="display:none;">
<ul id="reply-ul">
    <li id="reply-form">
        <form role="form" action="http://www.myblog.com/index.php?r=comment/create&post_id=<?=$post->post_id;?>" method="post" onsubmit="return validate_form()" class="comment-form">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            <div class="form-group">
                <label for="comment-content">您的回复</label>
                <textarea name="comment_content" class="form-control" rows="8" id="comment-content" placeholder="请在这里写下您的回复"></textarea>
            </div>
            <div class="form-group">
                <label for="comment-author">您的称呼</label>
                <input name="comment_author_name" type="text" class="form-control" id="comment-author" placeholder="如何称呼您" >
            </div>
            <div class="form-group">
                <label for="email">邮箱(选填)&nbsp;&nbsp;&nbsp;备注:您的邮箱将不会被公开,若您留下邮箱,当有人回复您的评论时可以将回复发送到您的邮箱</label>
                <input name="comment_author_email" type="email" class="form-control" id="email" placeholder="请输入您的邮箱地址">
            </div>
            <button type="button" class="btn btn-info" onclick="cancel_reply()">取消</button>
            <button type="submit" class="btn btn-success">提交</button>
        </form>
    </li>
</ul>
</div>





