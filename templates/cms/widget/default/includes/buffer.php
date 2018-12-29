<?php
$rawContent	= !empty( $settings->contentRaw ) ? $settings->contentRaw : null;
?>

<?php if( $widget->buffer ) { ?>
	<div class="widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<?php if( !empty( $rawContent ) ) { ?>
	<div class="widget-content-raw"><?= $rawContent ?></div>
<?php } ?>

<!-- <div class="widget-content-buffer"></div> -->

<?php include "$defaultIncludes/attributes.php"; ?>
