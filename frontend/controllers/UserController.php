<?php

namespace frontend\controllers;

class UserController extends \yii\web\Controller
{
    public function actionUser()
    {
        return $this->render('user');
    }
    /**
     * 用户注册
     * 
     */
    public function actionReg(){
        print_r($_POST);
        $request=\Yii::$app->request;
        if($request->isPost){
 
            print_r($request->post());exit;
        }else{
            return $this->render('reg');
        }
    }
    
    /**
     * 用户登录
     */
    public function actionLogin() {
        return $this->render('login');
    }
}
