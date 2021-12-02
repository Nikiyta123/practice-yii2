<?php

namespace app\modules\images\controllers\backend;

use app\modules\images\models\Images;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii;
use yii\bootstrap4\ActiveForm;
use yii\web\UploadedFile;

/**
 * DefaultController implements the CRUD actions for Images model.
 */
class DefaultController extends Controller
{

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

    public function actionValidationForm(){

        if (Yii::$app->request->isAjax) {
            $model = new Images();
            if($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }
    }

    public function actionIndex()
    {
        $images = Images::find()->asArray()->orderBy(['id' => SORT_DESC])->all();
        return $this->renderAjax('index', [
            'model' => new Images(),
            'images' => $images,
        ]);
    }


    public function actionCreate()
    {
        return $this->renderAjax('create', [
            'model' => new Images(),
        ]);
    }

    public function actionSave()
    {
        $model = new Images();
        //Ajax
        if ($this->request->isPost) {
            //debug($_FILES['Images']);die();
            for ($i=0;$i<count($_FILES['Images']['name']['images']);$i++){
                $filename = $model->uniqFilename().'.'.explode('/',$_FILES['Images']['type']['images'][$i])[1];
                if ($model->ImageSave($_FILES['Images']['tmp_name']['images'][$i],$filename)){
                    if ($model->ImageUpload($_FILES['Images']['size']['images'][$i],$filename)){

                    }else{
                        //return false;
                    }
                }
            }
            return $this->actionIndex();
        }

        //Не Ajax
        /*if ($this->request->isPost) {
            $images = UploadedFile::getInstances($model, 'images');
            foreach ($images as $item){
                $filename = $model->uniqFilename().'.'.explode('/',$item->type)[1];
                if ($model->ImageSave($item,$filename)){

                    if ($model->ImageUpload($item,$filename)){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
        }*/
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Images::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
