<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SukienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sự kiện';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sukien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm sự kiện', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Thêm phân công', ['/linked/create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sk_id',
            'sk_name',
            'sk_khuvuc',
            'sk_time',
            'sk_begin',
            //'sk_end',
            //'sk_address',
            //'sk_note:ntext',
            //'sk_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
