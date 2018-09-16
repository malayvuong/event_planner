<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sukien */

$this->title = 'Update Sukien: ' . $model->sk_id;
$this->params['breadcrumbs'][] = ['label' => 'Sukiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sk_id, 'url' => ['view', 'id' => $model->sk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sukien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
