<?php

/**
 * This is the model class for table "tbl_recipe_ingredient".
 *
 * The followings are the available columns in table 'tbl_recipe_ingredient':
 * @property integer $recipe_id
 * @property integer $ingredient_id
 * @property integer $amount
 * @property string  $unit
 *
 */
class RecipeIngredient extends CActiveRecord
{

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return User the static model class
   */
  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return 'tbl_recipe_ingredient';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('recipe_id, ingredient_id, amount, unit', 'required'),
        array('amount', 'numeric', 'min'=>0),
        array('unit', 'range', 'allowEmpty'=>false, 'range'=>getUnits()),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations()
  {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
        'recipe_id' => 'Recept ID',
        'ingredient_id' => 'Ingrediens ID',
        'amount' => 'Mängd',
        'unit' => 'Enhet',
    );
  }
  
  public static function getUnits() {
    return array(
        'milliliter'=>array('label'=>'milliliter', 'plural'=>'milliliter', 'abbr'=>'ml'),
        'centiliter'=>array('label'=>'centiliter', 'plural'=>'centiliter', 'abbr'=>'cl'),
        'deciliter'=>array('label'=>'deciliter', 'plural'=>'deciliter', 'abbr'=>'dl'),
        'liter'=>array('label'=>'liter', 'plural'=>'liter', 'abbr'=>'l'),
        'krydd'=>array('label'=>'kryddmått', 'plural'=>'kryddmått', 'abbr'=>'krm'),
        'tesked'=>array('label'=>'tesked', 'plural'=>'tesked', 'abbr'=>'tsk'),
        'matsked'=>array('label'=>'matsked', 'plural'=>'matsked', 'abbr'=>'msk'),
    );
  }
}

