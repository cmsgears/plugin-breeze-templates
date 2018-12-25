<?php
$rawContent	= !empty( $settings->contentRaw ) ? $settings->contentRaw : null;
?>

<?php if( $widget->buffer ) { ?>
	<div class="card-widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<?php if( !empty( $rawContent ) ) { ?>
	<div class="card-content-raw"><?= $rawContent ?></div>
<?php } ?>

<!-- <div class="card-content-buffer"></div> -->

<?php include "$defaultIncludes/attributes.php"; ?>
