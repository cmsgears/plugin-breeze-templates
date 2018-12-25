<?php
$metas		= isset( $settings->metas ) ? $settings->metas : $widget->metas;
$metaType	= !empty( $settings->metaType ) ? $settings->metaType : null;

$metaWrapClass = !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : $widget->metaWrapClass;
?>
<?php if( $metas ) { ?>
	<div class="block-content-meta <?= $metaWrapClass ?>">
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
				<a class="btn btn-medium <?= $meta->name ?>" href="<?= $meta->value ?>">
					<i class="cmti cmti-social-<?= $meta->name ?>"></i>
					<?= $meta->label ?>
				</a>
		<?php
			}
		?>
	</div>
<?php } ?>
