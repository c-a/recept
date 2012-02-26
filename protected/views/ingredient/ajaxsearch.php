<?php
$this->widget('bootstrap.widgets.BootGridView', array(
    'dataProvider' => $ingredientProvider,
    'columns' => array('name'),
    'ajaxUpdate' => true,
));
?>