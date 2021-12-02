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

    const path = 'uploads/';
    public $images;
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
            [['size'], 'integer'],
            [['path', 'filename'], 'string', 'max' => 255],
            [['images'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg','maxFiles' => 10],
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
            'size' => 'Size',
            'images' => 'Картинки'
        ];
    }

    public function ImageUpload($size,$filename)
    {
        $model = new Images();
        $model->path='/'.self::path.$filename;
        $model->filename=$filename;
        $model->size=$size;
        if ($model->save()){
            return true;
        }
        return false;
    }

    public function ImageSave($tmp_name,$filename){

        if (!file_exists(self::path.$filename) && move_uploaded_file($tmp_name, self::path.$filename)){
            return true;
        }
        return false;

    }

    public function uniqFilename()
    {
        $filename = uniqid();
        if (Images::find()->andWhere(['filename' => $filename])->all()){
            $filename = $this->uniqFilename();
        }
        return $filename;
    }
}