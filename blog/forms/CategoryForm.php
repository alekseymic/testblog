<?php


namespace app\blog\services;


use yii\base\Model;

class CategoryForm extends Model
{
    public $name;
    public $slug;
    public $description;

    public function rules()
    {
        return [
            [['slug', 'name'], 'required'],
            [['slug', 'name'], 'match', 'pattern' => '/^[a-zа-яё\-]+$/i'],

        ];
    }
}