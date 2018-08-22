<?php
$attributes		= !empty( $settings->attributes ) ? $settings->attributes : $widget->attributes;
$attributeType	= !empty( $settings->attributeTypes ) ? $settings->attributeTypes : null;

$attributeWrapClass	= !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : $widget->attributeWrapClass;
?>

<?php if( $attributes ) { ?>
	<div class="card-content-meta <?= $attributeWrapClass ?>">
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
				<div class="card-meta">
					<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= $attribute->value ?></span>
				</div>
		<?php
			}
		?>
	</div>
<?php } ?>
