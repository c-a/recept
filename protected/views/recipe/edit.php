<?php
$this->pageTitle = Yii::app()->name . ' - Redigera recept';
$this->breadcrumbs = array('Redigera recept');
?>

<h1>Redigera recept</h1>

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
            'caption' => 'Spara ändringar',
        ));

        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'cancel',
            'caption' => 'Avbryt',
            'buttonType'=>'link',
            'url'=>$this->createUrl('recipe/view', array('id'=>$id)),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
