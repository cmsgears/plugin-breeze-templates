<?php
// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

$frmSpinner		= isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
$apixSpinner	= isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";
?>
<div class="cmt-gallery-item-crud data-crud data-crud-gallery data-crud-gallery-card" data-layout="cmt-layout-card">
	<div class="data-crud-title row">
		<span class="inline-block">Gallery</span>
		<span class="filler-tab"></span>
		<span class="inline-block actions-wrap text text-micro">
			<span class="cmt-gallery-item-add btn-icon btn-action"><i class="icon cmti cmti-plus"></i></span>
		</span>
	</div>
	<div class="cmt-gallery-item-form data-crud-gallery-form"></div>
	<div class="cmt-gallery-item-collection data-crud-gallery-cards row max-cols-50">
	<?php

		$modelFiles = $gallery->modelFiles;

		foreach( $modelFiles as $modelFile ) {

			$file = $modelFile->model;
	?>
			<div class="cmt-gallery-item card card-basic card-gallery-item col col6 padding padding-small" data-id="<?= $modelFile->id ?>">
				<div class="card-content-wrap">
					<div class="cmt-gallery-item-header card-header">
						<div class="card-header-title row">
							<div class="col col3x2 title" title="<?= $file->title ?>"><?= $file->title ?></div>
							<div class="col col3 align align-right">
								<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="get" action="<?= $apixBase ?>/get-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid=<?= $file->id ?>">
									<?php include $apixSpinner; ?>
									<i class="icon cmti cmti-edit cmt-click"></i>
								</span>
								<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="delete" action="<?= $apixBase ?>/delete-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid=<?= $file->id ?>">
									<?php include $apixSpinner; ?>
									<i class="icon cmti cmti-bin cmt-click"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="cmt-gallery-item-data card-data">
						<?= CodeGenUtil::getImageThumbTag( $file ); ?>
					</div>
				</div>
			</div>
	<?php } ?>
	</div>
</div>

<?php include "$breezeTemplates/handlebars/gallery/card.php"; ?>
