<?php
$this->pageTitle=Yii::app()->name . ' - ' . $recipe->title;
$this->breadcrumbs=array(
	'Visa recept',
);
?>

<div class="recipe-view">

<h1><?php echo $recipe->title ?></h1>

<h2><?php echo $recipe->getAttributeLabel('description');?></h2>
<p><?php echo $recipe->description ?></p>

<h2><?php echo $recipe->getAttributeLabel('instructions');?></h2>
<p><?php echo $recipe->instructions ?></p>

<?php
if ($owner)
{
    $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'edit',
		'caption'=>'Redigera',
        'buttonType'=>'link',
        'url'=>CHtml::normalizeUrl(array('recipe/edit', 'recipeID'=>$recipe->id)),
    ));

    $this->widget('zii.widgets.jui.CJuiButton', array(
		'name'=>'delete',
		'caption'=>'Ta bort',
        'buttonType'=>'link',
        'url'=>CHtml::normalizeUrl(array('recipe/delete', 'recipeID'=>$recipe->id)),
    ));
}
?>

</div><!-- recipe-view -->
