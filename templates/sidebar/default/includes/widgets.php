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
	<div class="sidebar-widget-wrap">
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
					$widgetConfig	= isset( $widgetConfig ) ? new $widgetConfig() : null;
					$widgetConfig	= isset( $widgetConfig ) ? $widgetConfig->generateConfig( [ 'model' => $model ] ) : [];

					$widgetConfig = ArrayHelper::merge( $widgetConfig, [
						'widgetObj' => $widget,
						'templateDir' => $widgetTemplate->viewPath,
						'template' => $widgetView
					]);

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
