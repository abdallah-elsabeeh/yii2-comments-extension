<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model abdallah\comments\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auther_taxonomy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auther_id')->textInput() ?>

    <?= $form->field($model, 'object_taxonomy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'object_id')->textInput() ?>

    <?= $form->field($model, 'reply_on')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
