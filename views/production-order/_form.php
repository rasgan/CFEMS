<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductionOrder $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="production-order-form">
    

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'production_line_id')->dropDownList($lines) ?>

    <?= $form->field($model, 'production_article_id')->dropDownList($articles) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
