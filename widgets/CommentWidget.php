<?php

namespace backend\modules\comment\widgets;

use yii\base\Widget;
use backend\modules\comment\assets\CommentAsset;

class CommentWidget extends Widget
{

    public $auther_taxonomy, $auther_id, $object_taxonomy, $blog, $object_id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        CommentAsset::register($this->view);
        $jsProvider=[
            'auther_taxonomy'=>$this->auther_taxonomy, 
            'auther_id'=>$this->auther_id, 
            'object_taxonomy'=>$this->object_taxonomy, 
            'object_id'=>$this->object_id
                ];
        $commentProvider = \backend\modules\comment\models\Comments::findAll(
                [
                    'object_taxonomy' => $this->object_taxonomy,
                    'object_id' => $this->object_id,
                    'status_code' => 'active',
                   
                ]
        );
        $commentCounter = \backend\modules\comment\models\Comments::find()->where(
                [
                    'object_taxonomy' => $this->object_taxonomy,
                    'object_id' => $this->object_id,
                    'status_code' => 'active',
                ]
            )->count();
        // Asset::register($view);
        // renders a view named "list"
        return $this->render('@backend/modules/comment/views/frontend/view', [
                'commentProvider' => $commentProvider,
                'commentCounter' => $commentCounter,
             'jsProvider' => $jsProvider,
        ]);
    }
}
