<?php

if ($model->scenario == 'create')
    $title = 'Skapa nytt recept';
else if ($model->scenario == 'edit')
    $title = 'Redigera recept';

$this->pageTitle=Yii::app()->name . ' - ' . $title;
$this->breadcrumbs=array(
	$title,
);
?>

<h1><?php echo $title?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recipe-create-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <p class="note">Fält med <span class="required">*</span> är nödvändiga.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>59)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'instructions'); ?>
		<?php echo $form->textArea($model,'instructions',array('rows'=>6, 'cols'=>59)); ?>
		<?php echo $form->error($model,'instructions'); ?>
	</div>

	<div class="row buttons">
		<?php
            if ($model->scenario == 'create')
                $title = 'Skapa recept';
            else if ($model->scenario == 'edit')
                $title = 'Spara ändringar';

            $this->widget('zii.widgets.jui.CJuiButton', array(
                'name'=>'submit',
                'caption'=>$title,
            ));
        ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
