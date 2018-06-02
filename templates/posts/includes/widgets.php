<?php
use cmsgears\widgets\blog\PostWidget;

$widgets		= $settings->widgets ?? true;
$widgetType		= isset( $settings ) ? $settings->widgetType : null;

$widgetsDir = dirname( __DIR__ ) . '/widgets';
?>

<?php if( $widgets ) { ?>

<?= PostWidget::widget([
	'pagination' => false, 'widget' => 'similar', 'model' => $model, 'title' => 'Similar Posts',
	'limit' => 5, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ],
	'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col5 row' ],
	'templateDir' => $widgetsDir, 'template' => 'card'
])?>

<?php } ?>
