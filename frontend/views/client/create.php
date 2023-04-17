<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Client $model */

$this->title = 'Добавить Клиента';
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
