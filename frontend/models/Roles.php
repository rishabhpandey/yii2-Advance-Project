<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $role_id
 * @property string $role
 * @property string $is_active
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property string $deleted_by
 * @property string $deleted_at
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role', 'is_active'], 'required'],
            [['is_active'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['updated_by', 'deleted_by'], 'integer'],
            [['role'], 'string', 'max' => 150],
            [['created_by'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role' => 'Role',
            'is_active' => 'Is Active',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'deleted_by' => 'Deleted By',
            'deleted_at' => 'Deleted At',
        ];
    }
        
    public function getRolePermissions()
    {
        return $this->hasMany(PermissionRole::className(), ['role_id' => 'role_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['role_id' => 'role_id']);
    }
}
