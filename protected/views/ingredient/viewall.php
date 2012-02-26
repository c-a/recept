<?php
$this->pageTitle = Yii::app()->name . ' - Se alla ingredienser';
$this->breadcrumbs = array(
    'Se alla ingredienser',
);
?>

<?php
$this->widget('bootstrap.widgets.BootGridView', array(
    'dataProvider' => $ingredientProvider,
    'columns' => array('name', 'kcal', 'protein', 'fat', 'carbs', 'fiber'),
));
?>


