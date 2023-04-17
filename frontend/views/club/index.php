<?php

use frontend\models\Club;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ClubSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Клубы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Клуб', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'name',
                'label' => 'Название',
                'format' => 'raw',
            ],
            [
                'attribute' => 'address',
                'label' => 'Адресс',
                'format' => 'raw',
            ],
            [
                'attribute' => 'date_of_creation',
                'label' => 'Дата создания',
                'format' => 'raw',
            ],
            //'created_by_whom',
            //'date_of_update',
            //'updated_by_whom',
            //'date_of_deletion',
            //'deleted_by_whom',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Club $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
