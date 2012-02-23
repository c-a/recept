<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_recipe':
 * @property integer $id
 * @property string  $title
 * @property string  $description
 * @þroperty string  $instructions
 * @property integer $prep_time
 * @property integer $cook_time
 * @property integer $owner_id
 *
 */
class Recipe extends CActiveRecord
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
    return 'tbl_recipe';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('title', 'required'),
        array('title', 'length', 'max' => 255),
        array('prep_time, cook_time', 'numerical', 'integerOnly' => true, 'min' => 0, 'max' => 2 ^ 32),
        array('description, instructions', 'safe'),
    );
  }

  public function behaviors()
  {
    return array(
        'CTimestampBehavior' => array(
            'class' => 'zii.behaviors.CTimestampBehavior',
            'setUpdateOnCreate' => true,
            'createAttribute' => 'create_time',
            'updateAttribute' => 'modified_time',
        )
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
        'id' => 'ID',
        'title' => 'Receptnamn',
        'description' => 'Beskrivning',
        'instructions' => 'Instruktioner',
        'prep_time' => 'Förberedelsetid',
        'cook_time' => 'Tillagningstid',
        'owner_id' => 'Ägar ID',
    );
  }

}
