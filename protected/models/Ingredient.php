<?php

/**
 * This is the model class for table "tbl_recipe_ingredient".
 *
 * The followings are the available columns in table 'tbl_recipe_ingredient':
 * @property integer $id
 * @property integer $name
 * @property integer $description
 * @property integer $kcal
 *
 */
class Ingredient extends CActiveRecord
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
    return 'tbl_ingredient';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('name', 'required'),
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
        'id' => 'Ingrediens ID',
        'name' => 'Ingrediensnamn',
        'description' => 'Beskrivning',
        'kcal' => 'Kcal',
        'protein' => 'Protein',
        'fat' => 'Fett',
        'carbs' => 'Kolhydrater',
        'fiber' => 'Fiber',
    );
  }
}

