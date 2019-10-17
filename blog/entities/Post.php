<?php

namespace app\blog\entities;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class Post
 * @property    $title
 * @property    $content
 * @property    $created_at
 * @property    $updated_at
 * @property    $user_id
 * @property    $status
 * @property    $deleted_at
 * @property    $category_id
 * @property    $published_at
 * @package app\blog\entities
 */
class Post extends ActiveRecord
{
    const STATUS_ACTIVE=1;
    const STATUS_INATIVE=0;
    const STATUS_DELETED=2;

    public static function create(string $title, string $content, int $status, int $categoryId):self
    {
        $post=new static();
        $post->title=$title;
        $post->content=$content;
        $post->created_at=time();
        $post->user_id=Yii::$app->getUser();
        $post->status=$status;
        $post->category_id=$categoryId;
        return $post;
    }

    public function edit(string $title, string $content, int $status, int $categoryId)
    {
        $this->title=$title;
        $this->content=$content;
        $this->updated_at=time();
        $this->user_id=Yii::$app->getUser();
        $this->status=$status;
        $this->category_id=$categoryId;
    }


    public function changeStatus(int $status)
    {
        $this->status=$status;
    }

    public function publish()
    {
        if ($this->status==self::STATUS_ACTIVE) {
            throw new \DomainException('Post already published.');
        }
        $this->status=self::STATUS_ACTIVE;
        $this->published_at=time();
    }


    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])
            ->viaTable('post_tags', ['post_id' =>'id']);
    }


    public static function tableName()
    {
        return '{{%posts}}';
    }
}