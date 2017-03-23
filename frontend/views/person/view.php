<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->person_id;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->person_id], [
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
            'person_id',
            'p_name',
            'p_age',
            'p_gender',
            [
                'attribute' => 'active_status',
                'format'=>'raw',
                'value' => $model->is_active == '1' ? 
                                        '<span class="badge badge-secondary">Active </span>' :
                                        '<span class="badge badge-danger">Inactive </span>',
            ],
//            'created_by',
//            'created_at',
//            'updated_by',
//            'updated_at',
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Back', ['person/index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
