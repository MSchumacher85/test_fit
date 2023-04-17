<?php

use frontend\models\Club;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Club $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="club-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>


    <?php /*= $form->field($model, 'date_of_creation')->textInput() */?><!--

    <?php /*= $form->field($model, 'created_by_whom')->textInput() */?>

    <?php /*= $form->field($model, 'date_of_update')->textInput() */?>

    <?php /*= $form->field($model, 'updated_by_whom')->textInput() */?>

    <?php /*= $form->field($model, 'date_of_deletion')->textInput() */?>

    --><?php /*= $form->field($model, 'deleted_by_whom')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
