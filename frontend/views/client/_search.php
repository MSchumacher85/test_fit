<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\ClientSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="client-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php /*= $form->field($model, 'id') */?>
    <?=  DatePicker::widget([
        'model' => $model,
        'attribute' => 'date_of_birth_from',
        'attribute2' => 'date_of_birth_to',
        'options' => ['placeholder' => 'Start date'],
        'options2' => ['placeholder' => 'End date'],
        'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]);
    ?>
    <?= $form->field($model, 'FIO') ?>

    <?= $form->field($model, 'sex')->radioList([ '1' => 'Мужской', '0' => 'Женский', ], ['prompt' => '']) ?>




    <?php // echo $form->field($model, 'date_of_creation') ?>

    <?php // echo $form->field($model, 'created_by_whom') ?>

    <?php // echo $form->field($model, 'date_of_update') ?>

    <?php // echo $form->field($model, 'updated_by_whom') ?>

    <?php // echo $form->field($model, 'date_of_deletion') ?>

    <?php // echo $form->field($model, 'deleted_by_whom') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Очистить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
