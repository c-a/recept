<?php
$this->pageTitle = Yii::app()->name . ' - Logga in';
$this->breadcrumbs = array(
    'Logga in',
);
?>

<h1>Logga in</h1>

<p>Fyll i följande formulär med dina inloggningsuppgifter:</p>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
    ?>

    <p class="note">Fält med <span class="required">*</span> är nödvändiga.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'submit',
            'caption' => 'Logga in',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
    </div><!-- form -->

    <p>Har du inte registrerat dig än: <?php echo CHtml::link('Skapa användare', array('user/create')); ?></p>
