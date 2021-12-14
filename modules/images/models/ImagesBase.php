<?php

namespace app\modules\images\models;

use Yii;

/**
 * This is the model class for table "images_base".
 *
 * @property int $id
 * @property string $base_name
 * @property int $base_id
 * @property int $pos
 */
class ImagesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images_base';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['base_name', 'base_id', 'pos'], 'required'],
            [['base_id', 'pos'], 'integer'],
            [['base_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'base_name' => 'Base Name',
            'base_id' => 'Base ID',
            'pos' => 'Pos',
        ];
    }
}
