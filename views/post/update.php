<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "修改文章";
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
    <?=Html::submitButton('保存为草稿',['class'=>'btn btn-info','onclick'=>'asDraftUpdate()'])?>
    <?=Html::submitButton('发表', ['class'=>'btn btn-success','onclick' =>'asPublishedUpdate()'])?>
    <?php ActiveForm::end();?>
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