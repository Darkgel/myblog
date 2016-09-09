<?php


namespace app\assets;

use yii\web\AssetBundle;

class PostviewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/postview.css',
    ];
    public $js = [
        'js/postview.js',
    ];


}