<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/recipe.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>

  <body <?php if (isset($this->classes)) echo "class=\"$this->classes\""; ?> >

    <div class="container" id="page">

      <div id="header">
        <div id="logo"><p></p></div>
      </div><!-- header -->

        <?php
        $this->widget('bootstrap.widgets.BootNavbar', array(
            'fixed' => false,
            'brand' => CHtml::encode(Yii::app()->name),
            'brandUrl' => $this->createUrl('/site/index'),
            'collapse' => false, // requires bootstrap-responsive.css
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.BootMenu',
                    'items' => array(
                        array('label' => 'Hem', 'url' => array('/site/index')),
                        array('label' => 'Om', 'url' => array('/site/page', 'view' => 'about')),
                        array('label' => 'Logga in / Skapa användare', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logga ut (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ),
            ),
        ));
        ?>
      <?php if (!empty($this->breadcrumbs)): ?>
        <?php
        $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
            'homeLink' =>array('label' => 'Hem', 'url' => $this->createUrl('/site/index')),
            'links' => $this->breadcrumbs,
        ));
        ?><!-- breadcrumbs -->
      <?php endif ?>

      <?php echo $content; ?>

      <div class="footer">
      </div><!-- footer -->

    </div><!-- page -->

  </body>
</html>
