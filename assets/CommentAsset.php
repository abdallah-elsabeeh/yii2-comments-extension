<?php

namespace abdallah\comments\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CommentAsset extends AssetBundle {

   public $sourcePath = '@abdallah/comments/assets';
    public $css = [
       
    ];
    public $js = [
        'comment.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
