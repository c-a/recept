<?php
$this->pageTitle=Yii::app()->name . ' - ' . $recipe->title;
$this->breadcrumbs=array(
	'Visa recept',
);
?>

<h1><?php echo $recipe->title ?></h1>

<h2><?php echo $recipe->getAttributeLabel('description');?></h2>
<p><?php echo $recipe->description ?></p>

<h2><?php echo $recipe->getAttributeLabel('instructions');?></h2>
<p><?php echo $recipe->instructions ?></p>

<p><small>Senast ändrad: <?php echo date('D, d M Y', strtotime($recipe->modified_time))?></small></p>
<?php
if ($owner)
{
  $this->widget('zii.widgets.jui.CJuiButton', array(
      'name' => 'edit',
      'caption' => 'Redigera',
      'buttonType' => 'link',
      'url' => $this->createUrl('recipe/edit', array('id' => $recipe->id)),
  ));

  $this->widget('zii.widgets.jui.CJuiButton', array(
      'name' => 'delete',
      'caption' => 'Ta bort',
      'buttonType' => 'link',
      'url' => $this->createUrl('recipe/delete', array('id' => $recipe->id)),
  ));
}
?>
