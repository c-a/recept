<?php

class UserController extends Controller {

    /**
     * Returns array of enabled filters.
     */
    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('create', 'captcha'),
                'users' => Yii::app()->params['createUserAccess'],
                ),
            array('deny'),
        );
    }

    public function actions() {
      return array(
          'captcha' => array(
              'class' => 'CCaptchaAction',
              'backColor' => 0xFFFFFF,
              ),
      );
    }
    /**
     * Displays the create user page
     */
    public function actionCreate() {
        $model = new UserForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'create-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['UserForm'])) {
            $model->attributes = $_POST['UserForm'];
            // validate user input
            if ($model->validate() && $model->createUser()) {
                Yii::app()->user->setFlash('user-create-success', 'asdasd');
                $this->redirect(array('user/create'));
            }
        }
        // display the createuser form
        $this->render('create', array('model' => $model));
    }

}
