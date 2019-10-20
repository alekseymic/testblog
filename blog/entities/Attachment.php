<?php


namespace app\blog\entities;


use yii\db\ActiveRecord;


/**
 * Class Attachment
 *
 * @property string $name
 * @property string $path
 * @property integer $post_id
 *
 *
 * @package app\blog\entities
 */
class Attachment extends ActiveRecord
{
    public static function create($name, $path): self
    {
        $attachment=new static();
        $attachment->name=$name;
//        $attachment->post_id=$postId;
        $attachment->path=$path;
        return $attachment;
    }

    public function getPost()
    {
        return $this->hasOne(Post::class, ['id'=>'post_id']);
    }

    public static function tableName()
    {
        return '{{%post_attachments}}';
    }

}