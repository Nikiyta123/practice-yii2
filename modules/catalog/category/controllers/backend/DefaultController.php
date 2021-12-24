<?php

namespace app\modules\catalog\category\controllers\backend;

use app\modules\catalog\category\models\Category;
use app\modules\catalog\category\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * DefaultController implements the CRUD actions for Category model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        //return Yii::$app->request->post('pageSize');

        if (Yii::$app->request->post('pageSize')){
            $pageSize = (int)Yii::$app->request->post('pageSize');
        }else{
            $pageSize = 20;
        }

        //self::$pageSize = (Yii::$app->request->post('pageSize') || self::$pageSize ? 2 : 20 );


        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = $pageSize;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pageSize1=' => $pageSize,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
                $model->pos = Category::find()->andWhere(['parent_id' => $model->parent_id])->count();
                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->render('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = new Category();
        debug($model->FullTree());die();
        $array = [
            'id' => 1,
            'name' => 'one',
            'childs' => [
                'id'=>2,
                'name' => 'two',
                'childs' => []
            ]
        ];
        debug($array);

        $one = new \RecursiveArrayIterator($array);
        debug($one);

        $two = new \RecursiveIteratorIterator($one);
        debug($two);

        $arrOut = iterator_to_array($two, false);
        debug($arrOut);die();

        //$this->findModel($id)->delete();
        //return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChangingPositions()
    {
        $data = explode('@',Yii::$app->request->get('position'));

        for($i=0;$i<count($data);$i++){
            Yii::$app->db->createCommand()->update(Category::tableName(), ['pos' => $i], ['id' => $data[$i]])->execute();
        }

    }


}
