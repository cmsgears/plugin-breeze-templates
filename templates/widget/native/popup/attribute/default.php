<?php
$title	= $widget->title;
$modal	= $widget->modal;
$data	= $widget->data;

$type		= $data[ 'type' ];
$model		= $data[ 'model' ];
$metaClass	= $data[ 'metaClass' ];
$metaType	= $data[ 'metaType' ];
$apixBase	= $data[ 'apixBase' ];
?>
<div id="popup-attribute-<?= $type ?>" class="cmt-popup popup popup-basic popup-medium <?= $modal ? 'popup-modal' : null ?>">
	<div class="popup-screen"></div>
	<?php if( $widget->bkg ) { ?>
		<div class="popup-bkg <?= $widget->bkgClass ?>" <?= isset( $widget->bkgUrl ) ? " style=\"background-image:url($widget->bkgUrl);\"" : null ?>></div>
	<?php } ?>
	<div class="popup-screen-listener"></div>
	<div class="popup-data <?= isset( $widget->size ) ? "popup-data-$widget->size" : null ?>">
		<span class="popup-close">
			<span class="icon cmti cmti-close"></span>
		</span>
		<?php if( $widget->bkgData ) { ?>
			<div class="popup-data-bkg <?= $widget->bkgDataClass ?>" <?= isset( $widget->bkgDataUrl ) ? "style=\"background-image:url($widget->bkgDataUrl);\"" : null ?>></div>
		<?php } ?>
		<?php if( !empty( $title ) ) { ?>
			<div class="popup-header">
				<div class="popup-title"><?= $title ?></div>
			</div>
		<?php } ?>
		<div class="popup-content-wrap" data-id="<?= $model->id ?>" data-type="<?= $model->type ?>">
			<div class="popup-content cscroller">
				<form class="form" cmt-app="core" cmt-controller="meta" cmt-action="<?= $type ?>" action="<?= $apixBase ?>/<?= $type ?>-meta?slug=<?= $model->slug ?>&type=<?= $model->type ?>">
					<div class="spinner max-area-cover bkg-transparent bkg-transparent-black">
						<div class="valign-center cmti cmti-2x cmti-spinner-9 spin"></div>
					</div>
					<div class="frm-field">
						<label>Title</label>
						<input class="name" type="text" name="<?= $metaClass ?>[name]" placeholder="Title" />
						<span class="error" cmt-error="<?= $metaClass ?>[name]"></span>
					</div>
					<div class="frm-field">
						<label>Description</label>
						<textarea class="late-editor description <?= $type ?>" name="<?= $metaClass ?>[value]" placeholder="Description"></textarea>
						<span class="error" cmt-error="<?= $metaClass ?>[value]"></span>
					</div>
					<input type="hidden" name="<?= $metaClass ?>[type]" value="<?= $metaType ?>" />
					<div class="frm-actions align align-center">
						<input class="submit btn btn-medium" type="submit" name="submit" value="<?= ucfirst( $type ) ?>">
					</div>
					<div class="message success"></div>
					<div class="message warning"></div>
					<div class="message error"></div>
				</form>
			</div>
		</div>
	</div>
</div>
