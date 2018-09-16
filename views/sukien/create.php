<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sukien */

$this->title = 'Create Sukien';
$this->params['breadcrumbs'][] = ['label' => 'Sukiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sukien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
