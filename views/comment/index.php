<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel abdallah\comments\models\commentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comments');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Comments'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            'id',

            'body:ntext',
                [
                'attribute' => 'status_code',
                'format' => 'text',
                'label' => 'status_code',
                'contentOptions' => ['style' => ['width' => '50px']],
                'value' => 'status_code'
            ],
//         'auther_taxonomy',
            [
                'attribute' => 'createdBy',
                'format' => 'text',
                'label' => 'user',
                'contentOptions' => ['style' => ['min-width' => '80px']],
                'value' => 'auther.username'
            ],
            // 'object_taxonomy',
            // 'object_id',
            // 'reply_on',
            // 'updated_at',
            'created_at:time',
                [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:50px;'],
                'header' => 'Actions',
                'template' => '{delete}',
            ],
        ],
    ]);

    ?>
    <?php Pjax::end(); ?></div>
