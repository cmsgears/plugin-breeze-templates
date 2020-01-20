<?php
$dataIcon = isset( $dataIcon ) ? $dataIcon : 'cmti cmti-groups';

$frmSpinner		= isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
$apixSpinner	= isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";
?>
<div class="cmt-data-custom-crud data-custom-wrap <?= $customTarget ?>">
	<div class="cmt-data-custom-collection data-custom-all margin margin-small-v">
	<?php
		$metas = $model->getDataMeta( $customKey, true );

		if( isset( $metas ) ) {

			foreach( $metas as $key => $value ) {
	?>
			<div class="cmt-data-custom data-custom row max-cols-100 margin margin-bottom-small">
				<div class="col col12x4">
					<div class="form-group">
						<span class="frm-icon-element">
							<i class="<?= $dataIcon ?>"></i>
							<input class="value" type="text" name="Meta[value]" value="<?= $value ?>" />
							<span class="error" cmt-error="Meta[value]"></span>
							<input class="key" type="hidden" name="Meta[key]" value="<?= $key ?>" />
						</span>
					</div>
				</div>
				<div class="col col12x2 actions">
					<span class="btn-icon btn-action" cmt-app="core" cmt-controller="customData" cmt-action="update" action="<?= $apixBase ?>/set-custom?slug=<?= $model->slug ?>&type=<?= $model->type ?>&ckey=<?= $customKey ?>">
						<?php include $apixSpinner; ?>
						<i class="icon cmti cmti-save cmt-click"></i>
					</span>
					<span class="btn-icon btn-action" cmt-app="core" cmt-controller="customData" cmt-action="delete" action="<?= $apixBase ?>/remove-custom?slug=<?= $model->slug ?>&type=<?= $model->type ?>&ckey=<?= $customKey ?>">
						<?php include $apixSpinner; ?>
						<i class="icon cmti cmti-bin cmt-click"></i>
					</span>
				</div>
			</div>
	<?php } } ?>
	</div>
	<div class="cmt-data-custom-add margin margin-small-v pointer">+ Add <?= $customTitle ?></div>
</div>
<?php
include "$breezeTemplates/handlebars/data/custom.php";
