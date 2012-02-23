<?php

class RecipeController extends Controller
{

  /**
   * Returns array of enabled filters.
   */
  public function filters()
  {
    return array(
        'accessControl',
    );
  }

  public function accessRules()
  {
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
  public function actionCreate()
  {
    $recipeForm = new RecipeForm();

    // if it is ajax validation request
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'recipe-create-form') {
      echo CActiveForm::validate($recipe);
      Yii::app()->end();
    }

    // collect user input data
    if (isset($_POST['RecipeForm'])) {
      $recipeForm->attributes = $_POST['RecipeForm'];

      if (isset($_POST['RecipeForm']['ingredient'])) {
        foreach ($_POST['RecipeForm']['ingredient'] as $ingredient) {
          
        }
      }
      // validate user input and redirect to the previous page if valid
      if ($recipeForm->validate() && $recipeForm->save($id))
        $this->redirect(array('recipe/view', 'id' => $id));
    }
    // display the recipe form
    $this->render('create', array('model' => $recipeForm));
  }

  /**
   * Displays the edit recipe page
   */
  public function actionEdit($id)
  {

    if (!isset($id))
      throw new CHttpException(404, 'invalid request');

    $recipe = Recipe::model()->find(array(
        'condition' => 'id=:id',
        'params' => array('id' => $id),
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
        $this->redirect(array('recipe/view', 'id' => $id));;
    }

    // display the recipe form
    $this->render('edit', array('model' => $recipeForm, 'id' => $id));
  }

  public function actionView($id)
  {
    if (!isset($id))
      throw new CHttpException(404, 'invalid request');

    $recipe = Recipe::model()->find(array(
        'condition' => 'id=:id',
        'params' => array('id' => $id),
            ));
    if (!isset($recipe))
      throw new CHttpException(404, 'recipe not found');

    $owner = Yii::app()->user->id == $recipe->owner_id ? true : false;

    $this->render('view', array('recipe' => $recipe, 'owner' => $owner));
  }

  public function actionDelete($id)
  {
    if (!isset($id))
      throw new CHttpException(404, 'invalid request');

    $recipe = Recipe::model()->find(array(
        'condition' => 'id=:id',
        'params' => array('id' => $id),
            ));
    if (!isset($recipe))
      throw new CHttpException(404, 'recipe not found');

    if (!$recipe->delete())
      throw new CHttpException(404, 'couldn\'t remove recipe');

    $this->redirect(Yii::app()->homeUrl);
  }

  public function actionViewall()
  {
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
