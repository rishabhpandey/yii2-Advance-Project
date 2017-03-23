<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $person_id
 * @property string $p_name
 * @property integer $p_age
 * @property string $p_gender
 * @property string $is_active
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property string $deleted_by
 * @property string $deleted_at
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_name', 'p_age', 'p_gender', 'is_active'], 'required'],
            [['p_age'], 'integer'],
            [['p_gender', 'is_active'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['p_name'], 'string', 'max' => 225],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'p_name' => 'Name',
            'p_age' => 'Age',
            'p_gender' => 'Gender',
            'is_active' => 'Is Active',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'deleted_by' => 'Deleted By',
            'deleted_at' => 'Deleted At',
        ];
    }
}
