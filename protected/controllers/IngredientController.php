<?php

class IngredientController extends Controller
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
        array('allow',
            'actions' => array('ajaxsearch'),
            'users' => array('@'),
            ),
        array('allow',
            'actions' => array('viewall'),
            'users' => array('*')
            ),
        array('deny'),
    );
  } 

  public function actionAjaxSearch()
  {
    $criteria = new CDbCriteria(array('select' => array('id', 'name')));
    if (isset($_GET['searchString']))
      $criteria->addSearchCondition('name', $_GET['searchString']);

    $ingredientProvider = new CActiveDataProvider('Ingredient', array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'name ASC',
                ),
                'pagination' => array(
                    'pageSize' => 10,
                ),
            ));

    $this->renderPartial('ajaxsearch', array('ingredientProvider' => $ingredientProvider));
  }
  
  public function actionViewall()
  {
    $ingredientProvider = new CActiveDataProvider('Ingredient', array(
                'criteria' => array(
                    'select' => array('id', 'name', 'kcal', 'protein', 'fat',
                        'carbs', 'fiber'),
                ),
                'sort' => array(
                    'defaultOrder'=>'name ASC',
                ),
                'pagination' => array(
                    'pageSize' => 20,
                ),
            ));

    $this->render('viewall', array('ingredientProvider' => $ingredientProvider)); 
  }
}

