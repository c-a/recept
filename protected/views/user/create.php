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

    <h1>Skapa användare</h1>

    <p>Fyll i följande formulär med dina inloggningsuppgifter:</p>

    <div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'create-form',
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
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password2'); ?>
        <?php echo $form->passwordField($model, 'password2'); ?>
        <?php echo $form->error($model, 'password2'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'captcha'); ?>
      <?php $this->widget('CCaptcha'); ?>
      <?php echo $form->textField($model, 'captcha'); ?>
    </div>
    
    <div class="row buttons">
        <?php
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'submit',
            'caption' => 'Skapa användare',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
