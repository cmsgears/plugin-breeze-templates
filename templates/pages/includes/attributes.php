<?php
$attributes		= $settings->attributeData ?? true;
$attributeTypes	= $settings->attributeTypes ?? null;
?>

<?php if( $attributes ) { ?>
	<div class="page-content-meta">
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
				<div class="page-meta">
					<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= $attribute->value ?></span>
				</div>
		<?php
			}
		?>
	</div>
<?php } ?>
