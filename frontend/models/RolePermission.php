<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "role_permission".
 *
 * @property integer $role_id
 * @property string $create
 * @property string $update
 * @property string $delete
 * @property string $view
 */
class RolePermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_permission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'required'],
            [['role_id'], 'integer'],
            [['create', 'update', 'delete', 'view'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'create' => 'Create',
            'update' => 'Update',
            'delete' => 'Delete',
            'view' => 'View',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permission::className(), ['permission_id' => 'permission_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['role_id' => 'role_id']);
    }    
                
}
