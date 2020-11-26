<?php
$rawContent	= !empty( $settings->contentRaw ) ? $settings->contentRaw : null;

$buffer		= isset( $widget->buffer ) ? $widget->buffer : false;
$bufferData = isset( $widget->bufferData ) ? $widget->bufferData : null;
?>

<?php if( $buffer ) { ?>
	<div class="widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<?php if( !empty( $rawContent ) ) { ?>
	<div class="widget-content-raw"><?= $rawContent ?></div>
<?php } ?>

<!-- <div class="widget-content-buffer"></div> -->

<?php include "$defaultIncludes/attributes.php"; ?>
