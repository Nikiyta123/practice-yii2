<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\User;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class SignUpForm extends Model
{
    public $username;
    public $phone;
    public $email;
    public $password;
    public $passwordRepeat;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username','email','password','passwordRepeat'], 'required','message' => 'Заполните поле'],

            ['username', 'match', 'pattern' => '/^[A-Za-z0-9]+$/','message' => '{attribute} должен содержать только латиские буквы и цифры'],
            [['username'],'unique','targetClass' => 'app\modules\user\models\User','message' => 'Такой "{attribute}" уже зарегестрирован'],
            [['username'],'string','length' => [5, 30],'tooShort' => '{attribute} должен состоять от 5 до 20 символов'],

            [['phone'], 'string'],
            [['phone'], PhoneInputValidator::className(),'message' => 'Не верно введен "{attribute}"'],

            ['password','match', 'pattern' => '/^(?=.*[0-9])(?=.*[A-Z])([a-zA-Z0-9]+)$/','message' => '{attribute} должен содержать латинские заглавные и строчные буквы, цифры'],
            [['password',],'string','length' => [6, 30],'tooShort' => '{attribute} должен состоять от 7 до 15 символов'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password','message'=>'Пароли не совпадают'],

            ['email','trim'],
            [['email'],'email','message' => 'Не верно введен "{attribute}"'],
            [['email'],'unique','targetClass' => 'app\modules\user\models\User', 'targetAttribute' => 'email','message' => 'Такой "{attribute}" уже зарегестрирован'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'phone' => 'Телефон',
            'email' => 'Email',
            'password'=>'Пароль',
            'passwordRepeat' => 'Повторите'
        ];
    }

    public function signup()
    {
        if($this->validate()){
            $user = new User();
            $user->username = $this->username;
            $user->phone = $this->phone;
            $user->email = $this->email;
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            if ($user->save()){
                return $user;
            }
        }
        return false;
    }



}
