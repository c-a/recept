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
                'actions'=>array('create'),
                'users'=>array('?'),
            ),
        );
    }


    /**
     * Displays the create recipe page
     */
    public function actionCreate()
    {
        $recipe = new Recipe('create');

        // if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='recipe-create-form')
		{
			echo CActiveForm::validate($recipe);
			Yii::app()->end();
		}

        // collect user input data
		if(isset($_POST['Recipe']))
		{
			$recipe->attributes = $_POST['Recipe'];
            $recipe->owner_id = Yii::app()->user->id;

			// validate user input and redirect to the previous page if valid
			if($recipe->validate() && $recipe->save())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the recipe form
		$this->render('create',array('model'=>$recipe));
    }

    /**
     * Displays the edit recipe page
     */
    public function actionEdit($recipeID)
    {   

        if (!isset($recipeID))
            throw new CHttpException(404,'invalid request');

        $recipe = Recipe::model()->find(array(
            'condition'=>'id=:recipeID',
            'params'=>array('recipeID'=>$recipeID),
        ));
        if (!isset($recipe))
            throw new CHttpException(404,'recipe not found');

        $recipe->setScenario('edit');

        // if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='recipe-create-form')
		{
			echo CActiveForm::validate($recipe);
			Yii::app()->end();
		}

        // collect user input data
		if(isset($_POST['Recipe']))
		{
			$recipe->attributes = $_POST['Recipe'];
            $recipe->owner_id = Yii::app()->user->id;

			// validate user input and redirect to the previous page if valid
			if($recipe->validate() && $recipe->update())
				$this->redirect(array('recipe/view', 'recipeID'=>$recipe->id));
            
		}
        
		// display the recipe form
		$this->render('create',array('model'=>$recipe));
    }

    public function actionView($recipeID)
    {
        if (!isset($recipeID))
            throw new CHttpException(404,'invalid request');

        $recipe = Recipe::model()->find(array(
            'condition'=>'id=:recipeID',
            'params'=>array('recipeID'=>$recipeID),
        ));
        if (!isset($recipe))
            throw new CHttpException(404,'recipe not found');

        $owner = Yii::app()->user->id == $recipe->owner_id ? true : false;

        $this->render('view', array('recipe'=>$recipe, 'owner'=>$owner));
    }

    public function actionDelete($recipeID)
    {
        if (!isset($recipeID))
            throw new CHttpException(404,'invalid request');

        $recipe = Recipe::model()->find(array(
            'condition'=>'id=:recipeID',
            'params'=>array('recipeID'=>$recipeID),
        ));
        if (!isset($recipe))
            throw new CHttpException(404,'recipe not found');

        if (!$recipe->delete())
            throw new CHttpException(404,'couldn\'t remove recipe');

        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionViewall()
    {
        $recipeProvider = new CActiveDataProvider('Recipe', array(
            'criteria'=>array(
                'order'=>'id DESC',
                'select'=>array('id','title','description'),
            ),
            'pagination'=>array(
                'pageSize'=>20,
            ),
        ));

        $this->render('viewall', array('recipeProvider'=>$recipeProvider));
    }
}
