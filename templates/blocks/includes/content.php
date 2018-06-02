<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

// Meta ---------------------

$attributes		= $settings->attributeData ?? $widget->attributes;
$attributeTypes	= $settings->attributeTypes ?? $widget->attributeTypes;

// Elements -----------------

$elements		= $settings->elements ?? $widget->elements;
$elementType	= $settings->elementType ?? $widget->elementType;

$boxWrapClass	= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : $widget->boxWrapClass;
$boxWrapper		= !empty( $settings->boxWrapper ) ? $settings->boxWrapper : $widget->boxWrapper;
$boxClass		= !empty( $settings->boxClass ) ? $settings->boxClass : $widget->boxClass;
?>

<?php if( $content ) { ?>
	<div class="block-content <?= $contentClass ?>">
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="block-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="block-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="block-content-summary reader"><?= $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="block-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<div class="block-content-buffer">
			<?php if( isset( $widget->buffer ) ) { ?>
				<?= $widget->bufferData ?>
			<?php } ?>
		</div>
		<?php if( $attributes ) { ?>
			<div class="box-content-meta">
				<?php

					$attributeTypes = preg_split( '/,/', $attributeTypes );

					if( count( $attributeTypes ) == 1 ) {

						$attributes = $model->getActiveMetasByType( $attributeTypes[ 0 ] );
					}
					else if( count( $attributeTypes ) > 1 ) {

						$attributes = $model->getActiveMetasByTypes( $attributeTypes );
					}
					else {

						$attributes = $model->activeMetas;
					}

					foreach( $attributes as $attribute ) {

						$title = isset( $attribute->label ) ? $attribute->label : ucfirst( $attribute->name );
				?>
						<div class="box-meta">
							<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= $attribute->value ?></span>
						</div>
				<?php
					}
				?>
			</div>
		<?php } ?>
		<?php if( $elements ) { ?>
			<div class="block-box-wrap <?= $boxWrapClass ?>">
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
	</div>
<?php } ?>
