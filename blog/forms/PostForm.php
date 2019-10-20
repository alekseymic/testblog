<?php


namespace app\blog\forms;


use app\blog\entities\Category;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class PostForm extends Model
{
//    public $innerForms=[];
    public $title;
    public $content="";
    public $category_name;
    public $status=1;
    public $tags;
    /**
     * @var UploadedFile[]
     */
    public $files;
    public function __construct($config = [])
    {
//        $this->innerForms[]=new AttachmentsForm();
        parent::__construct($config);
    }


    public function load($data, $formName = null)
    {
        return parent::load($data, $formName);
//        && Model::loadMultiple($this->innerForms, $data);
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        return parent::validate($attributeNames, $clearErrors);
//        && Model::validateMultiple($this->innerForms);
    }

    public function getCategories()
    {
        return ArrayHelper::map(Category::find()->select(['name', 'id'])->all(), 'id', 'name');
    }

    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['title', 'category_name'],'required'],
            ['tags', function($attr, $param){
                $this->tags=array_map('trim', explode(',', $this->tags));
                if (COUNT($this->tags)<2) {
                    $this->addError($attr, 'There must be at least 2 tags.');
                }
            }],
        ];
    }

    public function uploadFiles()
    {
        $filenames=[];
        foreach ($this->files as $file) {
            $filename=$file->baseName . '.' . $file->extension;
            if ($file->saveAs('@web/web/uploads/'. $filename)) {
                $filenames[]=['name'=>$file->baseName, 'path'=>$filename];
            }
        }
        return ArrayHelper::map($filenames,'name','path');
    }

}