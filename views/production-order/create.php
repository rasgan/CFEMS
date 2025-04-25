<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductionOrder $model */

$this->title = Yii::t('app', 'Create Production Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lines' => $lines,
        'articles' => $articles
    ]) ?>

</div>
