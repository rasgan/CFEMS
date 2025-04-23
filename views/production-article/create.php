<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductionArticle $model */

$this->title = Yii::t('app', 'Create Production Article');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Production Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
