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
        return array();
    }

    /**
     * Displays the create user page
     */
    public function actionCreate() {
        $model = new UserForm('create');

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
