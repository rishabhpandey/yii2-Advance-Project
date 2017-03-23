<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Roles */

$this->title = $model->role_id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->role_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->role_id], [
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
            'role_id',
            'role',
            'is_active',
            'created_by',
            'created_at',
//            'updated_by',
//            'updated_at',
//            'deleted_by',
//            'deleted_at',
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Back', ['roles/index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
