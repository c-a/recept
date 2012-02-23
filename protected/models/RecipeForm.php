<?php

/**
 * RecipeForm class.
 * UserForm is the data structure for keeping
 * recipe form data. It is used by  'RecipeController'.
 */
class RecipeForm extends CFormModel {

    public $title;
    public $description;
    public  $instructions;

    public $prep_time_hours;
    public $prep_time_minutes;

    public $cook_time_hours;
    public $cook_time_minutes;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // all fields are required.
            array('title', 'required'),

            array('description, instructions', 'safe'),

            array('prep_time_hours', 'numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>48),
            array('prep_time_minutes', 'numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>60),

            array('cook_time_hours', 'numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>48),
            array('cook_time_minutes', 'numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>60),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'title'=>'Titel',
            'description'=>'Beskrivning',
            'instructions'=>'Instruktioner',
            'prep_time_hours'=>'Timmar',
            'prep_time_minutes'=>'Minuter',
            'cook_time_hours'=>'Timmar',
            'cook_time_minutes'=>'Minuter',
        );
    }

    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;
        
        $this->title = $recipe->title;
        $this->description = $recipe->description;
        $this->instructions = $recipe->instructions;

        $this->prep_time_hours = (int)($recipe->prep_time / 60);
        $this->prep_time_minutes = $recipe->prep_time % 60;

        $this->cook_time_hours = (int)($recipe->cook_time / 60);
        $this->cook_time_minutes = $recipe->cook_time % 60;
    }
    
    public function save(&$recipeID = null) {
        if (isset($this->recipe))
                $recipe = $this->recipe;
        else
            $recipe = new Recipe();
        
        $recipe->title = $this->title;
        $recipe->description = $this->description;
        $recipe->instructions = $this->instructions;

        $recipe->prep_time = $this->prep_time_hours * 60 + $this->prep_time_minutes;
        $recipe->cook_time = $this->cook_time_hours * 60 + $this->cook_time_minutes;

        if ($recipe->isNewRecord)
          $recipe->owner_id = Yii::app()->user->id;
        
        $res = $recipe->save(false);
        
        if ($res)
          $recipeID = $recipe->id;
        
        return $res;
    }
}

