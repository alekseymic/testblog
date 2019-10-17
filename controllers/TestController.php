<?php

namespace app\controllers;

use app\blog\entities\Post;
use app\blog\forms\TestFileUploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class TestController extends Controller
{
    public function actionIndex()
    {
//        $posts=Post::find()->with('tags')->all();
//        echo '<pre>';
//        var_dump($posts);
//        echo '</pre>';
//        die();


        $model = new TestFileUploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}