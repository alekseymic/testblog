<?php

namespace app\controllers;

use app\blog\entities\Identity;
use app\blog\forms\SignupForm;
use app\blog\services\SignupService;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SignupController extends Controller
{
    private $service;
    public function __construct($id, $module, SignupService $service, $config = [])
    {
        $this->service=$service;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ]
        ];
    }


    public function actionSignup()
    {
        $form=new SignupForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $user=$this->service->signup($form);
                Yii::$app->user->login(new Identity($user),  3600*24*7);
                $this->goHome();
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('signup', ['model' => $form]);
    }


}