<?php

namespace app\modules\catalog\product\models;

use Yii;
use app\modules\catalog\category\models\Category;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $category_id
 */
class Product extends \yii\db\ActiveRecord
{

    public $images;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'category_id'], 'required'],
            [['price', 'category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'price' => 'Цена',
            'category_id' => 'Категория',
            'images' => 'Изображения',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


}
