<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model abdallah\comments\models\commentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'body') ?>

    <?= $form->field($model, 'status_code') ?>

    <?= $form->field($model, 'auther_taxonomy') ?>

    <?= $form->field($model, 'auther_id') ?>

    <?php // echo $form->field($model, 'object_taxonomy') ?>

    <?php // echo $form->field($model, 'object_id') ?>

    <?php // echo $form->field($model, 'reply_on') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
