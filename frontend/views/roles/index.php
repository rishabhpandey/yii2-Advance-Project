<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RolesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Roles', ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Back', ['site/index'], ['class' => 'btn btn-primary pull-right']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'role_id',
            'role',
            'is_active',
//            'created_by',
//            'created_at',
            // 'updated_by',
            // 'updated_at',
            // 'deleted_by',
            // 'deleted_at',

            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'headerOptions' => ['style' => 'color:#337ab7'],
              'template' =>'{update} {view} {delete} {permissions}'
            ],
        ],
    ]); ?>
</div>
