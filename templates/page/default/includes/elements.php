<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\elements\elements\ElementWidget;

$elements		= $settings->elements ?? true;
$elementType	= isset( $settings ) && !empty( $settings->elementType ) ? $settings->elementType : null;

$boxWrapClass	= isset( $settings ) && !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : 'row';
$boxWrapper		= isset( $settings ) && !empty( $settings->boxWrapper ) ? $settings->boxWrapper : null;
$boxClass		= isset( $settings ) && !empty( $settings->boxClass ) ? $settings->boxClass : 'row';
?>

<?php if( $elements ) { ?>
	<div class="page-box-wrap <?= $boxWrapClass ?>">
		<?php
			$elements = [];

			if( empty( $elementType ) ) {

				$elements = $model->activeElements;
			}
			else {

				$elements = Yii::$app->factory->get( 'elementService' )->getActiveByType( $elementType );
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
