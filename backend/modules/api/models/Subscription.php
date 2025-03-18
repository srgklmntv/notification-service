<?php

namespace backend\modules\api\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subscriptions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $resource_id
 */
class Subscription extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subscriptions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'resource_id'], 'required'],
            [['user_id', 'resource_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'resource_id' => 'Resource ID',
        ];
    }
}