<?php


namespace app\assets;

use yii\web\AssetBundle;

class BloglayoutAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bloglayout.css',
    ];
    public $js = [
        'js/bloglayout.js',
    ];


}