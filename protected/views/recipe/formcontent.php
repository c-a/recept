<?php
Yii::app()->clientScript->registerCoreScript('jquery-ui');
Yii::app()->clientScript->registerScript('units-script',
        'var units = ' . CJSON::encode(RecipeIngredient::getUnits()) . '; ' .
        'var baseurl = ' . CJavaScript::encode(Yii::app()->baseUrl) . ';',
        CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->createUrl('/js/recipeform.js'), CClientScript::POS_END);
?>

<div class="recipe-formcontent">

<p class="note">Fält med <span class="required">*</span> är nödvändiga.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($model, 'title'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'description'); ?>
    <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 59)); ?>
    <?php echo $form->error($model, 'description'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'instructions'); ?>
    <?php echo $form->textArea($model, 'instructions', array('rows' => 6, 'cols' => 59)); ?>
    <?php echo $form->error($model, 'instructions'); ?>
</div>

<div class="row">
    <?php echo CHtml::label('Förberedelsetid', false, array('required' => true)); ?>

    <?php
    echo $form->textField($model, 'prep_time_hours', (array('size'=>2, 'maxlength'=>2)));
    ?>
    timmar och
    <?php
    echo $form->textField($model, 'prep_time_minutes', (array('size'=>2, 'maxlength'=>2)));
    ?>
    minuter
</div>

<div class="row">
    <?php echo CHtml::label('Tillagningstid', false, array('required' => true)); ?>

    <?php
    echo $form->textField($model, 'cook_time_hours', (array('size'=>2, 'maxlength'=>2)));
    ?>
    timmar och
    <?php
    echo $form->textField($model, 'cook_time_minutes', (array('size'=>2, 'maxlength'=>2)));
    ?>
    minuter
</div>

<div class="row">
  <?php echo CHtml::label('Ingredienser', false);?>
  
  <table id="ingredients-table">
    <th>Ingrediens</th>
    <th>Mängd</th>
    <th>Enhet</th>
  </table>
  <?php $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'add-ingredient',
            'caption' => 'Lägg till ingrediens',
            'buttonType' => 'button',
     ));
  ?>
</div>

<div id="add-ingredient-dialog" style="display:none">
  <table>
    <tr>
      <td><label for="ingredient">Ingrediens: </label></td>
      <td><input type="text" name="ingredient"</label></td>
    </tr>
    
    <tr>
      <td><label for="amount">Mängd: </label></td>
      <td><input type="text" name="amount"</label></td>
      <td>
        <?php
          echo CHtml::dropDownList('unit', 'test',
                  CHtml::listData(RecipeIngredient::getUnits(), 'abbr', 'label'));
        ?>
      </td>
    </tr>
  </table>
</div>

</div><!-- recipe-formcontent -->