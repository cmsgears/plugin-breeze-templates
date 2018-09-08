<?php
$attributes		= isset( $settings ) && !empty( $settings->attributes ) ? $settings->attributes : false;
$attributeType	= isset( $settings ) && !empty( $settings->attributeTypes ) ? $settings->attributeTypes : null;

$attributeWrapClass	= isset( $settings ) && !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
?>

<?php if( $attributes ) { ?>
	<div class="widget-content-meta <?= $attributeWrapClass ?>">
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
				<div class="widget-meta">
					<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= $attribute->value ?></span>
				</div>
		<?php
			}
		?>
	</div>
<?php } ?>