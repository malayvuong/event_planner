<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Linked */

$this->title = 'Thay đổi thông tin phân công: ' . $model->lid;
$this->params['breadcrumbs'][] = ['label' => 'Linkeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lid, 'url' => ['view', 'id' => $model->lid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linked-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' =>  $users,
        'congviec' =>  $congviec,
        'sukien' =>  $sukien,
    ]) ?>

</div>
