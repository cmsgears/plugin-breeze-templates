<?php
// Yii Imports
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\elements\widgets\TextWidget;

$widgets	= isset( $settings->widgets ) ? $settings->widgets : false;
$widgetType	= isset( $settings->widgetType ) ? $settings->widgetType : null;

$widgetWrapClass	= !empty( $settings->widgetWrapClass ) ? $settings->widgetWrapClass : 'row';
$widgetWrapper		= !empty( $settings->widgetWrapper ) ? $settings->widgetWrapper : null;
$widgetClass		= !empty( $settings->widgetClass ) ? $settings->widgetClass : 'row';
?>

<?php if( $widgets ) { ?>
	<div class="page-widget-wrap <?= $widgetWrapClass ?>">
		<?php
			$widgets = [];

			if( empty( $widgetType ) ) {

				$widgets = $model->activeWidgets;
			}
			else {

				$widgets = Yii::$app->factory->get( 'widgetService' )->getActiveByType( $widgetType );
			}

			foreach( $widgets as $widget ) {

				$widgetContent	= null;
				$widgetTemplate	= $widget->template;
				$wClassPath		= $widgetTemplate->classPath;

				if( empty( $wClassPath ) ) {

					$widgetContent = TextWidget::widget( [ 'model' => $widget ] );
				}
				else {

					$widgetView		= !empty( $widgetTemplate->view ) ? $widgetTemplate->view : 'default';
					$widgetConfig	= !empty( $widgetTemplate->configPath ) ? $widgetTemplate->configPath : null;
					$widgetConfig	= isset( $widgetConfig ) ? new $widgetConfig( $widget->getDataMeta( 'config' ) ) : null;
					$widgetConfig	= isset( $widgetConfig ) ? $widgetConfig->generateConfig() : [];

					$widgetConfig = ArrayHelper::merge( $widgetConfig, [
						'widgetObj' => $widget,
						'templateDir' => $widgetTemplate->viewPath,
						'template' => $widgetView
					]);

					// Configure Widget options
					$htmlOptions	= isset( $widgetTemplate ) && !empty( $widgetTemplate->htmlOptions ) ? json_decode( $widgetTemplate->htmlOptions, true ) : [];
					$modelOptions	= !empty( $widget->htmlOptions ) ? json_decode( $widget->htmlOptions, true ) : [];
					$configOptions	= $widgetConfig[ 'options' ];

					$options = !empty( $htmlOptions ) ? ArrayHelper::merge( $htmlOptions, $modelOptions ) : $modelOptions;
					$options = !empty( $configOptions ) ? ArrayHelper::merge( $options, $configOptions ) : $options;

					$classOption = isset( $options[ 'class' ] ) ? $options[ 'class' ] : null;
					$classOption = "widget $classOption obj-widget widget-{$widgetTemplate->slug} widget-{$widget->slug}";

					$widgetConfig[ 'options' ][ 'class' ] = join( ' ', array_unique( preg_split( '/ /', $classOption ) ) );

					$widgetConfig[ 'model' ] = $model;

					$widgetContent = $wClassPath::widget( $widgetConfig );
				}

				if( !empty( $widgetClass ) ) {

					echo Html::tag( $widgetWrapper, $widgetContent, [ 'class' => $widgetClass ] );
				}
				else {

					echo $widgetContent;
				}
			}
		?>
	</div>
<?php } ?>

<?php
/*
PageWidget::widget([
	'pagination' => false, 'widget' => 'related', 'model' => $model, 'title' => 'Related Pages',
	'limit' => 6, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ],
	'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col6 row' ]
]);

PostWidget::widget([
	'pagination' => false, 'widget' => 'related', 'model' => $model, 'title' => 'Related Posts',
	'limit' => 6, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ],
	'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col6 row' ],
	'templateDir' => '@breeze/templates/post/default', 'template' => 'card'
]);

PageWidget::widget([
	'pagination' => true, 'limit' => 9,
	'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-pages' ],
	'wrapperOptions' => [ 'class' => 'card-page-wrap row max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
	'templateDir' => '@breeze/templates/widget/page/default', 'template' => 'card'
]);

PostWidget::widget([
	'pagination' => true, 'limit' => 9,
	'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ],
	'wrapperOptions' => [ 'class' => 'card-post-wrap row max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
	'templateDir' => '@breeze/templates/post/default', 'template' => 'card'
])

PostWidget::widget([
	'pagination' => true, 'limit' => 9,
	'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ], 'category' => $model,
	'wrapperOptions' => [ 'class' => 'card-post-wrap row max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
	'templateDir' => '@breeze/templates/post/default', 'template' => 'card'
])

PostWidget::widget([
	'pagination' => true, 'limit' => 9,
	'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ], 'tag' => $model,
	'wrapperOptions' => [ 'class' => 'card-post-wrap row max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
	'templateDir' => '@breeze/templates/post/default', 'template' => 'card'
])

ArticleWidget::widget([
	'pagination' => false, 'widget' => 'related', 'model' => $model, 'title' => 'Related Articles',
	'limit' => 6, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-posts' ],
	'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col6 row' ],
	'templateDir' => '@breeze/templates/article/default', 'template' => 'card'
])

ArticleWidget::widget([
	'pagination' => false, 'widget' => 'recent', 'limit' => 6,
	'options' => [ 'class' => 'widget-article' ],
	'wrapperOptions' => [ 'class' => 'article-wrap' ],
	'singleOptions' => [ 'class' => 'card card-icon' ],
	'template' => 'sidebar'
])

ArticleWidget::widget([
	'pagination' => true, 'limit' => 9,
	'texture' => 'texture texture-brown', 'defaultBanner' => true,
	'options' => [ 'class' => 'card-articles' ],
	'wrapperOptions' => [ 'class' => 'card-article-wrap row max-cols-50' ],
	'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
	'templateDir' => '@breeze/templates/widget/article/default', 'template' => 'card'
])

*/
?>
