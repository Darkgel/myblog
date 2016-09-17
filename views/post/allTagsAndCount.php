<?php
use yii\helpers\Html;
?>
<h1>所有标签&nbsp;:&nbsp;</h1>
<div class="col-md-12">
    <div class="row">
        <?php foreach($tag_arr as $tag_with_count):?>
            <div class="col-md-3">
                <li class="list-group-item" style="margin-bottom:20px;">
                <span class="badge"><?=Html::encode($tag_with_count['count'])?></span>
                <?=Html::a(Html::encode($tag_with_count['tag_name']),['post/index-with-tags','tag_id'=>$tag_with_count['tag_id']]);?>
                </li>
            </div>
        <?php endforeach;?>
    </div>
</div>