<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Back', ['site/index'], ['class' => 'btn btn-primary pull-right']) ?>
    </p>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            // 'name',
            // 'email:email',
            // 'status',
            // 'person_id',
            // 'role_id',
            // 'is_active',
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
