<?php

namespace app\modules\catalog\category\models;

use yii\db\ActiveRecord;
use app\modules\catalog\product\models\Product;

class Category extends ActiveRecord
{

    public function rules()
    {
        return [
            [['parent_id','pos','folder'], 'integer'],
            [['name'], 'required'],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
            ['folder','validateFolder']

        ];
    }

    public function validateFolder($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->folder == 0 && Category::find()->andWhere(['parent_id' => $this->id])->count() > 0){
                $this->addError($attribute, 'Данная категори содержит дочерние категории');
            }
        }
    }

    public static function tableName()
    {
        return 'category';
    }

    public function attributeLabels()
    {
        return [
            //'id' =>,
            'parent_id' => 'Выберите категорию',
            'name' => 'Наименование',
            'keywords' => 'Ключевые слова',
            'folder' => 'Папка',
            //'pos' => 'Позиция',
            'description' => 'Описание',

        ];
    }

    public function getParent(){ //getCategory
        return $this->hasOne(Category::className(),['id' => 'parent_id']);
    }

    public function getProduct(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public function FullTree(){ //Полное Дерево Категорий
        $data = Category::find()->select(['id','name','parent_id','folder'])->indexBy(['id'])->asArray()->orderBy(['pos' => SORT_ASC])->all();
        $tree = [];
        foreach ($data as $id=>&$node){
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }
            else{
                $data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    public function BuildFullTree($tree,&$res = false,$sign=false){
        foreach ($tree as $item){
                $res[$item['id']] = $sign.$item['name'];
                if (isset($item['childs'])) {
                    $this->BuildFullTree($item['childs'],$res,$sign . '―');
                }
        }
        return $res;
    }

    public function FatTree($tree,$id){//Определенная Ветка Категорий
        foreach ($tree as $item){
            if ($item['id'] == $id){return $item;}
            elseif(isset($item['childs'])){$recursion = $this->FatTree($item['childs'],$id);}
            if ($recursion){return $recursion;}
        }
        return false;
    }

    function ExeptionBulding($field,$value){
        $category = Category::find()->select(['id'])->asArray()->andWhere([$field => $value])->orderBy(['pos' => SORT_ASC])->all();
        $exeption = array();
        foreach ($category as $item) {
            $exeption[$item['id']] = array('disabled'=>'disabled');
        }
        return $exeption;
    }


}