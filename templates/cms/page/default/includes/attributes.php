<?php
// Yii Imports
yii\helpers\HtmlPurifier;

$metaType		= !empty( $settings->metaType ) ? $settings->metaType : null;
$metasWrapClass	= !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
?>
<?php if( $metas ) { ?>
	<div class="page-content-meta <?= $metasWrapClass ?>">
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
				<div class="page-meta">
					<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= HtmlPurifier::process( $meta->value ) ?></span>
				</div>
		<?php
			}
		?>
	</div>
<?php } ?>
