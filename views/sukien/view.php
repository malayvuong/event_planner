<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sukien */

$this->title = $model->sk_id;
$this->params['breadcrumbs'][] = ['label' => 'Sukiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sukien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sk_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sk_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sk_id',
            'sk_name',
            'sk_khuvuc',
            'sk_time',
            'sk_begin',
            'sk_end',
            'sk_address',
            'sk_note:ntext',
            'sk_status',
        ],
    ]) ?>

</div>
