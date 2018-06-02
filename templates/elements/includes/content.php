<?php
$attributes		= $settings->attributeData ?? $widget->attributes;
$attributeTypes	= $settings->attributeTypes ?? $widget->attributeTypes;
?>

<?php if( $content ) { ?>
	<div class="box-content <?= $contentClass ?>">
		<?php if( !empty( $contentTitle ) ) { ?>
			<div class="box-content-title"><?= $contentTitle ?></div>
		<?php } ?>
		<?php if( !empty( $contentInfo ) ) { ?>
			<div class="box-content-info reader"><?= $contentInfo ?></div>
		<?php } ?>
		<?php if( !empty( $contentSummary ) ) { ?>
			<div class="box-content-summary reader"><?= $contentSummary ?></div>
		<?php } ?>
		<?php if( !empty( $contentData ) ) { ?>
			<div class="box-content-data reader <?= $contentDataClass ?>"><?= $contentData ?></div>
		<?php } ?>
		<div class="box-content-buffer">
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
	</div>
<?php } ?>
