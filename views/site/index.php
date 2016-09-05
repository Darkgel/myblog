<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
/* @var $this yii\web\View */

$this->title = 'Darkgel\'s blog';
?>
<style type="text/css">
#left{
    height: 2900px;
    background-color: black;
    position:fixed;
}

#left #avatar{
    margin-top:10px;
    text-align:center;
}

#right-top{
    background-color: #2D2D2D;
    margin-bottom:10px;
    height:90px;
}

#right-top img{
    margin:10px 0 10px 0;
}

#right-sidebar{
    padding-bottom:200px;
    background: url("http://www.myblog.com/img/bgline.png") repeat-y left;
}

#introduction{
    margin:10px 0;
    text-align:center;
}

#introduction #myname{
    font-weight:bold;
    font-size:33px;
    color:white;
    margin-bottom:10px;
}

#introduction #moto{
    font-weight:bold;
    font-size:20px;
    color:white;
}

#search_form{
    margin:30px 0;
}

#search_form input{
    float:left;
    width:130px;
    margin-right:2px;
}

#navigation li{
    border-bottom:1px solid grey;
    text-align:center;
}



#right-footer{
    text-align:center;
    border-top:1px solid;
    padding-bottom:20px;

}

</style>


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
                <li><a href="#">首页</a></li>
                <li><a href="#">管理</a></li>
                <li><a href="#">联系我</a></li>
                <li><a href="#">写文章</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-2" id="right-top">
        <?=Html::img("@web/img/top.png");?>
    </div>
    <div class="col-md-8 col-md-offset-2" id="right-content">
            content
    </div>
    <div class="col-md-2 col-md-offset-10" id="right-sidebar">
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
        <div id="articles">
            <ul class="list-group">
                <li class="list-group-item"><h3>最新文章</h3></li>
                <li class="list-group-item"><a href="#">百度bootstrap中使用日历控件</a></li>
                <li class="list-group-item"><a href="#">goobootstrap中使用日历控件gle</a></li>
                <li class="list-group-item"><a href="#">QQ</a></li>
                <li class="list-group-item"><a href="#">更多</a></li>
            </ul>
        </div>
        <div id="comments">
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
                    <span class="badge">23</span>mysql
                </li>
                <li class="list-group-item">
                    <span class="badge">3</span>php
                </li>
                <li class="list-group-item">
                    <span class="badge">21</span>linux
                </li>
            </ul>
        </div>
        <div id="classification">
            <ul class="list-group">
                <li class="list-group-item"><h3>分类</h3></li>
                <li class="list-group-item">
                    <span class="badge">2</span>css
                </li>
                <li class="list-group-item">
                    <span class="badge">2</span>js
                </li>
                <li class="list-group-item">
                    <span class="badge">2</span>asp
                </li>
            </ul>
        </div>
        <div id="archives">
            <ul class="list-group">
                <li class="list-group-item"><h3>归档</h3></li>
                <li class="list-group-item">
                    <span class="badge">2</span>2016年9月
                </li>
                <li class="list-group-item">
                    <span class="badge">2</span>2016年8月
                </li>
                <li class="list-group-item">
                    <span class="badge">2</span>2016年7月
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
    <div class="col-md-10 col-md-offset-2" id="right-footer">
        <?=Html::img("img/DARKGEL.png");?>
    </div>
</div>


