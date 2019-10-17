<?php


namespace app\blog\forms;


use app\blog\entities\User;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;

    public function rules()
    {
        return [
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Username has already been taken.' ],
            ['email', 'email'],
            ['password', 'string', 'min' => 6],
            [['username', 'email', 'password'], 'trim'],
            [['username', 'email', 'password'], 'required'],
        ];
    }


}