<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Congviec */

$this->title = 'Chỉnh sửa thông tin Công việc: ' . $model->cv_id;
$this->params['breadcrumbs'][] = ['label' => 'Congviecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cv_id, 'url' => ['view', 'id' => $model->cv_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="congviec-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
