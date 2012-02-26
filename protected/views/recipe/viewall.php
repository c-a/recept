<?php
$this->pageTitle = Yii::app()->name . ' - Se alla recept';
$this->breadcrumbs = array(
    'Se alla recept',
);
?>

<?php
$this->widget('bootstrap.widgets.BootGridView', array(
    'dataProvider' => $recipeProvider,
    'columns' => array(
        array(
            'class' => 'CLinkColumn',
            'header' => 'Namn',
            'labelExpression' => '$data->title',
            'urlExpression' => 'Yii::app()->createUrl("recipe/view", array("id"=>$data->id))',
        ),
       'description'),
));
?>


