<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductionLine $model */

$this->title = Yii::t('app', 'Create Production Line');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Lines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-line-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
