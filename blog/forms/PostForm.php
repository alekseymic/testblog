<?php


namespace app\blog\forms;


use yii\base\Model;

class PostForm extends Model
{
    public $innerForms=[];
    public $title;
    public $content;
    public $category_id;
    public $status;
    public $tags;
    public function __construct($config = [])
    {
        $this->innerForms[]=new AttachmentsForm();
        parent::__construct($config);
    }


    public function load($data, $formName = null)
    {
        return parent::load($data, $formName) && Model::loadMultiple($this->innerForms, $data);
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        return parent::validate($attributeNames, $clearErrors) && Model::validateMultiple($this->innerForms);
    }

    public function rules()
    {
        return [
            [['title', 'category_id'],'required'],
            ['tags', 'string']
        ];
    }

}