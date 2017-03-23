<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $id
 * @property string $state
 * @property string $created_at
 * @property string $created_by
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['created_at'], 'safe'],
            [['state'], 'string', 'max' => 150],
            [['created_by'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'State',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }
}
