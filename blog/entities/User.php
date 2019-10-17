<?php

namespace app\blog\entities;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class User
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $avatar
 * @property string $about
 * @property integer $points
 * @property string $password write-only password
 *
 * @package app\blog\entities
 */
class User extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%users}}';
    }

    const STATUS_ACTIVE=1;
    const STATUS_INACTIVE=0;

    public function edit(string $username, string $email, string $password)
    {
        $this->username=$username;
        $this->email=$email;
        $this->password_hash=$this->getPasswordHash($password);
        $this->updated_at=time();
    }

    public function editAbout(string $about, string $avatar)
    {
        $this->avatar=$avatar;
        $this->about=$about;
    }

    public static function signup(string $username, string $email, string $password): self
    {
        $user=new static();
        $user->username=$username;
        $user->email=$email;
        $user->password_hash=$user->getPasswordHash($password);
        $user->created_at=time();
        $user->updated_at=time();
        $user->status=self::STATUS_ACTIVE;
        $user->auth_key=Yii::$app->security->generateRandomString();
        return $user;
    }

    public function pointsUp()
    {
        $this->points++;
    }

    public function pointsDown()
    {
        $this->points--;
    }



    public function getPasswordHash(string $password):string
    {
        return Yii::$app->security->generatePasswordHash($password);
    }

    public function validatePassword(string $password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}
