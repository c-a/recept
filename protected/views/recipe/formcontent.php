<?php
Yii::app()->clientScript->registerCoreScript('bootstrap.modal');
Yii::app()->clientScript->registerScript('units-script',
        'var units = ' . CJSON::encode(RecipeIngredient::getUnits()) . '; ' .
        'var baseurl = ' . CJavaScript::encode(Yii::app()->baseUrl) . ';',
        CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->createUrl('/js/recipeform.js'), CClientScript::POS_END);
?>

<div class="recipe-formcontent">

<p class="note">Fält med <span class="required">*</span> är nödvändiga.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span3', 'maxlength' => 128));?>

<?php echo $form->textAreaRow($model, 'description', array('class' => 'span5', 'rows'=>6));?>

<?php echo $form->textAreaRow($model, 'instructions', array('class' => 'span5', 'rows'=>6));?>

<div class="control-group">
  <?php echo CHtml::label('Förberedelsetid', false, array('required' => true, 'class'=> 'control-label')); ?>
  <div class="controls">
    <?php echo $form->textField($model, 'prep_time_hours', (array('class'=>'span1', 'maxlength'=>2)));?>
    timmar och
    <?php echo $form->textField($model, 'prep_time_minutes', (array('class'=>'span1', 'maxlength'=>2)));?>
    minuter
  </div>
</div>

<div class="control-group">
  <?php echo CHtml::label('Tillagningstid', false, array('required' => true, 'class'=> 'control-label')); ?>
  <div class="controls">
    <?php echo $form->textField($model, 'cook_time_hours', (array('class'=>'span1', 'maxlength'=>2)));?>
    timmar och
    <?php echo $form->textField($model, 'cook_time_minutes', (array('class'=>'span1', 'maxlength'=>2)));?>
    minuter
  </div>
</div>

<div class="control-group">
  <?php echo CHtml::label('Ingredienser', false, array('class' => 'control-label')); ?>
  <div class="controls">
  <table id="ingredients-table" class="table table-striped table-bordered">
      <th>Ingrediens</th>
      <th>Mängd</th>
      <th>Enhet</th>
      <th>Kommentar</th>
    </table>
    <p><?php echo CHtml::link('Lägg till ingrediens','#ingredient-modal', array('class'=>'btn btn-primary', 'data-toggle'=>'modal')); ?></p>
  </div>
</div>

</div><!-- recipe-formcontent -->