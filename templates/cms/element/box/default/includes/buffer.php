<?php
$rawContent	= !empty( $settings->contentRaw ) ? $settings->contentRaw : null;
?>

<?php if( $widget->buffer ) { ?>
	<div class="box-widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<?php if( !empty( $rawContent ) ) { ?>
	<div class="box-content-raw"><?= $rawContent ?></div>
<?php } ?>

<!-- <div class="box-content-buffer"></div> -->

<?php include "$defaultIncludes/attributes.php"; ?>
