<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "permission_role".
 *
 * @property integer $role_id
 * @property integer $p_id
 */
class PermissionRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permission_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'p_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'p_id' => 'P ID',
        ];
    }
    
    public function getPermission() 
    {
        return $this->hasOne(Permission::className(), ['p_id' => 'p_id']);
    }
    
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['role_id' => 'role_id']);
    }
}
