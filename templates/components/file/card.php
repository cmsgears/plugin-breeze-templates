<?php
// CMG Imports
$filesCrudTitle = 'Files';

$frmSpinner		= isset( $frmSpinner ) ? $frmSpinner : "$breezeTemplates/components/spinners/10-white-max.php";
$apixSpinner	= isset( $apixSpinner ) ? $apixSpinner : "$breezeTemplates/components/spinners/10-hidden.php";
?>
<div class="cmt-file-crud data-crud data-crud-file data-crud-file-card">
	<div class="data-crud-title row">
		<span class="inline-block"><?= $filesCrudTitle ?></span>
		<span class="filler-tab"></span>
		<span class="inline-block actions-wrap text text-micro">
			<span class="cmt-file-add btn-icon btn-action"><i class="icon cmti cmti-plus"></i></span>
		</span>
	</div>
	<div class="cmt-file-form data-crud-file-form"></div>
	<div class="cmt-file-collection data-crud-file-cards row max-cols-50">
	<?php

		$modelFiles = $model->modelFiles;

		foreach( $modelFiles as $modelFile ) {

			$file = $modelFile->model;
	?>
			<div class="cmt-file card card-basic card-file col col3 padding padding-small" data-id="<?= $modelFile->id ?>">
				<div class="card-content-wrap">
					<div class="cmt-file-header card-header">
						<div class="card-header-title row">
							<div class="col col3x2 title" title="<?= $file->title ?>"><?= $file->title ?></div>
							<div class="col col3 align align-right">
								<span class="relative" cmt-app="core" cmt-controller="file" cmt-action="get" action="<?= $apixBase ?>/get-file?id=<?= $model->id ?>&fid=<?= $file->id ?>">
									<?php include $apixSpinner; ?>
									<i class="icon pointer cmti cmti-edit cmt-click"></i>
								</span>
								<span class="relative" cmt-app="core" cmt-controller="file" cmt-action="delete" action="<?= $apixBase ?>/delete-file?id=<?= $model->id ?>&fid=<?= $file->id ?>">
									<?php include $apixSpinner; ?>
									<i class="icon pointer cmti cmti-bin cmt-click"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="cmt-file-data card-data">
						<i class="<?= $file->getFileIcon() ?>"></i>
					</div>
				</div>
			</div>
	<?php } ?>
	</div>
</div>

<?php include "$breezeTemplates/handlebars/file/card.php"; ?>
