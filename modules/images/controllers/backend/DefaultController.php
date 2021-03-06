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
        return false;
    }

    public function actionSelect(){
        if ($this->request->isPost) {
            $images = Images::find()->select(['id','path'])->andWhere(['id' => Yii::$app->request->post('images')])->asArray()->orderBy(['id' => SORT_DESC])->all();

            return $this->renderAjax('view', [
                'images' => $images
            ]);
        }
        return false;
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
            for ($i=0;$i<count($_FILES['Images']['name']['images']);$i++){
                $filename = $model->uniqFilename().'.'.explode('/',$_FILES['Images']['type']['images'][$i])[1];
                if ($model->ImageSave($_FILES['Images']['tmp_name']['images'][$i],$filename)){
                    if (!$model->ImageUpload($_FILES['Images']['size']['images'][$i],$filename)){
                        unlink($model->path.$filename);
                    }
                }
            }
            return $this->actionIndex();
        }
        return false;
        //???? Ajax
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

    public function actionDelete()
    {
        if ($this->request->isPost) {
            foreach (Yii::$app->request->post('images') as $item){
                unlink(Images::path.Images::find()->select(['filename'])->andWhere(['id' => (int)$item])->asArray()->one()['filename']);
                Images::deleteAll(['id' => (int)$item]);
            }
            return $this->actionIndex();
        }
        return false;
    }
}
