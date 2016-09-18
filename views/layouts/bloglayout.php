<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\BloglayoutAsset;
use app\widgets\leftSidebarWidget;
use yii\widgets\ActiveForm;

AppAsset::register($this);
BloglayoutAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid" >
    <div class="col-md-2" id="left">
        <div id="avatar">
            <?=Html::img("@web/img/avatar.png");?>
        </div>
        <div id="introduction">
            <div id="myname">Darkgel</div>
            <p id="moto">Yes,this is my life!</p>
        </div>
        <div id="search_form">
            <?php $form = ActiveForm::begin(['action'=>['site/search'],'method'=>'get']);?>
                <input type="text" class="form-control" placeholder="搜索" name="search">
                <button type="submit" class="btn btn-mini"><span class="glyphicon glyphicon-search"></span></button>
            <?php ActiveForm::end()?>
        </div>
        <div id="navigation">
            <ul class="nav navtabs">
                <li><a href="http://www.myblog.com/index.php">首页</a></li>
                <?php if(Yii::$app->user->isGuest):?>
                <li><a href="http://www.myblog.com/index.php?r=site/login">管理</a></li>
                <li><a href="#">联系我</a></li>
                <?php else:?>
                <li><a href="http://www.myblog.com/index.php?r=post/create">写文章</a></li>
                <li><a href="http://www.myblog.com/index.php?r=post/draft">我的草稿</a></li>
                <li><a href="http://www.myblog.com/index.php?r=site/logout">退出登录</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-2" id="right-top">
<!--        <div class="row" id="other-world">-->
<!--            <div class="col-md-4"><a href="#">·电影·</a></div>-->
<!--            <div class="col-md-4"><a href="#">·书·</a></div>-->
<!--            <div class="col-md-4"><a href="#">·音乐·</a></div>-->
<!--        </div>-->
        <div class="row">
            <?=Html::img("@web/img/top.png");?>
        </div>

    </div>
    <div class="col-md-10 col-md-offset-2" id="right">
        <div class="row">
            <div class="col-md-10 " id="right-content">
                <?= $content ?>

            </div>
            <div class="col-md-2 " id="right-sidebar">
                <?=leftSidebarWidget::widget();?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="right-footer">
                <?=Html::img("img/DARKGEL.png");?>
                <div>
                    Copyright © Darkgel
                </div>
            </div>

        </div>

    </div>

</div>



<!--置顶按钮-->
<a href="javascript:scroll_to_top()" id="scroll_to_top" class="btn btn-lg"><span class="glyphicon glyphicon-chevron-up"></span><br />回到<br />顶部</a>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
