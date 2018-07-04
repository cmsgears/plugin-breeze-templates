<?php
$attributes		= $settings->attributes ?? true;
$attributeTypes	= isset( $settings ) && !empty( $settings->attributeTypes ) ? $settings->attributeTypes : null;

$attributeWrapClass	= isset( $settings ) && !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
?>

<?php if( $attributes ) { ?>
	<div class="page-content-meta <?= $attributeWrapClass ?>">
		<?php

			$attributeTypes = preg_split( '/,/', $attributeTypes );

			// Single Type
			if( count( $attributeTypes ) == 1 ) {

				$attributes = $model->getActiveMetasByType( $attributeTypes[ 0 ] );
			}
			// Multiple Types
			else if( count( $attributeTypes ) > 1 ) {

				$attributes = $model->getActiveMetasByTypes( $attributeTypes );
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
