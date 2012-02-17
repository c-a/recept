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
    echo $form->dropDownList($model, 'prep_time_hours', array(
        0 => '0 timmar',
        1 => '1 timme',
        2 => '2 timmar',
    ));
    ?>

    och
    <?php
    echo $form->dropDownList($model, 'prep_time_minutes', array(
        0 => '0 minuter',
        1 => '1 minut',
        2 => '2 minuter',
    ));
    ?>
</div>

<div class="row">
    <?php echo CHtml::label('Tillagningstid', false, array('required' => true)); ?>

    <?php
    echo $form->dropDownList($model, 'cook_time_hours', array(
        0 => '0 timmar',
        1 => '1 timme',
        2 => '2 timmar',
    ));
    ?>

    och
    <?php
    echo $form->dropDownList($model, 'cook_time_minutes', array(
        0 => '0 minuter',
        1 => '1 minut',
        2 => '2 minuter',
    ));
    ?>
</div>
