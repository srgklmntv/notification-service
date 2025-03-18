<?php

namespace backend\modules\api\models;

use Yii;
use yii\db\ActiveRecord;

class Notification extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%notifications}}';
    }

    public function rules()
    {
        return [
            [['resource_id', 'type', 'message'], 'required'],
            [['resource_id'], 'integer'],
            [['type', 'status'], 'string'],
            [['message'], 'string'],
            [['error_code'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resource_id' => 'Resource ID',
            'type' => 'Type',
            'message' => 'Message',
            'error_code' => 'Error Code',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }
}