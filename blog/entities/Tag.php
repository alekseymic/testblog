<?php


namespace app\blog\entities;


use yii\db\ActiveRecord;

/**
 * Class Tag
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @package app\blog\entities
 */
class Tag extends ActiveRecord
{
    public static function create(string $tagName, string $slug):self
    {
        $tag=new static();
        $tag->name=$tagName;
        $tag->slug=$slug;
        return $tag;
    }

    public function edit(string $tagName, string $slug)
    {
        $this->name=$tagName;
        $this->slug=$slug;
    }

    public static function tableName()
    {
        return '{{%tags}}';
    }
}