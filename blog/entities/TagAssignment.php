<?php


namespace app\blog\entities;


use yii\db\ActiveRecord;

/**
 * Class tagAssignment
 * @property integer $tag_id
 * @property integer $post_id
 * @package app\blog\entities
 */
class TagAssignment extends ActiveRecord
{

    public static function create($tagId)
    {
        $assignment=new static();
        $assignment->tag_id=$tagId;
        return $assignment;
    }
    public static function tableName()
    {
        return '{{%post_tags}}'; // TODO: Change the autogenerated stub
    }
}