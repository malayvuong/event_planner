<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Linked */

$this->title = 'Thêm phân công';
$this->params['breadcrumbs'][] = ['label' => 'Linkeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linked-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' =>  $users,
        'congviec' =>  $congviec,
        'sukien' =>  $sukien,
    ]) ?>

</div>
