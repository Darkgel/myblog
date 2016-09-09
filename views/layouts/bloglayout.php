<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\BloglayoutAsset;

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
<div class="container-fluid">
    <div class="col-md-2" id="left">
        <div id="avatar">
            <?=Html::img("@web/img/avatar.png");?>
        </div>
        <div id="introduction">
            <div id="myname">Darkgel</div>
            <p id="moto">Yes,this is my life!</p>
        </div>
        <div id="search_form">
            <form role="form" action="#">
                <input type="text" class="form-control" placeholder="搜索">
                <button type="submit" class="btn btn-mini"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
        <div id="navigation">
            <ul class="nav navtabs">
                <li><a href="http://www.myblog.com/index.php">首页</a></li>
                <li><a href="#">管理</a></li>
                <li><a href="#">联系我</a></li>
                <li><a href="#">写文章</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-2" id="right-top">
        <div class="row" id="other-world">
            <div class="col-md-4"><a href="#">·电影·</a></div>
            <div class="col-md-4"><a href="#">·书·</a></div>
            <div class="col-md-4"><a href="#">·音乐·</a></div>
        </div>
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
                <div id="statistics">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">33</span>文章数
                        </li>
                        <li class="list-group-item">
                            <span class="badge">23</span>评论数
                        </li>
                    </ul>
                </div>
                <div id="recent_articles">
                    <ul class="list-group">
                        <li class="list-group-item"><h3>最新文章</h3></li>
                        <li class="list-group-item"><a href="#">百度bootstrap中使用日历控件</a></li>
                        <li class="list-group-item"><a href="#">goobootstrap中使用日历控件gle</a></li>
                        <li class="list-group-item"><a href="#">QQ</a></li>
                        <li class="list-group-item"><a href="#">更多</a></li>
                    </ul>
                </div>
                <div id="recent-comments">
                    <ul class="list-group">
                        <li class="list-group-item"><h3>最新评论</h3></li>
                        <li class="list-group-item"><a href="#">百度bootstrap中使用日历控件</a></li>
                        <li class="list-group-item"><a href="#">goobootstrap中使用日历控件gle</a></li>
                        <li class="list-group-item"><a href="#">QQ</a></li>
                        <li class="list-group-item"><a href="#">更多</a></li>
                    </ul>
                </div>
                <div id="tags">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h3>标签</h3>
                        </li>
                        <li class="list-group-item">
                            <span class="badge">23</span><a href="#">mysql</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge">3</span><a href="#">php</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge">21</span><a href="#">linux</a>
                        </li>
                    </ul>
                </div>
                <div id="classification">
                    <ul class="list-group">
                        <li class="list-group-item"><h3>分类</h3></li>
                        <li class="list-group-item">
                            <span class="badge">2</span><a href="#">css</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge">2</span><a href="#">js</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge">2</span><a href="#">asp</a>
                        </li>
                    </ul>
                </div>
                <div id="archives">
                    <ul class="list-group">
                        <li class="list-group-item"><h3>归档</h3></li>
                        <li class="list-group-item">
                            <span class="badge">2</span><a href="#">2016年9月</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge">2</span><a href="#">2016年8月</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge">2</span><a href="#">2016年7月</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">更多</a>
                        </li>
                    </ul>
                </div>
                <div id="links">
                    <ul class="list-group">
                        <li class="list-group-item"><h3>链接</h3></li>
                        <li class="list-group-item"><a href="http://www.baidu.com">百度</a></li>
                        <li class="list-group-item"><a href="http://www.google.com">google</a></li>
                        <li class="list-group-item"><a href="http://www.qq.com">QQ</a></li>
                        <li class="list-group-item"><a href="#">更多</a></li>
                    </ul>
                </div>
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
