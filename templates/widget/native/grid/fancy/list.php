<?php
$dataProvider = $widget->dataProvider;

$models = $dataProvider->getModels();
?>

<?php if( $widget->list && count( $models ) > 0 ) { ?>
<div class="grid-rows-wrap active">
	<div class="grid-rows">
	<?php
		foreach( $models as $model ) {

			$id = $model->id;
	?>
		<div class="grid-row">
			<div class="grid-row-data">
				<div class="row">
					<div class="col col15">
						<span class="data cmt-choice">
							<label>
								<input class="grid-bulk-single grid-bulk-<?= $id ?>" type="checkbox" data-id=<?= $id ?> />
								<span class="label cmti cmti-checkbox"></span>
							</label>
						</span>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</div>
<?php } else { ?>
	<div class="filler-height filler-height-large"></div>
	<p><?= $widget->noDataMessage ?></p>
<?php } ?>
