<?php
use cmsgears\widgets\blog\PageWidget;

$widgets		= $settings->widgets ?? false;
$widgetType		= isset( $settings ) ? $settings->widgetType : null;

$widgetsDir = dirname( __DIR__ ) . '/widgets';
?>

<?php if( $widgets ) { ?>

<?= PageWidget::widget([
	'pagination' => false, 'widget' => 'related', 'model' => $model, 'title' => 'Similar Posts',
	'limit' => 5, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ],
	'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col5 row' ],
	'templateDir' => $widgetsDir, 'template' => 'card'
])?>

<?php } ?>
