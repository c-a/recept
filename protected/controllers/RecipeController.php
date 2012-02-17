<?php

class RecipeController extends Controller {

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
            array('deny',
                'actions' => array('create'),
                'users' => array('?'),
            ),
        );
    }

    /**
     * Displays the create recipe page
     */
    public function actionCreate() {
        $recipeForm = new RecipeForm();

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'recipe-create-form') {
            echo CActiveForm::validate($recipe);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['RecipeForm'])) {
            $recipeForm->attributes = $_POST['RecipeForm'];

            // validate user input and redirect to the previous page if valid
            if ($recipeForm->validate() && $recipeForm->save())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the recipe form
        $this->render('create', array('model' => $recipeForm));
    }

    /**
     * Displays the edit recipe page
     */
    public function actionEdit($recipeID) {

        if (!isset($recipeID))
            throw new CHttpException(404, 'invalid request');

        $recipe = Recipe::model()->find(array(
                    'condition' => 'id=:recipeID',
                    'params' => array('recipeID' => $recipeID),
                ));
        if (!isset($recipe))
            throw new CHttpException(404, 'recipe not found');

        $recipeForm = new RecipeForm();
        $recipeForm->setRecipe($recipe);

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'recipe-create-form') {
            echo CActiveForm::validate($recipeForm);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['RecipeForm'])) {
            $recipeForm->attributes = $_POST['RecipeForm'];

            // validate user input and redirect to the previous page if valid
            if ($recipeForm->validate() && $recipeForm->save())
                $this->redirect(array('recipe/view', 'recipeID'=>$recipeID));;
        }

        // display the recipe form
        $this->render('edit', array('model' => $recipeForm, 'recipeID'=>$recipeID));
    }

    public function actionView($recipeID) {
        if (!isset($recipeID))
            throw new CHttpException(404, 'invalid request');

        $recipe = Recipe::model()->find(array(
                    'condition' => 'id=:recipeID',
                    'params' => array('recipeID' => $recipeID),
                ));
        if (!isset($recipe))
            throw new CHttpException(404, 'recipe not found');

        $owner = Yii::app()->user->id == $recipe->owner_id ? true : false;

        $this->render('view', array('recipe' => $recipe, 'owner' => $owner));
    }

    public function actionDelete($recipeID) {
        if (!isset($recipeID))
            throw new CHttpException(404, 'invalid request');

        $recipe = Recipe::model()->find(array(
                    'condition' => 'id=:recipeID',
                    'params' => array('recipeID' => $recipeID),
                ));
        if (!isset($recipe))
            throw new CHttpException(404, 'recipe not found');

        if (!$recipe->delete())
            throw new CHttpException(404, 'couldn\'t remove recipe');

        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionViewall() {
        $recipeProvider = new CActiveDataProvider('Recipe', array(
                    'criteria' => array(
                        'order' => 'id DESC',
                        'select' => array('id', 'title', 'description'),
                    ),
                    'pagination' => array(
                        'pageSize' => 20,
                    ),
                ));

        $this->render('viewall', array('recipeProvider' => $recipeProvider));
    }

}
