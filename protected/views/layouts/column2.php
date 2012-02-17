<?php $this->beginContent('//layouts/main'); ?>

<div class="span-5">
    <div id="leftsidebar">
	<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Aktiviteter',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
     ?>
    </div>
</div>

<div class="span-14">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<div class="span-5 last">
	<div id="rightsidebar">
	<?php
        foreach ($this->portlets as $portlet)
        {
            if (!isset($array[1]))
                $this->widget($portlet[0]);
            else
                $this->widget($portlet[0], $portlet[1]);
        }
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>
