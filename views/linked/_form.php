<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Linked */
/* @var $form yii\widgets\ActiveForm */

// <label class="control-label" for="linked-user">Mã user</label>
// <input type="text" id="linked-user" class="form-control" name="Linked[user]">
?>
<div class="row">
    <div class="col-md-6 col-xs-12">
<div class="linked-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <label class="control-label" for="linked-user">Chọn nhân viên phụ trách</label>
        <select id="linked-user" class="form-control" name="Linked[user]">
    <?php
    if(isset($users) && count($users) > 0)
    {
        foreach($users as $key => $item)
        {
            echo '
            <option value="',$item['id'],'"',(isset($model->user) && $model->user == $item['id'] ? ' selected' : ''),'>',$item['name'],'</option>';
        }
    }
    ?>
        </select>
    </div>

    <div class="form-group">
        <label class="control-label" for="linked-cv_id">Chọn công việc phụ trách</label>
        <select id="linked-cv_id" class="form-control" name="Linked[cv_id]">
    <?php
    if(isset($congviec) && count($congviec) > 0)
    {
        foreach($congviec as $key => $item)
        {
            echo '
            <option value="',$item['cv_id'],'"',(isset($model->cv_id) && $model->cv_id == $item['cv_id'] ? ' selected' : ''),'>',$item['cv_name'],'</option>';
        }
    }
    ?>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="linked-sk_id">Chọn sự kiện đi kèm</label>
        <select id="linked-sk_id" class="form-control" name="Linked[sk_id]">
    <?php
    if(isset($sukien) && count($sukien) > 0)
    {
        foreach($sukien as $key => $item)
        {
            echo '
            <option value="',$item['sk_id'],'"',(isset($model->sk_id) && $model->sk_id == $item['sk_id'] ? ' selected' : ''),'>',$item['sk_name'],'</option>';
        }
    }
    ?>
        </select>
    </div>

    <div class="form-group field-linked-begin">
        <label class="control-label" for="linked-begin">Bắt đầu</label>
        <input type="datetime-local" id="linked-begin" class="form-control" name="Linked[begin]">
        <div class="help-block"></div>
    </div>

    <div class="form-group field-linked-end">
        <label class="control-label" for="linked-end">Kết thúc</label>
        <input type="datetime-local" id="linked-end" class="form-control" name="Linked[end]">
        <div class="help-block"></div>
    </div>
    

    <?= $form->field($model, 'klcv')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>
