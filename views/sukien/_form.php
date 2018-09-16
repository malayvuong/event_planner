<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sukien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sukien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sk_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_khuvuc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_time')->textInput() ?>

    <?= $form->field($model, 'sk_begin')->textInput() ?>

    <?= $form->field($model, 'sk_end')->textInput() ?>

    <?= $form->field($model, 'sk_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sk_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
