<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SukienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sukien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'sk_id') ?>

    <?= $form->field($model, 'sk_name') ?>

    <?= $form->field($model, 'sk_khuvuc') ?>

    <?= $form->field($model, 'sk_time') ?>

    <?= $form->field($model, 'sk_begin') ?>

    <?php // echo $form->field($model, 'sk_end') ?>

    <?php // echo $form->field($model, 'sk_address') ?>

    <?php // echo $form->field($model, 'sk_note') ?>

    <?php // echo $form->field($model, 'sk_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
