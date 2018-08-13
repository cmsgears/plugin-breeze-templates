<?php
$attributeType			= isset( $settings ) && !empty( $settings->attributeType ) ? $settings->attributeType : null;
$attributesWrapClass	= isset( $settings ) && !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
?>
<?php if( $attributes ) { ?>
	<div class="page-content-meta <?= $attributesWrapClass ?>">
		<?php

			$attributeType = preg_split( '/,/', $attributeType );

			// Single Type
			if( count( $attributeType ) == 1 ) {

				$attributes = $model->getActiveMetasByType( $attributeType[ 0 ] );
			}
			// Multiple Types
			else if( count( $attributeType ) > 1 ) {

				$attributes = $model->getActiveMetasByTypes( $attributeType );
			}
			// Default Types
			else {

				$attributes = $model->getActiveMetasByTypes( [ '', null, 'default' ] );
			}
		?>
			<div class="accordian accordian-basic">
		<?php
			foreach( $attributes as $attribute ) {

				$title = isset( $attribute->label ) ? $attribute->label : ucfirst( $attribute->name );
		?>
				<div class="accordian-tab">
					<div class="accordian-trigger">
						<?= $title ?>
						<span class="inline-block right cmti cmti-chevron-down"></span>
					</div>
					<div class="accordian-view reader">
						<?= $attribute->value ?>
					</div>
				</div>
		<?php
			}
		?>
			</div>
	</div>
<?php } ?>
