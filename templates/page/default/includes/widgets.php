<?php
use cmsgears\widgets\blog\PageWidget;

$widgets	= $settings->widgets ?? false;
$widgetType	= isset( $settings ) ? $settings->widgetType : null;
?>

<?php if( $widgets ) { ?>
	<div class="page-widget-wrap">
		<?= PageWidget::widget([
			'pagination' => false, 'widget' => 'related', 'model' => $model, 'title' => 'Related Pages',
			'limit' => 6, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
			'options' => [ 'class' => 'card-posts' ],
			'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
			'singleOptions' => [ 'class' => 'card card-banner col col6 row' ],
			'templateDir' => '@breeze/templates/page/default', 'template' => 'card'
		])?>
	</div>
<?php } ?>
