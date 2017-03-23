<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Person';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Back', ['site/index'], ['class' => 'btn btn-primary pull-right']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'person_id',
            'p_name',
            'p_age',
            'p_gender',
            'is_active',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',
            // 'deleted_by',
            // 'deleted_at',

            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'headerOptions' => ['style' => 'color:#337ab7'],
            ],
        ],
    ]); ?>
</div>
