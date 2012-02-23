<?php
$this->pageTitle = Yii::app()->name . ' - Se alla recept';
$this->breadcrumbs = array(
    'Se alla recept',
);
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $recipeProvider,
    'columns' => array(
        array(
            'class' => 'CLinkColumn',
            'labelExpression' => '$data->title',
            'urlExpression' => 'Yii::app()->createUrl("recipe/view", array("id"=>$data->id))',
        ),
        'description'),
));
?>


