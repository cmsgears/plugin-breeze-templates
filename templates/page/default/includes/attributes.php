<?php
$attributeType			= !empty( $settings->attributeType ) ? $settings->attributeType : null;
$attributesWrapClass	= !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
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

			foreach( $attributes as $attribute ) {

				$title = isset( $attribute->label ) ? $attribute->label : ucfirst( $attribute->name );
		?>
				<div class="page-meta">
					<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= $attribute->value ?></span>
				</div>
		<?php
			}
		?>
	</div>
<?php } ?>
