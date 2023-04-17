<?php

use frontend\models\Client;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ClientSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'FIO',
            [
                'attribute'=>'sex',
                'filter'=>[0=>'Женский',1=>'Мужской'],
                'value'=>function($formModel){
                    return (int) $formModel->sex === 0 ? 'Женский': 'Мужской';
                }
            ],
            'date_of_birth',
            'date_of_creation',
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

            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Client $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
