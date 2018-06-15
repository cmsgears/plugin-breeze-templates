<?php
use cmsgears\widgets\blog\ArticleWidget;

$widgets	= $settings->widgets ?? false;
$widgetType	= isset( $settings ) ? $settings->widgetType : null;
?>

<?php if( $widgets ) { ?>
	<div class="page-widget-wrap">
		<?= ArticleWidget::widget([
			'pagination' => false, 'widget' => 'related', 'model' => $model, 'title' => 'Related Articles',
			'limit' => 6, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
			'options' => [ 'class' => 'card-posts' ],
			'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
			'singleOptions' => [ 'class' => 'card card-banner col col6 row' ],
			'templateDir' => '@cmsgears/plugin-btemplates/templates/widget/article/default', 'template' => 'card'
		])?>
	</div>
<?php } ?>
