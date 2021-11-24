<?php

namespace app\modules\user\controllers\frontend;

use app\modules\user\models\SignInForm;
use app\modules\user\models\SignUpForm;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;
use yii\bootstrap4\ActiveForm;


class DefaultController extends Controller
{

    public function actionValidationForms($nameForms){

        if (Yii::$app->request->isAjax) {

            if ($nameForms == 'SignInForm') $model = new SignInForm();

            elseif ($nameForms == 'SignUpForm') $model = new SignUpForm();

            if($model->load(Yii::$app->request->post())) {

                Yii::$app->response->format = Response::FORMAT_JSON;

                return ActiveForm::validate($model);

            }

        }

        throw new \yii\web\BadRequestHttpException('Что-то пошло не так. Ошибка при валидации. Обратитесь в тех.поддержку сайта');

    }

    public function actionSignUpAjax(){
       
        $model = new SignUpForm();

        if ($model->load(Yii::$app->request->post()) && $user = $model->signup()) {

            if (Yii::$app->getUser()->login($user)) {

                return $this->goHome();

            }else{
                throw new HttpException(404 ,'Что-то пошло не так. Пользователь не был авторизирован.');
            }

        }else {
            throw new HttpException(404 ,'Что-то пошло не так. Ошибка при регистрации. Обратитесь в тех.поддержку сайта');
        }

    }


    public function actionLoginAjax()
    {

        $model = new SignInForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

                return $this->goBack();

        }else{

            throw new HttpException(404 ,'Что-то пошло не так. Пользователь не был авторизирован.');

        }
        
    }

    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignInForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
