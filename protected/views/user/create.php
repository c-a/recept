<?php
$this->pageTitle = Yii::app()->name . ' - Skapa användare';
$this->breadcrumbs = array(
    'Skapa användare',
);
?>

<?php if (Yii::app()->user->getFlash('user-create-success')): ?>
    <div class="flash-success">
        Skapandet av användare lyckades, logga in <?php echo CHtml::link('här', array('site/login')); ?>
    </div>
<?php endif; ?>

    <?php
    $form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
                'id' => 'create-form',
                'type' => 'horizontal',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions'=>array('class'=>'well'),
            ));
    ?>

    <h1>Skapa användare</h1>

    <p>Fyll i följande formulär med dina inloggningsuppgifter:</p>

    <p class="note">Fält med <span class="required">*</span> är nödvändiga.</p>

    <?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>

    <?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>

    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
    
    <?php echo $form->passwordFieldRow($model, 'password2', array('class'=>'span3')); ?>

    <?php echo $form->captchaRow($model, 'captcha'); ?>

    <button class="btn btn-primary" type="submit"><i class="icon-user"></i> Skapa användare</button>

    <?php $this->endWidget(); ?>
