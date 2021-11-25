<?php
namespace app\components;

use yii\base\Widget;
use app\modules\catalog\category\models\Category;

class commonList extends Widget
{
    public $filename;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->data = Category::find()->select(['id','name','parent_id','folder'])->indexBy(['id'])->asArray()->orderBy(['pos' => SORT_ASC])->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node){
            if (!$node['parent_id']){
                $node['number'] = count($tree);
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
        include __DIR__. '/../modules/'.explode('@',$this->filename)[0].'/widgets/views/'.explode('@',$this->filename)[1].'.php';
        return ob_get_clean();
    }

}