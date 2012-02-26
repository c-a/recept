<?php
$this->pageTitle = Yii::app()->name . ' - Logga in';
$this->breadcrumbs = array(
    'Logga in',
);
?>



<?php
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
            'id' => 'login-form',
            'type' => 'horizontal',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('class' => 'well'),
        ));
?>

<h1>Logga in</h1>

<p class="note">Fält med <span class="required">*</span> är nödvändiga.</p>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span3')); ?>

<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3')); ?>

<?php echo $form->checkboxRow($model, 'rememberMe'); ?>

<button class="btn" type="submit">Logga in</button>

<?php $this->endWidget(); ?>

<p>Har du inte registrerat dig än: <?php echo CHtml::link('Skapa användare', array('user/create')); ?></p>
