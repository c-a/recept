<?php
$this->pageTitle = Yii::app()->name . ' - Skapa nytt recept';
$this->breadcrumbs = array('Skapa nytt recept');
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
        ));
?>

<h1>Skapa nytt recept</h1>

<?php $this->renderPartial('formcontent', array('model' => $model, 'form' => $form)); ?>

 <button class="btn btn-primary" type="submit">Skapa recept</button>

<?php
 echo CHtml::link('Avbryt',  Yii::app()->user->returnUrl, array('class' => 'btn'));
?>

<?php $this->endWidget(); ?>

 <?php $this->renderPartial('ingredientmodal'); ?>