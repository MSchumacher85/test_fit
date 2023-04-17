<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Club $model */

$this->title = 'Добавить Клуб';
$this->params['breadcrumbs'][] = ['label' => 'Клубы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
