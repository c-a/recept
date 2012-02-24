<?php
$this->pageTitle=Yii::app()->name . ' - ' . $recipe->title;
$this->breadcrumbs=array(
	'Visa recept',
);

function printTime($hours, $minutes) {
  $text = '';
  if ($hours !== 0) {
    $text .= Yii::t('recipe', '{n} timme|{n} timmar', $hours);
    if ($minutes !== 0)
      $text .= ' och ';
  }
  
  if ($minutes !== 0)
    $text .= Yii::t('recipe', '{n} minut|{n} minuter', $minutes);
  
  echo $text;
}
?>

<h1><?php echo $recipe->title ?></h1>

<div class="row">
  <h2><?php echo $recipe->getAttributeLabel('description');?></h2>
  <p><?php echo CHtml::encode($recipe->description); ?></p>
</div>

<div class="span-11">
  <div class="row">
    <h2><?php echo $recipe->getAttributeLabel('instructions');?></h2>
    <p><?php echo CHtml::encode($recipe->instructions); ?></p>
  </div>
</div>

<div class="span-6 last">
  <div id="info-box">
    <table id="time-table">
      <?php if ($recipe->prep_time > 0): ?>
        <tr>
          <td><b><?php echo $recipe->getAttributeLabel('prep_time'); ?>: </b></td>
          <td>
            <?php
            $hours = (int) ($recipe->prep_time / 60);
            $minutes = (int) ($recipe->prep_time % 60);
            printTime($hours, $minutes);
            ?>
          </td>
        </tr>
      <?php endif; ?>
      <?php if ($recipe->cook_time > 0): ?>
        <tr>
          <td><b><?php echo $recipe->getAttributeLabel('cook_time'); ?>: </b></td>
          <td>
            <?php
            $hours = (int) ($recipe->cook_time / 60);
            $minutes = (int) ($recipe->cook_time % 60);
            printTime($hours, $minutes);
            ?>
          </td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</div>
<div class="clear"></div>
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
