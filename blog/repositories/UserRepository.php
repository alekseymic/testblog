<?php


namespace app\blog\repositories;


use app\blog\entities\User;

class UserRepository
{
    public function findByUsername($username)
    {
        return User::find()->andWhere(['username'=>$username])->one();
    }

    public function findById($id)
    {
        return User::find()->andWhere(['id'=>$id])->one();
    }

    public function findByEmail($email)
    {
        return User::find()->andWhere(['email'=>$email])->one();
    }
}