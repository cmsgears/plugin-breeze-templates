<?php
// CMG Includes
use cmsgears\core\common\utilities\CodeGenUtil;
?>
<div class="cmt-gallery-item-crud data-crud data-crud-gallery data-crud-slider" data-layout="cmt-layout-slider">
	<div class="data-crud-content">
		<span class="cmt-gallery-item-add btn btn-large btn-aqua-border inline-block">Add Picture</span>
	</div><hr class="margin margin-small-v" />
	<div class="filler-height"></div>
	<div class="cmt-gallery-item-form"></div>
	<div class="cmt-gallery-item-collection cmt-slider slider slider-basic slider-crud row">
		<?php
			$modelFiles = $gallery->modelFiles;

			foreach( $modelFiles as $modelFile ) {

				$file = $modelFile->model;
		?>
			<div class="cmt-gallery-item" data-id="<?= $modelFile->id ?>">
				<div class="cmt-gallery-item-header slide-header row">
					<div class="col col3x2 title align align-left" title="<?= $file->title ?>"><?= $file->title ?></div>
					<div class="col col3 align align-right">
						<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="get" action="<?= $apixBase ?>/get-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid=<?= $file->id ?>">
							<span class="spinner hidden-easy">
								<span class="icon cmti cmti-spinner-1 spin"></span>
							</span>
							<i class="icon cmti cmti-edit cmt-click"></i>
						</span>
						<span class="relative" cmt-app="gallery" cmt-controller="item" cmt-action="delete" action="<?= $apixBase ?>/delete-gallery-item?id=<?= $model->id ?>&cid=<?= $gallery->id ?>&fid=<?= $file->id ?>">
							<span class="spinner hidden-easy">
								<span class="icon cmti cmti-spinner-1 spin"></span>
							</span>
							<i class="icon cmti cmti-bin cmt-click"></i>
						</span>
					</div>
				</div>
				<div class="cmt-gallery-item-data slide-data">
					<div class="slide-image bkg-image" style="background-image:url(<?= CodeGenUtil::getThumbUrl( $file ) ?>)"></div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include "$breezeTemplates/handlebars/gallery/slider.php";
