<?php
$this->pageTitle = Yii::app()->name . ' - Se alla ingredienser';
$this->breadcrumbs = array(
    'Se alla ingredienser',
);
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $ingredientProvider,
    'columns' => array('name', 'kcal', 'protein', 'fat', 'carbs', 'fiber'),
));
?>


