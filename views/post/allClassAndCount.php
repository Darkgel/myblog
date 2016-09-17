<?php
use yii\helpers\Html;
?>
<h1>所有分类&nbsp;:&nbsp;</h1>
<div class="col-md-12">
    <div class="row">
        <?php foreach($class_arr as $class_with_count):?>
            <div class="col-md-3">
                <li class="list-group-item" style="margin-bottom:20px;">
                <span class="badge"><?=Html::encode($class_with_count['count'])?></span>
                <?=Html::a(Html::encode($class_with_count['class_name']),['post/index-with-class','class_id'=>$class_with_count['class_id']]);?>
                </li>
            </div>
        <?php endforeach;?>
    </div>
</div>