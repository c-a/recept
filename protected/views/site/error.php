<?php
$this->pageTitle=Yii::app()->name . ' - Fel';
$this->breadcrumbs=array(
	'Fel',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
