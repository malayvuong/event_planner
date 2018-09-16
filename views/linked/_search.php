<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LinkedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linked-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'lid') ?>

    <?= $form->field($model, 'sk_id') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'cv_id') ?>

    <?= $form->field($model, 'begin') ?>

    <?php // echo $form->field($model, 'end') ?>

    <?php // echo $form->field($model, 'klcv') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
