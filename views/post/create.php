<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "新文章";
?>
<div id="new-article">
    <?php $form = ActiveForm::begin(['id'=>'article-form']);?>
    <?= $form->field($post, 'post_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($post, 'post_summary')->textarea(['row'=>8]) ?>
    <?= $form->field($post, 'post_content')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
                'imageManagerJson' => ['/redactor/upload/image-json'],
                'imageUpload' => ['/redactor/upload/image'],
                'fileUpload' => ['/redactor/upload/file'],
                'lang' => 'zh_cn',
                'plugins' => ['clips', 'fontcolor','imagemanager','fontfamily','fontsize','fullscreen']
            ]
        ]
    ) ?>
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
    <?=Html::submitButton('保存为草稿',['class'=>'btn btn-info','onclick'=>'asDraft()'])?>
    <?=Html::submitButton('发表', ['class'=>'btn btn-success','onclick' =>'asPublished()'])?>
    <?php ActiveForm::end();?>
</div>


<script>
    function asDraft(){
        var href = "http://www.darkgel.me/index.php?r=post/create&status=0";
        var form = $("#article-form");
        form.attr("action",href);
        form.submit();
    }

    function asPublished(){
        var href = "http://www.darkgel.me/index.php?r=post/create&status=1";
        var form = $("#article-form");
        form.attr("action",href);
        form.submit();
    }
</script>