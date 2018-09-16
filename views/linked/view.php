<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Users;
use app\models\UsersSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Linked */

$this->title = $model->lid;
$this->params['breadcrumbs'][] = ['label' => 'Linkeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linked-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->lid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lid], [
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
            'lid',
            'sk_id',
            'user',
            'cv_id',
            'begin',
            'end',
            'klcv',
            'status',
        ],
    ]) ?>

</div>
