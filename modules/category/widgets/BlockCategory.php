<?php
namespace app\modules\category\widgets;

use yii\base\Widget;
use app\modules\category\models\Category;

class BlockCategory extends Widget
{
    public $file = 'block-category.php';
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->data = Category::find()->indexBy(['id'])->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node){
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }
            else{
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str ='';
        foreach ($tree as $category){
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab){
        ob_start();
        include __DIR__. '/../widgets/views/'.$this->file;
        return ob_get_clean();
    }

}