<?php


namespace app\blog\entities;


use yii\db\ActiveRecord;

/**
 * Class Category
 *
 * @property string $name
 * @property string $description
 * @property string $slug
 * @package app\blog\entities
 */
class Category extends ActiveRecord
{
    public static function create(string $tagName, string $description, string $slug): self
    {
        $category = new static();
        $category->name = $tagName;
        $category->slug = $slug;
        $category->description = $description;
        return $category;
    }

    public function edit(string $tagName, string $description, string $slug)
    {
        $this->name = $tagName;
        $this->slug = $slug;
        $this->description = $description;
    }

    public static function tableName()
    {
        return '{{%categories}}';
    }
}
