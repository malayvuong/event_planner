<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Congviec */

$this->title = 'Thêm công việc mới';
$this->params['breadcrumbs'][] = ['label' => 'Congviecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congviec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
