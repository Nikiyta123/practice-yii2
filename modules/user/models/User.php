<?php

namespace app\modules\user\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }

    public function attributeLabels()
    {
        return [
            //'id',
            'username' => 'Логин',
            'phone' => 'Телефон',
            //'password',
            'email:email' => 'Email',
            //'isAdmin'
            //'authKey',
        ];
    }


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        //return static::findOne(['access_token' => $token]);
    }


    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }


    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }


    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function validatePassword($password)
    {
        return  Yii::$app->security->validatePassword($password,$this->password);

    }


    public function generateAuthKey(){
        $this->authKey = Yii::$app->security->generateRandomString();
    }

}
