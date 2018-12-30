<?php
$rawContent	= !empty( $settings->contentRaw ) ? $settings->contentRaw : null;
?>

<?php if( $widget->buffer ) { ?>
	<div class="block-widget-buffer">
		<?= $widget->bufferData ?>
	</div>
<?php } ?>

<?php if( !empty( $rawContent ) ) { ?>
	<div class="block-content-raw"><?= $rawContent ?></div>
<?php } ?>

<!-- <div class="block-content-buffer"></div> -->

<?php include "$defaultIncludes/attributes.php"; ?>
<?php include "$defaultIncludes/elements.php"; ?>
<?php include "$defaultIncludes/widgets.php"; ?>
