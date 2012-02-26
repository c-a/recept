<?php $this->beginContent('//layouts/main'); ?>

<div class="row">
  <div class="span3">
    <div id="leftsidebar">
      <p></p>
      <?php
      if (!empty($this->menu)) {
        $this->widget('bootstrap.widgets.BootMenu', array(
            'type' => 'list',
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'well'),
        ));
      }

      foreach ($this->portlets as $portlet) {
        if (!isset($array[1]))
          $this->widget($portlet[0]);
        else
          $this->widget($portlet[0], $portlet[1]);
      }
      ?>
    </div>
  </div>

  <div class="span9">
    <div id="content">
      <?php echo $content; ?>
    </div><!-- content -->
  </div>

</div><!-- row -->

<?php $this->endContent(); ?>
