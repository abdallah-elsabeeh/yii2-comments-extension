<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\modules\comment\widgets;
use yii\web\AssetBundle;

/**
 * Description of Asset
 *
 * @author abdallah
 */
class Asset extends AssetBundle
{
    public $sourcePath = 'backend\modules\comment\widgets';
    public $autoGenerate = true;
    /**
     * @inheritdoc
     */
    public $js = [];
}
