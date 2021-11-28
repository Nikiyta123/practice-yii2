<?php

namespace app\modules\images\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $path
 * @property string $filename
 * @property string $format
 * @property int $size
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'filename', 'format', 'size'], 'required'],
            [['size'], 'integer'],
            [['path', 'filename', 'format'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'filename' => 'Filename',
            'format' => 'Format',
            'size' => 'Size',
        ];
    }
}