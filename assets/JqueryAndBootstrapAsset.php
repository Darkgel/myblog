<?php


namespace app\assets;

use yii\web\AssetBundle;


class JqueryAndBootstrapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'JqueryAndBootstrap/bootstrap/css/bootstrap.css',
    ];
    public $js = [
        'JqueryAndBootstrap/jquery/jquery-3.1.0.min.js',
        'JqueryAndBootstrap/bootstrap/js/bootstrap.min.js',
    ];

}