<?php

namespace backend\modules\api\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "resources".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 */
class Resource extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%resources}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['name', 'url'], 'string', 'max' => 255],
            [['url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'URL',
        ];
    }
}