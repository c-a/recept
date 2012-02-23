<?php
$this->pageTitle = Yii::app()->name . ' - Skapa nytt recept';
$this->breadcrumbs = array('Skapa nytt recept');
?>

<h1>Skapa nytt recept</h1>

<div class="form">

<?php
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'recipe-create-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            )); ?>

    <?php $this->renderPartial('formcontent', array('model'=>$model, 'form'=>$form)); ?>
    
    <div class="row buttons">
        <?php
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'submit',
            'caption' => 'Skapa recept',
            'buttonType' => 'submit',
        ));

        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'cancel',
            'caption' => 'Avbryt',
            'buttonType'=>'link',
            'url'=> Yii::app()->user->returnUrl,
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
