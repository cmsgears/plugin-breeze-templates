<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

// CMG Imports
use cmsgears\widgets\elements\elements\ElementWidget;

$elements		= $settings->elements ?? true;
$elementType	= isset( $settings ) ? $settings->elementType : null;

$boxWrapClass	= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : 'row';
$boxWrappper	= !empty( $settings->boxWrappper ) ? $settings->boxWrappper : null;
$boxClass		= !empty( $settings->boxClass ) ? $settings->boxClass : 'row';
?>

<?php if( $elements ) { ?>
	<div class="page-box-wrap <?= $boxWrapClass ?>">
		<?php
			$elements = $model->activeElements;

			if( !empty( $elementType ) ) {

				$telements	= Yii::$app->factory->get( 'elementService' )->getActiveByType( $elementType );
				$elements	= ArrayHelper::merge( $elements, $telements );
			}

			foreach( $elements as $element ) {

				$elementContent = ElementWidget::widget( [ 'model' => $element ] );

				if( !empty( $boxClass ) ) {

					echo Html::tag( $boxWrapper, $elementContent, [ 'class' => $boxClass ] );
				}
				else {

					echo $elementContent;
				}
			}
		?>
	</div>
<?php } ?>
