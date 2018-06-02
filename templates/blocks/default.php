<?php
// Yii Imports
use yii\helpers\ArrayHelper;

// CMG Imports
use cmsgears\widgets\elements\elements\ElementWidget;

$model	= $widget->model;
$data	= $widget->modelData;

// Admin Settings - Override widget settings to be controllable from admin.
$settings = $data->settings ?? null;

$content			= $settings->content ?? $widget->content;
$contentData		= !empty( $model->content ) ? $model->content : $widget->contentData;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : $widget->contentClass;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : $widget->contentDataClass;
$boxWrapClass		= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : $widget->boxWrapClass;

$elements		= $settings->elements ?? $widget->elements;
$elementType	= $settings->elementType ?? $widget->elementType;
?>
<?php include __DIR__ . '/includes/background.php'; ?>
<div class="block-content-wrap">
	<?php include __DIR__ . '/includes/header.php'; ?>
	<?php if( $content ) { ?>
		<div class="block-content <?= $contentClass ?>">
			<div class="block-content-data <?= $contentDataClass ?>">
				<?= $contentData ?>
			</div>
			<div class="block-content-buffer">
				<?php if( isset( $widget->buffer ) ) { ?>
					<?= $widget->bufferData ?>
				<?php } ?>
			</div>
			<?php if( $elements ) { ?>
				<div class="block-box-wrap <?= $boxWrapClass ?>">
					<?php
						$elements = $model->elements;

						if( !empty( $elementType ) ) {

							$telements	= Yii::$app->factory->get( 'elementService' )->getByType( $elementType );
							$elements	= ArrayHelper::merge( $elements, $telements );
						}

						foreach( $elements as $element ) {

							echo ElementWidget::widget( [ 'model' => $element ] );
						}
					?>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<?php include __DIR__ . '/includes/footer.php'; ?>
</div>
