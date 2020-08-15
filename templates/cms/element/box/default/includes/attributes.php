<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

$metas		= isset( $settings->metas ) ? $settings->metas : $widget->metas;
$metaTypes	= !empty( $settings->metaTypes ) ? $settings->metaType : null;

$metaWrapClass = !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : $widget->metaWrapClass;
?>
<?php if( $metas ) { ?>
	<div class="box-content-meta <?= $metaWrapClass ?>">
		<?php
			$metaTypes = isset( $metaTypes ) ? preg_split( '/,/', $metaTypes ) : [];

			// Single Type
			if( count( $metaTypes ) == 1 ) {

				$metas = $model->getActiveMetasByType( $metaTypes[ 0 ] );
			}
			// Multiple Types
			else if( count( $metaTypes ) > 1 ) {

				$metas = $model->getActiveMetasByTypes( $metaTypes );
			}
			// Default Types
			else {

				$metas = $model->getActiveMetasByType( CoreGlobal::TYPE_USER );
			}

			foreach( $metas as $meta ) {

				$title = isset( $meta->label ) ? $meta->label : ucfirst( $meta->name );
		?>
				<div class="box-meta">
					<span class="h5 inline-block"><?= $title ?></span> - <span class="inline-block"><?= HtmlPurifier::process( $meta->value ) ?></span>
				</div>
		<?php
			}
		?>
	</div>
<?php } ?>
