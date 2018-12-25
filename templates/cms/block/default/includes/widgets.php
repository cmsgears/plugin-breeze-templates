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
	<div class="block-widget-wrap <?= $widgetWrapClass ?>">
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
