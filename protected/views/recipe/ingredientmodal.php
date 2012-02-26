<?php
$this->beginWidget('bootstrap.widgets.BootModal', array(
    'id' => 'ingredient-modal',
    'htmlOptions' => array('class' => 'hide'),
));
?>

<div class="modal-header">
  <a class="close" data-dismiss="modal">&times;</a>
  <h3>Lägg till ingredienser</h3>
</div>

<div class="modal-body">
  <?php CHtml::beginForm(array('ingredient/ajaxSearch'), 'get'); ?>
    <div id="search-ingredient">
      <input type="text" name="searchString" class="input-medium search-query">
      <?php echo CHtml::ajaxSubmitButton('Sök', array('ingredient/ajaxsearch'), array('type' => 'GET', 'update' => '#search-result'),
              array('class' => 'btn')); ?>
    </div>
    <div id="search-result"></div>
  </div>
<?php CHtml::endForm(); ?>
  
<div class="modal-footer">
<?php echo CHtml::link('Lägg till', '#', array('id' => 'ingredient-modal-add', 'class' => 'btn btn-primary', 'data-dismiss' => 'modal')); ?>
<?php echo CHtml::link('Stäng', '#', array('class' => 'btn', 'data-dismiss' => 'modal')); ?>
</div>

<?php $this->endWidget(); ?>