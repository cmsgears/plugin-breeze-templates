<?php
$metaType		= isset( $settings ) && !empty( $settings->metaType ) ? $settings->metaType : null;
$metasWrapClass	= isset( $settings ) && !empty( $settings->metaWrapClass ) ? $settings->metaWrapClass : null;
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
						<?= $meta->value ?>
					</div>
				</div>
		<?php
			}
		?>
			</div>
	</div>
<?php } ?>
