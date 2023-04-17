<?php

use frontend\models\Club;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Client $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->radioList([ '1' => 'Мужской', '0' => 'Женский', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::class, [
        'language' => 'ru',
        //'dateFormat' => 'dd.MM.yyyy',
         'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ],
        'options' => [
            'class'=> 'form-control',
            'autocomplete'=>'off',
        ],])?>

    <?= $form->field($model, 'clubList')->widget(Select2::class, [
        'data' => Club::getClubList(),
        'value' => $model->clubList,
        'options' => [
            'placeholder' => 'Доступные клубы...',
            'multiple' => true,
        ],

    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
