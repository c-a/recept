<?php
$this->pageTitle = Yii::app()->name . ' - Redigera recept';
$this->breadcrumbs = array('Redigera recept');
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
            'id' => 'recipe-create-form',
            'type' => 'horizontal',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('class' => 'well'),
        )); ?>

  <h1>Redigera recept</h1>

  <?php $this->renderPartial('formcontent', array('model' => $model, 'form' => $form)); ?>

  <?php echo CHtml::submitButton('Spara ändringar', array('class' => 'btn btn-primary')); ?>

  <?php echo CHtml::link('Avbryt', $this->createUrl('recipe/view', array('id' => $id)), array('class' => 'btn')); ?>

<?php $this->endWidget(); ?>

<?php $this->renderPartial('ingredientmodal'); ?>