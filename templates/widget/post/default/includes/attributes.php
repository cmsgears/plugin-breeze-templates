<?php
$metas		= isset( $settings ) && !empty( $settings->metas ) ? $settings->metas : false;
$metaType	= isset( $settings ) && !empty( $settings->metaTypes ) ? $settings->metaTypes : null;

$metaWrapClass	= isset( $settings ) && !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
?>

<?php if( $metas ) { ?>
	<div class="widget-content-meta <?= $metaWrapClass ?>">
		<?php

			$metaType = preg_split( '/,/', $metaType );

			// Single Type
			if( count( $metaType ) == 1 ) {

				$metas = $model->getActiveMetasByType( $metaType[ 0 ] );
			}
			// Multiple Types
			else if( count( $metaType ) > 1 ) {

				$metas = $model->getActiveMetasByTypes( $metaType );
			}
			// Default Types
			else {

				$metas = $model->getActiveMetasByTypes( [ '', null, 'default' ] );
			}

			foreach( $metas as $meta ) {

				$title = isset( $meta->label ) ? $meta->label : ucfirst( $meta->name );
		?>
				<div class="widget-meta">
					<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= $meta->value ?></span>
				</div>
		<?php
			}
		?>
	</div>
<?php } ?>
