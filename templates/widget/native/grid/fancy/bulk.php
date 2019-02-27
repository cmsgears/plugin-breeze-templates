<?php
$bulkActions = $widget->bulkActions;
?>

<?php if( count( $bulkActions ) > 0 ) { ?>
<div class="grid-bulk-wrap">
	<div class="grid-bulk">
		<label>Action</label>
		<select class="cmt-select-c" popup="<?= $widget->bulkPopup ?>">
			<option value="select">Select Action</option>
			<?php
				foreach( $bulkActions as $column => $options ) {

					foreach( $options as $key => $action ) {
			?>
					<option data-col="<?= $column ?>" value="<?= $key ?>"><?= $action ?></option>
			<?php
					}
				}
			?>
		</select>
	</div>
</div>
<?php } ?>
