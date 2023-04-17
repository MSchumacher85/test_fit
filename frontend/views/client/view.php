<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Client $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Доступные клубы',
                'value' => function ($model) {
                    $response = [];
                    if ($model->clubs) {
                        foreach ($model->clubs as $club) {
                            $response[] = $club->name;
                        }

                        return implode(',', $response);
                    }

                }
            ],
            'id',
            'FIO',
            'sex',
            'date_of_birth',
            'date_of_creation',
            'created_by_whom',
            'date_of_update',
            'updated_by_whom',
            'date_of_deletion',
            'deleted_by_whom',
        ],
    ]) ?>

</div>
