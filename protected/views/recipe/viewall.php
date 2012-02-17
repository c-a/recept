<?php
$this->pageTitle = Yii::app()->name . ' - Se alla recept';
$this->breadcrumbs = array(
    'Se alla recept',
);
?>

<div class="recipe-viewall-content">

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $recipeProvider,
        'columns' => array('title', 'description'),
    ));
    ?>

</div>


