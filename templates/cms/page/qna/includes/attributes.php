<?php
// Yii Imports
use yii\helpers\HtmlPurifier;

$metaTypes		= !empty( $settings->metaTypes ) ? $settings->metaTypes : null;
$metasWrapClass	= !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
?>
<?php if( $metas ) { ?>
	<div class="page-content-meta <?= $metasWrapClass ?>">
		<?php
			$metaTypes = preg_split( '/,/', $metaTypes );

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

				$metas = $model->getActiveMetasByTypes( [ '', null, 'default' ] );
			}
		?>
			<div class="cmt-accordian accordian accordian-basic">
		<?php
			foreach( $metas as $meta ) {

				$title = isset( $meta->label ) ? $meta->label : ucfirst( $meta->name );
		?>
				<div class="accordian-tab">
					<div class="accordian-trigger">
						<?= $title ?>
						<span class="inline-block right cmti cmti-chevron-down"></span>
					</div>
					<div class="accordian-view reader">
						<?= HtmlPurifier::process( $meta->value ) ?>
					</div>
				</div>
		<?php
			}
		?>
			</div>
	</div>
<?php } ?>
