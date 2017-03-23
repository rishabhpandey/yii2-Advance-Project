<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "permissions".
 *
 * @property integer $p_id
 * @property string $permission
 */
class Permission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permission'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'P ID',
            'permission' => 'Permission',
        ];
    }
    
//    public function attributes()
//    {
//        return array_merge(parent::attributes(), ['permission','selected','p_id']);
//    }
    
    public function getPermissionRole()
    {
        return $this->hasMany(PermissionRole::className(), ['p_id' => 'p_id']);
    }
}
